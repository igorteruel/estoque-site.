
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/BootStrap.min.css" rel="stylesheet">
        <link href="public/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
       <header>
           <img src="public/img/Logomarca.png" alt=""/>
       </header>
        <div class="row clearfix caixa">
        <hr>
        <h2 class="titulo">
            <strong> Estoque </strong>            
      <table>
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

    </body>
</html>
