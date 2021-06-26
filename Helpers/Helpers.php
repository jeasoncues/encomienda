<?php 

  //retornar la url de nuestro proyecto
  function base_url()
  {
    return BASE_URL;
  }

  //retorna la carpeta assets 
  function media(){
    return BASE_URL."/Assets";
  }


  //funcion para obtener el header y footer
  function headerAdmin($data="")
  {
    $view_header = "Views/Template/header_admin.php";
    require_once ($view_header);
  }

  function footerAdmin($data="")
  {
    $view_footer = "Views/Template/footer_admin.php";
    require_once ($view_footer);
  }


  //formatear array de datos
  function dep($data)
  {
      $format = print_r("<pre>");
      $format .= print_r($data);
      $format .= print_r("</pre>");

      return $format;
  }


  //llamado a los modals
  function getModal(string $nombremodal, $data){
    
    $view_modal = "Views/Template/Modals/{$nombremodal}.php"; //ruta del modal
    require_once $view_modal;

  }

  //limpiar caracteres en caso de inyecciones sql
  function strClean($stringcadena){

    $string = preg_replace(['/\s+/','/^\s|\$/'],[' ',''], $stringcadena); //Limpia el exceso de palabras que escriben en los formularios
    $string = trim($string); //Elimina espacios en blanco al inicio y al final
    $string = stripslashes($string); //Elimina los \ invertidos
    //Si encuentra <script> y igual para lo demas en el formulario lo quitara y lo dejara como vacio por ==> "" 
    //Para evitar inyecciones SQL nos brinda seguridad 
    $string = str_ireplace("<script>","",$string); 
    $string = str_ireplace("</script>","",$string);
    $string = str_ireplace("<script src>","",$string);
    $string = str_ireplace("<script type=>","",$string);
    $string = str_ireplace("SELECT * FROM","",$string);
    $string = str_ireplace("DELETE FROM","",$string);
    $string = str_ireplace("INSERT INTO","",$string);
    $string = str_ireplace("SELECT COUNT(*) FROM","",$string);
    $string = str_ireplace("DROP TABLE","",$string);
    $string = str_ireplace("OR '1'='1","",$string);
    $string = str_ireplace('OR "1"="1"',"",$string);
    $string = str_ireplace('OR ´1´= ´1´',"",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("is NULL; --","",$string);
    $string = str_ireplace("LIKE '","",$string);
    $string = str_ireplace('LIKE "',"",$string);
    $string = str_ireplace("LIKE ´","",$string);
    $string = str_ireplace("OR 'a'='a","",$string);
    $string = str_ireplace('OR "a"="a',"",$string);
    $string = str_ireplace("OR ´a´=´a","",$string);
    $string = str_ireplace("OR ´a´=´a","",$string);
    $string = str_ireplace("--","",$string);
    $string = str_ireplace("^","",$string);
    $string = str_ireplace("[","",$string);
    $string = str_ireplace("]","",$string);
    $string = str_ireplace("==","",$string);
    return $string;
  }


  //generar password con 10 caracteres
  function passGenerator($length = 10)
  {
    $pass = "";
    $longitud = $length;
    $cadena = "ABCDEFGHIJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz1234567890";
    $longitudcadena = strlen($cadena);
    for ($i=1; $i <= $longitud ; $i++) { 
       $pos = rand(0,$longitudcadena-1);
       $pass .= substr($cadena,$pos,1);

    }
    return $pass;
  }

  //generar token para restablecer contraseñasa
  function token()
  {
    $r1 = bin2hex(random_bytes(10));
    $r2 = bin2hex(random_bytes(10));
    $r3 = bin2hex(random_bytes(10));
    $r4 = bin2hex(random_bytes(10));

    $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
    return $token;
  }

  function formatMoney($cantidad)
  {
    $cantidad = number_format($cantidad,2,SPD,SPM);
    return $cantidad;
  }

?>