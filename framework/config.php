<?php
//declaração dos namespaces dos controladores e instanciação dos objetos

session_start();

use Project\Controller\ TesteController;
$testeController = new TesteController();


//configuração do banco de dados
$_ENV['config'] = [
    'host' => 'localhost',
    'dbname' => 'mydb',
    'user' => 'root',
    'password' => ''
];
