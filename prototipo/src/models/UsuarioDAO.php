<!-- Consultas / Regras de Negocio (verificacao)-->
<?php
    require_once "configuration/Conexao.php";
    
    class UsuarioDAO {
        public function autenticacaoLogin($usuario, $senha){
            $conexao = new Conexao;
            $conexao->Conexao();
            //session_destroy();
            
            /*if (!session_start()){
                session_start();
            }*/
            //echo $usuario;
            //echo $senha;
            $query = 'SELECT id_usuario, usuario, senha, nome FROM usuario 
            where usuario = ? and senha = ?;';
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("ss",$usuario,$senha);
            $stmt->execute();
            $stmt->bind_result($id_usuario, $usuarioban, $senhaban, $nome);
            while ($stmt->fetch()) {
                    $_SESSION["ID"]=$id_usuario;
                    $usu = $usuarioban;
                    $sen = $senhaban; 
                    $_SESSION["nome"]=$nome;

            }
                /* free result set */
            $stmt->close();
            /*echo $_SESSION["ID"];
            echo $usu;
            echo $sen;*/
            if(isset($usu) && isset($sen) && ($usu === $usuario && $sen === $senha)){
                    //echo "Acesso permitido";
                    //return true;
                    header('location:../index.php/?controle=principal&acao=home');

            }else{
                echo"Senha ou usuario incorreto";
            }

            
            
        }
    }
    //$usuariodao = new UsuarioDao;
    //$usuariodao->autenticacaoLogin("Sirlaine","SENHA");
?>