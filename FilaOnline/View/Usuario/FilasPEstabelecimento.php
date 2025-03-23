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
    <link rel="stylesheet" href="css/FilasPEstabelecimento.css">
</head>
<!-- header include-->
<?php
include "../Layout/HeaderUsuario.php"
    ?>
<!-- Lista de Filas -->
<div class="container">
    <div class="row">
        <?php if (!empty($_SESSION['filasestabelecimento'])): ?>
            <?php foreach (array_reverse($_SESSION['filasestabelecimento']) as $estabelecimentofila): ?>
                <div class="col-6 col-sm-6 col-md-4 mb-4"> <!-- Alterado para col-6 -->
                    <a href="../../Controller/FilaController?action=entrar_fila&id=<?php echo htmlspecialchars($estabelecimentofila['idFila']); ?>"
                        class="card">
                        <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($estabelecimentofila['img']); ?>" class="card-img-top" alt="Fila 1">
                        <div class="card-header"><?php echo htmlspecialchars($estabelecimentofila['nomefila']); ?></div>
                        <p class="spc01"><strong>Endereço:</strong>
                            <?php echo htmlspecialchars($estabelecimentofila['enderecofila']); ?></p>
                        <p class="tempo-espera">Tempo de espera: </p>
                        <p class="num-pessoas">Pessoas na fila: </p>
                        <p><strong>Inicio:</strong> <?php echo htmlspecialchars($estabelecimentofila['inicio']); ?> </p>
                        <p><strong>Termino:</strong> <?php echo htmlspecialchars($estabelecimentofila['termino']); ?> </p>
                        <p><strong>Prévia das pessoas:</strong> </p>
                        <p class="btn btn-primary"><strong>Entrar na Fila</strong></p>
                    </a>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma fila cadastrada.</p>
        <?php endif; ?>
    </div>
</div>

<script>
    //Teste de botar os dados sem atualzar a pagina
    var tempo = window.setInterval(carrega, 100);
    function carrega() { $("#conteudo").load("Usuario/Estabelecimentos.php"); };
</script>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>