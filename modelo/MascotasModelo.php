<?php

class MascotasModelo
{
    private static function getDb()
    {
        return new PDO(
            "mysql:host=localhost;dbname=tu_base",
            "root",
            ""
        );
    }

    public static function obtenerTodos()
    {
        $db = self::getDb();
        return $db->query("SELECT * FROM mascotas")->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id)
    {
        $db = self::getDb();
        $stm = $db->prepare("SELECT * FROM mascotas WHERE mascota_id = ?");
        $stm->execute([$id]);
        return $stm->fetch(PDO::FETCH_ASSOC);
    }

    public static function insertar($nombre, $especie, $edad, $estado)
    {
        $db = self::getDb();
        $stm = $db->prepare(
            "INSERT INTO mascotas (nombre, especie, edad, estado)
             VALUES (?, ?, ?, ?)"
        );
        return $stm->execute([$nombre, $especie, $edad, $estado]);
    }

    public static function actualizar($id, $nombre, $especie, $edad, $estado)
    {
        $db = self::getDb();
        $stm = $db->prepare(
            "UPDATE mascotas SET nombre=?, especie=?, edad=?, estado=?
             WHERE mascota_id=?"
        );
        return $stm->execute([$nombre, $especie, $edad, $estado, $id]);
    }

    public static function eliminar($id)
    {
        $db = self::getDb();
        $stm = $db->prepare("DELETE FROM mascotas WHERE mascota_id=?");
        return $stm->execute([$id]);
    }
}
