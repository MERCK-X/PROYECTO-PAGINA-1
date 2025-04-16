<?php
require 'vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contenido'])) {
    $contenidoHTML = $_POST['contenido'];

    // Configurar opciones para Dompdf
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);

    // Crear una instancia de Dompdf
    $dompdf = new Dompdf($options);

    // Cargar el contenido HTML en Dompdf
    $dompdf->loadHtml($contenidoHTML);

    // (Opcional) Configurar el tamaño del papel y la orientación
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar el HTML como PDF
    $dompdf->render();

    // Guardar el PDF en el servidor
    $output = 'archivo.pdf';
    file_put_contents($output, $dompdf->output());

    // Devolver la ubicación del PDF generado
    echo $output;
} else {
    // Manejar el caso en el que no se reciban datos POST
    echo "Error: No se han recibido datos POST";
}
?>
