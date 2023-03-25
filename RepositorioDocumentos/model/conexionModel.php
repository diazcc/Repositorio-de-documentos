<?php

    class Conectar{
        public static function conexion(){
            try{
                $conexion = new PDO('mysql:host=localhost; dbname=repbd', 'root', '');
                $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion -> exec("SET CHARACTER SET UTF8");
            }catch(Exception $e){
                die("error" . $e->getMessage());
                echo "Linea" . $e->getLine();
            }
            return $conexion;
        }
    }
?>
