<?php
class Funcionario
{
    
    // Atributos
    private $id;
    private $nome;
    private $email;
    private $telefone;
    private $senha;

    //Getters
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

    //Setters
    public function setId($Id) 
    {
        $this->id = $Id;
    }
    public function setNome($Nome) 
    {
        $this->nome = $Nome;
    }
    public function setEmail($Email) 
    {
        $this->email = $Email;
    }
    public function setTelefone($Telefone) 
    {
        $this->telefone = $Telefone;
    }
    public function setSenha($Senha) 
    {
        $this->senha = $Senha;
    }


    // Metodos
    public function AbrirFila($Id)
    {

    }
    public function FecharFila($Id)
    {

    }
    public function ChamarProximo($Id, $NumeroFila)
    {
        $ProximoNumero = $NumeroFila;
        return $ProximoNumero;
    }


}
?>