<?php 
session_start();
require "../config/conexion.php";
require "../model/tipo.php";

$tipos = new Tipos();

$id = '';
$tipo = '';
$tipo_usurio = '';
$opcion = '';

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


switch ($opcion){
    case 'listar_tipos':
        $listar = json_encode($tipos->listar_tipos());
        echo $listar;
        break;
    case 'crear':
        $tipos->crear_tipo($tipo,$tipo_usuario);
    break;
    case 'editar':
        $tipos->editar_tipo($id,$tipo,$tipo_usuario);
    break;
    case 'eliminar':
        $tipos->eliminar_tipo($id);
    break;
    default:
        $listar = json_encode($tipos->listar_tipos());
        echo '{"data":'.$listar.'}';
    break;
}

?>