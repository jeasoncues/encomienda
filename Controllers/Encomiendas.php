<?php 

 
 class Encomiendas extends Controllers{

    public function __construct()
    {
        session_start();
        if(empty($_SESSION['logeado']))
        {
            header('Location: '.base_url().'/login');
        }
        parent::__construct();
    }

    public function encomiendas()
    {
        $data['page_tag'] = "Encomiendas -  Rosa Yolanda";
        $data['page_title'] = "Encomiendas";
        $data['page_name'] = "encomiendas";

        $data['page_functions_js'] = "functions_encomiendas.js";
        $this->views->getView($this,"encomiendas",$data);
    }

    public function setEncomienda()
    {
        if($_POST)
        {
            if(empty($_POST['txtDestinatario']) || empty($_POST['txtDestino']) || empty($_POST['txtMonto']) || empty($_POST['txtdescripcion']) || empty($_POST['txtTipoPaquete']))
            {
                $arrResponse = array("status" => false, "msg" => "Datos incorrectos");
            }else{
                
                $intIdencomienda = intval(strClean($_POST['idEncomienda']));
                $intClientes = intval(strClean($_POST['listClientes']));
                $strDestinatario = strClean($_POST['txtDestinatario']);
                $strDestino = strClean($_POST['txtDestino']);
                $intEstado = intval(strClean($_POST['listEstado']));
                $intPlaca = intval(strClean($_POST['listPlaca']));
                $strDescripcion = strClean($_POST['txtdescripcion']);
                $intPeso = strClean($_POST['txtTipoPaquete']);
                $intTipoPago = intval(strClean($_POST['listTipoPago']));
                $strMonto = intval(strClean($_POST['txtMonto']));
                $request_user = "";

                if($intIdencomienda == 0){
                    $option = 1;
                    $request_user = $this->model->insertarEncomienda(
                                                            $intClientes,
                                                            $strDestinatario,
                                                            $intEstado,
                                                            $strDestino,
                                                            $strDescripcion,
                                                            $intPeso,
                                                            $intPlaca,
                                                            $intTipoPago,
                                                            $strMonto
                        );
                  
                }else{
                    $option = 2;
                    $request_user= $this->model->actualizarEncomienda($intIdencomienda,
                                                                    $intClientes,
                                                                    $strDestinatario,
                                                                    $intEstado,
                                                                    $strDestino,
                                                                    $strDescripcion,
                                                                    $intPeso,
                                                                    $intPlaca,
                                                                    $intTipoPago,
                                                                    $strMonto
                
                                                            );
                   
                }

                if($request_user > 0)
                {
                    if($option == 1){
                        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
                    }else if($option == 2){
                        $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
                    }
                }else{
                    $arrResponse = array("status" => false, "msg" => "Error del servidor");
                }
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        die();
    }


    public  function getEncomiendas()
    {
        $arrData = $this->model->selectEncomiendas();

      
       
          for ($i=0; $i < count($arrData); $i++) { 

            $btnPdf = '';
            $btnEdit= '';
         
              if($arrData[$i]['estado'] == 1){
                $arrData[$i]['estado'] = '<span class="badge badge-success">Preparada</span>';
              }else if($arrData[$i]['estado'] == 2){
                $arrData[$i]['estado'] = '<span class="badge badge-primary">Entregada</span>';
              }else{
                $arrData[$i]['estado'] = '<span class="badge badge-danger">Cancelada</span>';
              }


              if($arrData[$i]['tipopago'] == 1)
              {
                  $arrData[$i]['tipopago'] = '<span class="badge badge-warning">Efectivo</span>';
              }else{
                $arrData[$i]['tipopago'] = '<span class="badge badge-primary">Tarjeta</span>';
              }

              $btnPdf .=  '<a title="Generar PDF" href="'.base_url().'/factura/generarFactura/'.$arrData[$i]['idencomienda'].'" target="_blanck" class="btn btn-danger btn-sm">
                        <i class="fas fa-file-pdf"></i>
                           </a> ';
              $btnEdit .= '
                           <button class="btn btn-primary btn-sm btnEditarEncomienda" onclick="fntEditEncomienda('.$arrData[$i]['idencomienda'].')" title="Editar Encomienda">
                                <i class="fas fa-pencil-alt"></i>
                           </button>
                            ';

   
              $arrData[$i]['options'] = '<div class="text-center">'.$btnPdf.$btnEdit.'</div>';
                                        
                             
    
           }
           echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
           die();
    }


    public function getEncomienda(int $idencomienda)
    {
        $intIdencomienda = intval($idencomienda);

        if($intIdencomienda > 0) //id valido
        {
            $arrData = $this->model->selectEncomienda($intIdencomienda);

            if(empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        die();
    }


   

 }


?>