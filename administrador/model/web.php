<?php

class Web extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function cargar_web($negocio)
    {
        $sql = "SELECT * FROM web WHERE negocio = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$negocio);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function guardar_datos_generales($negocio,$direccion,$telefono,$email){

        if(empty($negocio) || empty($direccion) || empty($telefono) || empty($email)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            echo json_encode($response);
        }else{
            $sql = "UPDATE web SET direccion = ?, telefono = ?, email = ? WHERE negocio =?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$direccion);
            $sql->bindValue(2,$telefono);
            $sql->bindValue(3,$email);
            $sql->bindValue(4,$negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Datos generales guardados con existo",
            ];

            echo json_encode($response);
        }

    }
    public function guardar_logo($negocio,$logo)
    {

        if (empty($negocio) || empty($logo)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            $sql = "UPDATE web SET logo = ? WHERE negocio = ?";
            $sql = $this->db->prepare($sql);

            if(empty($_FILES["logo"]['name'])){
                $nombre_img = $logo;
            }else{
                $nombre_img = uniqid() . "-" . $_FILES["logo"]['name'];
                $ruta = "../../assets/img/" . $nombre_img;
                move_uploaded_file($_FILES["logo"]['tmp_name'], $ruta);
            }

            $sql->bindValue(1, $nombre_img);
            $sql->bindValue(2, $negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Categoria editada con exito",
            ];
        }

        echo json_encode($response);

    }
    public function guardar_nosotrosImg($negocio,$nosotrosImg)
    {

        if (empty($negocio) || empty($nosotrosImg)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            $sql = "UPDATE web SET nosotrosImg = ? WHERE negocio = ?";
            $sql = $this->db->prepare($sql);

            if(empty($_FILES["nosotrosImg"]['name'])){
                $nombre_img = $nosotrosImg;
            }else{
                $nombre_img = uniqid() . "-" . $_FILES["nosotrosImg"]['name'];
                $ruta = "../../assets/img/" . $nombre_img;
                move_uploaded_file($_FILES["nosotrosImg"]['tmp_name'], $ruta);
            }

            $sql->bindValue(1, $nombre_img);
            $sql->bindValue(2, $negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Categoria editada con exito",
            ];
        }

        echo json_encode($response);

    }
    public function guardar_misionImg($negocio,$misionImg)
    {

        if (empty($negocio) || empty($misionImg)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            $sql = "UPDATE web SET misionImg = ? WHERE negocio = ?";
            $sql = $this->db->prepare($sql);

            if(empty($_FILES["misionImg"]['name'])){
                $nombre_img = $misionImg;
            }else{
                $nombre_img = uniqid() . "-" . $_FILES["misionImg"]['name'];
                $ruta = "../../assets/img/" . $nombre_img;
                move_uploaded_file($_FILES["misionImg"]['tmp_name'], $ruta);
            }

            $sql->bindValue(1, $nombre_img);
            $sql->bindValue(2, $negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Categoria editada con exito",
            ];
        }

        echo json_encode($response);

    }
    public function guardar_visionImg($negocio,$visionImg)
    {

        if (empty($negocio) || empty($visionImg)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        } else {

            $sql = "UPDATE web SET visionImg = ? WHERE negocio = ?";
            $sql = $this->db->prepare($sql);

            if(empty($_FILES["visionImg"]['name'])){
                $nombre_img = $visionImg;
            }else{
                $nombre_img = uniqid() . "-" . $_FILES["visionImg"]['name'];
                $ruta = "../../assets/img/" . $nombre_img;
                move_uploaded_file($_FILES["visionImg"]['tmp_name'], $ruta);
            }

            $sql->bindValue(1, $nombre_img);
            $sql->bindValue(2, $negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Categoria editada con exito",
            ];
        }

        echo json_encode($response);

    }
    public function guardar_slogan($negocio,$slogan){

        if(empty($negocio) || empty($slogan)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            echo json_encode($response);
        }else{
            $sql = "UPDATE web SET slogan = ?  WHERE negocio =?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$slogan);
            $sql->bindValue(2,$negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "Slogan guardado con existo",
            ];

            echo json_encode($response);
        }

    }

    public function guardar_nosotros($negocio,$nosotros){

        if(empty($negocio) || empty($nosotros)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            echo json_encode($response);
        }else{
            $sql = "UPDATE web SET nosotros = ?  WHERE negocio =?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$nosotros);
            $sql->bindValue(2,$negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "La informacion fue guardada con existo",
            ];

            echo json_encode($response);
        }

    }

    public function guardar_mision($negocio,$mision){

        if(empty($negocio) || empty($mision)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            echo json_encode($response);
        }else{
            $sql = "UPDATE web SET mision = ?  WHERE negocio =?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$mision);
            $sql->bindValue(2,$negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "La informacion fue guardada con existo",
            ];

            echo json_encode($response);
        }

    }

    public function guardar_vision($negocio,$vision){

        if(empty($negocio) || empty($vision)){
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            echo json_encode($response);
        }else{
            $sql = "UPDATE web SET vision = ?  WHERE negocio =?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$vision);
            $sql->bindValue(2,$negocio);
            $sql->execute();

            $response = [
                "status" => "success",
                "message" => "La informacion fue guardada con existo",
            ];

            echo json_encode($response);
        }

    }

}
