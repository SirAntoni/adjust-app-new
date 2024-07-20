$(function() {

    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);

    //Marcas
    listar_marcas();
    crear_marca();
    editar_marca();
    eliminar_marca();

    //Tipos

    listar_tipos();
    crear_tipo();
    editar_tipo();
    eliminar_tipo();

    //modelos

    listar_modelos();
    crear_modelo();
    editar_modelo();
    eliminar_modelo();

    //Años

    listar_anios();
    crear_anio();
    editar_anio();
    eliminar_anio();

    //Negocios

    listar_negocios();
    crear_negocio();
    editar_negocio();
    duplicar_negocio();

    //Autos

    listar_autos();
    crear_auto();
    editar_auto();
    eliminar_auto();

    //Colores
    listar_colores();
    crear_color();
    editar_color();
    eliminar_color();

    //Categorias

    listar_categorias();
    crear_categoria();
    editar_categoria();
    eliminar_categoria();

    //Autopartes
    listar_autopartes();
    crear_autoparte();
    editar_autoparte();
    eliminar_autoparte();

    //SELECTS
    select_marcas();
    select_marcas_editar();
    select_tipos();
    select_modelos();
    select_modelos_editar();
    select_anios();
    obtener_nombre_auto();
    obtener_nombre_autoparte();
    obtener_nombre_categoria();

    //Dashboard
    dashboard();

    //Dropzone
    localStorage.removeItem("documentos");
    limpiar();
    if (params.get("module") === 'configurar-color') activarDropzone();
    subir();



    //IMAGENES
    listar_imagenes();

    //Web
    if (params.get("module") === 'web') {
        cargar_web();
        cargar_filtros();
        crear_filtro();
        editar_filtro();
        eliminar_filtro();
    }
    guardar_datos_generales();
    guardar_slogan();
    guardar_nosotros();
    guardar_mision();
    guardar_vision();
    guardar_logo();
    guardar_nosotrosImg();
    guardar_misionImg();
    guardar_visionImg();
    guardar_mapa();

    listar_galeria();
    crear_galeria();
    eliminar_galeria();

    listar_usuarios();
    select_negocio();
    crear_usuario();
    editar_usuario();
    eliminar_usuario();
    btn_crear();

})

const btn_crear = function() {
    const data = {
        opcion: 'listar_autos',
        negocio: $("#negocio").val()
    }
    $.ajax({
        url: 'controller/autos.php',
        method: 'POST',
        data: data,
        success: function(data) {
            const autosList = JSON.parse(data);
            let html = ''
            if (autosList.data.length === 0) {
                html = html + `<button type="button" data-toggle="modal" data-target="#modalCrearAuto"
                class="btn btn-primary btn-icon-text mb-2 mb-md-0 mr-2">
                <i class="btn-icon-prepend mr-2" data-feather="plus-square"></i>
                Crear
            </button>`;
            }

            $("#btn-crear").html(html);
            feather.replace();
        }
    })
}


const select_negocio = function() {
    $.ajax({
        url: 'controller/negocios.php',
        success: function(response) {
            const { data } = JSON.parse(response);
            let html = ``;
            data.map((negocio) => {
                html = html + `<option value='${negocio.id}'>${negocio.razon_social}</option>`;
            })
            $(".negocio").html(html);
        }
    })
}

//WEB

