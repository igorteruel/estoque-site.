<?php

namespace Project\Controller;

use Project\Db\QueryBuilder;

class TesteController
{

    public function imprimir()
    {
       $dado = $_POST['dado'];
       $resultado = $dado % 2 == 0 ? 'Par' : 'Impar';

       require './app/views/imprime.php';
    }


    public function cadastrar()
    {
        //criando um array
        $dados = [];
        $msg='';

        //pegando dados do usuario
        $dados['email'] = htmlentities($_POST['email'], ENT_QUOTES);
        $dados['nome'] = htmlentities($_POST['nome'], ENT_QUOTES);
        $dados['senha'] = htmlentities($_POST['senha'], ENT_QUOTES);
        $dados['criacao'] = htmlentities('1999-01-01', ENT_QUOTES);
        $csenha = $_POST['csenha'];

        //confinar senha

        if ($dados['senha'] !== $csenha) 
        {
            $msg = ('As senhas não conferem');
            require './app/views/index.php';
            exit;
        }

        //conexão com banco de dados
        $q = new QueryBuilder();

        //inserindo os dados na tabela
        $q->insert('usuario', $dados);
        
        //devolve a pagina index
        require './app/views/index.php';

    }

    public function login()
    {
        
        $dados['email'] = htmlentities($_POST['email'], ENT_QUOTES);
        $dados['senha'] = htmlentities($_POST['senha'], ENT_QUOTES);
        
        $q = new QueryBuilder();

        
        $cadastrou = $q->select('usuario', [
            'email' => $dados['email'], 
            'senha' => $dados[
                'senha'],
            

        ]);

        
       
        // se o usuário não foi encontrado no banco de dados
        // emite uma mensagem de erro
        if (!$cadastrou) {
            
            $msg = 'Dados Inválidos';
            header('Location: /');
            exit;

        }
            // autentica o usuário
            $_SESSION['user'] = $dados['email'];
            //print_r($_SESSION);
            //die();

            header('Location: /tabela');   

        

        
        
    }
    

    public function logout()
    {
        //remove todas variáveis criadas de sessão
        session_unset();

        //devolve para a página inicial
        header('Location: /');
    }


    public function cprodutos()
    {
        $q = new QueryBuilder();

        $dados= $q->select('produtos');

        require './app/views/cprodutos.php';
    }

    public function adqtd()
    {
        $dados = [];
        $dados['id_produto'] = $_POST['id'];
        $dados['estoque'] = $_POST['estoque'];
        
        
        $q = new QueryBuilder();

        $q->insert('estoque', $dados);

        header('location: /tabela');

    }

    public function subqtd()
    {
        $dados = [];
        $dados['id_produto'] = $_POST['id'];
        $dados['transacao'] = $_POST['transacao'];
        
        
        $q = new QueryBuilder();

        $q->insert('estoque', $dados);

        header('location: /tabela');

    }

    public function tabela()
    {
        $q = new QueryBuilder();

        $dados = $q->selectproduto();
        //print_r($dados);
        //die();

        require './app/views/tabela.php';

    }

    public function cadprodutos()
    {
        $dados = [];
        $dados['nome'] = $_POST['nome'];

        
        $q = new QueryBuilder();

        $q->insert('produtos', $dados);

        header('location: /cprodutos');
    }
}
