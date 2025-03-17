CREATE DATABASE doces_vovo;

USE doces_vovo;

SET time_zone = '-03:00';

CREATE TABLE sugestoes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    mensagem TEXT NOT NULL,
    data_envio TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);