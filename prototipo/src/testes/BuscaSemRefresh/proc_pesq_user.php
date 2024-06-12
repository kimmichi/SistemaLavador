<?php
include "../../configuration/Conexao.php";
    $conexao= new Conexao;
    $conexao->conexao();
    $usuario = $_GET["teste"];
    $usuario1 = $_GET["teste1"];
    //echo $usuario;
    $result_user = "select preco from tabela_preco_lavada where idveiculo LIKE '$usuario%' AND idlavada LIKE '$usuario1%';";
    $resultado_user = mysqli_query($conexao, $result_user);
    if (($resultado_user)){
        while ($row_user = mysqli_fetch_assoc($resultado_user)){
            echo $row_user["preco"];
        }
    }

    ?>