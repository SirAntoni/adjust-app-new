<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Modelos</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" data-toggle="modal" data-target="#modalCrearModelos"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
            Agregar modelo
        </button>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableModelos" class="table table-stripe table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Marca</th>
                                <th>Marca ID</th>
                                <th>TIPO ID</th>
                                <th>Tipo</th>
                                <th>Modelo</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Negocio</th>
                                <th>created_at</th>
                                <th>updated_at</th>
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

<div class="modal fade" id="modalCrearModelos" tabindex="-1" role="dialog" aria-labelledby="modalCrearModelos"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCrearModelos">
                <div class="modal-body">
                    <input type="hidden" value="crear" name="opcion">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="marca" class='form-control select_marcas'>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="tipo_auto" class='form-control select_tipos'>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" name="modelo" class="form-control" placeholder="Modelo">
                            </div>
                            <?php if($_SESSION['id'] === '1'){ ?>
                                <div class="form-group">
                                <select name="tipo" class='form-control'>
                                    <option value="">Seleccione una opción</option>
                                    <option value="1">Premium</option>
                                    <option value="2">Regular</option>
                                </select>
                            </div>
                            <?php } ?>
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

<div class="modal fade" id="modalEditarModelos" tabindex="-1" role="dialog" aria-labelledby="modalEditarModelos"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Modelo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarModelos">
                <div class="modal-body">
                    <input type="hidden" value="editar" name="opcion">
                    <input type="hidden" class="id" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <select id='marca' name="marca" class='form-control select_marcas'>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='tipo_auto' name="tipo_auto" class='form-control select_tipos'>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" id="modelo" name="modelo" class="form-control" placeholder="Modelo">
                            </div>
                            <?php if($_SESSION['id'] === '1'){ ?>
                                <div class="form-group">
                                <select id='tipo' name="tipo" class='form-control'>
                                    <option value="">Seleccione una opción</option>
                                    <option value="1">Premium</option>
                                    <option value="2">Regular</option>
                                </select>
                            </div>
                            <?php } ?>
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

<div class="modal fade" id="modalEliminarModelos" tabindex="-1" role="dialog" aria-labelledby="modalEliminarModelos"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formEliminarModelos">
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