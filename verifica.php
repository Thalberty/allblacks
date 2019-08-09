<?php

require 'vendor/autoload.php';

// use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\IOFactory;

/////////////CRIANDO UM NOVO ARQUIVO///////////////
// $spreadsheet = new Spreadsheet();
// $sheet = $spreadsheet->getActiveSheet();
// $sheet->setCellValue('A1', 'Hello World !');

// $writer = new Xlsx($spreadsheet);
// $writer->save('hello world.xlsx');
///////////////////////////////////////////////////

////////////////Escrevendo em um arquivo existente//////////
// $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('write.xlsx');

// $worksheet = $spreadsheet->getActiveSheet();

// $worksheet->getCell('A1')->setValue('Thalbert');
// $worksheet->getCell('A2')->setValue('Barbosa');
// $worksheet->getCell('A3')->setValue('Miranda');

// $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
// $writer->save('write.xlsx');
////////////////////////////////////////////////////////////

// $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
// /**  Load $inputFileName to a Spreadsheet Object  **/
// $spreadsheet = $reader->load('write.xlsx');

$arquivoXml = simplexml_load_file('clientes.xml');

var_dump($arquivoXml);

use PhpOffice\PhpSpreadsheet\IOFactory;

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

if ($dados[3]["B"] == NULL){
    echo "NUUUULLLL\n";
}

// $xml = simplexml_load_string($xmlstring);
// $json = json_encode($xml);
// $array = json_decode($json,TRUE);

// echo "<pre>";
// print_r($dados);
// echo "</pre>";