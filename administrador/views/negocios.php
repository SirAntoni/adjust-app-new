<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Negocios</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" data-toggle="modal" data-target="#modalCrearNegocio"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
            Crear negocio
        </button>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableNegocios" class="table table-stripe table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>RUC</th>
                                <th>RAZON SOCIAL</th>
                                <th>RANGO</th>
                                <th>ESTADO</th>
                                <th width="10px">Acción</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row -->


<!-- Modals -->

<div class="modal fade" id="modalCrearNegocio" tabindex="-1" role="dialog" aria-labelledby="modalCrearNegocio"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear negocio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCrearNegocio">
                <div class="modal-body">
                    <input type="hidden" value="crear" name="opcion">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="ruc" class="form-control" placeholder="Ruc">
                            </div>
                            <div class="form-group">
                                <input type="text" name="razon_social" class="form-control" placeholder="Razon social">
                            </div>
                            <div class="form-group">
                                <input type="text" name="contrasena" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <select name="rango" class='form-control'>
                                    <option value="">Seleccione un rango</option>
                                    <option value="1">Premium</option>
                                    <option value="2">Regular</option>
                                </select>
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

<div class="modal fade" id="modalEditarNegocio" tabindex="-1" role="dialog" aria-labelledby="modalEditarNegocio"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Negocio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarNegocio">
                <div class="modal-body">
                    <input type="hidden" value="editar" name="opcion">
                    <input type="hidden" class="id" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id='ruc' name="ruc" class="form-control" placeholder="Ruc">
                            </div>
                            <div class="form-group">
                                <input type="text" id='razon_social' name="razon_social" class="form-control" placeholder="Razon social">
                            </div>
                            <div class="form-group">
                                <input type="text" name="contrasena" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <select id='rango' name="rango" class='form-control'>
                                    <option value="">Seleccione un rango</option>
                                    <option value="1">Premium</option>
                                    <option value="2">Regular</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='estado' name="estado" class='form-control'>
                                    <option value="">Seleccione un estado</option>
                                    <option value="1">Activo</option>
                                    <option value="2">Suspendido</option>
                                </select>
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

<div class="modal fade" id="modalEliminarMarcas" tabindex="-1" role="dialog" aria-labelledby="modalEliminarMarcas"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formEliminarMarcas">
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