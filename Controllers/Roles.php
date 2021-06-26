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
     


     public function setRol()
     {
       $strRol =  strClean($_POST['txtNombre']);
       $strDescipcion = strClean($_POST['txtdescripcion']);
       $listEstado = intval($_POST['listEstado']);
       $request = $this->model->insertarRol($strRol,$strDescipcion,$listEstado);


       if($request > 0) //no hay rol, pasaremos a insertar
       {

        $arrResponse = array('status' => true, 'msg' => 'Datos guardados correctamente');

       }else if($request == 'exist'){

         $arrResponse = array('status' => false, 'msg' => 'El rol ya existe');

       }else{
         $arrResponse = array('status' => false, "msg" => 'No es posible almacenar datos');

       }

       echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
       die();

     }


  }


?>