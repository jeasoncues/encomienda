<?php 
 
 class VehiculosModel extends Mysql {
  
    private $intIdVehiculo;
    private $intConductores;
    private $strPlaca;
    private $intEstado;

    public function __construct(){
        parent::__construct();
    }
    
    public function insertarVehiculo(int $conductores, string $placa, int $estado)
    {
        $this->intConductores = $conductores;
        $this->strPlaca = $placa;
        $this->intEstado = $estado;
        $return = 0;

        $sql = "SELECT * FROM vehiculo WHERE placa = '{$this->strPlaca}' ";
        $request = $this->listar($sql);

        if(empty($request))
        {
            $sql_insertar = "INSERT INTO vehiculo(personaid,placa,estado) VALUES (?,?,?) ";
            $arrData = array($this->intConductores, $this->strPlaca, $this->intEstado);
            $request_insertar = $this->insertar($sql_insertar,$arrData);
            $return = $request_insertar;
        }else{
            $return = "exist";
        }
        return $return;
        
    }

    public function selectVehiculos()
    {
        $sql = "SELECT v.idvehiculo, p.nombres, v.placa, v.estado 
                FROM vehiculo v
                INNER JOIN persona p
                ON v.personaid = p.idpersona
                WHERE v.estado != 0";
        $return = $this->listar($sql);
        return $return;
    }
    
    public function selectPlacas()
    {
        $sql = "SELECT v.idvehiculo, p.nombres, v.placa, v.estado
        FROM vehiculo v
        INNER JOIN persona p
        ON v.personaid = p.idpersona
        WHERE p.rolid = 2 AND p.estado = 1 ";
        $request = $this->listar($sql);
        return $request;
    }


    public function selectVehiculo(int $idvehiculo)
    {
        $this->intIdVehiculo =  $idvehiculo;
        $sql = "SELECT * FROM vehiculo WHERE idvehiculo = $this->intIdVehiculo";
        $request = $this->buscar($sql);
        return $request;
    }

    public function eliminarVehiculo(int $idvehiculo)
    {
        $this->intIdVehiculo = $idvehiculo;

        $sql = "UPDATE vehiculo SET estado = ?  WHERE idvehiculo = $this->intIdVehiculo";
        $arrData = array(0);
        $request = $this->actualizar($sql,$arrData);

        
        if($request)
        {
            $request = 'ok';
        }else{
            $request = 'error';
        }
        return $request;
    }


 }

?>