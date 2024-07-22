<?php
public class Usuario
{
    // Atributos
    public string $numeroFila;

    //Getters
    public function getNumeroFila() 
    {
         return $this->numeroFila;
    }

    //Setters
    public function setNumeroFila($NumeroFila) 
    {
        $this->numeroFila = $NumeroFila;
    }

}
?>