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

    public function permisosModulo(int $idrol){
			$this->intRolid = $idrol;
			$sql = "SELECT p.rolid,
						   p.moduloid,
						   m.titulo as modulo,
						   p.r,
						   p.w,
						   p.u,
						   p.d 
					FROM permisos p 
					INNER JOIN modulo m
					ON p.moduloid = m.idmodulo
					WHERE p.rolid = $this->intRolid";
			$request = $this->listar($sql);
			$arrPermisos = array();
			for ($i=0; $i < count($request); $i++) { 
				$arrPermisos[$request[$i]['moduloid']] = $request[$i];
			}
			return $arrPermisos;
		}


  }


?>