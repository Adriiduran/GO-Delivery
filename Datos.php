<?php
include_once 'TrabajoDB.php';

function calculaTotal($tipo, $horas, $pedidos, $lluvia)
{
    $total = 0;

    if ($tipo == 'normal') {
        if ($lluvia != 0) {
            $horasNormales = $horas - $lluvia;
            $total += ($horasNormales * 6) + ($lluvia * 7);
        } else {
            if ($pedidos >= 16) {
                $contador = 0;
                for ($i = 1; $i <= $pedidos; $i++) {
                    if ($i % 16 == 0) {
                        $contador++;
                    }
                }

                $total = ($horas * 6) + ($contador * 5);
            } else {
                $total = $horas * 6;
            }
        }
    } else {
        $total = $horas * 6.5;
    }

    return $total;
}

class Datos
{
    private $fecha;
    private $turno;
    private $tipo;
    private $horas;
    private $pedidos;
    private $total;
    private $lluvia;

    public function __construct($fecha, $turno, $tipo, $horas, $pedidos, $lluvia)
    {
        $this->fecha = $fecha;
        $this->turno = $turno;
        $this->tipo = $tipo;
        $this->horas = $horas;
        $this->pedidos = $pedidos;
        $this->total = calculaTotal($tipo, $horas, $pedidos, $lluvia);
        $this->lluvia = $lluvia;
    }

    public function insert()
    {
        $conexion = TrabajoDB::connectDB();
        $insercion = "INSERT INTO datos VALUES ('$this->fecha','$this->turno','$this->tipo',$this->horas,$this->pedidos,$this->total,$this->lluvia)";
        $conexion->exec($insercion);
    }
    public function delete()
    {
        $conexion = TrabajoDB::connectDB();
        $borrado = "DELETE FROM datos WHERE fecha='$this->fecha' AND turno='$this->turno'";
        $conexion->exec($borrado);
    }
    public function update()
    {
        $conexion = TrabajoDB::connectDB();
        $actualiza = "UPDATE datos SET fecha='$this->fecha',turno='$this->turno',turno='$this->tipo',horas=$this->horas,pedidos=$this->pedidos,total=$this->total,lluvia=$this->lluvia WHERE fecha='$this->fecha' AND turno='$this->turno'";
        $conexion->exec($actualiza);
    }

    public function comprobarInsert()
    {
        $conexion = TrabajoDB::connectDB();
        $sql = "SELECT * FROM datos WHERE fecha='$this->fecha' AND turno='$this->turno'";
        $consulta = $conexion->query($sql);

        if (empty($consulta->fetchObject())) {
            return false;
        } else {
            return true;
        }
    }

    public static function consultarDatosPorFecha($fechaIncial, $fechaFinal)
    {
        $conexion = TrabajoDB::connectDB();
        $sql = "SELECT * FROM datos WHERE fecha >='$fechaIncial' AND fecha <= '$fechaFinal'";
        $consulta = $conexion->query($sql);

        if ($consulta->rowCount() == 0) {
            return false;
        } else {
            $datos = [];
            while ($registro = $consulta->fetchObject()) {
                $datos[] = new Datos($registro->fecha, $registro->turno, $registro->tipo, $registro->horas, $registro->pedidos, $registro->lluvia);
            }

            return $datos;
        }
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of turno
     */
    public function getTurno()
    {
        return $this->turno;
    }

    /**
     * Set the value of turno
     *
     * @return  self
     */
    public function setTurno($turno)
    {
        $this->turno = $turno;

        return $this;
    }

    /**
     * Get the value of tipo
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of horas
     */
    public function getHoras()
    {
        return $this->horas;
    }

    /**
     * Set the value of horas
     *
     * @return  self
     */
    public function setHoras($horas)
    {
        $this->horas = $horas;

        return $this;
    }

    /**
     * Get the value of pedidos
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }

    /**
     * Set the value of pedidos
     *
     * @return  self
     */
    public function setPedidos($pedidos)
    {
        $this->pedidos = $pedidos;

        return $this;
    }

    /**
     * Get the value of total
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of lluvia
     */
    public function getLluvia()
    {
        return $this->lluvia;
    }

    /**
     * Set the value of lluvia
     *
     * @return  self
     */
    public function setLluvia($lluvia)
    {
        $this->lluvia = $lluvia;

        return $this;
    }
}
