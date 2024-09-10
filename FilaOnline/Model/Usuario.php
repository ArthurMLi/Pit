<?php
class Usuario
{
    // Atributos
    public string $idFila;
    public string $numeroFila;

    //Getters
    public function getNumeroFila() 
    {
         return $this->numeroFila;
    }
    public function getIdFila() 
    {
         return $this->idFila;
    }


    //Setters
    public function setNumeroFila($NumeroFila) 
    {
        $this->numeroFila = $NumeroFila;
    }
    public function setIdFila($IdFila) 
    {
        $this->idFila = $IdFila;
    }

}
?>