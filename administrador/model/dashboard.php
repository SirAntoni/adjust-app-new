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
        $negocios = "SELECT count(*) negocios FROM negocios";
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

        $contador = [ $cantidad_negocios['negocios'],$cantidad_autos['autos'],$cantidad_autopartes['autopartes']];

        return $contador;

    }


}
