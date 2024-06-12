<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formatar Número Automaticamente</title>
    <style>
        input[type="text"] {
            width: 200px;
            font-size: 16px;
            padding: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Formatar Número Automaticamente</h1>
    <label for="numberInput">Digite um valor numérico:</label>
    <input type="text" id="numberInput" placeholder="Ex: 0.00">
    <br>

    <script>
        document.getElementById('numberInput').addEventListener('input', function() {
            let value = this.value.replace(/\D/g, ''); // Remove qualquer caractere que não seja número

            // Remove os zeros à esquerda
            value = value.replace(/^0+/, '');

            const length = value.length;

            // Adiciona zeros à esquerda para garantir que haja pelo menos dois dígitos
            value = value.padStart(2, '0');

            // Separa o valor em centavos e o restante
            const cents = value.slice(0, -2);
            const rest = value.slice(-2);

            // Formata o valor com duas casas decimais
            value = `${cents}.${rest}`;

            this.value = value;
        });
    </script>
</body>
</html>
