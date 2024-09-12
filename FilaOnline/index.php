<?php
namespace Home;
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Codigo Fila</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">FilaOnline</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(Página atual)</span></a>
        <a class="nav-item nav-link" href="View/Login">Login</a>
        <a class="nav-item nav-link" href="View/Estabelecimentos">Estabelecimentos</a>


        <?php
        if (!isset($_SESSION['user_id'])) {
          echo '<a class="nav-item nav-link"><b>Deslogado</b></a>';

        } else {
          echo '<a class="nav-item nav-link" href="View/Perfil">Perfil</a><a class="nav-item nav-link" href="Logout">Sair</a><a class="nav-item nav-link" ><b>' . $_SESSION['user_name'] . '</b></a>';
          if (!isset($_SESSION['estabelecimento'])) {
            echo '<a class="nav-item nav-link"><b>Usuario</b></a>';

          } else {
            echo '<a class="nav-item nav-link"><b>Estabelecimento</b></a>';
          }
        }

        ?>
      </div>
    </div>
  </nav>

  <div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="./Img/mcdonalds.png" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">McDonalds</h5>
          <h1>2 </h1>
          <p class="card-text"><small class="text-body-secondary">Tempo de espera aproximado: 10min</small></p>
        </div>
      </div>
    </div>
  </div>
  <button type="button" onclick="EntrarFila" class="btn btn-primary" disabled="$desativadoEntrar">entrar na
    fila</button>
  <button type="button" $onclick="SairFila" class="btn btn-primary" disabled="$desativadoSair">sair da fila</button>

</body>

</html>