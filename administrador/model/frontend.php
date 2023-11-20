<?php

class Frontend extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_marcas($negocio)
    {
        
        if($negocio === '2' || $negocio === '3' || $negocio === '4'){
            $sql = "SELECT * FROM marcas WHERE estado = 1 AND negocio_id = 2";
            $sql = $this->db->prepare($sql);
        }else{
            $sql = "SELECT * FROM marcas WHERE estado = 1 AND negocio_id = ?";
            $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $negocio);
        }
       
        
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listar_tipos()
    {
        $sql = "SELECT * FROM tipos WHERE estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function listar_modelos($marca,$tipo)
    {
        if($tipo === 'todos'){
            $sql = "SELECT * FROM modelos WHERE marca_id = ? and estado = 1";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $marca);
        }else{
            $sql = "SELECT * FROM modelos WHERE marca_id = ? and tipo_id = ? and estado = 1";
            $sql = $this->db->prepare($sql);
            $sql->bindValue(1, $marca);
            $sql->bindValue(2, $tipo);
        }
    
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function listar_anios($marca,$modelo,$negocio)
    {

        $sql = "SELECT * FROM autos WHERE marca_id = ? AND modelo_id = ? AND negocio_id = ? AND estado = 1";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$marca);
        $sql->bindValue(2,$modelo);
        $sql->bindValue(3,$negocio);
        $sql->execute();
        $autos = $sql->fetchAll(PDO::FETCH_ASSOC);

        $anios = [];

        foreach ($autos as $auto) {
            
            $buscar_autos = 'SELECT auto_uuid,anio FROM autos_anios WHERE auto_uuid = ?';
            $buscar_autos = $this->db->prepare($buscar_autos);
            $buscar_autos->bindValue(1,$auto['uuid']);
            $buscar_autos->execute();
            $anios_nuevo = $buscar_autos->fetchAll(PDO::FETCH_ASSOC);
            array_push($anios,$anios_nuevo);

        }

        return $anios;
        
    }

    public function buscar($uuid)
    {
        
        $sql = "SELECT * FROM autos WHERE uuid = ? AND color_uuid IS NOT NULL";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $uuid);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function cargar_web($negocio)
    {
        $buscar = "SELECT * FROM negocios WHERE razon_social = ?";
        $buscar = $this->db->prepare($buscar);
        $buscar->bindValue(1, $negocio);
        $buscar->execute();
        $negocio = $buscar->fetch(PDO::FETCH_ASSOC);

        if($negocio){
            $web = "SELECT * FROM web WHERE negocio = ?";
            $web =  $this->db->prepare($web);
            $web->bindValue(1,$negocio['id']);
            $web->execute();
            return $web->fetch(PDO::FETCH_ASSOC);
        }else{
            $response = [
                "status" => "error",
                "message" => "Campos vacios"
            ];
            
            return $response;
        }

        
        
    }

    public function cargar_filtros($negocio)
    {
        $buscar = "SELECT * FROM negocios WHERE razon_social = ?";
        $buscar = $this->db->prepare($buscar);
        $buscar->bindValue(1, $negocio);
        $buscar->execute();
        $negocio = $buscar->fetch(PDO::FETCH_ASSOC);

        if($negocio){
            $web = "SELECT * FROM filtros WHERE negocio = ?";
            $web =  $this->db->prepare($web);
            $web->bindValue(1,$negocio['id']);
            $web->execute();
            return $web->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $response = [
                "status" => "error"
            ];
            
            return $response;
        }
    }

    public function cargar_ultimo_registro($negocio)
    {
        $buscar = "SELECT * FROM negocios WHERE razon_social = ?";
        $buscar = $this->db->prepare($buscar);
        $buscar->bindValue(1, $negocio);
        $buscar->execute();
        $negocio = $buscar->fetch(PDO::FETCH_ASSOC);

        if($negocio){
            
            $registro = "SELECT * FROM autos WHERE negocio_id = ? ORDER BY id DESC LIMIT 1";
            $registro =  $this->db->prepare($registro);
            $registro->bindValue(1,$negocio['id']);
            $registro->execute();
            return $registro->fetch(PDO::FETCH_ASSOC);
        }else{
            $response = [
                "status" => "error"
            ];
            
            return $response;
        }
    }

    public function cargar_imagenes($negocio)
    {
        $buscar = "SELECT * FROM negocios WHERE razon_social = ?";
        $buscar = $this->db->prepare($buscar);
        $buscar->bindValue(1, $negocio);
        $buscar->execute();
        $negocio = $buscar->fetch(PDO::FETCH_ASSOC);

        if($negocio){
            $web = "SELECT * FROM galeria g INNER JOIN filtros f ON f.id = g.filtro WHERE g.negocio = ?";
            $web =  $this->db->prepare($web);
            $web->bindValue(1,$negocio['id']);
            $web->execute();
            return $web->fetchAll(PDO::FETCH_ASSOC);
        }else{
            $response = [
                "status" => "error"
            ];
            
            return $response;
        }
    }

    public function cargar_redes($negocio)
    {
        $buscar = "SELECT facebook,instagram,tiktok,youtube FROM negocios WHERE razon_social = ?";
        $buscar = $this->db->prepare($buscar);
        $buscar->bindValue(1, $negocio);
        $buscar->execute();
        return $buscar->fetch(PDO::FETCH_ASSOC);
        
    }

    public function obtener_auto($auto)
    {
        
        $sql = "SELECT uuid,nombre,color_uuid FROM autos WHERE uuid = ? and estado = 1";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $auto);
        $sql->execute();

        $auto = $sql->fetch(PDO::FETCH_ASSOC);
        $resultado['auto'] = $auto;

        $img = "SELECT imagen FROM imagenes WHERE color_uuid = ?";
        $img = $this->db->prepare($img);
        $img->bindValue(1, $auto['color_uuid']);
        $img->execute();
        $imagenes = $img->fetchAll(PDO::FETCH_ASSOC);

        $resultado['imagenes'] = $imagenes;

        $color = "SELECT * FROM colores WHERE auto_uuid = ? AND estado = 1";
        $color =  $this->db->prepare($color);
        $color->bindValue(1, $auto['uuid']);
        $color->execute();
        $colores = $color->fetchAll(PDO::FETCH_ASSOC);
        $resultado['colores'] = $colores;

        $categoria = "SELECT * FROM categorias WHERE auto_uuid = ?";
        $categoria =  $this->db->prepare($categoria);
        $categoria->bindValue(1, $auto['uuid']);
        $categoria->execute();
        $categorias= $categoria->fetchAll(PDO::FETCH_ASSOC);
        $resultado['categorias'] = $categorias;


        return $resultado;
        
    }

    public function mostrar_autoparte($autoparte)
    {
        
        $sql = "SELECT uuid,autoparte,stock,color_uuid FROM autopartes WHERE uuid = ? and estado = 1";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $autoparte);
        $sql->execute();

        $autoparte = $sql->fetch(PDO::FETCH_ASSOC);
        $resultado['autoparte'] = $autoparte;

        $img = "SELECT imagen FROM imagenes WHERE color_uuid = ?";
        $img = $this->db->prepare($img);
        $img->bindValue(1, $autoparte['color_uuid']);
        $img->execute();
        $imagenes = $img->fetchAll(PDO::FETCH_ASSOC);

        $resultado['imagenes'] = $imagenes;

        $color = "SELECT * FROM colores WHERE auto_uuid = ?";
        $color =  $this->db->prepare($color);
        $color->bindValue(1, $autoparte['uuid']);
        $color->execute();
        $colores = $color->fetchAll(PDO::FETCH_ASSOC);
        $resultado['colores'] = $colores;


        return $resultado;
        
    }

    public function obtener_auto_color($color){
        $sql = "SELECT imagen FROM imagenes WHERE color_uuid = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $color);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener_autopartes($categoria){
        $sql = "SELECT uuid,autoparte, cover FROM autopartes WHERE categoria_uuid = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $categoria);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtener_negocio($id){
        $sql = "SELECT * FROM negocios WHERE id = ?";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }


}