<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Janela Pop-Up com Redirecionamento</title>
    <style>
        /* Estilos para a janela modal */
        .modal {
            display: none; /* Escondido por padrão */
            position: fixed; /* Fixa a janela na tela */
            z-index: 1; /* Fica na frente de outros elementos */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto; /* Habilita scroll se necessário */
            background-color: rgb(0,0,0); /* Cor de fundo preta */
            background-color: rgba(0,0,0,0.4); /* Fundo preto com opacidade */
        }

        /* Conteúdo da modal */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto; /* 15% do topo e centralizado */
            padding: 20px;
            border: 1px solid #888;
            width: 80%; /* Largura de 80% */
            max-width: 300px; /* Máximo de 300px */
            text-align: center;
        }

        /* Botões */
        .btn {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }

        .btn-ok {
            background-color: #4CAF50;
            color: white;
        }

        .btn-cancel {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<!-- Botão para abrir a modal -->
<button id="openModalBtn">Abrir Pop-Up</button>

<!-- A janela modal -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <p>Você deseja continuar?</p>
        <button class="btn btn-ok" onclick="handleOk()">OK</button>
        <button class="btn btn-cancel" onclick="handleCancel()">Cancel</button>
    </div>
</div>

<script>
    // Pega o modal
    var modal = document.getElementById("myModal");

    // Pega o botão que abre o modal
    var btn = document.getElementById("openModalBtn");

    // Função para abrir o modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // Função para o botão OK
    function handleOk() {
        window.location.href = "home.php"; // Redireciona para home.php
    }

    // Função para o botão Cancel
    function handleCancel() {
        modal.style.display = "none"; // Fecha o modal
    }

    // Fechar o modal se o usuário clicar fora dele
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>

</body>
</html>