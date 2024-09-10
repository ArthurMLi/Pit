<?php
class Usuario
{
    // Atributos
    public string $id;
    public string $numeroFila;
    public float $tempoEspera;  

    //Getters+
    public function getNumeroFila() 
    {
         return $this->numeroFila;
    }
    public function getId() 
    {
         return $this->id;
    }
    public function getTempoEspera() 
    {
         return $this->tempoEspera;
    }



    //Setters
    public function setNumeroFila($NumeroFila) 
    {
        $this->numeroFila = $NumeroFila;
    }
    public function setIdFila($Id) 
    {
        $this->id = $Id;
    }
    public function setTempoEspera($tempoEspera) 
    {
        $this->tempoEspera = $tempoEspera;
    }


}
?>