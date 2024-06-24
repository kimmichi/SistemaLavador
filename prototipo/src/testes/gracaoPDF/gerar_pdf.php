<?php

// Carregar o Composer
require_once "../../configuration/composer/vendor/autoload.php";

// Referenciar o namespace Dompdf
use Dompdf\Dompdf;

// Instanciar e usar a classe dompdf
$dompdf = new Dompdf(['enable_remote' => true]);

$dados = "<h1>Celke - Gerar PDF com PHP</h1>";

$dados .= "<img src='https://celke.com.br/new/app/lhs/assets/images/logo/logo-conteudo.png' style='width: 150px; height: 150px;'>";

// Instanciar o metodo loadHtml e enviar o conteudo do PDF
$dompdf->loadHtml($dados);

// Configurar o tamanho e a orientacao do papel
// landscape - Imprimir no formato paisagem
//$dompdf->setPaper('A4', 'landscape');
// portrait - Imprimir no formato retrato
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Gerar o PDF
$dompdf->stream();