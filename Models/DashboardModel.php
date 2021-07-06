<?php 
 

  class DashboardModel extends Mysql{

    public function __construct(){
        parent::__construct();
    }

    public function cantidadRoles()
    {
        $sql = "SELECT COUNT(*) as total FROM rol WHERE estado != 0";
        $request = $this->buscar($sql);
        $total = $request['total'];
        return $total;
    }


    public function cantidadUsuarios()
    {
      $sql = "SELECT COUNT(*) as total FROM persona WHERE estado != 0";
      $request = $this->buscar($sql);
      $total = $request['total'];
      return $total;
    }

    public function cantidadVehiculos()
    {
      $sql = "SELECT COUNT(*) as total FROM vehiculo WHERE estado != 0";
      $request = $this->buscar($sql);
      $total = $request['total'];
      return $total;
    }
    
    public function cantidadEncomiendas()
    {
      $sql = "SELECT COUNT(*) as total FROM encomienda";
      $request = $this->buscar($sql);
      $total = $request['total'];
      return $total;
    }
    //concat => unir concatenando
    public function ultimasEncomiendas(){
      $sql = "SELECT e.idencomienda, CONCAT(p.nombres,' ',p.apellidos) as nombre, e.monto, e.estado
              FROM encomienda e
              INNER JOIN persona p
              ON e.personaid = p.idpersona
              ORDER BY e.idencomienda DESC LIMIT 10"; //ORDENANDO DESCENDENTE, ULTIMOS 10 PEDIDOS
      $request = $this->listar($sql);
      return $request;
    }

    public function clienteTops(){
      $sql = "SELECT CONCAT(p.nombres,' ',p.apellidos) as nombre, COUNT(*) as total FROM encomienda e INNER JOIN persona p ON e.personaid = p.idpersona group by nombre";
      $request = $this->buscar($sql);
      return $request;
    }

    public function selectPagosMes(int $anio, int $mes)
    {
      $sql = "SELECT tipopago, COUNT(tipopago) as cantidad, SUM(monto) as total FROM encomienda WHERE MONTH(fecha)= $mes AND YEAR(fecha) = $anio GROUP BY tipopago";
      $pagos = $this->listar($sql);
      $meses = Meses();
      $arrData = array('anio' => $anio, 'mes' => $meses[intval($mes-1)], 'tipospago' => $pagos);
      return $arrData;
    }

  }


?>