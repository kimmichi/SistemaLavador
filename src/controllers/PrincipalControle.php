<?php
    require_once "models/UsuarioDAO.php";
    class PrincipalControle{
        public function processar($acao){
            switch($acao){
                case"logar";
                    $this->login();
                    break;                
                case"login";
                    include "views/login.php";
                    break;
                case "deslogar":
                    $this->deslogar();
                    break;
            }

        }







        
        public function login(){
            if(isset($_POST["usuario"]) != "" && isset($_POST["senha"]) != ""){
                $autenticacao = new UsuarioDAO;
                //$autenticacao->autenticacaoLogin($_POST["usuario"], $_POST["senha"]);
                if ($autenticacao->autenticacaoLogin($_POST["usuario"], $_POST["senha"])==true){
                    header("location: ../views/home.php");
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

    }
?>