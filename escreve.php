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

$arquivoXml = simplexml_load_file('clientesTeste.xml');

var_dump($arquivoXml);

echo "Objeto: \n\n";

$torcedores = $arquivoXml->torcedor[0]["nome"];

var_dump($torcedores);

////////////////Escrevendo em um arquivo existente//////////
$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('write.xlsx');

$worksheet = $spreadsheet->getActiveSheet();

$worksheet->getCell('A1')->setValue($torcedores );
$worksheet->getCell('A2')->setValue('Barbosa');
$worksheet->getCell('A3')->setValue('Miranda');

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('write.xlsx');
////////////////////////////////////////////////////////////
