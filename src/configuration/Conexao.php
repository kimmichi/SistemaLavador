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

?>