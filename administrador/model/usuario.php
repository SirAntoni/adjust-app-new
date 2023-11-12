<?php

class Usuarios extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_usuarios()
    {
        $sql = "SELECT id,usuario,negocio FROM usuarios WHERE id not in (1)";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function crear_usuario($usuario,$contrasena,$negocio){

        if(empty($usuario) || empty($contrasena) || empty($negocio))  return [ "status" => "error", "message" => "Campos vacios"];
        
        $query = "SELECT * FROM usuarios WHERE usuario = ?";
        $query = $this->db->prepare($query);
        $query->bindValue(1,$usuario);
        $query->execute();

        if($query->rowCount() > 0) return [ "status" => "error", "message" => "Ya existe el usuario"];

        $sql = 'INSERT INTO usuarios(usuario,contrasena,negocio, fecha_creacion, fecha_modificacion) VALUES(?,?,?,now(),now())';
        $sql = $this->db->prepare($sql);

        $contrasenaEncriptada = password_hash($contrasena,PASSWORD_DEFAULT);

        $sql->bindValue(1,$usuario);
        $sql->bindValue(2,$contrasenaEncriptada);
        $sql->bindValue(3,$negocio);
        $sql->execute();

        return [ "status" => "success", "message" => "El usuario se agrego correctamente."];
    
    }

    public function editar_usuario($id,$negocio){

        if(empty($negocio))  return [ "status" => "error", "message" => "Campos vacios"];

        $sql = 'UPDATE usuarios SET negocio = ? WHERE id = ?';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$negocio);
        $sql->bindValue(2,$id);
        $sql->execute();
        return [ "status" => "success", "message" => "El usuario se edito correctamente."];
    
    }

    public function eliminar_usuario($id){

        $sql = 'DELETE FROM usuarios WHERE id = ?';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();

        return [ "status" => "success", "message" => "El usuario se elimino correctamente."];

    }

    public function login_admin($usuario, $contrasena)
    {
        
        if (empty($usuario) || empty($contrasena)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios."
            ];
            
        } else {
            $sql = "SELECT * FROM usuarios WHERE usuario = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $usuario);
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
                        $_SESSION['usuario']     = $data['usuario'];
                        $_SESSION['negocio']     = $data['negocio'];
                        
                        $response = [
                            "status" => "success",
                            "url" => "main?modulo=dashboard"
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