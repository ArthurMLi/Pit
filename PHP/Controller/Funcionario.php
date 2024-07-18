<?php
public class Funcionario
{
    
    // Atributos
    protected int $id;
    protected string $nome;
    private string $email;
    protected int $telefone;

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


    // Metodos
    public void AbrirFila(int Id)
    {

    }
    public void FecharFila(int Id)
    {

    }
    public string ChamarProximo(int Id, string NumeroFila)
    {
        string ProximoNumero = NumeroFila;
        return ProximoNumero;
    }


}
?>