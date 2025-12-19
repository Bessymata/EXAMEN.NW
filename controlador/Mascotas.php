<?php

use Views\Renderer;

class Mascotas
{
    public function run()
    {
        $mascotas = MascotasModelo::obtenerTodos();

        Renderer::render("lista/lista", [
            "estudiantes" => $mascotas,
            "total" => count($mascotas)
        ]);
    }
}
