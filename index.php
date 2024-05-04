<?php

// Interfaz para objetos manejables
interface Manejable {
    public function conducir();
}

// Clase base Vehiculo que implementa la interfaz Manejable
abstract class Vehiculo implements Manejable {
    protected $marca;
    protected $modelo;
    protected $color;

    public function __construct($marca, $modelo, $color) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->color = $color;
    }

    abstract public function conducir();
}

// Clases hijas que extienden Vehiculo y también implementan Manejable
class Automovil extends Vehiculo {
    private $puertas;

    public function __construct($marca, $modelo, $color, $puertas) {
        parent::__construct($marca, $modelo, $color);
        $this->puertas = $puertas;
    }

    public function conducir() {
        echo "Conduciendo automóvil $this->marca $this->modelo\n";
    }
}

class Motocicleta extends Vehiculo {
    private $cilindrada;

    public function __construct($marca, $modelo, $color, $cilindrada) {
        parent::__construct($marca, $modelo, $color);
        $this->cilindrada = $cilindrada;
    }

    public function conducir() {
        echo "Conduciendo motocicleta $this->marca $this->modelo\n";
    }
}

class Camion extends Vehiculo {
    private $carga;

    public function __construct($marca, $modelo, $color, $carga) {
        parent::__construct($marca, $modelo, $color);
        $this->carga = $carga;
    }

    public function conducir() {
        echo "Conduciendo camión $this->marca $this->modelo\n";
    }
}

// Clase Conductor que acepta objetos que implementan Manejable
class Conductor {
    public function manejar(Manejable $vehiculo) {
        $vehiculo->conducir();
    }
}

// Ejemplo de uso:

$automovil = new Automovil("Toyota", "Corolla", "Rojo", 4);
$motocicleta = new Motocicleta("Honda", "XBlade", "Negro", 600);
$camion = new Camion("Kenworth", "T680", "Azul", 20000);

$conductor = new Conductor();

// Los objetos Automovil, Motocicleta y Camion son pasados al método manejar(),
// que acepta cualquier objeto que implemente la interfaz Manejable.
$conductor->manejar($automovil);
echo "\n| <br />";
$conductor->manejar($motocicleta);
echo "\n| <br />";
$conductor->manejar($camion);
echo "\n| <br />";

?>
