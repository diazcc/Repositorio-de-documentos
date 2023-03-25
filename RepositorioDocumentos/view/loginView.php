<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="../src/estilos/styleSesion.css">
</head>
<body>
    <div class="cuerpo">
        <div class="form">
            <?php
                require_once "../controller/controlLogin.php";
                $ctlrLog = new ControlLogin;
                $alerta = "";

                if (isset($_POST['botIniciarSesion'])) {
                    $usuNombre = $_POST['inputNombre'];
                    $usuContraseña = $_POST['inputContraseña'];
                    if ($usuNombre== "" or $usuContraseña== "" ) {
                        $alerta =  "Los campos estan vacios";
                    }else {
                        if ($ctlrLog->validarUsuario($usuNombre, $usuContraseña)) {
                            header("Location:repositorioView.php");
                        }else{
                            $alerta = "Los datos ingresados son incorrectos";
                        }
                    }
                }
                if (isset($_POST['botRegistrar'])) {
                    header("Location:registrarView.php");
                }
            ?>
            <form action="" method="post">
                <p class="alerta"><?php echo $alerta; ?></p>
                <h1>Iniciar sesion</h1>
                <p>Nombre de usuario</p>
                <input type="text" name="inputNombre" id="inputNombre">
                <p>Contraseña</p>
                <input type="text" name="inputContraseña" id="inputContraseña">
                <p></p>
                <input type="submit" value="Iniciar sesion" id="botIniciarSesion" name="botIniciarSesion" class="bot">
                <p></p>
                <input type="submit" value="Registrarse" id="botRegistrar" name="botRegistrar">
            </form>
        </div>
    </div>
</body>
</html>