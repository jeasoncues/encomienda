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
       echo json_encode($arrData,JSON_UNESCAPED_UNICODE); //convertir en formato json para hacer llamado en ajax (en caso consumamos la api en movil)
       die(); //finaliza la tarea
     
     }

  }


?>