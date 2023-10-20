$(function() {

    cargar_web();

})

const cargar_web = function() {

    var url = new URL(window.location.href);
    var params = new URLSearchParams(url.search);

    $.ajax({
        url: 'administrador/controller/frontend.php',
        method: 'POST',
        data: { opcion: 'cargar_web', negocio: params.get('negocio') },
        success: function(response) {
            const data = JSON.parse(response);

            if (data.status === 'error') {
                window.location = './';
            } else {
                $("#webLogo").html(`<img width=200px' src="./assets/img/${data.logo}" alt="">`);
                $("#webSlogan").html(data.slogan);
                $("#webNosotros").html(data.nosotros);
                $("#webMision").html(data.mision);
                $("#webVision").html(data.vision);
                $("#webDireccion").html(data.direccion);
                $("#webEmail").html(data.email);
                $("#webTelefono").html(data.telefono);
                $("#webNosotrosImg").html(`<img class="img-fluid mb-3 mb-lg-0" src="assets/img/${data.nosotrosImg}"
                alt="..." />`);
                $("#webMisionImg").html(`<img class="img-fluid" src="assets/img/${data.misionImg}" alt="..." />`);
                $("#webVisionImg").html(`<img class="img-fluid" src="assets/img/${data.visionImg}" alt="..." />`);
            }

        }
    })

}