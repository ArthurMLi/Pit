<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Deslogado</title>
        <style>
            /* Reset básico */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            html, body {
                height: 100%;
                font-family: Arial, sans-serif;
                background-color: #3a0647;
                color: #fff;
                display: flex;
                justify-content: center;
                align-items: center;
                margin: 0;
            }

            .container {
                text-align: center;
                background-color: #fff;
                color: #333;
                padding: 30px;
                border-radius: 10px;
                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            }

            .container h1 {
                font-size: 24px;
                margin-bottom: 20px;
                color: #3a0647;
            }

            .container a {
                color: #66b1e3;
                text-decoration: none;
                font-size: 16px;
                font-weight: bold;
                transition: color 0.3s ease;
            }

            .container a:hover {
                color: #4fa7e2;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Deslogado</h1>
            <p><a href="../index.php">Voltar para página inicial</a></p>
        </div>
    </body>
    </html>
    <?php
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Perfil</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="css/Perfil.css">
<script src="js/Cadastro.js" type="text/javascript" defer></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../">FilaOnline</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="../">Home <span class="sr-only">(Página atual)</span></a>
            <a class="nav-item nav-link" href="Login">Login</a>
            <a class="nav-item nav-link" href="Estabelecimentos">Estabelecimentos</a>
            <a class="nav-item nav-link" href="Perfil">Perfil</a>
            <a class="nav-item nav-link" href="Logout">Sair</a>
        </div>
    </div>
</nav>
<main>
    <div class="profile-container">
        <div class="profile-card">
            <form class="form-horizontal" action="../Controller/ContaController?action=update_img" method="post">
                <div class="profile-img-container">
                    <img class="profile-img" src="" alt="Foto do perfil" />
                    <h3 class="profile-username"><?php echo $_SESSION['user_name']; ?></h3>
                    <button type="submit" class="btn btn-primary btn-block">Editar foto</button>
                </div>
            </form>
            <form class="form-horizontal" action="../Controller/ContaController?action=update_conta" method="post">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['user_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user_email']; ?>">
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $_SESSION['user_telefone']; ?>" maxlength="15">
                </div>
                <button type="submit" class="btn btn-danger">Salvar alterações</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>
