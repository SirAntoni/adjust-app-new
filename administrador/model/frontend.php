<?php

class Frontend extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar_marcas()
    {
        $sql = "SELECT * FROM marcas WHERE estado = 1";
        $sql = $this->db->prepare($sql);
    
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
        
        $sql = "SELECT * FROM modelos WHERE marca_id = ? and tipo_id = ? and estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $marca);
        $sql->bindValue(2, $tipo);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function listar_anios($marca,$tipo,$modelo)
    {
        $sql = "SELECT an.id id, an.anio FROM autos au INNER JOIN anios an ON au.anio_id = an.id WHERE au.marca_id = ? AND au.tipo_id = ? AND au.modelo_id = ? AND an.estado = 1";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(1,$marca);
        $sql->bindValue(2,$tipo);
        $sql->bindValue(3,$modelo);       
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscar($marca,$tipo,$modelo,$anio,$negocio)
    {
        
        $sql = "SELECT * FROM autos WHERE marca_id = ? AND tipo_id = ? AND modelo_id = ? AND anio_id = ? AND negocio_id = ? AND estado = 1 AND color_uuid IS NOT NULL";

        $sql = $this->db->prepare($sql);
        $sql->bindValue(1, $marca);
        $sql->bindValue(2, $tipo);
        $sql->bindValue(3, $modelo);
        $sql->bindValue(4, $anio);
        $sql->bindValue(5, $negocio);
        $sql->execute();

        return $sql->fetchAll(PDO::FETCH_ASSOC);
        
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

        $color = "SELECT * FROM colores WHERE auto_uuid = ?";
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


}
