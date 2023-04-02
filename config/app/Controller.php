<?php
class Controller{
    protected $modelo;
    protected $views1;
    public function __construct(){
        $this->views1=new Views();
        $this->cargarModel();
    }
    public function cargarModel(){
        $model =get_class($this). 'Model';
        $ruta ='models/'.$model. '.php';
        if (file_exists($ruta)) {
           require_once $ruta;
           $this->modelo=new $model();
        }
    }
}
?>
