<?php
    require_once "configuration/Conexao.php";

    class VendaDAO {
        private $ideditarvenda;
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

        public function getId_venda_lavada($ideditarvenda){
            $this->ideditarvenda=$ideditarvenda;
        }
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
            if($empresa == "" || $empresa == " " || $empresa == null){
                $this->empresa = "CONSUMIDOR";
            }else{
                $this->empresa = $empresa;
            }
            //$this->empresa = $empresa;
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
            $query = "SELECT id_preco FROM tabela_preco_lavada WHERE idlavada = ? AND idveiculo = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("ss", $this->lavada, $this->veiculo);
            $stmt->execute();
            $stmt->bind_result($id_preco);
            while ($stmt->fetch()) {
                $this->getIdpreco($id_preco);
                echo "$id_preco";
            }
            $stmt->close();
            

            $query = "INSERT INTO venda_lavada (id_venda_lavada,dt_venda, situacao, ficha, placa, empresa, valor, num_nota,descricao, idusuario, idpagamento, idpreco)
            VALUES (NULL,NULL,1,?,?,?,?,?,?,?,?,?);";
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
            /*$query = "SELECT id_venda_lavada, ficha, placa, veiculo, lavada, empresa, valor, num_nota, nome, pagamento FROM venda_lavada
                inner join usuario on usuario.id_usuario = venda_lavada.idusuario
                inner join pagamento on pagamento.id_pagamento = venda_lavada.idpagamento
                inner join tabela_preco_lavada on tabela_preco_lavada.id_preco = venda_lavada.idpreco
                inner join lavada on lavada.id_lavada = tabela_preco_lavada.idlavada
                inner join veiculo on veiculo.id_veiculo = tabela_preco_lavada.idveiculo ORDER BY(ficha);";*/
            date_default_timezone_set('America/Sao_Paulo');
            $dt_atual = date('Y/m/d');
            $query = "SELECT id_venda_lavada, ficha, placa, veiculo, lavada, empresa, nome, pagamento, valor, num_nota FROM venda_lavada
            INNER JOIN usuario ON usuario.id_usuario = venda_lavada.idusuario
            INNER JOIN pagamento ON pagamento.id_pagamento = venda_lavada.idpagamento
            INNER JOIN tabela_preco_lavada ON tabela_preco_lavada.id_preco =  venda_lavada.idpreco
            INNER JOIN lavada ON lavada.id_lavada = tabela_preco_lavada.idlavada
            INNER JOIN veiculo ON veiculo.id_veiculo = tabela_preco_lavada.idveiculo WHERE situacao = 1  AND dt_venda BETWEEN '$dt_atual 00:00:00' AND '$dt_atual 23:59:59' ORDER BY(ficha);";
            $stmt = $conexao->prepare($query);
            //$stmt->bind_param("")
            $stmt->execute();
            $stmt->bind_result($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6],$row[7],$row[8],$row[9]);
            echo "
            <div id='myModal' class='modal'>
                <div class='modal-content'>
                    <p>Você deseja excluir o registro?</p>
                    <button class='btn btn-primary mb-2' onclick='handleOk()'>SIM</button>
                    <button class='btn btn-danger mb-2' onclick='handleCancel()'>NAO</button>
                </div>
            </div>

            <table border='1' class='table table-striped table-bordered'>
                <tr>
                    <th>Ficha</th>
                    <th>Placa</th>
                    <th>Veiculo</th>
                    <th>Lavada</th>
                    <th>Empresa</th>
                    <th>Usuario</th>
                    <th>Tipo de Pagamento</th>
                    <th>Valor</th>
                    <th>Editar Nota</th>
                    <th>Excluir</th>
                    <th>Editar</th>
                </tr>";
            
            $urlPDF='../gracaoPDF/gerar_pdf.php';
            $index = 0;
            while ($stmt->fetch()) {
                printf("
                <form method='post' action='../index.php/?controle=venda&acao=editarnota'>
                    <tr>
                        <input type='hidden' name='idlavada' value='%d'>
                        <td><a onclick='abrirNovoGuia(".'"%s"'.",".'"%s"'.",".'"%s"'.",".'"%s"'.",".'"%s"'.",".'"%s"'.",".'"%s"'.")'><i class='fas fa-print' id='dump'></i></a> %s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>R$ %s</td>
                        <td>
                            <input type='checkbox' onchange='habilitarDesabilitarInput(%d)'> 
                            <input type='text' id='nota%d' value ='%s' name='n_nota'  disabled>
                            <input type='submit' value='Salvar'>
                        </td>
                        <td><a class = 'btn btn-outline-danger btn-rounded' onclick='confirmation(%d)'><i class='fas fa-trash' id='dump'></i></a></td>
                        <td><a href='../index.php/?controle=venda&acao=edicaolavada&id=%d' class='btn btn-outline-info btn-rounded'><i class='fas fa-edit'></i></a></td>
                    </tr>
                </form>", 
                 $row[0], $row[1], $row[3], $row[4],$row[5],$row[2],$row[7],$row[8], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6],$row[7],$row[8], $index, $index, $row[9],$row[0],$row[0]);
                $index++;
            }
            /*<a href='../index.php/?controle=venda&acao=excluirlavada&id=%d'><i class='fas fa-trash'></i></a>*/
            
            echo "</table>";
            $stmt->close();
            ?>
            <script>
                function abrirNovoGuia(ficha, veiculo,lavada,empresa,placa,pagamento,valor) {
                    var raiz ='../testes/gracaoPDF/gerar_pdf.php';
                    //var ficha = "1";
                    //var veiculo = "2";
                    var url = raiz+"?ficha="+ficha+"&veiculo="+veiculo+"&lavada="+lavada+"&empresa="+empresa+"&placa="+placa+"&pagamento="+pagamento+"&valor="+valor;
                    // Abre o URL especificado em uma nova guia
                    //window.location.href = '../index.php/?controle=venda&acao='; // Redireciona para home.php
                    window.open(url, '_blank');
                }

                function habilitarDesabilitarInput(index) {
                    var input = document.getElementById('nota' + index);
                    input.disabled = !input.disabled;
                }

                //---------------------ALERT----------------------------
                // Pega o modal
                var modal = document.getElementById("myModal");

                // Pega o botão que abre o modal
                //var btn = document.getElementById("dump");

                // Função para abrir o modal
                function confirmation(cod) {
                    registro = cod;
                    modal.style.display = "block";
                }
                // Função para o botão OK
                function handleOk() {
                    window.location.href = '../index.php/?controle=venda&acao=excluirlavada&id='+registro; // Redireciona para home.php
                }

                // Função para o botão Cancel
                function handleCancel() {
                    modal.style.display = "none"; // Fecha o modal
                }

                // Fechar o modal se o usuário clicar fora dele
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
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

        public function excluirvendalavadaDAO($id){
            $conexao = new Conexao;
            $conexao->conexao();
            $query = "update venda_lavada set situacao = 0 where id_venda_lavada = ?;";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                header("location: ../index.php/?controle=venda&acao=listarvenda");
            }
            $stmt->close();
        }
        
        public function edicaovendalavadaDAO($id){
            $conexao = new Conexao;
            $conexao->conexao();
            $query = "SELECT id_venda_lavada, ficha, placa, idveiculo, idlavada, empresa, idpagamento, valor, num_nota, descricao FROM venda_lavada
            inner join usuario on usuario.id_usuario = venda_lavada.idusuario
            inner join pagamento on pagamento.id_pagamento = venda_lavada.idpagamento
            inner join tabela_preco_lavada on tabela_preco_lavada.id_preco =  venda_lavada.idpreco
            inner join lavada on lavada.id_lavada = tabela_preco_lavada.idlavada
            inner join veiculo on veiculo.id_veiculo = tabela_preco_lavada.idveiculo where id_venda_lavada = ? AND situacao = 1;";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("i",$id );
            $stmt->execute();
            $stmt->bind_result( $row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8],$row[9]);
            
            while ($stmt->fetch()) {
                /*printf("
                <form method = 'post' action = '#'>
                    id <input type='hidden' value ='%d' name= 'idficha'> <br>
                    ficha <input type='text' value ='%s' name= 'eficha'> <br>
                    placa <input type='text' value ='%s' name= 'eplaca'> <br>
                    veiculo <input type='text' value ='%s' name= 'eveiculo'> <br>
                    lavada <input type='text' value ='%s' name= 'elavada'> <br>
                    empresa <input type='text' value ='%s' name= 'empresa'> <br>
                    pagamento <input type='text' value ='%s' name= 'epagamento'> <br>
                    valor <input type='text' value ='%d' name= 'valor'><br>
                    nota <input type='text' value ='%s' name= 'enota'> <br>
                    <input type='submit'>
                </form>
                ", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5],$row[6],$row[7],$row[8]);*/
                $vari[] = $row[0];
                $vari[] = $row[1];
                $vari[] = $row[2];
                $vari[] = $row[3];
                $vari[] = $row[4];
                $vari[] = $row[5];
                $vari[] = $row[6];
                $vari[] = $row[7];
                $vari[] = $row[8];
                $vari[] = $row[9];
                    
            }
            
            if(isset($vari)){
                return $vari;
            }else{
                header("location: ../index.php/?controle=venda&acao=listarvenda");
            }
            $stmt->close();
        }

        public function editarvendalavadaDAO(){
            $conexao= new Conexao;
            $conexao->conexao();
            $query = "SELECT id_preco FROM tabela_preco_lavada WHERE idlavada = ? AND idveiculo = ?";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("ii", $this->lavada, $this->veiculo);
            $stmt->execute();
            $stmt->bind_result($id_preco);
            
            while ($stmt->fetch()) {
                $this->getIdpreco(1);
            }
                $stmt->close();
            

            $query = "UPDATE venda_lavada SET 
            ficha = ?, placa = ?, 
            empresa = ?, valor=?, 
            num_nota = ?, descricao = ?, 
            idpagamento = ?, idpreco = ?
            WHERE id_venda_lavada = ?;";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("issdssiii", 
            $this->ficha, $this->placa,$this->empresa, $this->valor,
            $this->num_nota,$this->anotacao, $this->idpagamento, $this->idpreco, $this->ideditarvenda,);

            if($stmt->execute()){
                header("location: ../index.php/?controle=venda&acao=listarvenda");
            }
            
            $stmt->close();
        }

        public function listarapagadoslavadaDAO(){
            $conexao = new Conexao;
            $conexao->conexao();
            /*$query = "SELECT id_venda_lavada, ficha, placa, veiculo, lavada, empresa, valor, num_nota, nome, pagamento FROM venda_lavada
                inner join usuario on usuario.id_usuario = venda_lavada.idusuario
                inner join pagamento on pagamento.id_pagamento = venda_lavada.idpagamento
                inner join tabela_preco_lavada on tabela_preco_lavada.id_preco = venda_lavada.idpreco
                inner join lavada on lavada.id_lavada = tabela_preco_lavada.idlavada
                inner join veiculo on veiculo.id_veiculo = tabela_preco_lavada.idveiculo ORDER BY(ficha);";*/
            $dt_atual = date('Y/m/d');
            $query = "SELECT id_venda_lavada, ficha, placa, veiculo, lavada, empresa, nome, pagamento, valor, num_nota FROM venda_lavada
            INNER JOIN usuario ON usuario.id_usuario = venda_lavada.idusuario
            INNER JOIN pagamento ON pagamento.id_pagamento = venda_lavada.idpagamento
            INNER JOIN tabela_preco_lavada ON tabela_preco_lavada.id_preco =  venda_lavada.idpreco
            INNER JOIN lavada ON lavada.id_lavada = tabela_preco_lavada.idlavada
            INNER JOIN veiculo ON veiculo.id_veiculo = tabela_preco_lavada.idveiculo WHERE situacao = 0  AND dt_venda BETWEEN '$dt_atual 00:00:00' AND '$dt_atual 23:59:59' ORDER BY(ficha);";
            $stmt = $conexao->prepare($query);
            //$stmt->bind_param("")
            $stmt->execute();
            $stmt->bind_result($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6],$row[7],$row[8],$row[9]);
            echo "
            <div id='myModal' class='modal'>
                <div class='modal-content'>
                    <p>Você deseja restaurar o registro?</p>
                    <button class='btn btn-primary mb-2' onclick='handleOk()'>SIM</button>
                    <button class='btn btn-danger mb-2' onclick='handleCancel()'>NAO</button>
                </div>
            </div>

            <table border='1' class='table table-striped table-bordered'>
                <tr>
                    <th>Ficha</th>
                    <th>Placa</th>
                    <th>Veiculo</th>
                    <th>Lavada</th>
                    <th>Empresa</th>
                    <th>Usuario</th>
                    <th>Tipo de Pagamento</th>
                    <th>Valor</th>
                    <th>Nota</th>
                    <th>Restaurar</th>
                </tr>";
            
            
            $index = 0;
            while ($stmt->fetch()) {
                printf("
                    <tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                        <td>R$ %s</td>
                        <td>%s</td>
                        <td><a class = 'btn btn-outline-success btn-rounded'><i class='fas fa-trash-restore' id='dump' onclick='confirmation(%d)'></i></a></td>
                    </tr>", 
                $row[1], $row[2], $row[3], $row[4], $row[5], $row[6],$row[7],$row[8], $row[9],$row[0]);
                $index++;
            }
            /*<a href='../index.php/?controle=venda&acao=excluirlavada&id=%d'><i class='fas fa-trash'></i></a>*/
            
            echo "</table>";
            ?>
            <script>
                //---------------------ALERT----------------------------
                // Pega o modal
                var modal = document.getElementById("myModal");

                // Pega o botão que abre o modal
                //var btn = document.getElementById("dump");

                // Função para abrir o modal
                function confirmation(cod) {
                    registro = cod;
                    modal.style.display = "block";
                }
                // Função para o botão OK
                function handleOk() {
                    window.location.href = '../index.php/?controle=venda&acao=restaurarlavada&id='+registro; // Redireciona para home.php
                }

                // Função para o botão Cancel
                function handleCancel() {
                    modal.style.display = "none"; // Fecha o modal
                }

                // Fechar o modal se o usuário clicar fora dele
                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }

            </script>
            <?php
            $stmt->close();
        }

        public function restaurarlavadaDAO($id){
            $conexao = new Conexao;
            $conexao->conexao();
            $query = "update venda_lavada set situacao = 1 where id_venda_lavada = ?;";
            $stmt = $conexao->prepare($query);
            $stmt->bind_param("i", $id);
            if($stmt->execute()){
                header("location: ../index.php/?controle=venda&acao=apagados");
            }
            $stmt->close();
        }

    }

?>