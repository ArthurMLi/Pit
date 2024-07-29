<?php

include_once 'Conta.php';
include_once '../Controller/ContaController.php';
include_once '../COnfig/Database.php';
class ContaDAO {
    
    public $table_name = "users";
    public $conn;
    public $database;
    public $db;
    public $conta;
    public function __construct($db) {
        $this->database = new Database();
        $this->db = $database->getConnection();
        $this->conn = $db;
        $this->conta = new Conta();
    }
    // Create - Criar um novo usuário
    public function create() {
    $query = "INSERT INTO " . $this->table_name . " (name, email, telefone, senha) VALUES (:name, :email, :telefone, :senha)";
    $stmt = $this->conn->prepare($query);

    // Sanitize inputs
    $this->conta->name = htmlspecialchars(strip_tags($this->conta->name));
    $this->conta->email = htmlspecialchars(strip_tags($this->conta->email));
    $this->conta->telefone = htmlspecialchars(strip_tags($this->conta->email));
    $this->conta->senha = htmlspecialchars(strip_tags($this->conta->email));
    // Bind parameters
    $stmt->bindParam(':name', $this->conta->name);
    $stmt->bindParam(':email', $this->conta->email);
    $stmt->bindParam(':telefone', $this->conta->telefone);
    $stmt->bindParam(':senha', $this->conta->senha);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

}
?>