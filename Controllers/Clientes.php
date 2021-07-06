<?php 
 
  class Clientes extends Controllers{

    public function __construct(){
        session_start();
        if(empty($_SESSION['logeado']))
        {
            header('Location: '.base_url().'/login');
        }
        parent::__construct();
    }


    public function clientes()
    {
        $data['page_tag'] = "Clientes - Rosa Yolanda";
        $data['page_title'] = "Clientes";
        $data['page_name'] = "clientes";
        $data['page_functions_js'] = "functions_clientes.js";
        $this->views->getView($this,"clientes",$data);
    }

    public function setCliente()
    {
      if($_POST)
      {

          if(empty($_POST['txtDni']) || empty($_POST['txtNombre']) || empty($_POST['txtApellidos']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['txtDireccion']))
          {

              $arrResponse = array("status" => false, "msg" => "Datos Incorrectos");
          }else{
              $idUsuario = intval($_POST['idUsuario']);
              $strDni =  strClean($_POST['txtDni']);
              $strNombre = ucwords(strClean($_POST['txtNombre'])); //convertir a mayuscula 
              $strApellido = ucwords(strClean($_POST['txtApellidos']));
              $intTelefono = intval(strClean($_POST['txtTelefono']));
              $strEmail =  strtolower(strClean($_POST['txtEmail'])); //minusculas
              $strDireccion = strClean($_POST['txtDireccion']);
              
              $intTipoId = 21;  
            
              if($idUsuario == 0 )
              {
                $option = 1;
                //SI CONTRASEÑA VIENE VACIA GENERAMOS CONTRASEÑA ENCRIPTANDOLA / CASO CONTRARIO ENCRIPTAMOS
                $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256",$_POST['txtPassword']);

                $request =  $this->model->insertarCliente($strDni,
                                                          $strNombre,
                                                          $strApellido,
                                                          $intTelefono,
                                                          $strEmail,
                                                          $strPassword,
                                                          $intTipoId,
                                                          $strDireccion);

              }else{
                $option = 2;
                $strPassword =  empty($_POST['txtPassword']) ? "" : hash("SHA256",$_POST['txtPassword']);
                $request =  $this->model->actualizarCliente($idUsuario,
                                                          $strDni,
                                                          $strNombre,
                                                          $strApellido,
                                                          $intTelefono,
                                                          $strEmail,
                                                          $strPassword,
                                                          $intTipoId,
                                                          $strDireccion);

              }
             
              if($request > 0)
              {
                if($option == 1){
                  $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente.');
                }else{
                  $arrResponse = array('status' => true, 'msg' => 'Datos Actualizados correctamente.');
                }
              }else if($request == 'exist'){
                  $arrResponse = array('status' => false, 'msg' => 'El usuario ya existe');
              }else{
                  $arrResponse = array("status" => false, "msg" => "Error en la base de datos");
              }
          }
          echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
      }
      die();
    }

    public function getCliente($idpersona){
   
        $idusuario = intval($idpersona);
        if($idusuario > 0)
        {
          $arrData = $this->model->selectCliente($idusuario);
          if(empty($arrData))
          {
            $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
          }else{
            $arrResponse = array('status' => true, 'data' => $arrData);
          }
          echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
      
      die();
    }


      //EXTRAER CLIENTES
      public function getClientes()
      {
          $arrData = $this->model->selectClientes();
  
           //recorremos el array hasta que llegue a todos los registros que tenemos
          for ($i=0; $i < count($arrData); $i++) { 
            $btnEditar = '';
          
            
          //si el estado es igual a 1 mostrara activo caso contrario inactivo
            if($arrData[$i]['estado'] == 1){
              $arrData[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
            }else{
              $arrData[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
            }

            $btnEditar .= '
            <button class="btn btn-primary btn-sm btnEditarCliente" onclick="fntEditInfo('.$arrData[$i]['idpersona'].')" title="Editar Cliente">
                 <i class="fas fa-pencil-alt"></i>
            </button>
             ';
           
            //acciones para editar, permisos, eliminar enviando su evento y el id persona
            $arrData[$i]['options'] = '<div class="text-center">'.$btnEditar.'
                                      </div>';
  
         }
          echo json_encode($arrData,JSON_UNESCAPED_UNICODE); 
          die(); 
        }


      public function getSelectCliente(){
        $htmlOptions = ""; // 0 registros => vacio
        $arrData = $this->model->selectClientesEncomiendas(); 

        if(count($arrData) > 0){ //la cantidad de registros es mayor a 0

          for($i=0; $i < count($arrData); $i++){
            $htmlOptions .= '<option value="'.$arrData[$i]['idpersona'].'">'.$arrData[$i]['nombres']." ".$arrData[$i]['apellidos'].'</option>';
          }
        }
        echo $htmlOptions;
        die();
      }
       
  }


?>