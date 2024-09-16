<?php

include_once '../Model/Fila.php';
include_once '../DAO/FilaDAOImpl.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$filaDao = new FilaDAOImpl();
$fila = new Fila();


switch ($action) {

case 'create_fila':
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fila->setEstabelecimentoFila($_POST['estabelecimento_fila']);
        $fila->setNome($_POST['nome']);
        $fila->setEndereco($_POST['endereco']);
        $fila->setImg($_POST['img']);
        $fila->setInicio($_POST['inicio']);
        $fila->setTermino($_POST['termino']);

        if ($filaDao->createFila(
            $fila->getEstabelecimentoFila(),
            $fila->getNome(),
            $fila->getEndereco(),
            $fila->getImg(),
            $fila->getInicio(),
            $fila->getTermino()
        )) {
            displayMessage('Fila criada com sucesso!', '../View/Fila/HomeFila.php');
        } else {
            displayMessage('Erro ao criar a fila.');
        }
    }
    break;

default:
    displayMessage('Ação não reconhecida.');
    break;




}