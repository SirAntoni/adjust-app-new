<?php

class Galeria extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function cargar_galeria($filtro)
    {
        $sql = "SELECT * FROM galeria WHERE filtro = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$filtro);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_galeria($filtro, $titulo, $descripcion, $imagen, $negocio)
    {
        
        if (empty($titulo) || empty($descripcion) || empty($imagen)) {

            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];

        } else {
            $sql = "INSERT INTO galeria(filtro,titulo,descripcion,imagen,negocio) VALUES(?,?,?,?,?)";
            $sql = $this->db->prepare($sql);

            $nombre_img = uniqid() . "-" . $_FILES["imagen"]['name'];
            $ruta = "../../assets/img/" . $nombre_img;
            move_uploaded_file($_FILES["imagen"]['tmp_name'], $ruta);


            $sql->bindValue(1, $filtro);
            $sql->bindValue(2, $titulo);
            $sql->bindValue(3, $descripcion);
            $sql->bindValue(4, $imagen);
            $sql->bindValue(5, $negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Imagen agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function eliminar_galeria($id){

        if (empty($id)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "DELETE FROM galeria WHERE id =?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Imagen eliminada con exito",
            ];
        }

        echo json_encode($response);

    }

    

    public function editar_categoria($id,$categoria,$cover)
    {

        if (empty($categoria) || empty($cover)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            $sql = "UPDATE categorias SET categoria = ?, cover = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);

            if(empty($_FILES["cover"]['name'])){
                $nombre_img = $cover;
            }else{
                $nombre_img = uniqid() . "-" . $_FILES["cover"]['name'];
                $ruta = "../../assets/images/categorias/" . $nombre_img;
                move_uploaded_file($_FILES["cover"]['tmp_name'], $ruta);
            }

            $sql->bindValue(1, $categoria);
            $sql->bindValue(2, $nombre_img);
            $sql->bindValue(3, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Categoria editada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function eliminar_categoria($id){

        if (empty($id)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE categorias SET estado = 2, fecha_modificacion = now() WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Categoria eliminado con exito",
            ];
        }

        echo json_encode($response);

    }


}
