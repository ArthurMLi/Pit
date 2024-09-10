<?php

interface EstabelecimentoDAO {  
    public function updateConta($nome, $email, $telefone, $cnpj, $endereco, $descricao, $logo, $senha); // This should update a User object
    public function validaConta($email, $senha);
    public function createConta($nome, $email, $cnpj, $endereco, $descricao, $senha);
}

