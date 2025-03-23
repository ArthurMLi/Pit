<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . '/../Model/Estabelecimento.php');
include_once(__DIR__ . '/../DAO/EstabelecimentoDAOImpl.php');

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$estabelecimentoDao = new EstabelecimentoDAOImpl();
$estabelecimento = new Estabelecimento();

$conn = Database::getConnection();
$estabelecimentoController = new EstabelecimentoController();
class EstabelecimentoController
{

    private EstabelecimentoDAO $estabelecimentoDAOl; // Propriedade declarada com tipo

    public function __construct()
    {
        // Injeção de dependência do DAO
        $this->estabelecimentoDAOl = new EstabelecimentoDAOImpl();
    }
    public function listarEstabelecimentos()
    {
        // Obtém todas as filas do banco de dados via DAO
        $allestabelecimentos = $this->estabelecimentoDAOl->getAllEstabelecimento();
        $_SESSION['estabelecimentos'] = $allestabelecimentos;

        header("Location: ../View/Usuario/Estabelecimentos.php");
        exit();
    }
    public function listarFilaEstabelecimento($idEstabelecimento)
    {
        // Obtém todas as filas do banco de dados via DAO
        $filaestabelecimento = $this->estabelecimentoDAOl->getFilaEstabelecimento($idEstabelecimento);
        if(isset($filaestabelecimento)){
            $_SESSION['filasestabelecimento'] = $filaestabelecimento;

            header("Location: ../View/Usuario/FilasPEstabelecimento.php");
            exit();
        } else {
            displayMessage('Estabelecimento sem fila', '../View/Usuario/Estabelecimentos.php');
        }
    }
    public function validaConta($email, $senha)
    {
        $estabelecimentos = $this->estabelecimentoDAOl->validaEstabelecimento($email, $senha);
        if ($estabelecimentos == null) {
            displayMessage('Nome de usuário ou senha incorretos', '../View/Estabelecimento/LoginEstabelecimento.php');
        } else {
            $_SESSION['user_id'] = $estabelecimentos->getId();
            $_SESSION['user_name'] = $estabelecimentos->getNome();
            $_SESSION['estabelecimento'] = true;
            $_SESSION['nomeEstabelecimento'] = $estabelecimentos->getNome();
            $_SESSION['emailEstabelecimento'] = $estabelecimentos->getEmail();
            $_SESSION['cnpjEstabelecimento'] = $estabelecimentos->getCnpj();
            $_SESSION['enderecoEstabelecimento'] = $estabelecimentos->getEndereco();
            $_SESSION['descricaoEstabelecimento'] = $estabelecimentos->getDescricao();
            $_SESSION['logoEstabelecimento'] = $estabelecimentos->getLogo();
            $_SESSION['senhaEstabelecimento'] = $estabelecimentos->getSenha();

            header("Location: ../Controller/FilaController?action=readfila_estabelecimentoid&id=" . htmlspecialchars($estabelecimentos->getId()));

            exit();
        }
    }

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
            // Coloca foto
            $file = $_FILES['foto']['tmp_name'];
            if (is_uploaded_file($file)) {
                $imageData = file_get_contents($file);
                $base64 = base64_encode($imageData);
                $estabelecimento->setlogo($base64);
            } else {$defaultImagePath = 'C:\wamp64\www\Queue\FilaOnline\Img\Conta.png';

                $defaultImageData = file_get_contents($defaultImagePath);
                $defaultBase64 = base64_encode($defaultImageData);
                $estabelecimento->setlogo($defaultBase64);
            }


            try {
                $conta = $estabelecimentoDao->createEstabelecimento($estabelecimento);

                if ($conta) {
                    $estabelecimentoController->validaConta($estabelecimento->getEmail(), $estabelecimento->getSenha());
                } else {
                    displayMessage('Erro ao inserir o registro.');
                }
            } catch (PDOException $e) {
                // Verifica se o erro é de chave única (email duplicado)
                if ($e->getCode() === '23000' && strpos($e->getMessage(), 'Duplicate entry') !== false) {
                    displayMessage('O email informado já está em uso. Por favor, utilize outro email.');
                } else {
                    // Mensagem genérica para outros erros
                    displayMessage('Erro ao inserir o registro. Tente novamente mais tarde.');
                }
            }

        }
        break;

    case 'valida_conta':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $estabelecimentoController->validaConta($email, $senha);
            break;
        }
        break;

    case 'update_conta':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $estabelecimento->setNome($_POST['nome']);
            $estabelecimento->setEmail($_POST['email']);
            $estabelecimento->setCnpj($_POST['cnpj']);
            $estabelecimento->setEndereco($_POST['endereco']);
            $estabelecimento->setDescricao($_POST['descricao']);
            $file = $_FILES['logo']['tmp_name'];
            if (is_uploaded_file($file)) {
                $imageData = file_get_contents($file);
                $base64 = base64_encode($imageData);
                $estabelecimento->setlogo($base64);}
            $estabelecimento->setSenha($_POST['senha']);

            $estabelecimento->setId($_SESSION['user_id']);

            $estabelecimentos = $estabelecimentoDao->updateEstabelecimento($estabelecimento);
            if ($estabelecimentos) {
                $_SESSION['user_id'] = $estabelecimento->getId();
                $_SESSION['user_name'] = $estabelecimentos->getNome();
                $_SESSION['nomeEstabelecimento'] = $estabelecimentos->getNome();
                $_SESSION['emailEstabelecimento'] = $estabelecimentos->getEmail();
                $_SESSION['cnpjEstabelecimento'] = $estabelecimentos->getCnpj();
                $_SESSION['enderecoEstabelecimento'] = $estabelecimentos->getEndereco();
                $_SESSION['descricaoEstabelecimento'] = $estabelecimentos->getDescricao();
                $_SESSION['logoEstabelecimento'] = $estabelecimentos->getLogo();
                $_SESSION['senhaEstabelecimento'] = $estabelecimentos->getSenha();
                header('Location: ../View/Estabelecimento/Perfil.php');
                exit();
            } else {
                displayMessage('Erro ao atualizar o registro.');
            }
        }
        break;

    case 'readall_estabelecimento':

        $estabelecimentoController->listarEstabelecimentos();
        break;

    case 'readfila_estabelecimento':
        $estabelecimentoController->listarFilaEstabelecimento($id);
        break;

    default:
        displayMessage('Ação não reconhecida.');
        break;
}


function displayMessage($message, $redirectUrl = null)
{
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

?>