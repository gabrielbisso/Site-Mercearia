<?php
    include_once ("Categoria.php");

    class CategoriaDAO{
        public function __construct(){
            $this->conexao = new PDO ("mysql:host=localhost;dbname=mercefrut", "root", "");}
            
        public function inserir(categoria $catego){
            $resultado = $this->conexao->prepare("INSERT INTO categoria (nome) VALUES (:nome)");
            $resultado->bindValue(":nome", $catego->getNome());

            return $resultado->execute(); 
        }

        public function listar(){
            $resultado = $this->conexao->prepare("SELECT * FROM Categoria");
            $resultado->execute(); 

            $arrayCategoria = array();

            while ($retorno = $resultado->fetch())
            {
                $objCategoria = new Categoria();
                $objCategoria->setId_categoria($retorno['id_categoria']);
                $objCategoria->setNome($retorno['nome']);

                $arrayCategoria[] = $objCategoria;
            }
            return $arrayCategoria;
        }

        public function editar(Categoria $categoria){
            $resultado = $this->conexao->prepare("UPDATE categoria SET nome=:nome where id_categoria = :id_categoria");

            $resultado->bindValue(":nome", $categoria->getNome());
            $resultado->bindValue(":id_categoria", $categoria->getId_categoria());
            
            return $resultado->execute();
        }

        public function listarPorId(Categoria $categoria){
            $resultado = $this->conexao->prepare("SELECT * FROM categoria where id_categoria =:id");
            $resultado->bindValue(":id", $categoria->getId_categoria());
            
            $resultado->execute();
            $retorno = $resultado->fetch();
            
            $objUsuarios = new Categoria();
            $objUsuarios->setId_categoria($retorno['id_categoria']);
            $objUsuarios->setNome($retorno['nome']);
            
            return $objUsuarios;
        }

        public function excluir(Categoria $categor)
        {
            $resultado = $this->conexao->prepare("DELETE FROM categoria where id_categoria=:id");
            $resultado->bindValue(":id", $categor->getId_categoria());
            return $resultado->execute();
        }
        
    }
?>