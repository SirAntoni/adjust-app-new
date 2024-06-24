<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h6 id='nombre_auto' class="card-title">[NOMBRE AUTO]</h6>
                <p><a href="#" onclick="window.history.back()">Atras</a>.</p>
            </div>
        </div>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">

            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Colores</h4>
                    </div>
                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <button type="button" data-toggle="modal" data-target="#modalCrearColor"
                            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
                            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
                            Crear
                        </button>
                    </div>
                </div>
                <div class='row'>

                    <div class="table-responsive">

                        <table id="dataTableColores" class="table table-stripe table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width='100px'>UUID</th>
                                    <th>COLOR</th>
                                    <th width='100px'>COVER</th>
                                    <th width="10px">Acción</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">

            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Categorias</h4>
                    </div>
                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <button type="button" data-toggle="modal" data-target="#modalCrearCategoria"
                            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
                            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
                            Agregar categoria
                        </button>
                    </div>
                </div>
                <div class='row'>

                    <div class="table-responsive">

                        <table id="dataTableCategorias" class="table table-stripe table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width='100px'>UUID</th>
                                    <th>CATEGORIA</th>
                                    <th>COVER</th>
                                    <th width="10px">Acción</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->


<div class="modal fade" id="modalCrearColor" tabindex="-1" role="dialog" aria-labelledby="modalCrearColor"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCrearColor">
                <div class="modal-body">
                    <input type="hidden" value="crear" name="opcion">
                    <input type="hidden" id='auto' name='auto' value='<?php echo $_GET['auto'] ?>'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name='color' placeholder='Escriba un nombre' class='form-control'>
                            </div>
                            <div class="form-group">
                                <label>Preview Color (Recomendado 300px x 300px)</label>
                                <input type="file" name="cover" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
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

<div class="modal fade" id="modalEditarColor" tabindex="-1" role="dialog" aria-labelledby="modalEditarColor"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarColor">
                <div class="modal-body">
                    <input type="hidden" class='id' name="id">
                    <input type="hidden" value="editar" name="opcion">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id='color' name='color' placeholder='Escriba un color'
                                    class='form-control'>
                            </div>
                            <div class="form-group">
                                <label>Preview Color (Recomendado 300px x 300px)</label>
                                <input type="hidden" id='archivo' name='archivo'>
                                <input type="file" name="cover" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
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

<div class="modal fade" id="modalEliminarColor" tabindex="-1" role="dialog" aria-labelledby="modalEliminarColor"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formEliminarColor">
                <div class="modal-body">
                    <input type="hidden" value="eliminar" name="opcion">
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

<!-- /.modal-content -->
<div class="modal fade" id="modalCrearCategoria" tabindex="-1" role="dialog" aria-labelledby="modalCrearCategoria"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCrearCategoria">
                <div class="modal-body">
                    <input type="hidden" value="crear" name="opcion">
                    <input type="hidden" id='auto_categoria' name='auto' value='<?php echo $_GET['auto'] ?>'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name='categoria' placeholder='Escriba una categoria'
                                    class='form-control'>
                            </div>
                            <div class="form-group">
                                <label>Preview Categoria (Recomendado 300px x 300px)</label>
                                <input type="file" name="cover" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
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

<div class="modal fade" id="modalEditarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalEditarCategoria"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarCategoria">
                <div class="modal-body">
                    <input type="hidden" class='id_categoria' name="id">
                    <input type="hidden" value="editar" name="opcion">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id='categoria' name='categoria' placeholder='Escriba una cateogria'
                                    class='form-control'>
                            </div>
                            <div class="form-group">
                                <label>Preview Categoria (Recomendado 300px x 300px)</label>
                                <input type="hidden" id='archivo_categoria' name='archivo'>
                                <input type="file" name="cover" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
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

<div class="modal fade" id="modalEliminarCategoria" tabindex="-1" role="dialog" aria-labelledby="modalEliminarCategoria"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formEliminarCategoria">
                <div class="modal-body">
                    <input type="hidden" value="eliminar" name="opcion">
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