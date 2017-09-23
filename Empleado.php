<?php
 include_once "Persona.php";



class Empleado extends Persona
{

    protected $_legajo;
    protected $_sueldo;
    protected $_pathFoto;

    public function __construct($nombre, $apellido, $dni, $sexo, $legajo, $sueldo)
    {
        parent::__construct($nombre, $apellido, $dni, $sexo);
        $this->_legajo= $legajo;
        $this->_sueldo = $sueldo;

    }

    public function getPath()
    {
        return $this->_pathFoto;
    }

    public function setPath($foto)
    {
        $this->_pathFoto = $foto;
    }

    public function getLegajo()
    {
        return $this->_legajo;
    }

    public function getSueldo()
    {
        return $this->_sueldo;
    }

    public function Hablar($idioma)
    {

        $cadena = "El empleado habla ".$idioma;
        return $cadena;

    }

    public function ToString()
    {

        $info = parent::ToString()." - ".$this->getSueldo()." - ".$this->getLegajo()." - ".$this->Hablar("Español")." - ".$this->getPath();
        return $info;
    }


    public static function Guardar($empleado)
    {
        $flag = FALSE;
        $archivo= fopen("Archivos/empleados.txt", "a+");
        $cant = fwrite($archivo, $empleado->ToString()."\r\n");
        if($cant>0)
            $flag= TRUE;
        
        fclose($archivo);

        return $flag;
    }


    public static function TraerEmpleados()
    {

        $lista= array();
        $archivo= fopen("Archivos/empleados.txt", "r");
        while(!feof($archivo))
        {
            $archAux = fgets($archivo);
            $empleados = explode(" - ", $archAux);
            $empleados[0] = trim($empleados[0]);
            if($empleados[0]!="")
            {
                $lista[] = new Empleado ($empleados[0], $empleados[1], $empleados[2], $empleados[3], $empleados[4], $empleados[5]);
                
                foreach($lista as $value)
                {
                    $value->setPath($empleados[7]);
                }
                
                
            }
            
        }
        
        fclose($archivo);
        return $lista;

    }
}




?>