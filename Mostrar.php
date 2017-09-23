<?php
include_once "Empleado.php";

$listaEmpleados = Empleado::TraerEmpleados();

echo "<table border=1>
        <thead>
            <tr>
                <th>Apellido</th>
                <th>Nombre</th>
                <th>DNI</th>
                <th>Sueldo</th>
                <th>Legajo</th>
                <th>Sexo</th>
                <th>Foto</th>
            </tr>
        </thead>";

foreach($listaEmpleados as $empleado)
{
    echo "<tr>
        <td>".$empleado->getNombre()."</td>
        <td>".$empleado->getApellido()."</td>
        <td>".$empleado->getDNI()."</td>
        <td>".$empleado->getLegajo()."</td>
        <td>".$empleado->getSueldo()."</td>
        <td>".$empleado->getSexo()."</td>
        <td><img src='fotos/".$empleado->getPath()."' width = '100px' height = '100px'/></td>
        </tr>";
}

echo "</table>";
?>