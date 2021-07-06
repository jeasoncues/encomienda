<?php


  class ComprobantesModel extends Mysql{

    public function __construct()
    {
        parent::__construct();
    }


    public function selectClientes()
    {
        $sql = "SELECT idpersona,dni,nombres,apellidos,telefono,email_user,direccion 
                FROM persona
                WHERE rolid = 21 AND estado != 0";
        $request = $this->listar($sql);
        $request_arr = array('clientes' => $request);
        return $request_arr;
    }


    public function selectConductores()
    {
      
      $sql = "SELECT idpersona,dni,nombres,apellidos,telefono,email_user 
      FROM persona
      WHERE rolid = 2 AND estado != 0";
      $request = $this->listar($sql);
      $request_arr = array('conductores' => $request);
      return $request_arr;
            
    }


  }

?>