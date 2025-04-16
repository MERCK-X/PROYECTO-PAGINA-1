<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contenido'])) {
    $contenidoHTML = $_POST['contenido'];

    // Crear una nueva hoja de cálculo
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Parsear el contenido HTML y extraer los datos para el Excel
    $dom = new DOMDocument();
    @$dom->loadHTML($contenidoHTML);
    $tables = $dom->getElementsByTagName('table');
    $rowNumber = 1;

    foreach ($tables as $table) {
        foreach ($table->getElementsByTagName('tr') as $tr) {
            $cellNumber = 'A';
            foreach ($tr->getElementsByTagName('td') as $td) {
                $sheet->setCellValue($cellNumber . $rowNumber, $td->nodeValue);
                $cellNumber++;
            }
            $rowNumber++;
        }
    }

    // Crear un escritor para guardar el archivo
    $writer = new Xlsx($spreadsheet);

    // Guardar el archivo en una variable
    ob_start();
    $writer->save('php://output');
    $excelOutput = ob_get_clean();

    // Devolver el archivo codificado en base64 para su descarga
    echo base64_encode($excelOutput);
    exit;
} else {
    // Manejar el caso en el que no se reciban datos POST
    echo "Error: No se han recibido datos POST";
}
