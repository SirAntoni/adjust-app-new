/* =========================
 * Helpers de QueryString / Historial / Marcado
 * ========================= */
function setQueryParam(name, value, { replace = true } = {}) {
  const url = new URL(window.location.href);
  if (value === null || value === undefined || value === '') url.searchParams.delete(name);
  else url.searchParams.set(name, value);
  window.history[replace ? 'replaceState' : 'pushState']({}, '', url);
}

function setManyParams(obj, { replace = true } = {}) {
  const url = new URL(window.location.href);
  Object.entries(obj).forEach(([k, v]) => {
    if (v === null || v === undefined || v === '') url.searchParams.delete(k);
    else url.searchParams.set(k, v);
  });
  window.history[replace ? 'replaceState' : 'pushState']({}, '', url);
}

function getQueryParam(name) {
  return new URLSearchParams(window.location.search).get(name);
}

function getAllParams() {
  const s = new URLSearchParams(window.location.search);
  return Object.fromEntries(s.entries());
}

// Marca activo en un contenedor, buscando por data-uuid en <img>
function markActive({ param, container, activeClass }) {
  const id = getQueryParam(param);
  if (!id) return;
  const $c = $(container);
  $c.find('.' + activeClass).removeClass(activeClass);
  const el = $c.find(`img[data-uuid="${id}"]`).get(0);
  if (el) el.classList.add(activeClass);
}

/* =========================
 * Inicio / Bootstrap
 * ========================= */
$(function () {
  login();
  listar_marcas();
  listar_tipos();
  listar_modelos();
  listar_anios();
  buscar();
  obtener_auto();

  // Puedes resetear fullscreen; NO borres categoria/autoparte o perderás el estado compartible
  localStorage.removeItem('fullscreen');
  // localStorage.removeItem('categoria');
  // localStorage.removeItem('autoparte');

  filtrar_categorias();
  filtrar_subcategorias();
  reset_categorias();
  reset_subcategorias();
  filtrar_subcategorias2();
  reset_subcategorias2();

  // ==== HIDRATAR DESDE URL ====
  const { categoria, autoparte, filtro_cat, filtro_sub } = getAllParams();

  if (categoria) {
    localStorage.setItem('categoria', categoria);
    obtenerAutoparte(null, categoria, filtro_cat || '');
  }
  if (autoparte) {
    localStorage.setItem('autoparte', autoparte);
    mostrarAutoparte(null, autoparte, filtro_sub || '');
  }

  // ==== SOPORTE BACK/FORWARD SIN RECARGA ====
  window.addEventListener('popstate', function () {
    const { categoria, autoparte, filtro_cat, filtro_sub } = getAllParams();

    if (categoria) {
      localStorage.setItem('categoria', categoria);
      obtenerAutoparte(null, categoria, filtro_cat || '');
    } else {
      // opcional: limpiar UI de categoría
    }

    if (autoparte) {
      localStorage.setItem('autoparte', autoparte);
      mostrarAutoparte(null, autoparte, filtro_sub || '');
    } else {
      // opcional: limpiar UI de autoparte
    }
  });
});

/* =========================
 * Filtros / Reset (firmas consistentes)
 * ========================= */
const filtrar_categorias = () => {
  $('#btnCategorias').on('click', function () {
    const data = $('#textCategorias').val();
    obtener_auto(data);
  });
};

const filtrar_subcategorias = () => {
  $('#btnSubcategorias').on('click', function () {
    const data = $('#textSubcategorias').val();
    const categoria = localStorage.getItem('categoria');
    obtenerAutoparte(null, categoria, data);
  });
};

const filtrar_subcategorias2 = () => {
  $('#btnSubcategorias2').on('click', function () {
    const data = $('#textSubcategorias2').val();
    const autoparte = localStorage.getItem('autoparte');
    mostrarAutoparte(null, autoparte, data);
  });
};

const reset_categorias = () => {
  $('#btnResetCategorias').on('click', function () {
    obtener_auto();
    // opcional: limpiar params de filtros
    setManyParams({ filtro_cat: '' }, { replace: true });
  });
};

const reset_subcategorias = () => {
  $('#btnResetSubcategorias').on('click', function () {
    const categoria = localStorage.getItem('categoria');
    obtenerAutoparte(null, categoria, '');
  });
};

