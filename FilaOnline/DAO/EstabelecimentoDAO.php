<?php

interface EstabelecimentoDAO {  
    public function updateEstabelecimento($estabelecimento); // This should update a User object
    public function validaEstabelecimento($email, $senha);
    public function createEstabelecimento($estabelecimento);
    public function getAllEstabelecimento();
    function getFilaEstabelecimento($idEstabelecimento);
}

