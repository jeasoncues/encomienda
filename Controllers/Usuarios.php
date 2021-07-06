<?php 

 
 class Usuarios extends Controllers {


    public function __construct()
    {
        session_start();
        if(empty($_SESSION['logeado']))
        {
            header('Location: '.base_url().'/login');
        }
        parent::__construct();
    }

    public function usuarios() 
    {
         $data['page_tag'] = "Usuarios - Rosa Yolanda";
         $data['page_title'] = "Usuarios";
         $data['page_name'] = "usuarios";
         $data['page_functions_js'] = "functions_usuarios.js";
         $this->views->getView($this,"usuarios",$data);

    }


    public function setUsuario()
    {
        if($_POST)
        {

            if(empty($_POST['txtDni']) || empty($_POST['txtNombre']) || empty($_POST['txtApellidos']) || empty($_POST['txtTelefono']) || empty($_POST['txtEmail']) || empty($_POST['listRolid']))
            {

                $arrResponse = array("status" => false, "msg" => "Datos Incorrectos");
            }else{
                $idUsuario = intval($_POST['idUsuario']);
                $strDni =  strClean($_POST['txtDni']);
                $strNombre = ucwords(strClean($_POST['txtNombre'])); //convertir a mayuscula 
                $strApellido = ucwords(strClean($_POST['txtApellidos']));
                $intTelefono = intval(strClean($_POST['txtTelefono']));
                $strEmail =  strtolower(strClean($_POST['txtEmail'])); //minusculas
                $intRolid =  intval(strClean($_POST['listRolid']));
                $intEstado = intval(strClean($_POST['listEstado']));
                $request_user = "";

                if($idUsuario == 0)
					{
						$option = 1;
                        //SI CONTRASEÑA VIENE VACIA GENERAMOS CONTRASEÑA ENCRIPTANDOLA / CASO CONTRARIO ENCRIPTAMOS
                        $strPassword = empty($_POST['txtPassword']) ? hash("SHA256", passGenerator()) : hash("SHA256",$_POST['txtPassword']);

                        $request =  $this->model->insertarUsuario($strDni,
                                                                $strNombre,
                                                                $strApellido,
                                                                $intTelefono,
                                                                $strEmail,
                                                                $strPassword,
                                                                $intRolid,
                                                                $intEstado);
                    }else{
                        $option = 2;
						$strPassword =  empty($_POST['txtPassword']) ? "" : hash("SHA256",$_POST['txtPassword']);
                        $request =  $this->model->actualizarUsuario( $idUsuario,
                                                                    $strDni,
                                                                    $strNombre,
                                                                    $strApellido,
                                                                    $intTelefono,
                                                                    $strEmail,
                                                                    $strPassword,
                                                                    $intRolid,
                                                                    $intEstado);
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

    //EXTRAER USUARIOS
    public function getUsuarios()
    {
        $arrData = $this->model->selectUsuarios();

        //recorremos el array hasta que llegue a todos los registros que tenemos
       for ($i=0; $i < count($arrData); $i++) { 
          
        //si el estado es igual a 1 mostrara activo caso contrario inactivo
          if($arrData[$i]['estado'] == 1){
            $arrData[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
          }else{
            $arrData[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
          }
         
          //acciones para editar, permisos, eliminar enviando su evento y el id persona
          $arrData[$i]['options'] = '<div class="text-center">
                                    
                                    <button class="btn btn-secondary btn-sm btnViewUsuario" onclick="fntViewUsuario('.$arrData[$i]['idpersona'].')" title="Ver Usuario">
                                      <i class="far fa-eye"></i>
                                    </button>

                                    <button class="btn btn-primary btn-sm btnEditarUsuario" onclick="fntEditUsuario('.$arrData[$i]['idpersona'].')" title="Editar Usuario">
                                       <i class="fas fa-pencil-alt"></i>
                                    </button>


                                    <button class="btn btn-danger btn-sm btnEliminarUsuario" onclick="fntDelUsuario('.$arrData[$i]['idpersona'].')" title="Eliminar Usuario">
                                       <i class="fas fa-trash-alt"></i>
                                    </button>

                                    </div>';

       }

       echo json_encode($arrData,JSON_UNESCAPED_UNICODE); 
       die(); 
     
    }


    //EXTRAER UN USUARIO
    public function getUsuario(int $idpersona)
    {
        $intIdpersona = intval($idpersona);

        if($intIdpersona > 0) //id valido
        {
            $arrData = $this->model->selectUsuario($intIdpersona);

            if(empty($arrData)){
                $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
            }else{
                $arrResponse = array('status' => true, 'data' => $arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        die();
    }


    public function getSelectConductor(){
        
        $htmlOptions = ""; // 0 registros => vacio
        $arrData = $this->model->selectUsuariosConductores(); 

        if(count($arrData) > 0){ //la cantidad de registros es mayor a 0

          for($i=0; $i < count($arrData); $i++){
            $htmlOptions .= '<option value="'.$arrData[$i]['idpersona'].'">'.$arrData[$i]['nombres']." ".$arrData[$i]['apellidos'].'</option>';
          }
        }
        echo $htmlOptions;
        die();
     }


     public function delUsuario(){
         if($_POST){
             $intIdpersona = intval(strClean($_POST['idpersona']));
             $request = $this->model->eliminarUsuario($intIdpersona);

             if($request == 'ok')
             {
                 $arrResponse = array('status' => true, 'msg' => 'Se ha eliminador el usuario correctamente');
             }else{
                 $arrResponse = array('status' => false, 'msg' => 'Error al eliminar usuario');
             }
             echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
         }
         die();
     }
     

 }

?>