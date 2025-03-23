<head>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fila - Detalhes</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="FilaUsuario.css">
    <script src="FilaUsuario.js "></script>
</head>
<body>
    
    <?php
include_once "../Layout/HeaderUsuario.php";
    ?>
    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    console.log('jQuery version:', $.fn.jquery); // Deve exibir a versão do jQuery no console
</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div id="fila">
<?php include 'FilaUsuarioComp.php' ?>
</div>
</body>
</html>