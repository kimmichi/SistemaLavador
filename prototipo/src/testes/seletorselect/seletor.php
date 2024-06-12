<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select conforme Valor Digitado</title>
</head>
<body>
    <h1>Select conforme Valor Digitado</h1>
    <label for="numeroInput">Digite um valor de 0 a 4:</label>
    <input type="text" id="numeroInput" value="2">
    <br>
    <label for="opcaoSelect">Opção Selecionada:</label>
    <select id="opcaoSelect">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>

    <script>
            var vari = document.getElementById('numeroInput').value;
            console.log(vari);
            const valorDigitado = parseInt(document.getElementById('numeroInput').value);

            // Garante que o valor digitado esteja entre 0 e 4
            if (valorDigitado >= 0 && valorDigitado <= 4) {
                document.getElementById('opcaoSelect').value = valorDigitado.toString();
            }
        
    </script>
</body>
</html>