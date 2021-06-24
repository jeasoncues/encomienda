<?php
  
    //funcion para cargar las clases de forma automatica
    spl_autoload_register(function($class){
        //si existe el archivo libs/core/clase.php 
        if(file_exists("Libraries/".'Core/'.$class.".php")){
            //la va a requerir para mostrar.
            require_once("Libraries/".'Core/'.$class.".php");
        }
    });
  

?>