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
    <link rel="stylesheet" href="css/HomeEstabelecimento.css">
    <script src="js/HomeEstabelecimento.js" defer></script>
</head>

<!-- header include-->

<?php
if (isset($_SESSION['estabelecimento'])) {
    include "../Layout/HeaderEstabelecimento.php";
} else {
    include "../Layout/HeaderUsuario.php";
}
if (isset($_SESSION['estabelecimento'])):
    ?>
    <!-- Lista de Filas -->
    <div class="container">
        <div class="row">


            <div class="col-md-6 col-lg-3">

                <div class="card">
                    <a class="adicionar" href="../Estabelecimento/cadastrofila.php">
                        <p>+</p>
                    </a>
                </div>
            </div>



        <?php endif;
//if (isset($_SESSION['filaatual'])) {
// unset($_SESSION['filaatual']);
//}

if (!empty($_SESSION['filas'])): ?>
            <?php foreach (array_reverse($_SESSION['filas']) as $fila): ?>
                <div class="col-md-6 col-lg-3">
                    <!-- Img antiga caso precise<img src="https://via.placeholder.com/150" class="card-img-top" alt="Fila 1"> -->
                    <a href="../../Controller/FilaController?action=readfila_filaid&id=<?php echo htmlspecialchars($fila['id']); ?>"
                        class="card">
                        <?php if (isset($fila['img'])): ?>
                            <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($fila['img']); ?>" class="card-img-top"
                                alt="Fila 1">
                        <?php else: ?>
                            <img src="https://via.placeholder.com/150" class="card-img-top" alt="Fila 1">
                        <?php endif; ?>
                        <div class="card-header"><?php echo htmlspecialchars($fila['nome']); ?></div>
                        <div class="fila-info">
                            <p><strong>Endereço:</strong> <?php echo htmlspecialchars($fila['endereco']); ?></p>
                            <p class="tempo-espera">Tempo de espera:<?php echo htmlspecialchars(round(($fila['tempoMedio'] * $fila['qntPessoasFila'])/ 60 )); ?> Minutos </p>
                            <p class="num-pessoas">Pessoas na fila: <?php echo htmlspecialchars($fila['qntPessoasFila']); ?></p>
                            <p><strong>Inicio:</strong> <?php echo htmlspecialchars($fila['inicio']); ?> </p>
                            <p><strong>Termino:</strong> <?php echo htmlspecialchars($fila['termino']); ?> </p>
                            
                        </div>
                    </a>
                    <button class="btn" id="open-modal">Editar</button>

                    <div id="fade" class="hide"></div>
                    <div id="modal" class="hide">
                        <div class="modal-header">
                            <h2>Edição da Fila</h2>
                            <img width="80px" class="logo01" src="../../img/logo01.png" alt="">

                        </div>
                        <div class="modal-body">
                            <p>
                            <div class="container">
                                <div class="logo">
                                    <img src="data:image/jpeg;base64,<?php echo htmlspecialchars($fila['img']); ?>"
                                        class="card-img-top" alt="Fila 1">
                                </div>
                                <form
                                    action="../../Controller/FilaController?action=update_fila&id=<?php echo htmlspecialchars($fila['id']); ?>"
                                    method="post">
                                    <div class="form">
                                        <label>Nome da Fila</label>
                                        <input type="text" placeholder="Nome da Fila" id="nome" name="nome" value=<?php echo htmlspecialchars($fila['nome']); ?>>
                                        <label>Endereço</label>
                                        <input type="text" placeholder="Endereço" id="endereco" name="endereco" value=<?php echo htmlspecialchars($fila['endereco']); ?>>
                                        <label>Inicio</label>
                                        <input type="time" placeholder="Inicio" id="inicio" name="inicio" value=<?php echo htmlspecialchars($fila['inicio']); ?>>
                                        <label>Termino</label>
                                        <input type="time" placeholder="Termino" id="termino" name="termino" value=<?php echo htmlspecialchars($fila['termino']); ?>>
                                        <div class="buttons">  
                                            <button id="close-modal" class="btn-salvar" type="submit">SALVAR</button>
                                        </div>
                                        
                                    </div>
                                </form>
                                <a href="../../Controller/FilaController?action=delete_fila&id=<?php echo htmlspecialchars($fila['id']); ?>"><button
                                type="" class="btn-excluir">EXCLUIR</button></a>
                            </div>
                            </p>
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