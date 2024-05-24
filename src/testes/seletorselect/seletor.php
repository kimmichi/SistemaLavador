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
    <input type="text" id="numeroInput">
    <br>
    <label for="opcaoSelect">Opção Selecionada:</label>
    <select id="opcaoSelect">
        <option value="0">0</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
    <select  id="txt2" .value onmouseup="showHint()">
        <option value = "" selected>---------------------------------</option>
        <option value = "1">COMPLETA COM CERA</option>
        <option value = "2">COMPLETA SEM CERA</option>
        <option value = "3">SOMENTE EXETERNA</option>
        <option value = "4">SOMENTE INTERNA</option>
    </select>
</p>
    <script>
   
        
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById('opcaoSelect').value =
                +this.responseText + 1;
            }
            xhttp.open("get", "buscabanco.php");
            xhttp.send();   
            

            // Garante que o valor digitado esteja entre 0 e 4


    </script>
</body>
</html>