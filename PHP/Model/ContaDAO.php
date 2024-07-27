<?php

include_once 'Model/Conta.php';

public class ContaDAO {
    $c = new Conta();
    public $table_name = "conta";
    private $conn;
    
    public function insertConta($c){
        //Chama conexão com banco 
        $c->getName();
    }
    // Create - Criar um novo usuário
    public function create() {
    $query = "INSERT INTO " . $this->table_name . " (name, email, telefone) VALUES (:name, :email, :telefone)";
    $stmt = $this->conn->prepare($query);

    // Sanitize inputs
    $this->name = htmlspecialchars(strip_tags($this->name));
    $this->email = htmlspecialchars(strip_tags($this->email));

    // Bind parameters
    $stmt->bindParam(':name', $this->name);
    $stmt->bindParam(':email', $this->email);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

}
?>