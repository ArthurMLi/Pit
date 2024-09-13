<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();

    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codigo Fila</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Estabelecimentos.css">
</head>

<body>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .navbar-nav .nav-link {
            color: #2e9fea !important; /* Cor personalizada para os links */
            border: 1px solid #d3d3d3; /* Borda cinza claro */
            border-radius: 4px; /* Borda arredondada */
            padding: 8px 12px; /* Espaçamento interno */
            margin: 2px; /* Espaçamento entre os links */
            transition: background-color 0.3s, border-color 0.3s; /* Transição suave para o hover */
        }
        .navbar-nav .nav-link:hover {
            background-color: #e9f5fc; /* Cor de fundo ao passar o mouse */
            border-color: #2e9fea; /* Cor da borda ao passar o mouse */
            color: #2e9fea !important; /* Cor do texto ao passar o mouse */
        }
        .navbar-brand img {
            max-height: 50px; /* Ajuste a altura da imagem do logotipo */
        }
        .navbar {
            text-align: center; /* Centraliza o texto no header */
        }
        .navbar-collapse {
            justify-content: center; /* Centraliza o conteúdo da barra de navegação */
        }
    </style>
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../"><img src="../img/logo01.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="../">Home <span class="sr-only">(Página atual)</span></a>
                <a class="nav-item nav-link" href="Login">Login</a>
                <a class="nav-item nav-link" href="Estabelecimentos">Estabelecimentos</a>

                <?php
                if (!isset($_SESSION['user_id'])) {
                    echo '<a class="nav-item nav-link"><b>Deslogado</b></a>';
                } else {
                    echo '<a class="nav-item nav-link" href="Perfil">Perfil</a><a class="nav-item nav-link" href="Logout">Sair</a><a class="nav-item nav-link"><b>' . $_SESSION['user_name'] . '</b></a>';
                    if (!isset($_SESSION['estabelecimento'])) {
                        echo '';
                    } else {
                        echo '<a class="nav-item nav-link"><b>Estabelecimento</b></a>';
                    }
                }
                ?>
            </div>
        </div>
    </header>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>