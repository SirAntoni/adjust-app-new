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
                                <input type="text" id='direccion' name='direccion' class='form-control' placeholder='Ingresa tu direccion'>
                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id='telefono' name='telefono' class='form-control' placeholder='Ingresa tu telefono'>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" id='email' name='email' class='form-control' placeholder='Ingresa tu email'>
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
                                <textarea name="nosotros" id="nosotros" placeholder='Ingresa tu informacion' cols="30" rows="3"
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
                                <textarea name="mision" id="mision" placeholder='Ingresa tu informacion' cols="30" rows="3"
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
                                <textarea name="vision" id="vision" placeholder='Ingresa tu informacion' cols="30" rows="3"
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
</div>
<!-- row -->