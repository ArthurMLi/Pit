<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$idFila = isset($_GET['idfila']) ? $_GET['idfila'] : '';

if(isset($_SESSION['user_id'])){
    header("FilaController&action=entrarfila&id=$idFila");
}
