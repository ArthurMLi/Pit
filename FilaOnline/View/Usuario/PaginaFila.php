<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="PaginaFila.css">
</head>
<body>
    <?php
        include "../Layout/HeaderUsuario.php"
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<div class="card mb-3" >
    <?php switch($Teste) {
        case 1: ?> 
        <img src="../Img/mcdonalds.png" style="width: 15rem;" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">McDonalds</h5>
        <p class="card-text">O McDonald's é uma empresa global de fast food conhecida por seus hambúrgueres, batatas fritas e sobremesas, presente em mais de 100 países.</p>
        <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 2: ?>
            <img src="../Img/bk.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Burguer King</h5>
                <p class="card-text">O Burger King é uma empresa global de fast food conhecida por seus hambúrgueres, batatas fritas e sobremesas, presente em mais de 80 países.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 3: ?>
            <img src="../Img/Itau.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Banco Itau</h5>
                <p class="card-text">O Banco Itaú é uma das maiores instituições financeiras do Brasil, oferecendo uma ampla gama de serviços bancários, incluindo contas correntes, investimentos, empréstimos e cartões de crédito.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 4: ?>
            <img src="../Img/Santander.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Banco Santader</h5>
                <p class="card-text">O Banco Santander é uma das principais instituições financeiras globais, presente em diversos países, oferecendo serviços bancários como contas correntes, investimentos, financiamentos e cartões de crédito.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 5: ?>
            <img src="../Img/kfc.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">KFC</h5>
                <p class="card-text">KFC é uma empresa internacional de restaurantes de fast food conhecida por seus frangos fritos crocantes e temperados.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 6: ?>
            <img src="../Img/kfc.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">KFC</h5>
                <p class="card-text">KFC é uma empresa internacional de restaurantes de fast food conhecida por seus frangos fritos crocantes e temperados.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 7: ?>
            <img src="../Img/kfc.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">KFC</h5>
                <p class="card-text">KFC é uma empresa internacional de restaurantes de fast food conhecida por seus frangos fritos crocantes e temperados.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 8: ?>
            <img src="../Img/kfc.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">KFC</h5>
                <p class="card-text">KFC é uma empresa internacional de restaurantes de fast food conhecida por seus frangos fritos crocantes e temperados.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 9: ?>
            <img src="../Img/MaterDei.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Mater Dei</h5>
                <p class="card-text">Rede de hospitais brasileira, conhecida pela sua qualidade de atendimento ao cliente e médicos muito bem avaliados.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 10: ?>
            <img src="../Img/BabyBeef.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Baby Beef</h5>
                <p class="card-text">O Baby Beef é uma rede de restaurantes conhecida por seu cardápio de carnes nobres, churrasco e rodízio, popular no Brasil e em outros países.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 11: ?>
            <img src="../Img/BancoBrasil.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"> Banco do Brasil</h5>
                <p class="card-text">O Banco do Brasil é uma das maiores instituições financeiras do Brasil, oferecendo uma ampla gama de serviços bancários, incluindo contas correntes, investimentos, empréstimos, cartões de crédito e financiamentos.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 12: ?>
            <img src="../Img/Bh.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Supermecados Bh</h5>
                <p class="card-text">Os Supermercados BH são uma rede de supermercados bastante conhecida em Minas Gerais, Brasil, oferecendo uma variedade de produtos alimentícios, de higiene pessoal, limpeza e outros itens de consumo doméstico.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 13: ?>
            <img src="../Img/DetranMg.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Detran MG</h5>
                <p class="card-text">O Detran Minas Gerais é o Departamento Estadual de Trânsito de Minas Gerais, responsável pela regulamentação e fiscalização do trânsito no estado, incluindo registro de veículos, emissão de carteiras de habilitação, aplicação de multas e educação para o trânsito.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 14: ?>
            <img src="../Img/DetranMg.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Detran MG</h5>
                <p class="card-text">O Detran Minas Gerais é o Departamento Estadual de Trânsito de Minas Gerais, responsável pela regulamentação e fiscalização do trânsito no estado, incluindo registro de veículos, emissão de carteiras de habilitação, aplicação de multas e educação para o trânsito.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 15: ?>
            <img src="../Img/DetranMg.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Detran MG</h5>
                <p class="card-text">O Detran Minas Gerais é o Departamento Estadual de Trânsito de Minas Gerais, responsável pela regulamentação e fiscalização do trânsito no estado, incluindo registro de veículos, emissão de carteiras de habilitação, aplicação de multas e educação para o trânsito.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
            case 16: ?>
            <img src="../Img/DetranMg.png" style="width: 15rem;" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Detran MG</h5>
                <p class="card-text">O Detran Minas Gerais é o Departamento Estadual de Trânsito de Minas Gerais, responsável pela regulamentação e fiscalização do trânsito no estado, incluindo registro de veículos, emissão de carteiras de habilitação, aplicação de multas e educação para o trânsito.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
            </div>
            <?php break;
        default:
            break;

    } ?>
    <div class="mb-3">
        <label for="avaliacao" class="form-label">Deixe sua avaliação aqui:</label>
        <textarea class="form-control" id="avaliacao" rows="3"></textarea>
    </div>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <div class="estrelas">
        <input type="radio" id="cm_star-empty" name="fb" value="" checked />
        <label for="cm_star-1"><i class="fa"></i></label>
        <input type="radio" id="cm_star-1" name="fb" value="1" />
        <label for="cm_star-2"><i class="fa"></i></label>
        <input type="radio" id="cm_star-2" name="fb" value="2" />
        <label for="cm_star-3"><i class="fa"></i></label>
        <input type="radio" id="cm_star-3" name="fb" value="3" />
        <label for="cm_star-4"><i class="fa"></i></label>
        <input type="radio" id="cm_star-4" name="fb" value="4" />
        <label for="cm_star-5"><i class="fa"></i></label>
        <input type="radio" id="cm_star-5" name="fb" value="5" />
    </div>
</div>
</body>
</html>