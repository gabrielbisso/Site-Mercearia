<?php
    class Usuario{
        private $id_usuario;
        private $nome;
        private $endereco;
        private $cpf;
        private $email;
        private $senha;

    public function getId_usuario(){
        return $this->id_usuario;
    }
    public function setId_usuario($valor){
        $this->id_usuario = $valor;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($valor){
        $this->nome = $valor;
    }
    public function getEndereco(){
        return $this->endereco;
    }
    public function setEndereco($valor){
        $this->endereco = $valor;
    }
    public function getCpf(){
        return $this->cpf;
    }
    public function setCpf($valor){
        $this->cpf = $valor;
    }
    public function getEmail(){
        return $this->email;
    }
    public function setEmail($valor){
        $this->email = $valor;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($valor){
        $this->senha = $valor;  
    }
}
?>