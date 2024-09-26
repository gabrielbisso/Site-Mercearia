<?php
    include_once "Usuario.php";

    class UsuarioDAO{
        public function __construct(){
            $this->conexao = new PDO ("mysql:host=localhost;dbname=mercefrut", "root", "");}
            
        public function inserir(Usuario $usuari){
            $resultado = $this->conexao->prepare("INSERT INTO usuario (nome, endereco, cpf, email, senha) VALUES (:nome, :endereco, :cpf, :email, :senha)");
            $resultado->bindValue(":nome", $usuari->getNome());
            $resultado->bindValue(":endereco", $usuari->getEndereco());
            $resultado->bindValue(":cpf", $usuari->getCpf());
            $resultado->bindValue(":email", $usuari->getEmail());
            $resultado->bindValue(":senha", $usuari->getSenha());

            return $resultado->execute(); 
        }

        public function listar(){
            $resultado = $this->conexao->prepare("SELECT * FROM usuario");
            $resultado->execute(); 

            $arrayUsuario = array();

            while ($retorno = $resultado->fetch())
            {
                $objUsuario = new Usuario();
                $objUsuario->setId_usuario($retorno['id_usuario']);
                $objUsuario->setNome($retorno['nome']);
                $objUsuario->setEndereco($retorno['endereco']);
                $objUsuario->setCpf($retorno['cpf']);
                $objUsuario->setEmail($retorno['email']);
                
                $arrayUsuario[] = $objUsuario;
            }
            return $arrayUsuario;
        }
        public function listarPorId(Usuario $usuario){
            $resultado = $this->conexao->prepare("SELECT * FROM usuario where id_usuario=:id");
            $resultado->bindValue(":id", $usuario->getId_usuario());

            $resultado->execute(); 
            $retorno = $resultado->fetch();

            $objUsuario = new Usuario();
            $objUsuario->setId_usuario($retorno['id_usuario']);
            $objUsuario->setNome($retorno['nome']);
            $objUsuario->setEndereco($retorno['endereco']);
            $objUsuario->setCpf($retorno['cpf']);
            $objUsuario->setEmail($retorno['email']);
            $objUsuario->setSenha($retorno['senha']);

            return $objUsuario;
        }
        public function editar(Usuario $usuario){
            $resultado = $this->conexao->prepare("UPDATE usuario SET nome=:nome, endereco=:endereco, cpf=:cpf, email=:email, senha=:senha where id_usuario=:id_usuario");

            $resultado->bindValue(":nome", $usuario->getNome());
            $resultado->bindValue(":endereco", $usuario->getEndereco());
            $resultado->bindValue(":cpf", $usuario->getCpf());
            $resultado->bindValue(":email", $usuario->getEmail());
            $resultado->bindvalue(":senha", $usuario->getSenha());
            $resultado->bindValue(":id_usuario", $usuario->getId_usuario());
            
            return $resultado->execute();
        }

        public function excluir(Usuario $usuario)
        {
            $resultado = $this->conexao->prepare("DELETE FROM usuario where id_usuario=:id");
            $resultado->bindValue(":id", $usuario->getId_usuario());
            return $resultado->execute();
        }
        public function login(Usuario $usuario)
        { 
            $resultado = $this->conexao->prepare("SELECT * FROM usuario where email=:email");
            $resultado->bindValue(":email", $usuario->getEmail());
            
            $resultado->execute();
            
            if($resultado->rowCount()>0)
            {
                while($retorno = $resultado->fetch())
                {
                    if($retorno['senha'] == $usuario->getSenha())
                    {
                        //$login = true;
                        $id = $retorno['id_usuario'];
            
                        $_SESSION["logado"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["tipo"] = "usuario";
                        
                        return 3; //logado como usuario
                    }
                    else
                    {
                        $senha = true; //senha incorreta
                    }
                }
            }
            else
            {
                return 1; //email n cadastrado
            }
            if(isset($senha))
            {
             return 2;//senha incorreta
            }
        }
    }
?>