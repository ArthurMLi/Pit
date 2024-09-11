<?php

interface FuncionarioDAO {  
    public function updateFuncionario($id, $nome, $email, $telefone); // Atualiza os dados de um funcionário
    public function validaFuncionario($email, $senha); // Valida as credenciais de login do funcionário
    public function createFuncionario($nome, $email, $telefone, $senha); // Cria um novo funcionário
}

