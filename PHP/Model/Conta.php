<?php
class Conta 
{
    // Atributos
    
    public $id;
    public $nome;
    public $email;
    public $telefone;

    public function __construct() {
        
    }

    // Getters
    public function getName() 
    {
        return $this->nome;
    }
    public function getEmail() 
    {
        return $this->email;
    }
    public function getTelefone() 
    {
        return $this->telefone;
    }
     
    // Setters
    public function setName($nome) 
    {
        $this->nome = $nome;
    }
    public function setEmail($email) 
    {
        $this->email = $email;
    }
    public function setTelefone($telefone) 
    {
        $this->telefone = $telefone;
    }



    
}
?>