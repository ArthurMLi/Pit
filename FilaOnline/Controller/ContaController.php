<?php

include_once '../Model/Conta.php';
include_once '../DAO/ContaDAOImpl.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$contaDao = new ContaDAOImpl();
$conta = new Conta();

function displayMessage($message, $redirectUrl = null)
{
    echo '<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            text-align: center;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>' . htmlspecialchars($message) . '</p>';
    if ($redirectUrl) {
        echo '<a href="' . htmlspecialchars($redirectUrl) . '">Voltar</a>';
    }
    echo '  </div>
</body>
</html>';
}

switch ($action) {
    case 'create_conta':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $conta->setName($_POST['nome']);
            $conta->setEmail($_POST['email']);
            $conta->setTelefone($_POST['telefone']);
            $conta->setSenha($_POST['senha']);

            if (
                $contaDao->createConta(
                    $conta->getName(),
                    $conta->getEmail(),
                    $conta->getTelefone(),
                    $conta->getSenha()
                )
            ) {
                displayMessage('Registro inserido com sucesso!', '../View/Estabelecimentos.php');
            } else {
                displayMessage('Erro ao inserir o registro.');
            }
            $conta = $contaDao->validaConta($conta->getEmail(), $conta->getSenha());
            
                session_start();
                $_SESSION['user_id'] = $conta->getId();
                $_SESSION['user_name'] = $conta->getName();
                $_SESSION['user_email'] = $conta->getEmail();
                $_SESSION['user_telefone'] = $conta->getTelefone();
                
                exit();
            
        }
        break;

    case 'valida_conta':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $conta = $contaDao->validaConta($email, $senha);
            if ($conta == null) {
                displayMessage('Nome de usuário ou senha incorretos', '../View/Login.php');
            } else {
                session_start();
                $_SESSION['user_id'] = $conta->getId();
                $_SESSION['user_name'] = $conta->getName();
                $_SESSION['user_email'] = $conta->getEmail();
                $_SESSION['user_telefone'] = $conta->getTelefone();
                header('Location: ../View/Estabelecimentos.php');
                exit();
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
            if ($conta) {
                $_SESSION['user_id'] = $conta->getId();
                $_SESSION['user_name'] = $conta->getName();
                $_SESSION['user_email'] = $conta->getEmail();
                $_SESSION['user_telefone'] = $conta->getTelefone();
                header('Location: ../View/Perfil.php');
                exit();
            } else {
                displayMessage('Erro ao atualizar o registro.');
            }
        }
        break;

    default:
        displayMessage('Ação não reconhecida.');
        break;
}

?>