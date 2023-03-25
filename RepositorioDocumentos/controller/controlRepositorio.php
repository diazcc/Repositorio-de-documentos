<?php
    require_once "../model/documentoModel.php";
    require_once "../model/conexionModel.php";
    class ControlRepositorio extends Documento{
        private $conex;
        public $list;
        public function __construct(){
            $this-> conex = Conectar::conexion();
            $this -> list  = $this -> conex -> query("SELECT * FROM documentos;")->fetchAll(PDO::FETCH_OBJ); 
        }


        public function subirDocumento($docNombre, $docDescripcion, $docTamanio, $docFecha, $docTipo){
            $this -> conex -> query("INSERT INTO documentos (docnombre, docdescripcion, doctamanio, docfecha, doctipo) VALUES ('$docNombre', '$docDescripcion', '$docTamanio', '$docFecha', '$docTipo');");
        }

        public function eliminarDocumento($id){
            $this -> conex -> query("DELETE FROM `documentos` WHERE `docid` = '$id';");
        }

    }
?>