<header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-2">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="http://localhost/Queue/FilaOnline/index">
            <img src="../../img/logo01.png" alt="Logo" style="max-height: 45px;">
        </a>

        <!-- Toggler Button for Mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav mx-auto text-center">
                <!-- Link Home -->
                <a class="nav-item nav-link active" href="http://localhost/Queue/FilaOnline">Home <span class="sr-only">(Página atual)</span></a>

                <!-- Condições para usuários não logados -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a class="nav-item nav-link" href="../Usuario/Login.php">
                        Login
                    </a>
                <?php endif; ?>

                <!-- Link para Estabelecimentos -->
                <a class="nav-item nav-link" href="../../Controller/EstabelecimentoController?action=readall_estabelecimento">
                    Estabelecimentos
                </a>

                <!-- Condições para usuários logados -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <a class="nav-item nav-link text-muted"><b>Deslogado</b></a>
                <?php else: ?>
                    <a class="nav-item nav-link" href="Perfil">
                        Perfil
                    </a>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        
                    <a class="nav-item nav-link" href="../../Controller/FilaController?action=readfila_usuario&id=<?php echo htmlspecialchars($_SESSION['user_id'])?>">
                       Sua Fila
                    </a>
                   
                    <?php endif ?>
                    <a class="nav-item nav-link" href="../Logout">
                        Sair
                    </a>
                    <?php if (!isset($_SESSION['user_name'])): ?>
                    <a class="nav-item nav-link text-muted"><b></b></a>
                <?php else: ?>
                    <a class="nav-item nav-link text-primary">
                        <b><?php echo $_SESSION['user_name']; ?></b>
                    </a>
                    <?php endif ?>
                    <!-- Verificação se é um estabelecimento -->
                    <?php if (isset($_SESSION['estabelecimento'])): ?>
                    <a class="nav-item nav-link text-muted"><b></b></a>
                <?php else: ?>
                        <a class="nav-item nav-link text-success">
                            <i class="fas fa-store"></i> Estabelecimento
                        </a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>

<!-- Bootstrap JS and Icons -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!-- Google Fonts for modern typography -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    /* Aplicando a fonte Poppins para uma tipografia mais moderna */
    body, .nav-link {
        font-family: 'Poppins', sans-serif !important;
    }

    /* Removendo bordas dos botões */
    .navbar-nav .nav-link {
        border: none;
        outline: none;
        transition: background-color 0.3s, color 0.3s;
    }

    /* Hover state para os links */
    .nav-link:hover {
        background-color: #e9f5fc;
        color: #2e9fea;
    }

    /* Ajustando o tamanho do cabeçalho para torná-lo mais compacto */
    .navbar {
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .navbar-toggler-icon {
        background-color: #2e9fea;
    }

    .navbar-nav .nav-item {
        padding-left: 15px;
        padding-right: 15px;
    }

    /* Centraliza a navbar */
    .navbar-nav {
        justify-content: center;
        text-align: center;
    }
</style>
