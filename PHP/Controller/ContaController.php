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
                    echo 'Registro inserido com sucesso!<br>Volte a pagina de login:<a href="../View/Login">Retornar</a>';
                } else {
                    echo 'Erro ao inserir o registro.';
                }
            }
            
        break;
        case 'valida_conta':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                
                $conta = $contaDao->validaConta($email, $senha);
                if(isset($conta)){
                    session_start();
                    $_SESSION['user_id'] = $conta->getId();
                    $_SESSION['user_name'] = $conta->getName();
                    $_SESSION['user_email'] = $conta->getEmail();
                    $_SESSION['user_telefone'] = $conta->getTelefone();
                    header('Location: ../View/Estabelecimentos');
                    exit();
                } else {
                    echo 'Nome de usuário ou senha incorretos';
                }
                
            }
        break;
        case 'update_conta':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                session_start();
                $id = $_SESSION['user_id'];
                
                $conta = $contaDao->updateConta($id, $nome, $email, $telefone);
                if(isset($conta)){
                    session_start();
                    $_SESSION['user_id'] = $conta->getId();
                    $_SESSION['user_name'] = $conta->getName();
                    $_SESSION['user_email'] = $conta->getEmail();
                    $_SESSION['user_telefone'] = $conta->getTelefone();
                    header('Location: ../View/Perfil');
                    exit();
                } else {
                    echo 'Nome de usuário ou senha incorretos';
                }
                
            }
            break;
        default:
        echo 'erro';
        break;
    }

?>


