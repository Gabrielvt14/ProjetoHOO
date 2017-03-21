CREATE DATABASE hoo;

CREATE TABLE usuarios(
	id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- id
    nome VARCHAR(80) NOT NULL, -- nome
    email VARCHAR(100) NOT NULL, -- email
    senha NOT NULL, -- senha
    nasc DATE NOT NULL, -- data de nascimento
    PRIMARY KEY(id)
) COLLATE=utf8_unicode_ci;