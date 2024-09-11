<?php

require_once '../Config/Database.php';
require_once 'FuncionarioDAO.php';
require_once '../Model/Funcionario.php';

class FuncionarioDAOImpl implements FuncionarioDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function validaFuncionario($email, $senha) {
        $funcionario = new Funcionario();
        try {
            $statement = $this->conn->prepare("SELECT * FROM funcionario WHERE email = :email AND senha = :senha");
            $statement->bindParam(':email', $email);
            $statement->bindParam(':senha', $senha);
            $statement->execute();

            if ($statement->rowCount() > 0) {
                // Passa as informações para o controller para iniciar uma sessão
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $funcionario->setId($row['id']);
                $funcionario->setNome($row['nome']);
                $funcionario->setEmail($row['email']);
                $funcionario->setTelefone($row['telefone']);
                $funcionario->setSenha($row['senha']);
                return $funcionario;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        return $funcionario;
    }

    public function createFuncionario($nome, $email, $telefone, $senha) {
        try {
            $statement = $this->conn->prepare("INSERT INTO funcionario (nome, email, telefone, senha) VALUES (:nome, :email, :telefone, :senha)");
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':telefone', $telefone);
            $statement->bindParam(':senha', $senha);
            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
    }

    public function updateFuncionario($id, $nome, $email, $telefone) {
        $funcionario = new Funcionario();
        try {
            $statement = $this->conn->prepare("UPDATE funcionario SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id");
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':telefone', $telefone);
            $statement->bindParam(':id', $id);

            $statement->execute();

            if ($statement->rowCount() > 0) {
                $funcionario->setId($id);
                $funcionario->setNome($nome);
                $funcionario->setEmail($email);
                $funcionario->setTelefone($telefone);
                return $funcionario;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
        }
        return $funcionario;
    }
}

?>
