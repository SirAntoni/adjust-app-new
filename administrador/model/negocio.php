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

    public function listar_negocios($negocio){

        if($negocio === "0"){
            $sql = "SELECT id,ruc,razon_social,rango,estado, facebook, instagram, tiktok, youtube, telefono, fondo_home,fondo_home_movil, fondo_galeria, fondo_galeria_movil FROM negocios WHERE estado in (1,3)";
            $sql = $this->db->prepare($sql);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $sql = "SELECT id,ruc,razon_social,rango,estado, facebook, instagram, tiktok, youtube, telefono, fondo_home,fondo_home_movil, fondo_galeria, fondo_galeria_movil FROM negocios WHERE estado in (1,3) AND id = ?";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1,$negocio);
            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);
        }

        
    }

    public function crear_negocio($ruc,$razon_social,$contrasena,$rango,$facebook,$instagram,$tiktok,$youtube, $telefono)
    {

        if (empty($ruc)  || empty($razon_social) || empty($rango) || empty($contrasena) || empty($telefono)) {
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
        }else{
            
            $query = "SELECT * FROM negocios WHERE razon_social = ?";
            $query = $this->db->prepare($query);
            $query->bindValue(1,$razon_social);
            $query->execute();
            if($query->rowCount() > 0){
                
                $response = [
                    "status" => "error",
                    "message" => "Ya existe el negocio registrado en la base de datos."
                ];

            }else{

                    $query = "INSERT INTO negocios(ruc,razon_social,contrasena,rango,estado,facebook,instagram,tiktok,youtube,telefono,fecha_creacion,fecha_modificacion) VALUES(?,?,?,?,1,?,?,?,?,?,now(),now())";
                    $query = $this->db->prepare($query);

                    $contrasenaEncriptada = password_hash($contrasena,PASSWORD_DEFAULT);

                    $query->bindValue(1,$ruc);
                    $query->bindValue(2,$razon_social);
                    $query->bindValue(3,$contrasenaEncriptada);
                    $query->bindValue(4,$rango);
                    $query->bindValue(5,$facebook);
                    $query->bindValue(6,$instagram);
                    $query->bindValue(7,$tiktok);
                    $query->bindValue(8,$youtube);
                    $query->bindValue(9,$telefono);
                    $query->execute();


                    $crear_web = 'INSERT INTO web(negocio,nosotros,vision,mision,mapa) VALUES(?,?,?,?,?)';
                    $crear_web = $this->db->prepare($crear_web);

                    $nosotros = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus esse quaerat doloremque corrupti, aperiam, sunt tenetur iusto ut sed aliquid nihil, quo similique quia labore. Dignissimos provident voluptates animi vel!';
                    $mision = 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque molestiae ea eveniet natus esse ex ratione corrupti. Atque, incidunt dolorem. Cumque culpa pariatur dolores quia eius repellat enim doloremque dolorem!';
                    $vision = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ad cum suscipit expedita blanditiis autem itaque, optio architecto at quod. Quasi quia velit ullam natus, amet saepe! Accusamus facilis repellat quasi.';
                    $mapa ='<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3901.8071064327523!2d-77.0374173!3d-12.0567891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c8c6c76e03e5%3A0x3e12ff686b901453!2sReal%20Plaza%20Centro%20C%C3%ADvico!5e0!3m2!1ses-419!2spe!4v1697848360001!5m2!1ses-419!2spe" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';

                    $crear_web->bindValue(1,$this->db->lastInsertId());
                    $crear_web->bindValue(2,$nosotros);
                    $crear_web->bindValue(3,$mision);
                    $crear_web->bindValue(4,$vision);
                    $crear_web->bindValue(5,$mapa);
                    $crear_web->execute();

                    $response = [
                        "status" => "success",
                        "message" => "Usuario registrado con exito"
                    ];

            }
           
        }

        echo json_encode($response);
    }


    public function editar_negocio($id,$ruc,$razon_social,$contrasena,$rango,$estado,$facebook,$instagram,$tiktok,$youtube,$telefono,$cover,$cover_movil,$cover1,$cover1_movil){

        if(empty($ruc) || empty($razon_social) || empty($rango) || empty($estado) || empty($telefono)){
            
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            
        }else{
    
                if(empty($contrasena)){
                    $query = "UPDATE negocios SET  ruc= ?, razon_social = ?, rango = ?, estado = ?, facebook = ?, instagram = ?, tiktok = ?, youtube = ?,telefono = ?, fondo_home = ?,fondo_home_movil = ?, fondo_galeria = ?, fondo_galeria_movil = ?, fecha_modificacion = now() WHERE id = ?";

                    if(empty($_FILES["cover"]['name'])){
                        $nombre_img = $cover;
                    }else{
                        $nombre_img = uniqid() . "-" . $_FILES["cover"]['name'];
                        $ruta = "../../assets/images/bg/" . $nombre_img;
                        move_uploaded_file($_FILES["cover"]['tmp_name'], $ruta);
                    }

                    if(empty($_FILES["cover_movil"]['name'])){
                        $nombre_img_movil = $cover_movil;
                    }else{
                        $nombre_img_movil = uniqid() . "-" . $_FILES["cover_movil"]['name'];
                        $ruta = "../../assets/images/bg/" . $nombre_img_movil;
                        move_uploaded_file($_FILES["cover_movil"]['tmp_name'], $ruta);
                    }

                    if(empty($_FILES["cover1"]['name'])){
                        $nombre_img1 = $cover1;
                    }else{
                        $nombre_img1 = uniqid() . "-" . $_FILES["cover1"]['name'];
                        $ruta = "../../assets/images/bg/" . $nombre_img1;
                        move_uploaded_file($_FILES["cover1"]['tmp_name'], $ruta);
                    }

                    if(empty($_FILES["cover1_movil"]['name'])){
                        $nombre_img1_movil = $cover1_movil;
                    }else{
                        $nombre_img1_movil = uniqid() . "-" . $_FILES["cover1_movil"]['name'];
                        $ruta = "../../assets/images/bg/" . $nombre_img1_movil;
                        move_uploaded_file($_FILES["cover1_movil"]['tmp_name'], $ruta);
                    }

                    $query = $this->db->prepare($query);    
                    $query->bindValue(1,$ruc);
                    $query->bindValue(2,$razon_social);
                    $query->bindValue(3,$rango);
                    $query->bindValue(4,$estado);
                    $query->bindValue(5,$facebook);
                    $query->bindValue(6,$instagram);
                    $query->bindValue(7,$tiktok);
                    $query->bindValue(8,$youtube);
                    $query->bindValue(9,$telefono);
                    $query->bindValue(10,$nombre_img);
                    $query->bindValue(11,$nombre_img_movil);
                    $query->bindValue(12,$nombre_img1);
                    $query->bindValue(13,$nombre_img1_movil);
                    $query->bindValue(14,$id);
                   

                }else{

                    $query = "UPDATE negocios SET  ruc= ?, razon_social = ?,contrasena = ?, rango = ?, estado = ?, facebook = ?, instagram = ?, tiktok = ?, youtube = ?,telefono = ?,fondo_home = ?, fondo_galeria = ?, fecha_modificacion = now() WHERE id = ?";
                    $query = $this->db->prepare($query);    

                    if(empty($_FILES["cover"]['name'])){
                        $nombre_img = $cover;
                    }else{
                        $nombre_img = uniqid() . "-" . $_FILES["cover"]['name'];
                        $ruta = "../../assets/images/bg/" . $nombre_img;
                        move_uploaded_file($_FILES["cover"]['tmp_name'], $ruta);
                    }

                    if(empty($_FILES["cover1"]['name'])){
                        $nombre_img1 = $cover1;
                    }else{
                        $nombre_img1 = uniqid() . "-" . $_FILES["cover1"]['name'];
                        $ruta = "../../assets/images/bg/" . $nombre_img1;
                        move_uploaded_file($_FILES["cover1"]['tmp_name'], $ruta);
                    }


                    $contrasenaEncriptada = password_hash($contrasena,PASSWORD_DEFAULT);
                    $query->bindValue(1,$ruc);
                    $query->bindValue(2,$razon_social);
                    $query->bindValue(3,$contrasenaEncriptada);
                    $query->bindValue(4,$rango);
                    $query->bindValue(5,$estado);
                    $query->bindValue(6,$facebook);
                    $query->bindValue(7,$instagram);
                    $query->bindValue(8,$tiktok);
                    $query->bindValue(9,$youtube);
                    $query->bindValue(10,$telefono);
                    $query->bindValue(11,$nombre_img);
                    $query->bindValue(12,$nombre_img1);
                    $query->bindValue(13,$id);

                }
                
                            
                $query->execute();

                $response = [
                    "status" => "success",
                    "message" => "El usuario ha sido actualizado con exito."
                ];

        }

        echo json_encode($response);
    }

    public function duplicar_negocio($id,$ruc,$razon_social,$contrasena,$rango,$usuario){

        if($usuario !== "1") return [ "status" => "error", "message" => "Usted no tiene autorización."];

        if(empty($ruc) || empty($razon_social) || empty($contrasena) || empty($rango)) return [ "status" => "error", "message" => "Campos vacios"];
            
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

            $auto_uuid = Uuid::uuid4()->toString();

            $insertar_auto->bindValue(1,$auto_uuid);
            $insertar_auto->bindValue(2,$auto['nombre']);
            $insertar_auto->bindValue(3,$auto['marca_id']);
            $insertar_auto->bindValue(4,$auto['tipo_id']);
            $insertar_auto->bindValue(5,$auto['modelo_id']);
            $insertar_auto->bindValue(6,$auto['anio_id']);
            $insertar_auto->bindValue(7,$lastId);
            $insertar_auto->bindValue(8,$auto['color_uuid']);
            $insertar_auto->bindValue(9,$auto['estado']);
            $insertar_auto->execute();

            $buscar_categorias = "SELECT * FROM categorias WHERE auto_uuid =?";
            $buscar_categorias = $this->db->prepare($buscar_categorias);
            $buscar_categorias->bindValue(1,$auto['uuid']);
            $buscar_categorias->execute();
            $categorias = $buscar_categorias->fetchAll(PDO::FETCH_ASSOC);

            foreach ($categorias as $categoria){
                
                $insertar_categoria = "INSERT INTO categorias(uuid,categoria,cover,auto_uuid,estado,fecha_creacion,fecha_modificacion) VALUES(?,?,?,?,?,now(),now())";
                $insertar_categoria = $this->db->prepare($insertar_categoria);
                $categoria_uuid = Uuid::uuid4()->toString();

                $insertar_categoria->bindValue(1,$categoria_uuid);
                $insertar_categoria->bindValue(2,$categoria['categoria']);
                $insertar_categoria->bindValue(3,$categoria['cover']);
                $insertar_categoria->bindValue(4,$auto_uuid);
                $insertar_categoria->bindValue(5,$categoria['estado']);
                $insertar_categoria->execute();

            }

            $buscar_colores_autos = "SELECT * FROM colores WHERE auto_uuid = ?";
            $buscar_colores_autos = $this->db->prepare($buscar_colores_autos);
            $buscar_colores_autos->bindValue(1,$auto['uuid']);
            $buscar_colores_autos->execute();
            $colores_auto = $buscar_colores_autos->fetchAll(PDO::FETCH_ASSOC);

            foreach($colores_auto as $color){

                $insertar_colores_auto = "INSERT INTO colores(uuid, color, cover, auto_uuid, estado, fecha_creacion, fecha_modificacion) VALUES(?,?,?,?,?,now(),now())";
                $color_auto_uuid = Uuid::uuid4()->toString();
                $insertar_colores_auto = $this->db->prepare($insertar_colores_auto);
                $insertar_colores_auto->bindValue(1, $color_auto_uuid);
                $insertar_colores_auto->bindValue(2, $color['color']);
                $insertar_colores_auto->bindValue(3, $color['cover']);
                $insertar_colores_auto->bindValue(4, $auto_uuid);
                $insertar_colores_auto->bindValue(5, $color['estado']);
                $insertar_colores_auto->execute();

                $buscar_imagenes_auto = "SELECT * FROM imagenes WHERE color_uuid = ?";
                $buscar_imagenes_auto = $this->db->prepare($buscar_imagenes_auto);
                $buscar_imagenes_auto->bindValue(1, $color['uuid']);
                $buscar_imagenes_auto->execute();
                $imagenes_auto = $buscar_imagenes_auto->fetchAll(PDO::FETCH_ASSOC);

                foreach ($imagenes_auto as $imagen){

                    $insertar_imagen_auto = "INSERT INTO imagenes(uuid, color_uuid, imagen) VALUES(?,?,?)";
                    $insertar_imagen_auto = $this->db->prepare($insertar_imagen_auto);
                    $imagen_auto_uuid = Uuid::uuid4()->toString();
                    $insertar_imagen_auto->bindValue(1,$imagen_auto_uuid);
                    $insertar_imagen_auto->bindvalue(2,$color_auto_uuid);
                    $insertar_imagen_auto->bindValue(3,$imagen['imagen']);
                    $insertar_imagen_auto->execute();

                }


            }


        }

        return [ "status" => "success", "message" => "El usuario ha sido duplicado con exito." ];

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

                    $obtener_usuarios = 'SELECT * FROM usuarios WHERE negocio = ?';
                    $obtener_usuarios = $this->db->prepare($obtener_usuarios);
                    $obtener_usuarios->bindValue(1,$data['id']);
                    
                    $obtener_usuarios->execute();
                    $tipo = 1;
                    if($obtener_usuarios->rowCount() > 0) $tipo = 2;
                    $contrasenaEncriptada = $data['contrasena'];
                    if (password_verify($contrasena, $contrasenaEncriptada) == true) {

                        $_SESSION['id']              = $data['id'];
                        $_SESSION['ruc']              = $data['ruc'];
                        $_SESSION['razon_social']              = $data['razon_social'];
                        $_SESSION['rango']     = $data['rango'];
                        $_SESSION['estado']     = $data['estado'];
                        $_SESSION['fondo_home']     = $data['fondo_home'];
                        $_SESSION['fondo_galeria']     = $data['fondo_galeria'];
                        $_SESSION['tipo'] = $tipo;
                        
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