<?php
class Conectar
{
    protected $dbh;
    public function conexion()
    {
       
        try {

            if($_SERVER['SERVER_NAME'] == "v1.adjustapp.store"){
                $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=adjust_v1","adjust_v1",'cO?a-lDz7044pbP/l#$c');
            }else{
                $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=adjust","root","123456");
            }
           
             $conectar->query("SET NAMES 'utf8'");
           
            return $conectar;
            
        } catch (Exception $e) {

            print "¡Error!: " . $e->getMessage() . "<br/>";
           die();  
            
        }
    }
}
