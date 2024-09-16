<?php

interface FilaDAO {  

    public function createFila($idEstabelecimento, $nome, $endereco, $img, $inicio, $termino);
    function updateFila($idFila, $nome, $endereco, $img);
    function getFila($idFila);
    function getAllFilas();
    function deleteFila($idFila);
}

