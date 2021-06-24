<?php 
 

 class Mysql extends Conexion 
 { 

    private $conexion;
    private $strquery;
    private $arrvalues;
      
    function __construct()
    { 
        $this->conexion = new Conexion(); //Instancia de la clase conexion
        $this->conexion =  $this->conexion->connect(); //retorna la conexion del metodo
        
    }

    //METODO DE INSERTAR
    public function insertar(string $query, array $arrvalues)
    {

        $this->strquery = $query;
        $this->arrvalues = $arrvalues;


        $insert  = $this->conexion->prepare($this->strquery); //prepramos la sentencia sql 
        $restInsert = $insert->execute($this->arrvalues); //almacenamos los valores en el array

        if($restInsert){
            $lastinsert =  $this->conexion->lastInsertId(); //si almacenamos datos guardamos el ultimo id con la funcion lastInsertId
        }else{
            $lastinsert = 0;
        }
        return $lastinsert;
    }


    //METODO DE BUSCAR UN REGISTRO
    public function buscar(string $query)
    {
        $this->strquery = $query;

        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //METODO PARA LISTAR 1 O MAS REGISTROS
    public function listar(string $query)
    {
        $this->strquery = $query;

        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }


    //METODO PARA ACTUALIZAR REGISTROS
    public function actualizar(string $query, array $arrvalues)
    {
        $this->strquery = $query;
        $this->arrvalues = $arrvalues;


        $update = $this->conexion->prepare($this->strquery);
        $resExecute = $update->execute($this->arrvalues);
        return $resExecute;
    }

    //METODO PARA ELIMINAR REGISTROS
    public function eliminar(string $query)
    {
        $this->strquery = $query;

        $result = $this->conexion->prepare($this->strquery);
        $del = $result->execute();
        return $del;
    }

 }


?>