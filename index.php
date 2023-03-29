<?php
require_once 'config/config.php';
 $ruta = (!empty($_GET['url'])) ? $_GET['url'] : 'home/index';

 $array=explode('/', $ruta);
 $controller=ucfirst($array[0]);
 $metodo='index';
 $parametro='';

 //sirve para Capturar el metodo
 if(!empty($array[1])){
    if($array[1]!=''){
        $metodo = $array[1];
    }
 } 

 //sirve para captuara el parametro
 if(!empty($array[2])){
    if($array[2]!=''){
        for ($i=2; $i < count($array); $i++) { 
           $parametro .= $array[$i] . ',';
        }
        $parametro =trim($parametro, ',');
    }
 }

require_once 'config/app/autoload.php';
$dirController='controllers/' .$controller. '.php';

if (file_exists($dirController)) {
    require_once $dirController;
    $controller1=new $controller();
    if (method_exists($controller, $metodo)) {
        $controller1->$metodo($parametro);
       
    }else{
        echo 'No existe el metodo';      

    }
      
    }else{
        echo 'NO existe el controlador';
    }   

 ?> 