<?php
//rotas da aplicação
//a variável $uri já contém os dados da rota solicitada

switch ($uri) {

    case '/':
        $msg='';
        require './app/views/index.php';
        break;
    
    case '/cadastrar':

        $testeController->cadastrar();
        break;

    case '/login':

        $testeController->login();
        break;

    case '/logout':

        $testeController->logout();
        break;


    case '/cprodutos':
        $testeController->cprodutos();
        break; 

    case '/adqtd':
        $testeController->adqtd();
        break;  

    case '/subqtd':
        $testeController->subqtd();
        break;    

    case '/tabela':
        $testeController->tabela();
        break;       

    case '/logout':
        $testeController->logout();
        break;  

    case '/cadprodutos':
        $testeController->cadprodutos();
        break;   


    default:
        die('Essa rota não é valida');
        break;
}