const reset_subcategorias2 = () => {
  $('#btnResetSubcategorias2').on('click', function () {
    const autoparte = localStorage.getItem('autoparte');
    mostrarAutoparte(null, autoparte, '');
  });
};

/* =========================
 * Auth / Listados
 * ========================= */
const login = () => {
  $("#login").submit(function (e) {
    e.preventDefault();
    const data = $(this).serialize();
    const button = document.getElementById('entrar');

    $.ajax({
      url: 'administrador/controller/negocios.php',
      method: 'POST',
      data: data,
      beforeSend: function () { button.disabled = true; },
      success: function (response) {
        console.log(response);
        button.disabled = false;
        var response = JSON.parse(response);

        if (response.status == "error") {
          Swal.fire('Opps Ocurrió un error!!', response.message, 'error');
        } else if (response.status == "success") {
          $("#login").trigger('reset');
          window.location = response.url;
        } else {
          Swal.fire('Opps Ocurrió un error!!', 'Hubo un error en el servidor. Contactate con el administrador del sistema', 'success');
        }
      }
    });
  });
};

const listar_marcas = () => {
  $.ajax({
    url: 'administrador/controller/frontend',
    method: 'POST',
    data: {opcion: 'listar_marcas'},
    success: function (response) {
      const data = JSON.parse(response);
      let html = '<option value="">Seleccione una opción</option>';
      data.forEach((element) => { html += `<option value="${element['id']}">${element['marca']}</option>`; });
      $("#marcas").html(html);
    }
  });
};

const listar_tipos = () => {
  $.ajax({
    url: 'administrador/controller/frontend',
    method: 'POST',
    data: {opcion: 'listar_tipos'},
    success: function (response) {
      const data = JSON.parse(response);
      let html = '<option value="">Seleccione una opción</option><option value="todos">Todos</option>';
      data.forEach((element) => { html += `<option value="${element['id']}">${element['tipo']}</option>`; });
      $("#tipos").html(html);
    }
  });
};

const listar_modelos = () => {
  $("#marcas").change(function () {
    $("#anios").html('<option value="">Selecciona una opcion</option>');
    const marca = $(this).val();
    const tipo = $('#tipos').val();

    $.ajax({
      url: 'administrador/controller/frontend',
      method: 'POST',
      data: {opcion: 'listar_modelos', marca, tipo},
      success: function (response) {
        const data = JSON.parse(response);
        let html = '<option value="">Seleccione una opción</option>';
        data.forEach((element) => { html += `<option value="${element['id']}">${element['modelo']}</option>`; });
        $("#modelos").html(html);
      }
    });
  });

  $("#tipos").change(function () {
    $("#anios").html('<option value="">Selecciona una opción</option>');
    const marca = $("#marcas").val();
    const tipo = $(this).val();

    $.ajax({
      url: 'administrador/controller/frontend',
      method: 'POST',
      data: {opcion: 'listar_modelos', marca, tipo},
      success: function (response) {
        const data = JSON.parse(response);
        let html = '<option value="">Seleccione una opción</option>';
        data.forEach((element) => { html += `<option value="${element['id']}">${element['modelo']}</option>`; });
        $("#modelos").html(html);
      }
    });
  });
};

const listar_anios = () => {
  $("#modelos").change(function () {
    const opcion = 'listar_anios';
    const marca = $("#marcas").val();
    const tipo = $("#tipos").val();
    const modelo = $("#modelos").val();
    const body = { opcion, marca, tipo, modelo };

    $.ajax({
      url: 'administrador/controller/frontend',
      method: 'POST',
      data: body,
      success: function (response) {
        const data = JSON.parse(response);
        let listar_anios = [];
        for (let autos of data) for (let anio of autos) listar_anios.push(anio);
        let html = '<option value="">Seleccione una opción</option>';
        listar_anios.forEach((element) => { html += `<option value="${element['auto_uuid']}">${element['anio']}</option>`; });
        $("#anios").html(html);
      }
    });
  });
};

const buscar = function () {
  $('#form-buscar').submit(function (e) {
    e.preventDefault();
    const data = $(this).serialize();

    $.ajax({
      url: 'administrador/controller/frontend',
      method: 'POST',
      data: data,
      success: function (response) {
        const data = JSON.parse(response);
        console.log(data);
        if (data.length > 0) {
          let html = ``;
          data.forEach((element) => {
            html += `<tr><td>${element.nombre}</td><td class='text-center' width='50px' ><a href='detalle?auto=${element.uuid}' class='btn btn-primary'>Ver</a></td></tr>`;
          })
          $('#resultado').html(html);
          $('#modalBuscar').modal('show');
        } else {
          Swal.fire('Sin resultados','No se encontraron resultados','error');
        }
      }
    });
  });
};

