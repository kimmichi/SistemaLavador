<?php
    require_once "../configuration/Conexao.php";

    class VendaDAO {
        private $ficha;
        private $placa; 
        private $veiculo;
        private $lavada;
        private $empresa; 
        private $desconto;
        private $num_nota;
        private $valor;
        private $anotacao;
        private $idusuario;
        private $idpagamento;
        private $idpreco;

        public function getFicha($ficha){
            $this->ficha=$ficha;
        }
        public function getPlaca($placa){
            $this->placa = $placa;
        }        
        public function getVeiculo($veiculo){
            $this->veiculo = $veiculo;
        }
        public function getLavada($lavada){
            $this->lavada = $lavada;
        }
        public function getEmpresa($empresa){
            $this->empresa = $empresa;
        }
        public function getDesconto($desconto){
            $this->desconto = $desconto;
        }
        public function getValor($valor){
            $this->valor = $valor;
        }
        public function getNum_nota($num_nota){
            $this->num_nota = $num_nota;
        }
        public function getAnotacao($anotacao){
            $this->anotacao = $anotacao;
        }
        public function getIdusuario($idusuario){
            $this->idusuario = $idusuario;
        }
        public function getIdpagamento($idpagamento){
            $this->idpagamento = $idpagamento;
        }        
        public function getIdpreco($idpreco){
            $this->idpreco = $idpreco;
        }


        public function setFicha(){
            return $this->ficha;
        }
        public function setPlaca(){
            return $this->placa;
        }
        public function setVeiculo(){
            return $this->veiculo;
        }
        public function setLavada(){
            return $this->lavada;
        }
        public function setEmpresa(){
            return $this->empresa;
        }
        public function setDesconto(){
            return $this->desconto;
        }
        public function setNum_nota(){
            return $this->num_nota;
        }

        public function setAnotacao(){
            return $this->anotacao;
        }
        public function setIdusuario(){
            return $this->idusuario;
        }
        public function setIdpagamento(){
            return $this->idpagamento;
        }
        public function setIdpreco(){
            return $this->idpreco;
        }
        public function setValor(){
            return $this->valor;
        }

        public function vendalavada(){
            $conexao= new Conexao;
            $conexao->conexao();
            $query = "SELECT id_preco FROM tabela_preco_lavada WHERE idlavada = $this->lavada AND idveiculo = $this->veiculo";
            if ($result = $conexao->query($query)) {
                while ($row = $result->fetch_row()) {
                    $this->getIdpreco($row[0]);
               }
                // free result set 
                $result->close();
            }

            $query = "INSERT INTO venda_lavada (id_venda_lavada, ficha, placa, empresa, valor, num_nota,descricao, idusuario, idpagamento, idpreco)
            VALUES (NULL,?,?,?,?,?,?,?,?,?);";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("issdssiii", 
            $this->ficha, $this->placa,$this->empresa, $this->valor,
            $this->num_nota,$this->anotacao,$_SESSION["ID"],$this->idpagamento,$this->idpreco);

            //$val1 = 'teste';
            //$val2 = 'teste';
            //$val3 = 'teste';
            //$val4 = 'teste';

            /* Execute the statement */
            $stmt->execute();
            if($stmt->execute()){
                echo "vendido com sucesso";
            }
            $stmt->close();
        }

    }


?>