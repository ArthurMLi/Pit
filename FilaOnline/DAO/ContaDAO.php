<?php

interface ContaDAO {  
    public function updateConta($conta); // This should update a User object
    public function validaConta($email, $senha);
    public function createConta($conta);
}

