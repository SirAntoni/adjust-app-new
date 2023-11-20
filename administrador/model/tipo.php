<?php

class Tipos extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_tipos($usuario,$negocio)
    {
        if($usuario === '1'){
            $sql = "SELECT * FROM tipos";
            $sql = $this->db->prepare($sql);
        }else{
            $sql = "SELECT * FROM tipos WHERE negocio_id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$negocio);
        }
       
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar_tipos_por_marca($marca,$usuario,$negocio)
    {
        if($usuario === '1'){
            $sql = "SELECT * FROM tipos";
            $sql = $this->db->prepare($sql);
        }else{
            $sql = "SELECT * FROM tipos WHERE negocio_id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$negocio);
        }
       
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_tipo($tipo,$tipo_usuario,$usuario,$negocio)
    {

        if (empty($tipo) || empty($tipo_usuario)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            if($usuario === '1'){
                $sql = "INSERT INTO tipos(tipo,tipo_usuario,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,1,now(),now())";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(1, $tipo);
                $sql->bindValue(2, $tipo_usuario);
            }else{
                $sql = "INSERT INTO tipos(tipo,tipo_usuario,estado,negocio_id,fecha_creacion,fecha_modificacion) VALUES(?,?,1,?,now(),now())";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(1, $tipo);
                $sql->bindValue(2, $tipo_usuario);
                $sql->bindValue(3, $negocio);
            }
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
