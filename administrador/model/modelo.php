<?php

class Models extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_modelos()
    {
        $sql = "SELECT mo.id id, ma.marca marca,mo.marca_id marca_id, mo.modelo modelo, mo.tipo_usuario tipo_usuario, mo.estado estado, mo.fecha_creacion fecha_creacion, mo.fecha_modificacion fecha_modificacion FROM modelos AS mo INNER JOIN marcas AS ma ON mo.marca_id = ma.id";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar_modelos_por_marca($marca)
    {
        $sql = "SELECT mo.id id, ma.marca marca,mo.marca_id marca_id, mo.modelo modelo, mo.tipo_usuario tipo_usuario, mo.estado estado, mo.fecha_creacion fecha_creacion, mo.fecha_modificacion fecha_modificacion FROM modelos AS mo INNER JOIN marcas AS ma ON mo.marca_id = ma.id WHERE mo.marca_id =?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$marca);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_modelo($marca,$modelo,$tipo)
    {

        if (empty($marca) || empty($modelo) || empty($tipo)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "INSERT INTO modelos(marca_id,modelo,tipo_usuario,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $marca);
            $sql->bindValue(2, $modelo);
            $sql->bindValue(3, $tipo);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Modelo agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function editar_modelo($id,$marca,$modelo,$tipo)
    {

        if (empty($marca) || empty($modelo) || empty($tipo)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE modelos SET marca_id = ?, modelo = ?, tipo_usuario = ?, fecha_modificacion = now() WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $marca);
            $sql->bindValue(2, $modelo);
            $sql->bindValue(3, $tipo);
            $sql->bindValue(4, $id);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Modelo editado con exito",
            ];
        }

        echo json_encode($response);

    }

    public function eliminar_modelo($id){

        $sql = "DELETE FROM modelos WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();

        $response = [
            "status" => "success",
            "message" => "Modelo eliminado con exito",
        ];

        echo json_encode($response);

    }


}
