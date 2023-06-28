<?php

#Todas as classes estão sendo incluida automaticamente
 include __DIR__.'../vendor/autoload.php';
 use Core\Router;

#Instanciei a classe Router e incluir os arquivos 
#Cabeçalho e Rodapé

 include "App/Views/cabecalho.php";
 $rota = new Router();
 include "App/Views/rodape.php";




 