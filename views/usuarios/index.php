<?php include_once 'views/template/header.php' ?>

<div class="card">

    <div class="card-body">
        <!-- acciones -->
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <button class="nav-link active" id="nav-usuarios-tab" data-bs-toggle="tab" data-bs-target="#nav-usuarios" type="button" role="tab" aria-controls="nav-usuarios" aria-selected="true">Usuarios</button>
                <button class="nav-link" id="nav-nuevo-tab" data-bs-toggle="tab" data-bs-target="#nav-nuevo" type="button" role="tab" aria-controls="nav-nuevo" aria-selected="false">Nuevo</button>

            </div>
        </nav>
        
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active mt-2" id="nav-usuarios" role="tabpanel" aria-labelledby="nav-usuarios-tab" tabindex="0">
                <h5 class="card-title text-center"> <i class=" fas fa-user"></i> Listado de usuarios</h5>
                <hr>
                <table class="table table-bordered table-striped table-hover nowrap" style="width: 100%;" id="tblusuarios">
                    <thead>
                        <tr>
                            <th>Nombres</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                            <th>Rol</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade " id="nav-nuevo" role="tabpanel" aria-labelledby="nav-nuevo-tab" tabindex="0">

                <form class="p-4" id="formulario" autocomplete="off">
                    <input type="hidden" name="id" id="id">
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 mb-2">
                            <label>Nombre</label>
                            <div class="input-group">
                                <span class="input-group-text"> <i class="fa-solid fa-user"></i></span>
                                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombres Usuario">
                            </div>
                            <span id="errornombre" class="text-danger"></span>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-2">
                            <label>Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-list-alt"></i></span>
                                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellidos Usuario">
                            </div>
                            <span id="errorapellido" class="text-danger"></span>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-2">
                            <label>Correo</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelop"></i></span>
                                <input type="email" id="correo" name="correo" class="form-control" placeholder="Correo">
                            </div>
                            <span id="errorcorreo" class="text-danger"></span>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-2">
                            <label>Telefono</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="number" id="telefono" name="telefono" class="form-control" placeholder="Telefono">
                            </div>
                            <span id="errortelefono" class="text-danger"></span>
                        </div>
                        <div class="col-lg-8 col-sm-6 mb-2">
                            <label>Dirección</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-home"></i></span>
                                <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Direccion">
                            </div>
                            <span id="errordireccion" class="text-danger"></span>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-2">
                            <label>Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña">
                            </div>
                            <span id="errorcontrasena" class="text-danger"></span>
                        </div>
                        <div class="col-lg-4 col-sm-6 mb-2">
                            <label>Rol</label>
                            <div class="input-group">
                                <label class="input-group-text" for="rol"><i class="fas fa-id-card"></i></label>
                                <select class="form-select"  id="rol" name="rol">
                                    <option value="" selected >Seleccionar</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Vendedor</option>

                                </select>
                            </div>
                            <span id="errorRol" class="text-danger"></span>
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" type="submit" id="btnaccion">Registrar
                    </div>
            </div>
            </form>
        </div>
    </div>
    <!-- fin acciones -->
</div>
</div>

<?php include_once 'views/template/footer.php' ?>