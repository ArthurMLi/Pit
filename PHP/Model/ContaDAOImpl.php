<?php

require_once 'Database.php';
require_once 'ContaDAO.php';
require_once 'Conta.php';

class ContaDAOImpl implements ContaDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getAllContas() {
        $conta = array();
        try {
            $statement = $this->conn->query("SELECT * FROM users");
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $conta = new Conta();
                $conta->setId($row['id']);
                $conta->setName($row['name']);
                $conta->setEmail($row['email']);
                $conta->setTelefone($row['telefone']);
                $conta->setSenha($row['senha']);
                $contas[] = $conta;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $contas;
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

    public function updateConta($conta) {
        try {
            $statement = $this->conn->prepare("UPDATE users SET name=?, email=?, telefone=?, senha=? WHERE id=?");
            $statement->execute([$conta->getName(), $conta->getEmail(), $conta->getId(), $conta->getTelefone(), $conta->getSenha()]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function createConta() {
        try {
            $statement = $this->conn->prepare("INSERT INTO users (name, email, telefone, senha) VALUES (name=?, email=?, telefone=?, senha=?)");
            $statement->execute([$conta->getName(), $conta->getEmail(), $conta->getId(), $conta->getTelefone(), $conta->getSenha()]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteConta($conta) {
        try {
            $statement = $this->conn->prepare("DELETE FROM users WHERE id=?");
            $statement->execute([$conta->getId()]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>