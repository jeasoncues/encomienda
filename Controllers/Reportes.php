<?php 
 

  class Reportes extends Controllers{

    public function __construct()
    {
        session_start();
        if(empty($_SESSION['logeado']))
        {
            header('Location: '.base_url().'/login');
        }
        parent::__construct();
    }

    public function reportes(){

        $data['page_tag'] = "Reportes - Rosa Yolanda";
        $data['page_title'] = "Reportes";
        $data['page_name'] = "reportes";
        $data['page_functions_js'] = "functions_reportes.js";

        
        $data['roles'] = $this->model->cantidadRoles();
        $data['usuarios'] = $this->model->cantidadUsuarios();
        $data['vehiculos'] = $this->model->cantidadVehiculos();
        $data['encomiendas'] = $this->model->cantidadEncomiendas();

        $data['conductores'] = $this->model->cantidadConductores();

        $data['ultimosvehiculos'] = $this->model->ultimosVehiculos();
        $data['clientetop'] = $this->model->clienteTops();


        $data['clientes'] = $this->model->cantidadClientes();

        // OBTENER AÑO Y MES
        $anio = date('Y');
        $mes = date('m');
        $data['pagoMes'] = $this->model->selectPagosMes($anio,$mes);


        $data['totalVentas'] = $this->model->selectVentas($anio,$mes);
   
        $this->views->getView($this,"reportes",$data);
    }
  }



?>