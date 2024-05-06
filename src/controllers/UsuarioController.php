<!-- e a ponte entre view e model, view solicita controller solicita para model. 
E o controlador do sistema pois faz ligacoes entre aplicacoes do sistema -->

<?php
    require_once "../models/UsuarioDAO.php";
    class UsuarioController {
        public function login($controle){
            if(isset($_POST["usuario"]) != "" && isset($_POST["senha"]) != ""){
                $autenticacao = new UsuarioDAO;
                //$autenticacao->autenticacaoLogin($_POST["usuario"], $_POST["senha"]);
                if ($autenticacao->autenticacaoLogin($_POST["usuario"], $_POST["senha"])==true){
                    header("location: ../template/?pagina=home&acao=");
                }
                /*if ($controle["usuario"] == "teste" && $controle["senha"] == "teste" ){
                }*/
            }
        }

        public function deslogar(){
            if(session_start()){
                session_destroy();
            }
        }

        public function sessaofechada(){
            if(!isset($_SESSION["ID"])){
                header("location: ../template/?pagina=login&acao=logar");
            }
        }

        public function sessaoaberta(){
            if(isset($_SESSION["ID"])){
                header("location: ../template/?pagina=home&acao=");
            }
        }

    }
?>