<?php

 
 class Controllers {
     
    public function __construct(){
       //invocamos al metodo getView instanciando la clase Views
       $this->views = new Views();
       //mostramos el metodo
       $this->loadModel();
       
    }
   
    //metodo de carga automatica de modelos
    public function loadModel(){
        //obtenemos la clase del modelo
        $model = get_class($this)."Model";
        $routClass = "Models/".$model.".php";
        
        //si existe esta ruta del modelo la requerimos
        if(file_exists($routClass)){
            require_once($routClass);
            $this->model =  new $model();

        }
    }
 }

?>