<?php
 
 
 
 class ClientesModel extends Mysql{
    
    private $intIdUsuario;
    private $strDni;
    private $strNombre;
    private $strApellido;
    private $intTelefono;
    private $strEmail;
    private $strPassword;
    private $intTipoid;
    private $strDireccion; 

    public function __construct()
    {
        parent::__construct();
    }
      
    public function insertarCliente(string $dni, string $nombre, string $apellido, int $telefono, string $email, string $password, int $tipoid, string $direccion)
    {
      $this->strDni = $dni;
      $this->strNombre = $nombre;
      $this->strApellido = $apellido;
      $this->intTelefono = $telefono;
      $this->strEmail = $email;
      $this->strPassword = $password;
      $this->intTipoid = $tipoid;
      $this->strDireccion = $direccion;
      $return = 0;

      $sql = "SELECT * FROM persona WHERE email_user = '{$this->strEmail}' or dni = '{$this->strDni}' ";
      $request_sql = $this->listar($sql);

      if(empty($request_sql)) //si no existen registros con email o dni repetidos, insertamos
      {
        $sql_insertar =  "INSERT INTO persona(dni,nombres,apellidos,telefono,email_user,password,rolid,direccion) VALUES (?,?,?,?,?,?,?,?) ";
        $arrData = array($this->strDni, $this->strNombre, $this->strApellido, $this->intTelefono, $this->strEmail, $this->strPassword, $this->intTipoid, $this->strDireccion);
        $request_insertar = $this->insertar($sql_insertar,$arrData);
        $return = $request_insertar;
      }else{
        $return = "exist";
      }
      return $return;
    }


    public function selectClientes()
    {
        $sql = "SELECT idpersona,dni,nombres,apellidos,telefono,email_user,estado 
                FROM persona
                WHERE rolid = 21 AND estado != 0";
        $request = $this->listar($sql);
        return $request;
    }

    public function selectClientesEncomiendas()
    {
      $sql = "SELECT p.idpersona, p.dni, p.nombres, p.apellidos, p.telefono, p.email_user, p.estado, r.nombrerol 
              FROM persona p 
              INNER JOIN rol r
              ON p.rolid = r.idrol
              WHERE p.rolid = 21 AND p.estado != 0 ";
      $request = $this->listar($sql);
      return $request;
    }

    public function actualizarCliente(int $idUsuario, string $dni, string $nombre, string $apellido, int $telefono, string $email, string $password, string $direccion){

      $this->intIdUsuario = $idUsuario;
      $this->strDni = $dni;
      $this->strNombre = $nombre;
      $this->strApellido = $apellido;
      $this->intTelefono = $telefono;
      $this->strEmail = $email;
      $this->strPassword = $password;
      $this->strDireccion = $direccion;

  
      $sql = "SELECT * FROM persona WHERE (email_user = '{$this->strEmail}' AND idpersona != $this->intIdUsuario)
                      OR (dni = '{$this->strDni}' AND idpersona != $this->intIdUsuario) ";
      $request = $this->listar($sql);
  
      if(empty($request))
      {
        if($this->strPassword  != "")
        {
          $sql = "UPDATE persona SET dni=?, nombres=?, apellidos=?, telefono=?, email_user=?, password=?, direccion=? 
              WHERE idpersona = $this->intIdUsuario ";
          $arrData = array($this->strDni,
                      $this->strNombre,
                      $this->strApellido,
                      $this->intTelefono,
                      $this->strEmail,
                      $this->strPassword,
                      $this->strDireccion);
        }else{
          $sql = "UPDATE persona SET dni=?, nombres=?, apellidos=?, telefono=?, email_user=?, direccion=? 
              WHERE idpersona = $this->intIdUsuario ";
          $arrData = array($this->strDni,
                      $this->strNombre,
                      $this->strApellido,
                      $this->intTelefono,
                      $this->strEmail,
                      $this->strDireccion);
        }
        $request = $this->actualizar($sql,$arrData);
      }else{
        $request = "exist";
      }
      return $request;
    }

    public function selectCliente(int $idpersona){
      $this->intIdUsuario = $idpersona;
      $sql = "SELECT idpersona,dni,nombres,apellidos,telefono,email_user,direccion,estado, password
          FROM persona
          WHERE idpersona = $this->intIdUsuario and rolid = 21";
      $request = $this->buscar($sql);
      return $request;
    }


 }

?>