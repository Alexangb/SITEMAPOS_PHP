let tblusuarios;
const formulario = document.querySelector("#formulario");
const nombre = document.querySelector("#nombre");
const apellidos = document.querySelector("#apellido");
const correo = document.querySelector("#correo");
const telefono = document.querySelector("#telefono");
const direccion = document.querySelector("#direccion");
const contrasena = document.querySelector("#contrasena");
const rol = document.querySelector("#rol");

const btnaccion=document.querySelector('#btnaccion');
const id=document.querySelector('#id');


//elementos para monstrar errores
const errorNombre = document.querySelector("#errornombre");
const errorApellido = document.querySelector("#errorapellido");
const errorCorreo = document.querySelector("#errorcorreo");
const errorTelefono = document.querySelector("#errortelefono");
const errorDireccion = document.querySelector("#errordireccion");
const errorcontrasena = document.querySelector("#errorcontrasena");
const errorRol = document.querySelector("#errorRol");

document.addEventListener("DOMContentLoaded", function () {
    //cargar datos con el plugin datatable
   tblusuarios= $('#tblusuarios').DataTable({
        ajax: {
            url: base_url + 'usuarios/listar',
            dataSrc: ''
        },
        columns: [
            { data: 'nombres' },
            { data: 'correo' },
            { data: 'telefono' },
            { data: 'direccion' },
            { data: 'rol' },
            { data: 'acciones' }

        ],
        language: {
            url: base_url + 'assets/js/spanol.json'
        },
        dom,
        buttons,
        responsive:true,
        order:[[0,'asc']]
    });

    //registrar usuarios
    formulario.addEventListener('submit', function (e) {
        e.preventDefault();
        // inici limpiar campos
        errorNombre.textContent = '';
        errorApellido.textContent = '';
        errorCorreo.textContent = '';
        errorTelefono.textContent = '';
        errorDireccion.textContent = '';
        errorcontrasena.textContent = '';
        errorRol.textContent = '';
        //fin limpiar campos

        if (nombre.value == '') {
            errorNombre.textContent = 'El Nombre es requerido'
        } else if (apellidos.value == '') {
            errorApellido.textContent = 'El Apellido es requerido'
        } else if (correo.value == '') {
            errorCorreo.textContent = 'El correo es requerido'
        } else if (telefono.value == '') {
            errorTelefono.textContent = 'El Telefono es requerido'
        } else if (direccion.value == '') {
            errorDireccion.textContent = 'La Direccion es requerida'
        } else if (contrasena.value == '') {
            errorcontrasena.textContent = 'La contrasena es requerida'
        } else if (rol.value == '') {
            errorRol.textContent = 'El rol es requerido'
        } else {

            const url = base_url + "usuarios/registrar";
            //crear formData
            const data = new FormData(this);
            //hacer una instacia del objeto XMLHttpRequest
            const elemen = new XMLHttpRequest();
            //abrir una conexion  - POST -GET
            elemen.open("POST", url, true);
            //enviar datos
            elemen.send(data);
            //verificar estados
            elemen.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);

                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: res.type,
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    if (res.type=='success') {
                        formulario.reset();
                        tblusuarios.ajax.reload();
                    }
                }
            };
        }
    })
});

//funcion para eliminar usuario
function eliminarUsuario(idUsuario){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El regsitro no se elimara de forma permanente, solo cambiara el estado",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, Eliminar registro!'
      }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "usuarios/eliminar/" + idUsuario;
           
            //hacer una instacia del objeto XMLHttpRequest
            const elemen = new XMLHttpRequest();
            //abrir una conexion  - POST -GET
            elemen.open("GET", url, true);
            //enviar datos
            elemen.send();
            //verificar estados
            elemen.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);

                    Swal.fire({
                        toast: true,
                        position: 'top-right',
                        icon: res.type,
                        title: res.msg,
                        showConfirmButton: false,
                        timer: 1500
                    })
                    if (res.type=='success') {
                     
                        tblusuarios.ajax.reload();
                    }
                }
            };
        }
      })
}
function editarUsuario(idUsuario){
    const url = base_url + "usuarios/editar/" + idUsuario;
           
    //hacer una instacia del objeto XMLHttpRequest
    const elemen = new XMLHttpRequest();
    //abrir una conexion  - POST -GET
    elemen.open("GET", url, true);
    //enviar datos
    elemen.send();
    //verificar estados
    elemen.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
             const res = JSON.parse(this.responseText);
             id.value=res.id
             nombre.value=res.nombre;
             apellidos.value=res.apellido;
             correo.value=res.correo;
             telefono.value=res.telefono;
             direccion.value=res.direccion;
             rol.value=res.rol;
             contrasena.setAttribute('readonly','readonly');
             btnaccion.textContent="ACTUALIZAR";
             const firstTabE1=document.querySelector('#nav-tab button:last-child')
             const firstTab=new bootstrap.Tab(firstTabE1)
             firstTab.show();
           
        }
    };
}
