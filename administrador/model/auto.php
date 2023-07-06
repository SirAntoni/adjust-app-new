<?php

class Autos extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_autos($negocio)
    {
        $sql = "SELECT id,uuid,nombre,marca_id,tipo_id,modelo_id,anio_id,color_uuid FROM autos WHERE negocio_id = ? AND estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$negocio);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener_nombre_auto($uuid)
    {
        $sql = "SELECT nombre FROM autos WHERE uuid = ? AND estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$uuid);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function crear_auto($uuid,$nombre,$marca,$tipo,$modelo,$anio,$negocio)
    {

        if (empty($nombre) || empty($marca) || empty($tipo) || empty($modelo) || empty($anio) || empty($negocio)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO autos(uuid,nombre,marca_id,tipo_id,modelo_id,anio_id,negocio_id,estado, fecha_creacion, fecha_modificacion) VALUES(?,?,?,?,?,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $uuid);
            $sql->bindValue(2, $nombre);
            $sql->bindValue(3, $marca);
            $sql->bindValue(4, $tipo);
            $sql->bindValue(5, $modelo);
            $sql->bindValue(6, $anio);
            $sql->bindValue(7, $negocio);

            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Auto agregado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function editar_auto($id,$nombre,$marca,$tipo,$modelo,$anio,$color)
    {

        if (empty($nombre) || empty($marca) || empty($tipo) || empty($modelo) || empty($anio) || empty($color)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE autos SET nombre = ?,marca_id = ?,tipo_id = ?, modelo_id = ?,anio_id = ?, color_uuid = ? WHERE id =?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $marca);
            $sql->bindValue(3, $tipo);
            $sql->bindValue(4, $modelo);
            $sql->bindValue(5, $anio);
            $sql->bindValue(6, $color);
            $sql->bindValue(7, $id);

            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Auto editado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function eliminar_auto($id){

        $sql = "UPDATE autos SET estado = 2 WHERE id =?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);

        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Auto eliminado con exito",
        ];

        echo json_encode($response);

    }


}