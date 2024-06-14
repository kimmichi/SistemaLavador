<?php
include "../configuration/Conexao.php";
    $conexao= new Conexao;
    $conexao->conexao();
    //echo $usuario;
    $dt_atual = date('Y/m/d');
    $result_user = "SELECT ficha FROM venda_lavada WHERE situacao = 1  AND dt_venda 
    BETWEEN '$dt_atual 00:00:00' AND '$dt_atual 23:59:59' ORDER BY id_venda_lavada DESC LIMIT 1;";
    $resultado_user = mysqli_query($conexao, $result_user);
    if (($resultado_user)){
        while ($row_user = mysqli_fetch_assoc($resultado_user)){
            echo $row_user["ficha"];
        }
    }

    ?>