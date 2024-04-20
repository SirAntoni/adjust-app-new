$(function() {

    cargar_web();
    cargar_redes();
    cargar_filtros();
    cargar_imagenes();
    cargar_ultimo_registro();
    obtener_negocio();
    obtener_fondos();

})

var url = new URL(window.location.href);
var params = new URLSearchParams(url.search);

const obtener_fondos = async () => {

    $.ajax({
        url: 'administrador/controller/frontend',
        method: 'POST',
        data: { opcion: 'obtener_fondo', negocio: params.get('negocio')  },
        success: function(response) {
            const data = JSON.parse(response);
            const mastheadElement = document.querySelector(".masthead");
            const mastheadElementGaleria = document.querySelector(".masthead-galeria");

            if(mastheadElement){
                mastheadElement.style.background = `linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url("./assets/images/bg/${data.fondo_home}")`;
            }

            if(mastheadElementGaleria){
                mastheadElementGaleria.style.background = `linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url("./assets/images/bg/${data.fondo_galeria}")`;
            }

           // mastheadElementGaleria.style.background = `url("./assets/images/bg/${data.fondo_home}")`
        }
    })
}

const obtener_negocio = function() {

    $.ajax({
        url: 'administrador/controller/frontend',
        method: 'POST',
        data: { opcion: 'obtener_negocio' , negocio: params.get('negocio')},
        success: function(response) {

            const data = JSON.parse(response);
            const wsp = `<a href='https://api.whatsapp.com/send?phone=${data.telefono}&text=Hola,%20necesito%20sus%20informacion' title="Whatsapp" target="_blank" style="cursor:pointer;">
            <img src="assets/images/wp.png" alt="Whatsapp">
        </a>`;
            $(".cont-multichat").html(wsp)

            document.title = `${data.razon_social} - ${new Date().getFullYear()}`

        }
    })

}

const cargar_filtros = function() {

    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_filtros', negocio: params.get('negocio') },
        success: function(response) {
            const data = JSON.parse(response);

            let htmlHead = `<li><a class="categories text-white active" data-filter="*">Todo</a></li>`;
            data.forEach((filtro) => {
                let data_filter = filtro.filtro
                data_filter = data_filter.replace(/\s+/g, '-')
                console.log(data_filter)
                htmlHead = htmlHead + `<li><a class="categories text-white" data-filter=".${data_filter}">${filtro.filtro}</a></li>`;
            })
            $('#filter').html(htmlHead);
        }
    })

}

const cargar_imagenes = function() { 

    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_imagenes', negocio: params.get('negocio') },
        success: function(response) {
            const data = JSON.parse(response);
            let html = ``;
            data.forEach((imagen) => {
                let filtro = imagen.filtro
                filtro = filtro.replace(/\s+/g, '-')
                html = html + `<div class="col-lg-4 p-4 ${filtro}">
                <div class="item-box">
                    <a class="mfp-image" href="https://www.bootdey.com/image/800x540/D3D3D3/000000"
                        title="${imagen.titulo}">
                        <img class="item-container img-fluid"
                            src="./assets/img/${imagen.imagen}"
                            alt="work-img">
                        <div class="item-mask">
                            <div class="item-caption">
                                <p class="text-dark mb-0">${imagen.titulo}</p>
                                <h6 class="text-dark mt-1 text-uppercase">${imagen.descripcion}</h6>
                            </div>
                        </div>
                    </a>
                </div>
            </div>`;
            })

            $('#imagenes').html(html);
        }
    })

}

const cargar_web = function() {

    document.getElementById('organizador').setAttribute('href', 'organizador' + '?negocio=' + params.get('negocio'));
    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_web', negocio: params.get('negocio') },
        success: function(response) {
            const data = JSON.parse(response);

            if (data.status === 'error') {
                window.location = './';
            } else {

                let mapa = data.mapa.replace('width="600"', 'width="100%"');

                $("#webLogo").html(`<img width=200px' src="./assets/img/${data.logo}" alt="">`);
                $("#webSlogan").html(data.slogan);
                $("#webNosotros").html(data.nosotros);
                $("#webMision").html(data.mision);
                $("#webVision").html(data.vision);
                $("#webDireccion").html(data.direccion);
                $("#webEmail").html(data.email);
                $("#mapa").html(mapa);
                $("#webTelefono").html(data.telefono);
                $("#webNosotrosImg").html(`<img class="img-fluid mb-3 mb-lg-0" src="assets/img/${data.nosotrosImg}"
                alt="..." />`);
                $("#webMisionImg").html(`<img class="img-fluid" src="assets/img/${data.misionImg}" alt="..." />`);
                $("#webVisionImg").html(`<img class="img-fluid" src="assets/img/${data.visionImg}" alt="..." />`);
            }

        }
    })

}

const cargar_ultimo_registro = function() {

    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);

    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_ultimo_registro', negocio: params.get('negocio') },
        success: function(response) {
            const data = JSON.parse(response);

            if (data.status === 'error') {
                window.location = './';
            } else {
                console.log(data);
                document.getElementById('organizador').setAttribute('href', 'organizador' + '?negocio=' + params.get('negocio') + '&auto=' + data.uuid);
            }

        }
    })

}


const cargar_redes = function() {
    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);
    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_redes', negocio: params.get('negocio') },
        success: function(response) {
            const data = JSON.parse(response);
            const facebook = (data.facebook === '') ? '#!' : data.facebook;
            const instagram = (data.instagram === '') ? '#!' : data.instagram;
            const tiktok = (data.tiktok === '') ? '#!' : data.tiktok;
            const youtube = (data.youtube === '') ? '#!' : data.youtube;
            const html = `<a class="mx-2 facebook" href="${facebook}" target='_blank'><i class="fab fa-facebook-f"></i></a>
            <a class="mx-2 instagram" href="${instagram}" target='_blank'><i class="fab fa-instagram"></i></a>
            <a class="mx-2 tiktok" href="${tiktok}" target='_blank'><i class="fab fa-tiktok"></i></a>
            <a class="mx-2 youtube" href="${youtube}" target='_blank'><i class="fab fa-youtube"></i></a>`;

            $('#redes-sociales').html(html);
        }

    })
}