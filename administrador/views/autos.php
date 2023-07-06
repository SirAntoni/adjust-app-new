<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Autos</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" data-toggle="modal" data-target="#modalCrearAuto"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
            Crear auto
        </button>
    </div>
</div>
<!-- row -->

<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTableAutos" class="table table-stripe table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th width='100px'>UUID</th>
                                <th>NOMBRE</th>
                                <th>MARCA</th>
                                <th>TIPO</th>
                                <th>MODELO</th>
                                <th>ANIO</th>
                                <th>COLOR</th>
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

<div class="modal fade" id="modalCrearAuto" tabindex="-1" role="dialog" aria-labelledby="modalCrearAuto"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Crear auto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCrearAuto">
                <div class="modal-body">
                    <input type="hidden" value="crear" name="opcion">
                    <input type="hidden" id='negocio' name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name='nombre' placeholder='Nombre del auto' class='form-control'>
                            </div>
                            <div class="form-group">
                                <select name="marca" class='select_marcas'>
                                    <option value="">Seleccione una marca</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="tipo" class='select_tipos'>
                                    <option value="">Seleccione un tipo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="modelo" class='select_modelos'>
                                    <option value="">Seleccione una marca</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="anio" class='select_anios'>
                                    <option value="">Seleccione un año</option>
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

<div class="modal fade" id="modalEditarAuto" tabindex="-1" role="dialog" aria-labelledby="modalEditarAuto"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Editar Auto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formEditarAuto">
                <div class="modal-body">
                    <input type="hidden" value="editar" name="opcion">
                    <input type="hidden" class="id" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" id='nombre' name='nombre' placeholder='Nombre del auto' class='form-control'>
                            </div>
                            <div class="form-group">
                                <select id='marca' name="marca">
                                    <option value="">Seleccione una marca</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='tipo' name="tipo" class='select_tipos'>
                                    <option value="">Seleccione un tipo</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='modelo' name="modelo">
                                    <option value="">Seleccione una marca</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='anio' name="anio" class='select_anios'>
                                    <option value="">Seleccione un año</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='color' name="color">
                                    <option value="">Seleccione un color</option>
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

<div class="modal fade" id="modalEliminarAuto" tabindex="-1" role="dialog" aria-labelledby="modalEliminarAuto"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formEliminarAuto">
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