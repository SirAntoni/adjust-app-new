<?php 
session_start();
require "../config/conexion.php";
require "../model/modelo.php";

$modelos = new Models();

$id = '';
$modelo = '';
$marca = '';
$tipo = '';
$tipo_auto = '';
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

if(isset($_POST['modelo'])){
    $modelo = $_POST['modelo'];
}

if(isset($_POST['marca'])){
    $marca = $_POST['marca'];
}

if(isset($_POST['tipo'])){
    
    $tipo = $_POST['tipo'];
}

if(empty($_POST['tipo']) && $_SESSION['id'] !== '1'){
    $tipo = 1;
}


if(isset($_POST['tipo_auto'])){
    $tipo_auto = $_POST['tipo_auto'];
}


switch ($opcion){
    case 'listar_modelos':
        $listar = json_encode($modelos->listar_modelos_por_marca($marca,$usuario,$negocio));
        echo $listar;
        break;
    case 'crear':
        $modelos->crear_modelo($marca,$tipo_auto,$modelo,$tipo,$usuario,$negocio);
    break;
    case 'editar':
        $modelos->editar_modelo($id,$marca,$tipo_auto,$modelo,$tipo);
    break;
    case 'eliminar':
        $modelos->eliminar_modelo($id);
    break;
    default:
        $listar = json_encode($modelos->listar_modelos($usuario,$negocio));
        echo '{"data":'.$listar.'}';
    break;
}

?>