<?php

 
  class Home extends Controllers {

    public function __construct()
    {
       parent::__construct();
    }

    public function home($parems)
    { 
      $data['page_id'] = 1;
      $data['page_tag'] = "Sistema Encomiendas";
      $data['page_title'] = "Página principal";
      $this->views->getView($this,"home",$data);
    }


    public function insertarUsuario()
    {
      $data = $this->model->setUser("Jeason",21);
      $data = $this->model->setUser("Sebastian",16);
      $data = $this->model->setUser("Rodrigo",11);
      print_r($data);
    }


    public function verUsuario($id)
    {

      $data = $this->model->getUser($id);
      print_r($data);

    }

    public function verUsuarios()
    {
      $data = $this->model->getUsers();
      print_r($data);
    }
    
    public function actualizarUsuario()
    {
      $data = $this->model->update(2,"Jessica",45);
      print_r($data);
    }

    public function eliminarUsuario($id)
    {
      $data = $this->model->delete($id);
      print_r($data);
    }

  }

?>