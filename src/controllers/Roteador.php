<?php
    require_once "VendaController.php";
    require_once "PrincipalControle.php";

    class Roteador {
        public function processarpagina($controle,$acao){
            if (!isset($_GET["controle"])){
                header("location: ../src/views/login.php");
            }
            switch($controle){
                case "principal";
                    $controle = new PrincipalControle;
                    $controle->processar($acao);
                    break;
                case "venda";
                    $sessao = new PrincipalControle;
                    $sessao->sessaofechada();
                    $controle = new VendaController;
                    $controle->processar($acao);
                    break;

            }
        }
    }


?>