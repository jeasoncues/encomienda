<?php

 
 class Conexion {

    private $conect;


    public function __construct() 
    {
        $conexion = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
        
        try {
            $this->conect =  new PDO($conexion, DB_USER, DB_PASSWORD);
            
            //Detectando errores
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            $this->conect = 'Error de conexion';

            echo 'Error: '.$e->getMessage();
        }
    }

    public function connect()
    {
        return $this->conect;
    }

 }



?>