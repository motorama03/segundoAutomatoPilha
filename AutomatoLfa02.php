<?php

class Pilha
{
    private $pilha;

    public function __construct()
    {
        $this->pilha = array();
    }

    public function empilha($elemento)
    {
        array_push($this->pilha, $elemento);
    }

    public function desempilha()
    {
        if (!$this->estaVazia()) {
            array_pop($this->pilha);
        }
    }

    public function getTopo()
    {
        if (!$this->estaVazia()) {
            return end($this->pilha);
        }
        return null;
    }

    public function estaVazia()
    {
        return empty($this->pilha);
    }

    public function __toString()
    {
        return implode(" ", $this->pilha);
    }
}

$F = array(4);

$delta = array(
    array("0", "E", "Z0", "1", "Z0"),
    array("1", "E", "Z0", "2", "Z0"),
    array("2", "E", "Z0", "3", "Z0"),
    array("3", "E", "Z0", "4", "E"),
    array("1", "E", "programa", "1", "id(<declaracao>) <comandos>"),
    array("1", "E", "<comandos>", "1", "<comando> <comandos>"),
    array("1", "E", "<comandos>", "1", "<comando>"),
    array("1", "E", "<comando>", "1", "<declaracoes>"),
    array("1", "E", "<comando>", "1", "if"),
    array("1", "E", "<comando>", "1", "return"),
    array("1", "E", "<comando>", "1", "<atribuicao>"),
    array("1", "E", "<declaracoes>", "1", "id : <tipo>"),
    array("1", "E", "<tipo>", "1", "char"),
    array("1", "E", "<tipo>", "1", "int"),
    array("1", "E", "<tipo>", "1", "vetor"),
    array("1", "E", "if", "1", "if (<expressao>) { <comandos> } else { <comandos> }"),
    array("1", "E", "<expressao>", "1", "id <op> <constante>")
);

$p = new Pilha();
$p->empilha("Z0");
$estado = 0;
$entrada = "programa id(id: int){ id: int; if (id > 0){ id = id / 2; } else{ id = 0; } return id;";

$i = 0;

while ($i < strlen($entrada)) {
    echo $p . "\n";
    $trans = null;
    foreach ($delta as $d) {
        if ($d[0] === (string) $estado && $d[1] === $entrada[$i] && $d[2] === $p->getTopo()) {
            $trans = $d[3];
            break;
        }
    }
    if ($trans === null) {
        break;
    }
    $estado = (int) $trans;
    $p->desempilha();
    if ($trans !== "E") {
        $elementos = explode(" ", $trans);
        for ($j = count($elementos) - 1; $j >= 0; $j--) {
            $p->empilha($elementos[$j]);
        }
    }
    $i++;
}

function contains($arr, $target)
{
    foreach ($arr as $num) {
        if ($num === $target) {
            return true;
        }
    }
    return false;
}

if (contains($F, $estado) && $p->estaVazia()) {
    echo "\nLinguagem Não Aceita\n";
} else {
    echo "\nLinguagem Aceita\n";
}
