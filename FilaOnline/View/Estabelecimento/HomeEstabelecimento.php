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
    <!-- Custom CSS -->
    <style>
        .navbar-nav .nav-link {
            color: #2e9fea !important;
            border: 1px solid #d3d3d3;
            border-radius: 4px;
            padding: 8px 12px;
            margin: 2px;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .navbar-nav .nav-link:hover {
            background-color: #e9f5fc;
            border-color: #2e9fea;
            color: #2e9fea !important;
        }
        .navbar-brand img {
            max-height: 50px;
        }
        .navbar {
            text-align: center;
        }
        .navbar-collapse {
            justify-content: center;
        }

        /* Estilos de design da página após o header */
        .container {
            margin-top: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            margin-top: 20px;
        }

        .card img {
            width: 100%;
            height: auto;
            max-height: 150px;
            object-fit: cover;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 10px;
            font-weight: bold;
        }

        .fila-info {
            text-align: left;
            margin-top: 10px;
        }

        .fila-info p {
            margin: 5px 0;
        }

        .fila-info .tempo-espera {
            color: #ff5722;
            font-weight: bold;
        }

        .fila-info .num-pessoas {
            color: #28a745;
            font-weight: bold;
        }

        .adicionar p{
            font-size: 550%;
            color: white;
        }
        .adicionar{
            background-color: #007bff;
            width: 100%;
            max-height: 150px;
            object-fit: cover;
            border-radius: 2%;
            text-decoration: none;
            color: inherit; 
        }
        a:hover, a:focus {
        text-decoration: none; /* Evita o sublinhado ao passar o mouse */
        color: inherit; /* Mantém a cor ao passar o mouse */
        }

        /* Responsividade para dispositivos móveis */
        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }
            .col-md-6 {
                width: 100%;
            }
        }
    </style>
</head>
<body>

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

<!-- Lista de Filas -->
<div class="container">
    <div class="row">

    
    <div class="col-md-6 col-lg-3">
            
            <div class="card">
            <a class="adicionar" href="../View/Estabelecimento/cadastrofila.php"> <p>+</p> </a>
        </div>
        </div>

        
            
            <?php if (!empty($filas)): ?>
                <?php foreach ($filas as $fila): ?>
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
