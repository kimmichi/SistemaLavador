<!DOCTYPE html>
<html>
<body>

<h2>The XMLHttpRequest Object</h2>
<h3>Start typing a name in the input field below:</h3>

<p>Suggestions: <span id="txtHint"></span></p> 
<p>First name: <!--<input type="text" id="txt1" onkeyup="showHint(this.value)">-->
    <select id="txt1" onmouseup="showHint()">
        <option value = "" selected>----------------------</option>
        <option value = "1">MOTO</option>
        <option value = "2">CARRO</option>
        <option value = "3">CAMINHONETE</option>
        <option value = "4">OUTROS</option>
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

function showHint() {
  var str = document.getElementById('txt1').value;
  var str2 = document.getElementById('txt2').value;
  const xhttp = new XMLHttpRequest();
  xhttp.onload = function() {
    document.getElementById("txtHint").innerHTML =
    this.responseText;
  }
  xhttp.open("get", "proc_pesq_user.php?teste="+str+"&teste1="+str2);
  xhttp.send();   
}
</script>

</body>
</html>