/* =========================
 * UI: Colores / Fullscreen
 * ========================= */
function cambiarColor(color) {
  $.ajax({
    url: 'administrador/controller/frontend',
    method: 'POST',
    data: {opcion: 'obtener_auto_color', color},
    success: function (response) {
      const data = JSON.parse(response);
      let html = ``;
      let html_sliders = ``;
      data.forEach(imagen => {
        html += `<img data-src="${set_domain_assets}/assets/images/autopartes/${imagen.imagen}" height='100%'>`;
        html_sliders += `<a id='lcarousel' href="${set_domain_assets}/assets/images/autopartes/${imagen.imagen}" data-lightbox="carousel"></a>`;
      });

      html += '<div id="loader"></div>';
      $('#sliders').html(html_sliders);
      $("#auto360").html('<div id="circlrDiv"></div>');
      $("#circlrDiv").html(html);

      var crl = circlr('circlrDiv', { loader: 'loader' });
    }
  })
}

/* =========================
 * Categorías -> Autopartes (PARAMS + marco)
 * ========================= */
function obtenerAutoparte(elDiv, categoria, filtro = '') {
  // elDiv puede ser null si vienes desde URL/back
  if (elDiv && elDiv.classList) {
    document.querySelectorAll('.active').forEach(d => d.classList.remove('active'));
    elDiv.classList.add('active');
  }

  localStorage.setItem('categoria', categoria);

  // Persistir en URL: categoria y filtro_cat (push cuando cambia categoria, replace al filtrar)
  setManyParams(
    { categoria: categoria || '', filtro_cat: filtro || '' },
    { replace: !categoria } // si hay nueva categoria => push
  );

  const titulo = document.getElementById("autoparte_seccion_titulo");
  const cotenido = document.getElementById("autoparte_seccion_contenido");
  cotenido.classList.remove("d-none");
  titulo.classList.remove("d-none");

  $.ajax({
    url: 'administrador/controller/frontend',
    method: 'POST',
    data: {opcion: 'obtener_autopartes', categoria},
    success: function (response) {
      $('html, body').animate({scrollTop: $(document).height() - $(window).height()}, 'slow');
      const data = JSON.parse(response);
      let html = ``;

      const data2 = data.filter(x => {
        if (filtro === '') return x.autoparte;
        const regex = new RegExp(filtro, "i");
        return regex.test(x.autoparte);
      });

      if (data2.length === 0) {
        return Swal.fire('Sin resultados!!','No se encontrarón resultados para esta busqueda','error');
      }

      data2.forEach(item => {
        html += `<div class="carousel-cell">
          <img data-uuid="${item.uuid}"
               src="${set_domain_assets}/assets/images/autopartes/${item.cover}"
               onclick="mostrarAutoparte(this,'${item.uuid}')"
               alt="${item.autoparte}">
          <p class='text-center mt-2 text-white'>${item.autoparte}</p>
        </div>`;
      });

      $("#carousel_autopartes").flickity('destroy');
      $("#carousel_autopartes").html(html);
      $("#carousel_autopartes").flickity({ contain: true });

      // Remarcar autoparte activa por URL si existiese
      markActive({ param: 'autoparte', container: '#carousel_autopartes', activeClass: 'active3' });
    }
  })
}

/* =========================
 * Autoparte -> Detalle/Subcategorías (PARAMS + marco)
 * ========================= */
