<?php
    class Administrador{
        private $id_adm;
        private $nome;
        private $email;
        private $senha;

    public function getId_adm(){
        return $this->id_adm;
    }
    public function setId_adm($valor){
        $this->id_adm = $valor;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($valor){
        $this->nome = $valor;
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