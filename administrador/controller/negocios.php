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
$facebook = '';
$instagram = '';
$tiktok = '';
$youtube = '';
$opcion = '';
$telefono = '';
$negocio = '';
$usuario = '';
if(isset($_SESSION['negocio'])) $negocio = $_SESSION['negocio'];
if(isset($_SESSION['id'])) $usuario = $_SESSION['id'];
if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['ruc'])){
    $ruc = $_POST['ruc'];
}

if(isset($_POST['telefono'])){
    $telefono = $_POST['telefono'];
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

if(isset($_POST['facebook'])){
    $facebook = $_POST['facebook'];
}

if(isset($_POST['instagram'])){
    $instagram = $_POST['instagram'];
}

if(isset($_POST['tiktok'])){
    $tiktok = $_POST['tiktok'];
}

if(isset($_POST['youtube'])){
    $youtube = $_POST['youtube'];
}

if(isset($_POST['contrasena'])){
    $contrasena = $_POST['contrasena'];
}

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

switch($opcion){
    case 'crear':
        $negocios->crear_negocio($ruc,$razon_social,$contrasena,$rango,$facebook,$instagram,$tiktok,$youtube, $telefono);
    break;
    case 'editar':
        $negocios->editar_negocio($id,$ruc,$razon_social,$contrasena,$rango,$estado,$facebook,$instagram,$tiktok,$youtube, $telefono);
    break;
    case 'duplicar':
        echo json_encode($negocios->duplicar_negocio($id,$ruc,$razon_social,$contrasena,$rango,$usuario));
    break;
    case "login":
        $negocios->login($ruc,$contrasena);
        break;
    default:
        $listAll = json_encode($negocios->listar_negocios($negocio));
        echo '{"data":'.$listAll.'}';
    break;
}



?>