<?php

class Marcas extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_marcas()
    {
        $sql = "SELECT * FROM marcas";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_marca($marca,$tipo)
    {
        if (empty($marca) || empty($tipo)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO marcas(marca,tipo_usuario,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $marca);
            $sql->bindValue(2, $tipo);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Marca agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function editar_marca($id,$marca,$tipo)
    {

        if (empty($marca) || empty($tipo)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE marcas SET marca = ?, tipo_usuario = ? WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $marca);
            $sql->bindValue(2,$tipo);
            $sql->bindValue(3, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Marca editada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function eliminar_marca($id){

        $sql = "DELETE FROM marcas WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Marca eliminada con exito",
        ];

        echo json_encode($response);

    }


}
