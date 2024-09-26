<?php
    include_once "Compra_produto.php";

    class Compra_produtoDAO
    {
        public function __construct()
        {
            $this->conexao = new PDO("mysql:host=localhost;dbname=mercefrut", "root","");
        }

        public function inserir(Compra_produto $vendas)
        {
            $resultado = $this->conexao->prepare("INSERT INTO compra_produto (id_compra_produto, id_produto, id_compra, preco, quantidade_prod) VALUES (:id_compra_produto, :id_produto, :id_compra, :preco, :quantidade_prod)");
            $resultado->bindValue(":id_compra_produto", $vendas->getId_compra_produto());
            $resultado->bindValue(":id_produto", $vendas->getId_produto());
            $resultado->bindValue(":id_compra", $vendas->getId_compra());
            $resultado->bindValue(":preco", $vendas->getPreco());
            $resultado->bindValue(":quantidade_prod", $vendas->getQuantidade_prod());

            return $resultado->execute();
        }

        public function listar(){
            $resultado = $this->conexao->prepare("SELECT * FROM compra_produto");
            $resultado->execute(); 

            $arrayUsuario = array();

            while ($retorno = $resultado->fetch())
            {
                $objUsuario = new Compra_produto();
                $objUsuario->setId_compra_produto($retorno['id_compra_produto']);
                $objUsuario->setId_produto($retorno['id_produto']);
                $objUsuario->setId_compra($retorno['id_compra']);
                $objUsuario->setPreco($retorno['preco']);
                $objUsuario->setQuantidade_prod($retorno['quantidade_prod']);
                
                $arrayUsuario[] = $objUsuario;
            }
            return $arrayUsuario;
        }

        public function listarPorId(Compra_produto $produto){
            $resultado = $this->conexao->prepare("SELECT * FROM Compra_produto  where id_compra=:id");
            $resultado->bindValue(":id", $produto->getId_compra());
            
            $resultado->execute();
            $retorno = $resultado->fetch();
            
            $objUsuario = new Compra_produto();
            $objUsuario->setId_compra_produto($produto['id_compra_produto']);
            $objUsuario->setId_produto($produto['id_produto']);
            $objUsuario->setId_compra($produto['id_compra']);
            $objUsuario->setPreco($produto['preco']);
            $objUsuario->setQuantidade_prod($produto['quantidade_prod']);
        
            return $objUsuario;
        }
    }
?>