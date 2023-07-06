<?php

class Autopartes extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_autopartes($categoria)
    {
        $sql = "SELECT id,uuid,autoparte,stock,cover,color_uuid FROM autopartes WHERE categoria_uuid = ? AND estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$categoria);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener_nombre_autoparte($uuid)
    {
        $sql = "SELECT autoparte FROM autopartes WHERE uuid = ? AND estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$uuid);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function crear_autoparte($uuid,$autoparte,$stock,$nombre_img,$categoria)
    {
        if (empty($autoparte) || empty($stock) || empty($nombre_img)) {

            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];

        } else {
            $sql = "INSERT INTO autopartes(uuid,autoparte,stock,cover,categoria_uuid,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,?,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);

            $nombre_img = uniqid() . "-" . $_FILES["cover"]['name'];
            $ruta = "../../assets/images/autopartes/" . $nombre_img;
            move_uploaded_file($_FILES["cover"]['tmp_name'], $ruta);


            $sql->bindValue(1, $uuid);
            $sql->bindValue(2, $autoparte);
            $sql->bindValue(3, $stock);
            $sql->bindValue(4, $nombre_img);
            $sql->bindValue(5, $categoria);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Autoparte agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function editar_autoparte($id,$autoparte,$stock,$cover,$color)
    {
        if (empty($autoparte) || empty($stock) || empty($cover) || empty($color)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            $sql = "UPDATE autopartes SET autoparte = ?, stock = ?, cover = ?, color_uuid = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);

            if(empty($_FILES["cover"]['name'])){
                $nombre_img = $cover;
            }else{
                $nombre_img = uniqid() . "-" . $_FILES["cover"]['name'];
                $ruta = "../../assets/images/autopartes/" . $nombre_img;
                move_uploaded_file($_FILES["cover"]['tmp_name'], $ruta);
            }

            $sql->bindValue(1, $autoparte);
            $sql->bindValue(2, $stock);
            $sql->bindValue(3, $nombre_img);
            $sql->bindValue(4, $color);
            $sql->bindValue(5, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Autoparte editada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function eliminar_autoparte($id){

        if (empty($id)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE autopartes SET estado = 2, fecha_modificacion = now() WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Autoparte eliminado con exito",
            ];
        }

        echo json_encode($response);

    }


}
