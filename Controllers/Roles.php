<?php 
 

  class Roles extends Controllers {

     public function __construct(){
         parent::__construct();
     }


     public function roles()
     {
         $data['page_id'] = 3;
         $data['page_tag'] = "Roles - Rosa Yolanda";
         $data['page_title'] = "Roles";
         $data['page_name'] = "roles";
         
         $this->views->getView($this,"roles",$data);
     }


     public function getRoles()
     {
       $arrData = $this->model->selectRoles(); //hacemos llamado al model Roles con el metodo selectRoles
       

       //recorremos el array hasta que llegue a todos los registros que tenemos
       for ($i=0; $i < count($arrData); $i++) { 
          
        //si el estado es igual a 1 mostrara activo caso contrario inactivo
          if($arrData[$i]['estado'] == 1){
            $arrData[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
          }else{
            $arrData[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
          }
         
          //acciones para editar, permisos, eliminar enviando su evento y el idrol
          $arrData[$i]['options'] = '<div class="text-center">
                                    
                                    <button class="btn btn-warning btn-sm btnPermisosRol" rl="'.$arrData[$i]['idrol'].'" title="Permisos">
                                      <i class="fas fa-key"></i>
                                    </button>

                                    <button class="btn btn-primary btn-sm btnEditarRol" rl="'.$arrData[$i]['idrol'].'" title="Editar Rol">
                                       <i class="fas fa-pencil-alt"></i>
                                    </button>


                                    <button class="btn btn-danger btn-sm btnEliminarRol" rl="'.$arrData[$i]['idrol'].'" title="Eliminar Rol">
                                       <i class="fas fa-trash-alt"></i>
                                    </button>

                                    </div>';

       }

       echo json_encode($arrData,JSON_UNESCAPED_UNICODE); //convertir en formato json para hacer llamado en ajax (en caso consumamos la api en movil)
       die(); //finaliza la tarea
     
     }


     //EXTRAER UN ROL
     public function getRol(int $idrol)
     {
       $intIdRol =  intval(strClean($idrol));

       if($intIdRol > 0) //id existe  mayor a 0
       {
         $arrData = $this->model->selectRol($intIdRol);

         if(empty($arrData)){ //vacio
           $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados');
         }else{
           $arrResponse = array('status' => true, 'data' => $arrData);
         }
         echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
       }
       die();
     }     
   

     //CREAR UN ROL
     public function setRol()
     {
       $intIdRol = intval(strClean($_POST['idRol']));
       $strRol =  strClean($_POST['txtNombre']);
       $strDescipcion = strClean($_POST['txtdescripcion']);
       $listEstado = intval($_POST['listEstado']);

         if($intIdRol == 0){ //rol no existe, insertamos

            $request = $this->model->insertarRol($strRol,$strDescipcion,$listEstado);
            $option = 1;

         }else{
            //actualizamos (rol existe)
            $request = $this->model->actualizarRol($intIdRol,$strRol,$strDescipcion,$listEstado);
            $option = 2;
         }

         if($request > 0)
         {

            if($option == 1){  // option 1 => crear rol
              $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');
            }else{
              $arrResponse = array('status' => true, 'msg' => 'Datos actualizados correctamente');
            }
        
         }else if($request == 'exist'){

          $arrResponse = array('status' => false, 'msg' => 'El rol ya existe');

        }else{
          $arrResponse = array('status' => false, "msg" => 'No es posible almacenar datos');

        }
       echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
       die();

     }


     //ELIMINAR ROL
     public function delRol()
     {
       if($_POST){ //si hay petecion ejecutamos
          
         $intIdRol = intval(strClean($_POST['idrol']));
         $request = $this->model->eliminarRol($intIdRol);

         if($request == 'ok')
         {
           $arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Rol correctamente');

         }else if($request == 'exist'){
           $arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un rol asociado a un usuario');
         }else{
          $arrResponse = array('status' => false, 'msg' => 'Error al eliminar un Rol');
         }
         echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
       }
       die();
     }


     //EXTRAER ROLES
     public function getSelectRoles(){
        
        $htmlOptions = ""; // 0 registros => vacio
        $arrData = $this->model->selectRoles(); //metodo para listar roles

        if(count($arrData) > 0){ //la cantidad de registros es mayor a 0

          for($i=0; $i < count($arrData); $i++){
            $htmlOptions .= '<option value="'.$arrData[$i]['idrol'].'">'.$arrData[$i]['nombrerol'].'</option>';
          }
        }
        echo $htmlOptions;
        die();
     }


  }


?>