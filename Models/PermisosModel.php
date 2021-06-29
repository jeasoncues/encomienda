<?php 
 
  class PermisosModel extends Mysql {

    public $intIdpermiso;
    public $intRolid;
    public $intModuloid;
    public $r;
    public $w;
    public $u;
    public $d;

    public function __construct(){
        parent::__construct();
    }

    public function selectModulos()
    {

        $sql = "SELECT  * FROM modulo where estado != 0";
        $request = $this->listar($sql);
        return $request;

    }


    public function selectPermisos(int $idrol)
    {
        $this->intRolid = $idrol;

        $sql = "SELECT * FROM permisos WHERE rolid = $this->intRolid";
        $request = $this->listar($sql);
        return $request;

    }


    public function deletePermisos(int $idrol){
      $this->intRolid = $idrol;
      $sql = "DELETE FROM permisos WHERE rolid = $this->intRolid ";
      $request = $this->eliminar($sql);
      return $request;
    }


    public function insertarPermiso(int $intidrol, int $intidmodulo, int $intr, int $intw, int $intu, int $intd){
 
      $this->intRolid = $intidrol;
      $this->intModuloid = $intidmodulo;
      $this->r = $intr;
      $this->w = $intw;
      $this->u = $intu;
      $this->d = $intd;
      $query_insert  = "INSERT INTO permisos(rolid,moduloid,r,w,u,d) VALUES(?,?,?,?,?,?)";
      $arrData = array($this->intRolid, $this->intModuloid, $this->r, $this->w, $this->u, $this->d);
      $request_insert = $this->insertar($query_insert,$arrData);		
      return $request_insert;
    }


  }


?>