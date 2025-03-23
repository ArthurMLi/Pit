<head>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fila - Detalhes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="FilaExistenteComp.css">
</head>
<div class="container">
    <div class="logo">
        <img src="../../img/logo01.png" alt="Logo do Site" width="150">
    </div>
    <div class="fila">
        <?php

        $primeirapessoa = 1;
        if (!empty($_SESSION['filaatual'])):
            $filaPaia = false; // Isso é só para ver se tem algum usuário na fila ou não;
            foreach (array_reverse($_SESSION['filaatual']) as $filau):

                if ($primeirapessoa == count($_SESSION['filaatual'])) {
                    echo ('<div class="pessoa-atendida">Pessoa sendo atendida</div>');
                } else {
                    $primeirapessoa++;
                }
                ;

                ?>
                <div class="fila-item">
                    <?php if ($filau['idUsuario'] != null) {
                        echo htmlspecialchars($filau['idUsuario']);
                    } else {
                        echo "<p>Nenhuma pessoa na fila.</p>";
                        $filaPaia = true;
                        break;
                    }
                    ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Nenhuma pessoa na fila.</p>
        <?php endif; ?>
    </div>

    <?php if ($filaPaia == null): ?>
        <a href="..\..\Controller\FilaController.php?action=voltar_pessoa&id=<?php $objeto = $_SESSION['filaatual'];
        $id = $_SESSION['filaatual'][0]['id'];
        echo ($id) ?>"><button class="btn">Voltar</button></a>
        <a href="..\..\Controller\FilaController.php?action=proxima_pessoa&id=<?php $objeto = $_SESSION['filaatual'];
        $id = $_SESSION['filaatual'][0]['id'];
        echo ($id) ?>"><button class="btn">Próximo</button></a>
    <?php endif; ?>
    </d>
</div>
<?php
$linkfila = $filau['id'];
?>
<a
    href="../../QrCode/Qr?link=http://localhost/Queue/FilaOnline/Controller/EstabelecimentoController?id=<?php echo $linkfila ?>"><button
        class="btn">Gerar qr code</button></a>
</body>