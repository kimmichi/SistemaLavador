<?php
require_once "../../configuration/composer/vendor/autoload.php";

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf(['enable_remote' => true]);
$layout='<body>';
$layout.='<table border="1" class="table table-striped table-bordered">';
$layout.='<tr>';
$layout.='<th>Ficha</th>';
$layout.='<th>Placa</th>';
$layout.='<th>Veiculo</th>';
$layout.='<th>Lavada</th>';
$layout.='<th>Empresa</th>';
$layout.='<th>Usuario</th>';
$layout.='<th>Tipo de Pagamento</th>';
$layout.='<th>Valor</th>';
$layout.='<th>Nota</th>';
$layout.='<th>Restaurar</th>';
$layout.='</tr>';
$layout.='</table>';
$layout.='</body>';


$dompdf->loadHtml($layout);
// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream();


?>