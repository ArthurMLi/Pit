<?php
class Fila
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
    public function EntrarFila($IdFila, $NumeroFila)
    {
        $this->Usuario->setNumeroFila($NumeroFila);
    }
    public function SairFila($IdFila)
    {
        return $this->Usuario->getNumeroFila();
    }
    public function AvaliarFila($IdFila)
    {
        $NotaFila = 5;
        return $NotaFila;
    }
    private function CalcularMedia()
    {
        return 0;
    }

}
?>