const crear_filtro = function() {
    $("#formCrearFiltro").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: './controller/web.php',
            method: 'POST',
            data: data,
            success: function(response) {
                const data = JSON.parse(response);
                if (data.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_filtros();
                    $("#formCrearFiltro").trigger('reset');
                    $("#modalCrearFiltros").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

const crear_usuario = function() {
    $("#formCrearUsuario").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: './controller/usuarios.php',
            method: 'POST',
            data: data,
            success: function(response) {
                const data = JSON.parse(response);
                if (data.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableUsuarios").DataTable().ajax.reload();
                    $("#formCrearUsuario").trigger('reset');
                    $("#modalCrearUsuario").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}
const editar_usuario = function() {
    $("#formEditarUsuario").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: './controller/usuarios.php',
            method: 'POST',
            data: data,
            success: function(response) {
                const data = JSON.parse(response);
                if (data.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableUsuarios").DataTable().ajax.reload();
                    $("#formEditarUsuarios").trigger('reset');
                    $("#modalEditarUsuarios").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

const editar_filtro = function() {
    $("#formEditarFiltro").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: './controller/web.php',
            method: 'POST',
            data: data,
            success: function(response) {
                const data = JSON.parse(response);
                if (data.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_filtros();
                    $("#formEditarFiltro").trigger('reset');
                    $("#modalEditarFiltro").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

const eliminar_filtro = function() {
    $("#formEliminarFiltro").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: './controller/web.php',
            method: 'POST',
            data: data,
            success: function(response) {
                const data = JSON.parse(response);
                if (data.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_filtros();
                    $("#formEliminarFiltro").trigger('reset');
                    $("#modalEliminarFiltro").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

const cargar_filtros = function() {
    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);
    $.ajax({
        url: './controller/web.php',
        method: 'POST',
        data: { opcion: 'cargar_filtros', negocio: params.get('negocio') },
        success: function(response) {
            const data = JSON.parse(response);
            let html = ``

            if (data.status === 'error') {
                html = html + `<tr>
                <td colspan='2' class='text-center' >No existen filtros asignados a esta web.</td>
                </tr>`;
            } else {
                data.forEach((filtro) => {

                    html = html + `<tr>
                    <td>${filtro.filtro}</td>
                    <td><a href="#!" class='text-success mr-2' onclick='obtenerEditarFiltro(${filtro.id})'><i class='fas fa-edit fa-lg'></i></a><a href="#!" class='text-primary mr-2' onclick='irGaleria(${filtro.id})' ><i class='fas fa-cog fa-lg'></i></a><a href="#!" class='text-danger' onclick='obtenerEliminarFiltro(${filtro.id})'><i class='fas fa-trash fa-lg'></i></a></td>
                </tr>`;
                })

            }



            $("#filtros").html(html)
        }

    })
}

function obtenerEditarFiltro(id) {
    $.ajax({
        url: './controller/web.php',
        method: 'POST',
        data: { id, opcion: 'obtener_filtro' },
        success: function(response) {
            const data = JSON.parse(response);
            $("#filtro").val(data.filtro);
            $(".id").val(data.id);
            $("#modalEditarFiltro").modal('show');
        }
    })
}

function irGaleria(id) {
    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);
    window.location = `main?module=galeria&filtro=${id}&negocio=${params.get('negocio')}`;
}

function obtenerEliminarFiltro(id) {
    $.ajax({
        url: './controller/web.php',
        method: 'POST',
        data: { id, opcion: 'obtener_filtro' },
        success: function(response) {
            const data = JSON.parse(response);
            $(".id").val(data.id);
            $("#modalEliminarFiltro").modal('show');
        }
    })
}

var guardar_logo = function() {

    $("#formLogo").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formLogo')[0]);
        console.log(formData)
        $.ajax({
            url: "controller/web.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var guardar_nosotrosImg = function() {

    $("#formNosotrosImg").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formNosotrosImg')[0]);
        console.log(formData)
        $.ajax({
            url: "controller/web.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var guardar_misionImg = function() {

    $("#formMisionImg").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formMisionImg')[0]);
        console.log(formData)
        $.ajax({
            url: "controller/web.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var guardar_visionImg = function() {

    $("#formVisionImg").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formVisionImg')[0]);
        console.log(formData)
        $.ajax({
            url: "controller/web.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

const cargar_web = function() {

    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);
    const negocio = params.get('negocio')

    $.ajax({
        url: 'controller/web.php',
        method: 'POST',
        data: { negocio },
        success: function(response) {
            const data = JSON.parse(response);
            $("#direccion").val(data.direccion);
            $("#telefono").val(data.telefono);
            $("#email").val(data.email);
            $("#slogan").val(data.slogan);
            $("#nosotros").val(data.nosotros);
            $("#mision").val(data.mision);
            $("#vision").val(data.vision);
            $("#archivoLogo").val(data.logo);
            $("#archivoNosotros").val(data.nosotrosImg);
            $("#archivoMision").val(data.misionImg);
            $("#archivoVision").val(data.visionImg);
            $("#mapa").val(data.mapa);
            $("#divLogo").html(`<img src='../assets/img/${data.logo}'>`);
            $("#divNosotros").html(`<img src='../assets/img/${data.nosotrosImg}' width='100px'>`);
            $("#divMision").html(`<img src='../assets/img/${data.misionImg}' width='100px'>`);
            $("#divVision").html(`<img src='../assets/img/${data.visionImg}' width='100px'>`);
        }
    })
}

const guardar_datos_generales = function() {
    $("#formDatosGenerales").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        console.log(data);
        $.ajax({
            url: 'controller/web.php',
            method: 'POST',
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                console.log(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

const guardar_slogan = function() {
    $("#formSlogan").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: 'controller/web.php',
            method: 'POST',
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                console.log(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

const guardar_nosotros = function() {
    $("#formNosotros").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: 'controller/web.php',
            method: 'POST',
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                console.log(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}


const guardar_mapa = function() {
    $("#formMapa").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: 'controller/web.php',
            method: 'POST',
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                console.log(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

const guardar_mision = function() {
    $("#formMision").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: 'controller/web.php',
            method: 'POST',
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                console.log(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

const guardar_vision = function() {
    $("#formVision").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: 'controller/web.php',
            method: 'POST',
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                console.log(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    cargar_web();

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }

        })
    })
}

//DASHBOARD

const dashboard = function() {
    $.ajax({
        url: 'controller/dashboard.php',
        method: 'GET',
        success: function(response) {
            const data = JSON.parse(response);

            $('#dashboard_negocios').html(data[0]);
            $('#dashboard_autos').html(data[1]);
            $('#dashboard_autopartes').html(data[2]);
        }
    })
}


// LISTAR UTILIARIOS GENERALES

let select_marcas = () => {
    $.ajax({
        url: 'controller/marcas.php',
        method: 'POST',
        data: { opcion: 'listar_marcas' },
        success: function(response) {
            const marcas = JSON.parse(response);
            let html = `<option value=''>Seleccione una marca</option>`;
            marcas.forEach(marca => {
                html = html + `<option value='${marca.id}'>${marca.marca}</option>`;
            })

            $(".select_marcas").html(html);
        }
    })
}

let select_marcas_editar = () => {
    $.ajax({
        url: 'controller/marcas.php',
        method: 'POST',
        data: { opcion: 'listar_marcas' },
        success: function(response) {
            const marcas = JSON.parse(response);
            let html = `<option value=''>Seleccione una marca</option>`;
            marcas.forEach(marca => {
                html = html + `<option value='${marca.id}'>${marca.marca}</option>`;
            })

            $("#marca").html(html);
        }
    })
}

let select_tipos = () => {
    $.ajax({
        url: 'controller/tipos.php',
        method: 'POST',
        data: { opcion: 'listar_tipos' },
        success: function(response) {
            const tipos = JSON.parse(response);
            let html = `<option value=''>Seleccione un tipo</option>`;
            tipos.forEach(tipo => {
                html = html + `<option value='${tipo.id}'>${tipo.tipo}</option>`;
            })

            $(".select_tipos").html(html);
        }
    })
}

let select_modelos = function() {
    $(".select_marcas").change(() => {
        $.ajax({
            url: 'controller/modelos.php',
            method: 'POST',
            data: { opcion: 'listar_modelos', marca: $(".select_marcas").val() },
            success: function(response) {

                const modelos = JSON.parse(response);
                let html = `<option value=''>Seleccione un modelo</option>`;
                modelos.forEach(modelo => {
                    html = html + `<option value='${modelo.id}'>${modelo.modelo}</option>`;
                })

                $(".select_modelos").html(html);
            }
        });

    })
}

let select_modelos_editar = function() {
    $("#marca").change(() => {
        $.ajax({
            url: 'controller/modelos.php',
            method: 'POST',
            data: { opcion: 'listar_modelos', marca: $("#marca").val() },
            success: function(response) {
                const modelos = JSON.parse(response);
                let html = `<option value=''>Seleccione un modelo</option>`;
                modelos.forEach(modelo => {
                    html = html + `<option value='${modelo.id}'>${modelo.modelo}</option>`;
                })
                console.log(response)
                $("#modelo").html(html);
            }
        });

    })
}

let select_anios = function() {
    $.ajax({
        url: 'controller/anios.php',
        method: 'POST',
        data: { opcion: 'listar_anios' },
        success: function(response) {
            const anios = JSON.parse(response);
            let html = `<option value=''>Seleccione un anio</option>`;
            anios.forEach(anio => {
                html = html + `<option value='${anio.id}'>${anio.anio}</option>`;
            })

            $(".select_anios").html(html);
        }
    });
}

const obtener_nombre_auto = function() {

    const urlParams = new URLSearchParams(window.location.search);
    const uuid = urlParams.get('auto');

    $.ajax({
        url: 'controller/autos.php',
        method: 'POST',
        data: { opcion: 'obtener_nombre_auto', uuid },
        success: function(response) {
            $("#nombre_auto").html(response);
        }
    });

};

const obtener_nombre_categoria = function() {

    const urlParams = new URLSearchParams(window.location.search);
    const uuid = urlParams.get('categoria');

    $.ajax({
        url: 'controller/categorias.php',
        method: 'POST',
        data: { opcion: 'obtener_nombre_categoria', uuid },
        success: function(response) {
            $("#nombre_categoria").html(response);
        }
    });

};

const obtener_nombre_autoparte = function() {

    const urlParams = new URLSearchParams(window.location.search);
    const uuid = urlParams.get('autoparte');

    $.ajax({
        url: 'controller/autopartes.php',
        method: 'POST',
        data: { opcion: 'obtener_nombre_autoparte', uuid },
        success: function(response) {
            $("#nombre_autoparte").html(response);
        }
    });

};

// FIN UTILIARIOS GENERALES

// INICIAR NEGOCIOS

var listar_marcas = function() {
    var table_marcas = $("#dataTableMarcas").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/marcas.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [4] },
            { bSearchable: false, bVisible: false, aTargets: [5] },
            { bSearchable: false, bVisible: false, aTargets: [6] }
        ],
        columns: [
            { data: "id" },
            { data: "marca" },
            {
                data: "tipo_usuario",
                render: function(data, type, row) {
                    return data === '1' ? 'premium' : 'regular';
                }
            },
            { data: "estado" },
            { data: "negocio_id" },
            { data: "fecha_creacion" },
            { data: "fecha_modificacion" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_editar_marca("#dataTableMarcas tbody", table_marcas);
    data_eliminar_marca("#dataTableMarcas tbody", table_marcas);

    $("#dataTableMarcas").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_editar_marca = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#marca").val(data.marca);
        $("#tipo").val(data.tipo_usuario);
        $("#modalEditarMarcas").modal("show");
    })
}

var data_eliminar_marca = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarMarcas").modal("show");
    })
}

var crear_marca = function() {

    $("#formCrearMarcas").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/marcas.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableMarcas").DataTable().ajax.reload();
                    $("#formCrearMarcas").trigger('reset');
                    $("#modalCrearMarcas").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var editar_marca = function() {

    $("#formEditarMarcas").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/marcas.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableMarcas").DataTable().ajax.reload();
                    $("#formEditarMarcas").trigger('reset');
                    $("#modalEditarMarcas").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var eliminar_marca = function() {

    $("#formEliminarMarcas").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/marcas.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableMarcas").DataTable().ajax.reload();
                    $("#formEliminarMarcas").trigger('reset');
                    $("#modalEliminarMarcas").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var listar_usuarios = function() {
    var table_usuarios = $("#dataTableUsuarios").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/usuarios.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] }
        ],
        columns: [
            { data: "id" },
            { data: "usuario" },
            { data: "negocio" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_editar_usuario("#dataTableUsuarios tbody", table_usuarios);
    data_eliminar_usuario("#dataTableUsuarios tbody", table_usuarios);

    $("#dataTableUsuarios").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_editar_usuario = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#negocio").val(data.negocio);
        $("#modalEditarUsuarios").modal("show");
    })
}

var data_eliminar_usuario = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarUsuarios").modal("show");
    })
}


var eliminar_usuario = function() {

    $("#formEliminarUsuarios").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/usuarios.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableUsuarios").DataTable().ajax.reload();
                    $("#formEliminarUsuarios").trigger('reset');
                    $("#modalEliminarUsuarios").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}


var listar_tipos = function() {
    var table_tipos = $("#dataTableTipos").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/tipos.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [4] },
            { bSearchable: false, bVisible: false, aTargets: [5] },
            { bSearchable: false, bVisible: false, aTargets: [6] }
        ],
        columns: [
            { data: "id" },
            { data: "tipo" },
            {
                data: "tipo_usuario",
                render: function(data, type, row) {
                    return data === '1' ? 'premium' : 'regular';
                }
            },
            { data: "estado" },
            { data: "negocio_id" },
            { data: "fecha_creacion" },
            { data: "fecha_modificacion" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_editar_tipo("#dataTableTipos tbody", table_tipos);
    data_eliminar_tipo("#dataTableTipos tbody", table_tipos);

    $("#dataTableTipos").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_editar_tipo = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#tipo").val(data.tipo);
        $("#tipo_usuario").val(data.tipo_usuario);
        $("#modalEditarTipos").modal("show");
    })
}

var data_eliminar_tipo = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarTipos").modal("show");
    })
}

var crear_tipo = function() {

    $("#formCrearTipos").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/tipos.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableTipos").DataTable().ajax.reload();
                    $("#formCrearTipos").trigger('reset');
                    $("#modalCrearTipos").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var editar_tipo = function() {

    $("#formEditarTipos").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/tipos.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableTipos").DataTable().ajax.reload();
                    $("#formEditarTipos").trigger('reset');
                    $("#modalEditarTipos").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var eliminar_tipo = function() {

    $("#formEliminarTipos").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/tipos.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableTipos").DataTable().ajax.reload();
                    $("#formEliminarTipos").trigger('reset');
                    $("#modalEliminarTipos").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var listar_modelos = function() {
    var table_modelos = $("#dataTableModelos").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/modelos.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [2] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [6] },
            { bSearchable: false, bVisible: false, aTargets: [7] },
            { bSearchable: false, bVisible: false, aTargets: [8] },
            { bSearchable: false, bVisible: false, aTargets: [9] },
            { bSearchable: false, bVisible: false, aTargets: [10] }
        ],
        columns: [
            { data: "id" },
            { data: "marca" },
            { data: "marca_id" },
            { data: "tipo_id" },
            { data: "tipo" },
            { data: "modelo" },
            {
                data: "tipo_usuario",
                render: function(data, type, row) {
                    return data === '1' ? 'premium' : 'regular';
                }
            },
            { data: "estado" },
            { data: "negocio_id" },
            { data: "fecha_creacion" },
            { data: "fecha_modificacion" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_editar_modelo("#dataTableModelos tbody", table_modelos);
    data_eliminar_modelo("#dataTableModelos tbody", table_modelos);

    $("#dataTableModelos").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_editar_modelo = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#marca").val(data.marca_id);
        $("#modelo").val(data.modelo);
        $("#tipo_auto").val(data.tipo_id);
        $("#tipo").val(data.tipo_usuario);
        $("#modalEditarModelos").modal("show");
    })
}

var data_eliminar_modelo = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarModelos").modal("show");
    })
}

var crear_modelo = function() {

    $("#formCrearModelos").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/modelos.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableModelos").DataTable().ajax.reload();
                    $("#formCrearModelos").trigger('reset');
                    $("#modalCrearModelos").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var editar_modelo = function() {

    $("#formEditarModelos").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/modelos.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableModelos").DataTable().ajax.reload();
                    $("#formEditarModelos").trigger('reset');
                    $("#modalEditarModelos").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var eliminar_modelo = function() {

    $("#formEliminarModelos").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/modelos.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableModelos").DataTable().ajax.reload();
                    $("#formEliminarModelos").trigger('reset');
                    $("#modalEliminarModelos").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var listar_anios = function() {
    var table_anios = $("#dataTableAnios").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/anios.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [4] },
            { bSearchable: false, bVisible: false, aTargets: [5] }
        ],
        columns: [
            { data: "id" },
            { data: "anio" },
            {
                data: "tipo_usuario",
                render: function(data, type, row) {
                    return data === '1' ? 'premium' : 'regular';
                }
            },
            { data: "estado" },
            { data: "fecha_creacion" },
            { data: "fecha_modificacion" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_editar_anio("#dataTableAnios tbody", table_anios);
    data_eliminar_anio("#dataTableAnios tbody", table_anios);

    $("#dataTableAnios").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_editar_anio = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#anio").val(data.anio);
        $("#tipo").val(data.tipo_usuario);
        $("#modalEditarAnios").modal("show");
    })
}

var data_eliminar_anio = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarAnios").modal("show");
    })
}

var crear_anio = function() {

    $("#formCrearAnios").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/anios.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableAnios").DataTable().ajax.reload();
                    $("#formCrearAnios").trigger('reset');
                    $("#modalCrearAnios").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var editar_anio = function() {

    $("#formEditarAnios").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/anios.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableAnios").DataTable().ajax.reload();
                    $("#formEditarAnios").trigger('reset');
                    $("#modalEditarAnios").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var eliminar_anio = function() {

    $("#formEliminarAnios").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/anios.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableAnios").DataTable().ajax.reload();
                    $("#formEliminarAnios").trigger('reset');
                    $("#modalEliminarAnios").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

// FIN COFIGURACION

// INICIO NEGOCIOS

var listar_negocios = function() {
    var table_negocios = $("#dataTableNegocios").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/negocios.php",
            method: "POST",
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [5] },
            { bSearchable: false, bVisible: false, aTargets: [6] },
            { bSearchable: false, bVisible: false, aTargets: [7] },
            { bSearchable: false, bVisible: false, aTargets: [8] },
            { bSearchable: false, bVisible: false, aTargets: [9] },
            { bSearchable: false, bVisible: false, aTargets: [10] },
            { bSearchable: false, bVisible: false, aTargets: [11] },
            { bSearchable: false, bVisible: false, aTargets: [12] },
            { bSearchable: false, bVisible: false, aTargets: [13] }
        ],
        columns: [
            { data: "id" },
            { data: "ruc" },
            { data: "razon_social" },
            {
                data: "rango",
                render: function(data, type, row) {
                    if (data === '1') {
                        return 'premium';
                    } else if (data === '2') {
                        return 'regular';
                    } else if (data === '3') {
                        return 'basico';
                    }
                }
            },
            {
                data: "estado",
                render: function(data, type, row) {
                    return data === '1' ? 'activo' : 'suspendido';
                }
            },
            { data: "facebook" },
            { data: "instagram" },
            { data: "tiktok" },
            { data: "youtube" },
            { data: "telefono" },
            { data: "fondo_home" },
            { data: "fondo_home_movil" },
            { data: "fondo_galeria" },
            { data: "fondo_galeria_movil" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Configurar' class='configurar mr-1 text-primary'><i class='fas fa-cog fa-lg'></i></a><a title='Duplicar' class='duplicar mr-1 text-warning'><i class='fas fa-copy fa-lg'></i></a><a title='Web' class='web mr-1 text-dark'><i class='fas fa-globe-americas fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_editar_negocio("#dataTableNegocios tbody", table_negocios);
    data_configurar_negocio("#dataTableNegocios tbody", table_negocios);
    data_duplicar_negocio("#dataTableNegocios tbody", table_negocios);
    data_web_negocio("#dataTableNegocios tbody", table_negocios);

    $("#dataTableNegocios").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_editar_negocio = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#ruc").val(data.ruc);
        $("#razon_social").val(data.razon_social);
        $("#rango").val(data.rango);
        $("#facebook").val(data.facebook);
        $("#instagram").val(data.instagram);
        $("#tiktok").val(data.tiktok);
        $("#youtube").val(data.youtube);
        $("#telefono").val(data.telefono);
        $("#archivo").val(data.fondo_home);
        $("#archivo_movil").val(data.fondo_home_movil);
        $("#archivo1").val(data.fondo_galeria);
        $("#archivo1_movil").val(data.fondo_galeria_movil);
        $("#estado").val(data.estado);
        $("#modalEditarNegocio").modal("show");
    })
}

var data_duplicar_negocio = function(tbody, table) {
    $(tbody).on("click", ".duplicar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#ruc").val(data.ruc);
        $("#razon_social").val(data.razon_social);
        $("#rango").val(data.rango);
        $("#estado").val(data.estado);
        $("#modalDuplicarNegocio").modal("show");
    })
}

var data_configurar_negocio = function(tbody, table) {
    $(tbody).on("click", ".configurar", function() {
        var data = table.row($(this).parents("tr")).data();
        window.location = 'main?module=autos&negocio=' + data.id;
    })
}

var data_web_negocio = function(tbody, table) {
    $(tbody).on("click", ".web", function() {
        var data = table.row($(this).parents("tr")).data();
        if (data.rango === '3') {
            Swal.fire({
                title: 'Error!',
                text: 'Negocio no cuenta con el rango suficiente, subale el rango.',
                icon: 'error',
                confirmButtonText: 'Ok'
            })
        } else {
            window.location = 'main?module=web&negocio=' + data.id;
        }
    })
}

var crear_negocio = function() {

    $("#formCrearNegocio").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: "controller/negocios.php",
            method: "POST",
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {

                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableNegocios").DataTable().ajax.reload();
                    $("#formCrearNegocio").trigger('reset');
                    $("#modalCrearNegocio").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })
    })

}

var editar_negocio = function() {

    $("#formEditarNegocio").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formEditarNegocio')[0]);
        $.ajax({
            url: "controller/negocios.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {

                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableNegocios").DataTable().ajax.reload();
                    $("#formEditarNegocio").trigger('reset');
                    $("#modalEditarNegocio").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var duplicar_negocio = function() {
    $("#formDuplicarNegocio").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: "controller/negocios.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content', 'Cargando... puede tomar unos minutos');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {

                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableNegocios").DataTable().ajax.reload();
                    $("#formDuplicarNegocio").trigger('reset');
                    $("#modalDuplicarNegocio").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })
    })
}

const crear = function() {
    $.ajax({
        url: 'controller/autos.php',
        success: function(data) {
            console.log(data);
        }
    })
}

var listar_autos = function() {

    const negocio = $("#negocio").val()

    var table_autos = $("#dataTableAutos").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/autos.php",
            method: "POST",
            data: function(d) {
                // Crea el objeto con los datos a enviar en el cuerpo
                var bodyData = {
                    opcion: 'listar_autos',
                    negocio: negocio
                        // Agrega otros parámetros según sea necesario
                };

                // Convierte el objeto en una cadena JSON
                var jsonData = JSON.stringify(bodyData);

                // Agrega la cadena JSON al cuerpo de la solicitud
                d.data = jsonData;

                // Retornar el objeto modificado
                return d;
            },
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [3] },
            { bSearchable: false, bVisible: false, aTargets: [4] },
            { bSearchable: false, bVisible: false, aTargets: [5] },
            { bSearchable: false, bVisible: false, aTargets: [6] },
            { bSearchable: false, bVisible: false, aTargets: [7] }
        ],
        columns: [
            { data: "id" },
            { data: "uuid" },
            { data: "nombre" },
            { data: "marca_id" },
            { data: "tipo_id" },
            { data: "modelo_id" },
            { data: "anio_uuid" },
            { data: "color_uuid" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Configurar' class='configurar mr-1 text-primary'><i class='fas fa-cog fa-lg'></i></a><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_editar_auto("#dataTableAutos tbody", table_autos);
    data_configurar_auto("#dataTableAutos tbody", table_autos);
    data_eliminar_auto("#dataTableAutos tbody", table_autos);

    $("#dataTableAutos").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_editar_auto = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#nombre").val(data.nombre);
        $("#marca").val(data.marca_id);
        $("#tipo").val(data.tipo_id);
        $("#uuid").val(data.uuid);
        $('#anios').importTags('');
        $.ajax({
            url: 'controller/modelos.php',
            method: 'POST',
            data: { opcion: 'listar_modelos', marca: data.marca_id },
            success: function(response) {
                const modelos = JSON.parse(response);
                let html = `<option value=''>Seleccione un modelo</option>`;
                modelos.forEach(modelo => {
                    html = html + `<option value='${modelo.id}'>${modelo.modelo}</option>`;
                })

                $("#modelo").html(html);
                $("#modelo").val(data.modelo_id);
            }
        });

        $.ajax({
            url: 'controller/colores.php',
            method: 'POST',
            data: { opcion: 'listar_colores', auto: data.uuid },
            success: function(response) {

                const colores = JSON.parse(response);
                console.log(colores);
                let html = `<option value=''>Seleccione un color</option>`;
                colores['data'].forEach((color) => {
                    console.log(color);
                    html = html + `<option value='${color.uuid}'>${color.color}</option>`;
                })

                $("#color").html(html);
                $("#color").val(data.color_uuid);
            }
        });

        $.ajax({
            url: 'controller/autos.php',
            method: 'POST',
            data: { opcion: 'listar_anios', uuid: data.uuid },
            success: function(response) {

                const anios = JSON.parse(response);
                anios.forEach(({ anio }) => {
                    $('#anios').addTag(anio);
                });
            }
        });

        $("#modalEditarAuto").modal("show");
    })
}

var data_eliminar_auto = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarAuto").modal("show");
    })
}

