<?php
    require_once "configuration/Conexao.php";

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

        public function vendalavadaDAO(){
            $conexao= new Conexao;
            $conexao->conexao();
            $query = "SELECT id_preco FROM tabela_preco_lavada WHERE idlavada = $this->lavada AND idveiculo = $this->veiculo";
            if ($result = $conexao->query($query)) {
                while ($row = $result->fetch_row()) {
                    $this->getIdpreco($row[0]);
               }
                $result->close();
            }

            $query = "INSERT INTO venda_lavada (id_venda_lavada, ficha, placa, empresa, valor, num_nota,descricao, idusuario, idpagamento, idpreco)
            VALUES (NULL,?,?,?,?,?,?,?,?,?);";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("issdssiii", 
            $this->ficha, $this->placa,$this->empresa, $this->valor,
            $this->num_nota,$this->anotacao,$_SESSION["ID"],$this->idpagamento,$this->idpreco);
            if($stmt->execute()){
                header("location: ../index.php/?controle=venda&acao=cadastrovenda");
            }
            
            $stmt->close();
        }


        public function listarvendalavadaDAO() {
            $conexao = new Conexao;
            $conexao->conexao();
            $query = "SELECT id_venda_lavada, ficha, placa, veiculo, lavada, empresa, valor, num_nota, nome, pagamento, preco FROM venda_lavada
                inner join usuario on usuario.id_usuario = venda_lavada.idusuario
                inner join pagamento on pagamento.id_pagamento = venda_lavada.idpagamento
                inner join tabela_preco_lavada on tabela_preco_lavada.id_preco = venda_lavada.idpreco
                inner join lavada on lavada.id_lavada = tabela_preco_lavada.idlavada
                inner join veiculo on veiculo.id_veiculo = tabela_preco_lavada.idveiculo;";
            
            echo "<table border='1'>
            <tr>
                <td>Ficha</td>
                <td>Placa</td>
                <td>Veiculo</td>
                <td>Lavada</td>
                <td>Empresa</td>
                <td>Valor Pago</td>
                <td>Nota</td>
                <td>Usuario</td>
                <td>Tipo de Pagamento</td>
                <td>Valor da tabela</td>
                <td>Editar Nota</td>
            </tr>";
            
            if ($result = $conexao->query($query)) {
                $index = 0;
                while ($row = $result->fetch_row()) {
                    printf("<form method='post' action='../index.php/?controle=venda&acao=editarnota'><tr>
                        <input type='hidden' name='idlavada' value='%s'>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td><input type='text' id='nota%d' value ='%s' name='n_nota'disabled></td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td><input type='checkbox' onchange='habilitarDesabilitarInput(%d)'> <input type='submit'></td>
                    </tr></form>", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $index, $row[7], $row[8], $row[9], $row[10], $index);
                    $index++;
                }
            }
            
            echo "</table>";
            ?>
            <script>
                function habilitarDesabilitarInput(index) {
                    var input = document.getElementById('nota' + index);
                    input.disabled = !input.disabled;
                }
            </script>
            <?php
        }

        public function editarnota($idvendalavada, $num_nota){
            echo $idvendalavada."<br>";
            echo $num_nota;
            $conexao = new Conexao;
            $conexao->conexao();
            $query = "UPDATE venda_lavada SET num_nota = ? where id_venda_lavada = ?;";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("si", $num_nota, $idvendalavada);
            if($stmt->execute()){
                header("location: ../index.php/?controle=venda&acao=listarvenda");
            }
            
            $stmt->close();
        }

    }

?>