<?php

require_once "../models/VendaDAO.php";
class VendaController {
    public function paginavenda(){
        include "../views/venda.php";
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
            $venda->vendalavada();
            /*echo $venda->setFicha();
            echo "<br>";
            echo $venda->setVeiculo();
            echo "<br>";
            echo $venda->setLavada();
            echo "<br>";
            echo $venda->setValor();
            echo "<br>";
            echo $venda->setIdpagamento();
            echo "<br>";
            echo $venda->setPlaca();
            echo "<br>";
            echo $venda->setEmpresa();
            echo "<br>";
            echo $venda->setNum_nota();
            echo "<br>";
            echo $venda->setAnotacao();
            echo "<br>";*/ 
        }
            
            
    }
        
}


?>