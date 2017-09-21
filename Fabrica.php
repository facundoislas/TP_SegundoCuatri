<?php

    include_once "Empleado.php";

    class Fabrica
    {

        private $_empleados;
        private $_razonSocial;

        public function __construct ($razonSocial)
        {

            $this->_razonSocial= $razonSocial;
            $this->_empleados = array();

        }


        public function AgregarEmpleado($persona)
        {
            
            array_push($this->_empleados, $persona);
            $this->_empleados = $this->EliminarEmpleadosRepetidos();
            return true;

        }

        public function CalcularSueldos()
        {

            $total=0;
            
            foreach($this->_empleados as $value)
            {
                $total = $total+$value->getSueldo();

            }

            return $total;
        }

        public function ToString()
        {
            echo $this->_razonSocial."<br>";
            foreach ($this->_empleados as $value) 
            {
                echo ($value->ToString())."<br>";
            }
        }

        public function EliminarEmpleado($persona)
        {
            
            foreach($this->_empleados as $value)
            {
                
                $i=0;
                
                if($persona == $value)
                {
                    unset($this->_empleados[$i]);
                    break;
                }
                $i++;
            }


            return $this->_empleados;
        }
        
        
        private function EliminarEmpleadosRepetidos()
        {
            $aux = array();
            $aux = array_unique($this->_empleados, SORT_REGULAR);
            return $aux;
        }

    }

?>

