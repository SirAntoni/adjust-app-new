$(function() {
    login();
    listar_marcas();
    listar_tipos();
    listar_modelos();
    listar_anios();
    buscar();
    obtener_auto();
    localStorage.removeItem('fullscreen');
    filtrar_categorias()
    filtrar_subcategorias()
    reset_categorias()
})

const filtrar_categorias = () => {
    $('#btnCategorias').on('click',function(){
        const data = $('#textCategorias').val();
        obtener_auto(data)
    })
}

const filtrar_subcategorias = () => {
    $('#btnSubcategorias').on('click',function(){
        const data = $('#textSubcategorias').val();
        //obtener_auto(data)
    })
}


const reset_categorias = () => {
    $('#btnResetCategorias').on('click',function(){
        obtener_auto()
    })
}

const login = () => {

    $("#login").submit(function(e) {

        e.preventDefault();
        const data = $(this).serialize();
        const button = document.getElementById('entrar');

        $.ajax({
            url: 'administrador/controller/negocios.php',
            method: 'POST',
            data: data,
            beforeSend: function() {
                button.disabled = true;
            },
            success: function(response) {
                console.log(response)
                button.disabled = false;
                var response = JSON.parse(response);
                if (response.status == "error") {

                    Swal.fire(
                        'Opps Ocurrió un error!!',
                        response.message,
                        'error'
                    )

                } else if (response.status == "success") {

                    $("#login").trigger('reset');
                    window.location = response.url;

                } else {
                    Swal.fire(
                        'Opps Ocurrió un error!!',
                        'Hubo un error en el servidor. Contactate con el administrador del sistema',
                        'success',
                    );
                }
            }

        })

    })
}

const listar_marcas = () => {

    $.ajax({

        url: 'administrador/controller/frontend',
        method: 'POST',
        data: { opcion: 'listar_marcas' },
        success: function(response) {
            const data = JSON.parse(response);
            let html = '<option value="">Seleccione una opción</option>';
            data.forEach((element) => {
                html += `<option value="${element['id']}">${element['marca']}</option>`;
            })

            $("#marcas").html(html);

        }

    })

}

const listar_tipos = () => {

    $.ajax({

        url: 'administrador/controller/frontend',
        method: 'POST',
        data: { opcion: 'listar_tipos' },
        success: function(response) {

            const data = JSON.parse(response);
            let html = '<option value="">Seleccione una opción</option><option value="todos">Todos</option>';
            data.forEach((element) => {
                html += `<option value="${element['id']}">${element['tipo']}</option>`;
            })

            $("#tipos").html(html);

        }

    })

}

const listar_modelos = () => {

    $("#marcas").change(function() {

        $("#anios").html('<option value="">Selecciona una opcion</option>');
        const marca = $(this).val();
        const tipo = $('#tipos').val();

        $.ajax({

            url: 'administrador/controller/frontend',
            method: 'POST',
            data: { opcion: 'listar_modelos', marca, tipo },
            success: function(response) {

                const data = JSON.parse(response);
                let html = '<option value="">Seleccione una opción</option>';
                data.forEach((element) => {
                    html += `<option value="${element['id']}">${element['modelo']}</option>`;
                })
                $("#modelos").html(html);

            }

        })

    })

    $("#tipos").change(function() {

        $("#anios").html('<option value="">Selecciona una opción</option>');
        const marca = $("#marcas").val();
        const tipo = $(this).val();

        $.ajax({

            url: 'administrador/controller/frontend',
            method: 'POST',
            data: { opcion: 'listar_modelos', marca, tipo },
            success: function(response) {

                const data = JSON.parse(response);
                let html = '<option value="">Seleccione una opción</option>';
                data.forEach((element) => {
                    html += `<option value="${element['id']}">${element['modelo']}</option>`;
                })
                $("#modelos").html(html);

            }

        })

    })

}

const listar_anios = () => {

    $("#modelos").change(function() {

        const opcion = 'listar_anios';
        const marca = $("#marcas").val();
        const tipo = $("#tipos").val();
        const modelo = $("#modelos").val();
        const body = {
            opcion,
            marca,
            tipo,
            modelo
        }

        console.log(body);

        $.ajax({
            url: 'administrador/controller/frontend',
            method: 'POST',
            data: body,
            success: function(response) {
                const data = JSON.parse(response);
                let listar_anios = [];
                for (let autos of data) {
                    for (let anio of autos) {
                        listar_anios.push(anio);
                    }
                }
                let html = '<option value="">Seleccione una opción</option>';
                listar_anios.forEach((element) => {
                    html += `<option value="${element['auto_uuid']}">${element['anio']}</option>`;
                })
                $("#anios").html(html);
            }
        })

    })
}

