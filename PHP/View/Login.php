<!DOCTYPE html>
<html lang="en">
<head>
<?php
    session_start();    
?>
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
	      <a class="nav-item nav-link" href="Login">Login</a>
	      <a class="nav-item nav-link" href="Estabelecimentos">Estabelecimentos</a>
	      <a class="nav-item nav-link" href="Perfil">Perfil</a>
		  <?php
        	if (!isset($_SESSION['user_id'])) {
            echo '<a class="nav-item nav-link"><b>Deslogado</b></a>';
            
        	}
        	else{
            echo '<a class="nav-item nav-link" href="Logout">Sair</a><a class="nav-item nav-link" ><b>'.$_SESSION['user_name'].'</b></a>';
        	}
        	?>
	    </div>
	  </div>
	</nav>

	<div class="signup-container">
	    <div class="signup-box">
	        <h2>Login</h2>
	        <form action="../Controller/ContaController?action=valida_conta" method="post">
	            <div class="form-group">
                
                <input placeholder="Email" type="email" id="email" name="email" required>
	            </div>
	            <div class="form-group">
                
                <input placeholder="Senha" type="password" id="senha" name="senha" required>
	            <button type="button" class="btnsenha" name="btnsenha" onclick="togglePass()" id="btnsenha"><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m644-428-58-58q9-47-27-88t-93-32l-58-58q17-8 34.5-12t37.5-4q75 0 127.5 52.5T660-500q0 20-4 37.5T644-428Zm128 126-58-56q38-29 67.5-63.5T832-500q-50-101-143.5-160.5T480-720q-29 0-57 4t-55 12l-62-62q41-17 84-25.5t90-8.5q151 0 269 83.5T920-500q-23 59-60.5 109.5T772-302Zm20 246L624-222q-35 11-70.5 16.5T480-200q-151 0-269-83.5T40-500q21-53 53-98.5t73-81.5L56-792l56-56 736 736-56 56ZM222-624q-29 26-53 57t-41 67q50 101 143.5 160.5T480-280q20 0 39-2.5t39-5.5l-36-38q-11 3-21 4.5t-21 1.5q-75 0-127.5-52.5T300-500q0-11 1.5-21t4.5-21l-84-82Zm319 93Zm-151 75Z"/></svg></button>
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