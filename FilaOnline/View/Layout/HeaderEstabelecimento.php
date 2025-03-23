<header class="navbar navbar-expand-lg navbar-light bg-light shadow-sm py-2">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="http://localhost/Queue/FilaOnline/index">
            <img src="../../img/logo01.png" alt="Logo" style="max-height: 45px;">
        </a>

        <!-- Toggler Button for Mobile -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
                aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <!-- Link Fila -->
                <li class="nav-item">
                    <a class="nav-link" href="../Estabelecimento/HomeEstabelecimento">
                        <i class="fas fa-list-alt"></i> Filas
                    </a>
                </li>

                <!-- Condições para usuários não logados -->
                <?php if (!isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../Estabelecimento/LoginEstabelecimento.php">
                            <i class="fas fa-sign-in-alt"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted"><b>Deslogado</b></a>
                    </li>
                <?php else: ?>
                    <!-- Links para usuários logados -->
                    <li class="nav-item">
                        <a class="nav-link" href="Perfil">
                            <i class="fas fa-user-circle"></i> Perfil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary"><b><?php echo $_SESSION['user_name']; ?></b></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../Logout">
                            <i class="fas fa-sign-out-alt"></i> Sair
                        </a>
                    </li>
                    <!-- Verificação se é um estabelecimento -->
                    <?php if ($_SESSION['estabelecimento']): ?>
                        <li class="nav-item">
                            <a class="nav-link text-success">
                                <i class="fas fa-store"></i>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
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
</style>
