<?php

require_once '../Config/Database.php';
require_once 'ContaDAO.php';
require_once '../Model/Conta.php';

class ContaDAOImpl Implements ContaDAO{
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    
    public function validaConta($email, $senha) {
        $conta = new Conta();
        try {
            $statement = $this->conn->prepare("SELECT * FROM conta WHERE email = :email AND senha = :senha");
            $statement->bindParam(':email', $email);
            $statement->bindParam(':senha', $senha);
            $statement->execute();

            
            if ($statement->rowCount() > 0) {
                // passa as informações para o controller para ir pra uma sessão
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $conta->setId($row['id']);
                $conta->setName($row['name']);
                $conta->setEmail($row['email']);
                $conta->setTelefone($row['telefone']);
                $conta->setSenha($row['senha']);
                return $conta;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $conta;
    }

    

    public function createConta($nome, $email, $telefone, $senha) {
        try {
            $statement = $this->conn->prepare("INSERT INTO conta (name, email, telefone,senha) VALUES (:name, :email, :telefone, :senha)");
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

    public function updateConta($id, $nome, $email, $telefone) {
        $conta = new Conta();
        try {
            $statement = $this->conn->prepare("UPDATE conta SET name = :nome, email = :email, telefone = :telefone WHERE id = :id");
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':telefone', $telefone);
            $statement->bindParam(':id', $id);

            $statement->execute();

            
            if ($statement->rowCount() > 0) {
                // passa as informações para o controller para ir pra uma sessão
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $conta->setId($id);
                $conta->setName($nome);
                $conta->setEmail($email);
                $conta->setTelefone($telefone);
                return $conta;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $conta;
    }
}

?>