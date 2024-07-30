<?php
class Conta 
{
    // Atributos
    
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $senha;


    // Getters
    public function getId() 
    {
        return $this->id;
    }
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
    public function getSenha() 
    {
        return $this->senha;
    }
     
    // Setters
    public function setId($id) 
    {
        $this->id = $id;
    }
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
    public function setSenha($senha) 
    {
        $this->senha = $senha;
    }



    
}
?>