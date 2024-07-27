<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Codigo Fila</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="css/Login.css">
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
	      <a class="nav-item nav-link" href="View/Login">Login</a>
	      <a class="nav-item nav-link" href="#">Estabelecimentos</a>
	      <a class="nav-item nav-link disabled" href="#">Desativado</a>
	    </div>
	  </div>
	</nav>

	<div class="signup-container">
	    <div class="signup-box">
	        <h2>Login</h2>
	        <form action="Controller/ContaController?action=valida_user" method="post">
	            <div class="form-group">
                
                <input placeholder="Usuário/Email" type="text" id="username" name="username" required>
	            </div>
	            <div class="form-group">
                
                <input placeholder="Senha" type="password" id="password" name="password" required>
	            </div>
	            <a href="/"><button class="btn-entrar" type="submit">Entrar</button></a>
	        </form>
	        <div class="bottom-text">
	            <p>Não possui conta? <a href="Cadastro">Faça seu cadastro aqui</a></p>
	        </div>
	    </div>
	</div>

</body>
</html>