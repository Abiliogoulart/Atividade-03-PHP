<?php

class Entrega {
    public $codigo;
    public $destino;
    public $distancia;

    public function __construct($codigo, $destino, $distancia) {
        $this->codigo = $codigo;
        $this->destino = $destino;
        $this->distancia = $distancia;
    }

    public function exibirDados() {
        echo "Código: " . $this->codigo . PHP_EOL;
        echo "Destino: " . $this->destino . PHP_EOL;
        echo "Distância: " . $this->distancia . " km" . PHP_EOL;
    }
}

class EntregaMoto extends Entrega {
    public $placa;
    public $nomeEntregador;

    public function __construct($codigo, $destino, $distancia, $placa, $nomeEntregador) {
        parent::__construct($codigo, $destino, $distancia);
        $this->placa = $placa;
        $this->nomeEntregador = $nomeEntregador;
    }

    public function realizarEntrega() {
        echo "Entrega realizada por moto com sucesso!" . PHP_EOL;
        echo "Entregador: " . $this->nomeEntregador . PHP_EOL;
        echo "Placa: " . $this->placa . PHP_EOL;
    }
}

class EntregaDrone extends Entrega {
    public $modeloDrone;
    public $autonomiaKm;

    public function __construct($codigo, $destino, $distancia, $modeloDrone, $autonomiaKm) {
        parent::__construct($codigo, $destino, $distancia);
        $this->modeloDrone = $modeloDrone;
        $this->autonomiaKm = $autonomiaKm;
    }

    public function realizarEntrega() {
        if ($this->distancia > 20) {
            echo "Entrega recusada: drones só podem realizar "
                . "entregas de até 20 km." . PHP_EOL;
            return;
        }

        if ($this->distancia > $this->autonomiaKm) {
            echo "Entrega recusada: autonomia insuficiente do drone."
                . PHP_EOL;
            return;
        }

        echo "Entrega realizada por drone com sucesso!" . PHP_EOL;
        echo "Modelo do drone: " . $this->modeloDrone . PHP_EOL;
    }
}

echo "=== HIERARQUIA DE CLASSES ===" . PHP_EOL;
echo "Entrega" . PHP_EOL;
echo "|-- EntregaMoto" . PHP_EOL;
echo "|-- EntregaDrone" . PHP_EOL;

echo PHP_EOL . "=== ENTREGA POR MOTO ===" . PHP_EOL;

$moto = new EntregaMoto(
    "M001", "Centro", 10, "ABC-1234", "João"
);

$moto->exibirDados();
echo "Placa: " . $moto->placa . PHP_EOL;
$moto->realizarEntrega();

echo PHP_EOL . "=== TESTE DE DRONE: 8 KM ===" . PHP_EOL;

$droneValido = new EntregaDrone(
    "D001", "Bairro A", 8, "Drone X", 30
);

$droneValido->exibirDados();
$droneValido->realizarEntrega();

echo PHP_EOL . "=== TESTE DE DRONE: 25 KM ===" . PHP_EOL;

$droneInvalido = new EntregaDrone(
    "D002", "Bairro B", 25, "Drone Y", 30
);

$droneInvalido->exibirDados();
$droneInvalido->realizarEntrega();

?>
