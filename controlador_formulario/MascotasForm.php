<?php

use Views\Renderer;
use Utilities\Site;

class MascotasForm
{
    public function run()
    {
        $mode = $_GET["mode"];

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if ($mode === "INS") {
                MascotasModelo::insertar(
                    $_POST["nombre"],
                    $_POST["especie"],
                    $_POST["edad"],
                    $_POST["estado"]
                );
            }

            if ($mode === "UPD") {
                MascotasModelo::actualizar(
                    $_POST["mascota_id"],
                    $_POST["nombre"],
                    $_POST["especie"],
                    $_POST["edad"],
                    $_POST["estado"]
                );
            }

            if ($mode === "DEL") {
                MascotasModelo::eliminar($_POST["mascota_id"]);
            }

            Site::redirectTo("index.php?page=Mascotas");
        }

        $data = [];

        if ($mode !== "INS") {
            $data = MascotasModelo::obtenerPorId($_GET["id"]);
        }

        Renderer::render("formulario/form", $data);
    }
}
