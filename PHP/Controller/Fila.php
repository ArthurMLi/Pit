<?php
public class Fila
{
    // Atributos
    public int $NumeroPessoas;
    public string $EstabelecimentoFila;
    public DateTime $TempoMedio;
    public string $PessoasFila;
    private Usuario $Usuario = new Usuario();

    // Getters 
    public function getNumeroPessoas() 
    {
         return $this->NumeroPessoas;
    }
    public function getEstabelecimentoFila() 
    {
         return $this->EstabelecimentoFila;
    }
    public function getTempoMedio() 
    {
         return $this->TempoMedio;
    }
    public function getPessoasFila() 
    {
         return $this->PessoasFila;
    }
    public function getUsuario() 
    {
         return $this->Usuario;
    }
    
    // Setters
    public function setNumeroPessoas($NumeroPessoas) 
    {
        $this->NumeroPessoas = $NumeroPessoas;
    }
    public function setEstabelecimentoFila($EstabelecimentoFila) 
    {
        $this->EstabelecimentoFila = $EstabelecimentoFila;
    }
    public function setTempoMedio($TempoMedio) 
    {
        $this->TempoMedio = $TempoMedio;
    }
    public function setPessoasFila($PessoasFila) 
    {
        $this->PessoasFila = $PessoasFila;
    }
    public function setUsuario($Usuario) 
    {
        $this->Usuario = $Usuario;
    }

    // Metodos
    public void EntrarFila(int IdFila, string NumeroFila)
    {
        this.Usuario.numerofila = NumeroFila;
    }
    public string SairFila(int IdFila)
    {
        return this.Usuario.numerofila;
    }
    public int AvaliarFila(int IdFila)
    {
        int NotaFila = 5;
        return NotaFila;
    }
    private int CalcularMedia()
    {
        return 0;
    }

}
?>