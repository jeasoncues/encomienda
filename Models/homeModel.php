<?php
 
 class homeModel extends Mysql {
   
    public function __construct()
    { 
       parent::__construct();

    }


    public function setUser(string $nombre, int $edad)
    {
       $query_insert = "INSERT INTO usuarios(nombre,edad) VALUES(?,?)";
       $arrData = array($nombre,$edad);
       $request_insert = $this->insertar($query_insert,$arrData);
       return $request_insert;

    }


    public function getUser($id)
    {
       $sql = "SELECT * FROM usuarios WHERE id = $id";
       $request = $this->buscar($sql);
       return $request;

    }

    public function getUsers()
    {
       $sql = "SELECT  * FROM usuarios";
       $request = $this->listar($sql);
       return $request;
    }
    
    public function update(int $id, string $nombre, int  $edad)
    {
       $query_update = "UPDATE usuarios SET nombre = ?, edad = ? WHERE id = $id";
       $arrData = array($nombre,$edad);
       $request_update = $this->actualizar($query_update,$arrData);
       return $request_update;
    }

    public function delete($id)
    {
       $sql = "DELETE FROM usuarios WHERE id = $id";
       $request = $this->eliminar($sql);
       return $request;

    }
 }



?>