<?php
    include_once("../cabecalho.php");
    include_once("../class/Administrador.php");
    include_once("../class/AdministradorDAO.php");

    $obj = new Administrador();
    $obj->setId_adm($_POST['id_adm']);
    $obj->setNome($_POST['nome']);
    $obj->setEmail($_POST['email']);
    $obj->setSenha($_POST['senha']);

    $objDAO = new AdministradorDAO();
    $retorno = $objDAO->editar($obj);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Administrador</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <h2 style='color: #E18B22;'>Editar Administrador</h2>
  <?php
    if($retorno)
    {
  ?>
    <br>
    <p><b>Parabéns, seu administrador foi editado com sucesso!!!</b></p>
  <?php
    }    
    else
    {
  ?>
    <br>
    <p><b>Infelizmente seu administrador não foi editado, tente novamente!!!</b></p>
  <?php
    }
  ?>   
  <br>
  <button type="submit" class="btn btn-primary"><a href="listar.php" class="btn-primary">Voltar ao Listar administrador</a></button> 
</main>
<?php
    include_once ("../rodape.php");
?>