const buscar = function() {
    $('#form-buscar').submit(function(e) {
        e.preventDefault();
        const data = $(this).serialize();

        $.ajax({
            url: 'administrador/controller/frontend',
            method: 'POST',
            data: data,
            success: function(response) {
                const data = JSON.parse(response);
                console.log(data);
                if (data.length > 0) {
                    let html = ``;

                    data.forEach((element) => {
                        html = html + `<tr><td>${element.nombre}</td><td class='text-center' width='50px' ><a href='detalle?auto=${element.uuid}' class='btn btn-primary'>Ver</a></td></tr>`;
                    })

                    $('#resultado').html(html);

                    $('#modalBuscar').modal('show');
                } else {
                    Swal.fire(
                        'Sin resultados',
                        'No se encontraron resultados',
                        'error'
                    )
                }
            }

        })

    })
}

function cambiarColor(color) {
    $.ajax({
        url: 'administrador/controller/frontend',
        method: 'POST',
        data: { opcion: 'obtener_auto_color', color },
        success: function(response) {

            const data = JSON.parse(response);
            let html = ``;
            data.forEach(imagen => {
                html = html + `<img data-src="assets/images/autopartes/${imagen.imagen}" height='100%'>`;
            });

            console.log(html);
            html = html + '<div id="loader"></div>';
            $("#auto360").html('<div id="circlrDiv"></div>');
            $("#circlrDiv").html(html);

            var crl = circlr('circlrDiv', {
                loader: 'loader'
            });
        }
    })
}

function mostrarAutoparte(autoparte) {
    $.ajax({
        url: 'administrador/controller/frontend',
        method: 'POST',
        data: { opcion: 'mostrar_autoparte', autoparte },
        success: function(response) {

            const data = JSON.parse(response);
            if (data.autoparte.tipo === "subcategoria") {
                var titulo = document.getElementById("subautoparte_seccion_titulo");
                var cotenido = document.getElementById("subautoparte_seccion_contenido");
                cotenido.classList.remove("d-none");
                titulo.classList.remove("d-none");

                $.ajax({
                    url: 'administrador/controller/frontend',
                    method: 'POST',
                    data: { opcion: 'obtener_subautopartes', padre_id: data.autoparte.uuid },
                    success: function(response) {
                        const data = JSON.parse(response);
                        console.log(data);
                        let html = ``;
                        data.forEach(autoparte => {
                            html = html + `<div class="carousel-cell"><img src="assets/images/autopartes/${autoparte.cover}" onclick="mostrarAutoparte('${autoparte.uuid}')" alt="${autoparte.autoparte}"></div>`;
                        })

                        $("#subcarousel_autopartes").flickity('destroy');
                        $("#subcarousel_autopartes").html(html);
                        $("#subcarousel_autopartes").flickity({
                            contain: true
                        });
                    }
                })

            } else {

                var titulo = document.getElementById("subautoparte_seccion_titulo");
                var contenido = document.getElementById("subautoparte_seccion_contenido");
                titulo.className = "col-md-12 titulo_categoria select_accesorios d-none"
                contenido.className = "col-md-12 select_accesorios d-none"

                let detalle_html = "";
                let descgeneral = "";
                
                if(data.autoparte.descgeneral != ""){
                    descgeneral = `<h1>Descripción</h1><p>${data.autoparte.descgeneral}</p>` 
                }


                if (data.autoparte.t1 !== "") {
                    detalle_html = `<div class="info-detalle py-3">
                    <h4>${data.autoparte.t1}</h4>
                    <p>${data.autoparte.d1}</p>
                </div>
                <div class="info-detalle py-3">
                <h4>${data.autoparte.t2}</h4>
                <p>${data.autoparte.d2}</p>
                </div>
                <div class="info-detalle py-3">
                <h4>${data.autoparte.t3}</h4>
                <p>${data.autoparte.d3}</p>
                </div>`;
                }



                $("#detalles-producto").html(detalle_html)
                $("#descgeneral").html(descgeneral)
                $("#accesorio").html(data.autoparte.autoparte)
                $("#stock").html((data.autoparte.stock === '1') ? 'Si' : 'No');
                let html = ``;
                data.imagenes.forEach(imagen => {
                    html = html + `<img data-src="assets/images/autopartes/${imagen.imagen}">`;
                });
                let html_colores = ``;
                data.colores.forEach(color => {
                    html_colores = html_colores + `<div class="color" onclick="cambiarColor('${color.uuid}')" data-toggle="tooltip" data-placement="top" title="${color.color}"><img
                src="assets/images/colores/${color.cover}" alt=""></div>`;
                })

                html_colores = html_colores + `<div class='fullScreen' onclick="fullScreen()" data-toggle="tooltip" data-placement="top" title="Pantalla Completa"><i class="fas fa-expand fa-lg"></i></div>`;



                $("#auto360").html('<div id="circlrDiv"></div>');
                $("#circlrDiv").html(html);
                $("#detalle_colores").html(html_colores);
                $('[data-toggle="tooltip"]').tooltip()
                var crl = circlr('circlrDiv', {
                    loader: 'loader'
                });
            }


        }
    })
}

