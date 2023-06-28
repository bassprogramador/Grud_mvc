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
                <?php foreach($lista as $campo): ?>
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
     </div>
    </main>

    