var data_configurar_auto = function(tbody, table) {
    $(tbody).on("click", ".configurar", function() {
        var data = table.row($(this).parents("tr")).data();
        window.location = 'main?module=configurar-auto&auto=' + data.uuid;
    })
}

var crear_auto = function() {
    $("#formCrearAuto").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: "controller/autos.php",
            method: "POST",
            data: data,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    btn_crear();

                    $("#dataTableAutos").DataTable().ajax.reload();
                    $("#formCrearAutos").trigger('reset');
                    $("#modalCrearAuto").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })
    })

}

var editar_auto = function() {

    $("#formEditarAuto").submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();
        $.ajax({
            url: "controller/autos.php",
            method: "POST",
            data: data,
            success: function(response) {
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableAutos").DataTable().ajax.reload();
                    $("#formEditarAuto").trigger('reset');
                    $("#modalEditarAuto").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })
    })

}

var eliminar_auto = function() {

    $("#formEliminarAuto").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/autos.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    btn_crear();
                    $("#dataTableAutos").DataTable().ajax.reload();
                    $("#formEliminarAuto").trigger('reset');
                    $("#modalEliminarAuto").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var listar_galeria = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const filtro = urlParams.get('filtro');
    var table_galeria = $("#dataTableGaleria").DataTable({
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/galeria.php",
            method: "POST",
            data: function(d) {
                // Crea el objeto con los datos a enviar en el cuerpo
                var bodyData = {
                    opcion: 'cargar_galeria',
                    filtro
                    // Agrega otros parámetros según sea necesario
                };

                // Convierte el objeto en una cadena JSON
                var jsonData = JSON.stringify(bodyData);

                // Agrega la cadena JSON al cuerpo de la solicitud
                d.data = jsonData;

                // Retornar el objeto modificado
                return d;
            }
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] }
        ],
        columns: [
            { data: "id" },
            { data: "filtro" },
            { data: "titulo" },
            { data: "descripcion" },
            {
                data: "imagen",
                render: function(data, type, row) {
                    return `<center><img src='../assets/img/${data}'></center>`;
                }
            },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_eliminar_galeria("#dataTableGaleria tbody", table_galeria);


    $("#dataTableGaleria").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_eliminar_galeria = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarGaleria").modal("show");
    })
}

