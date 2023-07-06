<?php 
session_start();
require "../config/conexion.php";
require "../model/modelo.php";

$modelos = new Models();

$id = '';
$modelo = '';
$marca = '';
$tipo = '';
$opcion = '';

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


switch ($opcion){
    case 'listar_modelos':
        $listar = json_encode($modelos->listar_modelos_por_marca($marca));
        echo $listar;
        break;
    case 'crear':
        $modelos->crear_modelo($marca,$modelo,$tipo);
    break;
    case 'editar':
        $modelos->editar_modelo($id,$marca,$modelo,$tipo);
    break;
    case 'eliminar':
        $modelos->eliminar_modelo($id);
    break;
    default:
        $listar = json_encode($modelos->listar_modelos());
        echo '{"data":'.$listar.'}';
    break;
}

?>