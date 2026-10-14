<?php

class Funcionario {
    public $nome;
    public $cpf;
    public $salario;

    public function __construct($nome, $cpf, $salario) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->salario = $salario;
    }

    public function exibirFuncionario() {
        echo "Nome: " . $this->nome . PHP_EOL;
        echo "CPF: " . $this->cpf . PHP_EOL;
        echo "Salário: R$ " . number_format($this->salario, 2, ",", ".") . PHP_EOL;
    }
}

class Gerente extends Funcionario {
    public $setor;

    public function __construct($nome, $cpf, $salario, $setor) {
        parent::__construct($nome, $cpf, $salario);
        $this->setor = $setor;
    }

    public function realizarReuniao() {
        echo $this->nome . " está realizando uma reunião." . PHP_EOL;
    }
}

class Desenvolvedor extends Funcionario {
    public $linguagem;

    public function __construct($nome, $cpf, $salario, $linguagem) {
        parent::__construct($nome, $cpf, $salario);
        $this->linguagem = $linguagem;
    }

    public function programar() {
        echo $this->nome . " está programando em " . $this->linguagem . "." . PHP_EOL;
    }
}

$gerente = new Gerente("Carlos", "111.111.111-11", 6000, "TI");
$dev = new Desenvolvedor("Ana", "222.222.222-22", 4500, "PHP");

echo "=== GERENTE ===" . PHP_EOL;
$gerente->exibirFuncionario();
echo "Setor: " . $gerente->setor . PHP_EOL;
$gerente->realizarReuniao();

echo PHP_EOL . "=== DESENVOLVEDOR ===" . PHP_EOL;
$dev->exibirFuncionario();
echo "Linguagem: " . $dev->linguagem . PHP_EOL;
$dev->programar();

echo PHP_EOL . "=== TESTE DO MÉTODO PROGRAMAR NO GERENTE ===" . PHP_EOL;

// Gerente não possui o método programar().
if (method_exists($gerente, "programar")) {
    $gerente->programar();
} else {
    echo "Erro: o Gerente não possui o método programar()." . PHP_EOL;
    echo "Esse método foi declarado somente em Desenvolvedor." . PHP_EOL;
}

?>

\\Explicação do teste: o método programar() pertence à classe Desenvolvedor.
Como Gerente herda de Funcionario, e não de Desenvolvedor, ele não possui esse método. 
O uso de method_exists() permite verificar isso sem interromper a execução do programa.