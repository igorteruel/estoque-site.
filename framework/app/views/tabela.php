
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/BootStrap.min.css" rel="stylesheet">
        <link href="public/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <Br>
    <body>
    <div class="container">
        <header class="row clearfix">
            <img src="public/img/logomarca.png" alt=""/>
             <?php 
        if(isset($_SESSION['user'])) {?>
    <a href="/logout" class="btn btn-lg btn-info pull-right">Logout</a>
    <?php } ?>   
         <a href="/" class="btn btn-lg btn-info pull-right">Voltar</a>
        </header>
        <br>
        <div class="row clearfix caixa">
        <center><?php 
        if(isset($_SESSION['user'])) {?>
    <a href="/cprodutos" class="btn btn-lg btn-info">Cadastrar Produtos</a>
    <?php } else {?>
    <p>Não possui direitos para mexer no estoque</p>
    <?php } ?></center>
        <hr>
        <h2 class="titulo">
            <strong> Estoque </strong>
            <br><br>
            <center>            
      <table class="table table-striped table-dark">
      <thead>
      <tr>
      <th>Produto</th>
      <th>Quantidade</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($dados as $d) {?>
        <tr>
            <td><?=$d['nome']?></td>
            <td><?=$d['total']?></td>
        </tr>
        <?php } ?>
      </tbody>
</table>
</center>
    
    </div>

    </body>
</html>
