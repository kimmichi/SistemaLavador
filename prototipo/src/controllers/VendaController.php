<?php

require_once "models/VendaDAO.php";
class VendaController {
    public function processar($acao){
        switch ($acao){
            case "cadastrarvenda";
                if(isset($_POST) != ""){
                    $this->vendalavada($_POST);

                }
                break;
            case "cadastrovenda";
                //------------------twig-------------------------- 
                require_once 'configuration/composer/vendor/autoload.php';
                $loader = new \Twig\Loader\FilesystemLoader('views');
                $twig = new \Twig\Environment($loader, [
                    'cache' => '../template/cache',
                    'cache' => false
                ]);
                $template = $twig->load("layout.html");
                echo $template->render(array('NOME_USUARIO'=>$_SESSION['nome']));
                // -----------------------------------------------
                $this->mostrarpaginacadastrovenda();
                break;
            case "listarvenda";
                //include "template/menu.php";
                //------------------twig-------------------------- 
                require_once 'configuration/composer/vendor/autoload.php';
                $loader = new \Twig\Loader\FilesystemLoader('views');
                $twig = new \Twig\Environment($loader, [
                    'cache' => '../template/cache',
                    'cache' => false
                ]);
                $template = $twig->load("layout.html");
                echo $template->render(array('NOME_USUARIO'=>$_SESSION['nome']));
                // -----------------------------------------------
                $this->listarvenda();
                echo '            
                            </div>
                        </div>
                    </div>
                </body>
                </html>';
                break;
            case "edicaolavada";
                //------------------twig-------------------------- 
                require_once 'configuration/composer/vendor/autoload.php';
                $loader = new \Twig\Loader\FilesystemLoader('views');
                $twig = new \Twig\Environment($loader, [
                    'cache' => '../template/cache',
                    'cache' => false
                ]);
                $template = $twig->load("layout.html");
                echo $template->render(array('NOME_USUARIO'=>$_SESSION['nome']));
                // -----------------------------------------------
                $this->edicaovendalavada($_GET['id']);
                $this->paginaeditarvenda();
                break;
            case "editarnota";
                if(isset($_POST) != "" && $_POST["idlavada"] != "" && isset($_POST["n_nota"]) ){
                    $this->editarnotalavada($_POST["idlavada"], $_POST["n_nota"]);
                }else{
                    header("location: ../index.php/?controle=venda&acao=listarvenda");
                }
                break;
            case "excluirlavada";
                $this->excluirvendalavada($_GET['id']);
                break;
            case "editarlavada";
                $this->editarvendalavada($_POST);
                break;
            case "apagados";
                //------------------twig-------------------------- 
                require_once 'configuration/composer/vendor/autoload.php';
                $loader = new \Twig\Loader\FilesystemLoader('views');
                $twig = new \Twig\Environment($loader, [
                    'cache' => '../template/cache',
                    'cache' => false
                ]);
                $template = $twig->load("layout.html");
                echo $template->render(array('NOME_USUARIO'=>$_SESSION['nome']));
                // -----------------------------------------------
                $this->listarapagadoslavada();
                echo '            
                            </div>
                        </div>
                    </div>
                </body>
                </html>';
                break;
                case "restaurarlavada";
                    $this->restaurarlavada($_GET['id']);
                break;

        }
    }
    public function paginavenda(){
        include "views/venda.php";
    }
    
    public function paginaeditarvenda(){
        include "views/editarvenda.php";
    }

    public function listarvenda(){
        $venda = new VendaDAO;
        $venda->listarvendalavadaDAO();
    }    
    public function listarapagadoslavada(){
        $venda = new VendaDAO;
        $venda->listarapagadoslavadaDAO();
    }

    public function vendalavada($venda_lavada){
        if(isset($_POST["ficha"]) != ""){
            $venda = new VendaDAO;
            $venda->getFicha($venda_lavada["ficha"]);
            $venda->getVeiculo($venda_lavada["veiculo"]);
            $venda->getLavada($venda_lavada["lavada"]);
            $venda->getValor($venda_lavada["valor"]);
            $venda->getIdpagamento($venda_lavada["pagamento"]);
            $venda->getPlaca($venda_lavada["placa"]);
            $venda->getEmpresa($venda_lavada["empresa"]);
            $venda->getNum_nota($venda_lavada["num_nota"]);
            $venda->getAnotacao($venda_lavada["anotacao"]);
            $venda->vendalavadaDAO();
        }

            
    }

    public function mostrarpaginacadastrovenda(){
        include "views/venda.php";    
    }

    public function editarnotalavada($idvendalavada, $num_nota){
        $editar = new VendaDAO;
        $editar->editarnota($idvendalavada, $num_nota);

    }
    public function excluirvendalavada($id){
        $excluir = new VendaDAO;
        $excluir->excluirvendalavadaDAO($id);

    }
    public function edicaovendalavada($id){
        $editar = new VendaDAO;
        $_SESSION["editarvenda"] = $editar->edicaovendalavadaDAO($id);
        //print_r($_SESSION["editarvenda"]);
        
    }
    public function editarvendalavada($venda_lavada){
        
        if(isset($_POST["editarficha"]) != ""){
            $venda = new VendaDAO;
            $venda->getId_venda_lavada($venda_lavada["id"]);
            $venda->getFicha($venda_lavada["editarficha"]);
            $venda->getVeiculo($venda_lavada["editarveiculo"]);
            $venda->getLavada($venda_lavada["editarlavada"]);
            $venda->getValor($venda_lavada["editarvalor"]);
            $venda->getIdpagamento($venda_lavada["editarpagamento"]);
            $venda->getPlaca($venda_lavada["editarplaca"]);
            $venda->getEmpresa($venda_lavada["editarempresa"]);
            $venda->getNum_nota($venda_lavada["editarnum_nota"]);
            $venda->getAnotacao($venda_lavada["editaranotacao"]);
            $venda->editarvendalavadaDAO();
            var_dump($venda_lavada);
        }
    }
    
    public function restaurarlavada($id){
        $excluir = new VendaDAO;
        $excluir->restaurarlavadaDAO($id);

    }
        
}


?>