var crear_galeria = function() {

    $("#formCrearGaleria").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formCrearGaleria')[0]);
        $.ajax({
            url: "controller/galeria.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableGaleria").DataTable().ajax.reload();
                    $("#formCreargaleria").trigger('reset');
                    $("#modalCrearGaleria").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var eliminar_galeria = function() {

    $("#formEliminarGaleria").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/galeria.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableGaleria").DataTable().ajax.reload();
                    $("#formEliminarGaleria").trigger('reset');
                    $("#modalEliminarGaleria").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var listar_categorias = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const auto = urlParams.get('auto');
    var table_categorias = $("#dataTableCategorias").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/categorias.php",
            method: "POST",
            data: function(d) {
                // Crea el objeto con los datos a enviar en el cuerpo
                var bodyData = {
                    opcion: 'listar_categorias',
                    auto
                    // Agrega otros parámetros según sea necesario
                };

                // Convierte el objeto en una cadena JSON
                var jsonData = JSON.stringify(bodyData);

                // Agrega la cadena JSON al cuerpo de la solicitud
                d.data = jsonData;

                // Retornar el objeto modificado
                return d;
            }
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] }
        ],
        columns: [
            { data: "id" },
            { data: "uuid" },
            { data: "categoria" },
            {
                data: "cover",
                render: function(data, type, row) {
                    return `<center><img src='../assets/images/categorias/${data}'></center>`;
                }
            },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Configurar' class='configurar mr-1 text-primary'><i class='fas fa-cog fa-lg'></i></a><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });


    data_editar_categoria("#dataTableCategorias tbody", table_categorias);
    data_configurar_categoria("#dataTableCategorias tbody", table_categorias);
    data_eliminar_categoria("#dataTableCategorias tbody", table_categorias);


    $("#dataTableCategorias").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_editar_categoria = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id_categoria").val(data.id);
        $("#categoria").val(data.categoria);
        $("#archivo_categoria").val(data.cover);
        $("#modalEditarCategoria").modal("show");
    })
}

