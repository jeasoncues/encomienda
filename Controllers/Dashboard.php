<?php

  class Dashboard extends Controllers{

      public function __construct()
      {
          session_start();
          if(empty($_SESSION['logeado']))
          {
              header('Location: '.base_url().'/login');
          }
          parent::__construct();
      }

      public function dashboard()
      {
          $data['page_id'] = 2;
          $data['page_tag'] = "Dashboard - Rosa Yolanda";
          $data['page_title'] = "Dashboard";
          $data['page_name'] = "dashboard";

          $data['roles'] = $this->model->cantidadRoles();
          $data['usuarios'] = $this->model->cantidadUsuarios();
          $data['vehiculos'] = $this->model->cantidadVehiculos();
          $data['encomiendas'] = $this->model->cantidadEncomiendas();
          $data['ultimasencomiendas'] = $this->model->ultimasEncomiendas();

          $data['clientetop'] = $this->model->clienteTops();
          // OBTENER AÑO Y MES
            $anio = date('Y');
            $mes = date('m');
            $data['pagoMes'] = $this->model->selectPagosMes($anio,$mes);

          $this->views->getView($this,"dashboard",$data);
      }
  }
 
?>