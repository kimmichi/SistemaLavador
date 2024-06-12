<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Dentro de Select</title>
</head>
<body>
    <h1>Select Dentro de Select</h1>
    <label for="primeiroSelect">Escolha um Continente:</label>
    <select id="primeiroSelect">
        <option value="0">Selecione</option>
        <option value="1">África</option>
        <option value="2">América</option>
        <option value="3">Ásia</option>
        <option value="4">Europa</option>
        <option value="5">Oceania</option>
    </select>

    <label for="segundoSelect">Escolha um País:</label>
    <select id="segundoSelect">
        <option value="0">Selecione um continente primeiro</option>
    </select>

    <script>
        const primeiroSelect = document.getElementById('primeiroSelect');
        const segundoSelect = document.getElementById('segundoSelect');

        primeiroSelect.addEventListener('change', function() {
            segundoSelect.innerHTML = ''; // Limpa as opções do segundo select
            const selectedValue = this.value;

            // Adiciona opções ao segundo select dependendo do valor selecionado no primeiro
            switch(selectedValue) {
                case '1':
                    addOption(segundoSelect, 'Argélia', 'argelia');
                    addOption(segundoSelect, 'Nigéria', 'nigeria');
                    addOption(segundoSelect, 'Egito', 'egito');
                    break;
                case '2':
                    addOption(segundoSelect, 'Brasil', 'brasil');
                    addOption(segundoSelect, 'Estados Unidos', 'estados-unidos');
                    addOption(segundoSelect, 'Canadá', 'canada');
                    break;
                case '3':
                    addOption(segundoSelect, 'China', 'china');
                    addOption(segundoSelect, 'Índia', 'india');
                    addOption(segundoSelect, 'Japão', 'japao');
                    break;
                case '4':
                    addOption(segundoSelect, 'França', 'franca');
                    addOption(segundoSelect, 'Alemanha', 'alemanha');
                    addOption(segundoSelect, 'Itália', 'italia');
                    break;
                case '5':
                    addOption(segundoSelect, 'Austrália', 'australia');
                    addOption(segundoSelect, 'Nova Zelândia', 'nova-zelandia');
                    addOption(segundoSelect, 'Fiji', 'fiji');
                    break;
                default:
                    addOption(segundoSelect, 'Selecione um continente primeiro');
            }
        });

        // Função para adicionar opção ao select
        function addOption(select, text, value) {
            const option = document.createElement('option');
            option.text = text;
            option.value = value;
            select.add(option);
        }
    </script>
</body>
</html>