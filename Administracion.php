<?php

include_once "Empleado.php";

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['dni'];
$sexo=$_POST['sexo'];
$legajo=$_POST['legajo'];
$sueldo=$_POST['sueldo'];
$path = $_FILES['foto']['name'];

$tipo = (pathinfo($path, PATHINFO_EXTENSION));
$nuevoNombre = $dni."-".$apellido.".".$tipo;
$destino = "fotos/".$nuevoNombre;

$uploadOk = TRUE;

if(file_exists($destino))
{
    echo "El archivo ya exite. Verifique!!\n";
    $uploadOk = FALSE;
}

if($_FILES['foto']['size']>1000000)
{
    echo "Foto Demasiado Grande!!Verifique.\n";
    $uploadOk = FALSE;
}

$esImagen = getimagesize($_FILES['foto']['tmp_name']);

if($esImagen ===FALSE)
{
    echo "El archivo no es una imagen. Verifique\n";
    $uploadOk =FALSE;
}

if($tipo != "jpg" && $tipo != "png" && $tipo != "bmp" && $tipo != "gif" && $tipo != "jpeg")
{
    echo "Extension Invalida\n";
    $uploadOk = FALSE;
}

if(!($nombre==NULL || $apellido==NULL || $dni==NULL || $sexo==NULL || $legajo==NULL || $sueldo==NULL || $path == NULL))
{
    
    if($uploadOk === FALSE)
    {
        echo "No se pudo subir el archivo";
    }
    else
    {
        $empleado= new Empleado($nombre, $apellido, $dni, $sexo, $legajo, $sueldo);
        $empleado->setPath($nuevoNombre);
        if(move_uploaded_file($_FILES['foto']['tmp_name'], $destino))
            echo "Se ha subido el archivo ".basename($destino)." correctamente\n";
        if(Empleado::Guardar($empleado))
            echo "Se ha actualizado el archivo\n";
    }
}

else
    echo "Algun dato esta vacio\n";

?>