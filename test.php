<?php
 include_once "Fabrica.php";

$empleado = new Empleado("pepe", "lopez", 35329414, "m", 123, 1500);
$empleado2 = new Empleado("Carlos", "Garcia", 1234567, "m", 10, 1700);
$fabrica = new Fabrica("La Fabrica");
//echo ($empleado->ToString());
$fabrica->AgregarEmpleado($empleado);
$fabrica->AgregarEmpleado($empleado2);
//print_r($fabrica);

echo ($fabrica->CalcularSueldos())."<br>";
$fabrica->ToString();
echo "--------------------<br>";
$fabrica->EliminarEmpleado($empleado);
$fabrica->ToString();
echo "--------------------<br>";
$fabrica->AgregarEmpleado($empleado);
$fabrica->AgregarEmpleado($empleado2);

$fabrica->ToString();


?>