function mostrarAutoparte(elDiv, autoparte, filtro = '') {
  // elDiv puede ser null si vienes desde URL/back
  if (elDiv && elDiv.classList) {
    document.querySelectorAll('.active3').forEach(d => d.classList.remove('active3'));
    elDiv.classList.add('active3');
  }

  localStorage.setItem('autoparte', autoparte);

  // Persistir en URL: autoparte y filtro_sub (push al cambiar autoparte, replace al filtrar)
  setManyParams(
    { autoparte: autoparte || '', filtro_sub: filtro || '' },
    { replace: !autoparte }
  );

  $.ajax({
    url: 'administrador/controller/frontend',
    method: 'POST',
    data: {opcion: 'mostrar_autoparte', autoparte},
    success: function (response) {
      const data = JSON.parse(response);

      if (data.autoparte.tipo === "subcategoria") {
        if (elDiv && elDiv.classList) {
          document.querySelectorAll('.active2').forEach(d => d.classList.remove('active2'));
          elDiv.classList.add('active2');
        }

        $('html, body').animate({scrollTop: $(document).height() - $(window).height()}, 'slow');
        const titulo = document.getElementById("subautoparte_seccion_titulo");
        const cotenido = document.getElementById("subautoparte_seccion_contenido");
        cotenido.classList.remove("d-none");
        titulo.classList.remove("d-none");

        $.ajax({
          url: 'administrador/controller/frontend',
          method: 'POST',
          data: {opcion: 'obtener_subautopartes', padre_id: data.autoparte.uuid},
          success: function (response) {
            const data = JSON.parse(response);

            let html = ``;
            const data2 = data.filter(x => {
              if (filtro === '') return x.autoparte;
              const regex = new RegExp(filtro, "i");
              return regex.test(x.autoparte);
            });

            if (data2.length === 0) {
              return Swal.fire('Sin resultados!!','No se encontrarón resultados para esta busqueda','error');
            }

            data2.forEach(item => {
              html += `<div class="carousel-cell">
                <img data-uuid="${item.uuid}"
                     src="${set_domain_assets}/assets/images/autopartes/${item.cover}"
                     onclick="mostrarAutoparte(this,'${item.uuid}')"
                     alt="${item.autoparte}">
                <p class='text-center mt-2 text-white'>${item.autoparte}</p>
              </div>`;
            });

            $("#subcarousel_autopartes").flickity('destroy');
            $("#subcarousel_autopartes").html(html);
            $("#subcarousel_autopartes").flickity({ contain: true });

            // Opcional: remarcar en el carrusel principal cuál autoparte está activa
            markActive({ param: 'autoparte', container: '#carousel_autopartes', activeClass: 'active3' });
          }
        });

      } else {
        document.querySelectorAll('.active3').forEach(d => d.classList.remove('active3'));
        if (elDiv && elDiv.classList) elDiv.classList.add('active3');
        $('html, body').animate({scrollTop: 0}, 'slow');

        let mensaje = `Hola,%20necesito%20más%20informacion%20sobre%20el%20siguiente%20producto:%20${data.autoparte.autoparte}`;
        obtener_negocio(mensaje);

        let detalle_html = data.autoparte.detalles ? `<div>${data.autoparte.detalles}</div>` : "";
        let descgeneral  = data.autoparte.descgeneral ? `<div>${data.autoparte.descgeneral}</div>` : "";

        $("#detalles-producto").html(detalle_html);
        $("#detalles-producto-movil").html(detalle_html);
        $("#descgeneral").html(descgeneral);
        $("#desc-producto-movil").html(descgeneral);
        $("#accesorio").html(data.autoparte.autoparte);
        $("#stock").html((data.autoparte.stock === '1') ? 'Si' : 'No');

        let html = ``;
        let html_sliders = ``;
        data.imagenes.forEach(imagen => {
          html += `<img data-src="${set_domain_assets}/assets/images/autopartes/${imagen.imagen}">`;
          html_sliders += `<a id='lcarousel' href="${set_domain_assets}/assets/images/autopartes/${imagen.imagen}" data-lightbox="carousel"></a>`;
        });

        let html_colores = ``;
        data.colores.forEach(color => {
          html_colores += `<div class="color" onclick="cambiarColor('${color.uuid}')" data-toggle="tooltip" data-placement="top" title="${color.color}">
            <img src="${set_domain_assets}/assets/images/colores/${color.cover}" alt="">
          </div>`;
        });

        if (data.videos.video) {
          html_colores += `<div class='ver_video' onclick="ver_video('${data.videos.video}')" data-toggle="tooltip" data-placement="top" title="Ver Video"><img width="30px" src="${set_domain_assets}/assets/images/yt-icon.png"></div>`;
        }

        html_colores += `<div class='fullScreen' onclick="fullScreen()" data-toggle="tooltip" data-placement="top" title="Pantalla Completa"><i class="fas fa-expand fa-lg"></i></div>`;

        $("#sliders").html(html_sliders);
        $("#auto360").html('<div id="circlrDiv"></div>');
        $("#circlrDiv").html(html);
        $("#detalle_colores").html(html_colores);
        $('[data-toggle="tooltip"]').tooltip();

        var crl = circlr('circlrDiv', { loader: 'loader' });

        // Remarcar autoparte activa por URL
        markActive({ param: 'autoparte', container: '#carousel_autopartes', activeClass: 'active3' });
      }
    }
  })
}

