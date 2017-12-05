<html>
    <head>
        <title>Página de Cadastro</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/BootStrap.min.css" rel="stylesheet">
        <link href="public/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    
        <br>
        <div class="container">
        <header class="row clearfix">
            <img src="public/img/logomarca.png" alt=""/>
            <?php 
            if(isset($_SESSION['user'])) {?>
            <a href="/logout" class="btn btn-lg btn-info pull-right">Logout</a>
            <?php } ?>    
        </header>
            <br>
        <div class="row clearfix caixa">
            <div class="col-md-4">
                <form method="POST" class="form-estilo" action="/cadprodutos">
                    <hr> 
                    <h2 class="titulo">
                        <strong>Cadastre um Produto</strong>
    
                    </h2>
                    </hr>
                    <p><input type="name" name="nome" class="form-control" placeholder="Nome do Produto" required/></p>
                    <p><button name="Login" class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button></p>
                    <a href="/tabela" class="btn btn-lg btn-info btn-block">Visualizar Produtos</a>
                </form>
            </div> 
                
            <div class="col-md-4"> 
                <form method="POST" class="form-estilo " action="/adqtd">
                    <hr>
                        
                    <h2 class="titulo">
                        <strong>Entrada de Estoque</strong>
                    </h2>
                    </hr>
                    <select class="form-control" name="id">
                        <?php foreach($dados as $d){?>
                        <option value="<?=$d['id']?>"><?=$d['nome']?></option>
                        <?php } ?>
                    </select>
                    <br>
                    <p><input type="Number" name="estoque" class="form-control"  placeholder="Quantidade do Produto"/></p>          
                    <p><button name="Login" class="btn btn-lg btn-info btn-block" type="submit">Confirmar</button></p>  
                </form>
            </div>
                    
                
            <div class="col-md-4"> 
                <form method="POST" class="form-estilo" action="/subqtd">
                    <hr> 
                    <h2 class="titulo">
                    
                        <strong>Saida de Estoque</strong>
                    </h2>
                    </hr>
                    <select class="form-control" name="id">
                    <?php foreach($dados as $d){?>
                    <option value="<?=$d['id']?>"><?=$d['nome']?></option>
                    <?php } ?>
                    </select>
                    <br>
                    <p><input type="Number" name="transacao" class="form-control"  placeholder="Quantidade do Produto"/></p>          
                    <p><button name="Login" class="btn btn-lg btn-info btn-block" type="submit">Confirmar</button></p>  
                </form>
            </div>
        </div>
    
</html>
