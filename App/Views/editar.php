
<main>
    <h1>Página de Edição de Contatos</h1>
    <form action="?url=site/salvar/" method="post">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $editar['nome']; ?>">
            <br><br>
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" value="<?php echo $editar['telefone']; ?>">
            <br><br>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?php echo $editar['email']; ?>">
            <br><br>
            <input type="hidden" name ="id" value="<?php echo $editar['id']; ?>">
            <input type="submit" value="Atualizar">
    </form>
</main>

