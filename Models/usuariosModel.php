<?php 

 
  class UsuariosModel extends Mysql {

    public function __construct(){
        parent::__construct();
    }


    public function listarUsuarios()
    {
        $sql = "SELECT * FROM persona WHERE estado != 0";
        $request = $this->listar($sql);
        return $request;
    }
  }

?>