var data_configurar_categoria = function(tbody, table) {
    $(tbody).on("click", ".configurar", function() {
        var data = table.row($(this).parents("tr")).data();
        window.location = 'main?module=autopartes&categoria=' + data.uuid;
    })
}

var data_eliminar_categoria = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarCategoria").modal("show");
    })
}

var crear_categoria = function() {

    $("#formCrearCategoria").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formCrearCategoria')[0]);
        $.ajax({
            url: "controller/categorias.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableCategorias").DataTable().ajax.reload();
                    $("#formCrearCategoria").trigger('reset');
                    $("#modalCrearCategoria").modal("hide");

                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var editar_categoria = function() {

    $("#formEditarCategoria").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formEditarCategoria')[0]);
        $.ajax({
            url: "controller/categorias.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);

                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableCategorias").DataTable().ajax.reload();
                    $("#formEditarCategoria").trigger('reset');
                    $("#modalEditarCategoria").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var eliminar_categoria = function() {

    $("#formEliminarCategoria").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/categorias.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableCategorias").DataTable().ajax.reload();
                    $("#formEliminarCategoria").trigger('reset');
                    $("#modalEliminarCategoria").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

var listar_colores = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const module = urlParams.get('module');
    let uuid = '';
    if (module === 'configurar-color-autoparte') {
        uuid = urlParams.get('autoparte');
    } else {
        uuid = urlParams.get('auto');
    }


    var table_colores = $("#dataTableColores").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/colores.php",
            method: "POST",
            data: function(d) {
                // Crea el objeto con los datos a enviar en el cuerpo
                var bodyData = {
                    opcion: 'listar_colores',
                    auto: uuid
                        // Agrega otros parámetros según sea necesario
                };

                // Convierte el objeto en una cadena JSON
                var jsonData = JSON.stringify(bodyData);

                // Agrega la cadena JSON al cuerpo de la solicitud
                d.data = jsonData;

                // Retornar el objeto modificado
                return d;
            },
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] }

        ],
        columns: [
            { data: "id" },
            { data: "uuid" },
            { data: "color" },
            {
                data: "cover",
                render: function(data, type, row) {
                    return `<center><img src='../assets/images/colores/${data}'></center>`;
                }
            },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Configurar' class='configurar mr-1 text-primary'><i class='fas fa-cog fa-lg'></i></a><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_editar_color("#dataTableColores tbody", table_colores);
    data_configurar_color("#dataTableColores tbody", table_colores);
    data_eliminar_color("#dataTableColores tbody", table_colores);

    $("#dataTableColores").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};
var data_editar_color = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#color").val(data.color);
        $("#archivo").val(data.cover);
        $("#modalEditarColor").modal("show");
    })
}

