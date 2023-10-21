<div class="row">
    <div class="col-12 col-xl-12 grid-margin stretch-card">
        <div class="card overflow-hidden">

            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                    <div>
                        <h4 class="mb-3 mb-md-0">GALERIA</h4>
                    </div>
                    <div class="d-flex align-items-center flex-wrap text-nowrap">
                        <button type="button" data-toggle="modal" data-target="#modalCrearGaleria"
                            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
                            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
                            Agregar imagen
                        </button>
                    </div>
                </div>
                <div class='row'>

                    <div class="table-responsive">

                        <table id="dataTableGaleria" class="table table-stripe table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th width='100px'>Filtro</th>
                                    <th>Titulo</th>
                                    <th>Descripcion</th>
                                    <th width='100px'>Imagen</th>
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


<div class="modal fade" id="modalCrearGaleria" tabindex="-1" role="dialog" aria-labelledby="modalCrearGaleria"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar Imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formCrearGaleria">
                <div class="modal-body">
                    <input type="hidden" value="crear_galeria" name="opcion">
                    <input type="hidden" id='filtro' name='filtro' value='<?php echo $_GET['filtro'] ?>'>
                    <input type="hidden" id='negocio' name='negocio' value='<?php echo $_GET['negocio'] ?>'>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name='titulo' placeholder='Escriba un titulo' class='form-control'>
                            </div>
                            <div class="form-group">
                                <input type="text" name='descripcion' placeholder='Escriba una breve descripcion' class='form-control'>
                            </div>
                            <div class="form-group">
                                <label>Preview Imagen (Recomendado 800px x 540px)</label>
                                <input type="file" name="imagen" class="file-upload-default">
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

<div class="modal fade" id="modalEliminarGaleria" tabindex="-1" role="dialog" aria-labelledby="modalEliminarGaleria"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="formEliminarGaleria">
                <div class="modal-body">
                    <input type="hidden" value="eliminar_galeria" name="opcion">
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