<?php
 class UsuariosModel extends Query{
  
   public function __construct(){
    parent::__construct();
   }
    public function getUsuarios($estado){
      $sql="SELECT id, CONCAT (nombre, ' ' , apellido) as nombres, correo, telefono, direccion, rol,clave FROM usuarios WHERE estado=$estado";
      return $this->selectAll($sql);

    }

    public function registrarUsuario($nombre,$apellido,$correo,$telefono,$direccion,$contrasena,$rol){
      $sql= "INSERT INTO usuarios (nombre, apellido, correo, telefono, direccion, clave,rol) VALUES (?,?,?,?,?,?,?)";
      $array=array($nombre,$apellido,$correo,$telefono,$direccion,$contrasena,$rol);
      return $this->insertar($sql,$array);
    }
    public function editarUsuario($id){
      $sql="SELECT id,nombre, apellido,correo,telefono, direccion,rol  FROM usuarios where id=$id";
      return $this->select($sql);
    }

    public function getvalidar($campo,$valor){
      $sql="SELECT id,correo,telefono FROM usuarios where $campo='$valor'";
      return $this->select($sql);
    }

    public function eliminarUsuario($estado,$id){
      $sql="UPDATE usuarios SET  estado=? WHERE id=? ";
      $array=array($estado,$id);
      return $this->Save($sql,$array);
    }

 }
