<head>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fila - Detalhes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="FilaUsuarioComp.css">
</head>

<body>
   

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    console.log('jQuery version:', $.fn.jquery); // Deve exibir a versão do jQuery no console
</script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div id="fila">
    
    <div class="container" >
        <div class="logo">
            <img src="../../img/logo01.png" alt="Logo do Site">
            <p class="text-muted">Você está na fila <?php echo htmlspecialchars($_SESSION['filasuser'][0]['nome']) ?>
            </p>

        </div>
        <div class="fila" >
            <?php

            $primeirapessoa = 1;

            if (!empty($_SESSION['filasuser'])):
                $filaPaia = false; // Isso é só para ver se tem algum usuário na fila ou não;
                foreach (array_reverse($_SESSION['filasuser']) as $filau):

                    if ($primeirapessoa == count($_SESSION['filasuser'])) {
                        $pessoaematendimento = htmlspecialchars($filau['idUsuario']);
                    } else {
                        $primeirapessoa++;
                    }
                    ;

                    ?>
                    <div class="fila-item">
                        <?php if ($filau['idUsuario'] != null) {
                            if (!isset($pessoaematendimento)) {
                                echo htmlspecialchars($filau['idUsuario']);
                            } 
                            ;
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
        <div class="pessoa-atendida">
            Pessoa sendo atendida <br> <span> <?php echo($pessoaematendimento);?></span>
        </div>

        <div class="info">
        <?php 
            $colunaUsuarios = array_column($_SESSION['filasuser'], 'idUsuario');

            // Busca o índice na coluna onde o idUsuario coincide com o valor buscado
            $posicao = array_search($_SESSION['user_id'], $colunaUsuarios);

              ?>
            <div>
                    <p><strong>Tempo para atendimento</strong></p>
                    <p><?php echo htmlspecialchars( round($_SESSION['filasuser'][0]['tempoMedio'] * ($posicao + 1)))?> minutos</p>
    
                </div>
            <div>
                <p><strong>Lugar na fila</strong></p>
                <p> <?php if ($posicao !== null) {
                    echo $posicao + 1;
                    unset($posicao);
                } ?> º lugar</p>
            </div>
        </div>
        <div>Endereço do Local: <br> <?php echo htmlspecialchars($_SESSION['filasuser'][0]['endereco']) ?></div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
