var url = new URL(window.location.href);
var params = new URLSearchParams(url.search);


$(function () {

    cargar_web();
    cargar_redes();
    cargar_filtros();
    cargar_ultimo_registro();
    obtener_negocio();
    obtener_fondos();
    filtrar();

    if (params.get('type') !== 'organizador') {
        cargar_imagenes();
    }


})



const obtener_fondos = async () => {

    $.ajax({
        url: 'administrador/controller/frontend',
        method: 'POST',
        data: { opcion: 'obtener_fondo', negocio: params.get('negocio') },
        success: function (response) {
            const data = JSON.parse(response);
            const mastheadElement = document.querySelector(".masthead");
            const mastheadElementGaleria = document.querySelector(".masthead-galeria");


            // Obtener el ancho y alto de la pantalla
            var screenWidth = window.screen.width;
            console.log("fondo home movil: ",data.fondo_home_movil);
            console.log("fondo galeria movil: ",data.fondo_galeria_movil);
            if (screenWidth >= 768) {

                if (mastheadElement) {
                    mastheadElement.style.background = `linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url("./assets/images/bg/${data.fondo_home}")`;
                }

                if (mastheadElementGaleria) {
                    mastheadElementGaleria.style.background = `linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url("./assets/images/bg/${data.fondo_galeria}")`;
                }

            }else{

                if (mastheadElement) {
                    mastheadElement.style.background = `linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url("./assets/images/bg/${data.fondo_home_movil}")`;
                }

                if (mastheadElementGaleria) {
                    mastheadElementGaleria.style.background = `linear-gradient(to bottom, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.7) 75%, #000 100%), url("./assets/images/bg/${data.fondo_galeria_movil}")`;
               }

            }




            // mastheadElementGaleria.style.background = `url("./assets/images/bg/${data.fondo_home}")`
        }
    })
}

const obtener_negocio = function () {

    $.ajax({
        url: 'administrador/controller/frontend',
        method: 'POST',
        data: { opcion: 'obtener_negocio', negocio: params.get('negocio') },
        success: function (response) {

            const data = JSON.parse(response);
            const wsp = `<a href='https://api.whatsapp.com/send?phone=${data.telefono}&text=Hola,%20necesito%20sus%20informacion' title="Whatsapp" target="_blank" style="cursor:pointer;">
            <img src="assets/images/wp.png" alt="Whatsapp">
        </a>`;
            $(".cont-multichat").html(wsp)

            document.title = `${data.razon_social} - ${new Date().getFullYear()}`

        }
    })

}

const cargar_filtros = function () {

    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_filtros', negocio: params.get('negocio') },
        success: function (response) {
            const data = JSON.parse(response);

            let htmlHead = `<li><a class="categories text-white active" data-filter="*">Todo</a></li>`;
            data.forEach((filtro) => {
                htmlHead = htmlHead + `<li><a class="categories text-white" data-filter="${filtro.filtro}">${filtro.filtro}</a></li>`;
            })
            $('#filter').html(htmlHead);
        }
    })

}

const filtrar = () => {
    $(document).on('click', '.categories', function () {
        cargar_imagenes(this.getAttribute('data-filter'))
    })
}

const cargar_imagenes = function (filtro = '*') {
    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_imagenes', negocio: params.get('negocio') },
        success: function (response) {
            const data = JSON.parse(response);
            let html = `<div class="swiper">
            <div class="swiper-wrapper">`
            if (filtro === '*') {
                data.map(x => {
                    html = html + `<div class="swiper-slide"><img src='./assets/img/${x.imagen}'></div>`
                })
            } else {
                data.map(x => {
                    if (x.filtro === filtro) {
                        html = html + `<div class="swiper-slide"><img src='./assets/img/${x.imagen}'></div>`
                    }
                })
            }

            html = html + `</div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-scrollbar"></div>
            </div>`

            $("#imagenes").html(html)

            var swiper = new Swiper(".swiper", {
                slidesPerView: 3,
                spaceBetween: 10,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
            });

        }
    })

}


const cargar_web = function () {

    //document.getElementById('organizador').setAttribute('href', 'organizador' + '?negocio=' + params.get('negocio'));
    //document.getElementById('productos').setAttribute('href', 'organizador' + '?negocio=' + params.get('negocio'));
    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_web', negocio: params.get('negocio') },
        success: function (response) {
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

const cargar_ultimo_registro = function () {

    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);

    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_ultimo_registro', negocio: params.get('negocio') },
        success: function (response) {
            const data = JSON.parse(response);

            if (data.status === 'error') {
                window.location = './';
            } else {
                document.getElementById('organizador').setAttribute('href', 'organizador' + '?negocio=' + params.get('negocio') + '&auto=' + data.uuid + '&type=organizador');
                document.getElementById('productos').setAttribute('href', 'organizador' + '?negocio=' + params.get('negocio') + '&auto=' + data.uuid + '&type=organizador');
            }

        }
    })

}


const cargar_redes = function () {
    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);
    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_redes', negocio: params.get('negocio') },
        success: function (response) {
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