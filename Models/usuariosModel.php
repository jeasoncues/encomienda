<?php 

 
  class UsuariosModel extends Mysql {


    private $intIdUsuario;
    private $strDni;
    private $strNombre;
    private $strApellido;
    private $intTelefono;
    private $strEmail;
    private $strPassword;
    private $strToken;
    private $intRolid;
    private $intEstado;

    public function __construct(){
        parent::__construct();
    }


 


    public function insertarUsuario(string $dni, string $nombre, string $apellido, int $telefono, string $email, string $password, int $rolid, int $estado)
    {
      $this->strDni = $dni;
      $this->strNombre = $nombre;
      $this->strApellido = $apellido;
      $this->intTelefono = $telefono;
      $this->strEmail = $email;
      $this->strPassword = $password;
      $this->intRolid = $rolid;
      $this->intEstado = $estado;
      $return = 0;

      $sql = "SELECT * FROM persona WHERE email_user = '{$this->strEmail}' or dni = '{$this->strDni}' ";
      $request_sql = $this->listar($sql);

      if(empty($request_sql)) //si no existen registros con email o dni repetidos, insertamos
      {
        $sql_insertar =  "INSERT INTO persona(dni,nombres,apellidos,telefono,email_user,password,rolid,estado) VALUES (?,?,?,?,?,?,?,?) ";
        $arrData = array($this->strDni, $this->strNombre, $this->strApellido, $this->intTelefono, $this->strEmail, $this->strPassword, $this->intRolid, $this->intEstado);
        $request_insertar = $this->insertar($sql_insertar,$arrData);
        $return = $request_insertar;
      }else{
        $return = "exist";
      }
      return $return;
    }

    public function actualizarUsuario(int $idUsuario, string $dni, string $nombre, string $apellido, int $telefono, string $email, string $password, int $tipoid, int $status){

			$this->intIdUsuario = $idUsuario;
			$this->strDni = $dni;
			$this->strNombre = $nombre;
			$this->strApellido = $apellido;
			$this->intTelefono = $telefono;
			$this->strEmail = $email;
			$this->strPassword = $password;
			$this->intTipoId = $tipoid;
			$this->intStatus = $status;

			$sql = "SELECT * FROM persona WHERE (email_user = '{$this->strEmail}' AND idpersona != $this->intIdUsuario)
										  OR (dni = '{$this->strDni}' AND idpersona != $this->intIdUsuario) ";
			$request = $this->listar($sql);

			if(empty($request))
			{
				if($this->strPassword  != "")
				{
					$sql = "UPDATE persona SET dni=?, nombres=?, apellidos=?, telefono=?, email_user=?, password=?, rolid=?, estado=? 
							WHERE idpersona = $this->intIdUsuario ";
					$arrData = array($this->strDni,
	        						$this->strNombre,
	        						$this->strApellido,
	        						$this->intTelefono,
	        						$this->strEmail,
	        						$this->strPassword,
	        						$this->intTipoId,
	        						$this->intStatus);
				}else{
					$sql = "UPDATE persona SET dni=?, nombres=?, apellidos=?, telefono=?, email_user=?, rolid=?, estado=? 
							WHERE idpersona = $this->intIdUsuario ";
					$arrData = array($this->strDni,
	        						$this->strNombre,
	        						$this->strApellido,
	        						$this->intTelefono,
	        						$this->strEmail,
	        						$this->intTipoId,
	        						$this->intStatus);
				}
				$request = $this->actualizar($sql,$arrData);
			}else{
				$request = "exist";
			}
			return $request;
		
		}


    public function selectUsuariosConductores()
    {
      $sql = "SELECT p.idpersona, p.dni, p.nombres, p.apellidos, p.telefono, p.email_user, p.estado, r.nombrerol 
              FROM persona p 
              INNER JOIN rol r
              ON p.rolid = r.idrol
              WHERE p.rolid = 2 AND p.estado != 0 ";
      $request = $this->listar($sql);
      return $request;
    }

    //MOSTRAR USUARIOS
    public function selectUsuarios()
    {
      $sql = "SELECT p.idpersona, p.dni, p.nombres, p.apellidos, p.telefono, p.email_user, p.estado, r.nombrerol 
              FROM persona p 
              INNER JOIN rol r
              ON p.rolid = r.idrol
              WHERE p.estado != 0 ";
      $request = $this->listar($sql);
      return $request;
    }

    //MOSTRAR UN USUARIO
    public function selectUsuario(int $idpersona)
    {
      $this->intIdUsuario = $idpersona;
      //formato fecha dandole un alias
      $sql = "SELECT p.idpersona, p.dni, p.nombres, p.apellidos, p.telefono, p.email_user, p.direccion, r.idrol, r.nombrerol, p.estado,
              DATE_FORMAT(p.datecreated, '%d-%m-%Y') as fechaRegistro 
              FROM persona p
              INNER JOIN rol r
              ON p.rolid = r.idrol
              WHERE p.idpersona = $this->intIdUsuario";
      $request = $this->buscar($sql);
      return $request;
    }

    public function eliminarUsuario(int $idpersona)
    {
      $this->intIdUsuario = $idpersona;

      $sql = " UPDATE persona SET estado = ? WHERE idpersona = $this->intIdUsuario";
      $arrData = array(0);
      $request = $this->actualizar($sql, $arrData);


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