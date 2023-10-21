<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Configuración web</h4>
    </div>

</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-md-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Datos generales
            </div>
            <div class="card-body">
                <form id="formDatosGenerales">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="hidden" name='opcion' value='guardar_datos_generales'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                                <input type="text" id='direccion' name='direccion' class='form-control'
                                    placeholder='Ingresa tu direccion'>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id='telefono' name='telefono' class='form-control'
                                    placeholder='Ingresa tu telefono'>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id='email' name='email' class='form-control'
                                    placeholder='Ingresa tu email'>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary' value='Guardar'>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Logo
            </div>
            <div class="card-body">

                <form id="formLogo">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div id="divLogo" class=' col-12 my-3 mx-auto'></div>
                                <input type="hidden" name='opcion' value='guardar_logo'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                                <input type="hidden" name='archivoLogo' id='archivoLogo'>
                                <input type="file" name="logo" id='logo' class="file-upload-default">
                                <div class="input-group col-xs-12 mb-2">

                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Seleccionar Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary"
                                            type="button">Seleccionar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary' value='Guardar'>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Slogan
            </div>
            <div class="card-body">
                <form id="formSlogan">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" name='opcion' value='guardar_slogan'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                                <textarea name="slogan" id="slogan" placeholder='Ingresa tu slogan' cols="30" rows="3"
                                    class='form-control'></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary' value='Guardar'>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Imagen Nosotros
            </div>
            <div class="card-body">

                <form id="formNosotrosImg">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div id="divNosotros" class=' col-12 my-3 mx-auto'></div>
                                <input type="hidden" name='opcion' value='guardar_nosotrosImg'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                                <input type="hidden" name='archivoNosotros' id='archivoNosotros'>
                                <input type="file" name="nosotrosImg" id='nosotrosImg' class="file-upload-default">
                                <div class="input-group col-xs-12 mb-2">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Seleccionar Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary"
                                            type="button">Seleccionar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary' value='Guardar'>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Nosotros
            </div>
            <div class="card-body">
                <form id="formNosotros">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" name='opcion' value='guardar_nosotros'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                                <textarea name="nosotros" id="nosotros" placeholder='Ingresa tu informacion' cols="30"
                                    rows="3" class='form-control'></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary' value='Guardar'>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Imagen Mision
            </div>
            <div class="card-body">

                <form id="formMisionImg">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div id="divMision" class=' col-12 my-3 mx-auto'></div>
                                <input type="hidden" name='opcion' value='guardar_misionImg'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                                <input type="hidden" name='archivoMision' id='archivoMision'>
                                <input type="file" name="misionImg" id='misionImg' class="file-upload-default">
                                <div class="input-group col-xs-12 mb-2">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Seleccionar Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary"
                                            type="button">Seleccionar</button>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary' value='Guardar'>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Mision
            </div>
            <div class="card-body">
                <form id="formMision">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" name='opcion' value='guardar_mision'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                                <textarea name="mision" id="mision" placeholder='Ingresa tu informacion' cols="30"
                                    rows="3" class='form-control'></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary' value='Guardar'>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Imagen Vision
            </div>
            <div class="card-body">

                <form id="formVisionImg">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <div id="divVision" class=' col-12 my-3 mx-auto'></div>
                                <input type="hidden" name='opcion' value='guardar_visionImg'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                                <input type="hidden" name='archivoVision' id='archivoVision'>
                                <input type="file" name="visionImg" id='visionImg' class="file-upload-default">
                                <div class="input-group col-xs-12 mb-2">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Seleccionar Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary"
                                            type="button">Seleccionar</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary' value='Guardar'>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Vision
            </div>
            <div class="card-body">
                <form id="formVision">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input type="hidden" name='opcion' value='guardar_vision'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                                <textarea name="vision" id="vision" placeholder='Ingresa tu informacion' cols="30"
                                    rows="3" class='form-control'></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary' value='Guardar'>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-header">
                Galeria
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 text-right">
                        <div class="form-group">
                            <button class='btn btn-dark' data-toggle="modal" data-target="#modalCrearFiltros">Agregar filtro</button>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class='table table-bordered table'>
                                <thead class='thead-dark text-white'> 
                                    <tr>
                                        <th>Filtro</th>
                                        <th width='100px'>Accion</th>
                                    </tr>
                                </thead>
                                <tbody id='filtros'>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->


<div class="modal fade" id="modalCrearFiltros" tabindex="-1" role="dialog" aria-labelledby="modalCrearFiltros"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar filtro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCrearFiltro">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="hidden" name='opcion' value='crear_filtro'>
                                <input type="hidden" name='negocio' value='<?php echo $_GET['negocio']; ?>'>
                                <input type="text" name="filtro" class="form-control" placeholder="Filtro">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditarFiltro" tabindex="-1" role="dialog" aria-labelledby="modalEditarFiltro"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Filtro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarFiltro">
                <div class="modal-body">
                    <input type="hidden" value="editar_filtro" name="opcion">
                    <input type="hidden" class='id' name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id="filtro" name="filtro" class="form-control" placeholder="Filtro">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Editar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEliminarFiltro" tabindex="-1" role="dialog" aria-labelledby="modalEliminarFiltro"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formEliminarFiltro">
                <div class="modal-body">
                    <input type="hidden" value="eliminar_filtro" name="opcion">
                    <input type="hidden" class="id" name="id">
                    <div class="d-flex justify-content-center align-items-center p-4">
                        <div class="mr-3">
                            <i class="fas fa-question-circle" style="color:#d03433; font-size:5em;"></i>
                        </div>
                        <div class="modal-icon">
                            <h4>Eliminar</h4>
                            <p>¿Estás seguro de querer borrar el registro?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>