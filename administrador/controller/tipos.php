<?php 
session_start();
require "../config/conexion.php";
require "../model/tipo.php";

$tipos = new Tipos();

$id = '';
$tipo = '';
$tipo_usurio = '';
$opcion = '';

$usuario = '';
$negocio = '';

if(isset($_SESSION['id'])){
    $usuario = $_SESSION['id'];
}

if(isset($_SESSION['negocio'])){
    $negocio = $_SESSION['negocio'];
}

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['tipo'])){
    $tipo = $_POST['tipo'];
}

if(isset($_POST['tipo_usuario'])){
    
    $tipo_usuario = $_POST['tipo_usuario'];
}

if(empty($_POST['tipo_usuario']) && $_SESSION['id'] !== '1'){
    $tipo_usuario = 1;
}


switch ($opcion){
    case 'listar_tipos':
        $listar = json_encode($tipos->listar_tipos($usuario,$negocio));
        echo $listar;
        break;
    case 'crear':
        $tipos->crear_tipo($tipo,$tipo_usuario,$usuario,$negocio);
    break;
    case 'editar':
        $tipos->editar_tipo($id,$tipo,$tipo_usuario);
    break;
    case 'eliminar':
        $tipos->eliminar_tipo($id);
    break;
    default:
        $listar = json_encode($tipos->listar_tipos($usuario,$negocio));
        echo '{"data":'.$listar.'}';
    break;
}

?>