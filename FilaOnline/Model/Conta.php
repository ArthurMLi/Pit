<?php

class Conta 
{
    // Atributos
    
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $senha;
    private $foto;

    
    
    
    
    // Getters
    public function getId() 
    {
        return $this->id;
    }
    
    public function getNome() 
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
    public function getFoto() 
    {
        return $this->foto;
    }
    
    // Setters
    public function setId($id) 
    {
        $this->id = $id;
    }
    public function setNome($nome) 
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
    public function setFoto($foto) 
    {
        //so para debug
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION['foto'] = $foto;
        $this->foto = $foto;
    }



    
}
