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

  }


?>