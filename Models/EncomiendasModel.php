<?php 
 
  class EncomiendasModel extends Mysql{
   
    private $intIdEncomienda;
    private $intClientes;
    private $strDestinatario;
    private $intEstado;
    private $strDestino;
    private $intPlaca;
    private $strDescripcion;
    private $intPeso;
    private $intTipopago;
    private $strMonto;

    public function __construct()
    {
        parent::__construct();
    }

    public function insertarEncomienda(int $clientes, string $destinatario, int $estado, string $destino, string $descripcion, string $peso, int $placa, int $tipopago, int $monto)
    {
      $this->intClientes = $clientes;
      $this->strDestinatario = $destinatario;
      $this->intEstado = $estado;
      $this->strDestino = $destino;
      $this->intPlaca = $placa;
      $this->strDescripcion = $descripcion;
      $this->intPeso = $peso;
      $this->intTipopago = $tipopago;
      $this->strMonto = $monto;
      $return = 0;

      $sql = "INSERT INTO encomienda(personaid,destinatario,estado,destino,descripcion,peso_paquete,vehiculoid,tipopago,monto) VALUES (?,?,?,?,?,?,?,?,?) ";
      $arrData = array(
                      $this->intClientes,
                      $this->strDestinatario,
                      $this->intEstado,
                      $this->strDestino,
                      $this->strDescripcion,
                      $this->intPeso,
                      $this->intPlaca,
                      $this->intTipopago,
                      $this->strMonto
                      );
      $request = $this->insertar($sql,$arrData);
      $return = $request;
      return $return;
    }


    //OBTENER ENCOMIENDAS
    public function selectEncomiendas()
    {
      $sql = "SELECT e.idencomienda, p.nombres, e.destinatario, e.estado, e.destino, e.descripcion, e.peso_paquete, v.placa, e.tipopago, e.monto
              FROM encomienda e
              INNER JOIN persona p
              ON e.personaid = p.idpersona
              INNER JOIN vehiculo v
              ON e.vehiculoid = v.idvehiculo ";
      $request = $this->listar($sql);
      return $request;
    }

    public function selectEncomienda(int $idencomienda)
    {
     
          $this->intIdEncomienda = $idencomienda;
          $sql = "SELECT e.idencomienda, e.destinatario, e.destino, p.idpersona, p.nombres, e.descripcion, e.peso_paquete, v.placa, v.idvehiculo, e.tipopago, e.monto FROM encomienda e INNER JOIN persona p ON e.personaid = p.idpersona  INNER JOIN vehiculo v
          ON e.vehiculoid = v.idvehiculo  WHERE idencomienda = $this->intIdEncomienda";
          $request = $this->buscar($sql);
          return $request;
      
    }


    public function actualizarEncomienda(int $idencomienda,int $clientes, string $destinatario, int $estado, string $destino, string $descripcion, string $peso, int $placa, int $tipopago, int $monto)
    {
      $this->intIdEncomienda = $idencomienda;
      $this->intClientes = $clientes;
      $this->strDestinatario = $destinatario;
      $this->intEstado = $estado;
      $this->strDestino = $destino;
      $this->strDescripcion = $descripcion;
      $this->intPeso = $peso;
      $this->intPlaca = $placa;
      $this->intTipopago = $tipopago;
      $this->strMonto = $monto;

      $sql = "UPDATE encomienda SET personaid= ?, destinatario = ?, estado = ?, destino = ?, descripcion = ?, peso_paquete= ?, vehiculoid = ?, tipopago = ?, monto = ? WHERE idencomienda = $this->intIdEncomienda";
      $arrData = array(
                      $this->intClientes = $clientes,
                      $this->strDestinatario = $destinatario,
                      $this->intEstado = $estado,
                      $this->strDestino = $destino,
                      $this->strDescripcion = $descripcion,
                      $this->intPeso = $peso,
                      $this->intPlaca = $placa,
                      $this->intTipopago = $tipopago,
                      $this->strMonto = $monto,
                      );
      $request = $this->actualizar($sql,$arrData);
      return $request;
    }

  }


?>