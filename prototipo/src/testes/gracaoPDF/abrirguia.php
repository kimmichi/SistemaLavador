<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir Novo Guia</title>
    <script>
        function abrirNovoGuia(url) {
            // Abre o URL especificado em uma nova guia
            window.open(url, '_blank');
        }
    </script>
</head>
<body>
    <!-- Botão que chama a função para abrir uma nova guia -->
    <button onclick="abrirNovoGuia('../gracaoPDF/gerar_pdf.php')">Abrir Novo Guia</button>
</body>
</html>