var data_configurar_color = function(tbody, table) {
    $(tbody).on("click", ".configurar", function() {
        var data = table.row($(this).parents("tr")).data();
        window.location = 'main?module=configurar-color&color=' + data.uuid;
    })
}

var data_eliminar_color = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarColor").modal("show");
    })
}

var crear_color = function() {

    $("#formCrearColor").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formCrearColor')[0]);
        $.ajax({
            url: "controller/colores.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableColores").DataTable().ajax.reload();
                    $("#formCrearColor").trigger('reset');
                    $("#modalCrearColor").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })
    })

}

var editar_color = function() {

    $("#formEditarColor").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formEditarColor')[0]);
        $.ajax({
            url: "controller/colores.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableColores").DataTable().ajax.reload();
                    $("#formEditarColor").trigger('reset');
                    $("#modalEditarColor").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })
    })

}

var eliminar_color = function() {

    $("#formEliminarColor").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/colores.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableColores").DataTable().ajax.reload();
                    $("#formEliminarColor").trigger('reset');
                    $("#modalEliminarColor").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}

const listar_imagenes = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const color = urlParams.get('color');
    $.ajax({
        url: 'controller/imagenes.php',
        method: 'POST',
        data: { opcion: 'listar_imagenes', color },
        beforeSend: function() {
            Notiflix.Block.Pulse('.card-loading');
        },
        complete: function() {
            Notiflix.Block.Remove('.card-loading');
        },
        success: function(response) {
            const data = JSON.parse(response);
            let html = ``;
            if (data.length === 0) {
                html = `<p>No haz agregado imágenes aún.</p>`
            } else {
                html = html + `<h5 class="card-title">Imagenes</h5><form id='formOrdenar'><div class="row">`;


                data.forEach(imagen => {

                    html = html + `<div class="col-md-2">
                                <img class='img-fluid' src="../assets/images/autopartes/${imagen.imagen}" alt="${imagen.imagen}">
                            </div>`;
                })

            }
            html = html + `</div>
                </form>`;
            console.log(html);
            $("#contenedor_imagenes").html(html);
        }
    })
}

