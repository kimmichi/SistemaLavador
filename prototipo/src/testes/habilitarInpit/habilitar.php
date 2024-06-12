<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox para Habilitar/Desabilitar Inputs</title>
</head>
<body>
    <?php
    // Define a quantidade de inputs desejada
    $quantidadeInputs = 5;
    $i = 0;

    // Verifica se o formulário foi submetido
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Atualiza o estado dos checkboxes com base nos valores enviados pelo formulário
        while ($i < $quantidadeInputs) {
            $habilitados[$i] = isset($_POST["habilitarInput$i"]);
            $i++;
        }
    }
    ?>

    <form method="post">
        <?php $i = 0; while ($i < $quantidadeInputs): ?>
            <label>
                <input type="checkbox" name="habilitarInput<?php echo $i; ?>" <?php echo $habilitados[$i] ? 'checked' : ''; ?> onchange="habilitarDesabilitarInput(this, <?php echo $i; ?>)"> Habilitar Input <?php echo $i + 1; ?>
            </label>
            <br><br>
            <label for="meuInput<?php echo $i; ?>">Meu Input <?php echo $i + 1; ?>:</label>
            <input type="text" name="meuInput<?php echo $i; ?>" <?php echo $habilitados[$i] ? '' : 'disabled'; ?>>
            <br><br>
            <?php $i++; endwhile; ?>
        <input type="submit" value="Enviar">
    </form>

    <script>
        function habilitarDesabilitarInput(checkbox, indice) {
            var input = document.querySelector('input[name="meuInput' + indice + '"]');
            input.disabled = !checkbox.checked;
        }
    </script>
</body>
</html>
