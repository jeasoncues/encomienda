<?php
 
 class rolesModel extends Mysql {

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
 }


?>