<?php

class Colores extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_colores($auto)
    {
        $sql = "SELECT id,uuid,color,cover FROM colores WHERE auto_uuid = ? and estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$auto);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_color($uuid,$color,$cover,$auto)
    {

        if (empty($color) || empty($cover)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO colores(uuid,color,cover,auto_uuid,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);

            
            $nombre_img = uniqid() . "-" . $_FILES["cover"]['name'];
            $ruta = "../../assets/images/colores/" . $nombre_img;
            move_uploaded_file($_FILES["cover"]['tmp_name'], $ruta);
            
            $sql->bindValue(1, $uuid);
            $sql->bindValue(2, $color);
            $sql->bindValue(3, $nombre_img);
            $sql->bindValue(4, $auto);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Color agregado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function editar_color($id,$color,$cover)
    {

        if (empty($color) || empty($cover)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {


            $sql = "UPDATE colores SET color = ?, cover = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);


            if(empty($_FILES["cover"]['name'])){
                $nombre_img = $cover;
            }else{
                $nombre_img = uniqid() . "-" . $_FILES["cover"]['name'];
                $ruta = "../../assets/images/colores/" . $nombre_img;
                move_uploaded_file($_FILES["cover"]['tmp_name'], $ruta);
            }

            $sql->bindValue(1, $color);
            $sql->bindValue(2, $nombre_img);
            $sql->bindValue(3, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Color editado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function eliminar_color($id){

        if (empty($id)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE colores SET estado = 2, fecha_modificacion = now() WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Color eliminado con exito",
            ];
        }

        echo json_encode($response);

    }


}