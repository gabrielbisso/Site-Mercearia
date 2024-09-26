<?php
    include_once "Produto.php";

    class ProdutoDAO{
        public function __construct(){
            $this->conexao = new PDO ("mysql:host=localhost;dbname=mercefrut", "root", "");}
            
        public function inserir(Produto $prod){
            $resultado = $this->conexao->prepare("INSERT INTO produto (nome, preco, quantidade, fornecedor, imagem, descricao, id_categoria) VALUES (:nome, :preco, :quantidade, :fornecedor, :imagem, :descricao, :id_categoria)");
            $resultado->bindValue(":nome", $prod->getNome());
            $resultado->bindValue(":preco", $prod->getPreco());
            $resultado->bindValue(":quantidade", $prod->getQuantidade());
            $resultado->bindValue(":fornecedor", $prod->getFornecedor());
            $resultado->bindValue(":imagem", $prod->getImagem());
            $resultado->bindValue(":descricao", $prod->getDescricao());
            $resultado->bindValue(":id_categoria", $prod->getId_categoria());

            return $resultado->execute(); 
        }

        public function listar($complemento = ""){
            $resultado = $this->conexao->prepare("SELECT Produto.*, Categoria.nome as Categoria FROM Produto inner join Categoria on Produto.id_categoria=Categoria.id_categoria ".$complemento);
            $resultado->execute(); 

            $arrayProduto = array();

            while ($retorno = $resultado->fetch())
            {
                $objProduto = new Produto();
                $objProduto->setId_produto($retorno['id_produto']);
                $objProduto->setId_categoria($retorno['Categoria']);
                $objProduto->setNome($retorno['nome']);
                $objProduto->setPreco($retorno['preco']);
                $objProduto->setQuantidade($retorno['quantidade']);
                $objProduto->setFornecedor($retorno['fornecedor']);
                $objProduto->setImagem($retorno['imagem']);
                $objProduto->setDescricao($retorno['descricao']);

                $arrayProduto[] = $objProduto;
            }
            return $arrayProduto;
        }

        public function listarpesq(){
            $resultado = $this->conexao->prepare("SELECT * FROM Produto");
            $resultado->execute(); 

            $arrayProduto = array();

            while ($retorno = $resultado->fetch())
            {
                $objProduto = new Produto();
                $objProduto->setId_produto($retorno['id_produto']);
                $objProduto->setNome($retorno['nome']);
                $objProduto->setPreco($retorno['preco']);
                $objProduto->setQuantidade($retorno['quantidade']);
                $objProduto->setFornecedor($retorno['fornecedor']);
                $objProduto->setImagem($retorno['imagem']);
                $objProduto->setDescricao($retorno['descricao']);

                $arrayProduto[] = $objProduto;
            }
            return $arrayProduto;
        }

        public function editar(Produto $produto){
            $resultado = $this->conexao->prepare( "UPDATE produto SET nome=:nome, preco= :preco, fornecedor=:fornecedor, quantidade= :quantidade, descricao = :descricao, id_categoria = :id_categoria where id_produto=:id_produto");
            $resultado->bindValue(":nome", $produto->getNome());
            $resultado->bindValue(":preco", $produto->getPreco());
            $resultado->bindValue(":fornecedor", $produto->getFornecedor());
            $resultado->bindValue(":quantidade", $produto->getQuantidade());
            $resultado->bindValue(":descricao", $produto->getDescricao());
            $resultado->bindValue(":id_categoria", $produto->getId_categoria());
            $resultado->bindValue(":id_produto", $produto->getId_produto());
            
            return $resultado->execute();
        }
        
        public function listarPorId(Produto $produto){
            $resultado = $this->conexao->prepare("SELECT * FROM produto where id_produto=:id");
            $resultado->bindValue(":id", $produto->getId_produto());
            
            $resultado->execute();
            $retorno = $resultado->fetch();
            
            $objUsuarios = new Produto();
            $objUsuarios->setId_produto($retorno['id_produto']);
            $objUsuarios->setNome($retorno['nome']);
            $objUsuarios->setPreco($retorno['preco']);
            $objUsuarios->setQuantidade($retorno['quantidade']);
            $objUsuarios->setFornecedor($retorno['fornecedor']);
            $objUsuarios->setImagem($retorno['imagem']);
            $objUsuarios->setDescricao($retorno['descricao']);
            $objUsuarios->setId_categoria($retorno['id_categoria']);
            
            return $objUsuarios;
        }
        
        public function excluir(Produto $produto)
        {
            $resultado = $this->conexao->prepare("DELETE FROM produto where id_produto=:id");
            $resultado->bindValue(":id", $produto->getId_produto());
            return $resultado->execute();
        }

        public function editarimagem(Produto $produto){
            $resultado = $this->conexao->prepare( "UPDATE produto SET imagem=:imagem where id_produto=:id_produto");
            $resultado->bindValue(":imagem", $produto->getImagem());
            $resultado->bindValue(":id_produto", $produto->getId_produto());
            
            return $resultado->execute();
        }
        
    }
?>
