<?php

include_once "Empleado.php";

$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$dni=$_POST['dni'];
$sexo=$_POST['sexo'];
$legajo=$_POST['legajo'];
$sueldo=$_POST['sueldo'];


if(!($nombre==NULL || $apellido==NULL || $dni==NULL || $sexo==NULL || $legajo==NULL || $sueldo==NULL))
{
    $empleado= new Empleado($nombre, $apellido, $dni, $sexo, $legajo, $sueldo);

    if(Empleado::Guardar($empleado))
        echo "Se ha actualizado el archivo";

}

else
    echo "Algun dato esta vacio";

?>