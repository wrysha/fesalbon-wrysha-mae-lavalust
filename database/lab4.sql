CREATE DATABASE IF NOT EXISTS mydb
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE mydb;

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    username VARCHAR(100) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users (id, firstname, lastname, email, username) VALUES
    (1, 'Amara', 'Villanueva', 'amara.villanueva@example.com', 'amarav'),
    (2, 'Nico', 'Castillo', 'nico.castillo@example.com', 'nicoc'),
    (3, 'Lia', 'Navarro', 'lia.navarro@example.com', 'lian'),
    (4, 'Gabriel', 'Ramos', 'gabriel.ramos@example.com', 'gabrielr'),
    (5, 'Sofia', 'Mendoza', 'sofia.mendoza@example.com', 'sofiam')
ON DUPLICATE KEY UPDATE
    firstname = VALUES(firstname),
    lastname = VALUES(lastname),
    email = VALUES(email),
    username = VALUES(username);
