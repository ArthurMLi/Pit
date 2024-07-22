<?php
public class Estabelecimento
{
    // Atributos
    public int $id;
    protected string $nome;
    private int $cnpj;
    protected string $descricao;
    private string $logo;

     // Getters
     public function getId() 
     {
         return $this->id;
     }
     public function getNome() 
     {
         return $this->nome;
     }
     public function getCnpj() 
     {
         return $this->cnpj;
     }
     public function getDescricao() 
     {
         return $this->descricao;
     }
     public function getLogo() 
     {
         return $this->logo;
     }
      
     // Setters
     public function setName($id) 
     {
         $this->id = $id;
     }
     public function setNome($nome) 
     {
         $this->nome = $nome;
     }
     public function setCnpj($cnpj) 
     {
         $this->cnpj = $cnpj;
     }
     public function setDescricao($descricao) 
     {
         $this->descricao = $descricao;
     }
     public function setLogo($logo) 
     {
         $this->logo = $logo;
     }
}
?>