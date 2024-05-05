<!-- Consultas / Regras de Negocio (verificacao)-->
<?php
    require_once "../configuration/Conexao.php";
    
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
            $query = 'SELECT id_usuario, usuario, senha FROM usuario 
            where usuario = "'.$usuario.'" and senha = "'.$senha.'";';
            if ($result = $conexao->query($query)) {
                while ($row = $result->fetch_row()) {
                    $_SESSION["ID"]=$row[0];
                    $usu = $row[1];
                    $sen = $row[2]; 
                }
                 /* free result set */
                $result->close();
                /*echo $_SESSION["ID"];
                echo $usu;
                echo $sen;*/
                if(isset($usu) && isset($sen)){
                    if ($usu == $usuario && $sen == $senha){
                        //echo "Acesso permitido";
                        return true;
                    }
                }else{
                    echo"Senha ou usuario incorreto";
                }

            }
            
        }
    }
    //$usuariodao = new UsuarioDao;
    //$usuariodao->autenticacaoLogin("Sirlaine","SENHA");
?>