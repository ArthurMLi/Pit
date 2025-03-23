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
    public function createFila($fila)
    {
        try {
            $statement = $this->conn->prepare("INSERT INTO fila (idEstabelecimento, nome, endereco, img, inicio, termino) 
                                           VALUES (:idEstabelecimento, :nome, :endereco, :img, :inicio, :termino)");

            // Use bindValue para associar os valores
            $statement->bindValue(':idEstabelecimento', $fila->getEstabelecimentoFila());
            $statement->bindValue(':nome', $fila->getNome());
            $statement->bindValue(':endereco', $fila->getEndereco());
            $statement->bindValue(':img', $fila->getImg());
            //$statement->bindValue(':inicio', $fila->getInicio());
            $statement->bindValue(':inicio', $fila->getInicio());
            $statement->bindValue(':termino', $fila->getTermino());

            // Executa e retorna o resultado da operação
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    function updateFila($fila)
    {
        try {
            $sql = "UPDATE fila SET nome = :nome, endereco = :endereco, inicio = :inicio, termino = :termino  WHERE id = :idFila";

            $statement = $this->conn->prepare($sql);

            $statement->bindValue(':nome', $fila->getNome());
            $statement->bindValue(':endereco', $fila->getEndereco());

            $statement->bindValue(':idFila', $fila->getId());
            $statement->bindValue(':inicio', $fila->getInicio());
            $statement->bindValue(':termino', $fila->getTermino());

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

    function getAllFilasPorEstabelecimento($idEstabelecimento)
    {
        $sql = "SELECT * FROM fila where idEstabelecimento = :idEstabelecimento";
        $statement = $this->conn->prepare($sql);
        $statement->bindParam(':idEstabelecimento', $idEstabelecimento);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function getFilaUsuario($idUsuario)
    {
        try{
        $sql = "SELECT filaAtual from conta WHERE id = $idUsuario;";

        $statement = $this->conn->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (PDOException $e) {
        throw $e;
    }
    }
    function GetFilaId($idFila)
    {
        $sql = "SELECT * from fila left join fila_usuario on(fila.id = idFila) WHERE fila.id = $idFila order by entrada_fila ;";

        $statement = $this->conn->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteFila($idFila)
    {
        $sql = "DELETE FROM fila WHERE id = $idFila";

        $statement = $this->conn->prepare($sql);

        return $statement->execute();
    }
    function verificarFilaUsuario($idUsuario)
    {
        $sql = "SELECT * from fila_usuario where idUsuario = $idUsuario;";

        $statement = $this->conn->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    function entrarFila($idUsuario, $idFila)
    {
        try {
            $sql = "INSERT into fila_usuario (idFila ,idUsuario) values ($idFila, $idUsuario);";

            $statement = $this->conn->prepare($sql);

            $statement->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        try {
            $sql = "UPDATE conta SET filaAtual = $idFila WHERE id = $idUsuario;;";

            $statement = $this->conn->prepare($sql);


            return $statement->execute();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    function passarUsuario($filaId)
    {
        try {
            $sql = "SELECT idUsuario FROM fila_usuario ORDER BY entrada_fila ASC LIMIT 1;";
            $stmt = $this->conn->query($sql);

            $primeiro_da_fila = $stmt->fetchColumn();

            if ($primeiro_da_fila != false) {
                $sql = "delete from fila_usuario where idFila = $filaId and idUsuario = $primeiro_da_fila ;";
                $stmt = $this->conn->prepare(query: $sql);

                return $stmt->execute();
            } else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }

    }
    function voltarUsuario($filaId)
    {
        try {
            $sql = "SELECT idUsuario, entrada_fila FROM historico_fila WHERE idFila = :filaId ORDER BY ultima_atualizacao DESC LIMIT 1;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':filaId', $filaId, PDO::PARAM_INT);
            $stmt->execute();

            // Fetch both values in one go
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result) {
                return false; // Retorna falso se não houver nenhum resultado
            }

            $ultimo_saida = $result['idUsuario'];
            $entrada = $result['entrada_fila'];

            // Insert na tabela fila_usuario com parâmetros
            $sql = "INSERT INTO fila_usuario (idFila, idUsuario, entrada_fila) VALUES (:filaId, :idUsuario, :entrada_fila);";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':filaId', $filaId, PDO::PARAM_INT);
            $stmt->bindParam(':idUsuario', $ultimo_saida, PDO::PARAM_INT);
            $stmt->bindParam(':entrada_fila', $entrada);
            $inserir = $stmt->execute();

            if ($inserir) {
                // Delete na tabela historico_fila com parâmetros
                $sql = "DELETE FROM historico_fila WHERE idFila = :filaId AND idUsuario = :idUsuario;";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':filaId', $filaId, PDO::PARAM_INT);
                $stmt->bindParam(':idUsuario', $ultimo_saida, PDO::PARAM_INT);
                $stmt->execute();
            }

            return $inserir;

        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
    function contarPessoasFila($filaId)
    {
        $sql = "SELECT count(idUsuario) FROM fila_usuario where idFila = $filaId;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    function getTempoPor5PessoaEntrada($filaId){
        $sql = "SELECT entrada_fila FROM historico_fila where idFila = $filaId limit 5;";

        $statement = $this->conn->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
    function getTempoPor5PessoaSaida($filaId){
        $sql = "SELECT ultima_atualizacao FROM historico_fila where idFila = $filaId limit 5;";
        
        $statement = $this->conn->query($sql);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}

