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
        $sql = "SELECT id,uuid,nombre,marca_id,tipo_id,modelo_id,anio_uuid,color_uuid FROM autos WHERE negocio_id = ? AND estado = 1";
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

    public function listar_anios($auto_uuid)
    {
        $sql = "SELECT anio FROM autos_anios WHERE auto_uuid = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$auto_uuid);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_auto($uuid,$nombre,$marca,$tipo,$modelo,$uuid_anio,$array_anios,$negocio)
    {

        if (empty($nombre) || empty($marca) || empty($tipo) || empty($modelo) || empty($array_anios) || empty($negocio)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            foreach($array_anios as $anio){

                $agregar = 'INSERT INTO autos_anios(uuid,anio,auto_uuid) VALUES (?,?,?)';
                $agregar = $this->db->prepare($agregar);
                $agregar->bindValue(1,$uuid_anio);
                $agregar->bindValue(2,$anio);
                $agregar->bindValue(3,$uuid);
                $agregar->execute();

            }


            $sql = "INSERT INTO autos(uuid,nombre,marca_id,tipo_id,modelo_id,anio_uuid,negocio_id,estado, fecha_creacion, fecha_modificacion) VALUES(?,?,?,?,?,?,?,1,now(),now())";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $uuid);
            $sql->bindValue(2, $nombre);
            $sql->bindValue(3, $marca);
            $sql->bindValue(4, $tipo);
            $sql->bindValue(5, $modelo);
            $sql->bindValue(6, $uuid_anio);
            $sql->bindValue(7, $negocio);

            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Auto agregado con exito",
            ];

        }

        echo json_encode($response);

    }

    public function editar_auto($id,$uuid,$nombre,$marca,$tipo,$modelo,$uuid_anio,$array_anios,$color)
    {

        if (empty($nombre) || empty($marca) || empty($tipo) || empty($modelo) || empty($array_anios) || empty($color)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            $buscar = "SELECT * FROM autos_anios WHERE auto_uuid = ?";
            $buscar = $this->db->prepare($buscar);
            $buscar->bindValue(1,$uuid);
            $buscar->execute();
            $result_auto = $buscar->fetch(PDO::FETCH_ASSOC);

            if(!empty($result_auto)){

                $eliminar = 'DELETE FROM autos_anios WHERE uuid =?';
                $eliminar = $this->db->prepare($eliminar);
                $eliminar->bindValue(1,$result_auto['uuid']);
                $eliminar->execute();

            }


            foreach($array_anios as $anio){

                $agregar = 'INSERT INTO autos_anios(uuid,anio,auto_uuid) VALUES (?,?,?)';
                $agregar = $this->db->prepare($agregar);
                $agregar->bindValue(1,$uuid_anio);
                $agregar->bindValue(2,$anio);
                $agregar->bindValue(3,$uuid);
                $agregar->execute();

            }

        
            $sql = "UPDATE autos SET nombre = ?,marca_id = ?,tipo_id = ?, modelo_id = ?,anio_uuid = ?, color_uuid = ? WHERE id =?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $marca);
            $sql->bindValue(3, $tipo);
            $sql->bindValue(4, $modelo);
            $sql->bindValue(5, $uuid_anio);
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