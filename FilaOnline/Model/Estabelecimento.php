<?php
class Estabelecimento
{
    // Atributos
    public $id;
    private $nome;
    private $email;
    private $cnpj;
    private $endereco;
    private $descricao;
    private $logo;
    private $senha;

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
     public function getCnpj() 
     {
         return $this->cnpj;
     }
     public function getEndereco() 
     {
         return $this->endereco;
     }
     public function getDescricao() 
     {
         return $this->descricao;
     }
     public function getLogo() 
     {
         return $this->logo;
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
     public function setNome($nome) 
     {
         $this->nome = $nome;
     }
     public function setEmail($email) 
     {
         $this->email = $email;
     }
     public function setCnpj($cnpj) 
     {
         $this->cnpj = $cnpj;
     }
     public function setEndereco($endereco) 
     {
         $this->endereco = $endereco;
     }
     public function setDescricao($descricao) 
     {
         $this->descricao = $descricao;
     }
     public function setLogo($logo) 
     {
         $this->logo = $logo;
     }
     public function setSenha($senha) 
     {
         $this->senha = $senha;
     }
}
?>