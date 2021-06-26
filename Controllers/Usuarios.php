<?php 

 
 class Usuarios extends Controllers {


    public function __construct()
    {
        parent::__construct();
    }

    public function usuarios() 
    {
         $data['page_id'] = 4;
         $data['page_tag'] = "Usuarios - Rosa Yolanda";
         $data['page_title'] = "Usuarios";
         $data['page_name'] = "usuarios";

         $this->views->getView($this,"usuarios",$data);

    }


    public function getUsuarios()
    {
        $arrData = $this->model->listarUsuarios();
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        die();
    }

 }

?>