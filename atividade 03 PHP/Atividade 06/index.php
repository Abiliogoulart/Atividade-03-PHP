<?php

class Pessoa {
    public $nome;
    public $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }

    // Método declarado na classe Pessoa.
    public function apresentar() {
        echo "Nome: " . $this->nome . PHP_EOL;
        echo "E-mail: " . $this->email . PHP_EOL;
    }
}

class Funcionario extends Pessoa {
    public $salario;
    public $matricula;

    public function __construct($nome, $email, $salario, $matricula) {
        parent::__construct($nome, $email);
        $this->salario = $salario;
        $this->matricula = $matricula;
    }

    // Método declarado na classe Funcionario.
    public function trabalhar() {
        echo $this->nome . " está trabalhando." . PHP_EOL;
    }
}

class Programador extends Funcionario {
    public $linguagemPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $linguagemPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->linguagemPrincipal = $linguagemPrincipal;
    }

    // Método declarado na classe Programador.
    public function programar() {
        echo $this->nome . " está programando em "
            . $this->linguagemPrincipal . "." . PHP_EOL;
    }
}

class Designer extends Funcionario {
    public $ferramentaPrincipal;

    public function __construct($nome, $email, $salario, $matricula, $ferramentaPrincipal) {
        parent::__construct($nome, $email, $salario, $matricula);
        $this->ferramentaPrincipal = $ferramentaPrincipal;
    }

    // Método declarado na classe Designer.
    public function criarLayout() {
        echo $this->nome . " está criando um layout usando "
            . $this->ferramentaPrincipal . "." . PHP_EOL;
    }
}

$programador = new Programador(
    "Lucas", "lucas@email.com", 5000, "F001", "PHP"
);

$designer = new Designer(
    "Mariana", "mariana@email.com", 4500, "F002", "Figma"
);

echo "=== PROGRAMADOR ===" . PHP_EOL;
$programador->apresentar();
echo "Matrícula: " . $programador->matricula . PHP_EOL;
echo "Salário: R$ "
    . number_format($programador->salario, 2, ",", ".") . PHP_EOL;
$programador->trabalhar();
$programador->programar();

echo PHP_EOL . "=== DESIGNER ===" . PHP_EOL;
$designer->apresentar();
echo "Matrícula: " . $designer->matricula . PHP_EOL;
echo "Salário: R$ "
    . number_format($designer->salario, 2, ",", ".") . PHP_EOL;
$designer->trabalhar();
$designer->criarLayout();

?>
