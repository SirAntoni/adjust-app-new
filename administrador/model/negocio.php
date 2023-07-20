<?php

require '../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

class Negocios extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_negocios(){
        $sql = "SELECT id,ruc,razon_social,rango,estado FROM negocios";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_negocio($ruc,$razon_social,$contrasena,$rango)
    {

        if (empty($ruc)  || empty($razon_social) || empty($rango) || empty($contrasena)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "SELECT * FROM negocios WHERE ruc = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$ruc);
            $query->execute();
            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe el negocio registrado en la base de datos."
                ];

            }else{

                    $query = "INSERT INTO negocios(ruc,razon_social,contrasena,rango,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,?,?,1,now(),now())";
                    $query = $this->db->prepare($query);

                    $contrasenaEncriptada = password_hash($contrasena,PASSWORD_DEFAULT);

                    $query->bindValue(1,$ruc);
                    $query->bindValue(2,$razon_social);
                    $query->bindValue(3,$contrasenaEncriptada);
                    $query->bindValue(4,$rango);
                    $query->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Usuario registrado con exito"
                    ];

            }
           
        }

        echo json_encode($response);
    }


    public function editar_negocio($id,$ruc,$razon_social,$contrasena,$rango,$estado){

        if(empty($ruc) || empty($razon_social) || empty($rango) || empty($estado)){
            
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            
        }else{

                if(empty($contrasena)){
                    $query = "UPDATE negocios SET  ruc= ?, razon_social = ?, rango = ?, estado = ?, fecha_modificacion = now() WHERE id = ?";
                    $query = $this->db->prepare($query);    
                    $query->bindValue(1,$ruc);
                    $query->bindValue(2,$razon_social);
                    $query->bindValue(3,$rango);
                    $query->bindValue(4,$estado);
                    $query->bindValue(5,$id);
                   

                }else{
                    $query = "UPDATE negocios SET  ruc= ?, razon_social = ?,contrasena = ?, rango = ?, estado = ?, fecha_modificacion = now() WHERE id = ?";

                    $contrasenaEncriptada = password_hash($contrasena,PASSWORD_DEFAULT);
                    $query = $this->db->prepare($query);    
                    $query->bindValue(1,$ruc);
                    $query->bindValue(2,$razon_social);
                    $query->bindValue(3,$contrasenaEncriptada);
                    $query->bindValue(4,$rango);
                    $query->bindValue(5,$estado);
                    $query->bindValue(6,$id);

                }
                
                            
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "El usuario ha sido actualizado con exito."
                ];

        }

        echo json_encode($response);
    }

    public function duplicar_negocio($id,$ruc,$razon_social,$contrasena,$rango){

        if(empty($ruc) || empty($razon_social) || empty($contrasena) || empty($rango)){
            
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            
        }else{

                $insertar_negocio = "INSERT INTO negocios(ruc,razon_social,contrasena,rango,estado,fecha_creacion, fecha_modificacion) VALUES (?,?,?,?,1,now(),now())";
                $insertar_negocio = $this->db->prepare($insertar_negocio);
                $contrasenaEncriptada = password_hash($contrasena,PASSWORD_DEFAULT);
                $insertar_negocio->bindValue(1,$ruc);
                $insertar_negocio->bindValue(2,$razon_social);
                $insertar_negocio->bindValue(3,$contrasenaEncriptada);
                $insertar_negocio->bindValue(4,$rango);
                $insertar_negocio->execute();


                $lastId = $this->db->lastInsertId();

                $obtener_autos = "SELECT * FROM autos WHERE negocio_id = ?";
                $obtener_autos = $this->db->prepare($obtener_autos);
                $obtener_autos->bindValue(1,$id);
                $obtener_autos->execute();
                $autos = $obtener_autos->fetchAll(PDO::FETCH_ASSOC);
                
                foreach($autos as $auto){

                    $insertar_auto = "INSERT INTO autos (uuid,nombre,marca_id,tipo_id,modelo_id,anio_id,negocio_id,color_uuid,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,?,?,?,?,?,?,?,now(),now())";

                    $insertar_auto = $this->db->prepare($insertar_auto);
                    $insertar_auto->bindValue(1,Uuid::uuid4()->toString());
                    $insertar_auto->bindValue(2,$auto['nombre']);
                    $insertar_auto->bindValue(3,$auto['marca_id']);
                    $insertar_auto->bindValue(4,$auto['tipo_id']);
                    $insertar_auto->bindValue(5,$auto['modelo_id']);
                    $insertar_auto->bindValue(6,$auto['anio_id']);
                    $insertar_auto->bindValue(7,$lastId);
                    $insertar_auto->bindValue(8,$auto['color_uuid']);
                    $insertar_auto->bindValue(9,$auto['estado']);
                    $insertar_auto->execute();

                }

                $response = [
                    "status" => "success",
                    "message" => "El usuario ha sido duplicado con exito."
                ];

        }

        echo json_encode($response);
    }


    public function login($ruc, $contrasena)
    {
        if (empty($ruc) || empty($contrasena)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios."
            ];
            
        } else {
            $sql = "SELECT * FROM negocios WHERE ruc = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $ruc);
            if (!$sql->execute()) {
                $response = [
                    "status" => "error",
                    "message" => "Error del sistema, comunicate con al Admnistrador de Sistemas."
                ];
            } else {
                if ($sql->rowCount() > 0) {
                    $data                = $sql->fetch(PDO::FETCH_ASSOC);
                    $contrasenaEncriptada = $data['contrasena'];

                    if (password_verify($contrasena, $contrasenaEncriptada) == true) {

                        $_SESSION['id']              = $data['id'];
                        $_SESSION['ruc']              = $data['ruc'];
                        $_SESSION['razon_social']              = $data['razon_social'];
                        $_SESSION['rango']     = $data['rango'];
                        $_SESSION['estado']     = $data['estado'];
                        
                        $response = [
                            "status" => "success",
                            "url" => "home"
                        ];

                    } else {
                        $response = [
                            "status" => "error",
                            "message" => "Error en los datos ingresados."
                        ];
                    }

                } else {
                    $response = [
                        "status" => "error",
                        "message" => "Error en los datos ingresados."
                    ];
                }
            }
        }

        echo json_encode($response);

    }

}