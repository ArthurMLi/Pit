create database app_fila;

use app_fila;

create table conta (
    id INT AUTO_INCREMENT not null PRIMARY KEY,
    name VARCHAR(60),
    email VARCHAR(100) unique,
    telefone varchar(15),
    senha VARCHAR(40),
    foto text,
    numeroFila VARCHAR(10),
    tempoEspera float,
    filaAtual int
);

create table estabelecimento(
    id INT AUTO_INCREMENT not null PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL unique,
    cnpj VARCHAR(18) NOT NULL,
    endereco VARCHAR(100) NOT NULL,
    descricao VARCHAR(100) NOT NULL,
    logo text NOT NULL,
    senha VARCHAR(40) NOT NULL
);

create table funcionario(
    id INT AUTO_INCREMENT not null PRIMARY KEY,
    idEstabelecimento INT not null,
    cargo varchar(20) not null,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone INT NOT NULL,
    FOREIGN KEY (idEstabelecimento) REFERENCES estabelecimento(id)
);

create table fila(
    id INT AUTO_INCREMENT not null PRIMARY KEY,
    idEstabelecimento INT not null,
    nome text not null,
    tempoMedio FLOAT NULL,
    qntPessoasFila INT NULL,
    endereco text NOT NULL,
    img text NOT NULL,
    inicio time,
    termino time,
    FOREIGN KEY (idEstabelecimento) REFERENCES estabelcimento(id)
);


CREATE TABLE fila_usuario (
    idFila INT NOT NULL,
    idUsuario INT NOT NULL,
    entrada_fila datetime default CURRENT_TIMESTAMP,
    PRIMARY KEY (idFila, idUsuario),
    FOREIGN KEY (idFila) REFERENCES fila(id),
    FOREIGN KEY (idUsuario) REFERENCES users(id)
);

CREATE TABLE historico_fila(
    idFila INT NOT NULL,
    idUsuario INT NOT NULL,
    entrada_fila datetime default CURRENT_TIMESTAMP,
    ultima_atualizacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (idFila, idUsuario)
);

DELIMITER $
CREATE TRIGGER UPDATE_FILA
BEFORE DELETE ON fila_usuario
FOR EACH ROW
BEGIN
    INSERT INTO historico_fila (idFila, idUsuario,entrada_fila , ultima_atualizacao)
    VALUES (OLD.idFila, OLD.idUsuario, old.entrada_fila, CURRENT_TIMESTAMP)
    ON DUPLICATE KEY UPDATE ultima_atualizacao = CURRENT_TIMESTAMP;
END$
DELIMITER ;
