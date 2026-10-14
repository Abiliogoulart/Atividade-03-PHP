<?php

class ContaBancaria {
    public $titular;
    public $saldo;

    public function __construct($titular, $saldo) {
        $this->titular = $titular;
        $this->saldo = $saldo;
    }

    public function depositar($valor) {
        if ($valor <= 0) {
            echo "Depósito inválido." . PHP_EOL;
            return;
        }

        $this->saldo += $valor;
        echo "Depósito de R$ "
            . number_format($valor, 2, ",", ".")
            . " realizado." . PHP_EOL;
    }

    public function sacar($valor) {
        if ($valor <= 0) {
            echo "Saque inválido." . PHP_EOL;
            return;
        }

        if ($valor > $this->saldo) {
            echo "Saque recusado: saldo insuficiente." . PHP_EOL;
            return;
        }

        $this->saldo -= $valor;
        echo "Saque de R$ "
            . number_format($valor, 2, ",", ".")
            . " realizado." . PHP_EOL;
    }

    public function consultarSaldo() {
        echo "Saldo atual: R$ "
            . number_format($this->saldo, 2, ",", ".")
            . PHP_EOL;
    }
}

class ContaCorrente extends ContaBancaria {
    public $limite;

    public function __construct($titular, $saldo, $limite) {
        parent::__construct($titular, $saldo);
        $this->limite = $limite;
    }

    public function usarLimite($valor) {
        if ($valor <= 0) {
            echo "Valor inválido para usar o limite." . PHP_EOL;
        } elseif ($valor > $this->limite) {
            echo "Operação recusada: limite excedido." . PHP_EOL;
        } else {
            $this->limite -= $valor;
            echo "Limite utilizado: R$ "
                . number_format($valor, 2, ",", ".") . PHP_EOL;
        }
    }
}

class ContaPoupanca extends ContaBancaria {
    public $taxaRendimento;

    public function __construct($titular, $saldo, $taxaRendimento) {
        parent::__construct($titular, $saldo);
        $this->taxaRendimento = $taxaRendimento;
    }

    public function aplicarRendimento() {
        $rendimento = $this->saldo * ($this->taxaRendimento / 100);
        $this->saldo += $rendimento;

        echo "Rendimento aplicado: R$ "
            . number_format($rendimento, 2, ",", ".") . PHP_EOL;
    }
}

$conta = new ContaBancaria("Carlos", 1000);

echo "=== CONTA BANCÁRIA ===" . PHP_EOL;
echo "Titular: " . $conta->titular . PHP_EOL;
$conta->consultarSaldo();

echo PHP_EOL . "=== DEPÓSITO ===" . PHP_EOL;
$conta->depositar(500);
$conta->consultarSaldo();

echo PHP_EOL . "=== SAQUE VÁLIDO ===" . PHP_EOL;
$conta->sacar(200);
$conta->consultarSaldo();

echo PHP_EOL . "=== SAQUE INVÁLIDO ===" . PHP_EOL;
$conta->sacar(2000);
$conta->consultarSaldo();

?>
