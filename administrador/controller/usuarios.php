<?php
session_start();
require "../config/conexion.php";
require "../model/usuario.php";

$usuarios = new Usuarios();

$usuario = '';
$contrasena = '';

if(isset($_POST['usuario'])){
    $usuario = $_POST['usuario'];
}

if(isset($_POST['contrasena'])){
    $contrasena = $_POST['contrasena'];
}

if(isset($_POST['opcion'])){
    $opcion = $_POST['opcion'];
}

switch($opcion){
    case "login-admin":
        $usuarios->login_admin($usuario,$contrasena);
        break;
    default:
        echo 'ERROR';
    break;
}



?>