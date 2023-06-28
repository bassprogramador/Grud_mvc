<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <title>Pagina Galeria</title>
</head>
<body>
     <header>
        <div class="logo">
            <h2><a href="">CABEÇALHO</a><h2>
        </div>
        <nav>
            <ul>
                <li><a href="?url=site/cadastrar/">Cadastrar</a></li>
                <li><a href="?url=site/home/">Lista de Contatos</a></li>
            </ul>
        </nav>
        <div class="pesquisar"> 
           <form action="?url=site/buscar/" method="POST">
            <input type="text" name="nome_usuario" placeholder="Digite o nome">
            <input type="submit" name ="buscar" id="buscar" value="Buscar">
           </form>
        </div>
     </header>
     <br><hr>

