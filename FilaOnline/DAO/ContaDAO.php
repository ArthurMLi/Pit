<?php

interface ContaDAO {  
    public function updateConta($id, $nome, $email, $telefone); // This should update a User object
    public function validaConta($email, $senha);
    public function createConta($nome, $email, $telefone, $senha);
}

