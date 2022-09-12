<?php
//PHP Playground: https://www.tehplayground.com/Pd6CKT3opb1YKvTu
error_reporting(E_ERROR | E_PARSE);

$value = "5LABS: SEMPRE A FRENTE";
$word = [];
$result = [];
$final = null;

$x = strlen($value); //22
$y = 0;
$z = 0;

//Separa as palavras da frase
while ($y < $x) {
	if ($value[$y] == " ") {
    	$z++;
    } else {
    	$word[$z] = $word[$z] . $value[$y]; //Palavra = Palavra + Letra
    }
    
    $y++;
}

$y = 0;

//$word = ["5LABS:", "SEMPRE", "A", "FRENTE"]
foreach ($word as $value) {
	$x = strlen($value);

	//Inverte as letras da palavra
	while ($x >= 0) {
    	$result[$y] = $result[$y] . $value[$x]; //Palavra = Palavra + Última Letra
      	$x--;
  	}
    
	//Monta a frase novamente
	//$result = [":SBAL5", "ERPMES", "A", "ETNERF"]
    if ($final != null) {
    	$final = $final . " " . $result[$y];
    } else {
    	$final = $result[$y];
    }
    $y++;
}

print_r($final); //Imprime a frase - :SBAL5 ERPMES A ETNERF
?>