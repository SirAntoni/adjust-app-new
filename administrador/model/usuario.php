<?php

class Usuarios extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
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