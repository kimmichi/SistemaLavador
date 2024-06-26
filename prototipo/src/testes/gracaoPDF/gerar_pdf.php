<?php

require_once "../../configuration/composer/vendor/autoload.php";


use Dompdf\Dompdf;
use Dompdf\Options;

// Configuração das opções do Dompdf
$options = new Options();
$options->set('isRemoteEnabled', true); // Habilitar a opção de recursos remotos
$dompdf = new Dompdf($options);

// Caminho absoluto para a imagem
$path = realpath('logo/logopratao.jpg');

// Verifique se o arquivo existe
if (!file_exists($path)) {
    die('Imagem não encontrada!');
}

// Codificar a imagem em base64
$imageData = base64_encode(file_get_contents($path));
$src = 'data:image/jpeg;base64,' . $imageData;
date_default_timezone_set('America/Sao_Paulo');
$dt_atual= date('d/m/Y h:i');
// Conteúdo HTML
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF com Imagem</title>
</head>
<body style=" padding:0%;">
    <div style="width: 265px; height: 460px; border:none; padding:0%; margin: -20px 0px 0px -45px; position: relative;">
        <center><img src="' . $src . '" alt="Exemplo de Imagem" width="70%">
        <br>
        <h3>Lava Jato Pratão</h3>
        <h1 style = "padding: 20px 0px 15px 0px; font-size: 50px;">'.$_GET['ficha'] .'</h1></center>
        <table border=0 style="font-size: 13px; margin: 0px 0px 0px 10px;">
            <tr><td colspan ="2" style="text-align: right;">'.$dt_atual.'</td></tr>
            <tr><td>Veiculo: '. $_GET['veiculo'] .'</td></tr>
            <tr><td>Lavada: '. $_GET['lavada'] .'</td></tr>
            <tr><td>Empresa: '. $_GET['empresa'] .'</td></tr>
            <tr><td>Placa: '. $_GET['placa'] .'</td></tr>
            <tr><td>Pagamento: '. $_GET['pagamento'] .'</td></tr>
        </table>
        <div style = "position: absolute; right: 10px; bottom: 10px;"><b>Valor: R$ '. $_GET['valor'] .'</b></div>
        <br>
        <br>
        <br>
        <hr>
    <div>
</body>
</html>
';

// Carregar o HTML no Dompdf
$dompdf->loadHtml($html);

// (Opcional) Configurar o tamanho do papel e a orientação
$dompdf->setPaper('A4', 'portrait');

// Renderizar o HTML como PDF
$dompdf->render();

// Enviar o PDF para o navegador
$dompdf->stream("documento.pdf", ["Attachment" => false]);
?>