<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filas</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="View/css/main.css">
    <script src="js/HomeEstabelecimento.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<!-- header include-->
<?php
include "View/Layout/header.php";
?>

<nav>
    <div class="background"><img src="http://localhost/Queue/FilaOnline/img/banner.png" alt=""></div>
</nav>
<div class="container01">
    <div class="text-section">
    <br><div class="section-title">O QUE SOMOS?</div><br>
        <div class="about-company">
    <p>A Queue é uma empresa que busca otimizar melhor o tempo que você gastaria esperando em filas!</p>
    <p>Somos a única empresa no mercado que permite você ter uma média do tempo gasto na fila e, também, a única que permite que você crie sua própria fila, mesmo sem ser uma empresa.</p>
</div>

    </div>
</div>
<br>
<div class="text-section">
        <div class="section-title">O QUE É POSSÍVEL FAZER?</div><br>
    <div class="feature-list">
        <div class="feature-item">
            <span class="feature-number">1</span>
            Entrar na fila de forma remota
        </div>
        <div class="feature-item">
            <span class="feature-number">2</span>
            Visualizar o tempo previsto que será gasto nesta fila
        </div>
        <div class="feature-item">
            <span class="feature-number">3</span>
            Opção de criar sua própria fila
        </div>
        <div class="feature-item">
            <span class="feature-number">4</span>
            Ver quantas pessoas tem na sua frente na fila
        </div>
    </div>
</div>
    

</body>

</html>