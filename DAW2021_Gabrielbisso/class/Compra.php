<?php
    class Compra
    {
        private $id_compra;
        private $id_usuario;
        private $total;
        private $data;
        private $forma_pag;
        private $status;

        public function getId_compra(){
            return $this->id_compra;
        }
        public function setId_compra($valor){
            $this->id_compra = $valor;
        }

        public function getId_usuario(){
            return $this->id_usuario;
        }
        public function setId_usuario($valor){
            $this->id_usuario = $valor;
        }

        public function getTotal(){
            return $this->total;
        }
        public function setTotal($valor){
            $this->total = $valor;
        }

        public function getData(){
            return $this->data;
        }
        public function setData($valor){
            $this->data= $valor;
        }

        public function getForma_pag(){
            return $this->forma_pag;
        }
        public function setForma_pag($valor){
            $this->forma_pag= $valor;
        }

        public function getStatus(){
            return $this->status;
        }
        public function setStatus($valor){
            $this->status= $valor;
        }
    }
?>