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
                include "template/menu.php";
                $this->mostrarpaginacadastrovenda();
                break;
            case "listarvenda";
                include "template/menu.php";
                $this->listarvenda();
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

        }
    }
    public function paginavenda(){
        include "views/venda.php";
    }

    public function listarvenda(){
        $venda = new VendaDAO;
        $venda->listarvendalavadaDAO();
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
        
}


?>