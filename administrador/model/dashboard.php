<?php

class Dashboard extends Conectar
{

    private $db;

    public function __construct()
    {
        $this->db = Conectar::conexion();
    }

    public function listar()
    {
        $negocios = "SELECT count(*) negocios FROM negocios where estado in (1,3)";
        $negocios = $this->db->prepare($negocios);
        $negocios->execute();
        
        $cantidad_negocios = $negocios->fetch(PDO::FETCH_ASSOC);

        $autos = "SELECT count(*) autos FROM autos";
        $autos = $this->db->prepare($autos);
        $autos->execute();
        
        $cantidad_autos = $autos->fetch(PDO::FETCH_ASSOC);

        $autopartes = "SELECT count(*) autopartes FROM autopartes";
        $autopartes = $this->db->prepare($autopartes);
        $autopartes->execute();
        
        $cantidad_autopartes = $autopartes->fetch(PDO::FETCH_ASSOC);

        $contador = [ $cantidad_negocios ? $cantidad_negocios['negocios'] : 0, $cantidad_autos ? $cantidad_autos['autos'] : 0, $cantidad_autopartes ? $cantidad_autopartes['autopartes'] : 0];

        return $contador;

    }


}
