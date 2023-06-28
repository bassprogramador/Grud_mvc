<?php 
  namespace App\Model;
  use App\Model\Conexao;

  class Crud extends Conexao
  {
    //CREATE -> Método para criar, inserir dados em um recurso
      public function inserir( $nome, $telefone, $email)
      {
        $conect = $this->banco(); 
        #Query - consulta para inserir valores no banco 
        $sql = "INSERT INTO pessoa value(default,:nome, :telefone,:email)";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':telefone',$telefone);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        return $stmt;
        
      }
      
    //READ -> Método para "Consultar" lista um ou mais registro em um recurso 
      public function getLista()
      {
        $conect = $this->banco(); 
        #Query - consulta para listar valores no banco 
        $sql = "SELECT * FROM pessoa";
        $stmt = $conect->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
      }
      
      public function getTotalRegostros()
      {
        $conect = $this->banco(); 
        $sql = "SELECT id FROM pessoa";
        $stmt = $conect->prepare($sql);
        $stmt->execute();
        $count =  $stmt->rowCount(); //conta o numeros de linhas
        return $count;
      }
    

      
    //Método para procurar por nome um registro em um recurso
      public function pesquisar($nome)
      {
        $conect = $this->banco(); 
        #Query - consulta para listar valores no banco 
        $sql = "SELECT id, nome, telefone, email FROM pessoa 
                WHERE nome LIKE :nome ORDER BY nome ASC";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->execute();
        
        $resultado = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $resultado;
      }

    //Método para buscar o registro que será editado 
      public function buscarPorId($id)  
      {
        $conect = $this->banco(); 
        $sql = "SELECT * FROM pessoa WHERE id = :id";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
          if($stmt->rowCount() > 0)
          {
              $registros = $stmt->fetch(\PDO::FETCH_ASSOC);
              return $registros;
          }
          else
          {
              return $registros =[];
          }
      }

    //UPDATE -> Método para atualizar um ou mais registro em um recurso
      public function atualizar($id, $nome, $telefone, $email)
      { 
        $conect = $this->banco(); 
        $sql = "UPDATE pessoa SET nome =:nome, telefone = :telefone, email = :email WHERE id=:id";
        #Query - consulta para atualizar valores no banco 
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->bindParam(':nome',$nome);
        $stmt->bindParam(':telefone',$telefone);
        $stmt->bindParam(':email',$email);
        
        $stmt->execute();
        return $stmt;
      }
          
    //DELETE -> Método para excluir um ou mais registro em um recurso
      public function delete($id)
      {
        $conect = $this->banco(); 
        $sql = "DELETE FROM pessoa WHERE id = :id";
        $stmt = $conect->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt;
      }
    
}