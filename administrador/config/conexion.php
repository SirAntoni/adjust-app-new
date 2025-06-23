<?php
class Conectar
{
    protected $dbh;
    public function conexion()
    {
       
        try {

            if($_SERVER['SERVER_NAME'] == "adjust-app.com"){
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=gnpufoqa_adjust","gnpufoqa_adjust","bs@TsOd39IyO");
            }else{
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=adjust","root","123456");
            }
           
             $conectar->query("SET NAMES 'utf8'");
           
            return $conectar;
            
        } catch (Exception $e) {

            print "¡Error!: " . $e->getMessage() . "<br/>";
           die();  
            
        }
    }
}
