<?php

require_once '../Config/Database.php';
require_once 'ContaDAO.php';
require_once 'Conta.php';

class ContaDAOImpl{
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    
    public function getConta($id) {
        $conta = new Conta();
        try {
            $statement = $this->conn->prepare("SELECT * FROM users WHERE id=?");
            $statement->execute([$id]);
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            if ($row) {
                $conta->setId($row['id']);
                $conta->setName($row['name']);
                $conta->setEmail($row['email']);
                $conta->setTelefone($row['telefone']);
                $conta->setSenha($row['senha']);
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $conta;
    }

    

    public function createConta($nome, $email, $telefone, $senha) {
        try {
            $statement = $this->conn->prepare("INSERT INTO users (name, email, telefone,senha) VALUES (:name, :email, :telefone, :senha)");
            $statement->bindParam(':name', $nome);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':telefone', $telefone);
            $statement->bindParam(':senha', $senha);
            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>