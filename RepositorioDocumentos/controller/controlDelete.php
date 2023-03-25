<?php

    require_once "../model/conexionModel.php";
    $conexion = Conectar::conexion();

    $id = $_GET["id"];
    $conexion->query("DELETE FROM documentos WHERE docid='$id'");
    header("Location:../view/repositorioView.php");

?>