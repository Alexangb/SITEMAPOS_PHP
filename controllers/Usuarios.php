<?php
 class Usuarios extends Controller{ 
    
    public function __construct(){
        parent::__construct();
        session_start();
    }
    
    public function index(){
      $data['title']='Usuarios';
      
       $this->views1->getView('usuarios','index',$data);
       
    }
    
    
 }
?>
