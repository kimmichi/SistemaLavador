
<style>

input, select,tr {
  display: block;
}
td{
    padding: 5px;
}
</style>

<form method = "post">
    <table border = 0>
        <tr>
            <td >
                <label>Ficha:</label>
                <select name="ficha">
                    <option value = "" selected>---</option>
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
                <select name="veiculo" id="txt1"  onmouseup="showHint()">
                    <option value = "" selected>----------------------</option>
                    <option value = "1">MOTO</option>
                    <option value = "2">CARRO</option>
                    <option value = "3">CAMINHONETE</option>
                    <option value = "4">OUTROS</option>
                </select>
            </td>
            <td>
                <label>Lavada:</label>
                <select name = "lavada" id="txt2" .value onmouseup="showHint()">
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
                <input type="text" name="valor" id="txtHint">
            </td>
        </tr>
        <tr>     
            <td>
                <label>Pagamento:</label>    
                <select name="pagamento">
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
                <input type="text" name ="placa">
            </td>
        </tr>
        <tr>
            <td>                
                <label>Empresa:</label>    
                <input type="text" name ="empresa">
            </td>
        </tr>
        <tr>
            <td>                
                <label>N° Nota:</label>    
                <input type="text" name="num_nota">
            </td>
        </tr>
        <tr>
            <td>                
                <label>Anotacao:</label>    
                <input type="text" name="anotacao">
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
        xhttp.open("get", "../controllers/proc_pesq_user.php?teste="+str+"&teste1="+str2);
        xhttp.send();   
    }
}
</script>