function obtenerAutoparte(categoria, filtro = '') {


    const localCategoria = localStorage.setItem('categoria',categoria)
    //alert(local.getItem('categoria'))

    var titulo = document.getElementById("autoparte_seccion_titulo");
    var cotenido = document.getElementById("autoparte_seccion_contenido");
    cotenido.classList.remove("d-none");
    titulo.classList.remove("d-none");

    $.ajax({
        url: 'administrador/controller/frontend',
        method: 'POST',
        data: { opcion: 'obtener_autopartes', categoria },
        success: function(response) {
            const data = JSON.parse(response);
            let html = ``;

            const data2 = data.filter(autoparte => {
                if(filtro === '') return autoparte.autoparte

                return autoparte.autoparte === filtro
            })

            data2.forEach(autoparte => {
                html = html + `<div class="carousel-cell"><img src="assets/images/autopartes/${autoparte.cover}" onclick="mostrarAutoparte('${autoparte.uuid}')" alt="${autoparte.autoparte}"><p class='text-center mt-2 text-white'>${autoparte.autoparte}</p></div>`;
            })

            $("#carousel_autopartes").flickity('destroy');
            $("#carousel_autopartes").html(html);
            $("#carousel_autopartes").flickity({
                contain: true
            });
        }
    })

}

function fullScreen() {



    if (!localStorage.getItem('fullscreen')) localStorage.setItem('fullscreen', 'false');
    let fullscreen = localStorage.getItem('fullscreen');
    let area = document.getElementById('auto360');

    if (fullscreen == 'false') {
        area.style.width = '100%';
        area.style.height = '100%';
        $(".fullScreen").html('<i class="fas fa-compress fa-lg"></i>');
        localStorage.setItem('fullscreen', true);
    } else {
        area.style.width = '500px';
        area.style.height = '400px';
        $(".fullScreen").html('<i class="fas fa-expand fa-lg"></i>');
        localStorage.setItem('fullscreen', false);
    }

    $('body [data-toggle="tooltip"]').tooltip('dispose');
    $('body').tooltip({ selector: '[data-toggle=tooltip]' });

}

const obtener_auto = function(filtro = '') {
    const urlParams = new URLSearchParams(window.location.search);
    const auto = urlParams.get('auto');
    const module = urlParams.get('module');
    const validar = window.location.pathname
    if (!validar.includes('galeria')) {
        console.log('no es galeria');
        $.ajax({
            url: 'administrador/controller/frontend',
            method: 'POST',
            data: { opcion: 'obtener_auto', auto },
            success: function(response) {

                const data = JSON.parse(response);
                $("#detalle_nombre_auto").html(data.auto.nombre);
                let html = ``;
                data.imagenes.forEach(imagen => {
                    html = html + `<img data-src="assets/images/autopartes/${imagen.imagen}" height='100%'>`;
                });
                let html_colores = ``;
                data.colores.forEach(color => {
                    html_colores = html_colores + `<div class="color" onclick="cambiarColor('${color.uuid}')" data-toggle="tooltip" data-placement="top" title="${color.color}"><img
                    src="assets/images/colores/${color.cover}" alt=""></div>`;
                })

                let html_categorias = ``;
                let { categorias } = data
                const categorias2 = categorias.filter(x => {
                    if(filtro == '') return x.categoria
                    return x.categoria === filtro
                })

                if(categorias2.length === 0) return Swal.fire(
                    'Sin resultados!!',
                    'No se encontrarón resultados para esta busqueda',
                    'error'
                )

                categorias2.forEach(categoria => {
                    html_categorias = html_categorias + `<div class="carousel-cell"><img src="assets/images/categorias/${categoria.cover}" onclick="obtenerAutoparte('${categoria.uuid}')" alt="${categoria.categoria}"><p class='text-center mt-2 text-white'>${categoria.categoria}</p></div>`;
                })

                html_colores = html_colores + `<div class='fullScreen' onclick="fullScreen()" data-toggle="tooltip" data-placement="top" title="Pantalla Completa"><i class="fas fa-expand fa-lg"></i></div>`;

                $("#carousel_categorias").flickity('destroy');
                $("#carousel_categorias").html(html_categorias);
                $("#carousel_categorias").flickity({
                    contain: true
                });

                $("#auto360").html('<div id="circlrDiv"></div>');
                $("#circlrDiv").html(html);
                $("#detalle_colores").html(html_colores);
                $('[data-toggle="tooltip"]').tooltip()
                var crl = circlr('circlrDiv', {
                    loader: 'loader'
                });

            }
        })
    }




}