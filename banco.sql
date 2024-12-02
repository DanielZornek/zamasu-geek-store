CREATE DATABASE bancoZamasuStore
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;
USE bancoZamasuStore;

CREATE TABLE USUARIO (
    cd_usuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nm_usuario VARCHAR(100) NOT NULL,
    nm_email_usuario VARCHAR(100) NOT NULL,
    nm_senha_usuario VARCHAR(60) NOT NULL,
    cd_telefone_usuario VARCHAR(30),
    nm_endereco_usuario VARCHAR(120) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE PRODUTO (
    cd_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nm_produto VARCHAR(100) NOT NULL,
    ds_produto VARCHAR(255) NOT NULL,
    nm_categoria VARCHAR(40) NOT NUll,
    caminho_imagem VARCHAR(120) NOT NULL,
    vl_produto DECIMAL(10, 2) NOT NULL,
    qt_estoque_produto INT NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE CARRINHO (
    cd_carrinho INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cd_usuario_fk INT NOT NULL,
    cd_produto_fk INT NOT NULL,
    quantidade INT NOT NULL,
    FOREIGN KEY (cd_usuario_fk) REFERENCES USUARIO(cd_usuario),
    FOREIGN KEY (cd_produto_fk) REFERENCES PRODUTO(cd_produto)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE RECIBO (
    cd_recibo INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cd_usuario_fk INT NOT NULL,
    dt_recibo DATETIME NOT NULL,
    qt_produtos_recibo INT NOT NULL,
    vl_total_recibo DECIMAL(10, 2) NOT NULL,
    nm_metodo_pagamento VARCHAR(50) NOT NULL,
    nm_endereco_usuario VARCHAR(255) NOT NULL,
    FOREIGN KEY (cd_usuario_fk) REFERENCES USUARIO(cd_usuario)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE Recibo_Produto (
    cd_recibo_produto INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cd_recibo_fk INT NOT NULL,
    cd_produto_fk INT NOT NULL,
    qt_produto_recibo INT NOT NULL,
    vl_recibo_produto DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (cd_recibo_fk) REFERENCES RECIBO(cd_recibo),
    FOREIGN KEY (cd_produto_fk) REFERENCES PRODUTO(cd_produto)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

CREATE TABLE ADMIN(
    usuario VARCHAR(40) NOT NULL,
    senha VARCHAR(40) NOT NULL
)CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

INSERT INTO ADMIN VALUES("admin", "admin");

