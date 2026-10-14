<?php

class Pessoa {
    public $nome;
    public $idade;
    public $email;

    public function __construct($nome, $idade, $email) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->email = $email;
    }

    public function apresentar() {
        echo "Nome: " . $this->nome . PHP_EOL;
        echo "Idade: " . $this->idade . PHP_EOL;
        echo "E-mail: " . $this->email . PHP_EOL;
    }
}

class Aluno extends Pessoa {
    public $matricula;
    public $curso;

    public function __construct($nome, $idade, $email, $matricula, $curso) {
        parent::__construct($nome, $idade, $email);
        $this->matricula = $matricula;
        $this->curso = $curso;
    }

    public function estudar() {
        echo $this->nome . " está estudando." . PHP_EOL;
    }
}

class Professor extends Pessoa {
    public $especialidade;
    public $salario;

    public function __construct($nome, $idade, $email, $especialidade, $salario) {
        parent::__construct($nome, $idade, $email);
        $this->especialidade = $especialidade;
        $this->salario = $salario;
    }

    public function ministrarAula() {
        echo $this->nome . " está ministrando uma aula de "
            . $this->especialidade . "." . PHP_EOL;
    }
}

$aluno1 = new Aluno("João", 20, "joao@email.com", "A001", "Sistemas de Informação");
$aluno2 = new Aluno("Maria", 22, "maria@email.com", "A002", "Análise de Sistemas");
$professor = new Professor("Pedro", 40, "pedro@email.com", "Programação", 5000);

echo "=== ALUNO 1 ===" . PHP_EOL;
$aluno1->apresentar();
echo "Matrícula: " . $aluno1->matricula . PHP_EOL;
echo "Curso: " . $aluno1->curso . PHP_EOL;
$aluno1->estudar();

echo PHP_EOL . "=== ALUNO 2 ===" . PHP_EOL;
$aluno2->apresentar();
echo "Matrícula: " . $aluno2->matricula . PHP_EOL;
echo "Curso: " . $aluno2->curso . PHP_EOL;
$aluno2->estudar();

echo PHP_EOL . "=== PROFESSOR ===" . PHP_EOL;
$professor->apresentar();
echo "Especialidade: " . $professor->especialidade . PHP_EOL;
echo "Salário: R$ " . number_format($professor->salario, 2, ",", ".") . PHP_EOL;
$professor->ministrarAula();

// apresentar() funciona porque Aluno e Professor herdam de Pessoa.

?>

\\Explicação: o método apresentar() foi declarado em Pessoa. Como Aluno e Professor 
utilizam extends Pessoa, as duas subclasses podem chamar esse método sem precisar reescrevê-lo.