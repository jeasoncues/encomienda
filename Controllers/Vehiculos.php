<?php 

 
  class Vehiculos extends Controllers {


    public function __construct(){
        parent::__construct();
    }
    
    public function vehiculos()
    {
        $data['page_id'] = 5;
        $data['page_tag'] = "Vehiculos - Rosa Yolanda";
        $data['page_title'] = "Vehiculos";
        $data['page_name'] = "vehiculos";

        $this->views->getView($this,"vehiculos",$data);
    }


    //EXTRAER TODOS LOS VEHICULOS
    public function getVehiculos()
    {
        $arrData = $this->model->mostrarVehiculos();
        echo json_encode($arrData,JSON_ENCODE_UNICODE);
        die();
    }

    //INSERTAR VEHICULOS
    public function setVehiculos()
    {
        
    }

  }


?>