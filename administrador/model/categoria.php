<?php

class Categorias extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_categorias($auto)
    {
        $sql = "SELECT id,uuid,categoria,cover FROM categorias WHERE auto_uuid = ? AND estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$auto);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener_nombre_categoria($uuid)
    {
        $sql = "SELECT categoria FROM categorias WHERE uuid = ? AND estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$uuid);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function crear_categoria($uuid, $categoria, $cover, $auto)
    {
        
        if (empty($categoria) || empty($cover)) {

            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];

        } else {
            $sql = "INSERT INTO categorias(uuid,categoria,cover,auto_uuid,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);

            $nombre_img = uniqid() . "-" . $_FILES["cover"]['name'];
            $ruta = "../../assets/images/categorias/" . $nombre_img;
            move_uploaded_file($_FILES["cover"]['tmp_name'], $ruta);


            $sql->bindValue(1, $uuid);
            $sql->bindValue(2, $categoria);
            $sql->bindValue(3, $nombre_img);
            $sql->bindValue(4, $auto);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Categoria agregada con exito",
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
