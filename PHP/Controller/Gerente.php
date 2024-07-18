<?php
public class Gerente : Funcionario
{
    // Atibutos
    private int $id;
    

    //Getters
    public function getId() 
    {
         return $this->id;
    }

    //Setters
    public function setId($Id) 
    {
        $this->id = $Id;
    }
  
    

}
?>