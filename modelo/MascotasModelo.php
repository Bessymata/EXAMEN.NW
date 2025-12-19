<?php

namespace Dao\Mascotas;

use Dao\Table;

class MascotasModelo extends Table
{
    public static function obtenerTodos(): array
    {
        $sql = "SELECT * FROM mascotas";
        return self::obtenerRegistros($sql, []);
    }

    public static function obtenerPorId(int $mascota_id): array
    {
        $sql = "SELECT * FROM mascotas WHERE mascota_id = :mascota_id";
        return self::obtenerUnRegistro($sql, ["mascota_id" => $mascota_id]);
    }

    public static function crear(
        string $nombre,
        string $especie,
        int $edad,
        string $estado
    ) {
        $sql = "INSERT INTO mascotas
                (nombre, especie, edad, estado)
                VALUES
                (:nombre, :especie, :edad, :estado)";

        return self::executeNonQuery($sql, [
            "nombre" => $nombre,
            "especie" => $especie,
            "edad" => $edad,
            "estado" => $estado
        ]);
    }

    public static function actualizar(
        int $mascota_id,
        string $nombre,
        string $especie,
        int $edad,
        string $estado
    ) {
        $sql = "UPDATE mascotas SET
                nombre = :nombre,
                especie = :especie,
                edad = :edad,
                estado = :estado
                WHERE mascota_id = :mascota_id";

        return self::executeNonQuery($sql, [
            "mascota_id" => $mascota_id,
            "nombre" => $nombre,
            "especie" => $especie,
            "edad" => $edad,
            "estado" => $estado
        ]);
    }

    public static function eliminar(int $mascota_id)
    {
        $sql = "DELETE FROM mascotas WHERE mascota_i_