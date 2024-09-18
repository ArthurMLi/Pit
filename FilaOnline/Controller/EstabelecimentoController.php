<?php

require_once(__DIR__ . '/../Model/Estabelecimento.php');
include_once(__DIR__ . '/../DAO/EstabelecimentoDAOImpl.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$estabelecimentoDao = new EstabelecimentoDAOImpl();
$estabelecimento = new Estabelecimento();

function displayMessage($message, $redirectUrl = null) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
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
            $estabelecimento->setNome($_POST['nome']);
            $estabelecimento->setEmail($_POST['email']);
            $estabelecimento->setCnpj($_POST['cnpj']);
            $estabelecimento->setEndereco($_POST['endereco']);
            $estabelecimento->setDescricao($_POST['descricao']);
            $estabelecimento->setSenha($_POST['senha']);

            if ($estabelecimentoDao->createConta(
                $estabelecimento->getNome(),
                $estabelecimento->getEmail(),
                $estabelecimento->getCnpj(),
                $estabelecimento->getEndereco(),
                $estabelecimento->getDescricao(),
                $estabelecimento->getSenha()
            )) {

                $estabelecimentos = $estabelecimentoDao->validaConta($estabelecimento->getEmail(),$estabelecimento->getSenha());
            if ($estabelecimentos == null) {
                displayMessage('Nome de usuário ou senha incorretos', '../View/Login.php');
            } else
                session_start();
                $_SESSION['user_id'] = $estabelecimento->getId();
                $_SESSION['user_name'] = $estabelecimento->getNome();
                $_SESSION['user_email'] = $estabelecimento->getEmail();
                $_SESSION['user_cnpj'] = $estabelecimento->getCnpj();
                $_SESSION['user_endereco'] = $estabelecimento->getEndereco();
                $_SESSION['user_descricao'] = $estabelecimento->getDescricao();
                $_SESSION['estabelecimento'] = true;
                header('Location: ../View/Estabelecimento/HomeEstabelecimento.php');
                exit();
                // displayMessage('Registro inserido com sucesso!', '../View/Estabelecimento/index.php');
            } else {
                displayMessage('Erro ao inserir o registro.');
            }
        }
        break;

    case 'valida_conta':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $estabelecimento = $estabelecimentoDao->validaConta($email, $senha);
            if ($estabelecimento == null) {
                displayMessage('Nome de usuário ou senha incorretos', '../View/Login.php');
            } else {
                session_start();
                $_SESSION['user_id'] = $estabelecimento->getId();
                $_SESSION['user_name'] = $estabelecimento->getNome();
                $_SESSION['user_email'] = $estabelecimento->getEmail();
                $_SESSION['user_cnpj'] = $estabelecimento->getCnpj();
                $_SESSION['user_endereco'] = $estabelecimento->getEndereco();
                $_SESSION['user_descricao'] = $estabelecimento->getDescricao();
                $_SESSION['estabelecimento'] = true;
                header('Location: ../View/Estabelecimento/index.php');
                exit();
            }
        }
        break;

    case 'update_conta':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            $cnpj = $_POST['cnpj'];
            $endereco = $_POST['endereco'];
            $descricao = $_POST['descricao'];
            $logo = $_POST['logo'];

            session_start();
            $id = $_SESSION['user_id'];

            $estabelecimento = $estabelecimentoDao->updateConta(
                $id,
                $nome,
                $email,
                $telefone,
                $cnpj,
                $endereco,
                $descricao,
                $logo
            );
            if ($estabelecimento) {
                $_SESSION['user_id'] = $estabelecimento->getId();
                $_SESSION['user_name'] = $estabelecimento->getNome();
                $_SESSION['user_email'] = $estabelecimento->getEmail();
                $_SESSION['user_cnpj'] = $estabelecimento->getCnpj();
                $_SESSION['user_endereco'] = $estabelecimento->getEndereco();
                $_SESSION['user_descricao'] = $estabelecimento->getDescricao();
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
