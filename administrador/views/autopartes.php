<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Autopartes</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" onclick="window.history.back()" class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="arrow-left-circle"></i>
            Volver
        </button>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">

            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">Categoria: <span id='nombre_categoria'>[[NOMBRE CATEGORIA]]</span></h4>
                    </div>
                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <button type="button" data-toggle="modal" data-target="#modalCrearAutoparte"
                            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
                            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
                            Agregar
                        </button>
                    </div>
                </div>
                <div class='row'>

                    <div class="table-responsive">

                        <table id="dataTableAutopartes" class="table table-stripe table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width='100px'>UUID</th>
                                    <th>SUBCATEGORIA</th>
                                    <th>STOCK</th>
                                    <th>COVER</th>
                                    <th>COLOR</th>
                                    <th>CATEGORIA</th>
                                    <th>TIPO</th>
                                    <th>detalles</th>
                                    <th>descgeneral</th>
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

<!-- /.modal-content -->
<div class="modal fade" id="modalCrearAutoparte" tabindex="-1" role="dialog" aria-labelledby="modalCrearAutoparte"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCrearAutoparte">
                <div class="modal-body">
                    <input type="hidden" value="crear" name="opcion">
                    <input type="hidden" id='categoria_uuid' name='categoria'
                        value='<?php echo $_GET['categoria'] ?>'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name='autoparte' placeholder='Escriba un nombre'
                                    class='form-control'>
                            </div>
                            <div class="form-group">
                                <select name="stock" '>
                                    <option value="">¿Tiene stock?</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Preview Autoparte (Recomendado 300px x 300px)</label>
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

<div class="modal fade" id="modalEditarAutoparte" tabindex="-1" role="dialog" aria-labelledby="modalEditarAutoparte"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar autoparte</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarAutoparte">
                <div class="modal-body">
                    <input type="hidden" class='id' name="id">
                    <input type="hidden" value="editar" name="opcion">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id='autoparte' name='autoparte' placeholder='Escriba una cateogria ' class='form-control '>
                            </div>
                            <div class="form-group">
                                <select id='stock' name="stock" '>
                                    <option value="">¿Tiene stock?</option>
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Preview Autoparte (Recomendado 300px x 300px)</label>
                                <input type="hidden" id='archivo_autoparte' name='archivo'>
                                <input type="file" name="cover" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <select id='color' name="color">
                                    <option value="">Seleccione un color</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='tipo' name="tipo">
                                    <option value="">Seleccione un tipo</option>
                                    <option value="producto">Producto</option>
                                    <option value="subcategoria">Subcategoria</option>
                                </select>
                            </div>
                           
                        </div>
                        <div class='col-md-6'>
                            <div class="form-group">
                                <textarea class="form-control" name="detalles" placeholder="Agregar detalles" id="detalles" rows="10"></textarea>
                            </div>
                            
                        </div>
                        <div class='col-md-6'>
                        <div class="form-group">
                                <textarea class="form-control" name="descgeneral" placeholder="Agregar descripcion" id="descgeneral" rows="10"></textarea>
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

<div class="modal fade" id="modalEliminarAutoparte" tabindex="-1" role="dialog" aria-labelledby="modalEliminarAutoparte"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formEliminarAutoparte">
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