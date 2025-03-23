<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id'])) {
    ?>
    <!DOCTYPE html>
    <html lang="pt-BR">

    <body>
        <div class="container">
            <h1>Deslogado</h1>
            <p><a href="../../index.php">Voltar para página inicial</a></p>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
            integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="js/Cadastro.js" type="text/javascript" defer></script>
    <link rel="stylesheet" href="css/PerfilQueue.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body>

    <body>
        <?php
        include "../Layout/HeaderUsuario.php";
        ?>
        <main>
            <div class="profile-container">
                <div class="profile-card">

                    <div class="profile-img-container">
                        <?php if (isset($_SESSION['foto'])): ?>
                            <img class="profile-img"
                                src="data:image/jpeg;base64,<?php echo htmlspecialchars($_SESSION['foto']); ?>"
                                alt="Foto do perfil" id="profileImg" />
                        <?php endif; ?>
                        <h3 class="profile-username"><?php echo $_SESSION['user_name']; ?></h3>
                    </div>

                    <form class="form-horizontal" action="../../Controller/ContaController?action=update_conta"
                        method="post" enctype="multipart/form-data">
                        <label class="btn btn-primary btn-block">
                            Trocar foto de perfil
                            <input type="file" id="foto" name="foto" accept="image/*" style="display: none;"
                                onchange="updateImagePreview(event)">
                        </label>
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                value="<?php echo $_SESSION['user_name']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="<?php echo $_SESSION['email']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="tel" maxlength="15" onkeyup="handlePhone(event)" class="form-control"
                                id="telefone" name="telefone" value="<?php echo $_SESSION['telefone']; ?>"
                                title="Número de telefone precisa ser no formato (00) 0 0000-0000" />
                        </div>


                        <button type="submit" class="btn btn-danger">Salvar alterações</button>
                    </form>
                </div>
            </div>
        </main>
        <script>
            function updateImagePreview(event) {
                const file = event.target.files[0];
                const imgElement = document.getElementById('profileImg');

                // Armazena a imagem atual em uma variável
                const currentImageSrc = imgElement.src;

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function (e) {
                        const newImageSrc = e.target.result; // Nova imagem a ser comparada

                        // Verifica se a nova imagem é igual à atual
                        if (newImageSrc !== currentImageSrc) {
                            imgElement.src = newImageSrc; // Atualiza o src da imagem com a nova imagem
                        } else {
                            console.log('A nova imagem é igual à atual.'); // Ou faça outra ação
                        }
                    }

                    reader.readAsDataURL(file); // Lê a imagem como uma URL
                } else {
                    // Se o arquivo for nulo, pode-se manter a imagem atual ou fazer outra ação
                    console.log('Nenhuma nova imagem foi selecionada.');
                }
            }

            const handlePhone = (event) => {
                let input = event.target
                input.value = phoneMask(input.value)
            }

            const phoneMask = (value) => {
                if (!value) return ""
                value = value.replace(/\D/g, '')
                value = value.replace(/(\d{2})(\d)/, "($1) $2")
                value = value.replace(/(\d)(\d{4})$/, "$1-$2")
                return value
            }
        </script>
    </body>

</html>