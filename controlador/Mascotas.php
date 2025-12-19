<?php

namespace Controllers\Mascotas;

use Controllers\PublicController;
use Utilities\Site;
use Views\Renderer;
use Dao\Mascotas\MascotasModelo;
use Utilities\Validators;
use Exception;

const MascotasList = "index.php?page=Mascotas";
const MascotasView = "Mascotas/form";

class Mascotas extends PublicController
{
    private array $errores = [];

    private array $modes = [
        "INS" => "Nueva Mascota",
        "UPD" => "Editando %s",
        "DSP" => "Detalle de %s",
        "DEL" => "Eliminando %s"
    ];

    private string $mode = "";
    private int $mascota_id = 0;
    private string $nombre = "";
    private string $especie = "";
    private int $edad = 0;
    private string $estado = "Activo";
    private string $token = "";

    public function run(): void
    {
        try {
            $this->init();

            if ($this->isPostBack()) {
                $this->errores = $this->validar();

                if (count($this->errores) === 0) {
                    switch ($this->mode) {
                        case "INS":
                            MascotasModelo::crear(
                                $this->nombre,
                                $this->especie,
                                $this->edad,
                                $this->estado
                            );
                            Site::redirectToWithMsg(MascotasList, "Mascota creada");
                            break;

                        case "UPD":
                            MascotasModelo::actualizar(
                                $this->mascota_id,
                                $this->nombre,
                                $this->especie,
                                $this->edad,
                                $this->estado
                            );
                            Site::redirectToWithMsg(MascotasList, "Mascota actualizada");
                            break;

                        case "DEL":
                            MascotasModelo::eliminar($this->mascota_id);
                            Site::redirectToWithMsg(MascotasList, "Mascota eliminada");
                            break;
                    }
                }
            }

            Renderer::render(MascotasView, $this->viewData());
        } catch (Exception $ex) {
            Site::redirectToWithMsg(MascotasList, "Error");
        }
    }

    private function init()
    {
        if (!isset($_GET["mode"]) || !isset($this->modes[$_GET["mode"]])) {
            throw new Exception("Modo inválido");
        }

        $this->mode = $_GET["mode"];

        if ($this->mode !== "INS") {
            if (!isset($_GET["id"])) {
                throw new Exception("ID requerido");
            }

            $data = MascotasModelo::obtenerPorId(intval($_GET["id"]));

            $this->mascota_id = $data["mascota_id"];
            $this->nombre = $data["nombre"];
            $this->especie = $data["especie"];
            $this->edad = $data["edad"];
            $this->estado = $data["estado"];
        }
    }

    private function validar(): array
    {
        $errors = [];

        $this->token = $_POST["token"] ?? "";
        if ($_SESSION["Mascotas_token"] !== $this->token) {
            throw new Exception("Token inválido");
        }

        $this->nombre = $_POST["nombre"] ?? "";
        $this->especie = $_POST["especie"] ?? "";
        $this->edad = intval($_POST["edad"] ?? 0);
        $this->estado = $_POST["estado"] ?? "Activo";

        if (Validators::IsEmpty($this->nombre)) {
            $errors[] = "Nombre requerido";
        }

        if (Validators::IsEmpty($this->especie)) {
            $errors[] = "Especie requerida";
        }

        return $errors;
    }

    private function generarToken()
    {
        $this->token = md5(time() . rand());
        $_SESSION["Mascotas_token"] = $this->token;
    }

    private function viewData(): array
    {
        $this->generarToken();

        $data = [
            "mode" => $this->mode,
            "modeDsc" => $this->modes[$this->mode],
            "mascota_id" => $this->mascota_id,
            "nombre" => $this->nombre,
            "especie" => $this->especie,
            "edad" => $this->edad,
            "estado" => $this->estado,
            "token" => $this->token,
            "errores" => $this->errores,
            "hasErrores" => count($this->errores) > 0,
            "readonly" => in_array($this->mode, ["DSP", "DEL"]) ? "readonly" : "",
            "isDisplay" => $this->mode === "DSP"
        ];

        return $data;
    }
}
