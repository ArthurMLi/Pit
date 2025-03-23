const id = <?php echo htmlspecialchars($_SESSION['user_id']); ?>;
document.addEventListener("DOMContentLoaded", function() {
    setInterval(function() {
        fetch(`../../Controller/FilaController.php?action=readfila_usuariocomp&id=${id}`)
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
});