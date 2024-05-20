<?php
    require_once "models/UsuarioDAO.php";
    class PrincipalControle{
        public function processar($acao){
            switch($acao){
                case"logar";
                    $this->login();
                    break;                
                case"login";
                    $this->mostarpaginalogin();
                    //include "views/login.php";
                    break;
                case "deslogar";
                    $this->deslogar();
                    break;
                case "home";
                    $this->sessaofechada();
                    $this->mostrarpaginainicial();
                    break;
            }

        }







        
        public function login(){
            if(isset($_POST["usuario"]) != "" && isset($_POST["senha"]) != ""){
                $autenticacao = new UsuarioDAO;
                //$autenticacao->autenticacaoLogin($_POST["usuario"], $_POST["senha"]);
                if ($autenticacao->autenticacaoLogin($_POST["usuario"], $_POST["senha"])==true){
                    $this->mostrarpaginainicial();
                }
                /*if ($controle["usuario"] == "teste" && $controle["senha"] == "teste" ){
                }*/
            }
        }

        public function deslogar(){
            if(isset($_SESSION["ID"])){
                session_destroy();
                header("location: ../index.php");
            }
        }

        public function sessaofechada(){
            if(!isset($_SESSION["ID"])){
                header("location: ../index.php");

            }
        }

        public function sessaoaberta(){
            if(isset($_SESSION["ID"])){
                header("location: ../views/login.php");
            }
        }

        public function mostarpaginalogin(){
            include "views/login.php";
        }

        public function mostrarpaginainicial(){
            include "template/menu.php";
            include "views/home.php";
        }
    }
?>