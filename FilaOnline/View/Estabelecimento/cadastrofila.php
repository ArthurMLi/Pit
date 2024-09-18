<!DOCTYPE html>
<html lang="pt-BR">
<head>
<?php
    session_start();    
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fila</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
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
<body>
<header class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../"><img src="../../img/logo01.png" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(Página atual)</span></a>
                <a class="nav-item nav-link" href="../Login">Login</a>

                <?php
                if (!isset($_SESSION['user_id'])) {
                    echo '<a class="nav-item nav-link"><b>Deslogado</b></a>';
                } else {
                    echo '<a class="nav-item nav-link" href="../Perfil">Perfil</a><a class="nav-item nav-link" href="Logout">Sair</a><a class="nav-item nav-link"><b>' . $_SESSION['user_name'] . '</b></a>';
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Cadastro de Fila</h3>
            </div>
            <div class="card-body">
            <form id="filaForm" action="../../Controller/FilaController?action=create_fila" method="post" enctype="multipart/form-data" >
                    
                    <div class="form-group">
                        <label for="nome">Nome da Fila:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome da Fila" required>
                    </div>
                    <div class="form-group">
                        <label for="endereco">Endereço:</label>
                        <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" required>
                    </div>
                    <div class="form-group">
                        <label for="inicio">Horário de Início:</label>
                        <input type="time" class="form-control" id="inicio" name="inicio" required>
                    </div>
                    <div class="form-group">
                        <label for="termino">Horário de Término:</label>
                        <input type="time" class="form-control" id="termino" name="termino" required>
                    </div>
                    <!-- <div class="form-group">
                    <label for="img">Envie uma imagem para sua fila:</label>
                    <input type="file" id="img" name="img" accept="image/*">
                    </div> -->
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

<?php
// Processa o formulário se ele foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nomeFila = $_POST['nomeFila'];
    $endereco = $_POST['endereco'];
    $horarioInicio = $_POST['horarioInicio'];
    $horarioTermino = $_POST['horarioTermino'];

    // Aqui você pode salvar os dados em um banco de dados ou em um arquivo
    // Exemplo de salvar em um arquivo:
    $arquivo = 'filas.txt';
    $dados = "$nomeFila|$endereco|$horarioInicio|$horarioTermino\n";
    file_put_contents($arquivo, $dados, FILE_APPEND);

    // Redirecionar para a página de sucesso ou exibir uma mensagem de sucesso
    echo '<script>alert("Fila cadastrada com sucesso!");</script>';
    // header('Location: sucesso.php'); // Substitua 'sucesso.php' pelo caminho da sua página de sucesso
}
?>
