<?php
    class Conexao extends mysqli {
        public function conexaoMysql($host, $user, $pass, $db, $port, $socket, $charset) {
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            parent::__construct($host, $user, $pass, $db, $port, $socket);
            $this->set_charset($charset);
        }

        public function conexao(){
            $this->conexaoMysql('localhost', 'root', '', 'sistemalavador', 3306, null, 'utf8mb4');
        }

    }
    //$conexao= new Conexao;
    //$conexao->conexao();

//$query = "INSERT INTO usuario (id_usuario, permissao, nome, usuario, senha) VALUES (null,?,?,?,?)";
//$stmt = $conexao->prepare($query);
//$stmt->bind_param("isss", $val1, $val2, $val3 , $val4);

//$val1 = 'teste';
//$val2 = 'teste';
//$val3 = 'teste';
//$val4 = 'teste';

/* Execute the statement */
//$stmt->execute();

//$stmt->close();

/*
echo"<table border = 1>";
// retrieve all rows from myCity 
$query = "SELECT nome, usuario, senha FROM usuario";
if ($result = $conexao->query($query)) {
    while ($row = $result->fetch_row()) {
        printf("<tr>
               <td>%s</td> 
                <td>%s</td>
               <td>%s</td>
                </tr>", $row[0], $row[1], $row[2]);
   }
    // free result set 
    $result->close();
}
echo"</table>";
*/



//$conexao=mysqli_connect('localhost', "root", "", "sistemalavador", 3306, 'mysql');

/* Prepare an insert statement */
//$stmt = mysqli_prepare($conexao, "INSERT INTO usuario (id, nome, usuario, senha) VALUES (null,?,?,?)");

/* Bind variables to parameters */
//mysqli_stmt_bind_param($stmt, "sss", $val1, $val2, $val3);

//$val1 = 'teste';
//$val2 = 'teste';
//$val3 = 'senha123';

/* Execute the statement */
//mysqli_stmt_execute($stmt);
?>