<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Negocios</h4>
    </div>
    <?php if($_SESSION['id'] === "1") { ?>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <button type="button" data-toggle="modal" data-target="#modalCrearNegocio"
            class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
            <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
            Crear negocio
        </button>
    </div>
    <?php } ?>
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
                                <th>FACEBOOK</th>
                                <th>INSTAGRAM</th>
                                <th>TIKTOK</th>
                                <th>YOUTUBE</th>
                                <th>TELEFONO</th>
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
                                <input type="text" name="facebook" class="form-control" placeholder="Facebook">
                            </div>
                            <div class="form-group">
                                <input type="text" name="instagram" class="form-control" placeholder="Instagram">
                            </div>
                            <div class="form-group">
                                <input type="text" name="tiktok" class="form-control" placeholder="TikTok">
                            </div>
                            <div class="form-group">
                                <input type="text" name="youtube" class="form-control" placeholder="Youtube">
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefono" class="form-control" placeholder="Telefono">
                            </div>
                            <div class="form-group">
                                <select name="rango" class='form-control'>
                                    <option value="">Seleccione un rango</option>
                                    <option value="1">Premium</option>
                                    <option value="2">Regular</option>
                                    <option value="3">Basico</option>
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
                                <input type="text" id='razon_social' name="razon_social" class="form-control"
                                    placeholder="Razon social">
                            </div>
                            <div class="form-group">
                                <input type="text" name="contrasena" class="form-control" placeholder="Contraseña">
                            </div>
                            <div class="form-group">
                                <input type="text" id='facebook' name="facebook" class="form-control"
                                    placeholder="Facebook">
                            </div>
                            <div class="form-group">
                                <input type="text" id='instagram' name="instagram" class="form-control"
                                    placeholder="Instagram">
                            </div>
                            <div class="form-group">
                                <input type="text" id='tiktok' name="tiktok" class="form-control" placeholder="TikTok">
                            </div>
                            <div class="form-group">
                                <input type="text" id='youtube' name="youtube" class="form-control"
                                    placeholder="Youtube">
                            </div>
                            <div class="form-group">
                                <label>Fondo Home/Web (Recomendado 5472px x 3648px)</label>
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
                            <div class="form-group">
                                <label>Fondo Galeria (Recomendado 5472px x 3648px)</label>
                                <input type="hidden" id='archivo1' name='archivo1'>
                                <input type="file" name="cover1" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled=""
                                        placeholder="Subir Imagen">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Cargar</button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" id='telefono' name="telefono" class="form-control"
                                    placeholder="Telefono">
                            </div>
                            <div class="form-group">
                                <select id='rango' name="rango" class='form-control'>
                                    <option value="">Seleccione un rango</option>
                                    <option value="1">Premium</option>
                                    <option value="2">Regular</option>
                                    <option value="3">Basico</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id='estado' name="estado" class='form-control'>
                                    <option value="">Seleccione un estado</option>
                                    <option value="1">Activo</option>
                                    <option value="2">Eliminado</option>
                                    <option value="3">Suspendido</option>
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

<div class="modal fade" id="modalDuplicarNegocio" tabindex="-1" role="dialog" aria-labelledby="modalDuplicarNegocio"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Duplicar Negocio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formDuplicarNegocio">
                <div class="modal-body">
                    <input type="hidden" value="duplicar" name="opcion">
                    <input type="hidden" class="id" name="id">
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
                                    <option value="3">Basico</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Duplicar</button>
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