//Dropzone 
const dropzoneElement = document.querySelector('#miDropzone');

const activarDropzone = function() {
    localStorage.removeItem("imagenes");
    var miDropzone = new Dropzone("#miDropzone", {
        url: "./upload.php",
        maxFilesize: 5,
        maxFiles: 12,
        dictDefaultMessage: "Arrastra archivos aquí para subirlos, puedes subir hasta 12 fotos.",
        acceptedFiles: ".jpeg,.jpg,.png,.pdf",
        renameFile: function(file) {
            var numeroAleatorio = Math.floor(Math.random() * 101);
            if (typeof(Storage) !== "undefined") {
                var datosGuardados = localStorage.getItem("imagenes");
                var imagenes = datosGuardados ? JSON.parse(
                    datosGuardados) : [];
                imagenes.push(numeroAleatorio + "-" + file.lastModified + "-" + file.name);
                localStorage.setItem("imagenes", JSON.stringify(
                    imagenes));
            } else {
                console.log(
                    "El navegador no admite el almacenamiento local.");
            }
            return numeroAleatorio + "-" + file.lastModified + "-" + file
                .name;
        }
    });
}

const subir = function() {
    $('#subir').click(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const color = urlParams.get('color');
        dropzoneElement.dropzone.processQueue();
        $.ajax({
            url: "controller/imagenes.php",
            method: "POST",
            data: { opcion: "subir_imagenes", color, imagenes: localStorage.getItem("imagenes") },
            beforeSend: function() {
                Notiflix.Block.Pulse('.card-subir-loading');
            },
            complete: function() {
                Notiflix.Block.Remove('.card-subir-loading');
            },
            success: function(response) {

                listar_imagenes();
                localStorage.removeItem("imagenes");
                dropzoneElement.dropzone.removeAllFiles();
                dropzoneElement.dropzone.destroy();
                activarDropzone();

            }
        })


    });
};

const limpiar = function() {

    $("#limpiar").click(function() {
        localStorage.removeItem("imagenes");
        dropzoneElement.dropzone.removeAllFiles();
        dropzoneElement.dropzone.destroy();
        activarDropzone();
    })
}

