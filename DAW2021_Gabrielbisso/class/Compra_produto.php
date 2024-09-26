<?php
    class Compra_produto
    {
        private $id_compra_produto;
        private $id_produto;
        private $id_compra;
        private $preco;
        private $quantidade_prod;

        public function getId_compra_produto(){
            return $this->id_compra_produto;
        }
        public function setId_compra_produto($valor){
            $this->id_compra_produto = $valor;
        }

        public function getId_produto(){
            return $this->id_produto;
        }
        public function setId_produto($valor){
            $this->id_produto = $valor;
        }
        
        public function getId_compra(){
            return $this->id_compra;
        }
        public function setId_compra($valor){
            $this->id_compra = $valor;
        }

        public function getPreco(){
            return $this->preco;
        }
        public function setPreco($valor){
            $this->preco = $valor;
        }

        public function getQuantidade_prod(){
            return $this->quantidade_prod;
        }
        public function setQuantidade_prod($valor){
            $this->quantidade_prod = $valor;
        }
    }
?>