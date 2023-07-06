<?php 
session_start();
require "../config/conexion.php";
require "../model/dashboard.php";

$dashboards = new Dashboard();

echo json_encode($dashboards->listar());

?>