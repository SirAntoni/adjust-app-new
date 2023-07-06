<?php

class Tipos extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_tipos()
    {
        $sql = "SELECT * FROM tipos";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar_tipos_por_marca($marca)
    {
        $sql = "SELECT * FROM tipos";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_tipo($tipo,$tipo_usuario)
    {

        if (empty($tipo) || empty($tipo_usuario)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO tipos(tipo,tipo_usuario,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $tipo);
            $sql->bindValue(2, $tipo_usuario);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Tipo agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function editar_tipo($id,$tipo,$tipo_usuario)
    {

        if (empty($tipo) || empty($tipo_usuario)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE tipos SET tipo = ?, tipo_usuario = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $tipo);
            $sql->bindValue(2, $tipo_usuario);
            $sql->bindValue(3, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Tipo editado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function eliminar_tipo($id){

        $sql = "DELETE FROM tipos WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Tipo eliminado con exito",
        ];

        echo json_encode($response);

    }


}
