<?php

class Imagenes extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_imagenes($color)
    {
        $sql = "SELECT * FROM imagenes WHERE color_uuid = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$color);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_imagenes($uuid, $color, $imagenes)
    {

        $buscar = "SELECT * FROM imagenes WHERE color_uuid = ?";
        $buscar = $this->db->prepare($buscar);
        $buscar->bindValue(1,$color);
        $buscar->execute();

        if($buscar->rowCount() > 0){

            $eliminar = "DELETE FROM imagenes WHERE color_uuid = ?";
            $eliminar = $this->db->prepare($eliminar);
            $eliminar->bindValue(1,$color);
            $eliminar->execute();

        }
        
        $jsonImagenes = json_decode($imagenes,true);

        foreach ($jsonImagenes as $imagen) {
            $sql = "INSERT INTO imagenes(uuid,color_uuid,imagen) VALUES(?,?,?)";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $uuid);
            $sql->bindValue(2, $color);
            $sql->bindValue(3, $imagen);
            $sql->execute();
        }

        $response = [
            "status" => "success",
            "message" => "Imagenes agregadas con exito.",
        ];
        

        echo json_encode($response);

    }

    public function editar_anio($id,$anio,$tipo)
    {

        if (empty($anio) || empty($tipo)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE anios SET anio = ?, tipo_usuario = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $anio);
            $sql->bindValue(2, $tipo);
            $sql->bindValue(3, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Año editado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function eliminar_anio($id){

        $sql = "DELETE FROM anios WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Año eliminado con exito",
        ];

        echo json_encode($response);

    }


}