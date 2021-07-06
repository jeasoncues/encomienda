<?php
 
 class Logout extends Controllers{

    public function __construct(){
        session_start(); //inicializamos variables
        session_unset(); //limpiamos variables 
        session_destroy(); //destruimos variables
        header('Location: '.base_url().'/login');
        parent::__construct();
    }
 }

?>