<?php
    require_once "LoginController.php";
    require_once "HomeController.php";
    require_once "UsuarioController.php";
    require_once "VendaController.php";

    class Roteador {
        public function processarpagina($controle){
            
            if (!isset($_GET["pagina"]) || !isset($_SESSION["ID"])){
                $controle["pagina"]="login";
                $controle["acao"]="logar";
                //echo $_SESSION["ID"];
            }
            switch($controle["pagina"]){
                case "login":
                    $sessao = new UsuarioController;
                    $sessao->sessaoaberta();
                    $pagina = new LoginController;
                    $pagina->paginalogin();
                    break;
                case "home";
                    $sessao = new UsuarioController;
                    $sessao->sessaofechada();
                    $pagina = new HomeController;
                    $pagina->paginahome();
                    break;
            } 
            switch($controle["acao"]){
                case "logar":
                    //print_r($_POST);
                    if(isset($_POST) != ""){
                        $pagina = new UsuarioController;
                        $pagina->login($_POST);
                    }
                    break;
                case "deslogar";
                    $pagina = new UsuarioController;
                    $pagina->deslogar();
                    break;
                case "venda";
                    $pagina = new VendaController;
                    $pagina->paginavenda();
                    if(isset($_POST["ficha"],$_POST["placa"]) != ""){
                        echo $_POST["ficha"];
                    }
                    break;
                
                
            }

        }
    }


?>