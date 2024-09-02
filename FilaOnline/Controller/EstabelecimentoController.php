<?php

include_once '../Model/Estabelecimento.php';
include_once '../DAO/EstabelecimentoDAOImpl.php';

    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $id = isset($_GET['id']) ? $_GET['id']: null;
    $estabelecimentoDao = new EstabelecimentoDAOImpl();
    $estabelecimento = new Estabelecimento();
    switch ($action) {
        case 'create_conta':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $estabelecimento->setNome($_POST['nome']);
                $estabelecimento->setEmail($_POST['email']);
                $estabelecimento->setCnpj($_POST['cnpj']);
                $estabelecimento->setEndereco($_POST['endereco']);
                $estabelecimento->setDescricao($_POST['descricao']);
                $estabelecimento->setSenha($_POST['senha']);
            
                if ($estabelecimentoDao->createConta($estabelecimento->getNome(),$estabelecimento->getEmail(),$estabelecimento->getCnpj(),$estabelecimento->getEndereco(),$estabelecimento->getDescricao(),$estabelecimento->getSenha(),)) {
                    echo 'Registro inserido com sucesso!<br>Volte a pagina de login:<a href="../View/Login">Retornar</a>';
                } else {
                    echo 'Erro ao inserir o registro.';
                }
            }
            
        break;
        case 'valida_conta':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                
                $estabelecimento = $estabelecimentoDao->validaConta($email, $senha);
                if($estabelecimento == null) {
                    echo 'Nome de usuário ou senha incorretos';
                    echo '<br><a href="../View/Login.php">Voltar a pagina de login</a>';
                } else {
                    
                    session_start();
                    $_SESSION['user_id'] = $estabelecimento->getId();
                    $_SESSION['user_name'] = $estabelecimento->getNome();
                    $_SESSION['user_email'] = $estabelecimento->getEmail();
                    $_SESSION['user_cnpj'] = $estabelecimento->getCnpj();
                    $_SESSION['user_endereco'] = $estabelecimento->getEndereco();
                    $_SESSION['user_descricao'] = $estabelecimento->getDescricao();
                    header('Location: ../View/Estabelecimentos');
                    exit();
                }
                
            }
        break;
        case 'update_conta':
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $nome = $_POST['nome'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                session_start();
                $id = $_SESSION['user_id'];
                
                $estabelecimento = $estabelecimentoDao->updateConta($id, $nome, $email, $telefone, $cnpj, $endereco, $descricao, $logo);
                if(isset($estabelecimento)){
                    session_start();
                    $_SESSION['user_id'] = $estabelecimento->getId();
                    $_SESSION['user_name'] = $estabelecimento->getNome();
                    $_SESSION['user_email'] = $estabelecimento->getEmail();
                    $_SESSION['user_cnpj'] = $estabelecimento->getCnpj();
                    $_SESSION['user_endereco'] = $estabelecimento->getEndereco();
                    $_SESSION['user_descricao'] = $estabelecimento->getDescricao();
                    header('Location: ../View/Perfil');
                    exit();
                } else {
                    echo 'Nome de usuário ou senha incorretos';
                }
                
            }
            break;
        default:
        echo 'erro';
        break;
    }

?>


