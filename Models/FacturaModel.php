<?php


  class FacturaModel extends Mysql{

    public function __construct()
    {
        parent::__construct();
    }

    public function selectEncomienda(int $idencomienda, $idpersona = NULL)
    {
      $busqueda = "";
			if($idpersona != NULL){
				$busqueda = " AND e.personaid =".$idpersona;
			}
			$request = array();
			$sql = "SELECT e.idencomienda, e.personaid, e.destinatario, e.estado, e.destino, v.placa, e.tipopago, e.monto, DATE_FORMAT(e.fecha, '%d-%m-%Y') as fechaRegistro 
              FROM encomienda e
              INNER JOIN persona p
              ON e.personaid = p.idpersona
              INNER JOIN vehiculo v
              ON e.vehiculoid = v.idvehiculo
				    	WHERE e.idencomienda =  $idencomienda ".$busqueda;
			$requestEncomienda = $this->buscar($sql);
      
			if(!empty($requestEncomienda)){
				$idpersona = $requestEncomienda['personaid'];
				$sql_cliente = "SELECT idpersona,
                    dni,
										nombres,
										apellidos,
										telefono,
										email_user,
									  direccion
								    FROM persona WHERE idpersona = $idpersona ";
				$requestcliente = $this->buscar($sql_cliente);
				
				$request = array('cliente' => $requestcliente,
								'encomienda' => $requestEncomienda
							
								 );
			}
			return $request;
    }

 


  }
?>