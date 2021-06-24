<?php

 require_once("Config/Config.php");
 require_once("Helpers/Helpers.php");
  
  //capturando datos de la url (!empty=> si existe )
  $url = !empty($_GET['url']) ? $_GET['url'] : 'home/home';
  
  //convertimos variable a array, function explode (limitador, cadena)
  $arrUrl = explode("/",$url);


  $controller = $arrUrl[0]; //la posicion 0 sera el controlador
  $method = $arrUrl[0]; 
  $params = ""; 


  if(!empty($arrUrl[1]))
  {
      if($arrUrl[1] != ""){ //si es diferente de vacio

        $method = $arrUrl[1];

      }
  }
  
  //validacion para paramtro
  if(!empty($arrUrl[2])){
      if($arrUrl[2] != ""){
         //recorremos las posiciones de los parametros
         for($i=2; $i < count($arrUrl); $i++){
            //concatenamos la variable params lo que tenga la posicion del array  
            $params .= $arrUrl[$i].',';
         }
         $params = trim($params,','); //trim remueve el ultimo caracter de una cadena que seria la ","

      }
  }
  


 //autoload requerimos
  require_once("Libraries/Core/Autoload.php");

  //Load
  require_once("Libraries/Core/Load.php");


?>