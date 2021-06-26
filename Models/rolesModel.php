<?php
 
 class RolesModel extends Mysql {


	public $intIdrol;
	public $strRol;
	public $strDescripcion;
    public $intestado;


    public function __construct()
    {
        parent::__construct();
    }

    //metodo extraer registros de la tabla roles
    public function selectRoles()
    {
        $sql = "SELECT * FROM rol WHERE estado != 0"; //extraer roles donde el estado sea diferente de 0 => eliminado.
        $request = $this->listar($sql); //hacemos uso del metodo listar de la clase mysql enviando como parametro la sentencia
        return $request;
    }


    public function insertarRol(string $rol, string $descripcion, int $estado)
    {
        $return = "";
        $this->strRol = $rol;
		$this->strDescripcion = $descripcion;
        $this->intestado = $estado;
        
        //si el rol existe
        $sql = "SELECT * FROM rol WHERE nombrerol = '{$this->strRol}' ";
        $request_sql = $this->listar($sql);

        if(empty($request_sql))
        {
            $insert = "INSERT INTO rol(nombrerol,descripcion,estado) VALUES (?,?,?)";
            $arrData = array($this->strRol, $this->strDescripcion, $this->intestado);
            $request_insert = $this->insertar($insert,$arrData);
            $return  = $request_insert;
        }else{
            $return = 'exist';
        }

        return $return;


    }

 }


?>