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
    public function createFila($idEstabelecimento, $nome, $endereco, $inicio, $termino)
    {
        try {
            $statement = $this->conn->prepare("INSERT INTO fila (idEstabelecimento, nome, endereco, img, inicio, termino) VALUES (:idEstabelecimento, :nome, :endereco, '', :inicio, :termino)");
            $statement->bindParam(':idEstabelecimento', $idEstabelecimento);
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':endereco', $endereco);
            // $statement->bindParam(':img', $img);
            $statement->bindParam(':inicio', $inicio);
            $statement->bindParam(':termino', $termino);
            return $statement->execute();
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

            return $statement->execute();

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

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteFila($idFila)
    {

        $sql = "DELETE FROM fila WHERE id = :idFila";

        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':idFila', $idFila);

        return $statement->execute();
    }
}
