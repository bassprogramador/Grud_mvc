<?php
  namespace Core;

  class Router
  {
    private $controller = "Site";
    private $method = "home";
    private $parametro = [];

    public function __construct()
    {
        #Chamando o método url() para carregar
        $uri = $this->url();
        
        #Verificando se a classe existe
        if(class_exists("App\\Controllers\\".ucfirst($uri[0])))
        {
            $this->controller = $uri[0]; #passando valor para o controller
            unset($uri[0]);
        }
        
        #Instânciando a classe que está na variável $class 
        $class = "App\\Controllers\\".ucfirst($this->controller);
        $object = new $class;

        #Verificando se o método dentro da classe existe
        if(isset($uri[1]) and method_exists($object, $uri[1]))
        {
            $this->method = $uri[1]; #passando valor para o method
            unset($uri[1]);
        }

        #Se o parâmentro está recebendo o array $uri=[]', 
        #retorne os valores desse array, se não retorne um array vazio 
            $this->parametro = $uri ? array_values($uri) : [];
        
        #Para que os arquivos e diretorios seja puxado e exibido na tela  
        #call_user_func_array();

        #Dentro da classe chamando um método dinamicamente com um array de parâmetro
         call_user_func_array([$object, $this->method], $this->parametro);
    
    }
    public function url()
    { 
        #SEPARA A URL POR "/" E INSERE UM ARRAY
        $url = explode('/', filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL));
        return $url;
    }
  }

