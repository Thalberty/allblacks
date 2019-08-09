<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

/////////////CRIANDO UM NOVO ARQUIVO///////////////
// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');
///////////////////////////////////////////////////


// $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
// /**  Load $inputFileName to a Spreadsheet Object  **/
// $spreadsheet = $reader->load('write.xlsx');

$arquivoXml = simplexml_load_file('clientes.xml');

// var_dump($arquivoXml);

$torcedores = $arquivoXml->torcedor[0]["nome"];

echo $torcedores;

// // require __DIR__ . '/../Header.php';

$inputFileType = 'Xlsx';
// $inputFileName = 'write.xlsx';
$inputFileName = 'clientes.xlsx';

$reader = IOFactory::createReader($inputFileType);
$spreadsheet = $reader->load($inputFileName);
$dados = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

// var_dump($dados);

echo "Dados \n\n";
echo $dados[1]["A"]."\n";
echo $dados[2]["A"]."\n";
echo $dados[3]["B"]."\n";

$insereLinha = 1;

while (!empty($dados[$insereLinha]["A"])){
    $insereLinha++;
} 

echo "linha: ".$insereLinha."\n";

// $letras = ["A","B"];

$cel[0] = "A".$insereLinha;
$cel[1] = "B".$insereLinha;
$cel[2] = "C".$insereLinha;
$cel[3] = "D".$insereLinha;
$cel[4] = "E".$insereLinha;
$cel[5] = "F".$insereLinha;
$cel[6] = "G".$insereLinha;
$cel[7] = "H".$insereLinha;
$cel[8] = "I".$insereLinha;
$cel[9] = "J".$insereLinha;

$numTorcedores = 0;

// $campos = ["nome","documento"];

while($arquivoXml->torcedor[$numTorcedores] != NULL){
    $torcedor[$numTorcedores][0] = $arquivoXml->torcedor[$numTorcedores]["nome"];
    $torcedor[$numTorcedores][1] = $arquivoXml->torcedor[$numTorcedores]["documento"];
    $torcedor[$numTorcedores][2] = $arquivoXml->torcedor[$numTorcedores]["cep"]; 
    $torcedor[$numTorcedores][3] = $arquivoXml->torcedor[$numTorcedores]["endereco"];
    $torcedor[$numTorcedores][4] = $arquivoXml->torcedor[$numTorcedores]["bairro"];
    $torcedor[$numTorcedores][5] = $arquivoXml->torcedor[$numTorcedores]["cidade"];
    $torcedor[$numTorcedores][6] = $arquivoXml->torcedor[$numTorcedores]["uf"];
    $torcedor[$numTorcedores][7] = $arquivoXml->torcedor[$numTorcedores]["telefone"];
    $torcedor[$numTorcedores][8] = $arquivoXml->torcedor[$numTorcedores]["email"];
    $torcedor[$numTorcedores][9] = $arquivoXml->torcedor[$numTorcedores]["ativo"];

    $numTorcedores++;
}

$maxTorcedores = $numTorcedores;
$numTorcedores = 0;

////////////////Escrevendo em um arquivo existente//////////
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileName);

$worksheet = $spreadsheet->getActiveSheet();

for($numCel = 0; $numCel < 10; $numCel++){
    $worksheet->getCell($cel[$numCel])->setValue($torcedor[$numTorcedores][$numCel]);
}

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('write.xlsx');
////////////////////////////////////////////////////////////
