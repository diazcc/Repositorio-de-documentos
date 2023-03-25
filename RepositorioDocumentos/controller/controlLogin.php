<?php
    require_once "../model/usuarioModel.php";
    require_once "../model/conexionModel.php";
    class ControlLogin extends Usuario{
        private $conex;
        private $list;
        public function __construct(){
            $this-> conex = Conectar::conexion();
            $this -> list  = $this -> conex -> query("SELECT * FROM usuario;")->fetchAll(PDO::FETCH_OBJ); 
        }
        public function validarUsuario($nombreUsuario, $contraseña){
            $usuario = "";
            $list =  $this -> conex -> query("SELECT usunombre, usucontraseña FROM usuario WHERE usunombre = '$nombreUsuario'")->fetchAll(PDO::FETCH_OBJ); 
            foreach ($list as $usuario):endforeach;
            if ($usuario->usunombre==$nombreUsuario && $usuario -> usucontraseña == $contraseña) {
                $val = true;
            }else{$val = false;}
            return $val;
        }

        public function crearUsuario($nombreUsuario, $contraseña){
            $this->conex->query("INSERT INTO usuario (usunombre, usucontraseña) VALUES ('$nombreUsuario', '$contraseña');");
        }
    }
?>