<?php 
 
 class VehiculosModel extends Mysql {

    public function __construct(){
        parent::__construct();
    }

    public function mostrarVehiculos()
    {
        $sql = "SELECT * FROM vehiculo";
        $request = $this->listar($sql);
        return $request;
    }
 }

?>