<!DOCTYPE html>
<html lang="en">
    <?php 
        session_start();
        //session_destroy();
        include "../template/head.php";
        require_once("../controllers\Roteador.php");
        $roteador = new Roteador;
        $roteador->processarpagina($_GET);
     
    ?>


</html>