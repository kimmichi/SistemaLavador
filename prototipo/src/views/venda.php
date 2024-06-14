
<style>

input, select,.tableavenda{
  display: block;
}
td{
    padding: 5px;
}
</style>

<form method = "post" id="formvenda" action="../index.php/?controle=venda&acao=cadastrarvenda">
    <table border = 0 class = "tableavenda">
        <tr>
            <td >
                <label>Ficha:</label>
                <select id = "idficha" name="ficha" class="form-select" required>
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
                <select name="veiculo" id="txt1"  onmouseup="showHint()" class="form-select" required>
                    <option value = "" selected>----------------------</option>
                    <option value = "1">MOTO</option>
                    <option value = "2">CARRO</option>
                    <option value = "3">CAMINHONETE</option>
                    <option value = "4">OUTROS</option>
                </select>
            </td>
            <td>
                <label>Lavada:</label>
                <select name = "lavada" id="txt2" .value onmouseup="showHint()" class="form-select" required>
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
                <input type="text" name="valor" id="txtHint" class = 'form-control'>
            </td>
        </tr>
        <tr>     
            <td>
                <label>Pagamento:</label>    
                <select name="pagamento" class="form-select" required>
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
                <input type="text" name ="placa" class = 'form-control'>
            </td>
        </tr>
        <tr>
            <td>                
                <label>Empresa:</label>    
                <input type="text" name ="empresa" class = 'form-control'>
            </td>
        </tr>
        <tr>
            <td>                
                <label>N° Nota:</label>    
                <input type="text" name="num_nota" class = 'form-control'>
            </td>
        </tr>
        <tr>
            <td>                
                <label>Anotacao:</label>    
                <input type="text" name="anotacao" class = 'form-control'>
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

        const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById('idficha').value =
                +this.responseText + 1;
                console.log(+this.responseText + 1);
            }
            xhttp.open("get", "../controllers/buscabanco.php");
            xhttp.send();  
</script>