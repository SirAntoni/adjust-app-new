<?php 
session_start();
require "../config/conexion.php";
require "../model/color.php";
require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;


$colores = new Colores();

$id = '';
$uuid = Uuid::uuid4()->toString();
$color = '';
$auto = '';
$video = '';
$opcion = '';

if(isset($_POST['id'])){
    $id = $_POST['id'];
}

if(isset($_POST['color'])){
    $color = $_POST['color'];
}

if(isset($_POST['auto'])){
    $auto = $_POST['auto'];
}

if(isset($_POST['linkVideo'])){
  $video = $_POST['linkVideo'];
}

if(isset($_POST['data'])){
    $data = json_decode($_POST['data'], true);
    $opcion = $data['opcion'];
    $auto = $data['auto'];
}else{
    if(isset($_POST['opcion'])){
        $opcion = $_POST['opcion'];
    }
}

switch ($opcion){
    case 'listar_colores':
        $listar = json_encode($colores->listar_colores($auto));
        echo '{"data":'.$listar.'}';
        break;
    case 'crear':
        if (empty($_FILES['cover']['name'])) {
            $cover = "";
        } else {
            $cover = $_FILES['cover']['name'];
        }
        $colores->crear_color($uuid,$color,$cover,$auto);
    break;
    case 'editar':
        if (empty($_FILES['cover']['name'])) {
            $cover =$_POST['archivo'];
        } else {
            $cover = $_FILES['cover']['name'];
        }
        $colores->editar_color($id,$color,$cover);
    break;
    case 'eliminar':
        $colores->eliminar_color($id);
    break;
    case 'linkVideo':
      $colores->linkVideo($auto, $video);
    break;
    case 'mostrar_video':
      echo json_encode($colores->mostrar_video($auto));
    break;
    default:
        echo 'ERROR';
    break;
}

?>
