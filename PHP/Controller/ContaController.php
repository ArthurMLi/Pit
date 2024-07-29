<?php

include_once '../Model/Conta.php';
include_once '../Model/ContaDAOImpl.php';

    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $id = isset($_GET['id']) ? $_GET['id']: null;
    $contaDao = new ContaDAOImpl();
    $conta = new Conta();
    switch ($action) {
        case 'create_conta':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $conta->setName($_POST['nome']);
                $conta->setEmail($_POST['email']);
                $conta->setTelefone($_POST['telefone']);
                $conta->setSenha($_POST['senha']);
            
                if ($contaDao->createConta($conta->getName(),$conta->getEmail(),$conta->getTelefone(),$conta->getSenha(),)) {
                    $_SESSION['mensagem'] = 'Registro inserido com sucesso!';
                } else {
                    $_SESSION['mensagem'] = 'Erro ao inserir o registro.';
                }
            }
            
        break;
        default:
        echo 'erro';
        break;
    }

?>


