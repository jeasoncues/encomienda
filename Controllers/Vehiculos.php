<?php 

 
  class Vehiculos extends Controllers {


    public function __construct()
    {
        session_start();
        if(empty($_SESSION['logeado']))
        {
            header('Location: '.base_url().'/login');
        }
        parent::__construct();
    }
    
    public function vehiculos()
    {
        $data['page_id'] = 5;
        $data['page_tag'] = "Vehiculos - Rosa Yolanda";
        $data['page_title'] = "Vehiculos";
        $data['page_name'] = "vehiculos";
        $data['page_functions_js'] = "functions_vehiculos.js";
        $this->views->getView($this,"vehiculos",$data);
    }


    public function getVehiculos()
    {
      $arrData = $this->model->selectVehiculos();
      
          //recorremos el array hasta que llegue a todos los registros que tenemos
          for ($i=0; $i < count($arrData); $i++) { 
          
            //si el estado es igual a 1 mostrara activo caso contrario inactivo
              if($arrData[$i]['estado'] == 1){
                $arrData[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
              }else{
                $arrData[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
              }
             
              //acciones para editar, permisos, eliminar enviando su evento y el id vehiculo
              $arrData[$i]['options'] = '<div class="text-center">
                                        
                                      
                                        <button class="btn btn-primary btn-sm btnEditarVehiculo" onclick="fntEditVehiculo('.$arrData[$i]['idvehiculo'].')" title="Editar Vehiculo">
                                           <i class="fas fa-pencil-alt"></i>
                                        </button>
    
    
                                        <button class="btn btn-danger btn-sm btnEliminarVehiculo" onclick="fntDelVehiculo('.$arrData[$i]['idvehiculo'].')" title="Eliminar Vehiculo">
                                           <i class="fas fa-trash-alt"></i>
                                        </button>
    
                                        </div>';
    
           }
           echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
           die();
    
    }


    //EXTRAER UN VEHICULO
    public function getVehiculo(int $idvehiculo)
    {
      $intIdVehiculo = intval(strClean($idvehiculo));

      if($intIdVehiculo > 0)
      {
        $arrData = $this->model->selectVehiculo($intIdVehiculo);
        if(empty($arrData)){ //vacio
          $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
        }else{
          $arrResponse = array('status' => true, 'data' => $arrData);
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
      }
      die();
    }

    //INSERTAR VEHICULOS
    public function setVehiculo()
    {

      if($_POST)
      {
        if(empty($_POST['listConductor']) || empty($_POST['txtPlaca']))
        {
          $arrResponse = array("status" => false, "msg" => "Datos Incorrectos.");
        }else{
          
          $intConductor = intval(strClean($_POST['listConductor']));
          $strPlaca =  strClean($_POST['txtPlaca']);
          $intEstado =  intval(strClean($_POST['listEstado']));

          $arrData = $this->model->insertarVehiculo($intConductor,$strPlaca,$intEstado);

          if($arrData > 0)
          {
            $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
          }else if($arrData == 'exist'){
            $arrResponse = array('status' => false, 'msg' => 'El vehiculo ya existe');
          }else{
            $arrResponse = array("status" => false, "msg" => "Error del servidor");
          }
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
      }
      die();
    }


    public function getSelectPlaca()
    {
      $htmlOptions = ""; // 0 registros => vacio
      $arrData = $this->model->selectPlacas(); 

      if(count($arrData) > 0){ //la cantidad de registros es mayor a 0

        for($i=0; $i < count($arrData); $i++){
          $htmlOptions .= '<option value="'.$arrData[$i]['idvehiculo'].'">'.$arrData[$i]['placa'].'</option>';
        }
      }
      echo $htmlOptions;
      die();
    }


    public function delVehiculo()
    {
      if($_POST){ //si hay petecion ejecutamos
          
        $intIdVehiculo = intval(strClean($_POST['idvehiculo']));
        $request = $this->model->eliminarVehiculo($intIdVehiculo);

        if($request == 'ok')
        {
          $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Vehiculo correctamente');

        }else{
         $arrResponse = array('status' => false, 'msg' => 'Error al eliminar un Vehiculo');
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
      }
      die();
    }


  }


?>