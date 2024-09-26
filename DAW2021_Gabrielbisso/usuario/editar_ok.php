<?php
  include_once("../cabecalho.php");
  include_once("../class/Usuario.php");
  include_once("../class/UsuarioDAO.php");

  $obj = new Usuario();
  $obj->setId_usuario($_POST['id_usuario']);
  $obj->setNome($_POST['nome']);
  $obj->setEndereco($_POST['endereco']);
  $obj->setCpf($_POST['cpf']);
  $obj->setEmail($_POST['email']);
  $obj->setSenha($_POST['senha']);

  $objDAO = new UsuarioDAO();
  $retorno = $objDAO->editar($obj);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Usuário</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <h2 style='color: #E18B22;'>Editar Usuário</h2>
  <?php
    if($retorno)
    {
  ?>
    <br>
    <p><b>Parabéns, seu usuário foi editado com sucesso!!!</b></p>
  <?php
    }    
    else
    {
  ?>
    <br>
    <p><b>Infelizmente seu usuário não foi editado, tente novamente!!!</b></p>
  <?php
    }
  ?>   
  <br>
  <button type="submit" class="btn btn-primary"><a href="listar.php" class="btn-primary">Voltar ao Listar usuário</a></button> 
</main>
<?php
    include_once ("../rodape.php");
?>
