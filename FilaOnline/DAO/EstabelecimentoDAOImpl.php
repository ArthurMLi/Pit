<?php

require_once '../Config/Database.php';
require_once 'EstabelecimentoDAO.php';
require_once '../Model/Estabelecimento.php';

class EstabelecimentoDAOImpl Implements EstabelecimentoDAO{
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    
    public function validaConta($email, $senha) {
        $estabelecimento = new Estabelecimento();
        try {
            $statement = $this->conn->prepare("SELECT * FROM estabelecimento WHERE email = :email AND senha = :senha");
            $statement->bindParam(':email', $email);
            $statement->bindParam(':senha', $senha);
            $statement->execute();

            
            if ($statement->rowCount() > 0) {
                // passa as informações para o controller para ir pra uma sessão
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $estabelecimento->setId($row['id']);
                $estabelecimento->setNome($row['name']);
                $estabelecimento->setEmail($row['email']);
                $estabelecimento->setCnpj($row['cnpj']);
                $estabelecimento->setEndereco($row['endereco']);
                $estabelecimento->setDescricao($row['descricao']);
                $estabelecimento->setLogo($row['logo']);
                $estabelecimento->setSenha($row['senha']);
                return $estabelecimento;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $estabelecimento;
    }

    

    public function createConta($nome, $email, $cnpj, $endereco, $descricao, $senha) {
        try {
            $statement = $this->conn->prepare("INSERT INTO estabelecimento (name, email, cnpj, endereco, descricao, senha) VALUES (:name, :email, :cnpj, :endereco, :descricao, :senha)");
            $statement->bindParam(':name', $nome);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':cnpj', $cnpj);
            $statement->bindParam(':endereco', $endereco);
            $statement->bindParam(':descricao', $descricao);
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

    public function updateConta($id, $nome, $email, $cnpj, $endereco, $descricao, $logo, $senha) {
        $estabelecimento = new Estabelecimento();
        try {
            $statement = $this->conn->prepare("UPDATE estabelecimento SET name = :nome, email = :email, cnpj = :cnpj, :endereco = endereco, :descricao = descricao, :logo = logo WHERE id = :id");
            $statement->bindParam(':name', $nome);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':cnpj', $cnpj);
            $statement->bindParam(':endereco', $endereco);
            $statement->bindParam(':descricao', $descricao);
            $statement->bindParam(':logo', $logo);
            $statement->bindParam(':senha', $senha);
            $statement->bindParam(':id', $id);


            $statement->execute();

            
            if ($statement->rowCount() > 0) {
                // passa as informações para o controller para ir pra uma sessão
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                $estabelecimento->setId($row['id']);
                $estabelecimento->setNome($row['name']);
                $estabelecimento->setEmail($row['email']);
                $estabelecimento->setCnpj($row['cnpj']);
                $estabelecimento->setEndereco($row['endereco']);
                $estabelecimento->setDescricao($row['descricao']);
                $estabelecimento->setLogo($row['logo']);
                $estabelecimento->setSenha($row['senha']);
                return $estabelecimento;
            } else {
                return null;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        return $estabelecimento;
    }


}

?>