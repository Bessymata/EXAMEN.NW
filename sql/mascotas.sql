-- ================================
--TABLA MASCOTAS--
-- ================================

DROP TABLE IF EXISTS mascotas;

CREATE TABLE mascotas (
    mascota_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    especie VARCHAR(50) NOT NULL,
    edad INT NOT NULL,
    estado VARCHAR(20) NOT NULL
);

-- INSERTS (MINIMO 20 REGISTROS)
INSERT INTO
    mascotas (nombre, especie, edad, estado)
VALUES ('Luna', 'Perro', 3, 'Activo'),
    ('Milo', 'Gato', 2, 'Activo'),
    ('Rocky', 'Perro', 5, 'Activo'),
    ('Nala', 'Gato', 1, 'Activo'),
    (
        'Toby',
        'Perro',
        4,
        'Inactivo'
    ),
    ('Simba', 'Gato', 6, 'Activo'),
    ('Max', 'Perro', 2, 'Activo'),
    ('Coco', 'Loro', 8, 'Activo'),
    ('Bella', 'Perro', 7, 'Activo'),
    ('Leo', 'Gato', 3, 'Inactivo'),
    (
        'Daisy',
        'Conejo',
        2,
        'Activo'
    ),
    (
        'Charlie',
        'Perro',
        1,
        'Activo'
    ),
    ('Lucy', 'Gato', 4, 'Activo'),
    ('Buddy', 'Perro', 6, 'Activo'),
    (
        'Molly',
        'Perro',
        5,
        'Inactivo'
    ),
    ('Jack', 'Gato', 2, 'Activo'),
    ('Lola', 'Perro', 3, 'Activo'),
    ('Oscar', 'Gato', 7, 'Activo'),
    (
        'Chispa',
        'Hamster',
        1,
        'Activo'
    ),
    ('Thor', 'Perro', 4, 'Activo');