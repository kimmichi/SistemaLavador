<input type="" id="idficha">

<script>
    const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById('idficha').value =this.responseText;
            console.log(this.responseText);
        }
        xhttp.open("get", "../comandosCMD/ping.php");
        xhttp.send();  
</script>
