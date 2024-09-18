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
    <link rel="stylesheet" href="css/HomeEstabelecimento.css">

</head>


<!-- Navbar -->
<header class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../"><img src="../img/logo01.png" alt="Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(Página atual)</span></a>
            <a class="nav-item nav-link" href="../../View/Login">Login</a>

            <?php
            if (!isset($_SESSION['user_id'])) {
                echo '<a class="nav-item nav-link"><b>Deslogado</b></a>';
            } else {
                echo '<a class="nav-item nav-link" href="../Perfil">Perfil</a>
                      <a class="nav-item nav-link" href="Logout">Sair</a>
                      <a class="nav-item nav-link"><b>' . $_SESSION['user_name'] . '</b></a>';
                if (isset($_SESSION['estabelecimento'])) {
                    echo '<a class="nav-item nav-link"><b>Estabelecimento</b></a>';
                }
            }
            ?>
        </div>
    </div>
</header>
<?php
    
    ?>
<!-- Lista de Filas -->
<div class="container">
    <div class="row">

    
    <div class="col-md-6 col-lg-3">
            
            <div class="card">
            <a class="adicionar" href="../Estabelecimento/cadastrofila.php"> <p>+</p> </a>
        </div>
        </div>

        
            
            <?php if (!empty($_SESSION['filas'])): ?>
                <?php foreach ($_SESSION['filas'] as $fila): ?>
        <div class="col-md-6 col-lg-3">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Fila 1">
                <div class="card-header"><?php echo htmlspecialchars($fila['nome']); ?></div>
                <div class="fila-info">
                    <p><strong>Endereço:</strong> <?php echo htmlspecialchars($fila['endereco']); ?></p>
                    <p class="tempo-espera">Tempo de espera: </p>
                    <p class="num-pessoas">Pessoas na fila: </p>
                    <p><strong>Inicio:</strong> <?php echo htmlspecialchars($fila['inicio']); ?> </p>
                    <p><strong>Termino:</strong> <?php echo htmlspecialchars($fila['termino']); ?> </p>
                    <p><strong>Prévia das pessoas:</strong> </p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma fila cadastrada.</p>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
