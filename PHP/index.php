
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Codigo Fila</title>
</head>

<body>
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
    <button type="button" onclick="EntrarFila" class="btn btn-primary" disabled="$desativadoEntrar">entrar na fila</button>
    <button type="button" $onclick="SairFila" class="btn btn-primary" disabled="$desativadoSair">sair da fila</button>
</body>
</html>