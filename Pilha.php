<?php
    require_once('Nodo.php');
    class Pilha {
        private $limite;
        private $topo;
        private $tamanho;
        
        public function __construct($limite) {
            $this->limite = $limite;
            $this->topo = null;
            $this->tamanho = 0;
        }
        
        public function getTopo() {
            if ($this->topo !== null) {
                return $this->topo->getDado();
            }
            return null;
        }
        
        public function estaVazio() {
            return $this->tamanho == 0;
        }
        
        public function temEspaco() {
            return $this->limite > $this->tamanho;
        }
    
        public function empilhar(String $dado) {
            if ($this->temEspaco()) {
                $novo = new Nodo($dado);
                $novo->setProx($this->topo);
                $this->topo = $novo;
                $this->tamanho++;
            } else {
                echo "Pilha cheia";
            }
        }

        public function desempilhar() {
            if (!$this->estaVazio()) {
                echo $this->topo->getDado() . " foi retirado da pilha!";
                $this->topo = $this->topo->getProx();
                $this->tamanho = $this->tamanho - 1;
            } else {
                echo "Pilha está vazia!";
            }
        }

        public function __toString() {
            $output = "";
            $tempNode = $this->topo;
            while ($tempNode !== null) {
                $output .= $tempNode->getDado() . " ";
                $tempNode = $tempNode->getProx();
            }
            return $output;
        }
        
        
    }
?>