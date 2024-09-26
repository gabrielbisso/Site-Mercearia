<?php
    include_once "Compra.php";

    class CompraDAO
    {
        public function __construct()
        {
            $this->conexao = new PDO("mysql:host=localhost;dbname=mercefrut", "root","");
        }

        public function inserir(Compra $vendas)
        {
            $resultado = $this->conexao->prepare("INSERT INTO compra (id_compra, id_usuario, total, data, forma_pag, status) VALUES (:id_compra, :id_usuario, :total, :data, :forma_pag, :status)");
            $resultado->bindValue(":id_compra", $vendas->getId_compra());
            $resultado->bindValue(":id_usuario", $vendas->getId_usuario());
            $resultado->bindValue(":total", $vendas->getTotal());
            $resultado->bindValue(":data", $vendas->getData());
            $resultado->bindValue(":forma_pag", $vendas->getForma_pag());
            $resultado->bindValue(":status", $vendas->getStatus());

            if($resultado->execute())
            {
                return $this->conexao->lastInsertId();
            }
            else
            {
                return false;
            }
        }

        public function listar(){
            $resultado = $this->conexao->prepare("SELECT * FROM compra");
            $resultado->execute(); 

            $arrayUsuario = array();

            while ($retorno = $resultado->fetch())
            {
                $objUsuario = new Compra();
                $objUsuario->setId_compra($retorno['id_compra']);
                $objUsuario->setId_usuario($retorno['id_usuario']);
                $objUsuario->setTotal($retorno['total']);
                $objUsuario->setData($retorno['data']);
                $objUsuario->setForma_pag($retorno['forma_pag']);
                $objUsuario->setStatus($retorno['status']);
                
                $arrayUsuario[] = $objUsuario;
            }
            return $arrayUsuario;
        }

        public function excluir(Compra $compra)
        {
            $resultado = $this->conexao->prepare("DELETE FROM compra where id_compra=:id");
            $resultado->bindValue(":id", $compra->getId_compra());
            return $resultado->execute();
        }

        public function editar(Compra $compra){
            $resultado = $this->conexao->prepare( "UPDATE compra SET status=:status where id_compra=:id_compra");
            $resultado->bindValue(":status", 'Aprovado');
            $resultado->bindValue(":id_compra", $compra->getId_compra());
            
            return $resultado->execute();
        }

        public function recusar(Compra $compra){
            $resultado = $this->conexao->prepare( "UPDATE compra SET status=:status where id_compra=:id_compra");
            $resultado->bindValue(":status", 'Recusado');
            $resultado->bindValue(":id_compra", $compra->getId_compra());
            
            return $resultado->execute();
        }

        public function editartotal(Compra $compra){
            $resultado = $this->conexao->prepare( "UPDATE compra SET total=:total where id_compra=:id_compra");
            $resultado->bindValue(":total", $compra->getTotal());
            $resultado->bindValue(":id_compra", $compra->getId_compra());
            
            return $resultado->execute();
        }

        public function listarPorId(Compra $compra){
            $resultado = $this->conexao->prepare("SELECT * FROM compra where id_compra=:id");
            $resultado->bindValue(":id", $compra->getId_compra());
            
            $resultado->execute();
            $retorno = $resultado->fetch();
            
            $objUsuarios = new Compra();
            $objUsuarios->setId_compra($retorno['id_compra']);
            $objUsuarios->setId_usuario($retorno['id_usuario']);
            $objUsuarios->setTotal($retorno['total']);
            $objUsuarios->setData($retorno['data']);
            $objUsuarios->setForma_pag($retorno['forma_pag']);
            $objUsuarios->setStatus($retorno['status']);
            
            return $objUsuarios;
        }
    }
?>