<?php 

 
  class LoginModel extends Mysql{

    private $intIdUsuario;
    private $strUsuario;
    private $strPassword;
    private $token;

    public function __construct(){
        parent::__construct();
    }

    public function loginUser(string $usuario, string $password){

        $this->strUsuario = $usuario;
        $this->strPassword = $password;

        $sql = "SELECT idpersona,estado FROM persona WHERE email_user = '$this->strUsuario' and password = '$this->strPassword' and estado != 0";
        $request = $this->buscar($sql);
        return $request;
    }

    public function sessionLogin(int $iduser)
    {
       $this->intIdUsuario = $iduser;

       $sql = "SELECT p.idpersona,
                      p.dni,
                      p.nombres,
                      p.apellidos,
                      p.email_user,
                      p.telefono,
                      r.idrol, r.nombrerol,
                      p.estado
              FROM persona p
              INNER JOIN rol r
              ON p.rolid =  r.idrol
              WHERE p.idpersona = $this->intIdUsuario";
        $request = $this->buscar($sql);
        return $request;
    }


  }

?>