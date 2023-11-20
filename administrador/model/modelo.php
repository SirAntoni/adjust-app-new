<?php

class Models extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_modelos($usuario,$negocio)
    {

        if($usuario === '1'){
            $sql = "SELECT mo.id id, ma.marca marca,mo.marca_id marca_id,t.id tipo_id,t.tipo tipo, mo.modelo modelo, mo.tipo_usuario tipo_usuario, mo.estado estado,,mo.negocio_id negocio_id, mo.fecha_creacion fecha_creacion, mo.fecha_modificacion fecha_modificacion FROM modelos AS mo INNER JOIN marcas AS ma ON mo.marca_id = ma.id LEFT JOIN tipos AS t ON mo.tipo_id = t.id";
            $sql = $this->db->prepare($sql);
        }else{
            $sql = "SELECT mo.id id, ma.marca marca,mo.marca_id marca_id,t.id tipo_id,t.tipo tipo, mo.modelo modelo, mo.tipo_usuario tipo_usuario, mo.estado estado,mo.negocio_id negocio_id, mo.fecha_creacion fecha_creacion, mo.fecha_modificacion fecha_modificacion FROM modelos AS mo INNER JOIN marcas AS ma ON mo.marca_id = ma.id LEFT JOIN tipos AS t ON mo.tipo_id = t.id WHERE ma.negocio_id = ? AND mo.negocio_id = ?";
           
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$negocio);
            $sql->bindValue(2,$negocio);
        }
       
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar_modelos_por_marca($marca,$usuario,$negocio)
    {

        if($usuario === '1'){
            $sql = "SELECT mo.id id, ma.marca marca,mo.marca_id marca_id, mo.modelo modelo, mo.tipo_usuario tipo_usuario, mo.estado estado, mo.fecha_creacion fecha_creacion, mo.fecha_modificacion fecha_modificacion FROM modelos AS mo INNER JOIN marcas AS ma ON mo.marca_id = ma.id WHERE mo.marca_id =?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$marca);
        }else{
            $sql = "SELECT mo.id id, ma.marca marca,mo.marca_id marca_id, mo.modelo modelo, mo.tipo_usuario tipo_usuario, mo.estado estado, mo.fecha_creacion fecha_creacion, mo.fecha_modificacion fecha_modificacion FROM modelos AS mo INNER JOIN marcas AS ma ON mo.marca_id = ma.id WHERE mo.marca_id =? AND ma.negocio_id = ? AND mo.negocio_id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$marca);
            $sql->bindValue(2,$negocio);
            $sql->bindValue(3,$negocio);
        }

       
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_modelo($marca,$tipo_auto,$modelo,$tipo,$usuario,$negocio)
    {

        if (empty($marca) || empty($tipo_auto) || empty($modelo) || empty($tipo)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            if($usuario === '1'){
                $sql = "INSERT INTO modelos(marca_id,tipo_id,modelo,tipo_usuario,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,?,?,1,now(),now())";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(1, $marca);
                $sql->bindValue(2, $tipo_auto);
                $sql->bindValue(3, $modelo);
                $sql->bindValue(4, $tipo);
                
            }else{
                $sql = "INSERT INTO modelos(marca_id,tipo_id,modelo,tipo_usuario,estado,negocio_id,fecha_creacion,fecha_modificacion) VALUES(?,?,?,?,1,?,now(),now())";
                $sql = $this->db->prepare($sql);
                $sql->bindValue(1, $marca);
                $sql->bindValue(2, $tipo_auto);
                $sql->bindValue(3, $modelo);
                $sql->bindValue(4, $tipo);
                $sql->bindValue(5, $negocio);
            }

            
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Modelo agregada con exito",
            ];
        }

        echo json_encode($response);

    }

    public function editar_modelo($id,$marca,$tipo_auto,$modelo,$tipo)
    {

        if (empty($marca) || empty($modelo) || empty($tipo_auto) || empty($tipo)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {
            $sql = "UPDATE modelos SET marca_id = ?,tipo_id = ?, modelo = ?, tipo_usuario = ?, fecha_modificacion = now() WHERE id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $marca);
            $sql->bindValue(2, $tipo_auto);
            $sql->bindValue(3, $modelo);
            $sql->bindValue(4, $tipo);
            $sql->bindValue(5, $id);
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
