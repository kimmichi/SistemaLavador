
<style>

input, select,.tableavenda{
  display: block;
}
td{
    padding: 5px;
}
</style>

<form method = "post" id="formvenda" action="../index.php/?controle=venda&acao=editarlavada">
    <table border = 0 class = "tableavenda">
        <tr>
            <td >
                <input type="hidden" name = "id" value="<?php echo $_GET["id"];?>">
                <input type="hidden" id="inputficha" value="<?php echo $_SESSION["editarvenda"][1];?>">
                <label>Ficha:</label>
                <select id = "idficha" name="editarficha">
                    <option value = "">---</option>
                    <option value = "1" >1</option>
                    <option value = "2">2</option>
                    <option value = "3">3</option>
                    <option value = "4">4</option>
                    <option value = "5">5</option>
                    <option value = "6">6</option>
                    <option value = "7">7</option>
                    <option value = "8">8</option>
                    <option value = "9">9</option>
                    <option value = "10">10</option>
                    <option value = "11">11</option>
                    <option value = "12">12</option>
                    <option value = "13">13</option>
                </select>
            </td>
            <td>
                <label>Veiculo:</label>
                <input type="hidden" id="inputveiculo" value="<?php echo $_SESSION["editarvenda"][3];?>">
                <select name="editarveiculo" id="txt1"  onmouseup="showHint()">
                    <option value = "" selected>----------------------</option>
                    <option value = "1">MOTO</option>
                    <option value = "2">CARRO</option>
                    <option value = "3">CAMINHONETE</option>
                    <option value = "4">OUTROS</option>
                </select>
            </td>
            <td>
                <label>Lavada:</label>
                <input type="hidden" id="inputlavada" value="<?php echo $_SESSION["editarvenda"][4];?>">
                <select name = "editarlavada" id="txt2" .value onmouseup="showHint()">
                    <option value = "" selected>---------------------------------</option>
                    <option value = "1">COMPLETA COM CERA</option>
                    <option value = "2">COMPLETA SEM CERA</option>
                    <option value = "3">SOMENTE EXETERNA</option>
                    <option value = "4">SOMENTE INTERNA</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <label>Valor:    
                <input type="text" name="editarvalor" id="txtHint" value ="<?php echo $_SESSION["editarvenda"][7];?>">
            </td>
        </tr>
        <tr>     
            <td>
                <label>Pagamento:</label>    
                <input type="hidden" id="inputpagamento" value="<?php echo $_SESSION["editarvenda"][6];?>">
                <select name="editarpagamento" id ="idpagamento">
                    <option value = "" selected>----------------------</option>
                    <option value = "1">PRAZO</option>
                    <option value = "2">RESGATE</option>
                    <option value = "3">CART CREDITO</option>
                    <option value = "4">CART DEBITO</option>
                    <option value = "5">DINHEIRO</option>
                    <option value = "6">PIX</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>                
                <label>Placa:</label>    
                <input type="text" name ="editarplaca" value ="<?php echo $_SESSION["editarvenda"][2];?>">
            </td>
        </tr>
        <tr>
            <td>                
                <label>Empresa:</label>    
                <input type="text" name ="editarempresa" value ="<?php echo $_SESSION["editarvenda"][5];?>">
            </td>
        </tr>
        <tr>
            <td>                
                <label>N° Nota:</label>    
                <input type="text" name="editarnum_nota" value ="<?php echo $_SESSION["editarvenda"][8];?>">
            </td>
        </tr>
        <tr>
            <td>                
                <label>Anotacao:</label>    
                <input type="text" name="editaranotacao"  value ="<?php echo $_SESSION["editarvenda"][9];?>">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value = "Enviar">
            </td>
        </tr>
    </table>
</form>

<script>

function showHint() {
    var str = document.getElementById('txt1').value;
    var str2 = document.getElementById('txt2').value;
    if (str.length == 0 || str2.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("txtHint").value =
            this.responseText;
        }
        xhttp.open("get", "../controllers/PreLavadaController.php?teste="+str+"&teste1="+str2);
        xhttp.send();   
    }
}


        document.getElementById('txtHint').addEventListener('input', function() {
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


        
        const valorficha = parseInt(document.getElementById('inputficha').value);

        // Garante que o valor digitado esteja entre 0 e 4
        if (valorficha >= 0 && valorficha <= 13 ) {
            document.getElementById('idficha').value = valorficha.toString();
        }

        const valorveiculo = parseInt(document.getElementById('inputveiculo').value);

        // Garante que o valor digitado esteja entre 0 e 4
        if (valorveiculo >= 0 && valorveiculo <= 5 ) {
            document.getElementById('txt1').value = valorveiculo.toString();
        }

        const valorlavada = parseInt(document.getElementById('inputlavada').value);

        // Garante que o valor digitado esteja entre 0 e 4
        if (valorlavada >= 0 && valorlavada <= 4 ) {
            document.getElementById('txt2').value = valorlavada.toString();
        }
        
        const valorpagamento = parseInt(document.getElementById('inputpagamento').value);

        // Garante que o valor digitado esteja entre 0 e 4
        if (valorpagamento >= 0 && valorpagamento <= 20 ) {
            document.getElementById('idpagamento').value = valorpagamento.toString();
        }
</script>