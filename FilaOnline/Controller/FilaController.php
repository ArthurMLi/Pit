<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once '../Model/Fila.php';
include_once '../DAO/FilaDAOImpl.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : null;
$fila = new Fila();
$filaDao = new FilaDAOImpl();


class FilaController
{

    private FilaDAO $filaDAOl; // Propriedade declarada com tipo

    public function __construct($conn)
    {
        // Injeção de dependência do DAO
        $this->filaDAOl = new FilaDAOImpl($conn);
    }

    public function listarFilas()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Obtém todas as filas do banco de dados via DAO
        $filas = $this->filaDAOl->getAllFilas();
        $_SESSION['filas'] = $filas;
        // Inclui a View, passando os dados das filas
        echo("A");
        header("Location: ../View/Estabelecimento/HomeEstabelecimento.php");
        exit();
    }
}


switch ($action) {

    case 'create_fila':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $fila->setEstabelecimentoFila($_SESSION['user_id']);
            $fila->setNome($_POST['nome']);
            $fila->setEndereco($_POST['endereco']);
            // $fila->setImg($_POST['img']);
            $fila->setInicio($_POST['inicio']);
            $fila->setTermino($_POST['termino']);

            if (
                $filaDao->createFila(
                    $fila->getEstabelecimentoFila(),
                    $fila->getNome(),
                    $fila->getEndereco(),
                    // $fila->getImg(),
                    $fila->getInicio(),
                    $fila->getTermino()
                )
            ) {
                header('Location: ../Controller/FilaController?action=readall_fila');
                // displayMessage('Fila criada com sucesso!', '../View/Estabelecimento/HomeEstabelecimento.php');
            } else {
                displayMessage('Erro ao criar a fila.');
            }
        }
        break;
    case 'readall_fila':
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $conn = Database::getConnection();
        $filaController = new FilaController($conn);
        $filaController->listarFilas();
        break;

    default:
        displayMessage('Ação não reconhecida.');
        break;

}



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