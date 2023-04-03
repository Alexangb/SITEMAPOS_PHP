<?php
class Usuarios extends Controller
{

    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Usuarios';
        $data['script'] = 'usuarios.js';
        $this->views1->getView('usuarios', 'index', $data);
    }

    public function listar()
    {

        $data = $this->modelo->getUsuarios(1);

        for ($i = 0; $i < count($data); $i++) {

            if ($data[$i]['rol'] == 1) {
                $data[$i]['rol'] = '<span class="badge bg-success">ADMINISTRADOR</span>';
            } else {
                $data[$i]['rol'] = '<span class="badge bg-info">VENDEDOR</span>';
            }
            $data[$i]['acciones'] = '<div> <button class="btn btn-danger" type="button" onclick="eliminarUsuario('.$data[$i]['id'].')">  <i class="fas fa-times-circle"></i></button>
             <button class="btn btn-info" type="button" onclick="editarUsuario('.$data[$i]['id'].')">  <i class="fas fa-edit"></i></button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    //metodo para registrar usuarios y modificar

    public function Registrar()
    {
        if (isset($_POST)) {

            if (empty($_POST['nombre'])) {
                $resp = array('msg' => 'EL NOMBRE ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['apellido'])) {
                $resp = array('msg' => 'EL APELLIDO ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['correo'])) {
                $resp = array('msg' => 'EL CORREO ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['telefono'])) {
                $resp = array('msg' => 'EL telefono ES REQUERIDO', 'type' => 'warning');
            } else if (empty($_POST['direccion'])) {
                $resp = array('msg' => 'LA DIRECCION ES REQUERIDA', 'type' => 'warning');
            } else if (empty($_POST['contrasena'])) {
                $resp = array('msg' => 'LA CONTRASEÑA ES REQUERIDA', 'type' => 'warning');
            } else if (empty($_POST['rol'])) {
                $resp = array('msg' => 'EL ROL ES REQUERIDO', 'type' => 'warning');
            } else {
                //almacenamos las variables
                $nombre = strClean($_POST['nombre']);
                $apellido = strClean($_POST['apellido']);
                $correo = strClean($_POST['correo']);
                $telefono = strClean($_POST['telefono']);
                $direccion = strClean($_POST['direccion']);
                $contrasena = strClean($_POST['contrasena']);
                //encriptar la contraseña
                $hash = password_hash($contrasena, PASSWORD_DEFAULT);
                $rol = strClean($_POST['rol']);

                //Verificar si existe los datos
                $verificarCorreo = $this->modelo->getvalidar('correo', $correo);
                if (empty($verificarCorreo)) {
                    $verificarTel = $this->modelo->getvalidar('telefono', $telefono);
                    if (empty($verificarTel)) {
                        $data = $this->modelo->registrarUsuario($nombre, $apellido, $correo, $telefono, $direccion, $hash, $rol);

                        if ($data > 0) {
                            $resp = array('msg' => 'USUARIO REGISTRADO EXITOSAMENTE', 'type' => 'success');
                        } else {
                            $resp = array('msg' => 'ERROR AL REGISTRAR', 'type' => 'error');
                        }
                    } else {
                        $resp = array('msg' => 'EL TELEFONO DEBE SER UNICO', 'type' => 'warning');
                    }
                } else {
                    $resp = array('msg' => 'EL CORREO DEBE SER UNICO', 'type' => 'warning');
                }
            }
        } else {
            $resp = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($resp, JSON_UNESCAPED_UNICODE);
        die();
    }
    //funcion para eliminar un usuario

    public function eliminar($id){
        if (isset($_GET)) {
         if (is_numeric($id)) {           
            $data=$this->modelo->eliminarUsuario(0,$id);
            if ($data==1) {
                $resp = array('msg' => 'USUARIO DADO DE BAJA', 'type' => 'success');
            }else{
                $resp = array('msg' => 'ERROR AL ELIMINAR', 'type' => 'error');
            }
         }else{
            $resp = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
         }
        }else{
            $resp = array('msg' => 'ERROR DESCONOCIDO', 'type' => 'error');
        }
        echo json_encode($resp, JSON_UNESCAPED_UNICODE);
        die();
    }

    //funcion para recuperar los datos
public function editar($id){
    $data =$this->modelo->editarUsuario($id);
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
    die();
}
    
}
