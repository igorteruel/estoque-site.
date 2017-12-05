

<html>
    <head>
        <title>Página inicial</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/BootStrap.min.css" rel="stylesheet">
        <link href="public/css/estilo.css" rel="stylesheet" type="text/css"/>
    </head>
    
        <br>
        <div class="container">
        <header class="row clearfix">
            <img src="public/img/logomarca.png" alt=""/>
        </header>
            <br>
        <div class="row clearfix caixa">
       <section class="col-md-6">
           <form method="POST" class="form-estilo" action="/cadastrar">
           <hr> 
           <h2 class="titulo">
               <strong>Cadastro</strong>
           </h2>
     <hr>
     <p><input type="email" name="email" class="form-control" placeholder="Digite seu email " required/></p>
     <p><input type="name" name="nome" class="form-control" placeholder="Digite seu nome" required/></p>
     <p><input type="password" name="senha" class="form-control" placeholder="Digite sua senha" required/></p>
     <p><input type="password" name="csenha" class="form-control" placeholder="Confira sua senha" required/></p>
     <p><?=$msg?><p>
     <p><button name="Login" class="btn btn-lg btn-info btn-block" type="submit">Cadastrar</button></p>
           </form>
       </section> 
        
       <section class="col-md-6"> 
           <form method="POST" class="form-estilo" action="/login">
           <hr> 
           <h2 class="titulo">
               <strong>login</strong>
           </h2>
     <hr>
     <p><input type="email" name="email" class="form-control"  placeholder="Digite seu email" required/></p>
     <p><input type="password" name="senha" class="form-control"  placeholder="Digite sua senha" required/></p>
         <p><button name="Login" class="btn btn-lg btn-info btn-block" type="submit">Entrar</button></p>
     <a href="/tabela" class="btn btn-lg btn-info btn-block">Visualizar Produtos</a>
        </form>  
       </section>
        </div>
    
</html>
