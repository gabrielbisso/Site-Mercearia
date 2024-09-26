<?php
    class Produto{
        private $id_produto;
        private $id_categoria;
        private $nome;
        private $preco;
        private $quantidade;
        private $fornecedor;
        private $imagem;
        private $descricao;

    public function getId_produto(){
        return $this->id_produto;
    }
    public function setId_produto($valor){
        $this->id_produto = $valor;
    }
    public function getId_categoria(){
        return $this->id_categoria;
    }
    public function setId_categoria($valor){
        $this->id_categoria = $valor;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($valor){
        $this->nome = $valor;
    }
    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($valor){
        $this->preco = $valor;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setQuantidade($valor){
        $this->quantidade = $valor;
    }
    public function getFornecedor(){
        return $this->fornecedor;
    }
    public function setFornecedor($valor){
        $this->fornecedor = $valor;
    }
    public function getImagem(){
        return $this->imagem;
    }
    public function setImagem($valor){
        $this->imagem = $valor;  
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function setDescricao($valor){
        $this->descricao = $valor;  
    }
}
?>