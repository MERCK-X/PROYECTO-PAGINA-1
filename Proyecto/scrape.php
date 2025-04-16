<?php

require 'vendor/autoload.php';

use Goutte\Client;

$client = new Client();

// Lista de URLs y sus selectores correspondientes
$pages = 
[
    ['url' => 'https://msc.itesa.edu.mx', 'selector' => '#comments'],
    ['url' => 'http://carreras3.veracruz.tecnm.mx:21213/sistemas/?option=1', 'selector' => '.informationContainer'],
    ['url' => 'https://www.puebla.tecnm.mx/ingenieria-en-tecnologias-de-la-informacion-y-comunicaciones/propositos-educacionales-de-la-carrera-de-ingenieria-en-tecnologias-de-la-informacion-y-comunicaciones/', 'selector' => '#main']
];

$allDivContents = [];

foreach ($pages as $page) 
{
    $crawler = $client->request('GET', $page['url']);
    
    $divContent = $crawler->filter($page['selector'])->each(function ($node) 
    {
        return $node->html();
    });

    $allDivContents[] = 
    [
        'url' => $page['url'],
        'content' => $divContent
    ];
}

file_put_contents('div_contents.json', json_encode($allDivContents, JSON_PRETTY_PRINT));

