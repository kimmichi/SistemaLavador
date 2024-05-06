<?php
    class Venda {
        private $ficha;
        private $placa; 
        private $empresa; 
        private $desconto;
        private $valor; 
        private $idusuario;
        private $idpagamento;
        private $idpreco;

        public function getFicha($ficha){
            $this->ficha=$ficha;
        }
        public function getPlaca($placa){
            $this->placa = $placa;
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
        public function getIdusuario($idusuario){
            $this->idusuario = $idusuario;
        }
        public function getIdpagamento($idpagamento){
            $this->idpagamento = $idpagamento;
        }


        public function setFicha(){
            return $this->ficha;
        }
        public function setPlaca(){
            return $this->placa;
        }
        public function setEmpresa(){
            return $this->empresa;
        }
        public function setDesconto(){
            return $this->desconto;
        }
        public function setValor(){
            return $this->valor;
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
    }


?>