<?php
require_once 'UsuarioDAO.php';
require_once '../Model/Usuario.php';
require_once '../Config/Database.php';
class UsuarioDAOImpl implements UsuarioDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }
    
    public function IniciarTimer($idUsuario)
    {
        $tempoInicio = microtime(true);
        $sql = "INSERT INTO users (TempoEspera) VALUES (:tempoInicio) where id = :idUsuario";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':tempoInicio', $tempoInicio);
        $statement->bindParam(':idUsuario', $idUsuario);
    }
    
    public function CalcularTempoMedio($idUsuario)
    {
        $TempoFim = microtime(true);
        $sql = "SELECT TempoEspera FROM users WHERE id = :idUsuario";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':idUsuario', $idUsuario);
        $statement->execute();
        $TempoEspera =  $statement->fetch(PDO::FETCH_ASSOC);

        $tempoMedio = $TempoEspera - $TempoFim;
        $sql = "UPDATE users SET TempoEspera = :TempoEspera WHERE id = :idUsuario";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':idUsuario', $idUsuario);
        $statement->bindParam(':TempoMedio',  $tempoMedio);
        $statement->execute();

    }

}
