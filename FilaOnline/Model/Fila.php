<?php
class Fila {
    private $id;
    private $numeroPessoas;
    private $estabelecimentoFila;
    private $nome;
    private $tempoMedio;
    private $pessoasFila;
    private $endereco;
    private $img;
    private $inicio;
    private $termino;

    // Getters
     public function getId() {
        return $this->id;
    }

    public function getNumeroPessoas() {
        return $this->numeroPessoas;
    }

    public function getEstabelecimentoFila() {
        return $this->estabelecimentoFila;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTempoMedio() {
        return $this->tempoMedio;
    }

    public function getPessoasFila() {
        return $this->pessoasFila;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getImg() {
        return $this->img;
    }
    public function getInicio() {
        return $this->inicio;
    }
    public function getTermino() {
        return $this->termino;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setNumeroPessoas($numeroPessoas) {
        $this->numeroPessoas = $numeroPessoas;
    }

    public function setEstabelecimentoFila($estabelecimentoFila) {
        $this->estabelecimentoFila = $estabelecimentoFila;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTempoMedio($tempoMedio) {
        $this->tempoMedio = $tempoMedio;
    }

    public function setPessoasFila($pessoasFila) {
        $this->pessoasFila = $pessoasFila;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setImg($img) {
        $this->img = $img;
    }
    public function setInicio($inicio) {
        $this->inicio = $inicio;
    }
    public function setTermino($termino) {
        $this->termino = $termino;
    }

    // Metodos
    private FilaDAO $filaDAO; // Propriedade declarada com tipo

    public function __construct()
    {
        // Injeção de dependência do DAO
        $this->filaDAO = new FilaDAOImpl();
    }

    //public function entrarFila($userId, $filaId) {
    //    $this->filaDAO->entrarFila($userId, $filaId);
    //}
    
}


