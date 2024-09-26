<?php
  include_once("../cabecalho.php");
  include_once("../class/Compra.php");
  include_once("../class/CompraDAO.php");

  $id = $_GET['id'];
  $obj = new Compra();
  $obj->setId_Compra($id);

  $objDAO = new CompraDAO();
  $retorno = $objDAO->recusar($obj);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Compra</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <h2 style='color: #E18B22;'>Recusar Compra</h2>
  <?php
    if($retorno)
    {
  ?>
    <br>
    <p><b>Infelizmente sua compra foi recusada!!!</b></p>
  <?php  
    }    
    else
    {
  ?>
    <br>
    <p><b>Infelizmente sua compra  não foi aprovada, tente novamente!!!</b></p>
  <?php 
    }
  ?>  
  <br>
  <button type="submit" class="btn btn-primary"><a href="listar.php" class="btn-primary">Voltar ao Listar Compra</a></button>
</main>
<?php
  include_once ("../rodape.php");
?>