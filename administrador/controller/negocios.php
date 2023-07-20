<?php
session_start();
require "../config/conexion.php";
require "../model/negocio.php";

$negocios = new Negocios();

$id = '';
$ruc = '';
$razon_social = '';
$rango = '';
$contrasena = '';
$opcion = '';

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['ruc'])){
    $ruc = $_POST['ruc'];
}

if(isset($_POST['razon_social'])){
    $razon_social = $_POST['razon_social'];
}

if(isset($_POST['rango'])){
    $rango = $_POST['rango'];
}

if(isset($_POST['estado'])){
    $estado = $_POST['estado'];
}

if(isset($_POST['contrasena'])){
    $contrasena = $_POST['contrasena'];
}

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

switch($opcion){
    case 'crear':
        $negocios->crear_negocio($ruc,$razon_social,$contrasena,$rango);
    break;
    case 'editar':
        $negocios->editar_negocio($id,$ruc,$razon_social,$contrasena,$rango,$estado);
    break;
    case 'duplicar':
        $negocios->duplicar_negocio($id,$ruc,$razon_social,$contrasena,$rango);
    break;
    case "login":
        $negocios->login($ruc,$contrasena);
        break;
    default:
        $listAll = json_encode($negocios->listar_negocios());
        echo '{"data":'.$listAll.'}';
    break;
}



?>