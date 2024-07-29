create database app_fila;
use app_fila;

create table users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone varchar(15) NOT NULL,
    senha VARCHAR(40) NOT NULL,
    numero_fila VARCHAR(10) NULL
);

create table estabelecimento(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    cnpj INT NOT NULL,
    descricao VARCHAR NOT NULL,
    logo VARCHAR(100) NOT NULL
);

create table funcionario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(60) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone INT NOT NULL
);

create table fila(
    id INT AUTO_INCREMENT PRIMARY KEY,
    tempoMedio FLOAT NOT NULL,
    qntPessoasFila INT NOT NULL
);





