<?php

include_once '../Model/Conta.php';
include_once '../Model/ContaDAO.php';
// class ContaController{

//     private $db;
//     private $conta;
    
//     private $ContaDAO;
//     private $action;
//     private $id;

//     public function __construct($db) {
//         $this->db = $db;
//         $this->conta = new Conta($db);
//         $this->ContaDAO = new ContaDAO();
        
//         $this->teste();
        
//     }
// }

    $conta = new Conta($db);
    $ContaDAO = new ContaDAO($db);
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $id = isset($_GET['id']) ? $_GET['id']: null;
    switch ($action) {
        case 'create_conta':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $conta->name = $_POST['name'];
                $conta->email  = $_POST['email'];
                $conta->telefone  = $_POST['telefone'];
                $conta->senha = $_POST['senha'];
                if($ContaDAO->create()) {
                    echo 'Usuário criado.';
                    echo '<a href="index.php?action=users">Back to Task User</a>';
                } else {
                    echo 'Não foi possível criar usuário.';
                }
                echo 'TESTE';
            } else {
                include 'views/user/create.php';
            }
            
        break;

        // case 'valida_user':
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     $username = $_POST['username'];
        //     $password = $_POST['password'];
        //     $message = $userController->create($name, $email);
        //     echo $message;
        //     echo '<a href="index.php?action=users">Back to Task User</a>';
        // } else {
        //     include 'views/user/create.php';
        // }
        // break;
        default:
        echo 'erro';
        break;
    }

?>


