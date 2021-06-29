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
    
    //metodo extraer 1 rol
    public function selectRol(int $idrol) 
    {
        $this->intIdrol = $idrol;
        $sql = "SELECT * FROM rol WHERE idrol = $this->intIdrol";
        $request = $this->buscar($sql);
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

    public function actualizarRol(int $idrol, string $nombrerol, string $descripcion, int $estado)
    {
        $this->intIdrol = $idrol;
        $this->strRol = $nombrerol;
        $this->strDescripcion = $descripcion;
        $this->intestado = $estado;
        
        $sql = "SELECT * FROM rol WHERE nombrerol = '$this->strRol' AND idrol != $this->intIdrol";
        $request_sql = $this->buscar($sql);

        if(empty($request_sql))
        {
            $sql = "UPDATE rol SET nombrerol = ?, descripcion = ?, estado =? WHERE idrol = $this->intIdrol";
            $arrData = array($this->strRol,$this->strDescripcion,$this->intestado);
            $request = $this->actualizar($sql,$arrData);
        }else{
            $request = "exist";
        }
        return $request;
    }


    public function eliminarRol(int $idrol)
    {
        $this->intIdrol = $idrol;

        $sql = "SELECT * FROM persona WHERE rolid = $this->intIdrol"; //que el rol no este asociado a una persona
        $request = $this->listar($sql);


        if(empty($request))
        {
            $sql = "UPDATE rol SET estado = ? WHERE idrol = $this->intIdrol ";
            $arrData = array(0);
            $request = $this->actualizar($sql,$arrData);

            if($request)
            {
                $request = 'ok';
            }else{
                $request = 'error';
            }
        }else{
            $request = 'exist';
        }
        return $request;
    }

 }


?>