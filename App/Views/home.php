    <main>
      <div class="corpoLista">
        <h1>Lista de Contatos</h1>
        <p> <?php echo count($lista)?> Clientes cadastrados</p>
          <table>
             <thead>
                <tr>
                    <th>Nome</th><th>Telefone</th><th>E-mail</th><th class="acoes">Ações</th>
                </tr>
             </thead>
             <tbody>
                <?php foreach($paginar as $campo): ?>
                <tr>
                    <td><?php echo $campo["nome"]?></td>
                    <td><?php echo $campo["telefone"]?></td>
                    <td><?php echo $campo["email"] ?></td>
                    
                    <!--Link para as ações editar e excluir-->
                    <td>
                      <a  href="?url=site/editar/&id=<?php echo $campo["id"] ?>">Editar</a> |
                      <a  href="?url=site/confirmaDelete/&id=<?php echo $campo["id"] ?>">Deletar</a>
                    </td>
                <tr>
                <?php endforeach; ?>
             </tbody>
           </table>
          
          <br>
          
          <!-------------------------------------------------------------------------------------------->
          <!--                   Link de navegação das página dinâmicamente                           -->
          <!-------------------------------------------------------------------------------------------->

          <!--Total de páginas-->
 
          <p>Página <?php echo $pagina." de ". $total_paginas; ?></p>
          
          <?php if($pagina > 1) : ?>
              
              <a href="?url=site/home/&pagina=<?php echo $pagina - 1; ?>">Anterior</a>
          
          <?php endif;?>
          <?php 
               //Aredondamento
                 $inicio = max(1, $pagina - 2); //pega da página atual menos 2 números
                 $fim = min($total_paginas, $pagina + 2);
               
                    for($i = $inicio; $i <= $fim; $i++)
                    {
                        //echo $i; 
                          if($i == $pagina) // ex: $i = 2 e $pagina = 2 entra no if
                          {
                              echo $i;  // exibir o que não é link
                          }
                          else
                          {
                            echo ' <a href=" ?url=site/home/&pagina=' . $i .' ">'.$i.'</a>  '; // exibir os links
                          }
                    }

                    
            
          ?>
          <?php if($pagina < $total_paginas) : ?>
              <a href="?url=site/home/&pagina=<?php echo $pagina + 1; ?>">Próximo</a>
          <?php endif;?>
          
        
     </div>
    </main>

    