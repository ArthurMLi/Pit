<?php
public class inserirNoBanco{

    private $db;
    private $conta;

    public function __construct($db) {
        $this->db = $db;
        $this->conta = new Conta($db);
    }


    // Obter a ação e o ID (se aplicável) dos parametros da URL
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $id = isset($_GET['id']) ? $_GET['id']: null;

    // Determinar a ação do usuario
    switch ($action) {
        case 'valida_user':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $message = $userController->create($name, $email);
            echo $message;
            echo '<a href="index.php?action=users">Back to Task User</a>';
        } else {
            include 'views/user/create.php';
        }
        break;


    $c = new Conta();
    c::setName("João"); //aqui se pegaria o dado da view

    //aqui vai chamar o metodo de rodar a inserção no banco
    $daoConta = new ContaDAO();
    ContaDAO::insertConta($this->c);
}

?>


