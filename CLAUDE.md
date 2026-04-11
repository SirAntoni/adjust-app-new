# CLAUDE.md

Este archivo proporciona guia a Claude Code (claude.ai/code) al trabajar con el codigo de este repositorio.

## Descripcion del Proyecto

Adjust App es un sistema de gestion de autopartes y galerias construido con PHP/MySQL/jQuery. Tiene dos interfaces: un catalogo publico y un panel de administracion. No usa frameworks PHP (Laravel/Symfony) — es PHP puro con jQuery en el frontend.

## Arquitectura

### Patron MVC

- **Modelos** (`administrador/model/`): Clases de acceso a datos que extienden la clase base `Conectar`. Usan PDO con prepared statements. Retornan respuestas JSON/array.
- **Controladores** (`administrador/controller/`): Manejadores de peticiones que reciben parametros POST mediante un switch `opcion`. Retornan JSON. Operaciones CRUD estandar: `listar`, `crear`, `editar`, `eliminar`.
- **Vistas** (`administrador/views/`): Templates PHP/HTML cargados mediante el parametro `?module=` en `main.php`.

### Dos Interfaces

- **Sitio publico** (raiz `/`): `index.php` (login), `home.php`, `web.php`, `galeria.php`, `detalle.php`, `video.php`, etc.
- **Panel admin** (`/administrador/`): `index.php` redirige a `main.php` que incluye vistas segun el query param `?module=`. Login en `login.php`.

### Frontend JS

- `administrador/app/app.js` (~3900 lineas): Todas las interacciones AJAX del admin — las funciones siguen el patron `listar_*()`, `crear_*()`, `editar_*()`, `eliminar_*()` por entidad.
- `js/app.js`: JavaScript del sitio publico.
- Basado en jQuery con llamadas AJAX a los controladores.

### Autenticacion

Basada en sesiones via `$_SESSION['usuario']`, `$_SESSION['id']`, `$_SESSION['tipo']`:
- Tipo 1: Administrador (acceso completo al dashboard)
- Tipo 2: Usuario negocio (acceso limitado, redirigido a vista web)

### Conexion a Base de Datos

`administrador/config/conexion.php` — alterna entre local y produccion (`adjustapp.store`) segun `$_SERVER['SERVER_NAME']`. MySQL con PDO.

### Entidades Principales

Usuarios, Negocios, Autos, Marcas, Modelos, Anos, Categorias, Autopartes, Colores, Tipos, Galerias, Imagenes, contenido Web.

## Desarrollo

### Requisitos

- PHP 7.x+ con extension PDO MySQL
- Base de datos MySQL llamada `adjust` (local) con usuario `root`
- Apache con mod_rewrite (`.htaccess` maneja URLs sin extension)
- Composer (para dependencias PHP del admin)
- Node/npm (opcional, solo para Lightbox2)

### Instalacion

```bash
# Instalar dependencias PHP (desde el directorio administrador/)
cd administrador && composer install

# Instalar dependencias frontend (desde la raiz)
npm install
```

### Ejecucion Local

Servir mediante Apache (ej. MAMP, Homebrew Apache, Laravel Valet) apuntando a la raiz del proyecto. No existe configuracion para el servidor PHP integrado.

### Librerias Principales

- Bootstrap 4, DataTables, Select2, Dropzone (subida de archivos), Swiper/Flickity (carruseles), Font Awesome, Lightbox2
- PHP: PHPSpreadsheet (exportacion Excel), Ramsey/UUID

### Archivos Subidos

Las imagenes se almacenan en subdirectorios de `assets/images/`: `categorias/`, `colores/`, `autopartes/`, `bg/`.