/* =========================
 * Datos del Auto (desde ?auto=)
 * ========================= */
const obtener_auto = function (filtro = '') {
  const urlParams = new URLSearchParams(window.location.search);
  const auto = urlParams.get('auto');
  const validar = window.location.pathname;
  if (!validar.includes('galeria')) {
    $.ajax({
      url: 'administrador/controller/frontend',
      method: 'POST',
      data: {opcion: 'obtener_auto', auto},
      success: function (response) {
        const data = JSON.parse(response);
        $("#detalle_nombre_auto").html(data.auto.nombre);
        let html = ``;
        let html_sliders = ``;

        data.imagenes.forEach(imagen => {
          html += `<img data-src="${set_domain_assets}/assets/images/autopartes/${imagen.imagen}" >`;
          html_sliders += `<a id='lcarousel' href="${set_domain_assets}/assets/images/autopartes/${imagen.imagen}" data-lightbox="carousel"></a>`;
        });

        let html_colores = ``;
        data.colores.forEach(color => {
          html_colores += `<div class="color" onclick="cambiarColor('${color.uuid}')" data-toggle="tooltip" data-placement="top" title="${color.color}">
            <img src="${set_domain_assets}/assets/images/colores/${color.cover}" alt="">
          </div>`;
        });

        let {categorias} = data;
        const categorias2 = categorias.filter(x => {
          if (filtro == '') return x.categoria;
          const regex = new RegExp(filtro, "i");
          return regex.test(x.categoria);
        });

        if (categorias2.length === 0) {
          return Swal.fire('Sin resultados!!','No se encontrarón resultados para esta busqueda','error');
        }

        let html_categorias = ``;
        categorias2.forEach(categoria => {
          html_categorias += `<div class="carousel-cell">
            <img data-uuid="${categoria.uuid}"
                 src="${set_domain_assets}/assets/images/categorias/${categoria.cover}"
                 onclick="obtenerAutoparte(this,'${categoria.uuid}')"
                 alt="${categoria.categoria}">
            <p class='text-center mt-2 text-white'>${categoria.categoria}</p>
          </div>`;
        });

        html_colores += `<div class='fullScreen' onclick="fullScreen()" data-toggle="tooltip" data-placement="top" title="Pantalla Completa"><i class="fas fa-expand fa-lg"></i></div>`;

        $("#sliders").html(html_sliders);
        $("#carousel_categorias").flickity('destroy');
        $("#carousel_categorias").html(html_categorias);
        $("#carousel_categorias").flickity({ contain: true });

        // Marco activo de categoría por URL (si existe)
        markActive({ param: 'categoria', container: '#carousel_categorias', activeClass: 'active' });

        $("#auto360").html('<div id="circlrDiv"></div>');
        $("#circlrDiv").html(html);
        $("#detalle_colores").html(html_colores);
        $('[data-toggle="tooltip"]').tooltip();

        var crl = circlr('circlrDiv', { loader: 'loader' });
      }
    })
  }
}

/* =========================
 * YouTube (igual que tenías)
 * ========================= */
var tag = document.createElement("script");
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName("script")[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function ver_video(video) {
  player = new YT.Player("player", {
    height: "100%",
    width: "100%",
    videoId: video,
    playerVars: { autoplay: 1, mute: 0, controls: 1, info: 0, showinfo: 0, rel: 0, modestbranding: 1, wmode: "transparent" },
    events: { onReady: onPlayerReady, onStateChange: onPlayerStateChange }
  });
  var inst = $('[data-remodal-id=modal]').remodal();
  inst.open();
  player.playVideo();
}
function onPlayerReady() {}
var done = false;
function onPlayerStateChange(event) { if (event.data == YT.PlayerState.PLAYING && !done) { done = true; } }
function stopVideo() { if (player) player.stopVideo(); }
$(document).on('closing', '.remodal', function () {
  if (player) { player.stopVideo(); player.destroy(); }
});
