<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    session_start();

    ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Codigo Fila</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/Estabelecimentos.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../">FilaOnline</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Alterna navegação">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="../">Home <span class="sr-only">(Página atual)</span></a>
                <a class="nav-item nav-link" href="Login">Login</a>
                <a class="nav-item nav-link" href="Estabelecimentos">Estabelecimentos</a>

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

    <div class="page">
        <main>

            <div class="container text-center">
                <div class="row">
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/mcdonalds.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">McDonalds</h5>

                                <a href="/PaginaFila/1" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/bk.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Burguer King</h5>
                                <a href="/PaginaFila/2" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/Itau.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Banco Itau</h5>

                                <a href="/PaginaFila/3" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/Santander.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Banco Santander</h5>

                                <a href="/PaginaFila/4" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/kfc.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">KFC</h5>

                                <a href="/PaginaFila/5" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/kfc.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">KFC</h5>

                                <a href="/PaginaFila/6" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/kfc.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">KFC</h5>

                                <a href="/PaginaFila/7" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/kfc.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">KFC</h5>

                                <a href="/PaginaFila/8" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/MaterDei.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Mater Dei</h5>

                                <a href="/PaginaFila/9" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/BabyBeef.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Baby Beef</h5>

                                <a href="/PaginaFila/10" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/BancoBrasil.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Banco do Brasil</h5>

                                <a href="/PaginaFila/11" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/Bh.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Supermercados BH</h5>
                                <a href="/PaginaFila/12" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/DetranMg.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Detran MG</h5>
                                <a href="/PaginaFila/13" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/DetranMg.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Detran MG</h5>
                                <a href="/PaginaFila/14" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/DetranMg.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Detran MG</h5>
                                <a href="/PaginaFila/15" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card" style="width: 15rem; border-radius: 20px; padding: 10px; margin-bottom: 30px">
                            <img src="../Img/DetranMg.png" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Detran MG</h5>
                                <a href="/PaginaFila/16" class="btn btn-primary">Entrar na Fila</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>
        <br>
    </div>
</body>

</html>