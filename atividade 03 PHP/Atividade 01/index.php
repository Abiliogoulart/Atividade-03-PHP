<?php

class Veiculo {
    public $marca;
    public $modelo;
    public $ano;

    public function __construct($marca, $modelo, $ano) {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function exibirDados() {
        echo "Marca: " . $this->marca . PHP_EOL;
        echo "Modelo: " . $this->modelo . PHP_EOL;
        echo "Ano: " . $this->ano . PHP_EOL;
    }
}

class Carro extends Veiculo {
    // Atributos herdados: marca, modelo e ano.
    // Atributo específico: quantidadePortas.
    public $quantidadePortas;

    public function __construct($marca, $modelo, $ano, $quantidadePortas) {
        parent::__construct($marca, $modelo, $ano);
        $this->quantidadePortas = $quantidadePortas;
    }
}

class Moto extends Veiculo {
    // Atributos herdados: marca, modelo e ano.
    // Atributo específico: cilindradas.
    public $cilindradas;

    public function __construct($marca, $modelo, $ano, $cilindradas) {
        parent::__construct($marca, $modelo, $ano);
        $this->cilindradas = $cilindradas;
    }
}

$carro = new Carro("Toyota", "Corolla", 2024, 4);
$moto = new Moto("Honda", "CB 500", 2023, 500);

echo "=== CARRO ===" . PHP_EOL;
$carro->exibirDados();
echo "Quantidade de portas: " . $carro->quantidadePortas . PHP_EOL;

echo PHP_EOL . "=== MOTO ===" . PHP_EOL;
$moto->exibirDados();
echo "Cilindradas: " . $moto->cilindradas . " cc" . PHP_EOL;

?>