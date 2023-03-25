<?php
require_once "conexionModel.php";
    class Usuario{
        private $nombreUsuario;
        private $contraseña;
        public function __construct($nombreUsuario,$contraseña){
            $this -> nombreUsuario = $nombreUsuario;
            $this -> contraseña = $contraseña;
        }
    }
?>