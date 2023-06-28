<main>
      <div class="corpoLista">
        <h1>Lista de Contatos</h1>
        <?php 
           $result = count($resultado);
            if($result > 0)
            {
               echo "<h3>$result Registro Encontrado</h3>";
            }
            else
            {  
               echo "<h3>Não foi encontrado nenhum resultado</h3>";
            }
        ?> 
         <table>
            <thead>
               <tr>
                    <th>Nome</th><th>Telefone</th><th>E-mail</th><th class="acoes">Ações</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach($resultado as $campo): ?>
                  <tr>
                     <td><?php echo $campo["nome"]?></td>
                     <td><?php echo $campo["telefone"]?></td>
                     <td><?php echo $campo["email"] ?></td>
                    
                     <!--Link para ações editar e excluir-->
                     <td>
                       <a  href="?url=site/editar/&id=<?php echo $campo["id"] ?>">Editar</a> |
                       <a  href="?url=site/confirmaDelete/&id=<?php echo $campo["id"] ?>">Deletar</a>
                     </td>
                  <tr>
               <?php endforeach; ?>
            </tbody>
         </table>
      </div>
</main>