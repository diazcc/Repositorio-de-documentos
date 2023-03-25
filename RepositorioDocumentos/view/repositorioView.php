<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/estilos/styleRepositorio.css">
    <title>Repositorio SUNTIC</title>
    
</head>
<body>
    <div class="cuerpo">

        <div class="header">
            <h1>REPOSITORIO DE DOCUMENTOS SUNTIC S.A.S</h1>
        </div>
        <div class="central">
            <div class="formulario">
                <?php
                    require_once "../controller/controlRepositorio.php";
                    $ctlrRep = new ControlRepositorio();
                    $idt="";
                    $docNombre="";
                    $docDescripcion="";
                    $docTamanio="default";
                    $docFecha="";
                    $docTipo="pdf";
                    $alerta ="";
                    if (isset($_POST['botEnviar'])) {
                        $docNombre = $_POST['inputNombreDoc'];
                        $docDescripcion = $_POST['inputDescDoc'];
                        echo $docNombre;
                        if ($docNombre=="" or $docDescripcion=="") {
                            $alerta= "Esta vacio";
                            
                        }else {
                            if ($_FILE['selecArch']) {
                                $nombreArch = basename($_FILE['selecArch']['name']);
                                $ruta = $nombreArch;
                                $subir = move_uploaded_file($_FILE["selecArch"], $ruta);
                            }
                            $docFecha = date('y-m-d');
                            $ctlrRep->subirDocumento($docNombre, $docDescripcion, $docTamanio, $docFecha, $docTipo);
                            header("Location:repositorioView.php");
                        }
                    }
                    
                    
                ?>
                
                <p>Ingresa el documento que quieres subir</p>
                <p>Solo se puede subir archivos PDF (.pdf)</p>
                <form action="" method="post" enctype="multipart/form-data">
                    <p class="etiqueta">Nombre del archivo</p>
                    <input type="text" name="inputNombreDoc" id="inputNombreDoc">
                    <p class="etiqueta">Descripcion</p>
                    <input type="text" name="inputDescDoc" id="inputDescDoc">
                    <p></p>
                    <input type="file" name="selecArch" id="selecArch">
                    <p></p>
                    <p class="alerta"><?php echo $alerta; ?></p>
                    <input type="submit" name="botEnviar" id="botEnviar" value="Enviar">
                </form>
            </div>
            <div class="seccion">
                <?php
                    foreach ($ctlrRep -> list as $documento):
                ?>
                <div class="carddoc">
                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $documento -> docid ?>" name="id" id="id"> 
                        <p>Nombre: <?php echo $documento -> docnombre ?></p>
                        <img src="../src/img/logopdf.png" alt="" class="logo">
                        <p>Descripcion: <?php echo $documento -> docdescripcion ?></p>
                        <p>Fecha: <?php echo $documento -> docfecha ?></p>
                        <p>tamaño: <?php echo $documento -> doctamanio ?></p>
                        <a href="../controller/controlDelete.php?id=<?php echo $documento->docid?>"><input type='button' name='del' class="botDelete" id='del' value='Eliminar'></a>
                        <input type="submit" value="Editar" class="bot" name="botEditar" id="botEditar">
                        
                    </form>
                    
                </div>
                <?php
                    endforeach;
                ?>
            </div>
        </div>
    </div>

</body>
</html>