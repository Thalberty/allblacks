<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

$arquivoXml = simplexml_load_file('clientes.xml');
$torcedores = $arquivoXml->torcedor[0]["nome"];

$inputFileType = 'Xlsx';
$inputFileName = 'clientes.xlsx';

$reader = IOFactory::createReader($inputFileType);
$spreadsheet = $reader->load($inputFileName);
$dados = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

$insereLinha = 1;

while (!empty($dados[$insereLinha]["A"])){
    $insereLinha++;
} 

echo "linha: ".$insereLinha."\n";

$colunas = ["A","B","C","D","E","F","G","H","I","J"]; //Array de letras para motar as colunas

for ($quantLetras = 0; $quantLetras < 10; $quantLetras++){
    $cel[$quantLetras] = $colunas[$quantLetras].$insereLinha; // montando a posicao da celula no excel com a culuna e a primeira linha nao nula
}

var_dump($cel);



$camposXml = ["nome","documento","cep","endereco","bairro","cidade","uf","telefone","email","ativo"];

$tam = sizeof($camposXml);

echo $tam;

$numTorcedor = 0;

for($numTorcedor = 0; $arquivoXml->torcedor[$numTorcedor] != NULL; $numTorcedor++){ 
    for($campo = 0; $campo < sizeof($camposXml); $campo++){
        $torcedor[$numTorcedor][$campo] = $arquivoXml->torcedor[$numTorcedor][$camposXml[$campo]];
        //$torcedores[$numTorcedor] contem todos os dados de um torcedor
        //$torcedores[$numTorcedor][0] contem o primeiro dado de um torcedor
    }
}

var_dump($torcedor);

$maxTorcedores = $numTorcedor;
$numTorcedor = 0;

////////////////Escrevendo em um arquivo existente//////////
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

$worksheet = $spreadsheet->getActiveSheet();
while($arquivoXml->torcedor[$numTorcedor] != NULL){
    for($numCel = 0; $numCel < 10; $numCel++){
        $worksheet->getCell($cel[$numCel])->setValue($torcedor[$numTorcedor][$numCel]);
        $cel[$numCel] = $colunas[$numCel].$insereLinha;
    }
    $insereLinha++;//inserir na proxima linha
    $numTorcedor++;
}

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('write.xlsx');
////////////////////////////////////////////////////////////
