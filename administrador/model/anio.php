<?php

class Anios extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_anios()
    {
        $sql = "SELECT * FROM anios";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_anio($anio, $tipo)
    {

        if (empty($anio) || empty($tipo)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO anios(anio,tipo_usuario,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $anio);
            $sql->bindValue(2, $tipo);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Año agregado con exito",
            ];
        }

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
