<?php

class Query extends Conexion{
    private $pdo;
    private $con;
    public function __construct(){
        $this-> pdo=new Conexion();
        $this->con=$this->pdo->Conectar();
    }

    public function select($sql){
        $result=$this->con->prepare($sql);
        $result->execute();
         return $result->fetch(pdo::FETCH_ASSOC);

    }

    public function selectAll($sql){
        $result=$this->con->prepare($sql);
        $result->execute();
         return $result->fetchAll(pdo::FETCH_ASSOC);

    }

    public function insertar($sql, $array){
        $result=$this->con->prepare($sql);
       $data= $result->execute($array);
       if ($data) {
       $resp=$this->con->lastInsertId();
       }else{
        $resp=0;
       }
       return $resp;

    }

    public function Save($sql, $array){
        $result=$this->con->prepare($sql);
       $data= $result->execute($array);
       if ($data) {
       $resp=1;
       }else{
        $resp=0;
       }
       return $resp;

    }

}
?>