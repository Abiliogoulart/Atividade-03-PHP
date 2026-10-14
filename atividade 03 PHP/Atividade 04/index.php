<?php

class Produto {
    public $nome;
    public $preco;
    public $codigo;

    public function __construct($nome, $preco, $codigo) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->codigo = $codigo;
    }

    public function exibirProduto() {
        echo "Produto: " . $this->nome . PHP_EOL;
        echo "Código: " . $this->codigo . PHP_EOL;
        echo "Preço: R$ " . number_format($this->preco, 2, ",", ".") . PHP_EOL;
    }

    public function aplicarDesconto($percentual) {
        if ($percentual < 0 || $percentual > 100) {
            echo "Desconto inválido: informe um percentual entre 0 e 100."
                . PHP_EOL;
            return;
        }

        $this->preco -= $this->preco * ($percentual / 100);

        echo "Desconto de " . $percentual . "% aplicado com sucesso."
            . PHP_EOL;
        echo "Novo preço: R$ "
            . number_format($this->preco, 2, ",", ".") . PHP_EOL;
    }
}

class Livro extends Produto {
    public $autor;
    public $isbn;

    public function __construct($nome, $preco, $codigo, $autor, $isbn) {
        parent::__construct($nome, $preco, $codigo);
        $this->autor = $autor;
        $this->isbn = $isbn;
    }
}

class Eletronico extends Produto {
    public $marca;
    public $garantiaMeses;

    public function __construct($nome, $preco, $codigo, $marca, $garantiaMeses) {
        parent::__construct($nome, $preco, $codigo);
        $this->marca = $marca;
        $this->garantiaMeses = $garantiaMeses;
    }
}

$livro = new Livro("PHP para Iniciantes", 100, "L001", "João Silva", "123456");
$eletronico = new Eletronico("Notebook", 2000, "E001", "ASUS", 12);

echo "=== LIVRO ===" . PHP_EOL;
$livro->exibirProduto();
echo "Autor: " . $livro->autor . PHP_EOL;

echo "Testando desconto válido:" . PHP_EOL;
$livro->aplicarDesconto(10);

echo PHP_EOL . "=== ELETRÔNICO ===" . PHP_EOL;
$eletronico->exibirProduto();
echo "Marca: " . $eletronico->marca . PHP_EOL;
echo "Garantia: " . $eletronico->garantiaMeses . " meses" . PHP_EOL;

echo "Testando desconto válido:" . PHP_EOL;
$eletronico->aplicarDesconto(15);

echo PHP_EOL . "Testando desconto inválido:" . PHP_EOL;
$precoAnterior = $eletronico->preco;
$eletronico->aplicarDesconto(-10);

echo "Preço anterior: R$ "
    . number_format($precoAnterior, 2, ",", ".") . PHP_EOL;
echo "Preço atual: R$ "
    . number_format($eletronico->preco, 2, ",", ".") . PHP_EOL;

?>

\\O código aceita descontos de 0% a 100%. Valores fora desse intervalo são recusados.