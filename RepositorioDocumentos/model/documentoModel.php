<?php
    class Documento{
        public $docNombre;
        public $docDescripcion;
        public $docTamanio;
        public $docFecha;
        public $docTipo;
        public function __construct($docNombre, $docDescripcion, $docTamanio, $docFecha, $docTipo){
            $this -> docNombre = $docNombre;
            $this -> docDescripcion = $docDescripcion;
            $this -> docTamanio = $docTamanio;
            $this -> docFecha = $docFecha;
            $this -> docTipo = $docTipo;
        }
    }

?>