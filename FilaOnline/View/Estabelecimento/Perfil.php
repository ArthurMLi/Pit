<?php
session_start();
// if (!isset($_SESSION['user_id'])) {
    ?>
    <!-- <!DOCTYPE html>
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
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            text-align: center;
            /* Ajuste a posição do container */
            margin-top: 20px;
        }    
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Deslogado</h1>
            <p><a href="../index.php">Voltar para página inicial</a></p>
        </div>
    </body>
    </html> -->
    <?php
    // exit;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Perfil</title>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="css/PerfilEstabQueue.css">
<script src="js/Cadastro.js" type="text/javascript" defer></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
        include "../Layout/HeaderEstabelecimento.php"
    ?>
    
<main>
    <div class="profile-container">
        <div class="profile-card">
        
            
            <form class="form-horizontal" action="../../Controller/EstabelecimentoController?action=update_conta" method="post" enctype="multipart/form-data">
                <div class="profile-img-container">
                <?php if (isset($_SESSION['logoEstabelecimento'])): ?>
                    <img class="profile-img" src="data:image/jpeg;base64,<?php echo htmlspecialchars($_SESSION['logoEstabelecimento']); ?>" alt="Foto do perfil" />
                    <?php endif; ?>
                    <h3 class="profile-username"><?php echo $_SESSION['user_name']; ?></h3>
                    <label class="btn btn-primary btn-block">
                        Trocar foto de perfil
                        <input type="file" name="logo" id="logo" accept="image/*" style="display: none;">
                    </label>
        
                </div>
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['nomeEstabelecimento']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['emailEstabelecimento']; ?>">
                </div>
                <div class="form-group">
                    <label for="cnpj">Cnpj</label>
                    <input type="text" class="form-control" id="cnpj" name="cnpj" value="<?php echo $_SESSION['cnpjEstabelecimento']; ?>">
                </div>
                <div class="form-group">
                    <label for="Endereco">Endereco</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $_SESSION['enderecoEstabelecimento']; ?>">
                </div>
                <div class="form-group">
                    <label for="descricao">Descricao</label>
                    <input type="text" class="form-control" id="descricao" name="descricao" value="<?php echo $_SESSION['descricaoEstabelecimento']; ?>">
                </div>
                <div class="form-group">
                    <label for="senha">Senha</label>
                    <input type="text" class="form-control" id="senha" name="senha" value="<?php echo $_SESSION['senhaEstabelecimento']; ?>">
                </div>
                <button type="submit" class="btn btn-danger">Salvar alterações</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>
