<!DOCTYPE html>
<html lang="en">
<head>
<?php
    session_start();
    if (!isset($_SESSION['user_id'])) {
		echo 'Deslogado';
		exit;
	}
    ?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Codigo Fila</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="css/Perfil.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="../">FilaOnline</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav">
	      <a class="nav-item nav-link active" href="../">Home <span class="sr-only">(Página atual)</span></a>
	      <a class="nav-item nav-link" href="Login">Login</a>
	      <a class="nav-item nav-link" href="Estabelecimentos">Estabelecimentos</a>
	      <a class="nav-item nav-link" href="Perfil">Perfil</a>
	    </div>
	  </div>
	</nav>
  <main>
    <div class="container">
      <div class="left box-primary">
        <img class="image" src="" alt="" />
        <h3 class="username text-center"> <?php echo $_SESSION['user_name'] ?> </h3>
        <a href="#" class="btn btn-primary btn-block"><b>Editar foto</b></a>
        
      </div>
      <div class="right tab-content">
        <form class="form-horizontal" action="../Controller/ContaController?action=update_conta" method="post">
          <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $_SESSION['user_name']  ?>">
            </div>
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['user_email'] ?>">
            </div>
            <label for="telefone" class="col-sm-2 control-label"  >Telefone</label>
            <div class="col-sm-10">
              <input type="tel" class="form-control" id="telefone" name="telefone" value="<?php echo $_SESSION['user_telefone'] ?>">
            </div>
            <div class="col-sm-10">
            <button type="submit" class="btn btn-danger">Salvar alterações</button>
            </div>
            
          </div>
            </div>
        </form>
      </div>
    </div>
  </main>
</body>