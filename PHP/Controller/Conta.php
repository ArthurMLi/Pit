<?php
public class Conta : Usuario
{
    // Atributos
    protected string $nome;
    private string $email;
    protected int $telefone;

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