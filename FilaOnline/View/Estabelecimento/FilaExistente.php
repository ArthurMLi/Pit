<head>
    <?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fila - Detalhes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/FilaExistente.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    include "../Layout/HeaderEstabelecimento.php";
    ?>

     <div id= "fila">
    
        <?php include 'FilaExistenteComp.php'?>

</div>
    </body>
</html>
<script>
const id = <?php echo $_SESSION['filaatual'][0]['idFila'];   ?>;
document.addEventListener("DOMContentLoaded", function() {
    setInterval(function() {
        fetch(`../../Controller/FilaController.php?action=readfila_filaidcomp&id=${id}`)
            .then(response => response.text())
            .then(data => {
                const filaElement = document.getElementById('fila');
                if (filaElement) {  // Verifica se o elemento existe
                    filaElement.innerHTML = data;
                } else {
                    console.error('Elemento #fila não encontrado');
                }
            })
            .catch(error => console.error('Erro ao atualizar a fila:', error));
    }, 5000);  // Atualiza a cada 5 segundos
});</script>