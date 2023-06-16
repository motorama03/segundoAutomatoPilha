<?php

$F = array(2);

$delta = array( 'q0,a,Z0' => 'q0,A,Z0',
                'q0,b,Z0' => 'q0,B,Z0',
                'q0,b,B'  => 'q0,B,B',
                'q0,a,A'  => 'q0,A,A',
                'q0,X,B'  => 'q1,B',
                'q0,X,A'  => 'q1,A',
                'q1,X,A'  => 'q1,A',
                'q1,a,A'  => 'q1,E',
                'q1,E,Z0' => 'q2,Z0',
                'q1,a,Z0' => 'q2,Z0',
                'q1,b,Z0' => 'q2,Z0');


require_once('Pilha.php');
$p = new Pilha(10);
$p ->empilhar('Z0');
$estado = 'q0'; // estado inicial
$entrada = 'aXaE';
$i = 0;

while($i < strlen($entrada)){
    $index = $estado.','.$entrada[$i].','.$p->getTopo();
    if (isset($delta[$index])) {
        $trans = $delta[$index];
    } else {
        $trans = null;
    }

    print($p->__toString());
    $trans = $delta[$estado.','.$entrada[$i].','.$p->getTopo()];
    if(!$trans) break;
    $result = explode(',',$trans);
    $estado = $result[0];
    $valor = $result[1];
    if($valor == 'E')
        $p->desempilhar();
    else{
        $p->desempilhar();
        $elementos = explode('.',$valor);
        for($j = count($elementos)-1;$j>=0;$j--){
            $p->empilhar($elementos[$j]);
        }
    }
    $i +=1;
}

if(in_array($estado,$F))
    print("\nLinguagem Aceita");
else
    print("\nLinguagem não aceita");

?>


/** @var array<string, array<string>> $delta */
$delta = array(
    "0,a,Z" => array("q0", "AZ"),
    "0,b,Z" => array("q0", "BZ"),
    "0,a,A" => array("q0", "AA"),
    "0,b,A" => array("q0", "BA"),
    "0,a,B" => array("q0", "AB"),
    "0,b,B" => array("q0", "BB"),
    "0,X,Z" => array("q1", "Z"),
    "1,a,A" => array("q1", ""),
    "1,b,B" => array("q1", ""),
    "1,,Z" => array("q3", "")
);