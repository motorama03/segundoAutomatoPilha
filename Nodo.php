<?php
    class Nodo {
        private $dado;
        private $elemento;
        private $prox;
        
        public function __construct($dado) {
            $this->dado = $dado;
            $this->prox = null;
        }
        
        public function getDado() {
            return $this->dado;
        }

        public function setDado($dado) {
            $this->dado = $dado;
        }

        public function getProx() {
            return $this->prox;
        }

        public function setProx($prox) {
            $this->prox = $prox;
        }
    }
?>