<?php

require_once '../Config/Database.php';
require_once 'EstabelecimentoDAO.php';
require_once '../Model/Estabelecimento.php';

class EstabelecimentoDAOImpl Implements EstabelecimentoDAO{
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    
    public function validaEstabelecimento($email, $senha) {
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
                // $estabelecimento->setLogo($row['logo']);
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

    

    public function createEstabelecimento($estabelecimento) {
        try {
            $statement = $this->conn->prepare("INSERT INTO estabelecimento (name, email, cnpj, endereco, descricao, senha, logo) 
                                               VALUES (:nome, :email, :cnpj, :endereco, :descricao, :senha, :logo)");
    
            // Use bindValue para passar os valores diretamente
            $statement->bindValue(':nome', $estabelecimento->getNome());
            $statement->bindValue(':email', $estabelecimento->getEmail());
            $statement->bindValue(':cnpj', $estabelecimento->getCnpj());
            $statement->bindValue(':endereco', $estabelecimento->getEndereco());
            $statement->bindValue(':descricao', $estabelecimento->getDescricao());
            $statement->bindValue(':senha', $estabelecimento->getSenha());
            $statement->bindValue(':logo', $estabelecimento->getLogo());

    
            // Execute a query e retorne o resultado
            return $statement->execute();
            
        } catch (PDOException $e) {
            throw $e;
        }
    }
    
    public function updateEstabelecimento($estabelecimento) {
        try {
            $statement = $this->conn->prepare("UPDATE estabelecimento SET name = :nome, email = :email, cnpj = :cnpj, endereco = :endereco, descricao = :descricao, logo = :logo WHERE id = :id");
    
            // Use bindValue para passar os valores diretamente
            $statement->bindValue(':nome', $estabelecimento->getNome());
            $statement->bindValue(':email', $estabelecimento->getEmail());
            $statement->bindValue(':cnpj', $estabelecimento->getCnpj());
            $statement->bindValue(':endereco', $estabelecimento->getEndereco());
            $statement->bindValue(':descricao', $estabelecimento->getDescricao());
            $statement->bindValue(':logo', $estabelecimento->getLogo());
            $statement->bindValue(':id', $estabelecimento->getId());
    
            // Executa a query
            $statement->execute();
    
            // Verifica se alguma linha foi afetada
            if ($statement->rowCount() > 0) {
                // Atualização bem-sucedida, você pode retornar o objeto atualizado
                return $estabelecimento;
            } else {
                // Nenhuma linha foi atualizada
                return null;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    
        return $estabelecimento;
    }

    function getAllEstabelecimento()
    {

        $sql = "SELECT * FROM estabelecimento";
        $statement = $this->conn->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function getFilaEstabelecimento($idEstabelecimento)
    {
    try {
        $sql = "SELECT estabelecimento.id, NAME nomeempresa, EMAIL, CNPJ, estabelecimento.ENDERECO enderecoestabelecimento, descricao, logo, senha, fila.id idFila, nome nomefila, tempomedio, qntpessoasfila, fila.endereco enderecofila, img, inicio, termino FROM ESTABELECIMENTO LEFT JOIN FILA ON(estabelecimento.id = fila.idEstabelecimento) WHERE estabelecimento.id = $idEstabelecimento;";

        $statement = $this->conn->query($sql);

        if ($statement->rowCount() > 0) {
            // Atualização bem-sucedida, você pode retornar o objeto atualizado
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } else {
            // Nenhuma linha foi atualizada
            return null;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }    
        
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}