var listar_autopartes = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const categoria = urlParams.get('categoria');
    const padre_id = (urlParams.get('padre_id')) ? urlParams.get('padre_id') : "";
    var table_autopartes = $("#dataTableAutopartes").DataTable({
        buttons: ["pdf"],
        aLengthMenu: [
            [10, 30, 50, -1],
            [10, 30, 50, "Todo"],
        ],
        destroy: true,
        iDisplayLength: 10,
        ajax: {
            url: "controller/autopartes.php",
            method: "POST",
            data: function(d) {
                // Crea el objeto con los datos a enviar en el cuerpo
                var bodyData = {
                    opcion: 'listar_autopartes',
                    categoria,
                    padre_id
                    // Agrega otros parámetros según sea necesario
                };

                // Convierte el objeto en una cadena JSON
                var jsonData = JSON.stringify(bodyData);

                // Agrega la cadena JSON al cuerpo de la solicitud
                d.data = jsonData;

                // Retornar el objeto modificado
                return d;
            },
        },
        aoColumnDefs: [
            { bSearchable: false, bVisible: false, aTargets: [0] },
            { bSearchable: false, bVisible: false, aTargets: [5] },
            { bSearchable: false, bVisible: false, aTargets: [6] },
            { bSearchable: false, bVisible: false, aTargets: [7] },
            { bSearchable: false, bVisible: false, aTargets: [8] },
            { bSearchable: false, bVisible: false, aTargets: [9] },

        ],
        columns: [
            { data: "id" },
            { data: "uuid" },
            { data: "autoparte" },
            {
                data: "stock",
                render: function(data, type, row) {
                    if (data === '1') {
                        return `<center>SI</center>`;
                    } else {
                        return `<center>NO</center>`;
                    }
                }
            },
            {
                data: "cover",
                render: function(data, type, row) {
                    return `<center><img src='../assets/images/autopartes/${data}'></center>`;
                }
            },
            { data: "color_uuid" },
            { data: "categoria_uuid" },
            { data: "tipo" },
            { data: "detalles" },
            { data: "descgeneral" },
            {
                defaultContent: "<div style='cursor:pointer;' class='d-flex justify-content-center'><a title='Editar' class='editar mr-1 text-success'><i class='fas fa-edit fa-lg'></i></a><a title='Configurar' class='configurar mr-1 text-primary'><i class='fas fa-cog fa-lg'></i></a><a title='Eliminar' class='eliminar text-danger' ><i class='fas fa-trash fa-lg'></i></a></div>",
            },
        ],

        language: esp,
    });

    data_editar_autoparte("#dataTableAutopartes tbody", table_autopartes);
    data_configurar_autoparte("#dataTableAutopartes tbody", table_autopartes);
    data_eliminar_autoparte("#dataTableAutopartes tbody", table_autopartes);

    $("#dataTableAutopartes").each(function() {
        var datatable = $(this);
        // SEARCH - Add the placeholder for Search and Turn this into in-line form control
        var search_input = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_filter] input");
        search_input.attr("placeholder", "Buscar");
        search_input.removeClass("form-control-sm");
        // LENGTH - Inline-Form control
        var length_sel = datatable
            .closest(".dataTables_wrapper")
            .find("div[id$=_length] select");
        length_sel.removeClass("form-control-sm");
    });

};

var data_editar_autoparte = function(tbody, table) {
    $(tbody).on("click", ".editar", function() {
        var data = table.row($(this).parents("tr")).data();
        console.log(data)
        $(".id").val(data.id);
        $("#autoparte").val(data.autoparte);
        $("#stock").val(data.stock);
        $("#archivo_autoparte").val(data.cover);
        $("#tipo").val(data.tipo);
        tinymce.get('detalles').setContent(data.detalles)
        tinymce.get('descgeneral').setContent(data.descgeneral)
        $.ajax({
            url: 'controller/colores.php',
            method: 'POST',
            data: { opcion: 'listar_colores', auto: data.uuid },
            success: function(response) {

                const colores = JSON.parse(response);
                console.log(colores);
                let html = `<option value=''>Seleccione un color</option>`;
                colores['data'].forEach((color) => {
                    console.log(color);
                    html = html + `<option value='${color.uuid}'>${color.color}</option>`;
                })

                $("#color").html(html);
                $("#color").val(data.color_uuid);
            }
        });
        $("#modalEditarAutoparte").modal("show");
    })
}

var data_configurar_autoparte = function(tbody, table) {
    $(tbody).on("click", ".configurar", function() {
        var data = table.row($(this).parents("tr")).data();
        console.log(data);
        if (data.tipo === "producto") {
            window.location = 'main?module=configurar-color-autoparte&autoparte=' + data.uuid;
        } else {
            window.location = 'main?module=autopartes&categoria=' + data.categoria_uuid + '&padre_id=' + data.uuid;
        }

    })
}

var data_eliminar_autoparte = function(tbody, table) {
    $(tbody).on("click", ".eliminar", function() {
        var data = table.row($(this).parents("tr")).data();
        $(".id").val(data.id);
        $("#modalEliminarAutoparte").modal("show");
    })
}

var crear_autoparte = function() {
    
    $("#formCrearAutoparte").submit(function(e) {
        e.preventDefault();
        const urlParams = new URLSearchParams(window.location.search);
        const padre_id = (urlParams.get('padre_id')) ? urlParams.get('padre_id') : "";
        const formData = new FormData($('#formCrearAutoparte')[0]);
        formData.append("padre_id", padre_id)
        $.ajax({
            url: "controller/autopartes.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableAutopartes").DataTable().ajax.reload();
                    $("#formCrearAutoparte").trigger('reset');
                    $("#modalCrearAutoparte").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })

    })

}

var editar_autoparte = function() {

    $("#formEditarAutoparte").submit(function(e) {
        e.preventDefault();
        const formData = new FormData($('#formEditarAutoparte')[0]);
        formData.append('descgeneralHtml',tinymce.get('descgeneral').getContent())
        formData.append('detallesHtml',tinymce.get('detalles').getContent())
        $.ajax({
            url: "controller/autopartes.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            complete: function() {
                Notiflix.Block.Remove('.modal-content');
            },
            success: function(response) {
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableAutopartes").DataTable().ajax.reload();
                    $("#formEditarAutoparte").trigger('reset');
                    $("#modalEditarAutoparte").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }
            }
        })
    })

}

var eliminar_autoparte = function() {

    $("#formEliminarAutoparte").submit(function(e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
            url: "controller/autopartes.php",
            method: "POST",
            data: data,
            beforeSend: function() {
                Notiflix.Block.Pulse('.modal-content');
            },
            success: function(response) {
                Notiflix.Block.Remove('.modal-content');
                var response = JSON.parse(response);
                if (response.status == "success") {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    })

                    $("#dataTableAutopartes").DataTable().ajax.reload();
                    $("#formEliminarAutoparte").trigger('reset');
                    $("#modalEliminarAutoparte").modal("hide");


                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    })
                }

            }
        })
    })

}




// TRADUCCIÓN DEL DATATABLE

var esp = {
    sProcessing: "Procesando...",
    search: "",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
    },
    oAria: {
        sSortAscending: ": Activar para ordenar la columna de manera ascendente",
        sSortDescending: ": Activar para ordenar la columna de manera descendente",
    },
};