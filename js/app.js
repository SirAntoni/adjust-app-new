$(function() {

    cargar_web();
    cargar_redes();
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
            const html = `<a class="mx-2" href="${facebook}" target='_blank'><i class="fab fa-facebook-f"></i></a>
            <a class="mx-2" href="${instagram}" target='_blank'><i class="fab fa-instagram"></i></a>
            <a class="mx-2" href="${tiktok}" target='_blank'><i class="fab fa-tiktok"></i></a>
            <a class="mx-2" href="${youtube}" target='_blank'><i class="fab fa-youtube"></i></a>`;

            $('#redes-sociales').html(html);
        }

    })
}