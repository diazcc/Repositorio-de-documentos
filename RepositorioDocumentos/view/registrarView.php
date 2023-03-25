<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar</title>
    <link rel="stylesheet" href="../src/estilos/styleSesion.css">
</head>
<body>
    <div class="cuerpo">
        <div class="form">
            <?php
            require_once "../controller/controlLogin.php";
            $ctlrLog = new ControlLogin;
            $alerta ="";
            $nombreUsuario ="";
            $contraseña ="";
                if(isset($_POST['botRegresar'])){
                    header("Location:loginView.php");
                }
                if(isset($_POST['botResgitrar'])){
                    if($_POST['inputNombre']=="" or $_POST['inputContraseña']=="" or $_POST['inputConfContraseña']==""){
                        $alerta = "No se ingresaron los datos correctamente";
                    }else{
                        if ($_POST['inputContraseña'] == $_POST['inputConfContraseña']) {
                            $nombreUsuario =  $_POST['inputNombre'];
                            $contraseña =  $_POST['inputContraseña'];
                            if ($ctlrLog->validarUsuario($nombreUsuario,$contraseña)) {
                                $alerta = "Este usuario ya existe";
                            }else{
                                $ctlrLog->crearUsuario($nombreUsuario,$contraseña);
                                header("Location:loginView.php");
                            }
                        }else{
                            $alerta = "Las contraseña no coinciden";
                        }
                    }
                }
            ?>
            <form action="" method="post">
                <h1>Crear usuario</h1>
                <input type="submit" value="<" id="botRegresar" name="botRegresar" class="bot">
                <p>Nombre de usuario</p>
                <input type="text" name="inputNombre" id="inputNombre">
                <p>Contraseña</p>
                <input type="text" name="inputContraseña" id="inputContraseña">
                <p>Confirmar Contraseña</p>
                <input type="text" name="inputConfContraseña" id="inputConfContraseña">
                <p></p>
                <input type="submit" value="Crear" id="botResgitrar" name="botResgitrar" class="bot">
                <p class="alerta"><?php echo $alerta;?></p>
            </form>
        </div>
    </div>
</body>
</html>