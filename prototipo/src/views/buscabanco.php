<?php
include "../configuration/Conexao.php";
    $conexao= new Conexao;
    $conexao->conexao();
    //echo $usuario;
    $result_user = "select ficha from venda_lavada where situacao = 1 order by id_venda_lavada desc limit 1;";
    $resultado_user = mysqli_query($conexao, $result_user);
    if (($resultado_user)){
        while ($row_user = mysqli_fetch_assoc($resultado_user)){
            echo $row_user["ficha"];
        }
    }

    ?>