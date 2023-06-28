<?php
  namespace App\Controllers;
  use App\Model\Crud;
  

  class Site 
  {  
    //Método padrão que carrega a lista de contatos
      public function home()
      {
        $objetoCrud = new Crud();
        $lista = $objetoCrud->getLista();  // O método read tem o array
        include "App/Views/home.php";     
      }
      
    //Método para chamar a view formulario para cadastrar
      public function cadastrar()
      {
        include "App/Views/cadastrar.php";   
      }
      
    //Método para capturar os dados vindo do formulario e salvar no banco de dados
      public function salvar()
      {
        $objetoCrud = new Crud();
        
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
        $telefone = filter_input(INPUT_POST, 'telefone', FILTER_VALIDATE_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        
              if($id == true)
              {
                #Se id veio, clicou no botão Editar
                $objetoCrud->atualizar($id, $nome, $telefone, $email); 
                header("location: ?url=site/home/");
              }
              else
              {
                #Se id não veio, clicou no botão Cadastrar
                $objetoCrud->inserir($nome, $telefone, $email);      
                header("location: ?url=site/home/");
              } 
            
        }
    //Método para buscar pelo parâmetro id o registro que será editado   
      public function editar() 
      {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $objetoCrud = new Crud();
        $editar = $objetoCrud->buscarPorId($id);
        include "App/Views/editar.php";
      }

    //Método para confirmar se o registro será realmente excluído 
      public function confirmaDelete()
      {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        include "App/Views/deletar.php";
      }
     
    //Método para deletar o registro no em um recurso
      public function deletar()
      {
          $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS); 
          $crud = new Crud();
          $crud->delete($id);
          header("location: ?url=site/home/");
      }

    //Método para buscar a pesquisa no banco de dados
      public function buscar()
      {
        $crud = new Crud();
        #Neste array estou recebendo o valor do botão e da pesquisa 
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        #Só ira pesquisar se clicar no botão buscar
        if(!empty($dados['buscar']))
        {
            $nome = "%". $dados['nome_usuario']."%";
            $resultado = $crud->pesquisar($nome);
            include "App/Views/listaPesquisar.php";
        }
      }
  }


 