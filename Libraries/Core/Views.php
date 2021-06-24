<?php
  class Views {

     public function getView($controller,$view,$data="")
     {
         //obtener la clase del controlador
         $controller = get_class($controller);
         if($controller == "Home"){
             $view = "Views/".$view.".php";
         }else{
             $view = "Views/".$controller."/".$view.".php";
         }
         require_once ($view);
     }
     
  }

?>