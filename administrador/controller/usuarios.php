<?php
session_start();
require "../config/conexion.php";
require "../model/usuario.php";

$usuarios = new Usuarios();

$usuario = '';
$contrasena = '';
$opcion = '';
$id = '';
$negocio = '';

if(isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
}

if(isset($_POST['contrasena'])){
    $contrasena = $_POST['contrasena'];
}

if(isset($_POST['negocio'])){
    $negocio = $_POST['negocio'];
}

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

switch($opcion){
    case "login-admin":
        $usuarios->login_admin($usuario,$contrasena);
        break;
    case "crear":
        echo json_encode($usuarios->crear_usuario($usuario,$contrasena,$negocio));
        break;
    case "editar":
        echo json_encode($usuarios->editar_usuario($id,$negocio));
        break;
    case "eliminar":
        echo json_encode($usuarios->eliminar_usuario($id));
        break;
    default:
        $listar = json_encode($usuarios->listar_usuarios());
        echo '{"data":'.$listar.'}';
    break;
}



?>