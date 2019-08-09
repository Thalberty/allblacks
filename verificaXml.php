<?php


$arquivoXml = simplexml_load_file('clientesTeste.xml');

var_dump($arquivoXml);

echo "Objeto: \n\n";

$torcedores = $arquivoXml->torcedor[0]["nome"];
var_dump($torcedores);

echo "doc: \n\n";
$torcedores = $arquivoXml->torcedor[0]["documento"];
var_dump($torcedores);

// $torcedores = json_encode($torcedores);





echo "Pronto. Ok\n\n";


// echo "<pre>";
// print_r($array);
// echo "</pre>";