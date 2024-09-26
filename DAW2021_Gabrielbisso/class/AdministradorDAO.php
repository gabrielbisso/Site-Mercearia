<?php
    include_once ("Administrador.php");

    class AdministradorDAO{
        public function __construct(){
            $this->conexao = new PDO ("mysql:host=localhost;dbname=mercefrut", "root", "");}
            
        public function inserir(Administrador $adm){
            $resultado = $this->conexao->prepare("INSERT INTO administrador (nome, email, senha) VALUES (:nome, :email, :senha)");
            $resultado->bindValue(":nome", $adm->getNome());
            $resultado->bindValue(":email", $adm->getEmail());
            $resultado->bindValue(":senha", $adm->getSenha());

            return $resultado->execute(); 
        }

        public function listar(){
            $resultado = $this->conexao->prepare("SELECT * FROM administrador");
            $resultado->execute(); 

            $arrayAdministrador = array();

            while ($retorno = $resultado->fetch())
            {
                $objAdministrador = new Administrador();
                $objAdministrador->setId_adm($retorno['id_adm']);
                $objAdministrador->setNome($retorno['nome']);
                $objAdministrador->setEmail($retorno['email']);
                
                $arrayAdministrador[] = $objAdministrador;
            }
            return $arrayAdministrador;
        }
        public function listarPorId(Administrador $adm){
            $resultado = $this->conexao->prepare("SELECT * FROM administrador where id_adm=:id");
            $resultado->bindValue(":id", $adm->getId_adm());

            $resultado->execute(); 
            $retorno = $resultado->fetch();

            $objAdministrador = new Administrador();
            $objAdministrador->setId_adm($retorno['id_adm']);
            $objAdministrador->setNome($retorno['nome']);
            $objAdministrador->setEmail($retorno['email']);
            $objAdministrador->setSenha($retorno['senha']);

            return $objAdministrador;
        }
        public function editar(Administrador $Administrador){
            $resultado = $this->conexao->prepare("UPDATE administrador SET nome=:nome,  email=:email, senha=:senha where id_adm=:id_adm");

            $resultado->bindValue(":nome", $Administrador->getNome());
            $resultado->bindValue(":email", $Administrador->getEmail());
            $resultado->bindvalue(":senha", $Administrador->getSenha());
            $resultado->bindValue(":id_adm", $Administrador->getId_adm());
            
            return $resultado->execute();
        }

        public function excluir(Administrador $Administrador)
        {
            $resultado = $this->conexao->prepare("DELETE FROM administrador where id_adm=:id");
            $resultado->bindValue(":id", $Administrador->getId_adm());
            return $resultado->execute();
        }
        public function login(Administrador $Administrador)
        { 
            $resultado = $this->conexao->prepare("SELECT * FROM administrador where email=:email");
            $resultado->bindValue(":email", $Administrador->getEmail());
            
            $resultado->execute();
            
            if($resultado->rowCount()>0)
            {
                while($retorno = $resultado->fetch())
                {
                    if($retorno['senha'] == $Administrador->getSenha())
                    {
                        //$login = true;
                        $id = $retorno['id_adm'];
            
                        $_SESSION["logado"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["tipo"] = "administrador";
                        
                        return 3; //logado como administrador
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