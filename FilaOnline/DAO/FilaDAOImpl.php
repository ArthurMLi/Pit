<?php
require_once '../Config/Database.php';
require_once 'FilaDAO.php';
require_once '../Model/Fila.php';

class FilaDAOImpl implements FilaDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    public function createFila($idEstabelecimento, $nome, $endereco, $img)
    {
        try {
            $statement = $this->conn->prepare("INSERT INTO fila (idEstabelecimento, nome, endereco, img) VALUES (:idEstabelecimento, :nome, :endereco, :img)");
            $statement->bindParam(':idEstabelecimento', $idEstabelecimento);
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':endereco', $endereco);
            $statement->bindParam(':img', $img);
            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    }

    function updateFila($idFila, $nome, $endereco, $img)
    {
        try {
            $sql = "UPDATE fila SET nome = :nome, endereco = :endereco, img = :img WHERE id = :idFila";

            $statement = $this->conn->prepare($sql);

            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':endereco', $endereco);
            $statement->bindParam(':img', $img);
            $statement->bindParam(':idFila', $idFila);

            if ($statement->execute()) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    function getFila($idFila)
    {
        $sql = "SELECT * FROM fila WHERE id = :idFila";

        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':idFila', $idFila);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    function getAllFilas()
    {

        $sql = "SELECT * FROM fila";

        $statement = $this->conn->query($sql);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
    function deleteFila($idFila)
    {

        $sql = "DELETE FROM fila WHERE id = :idFila";

        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':idFila', $idFila);

        if ($statement->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
