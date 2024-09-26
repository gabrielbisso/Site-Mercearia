<?php
  include_once("../cabecalho.php");
  include_once("../class/Produto.php");
  include_once("../class/ProdutoDAO.php");

  $id = $_GET['id'];
  $obj = new Produto();
  $obj->setId_produto($id);

  $objDAO = new ProdutoDAO();
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Produto</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <h2 style='color: #E18B22;'>Excluir Produto</h2>
  <?php
    if($objDAO->excluir($obj))
    {
  ?>
    <br>
    <p><b>Parabéns, seu produto foi excluido com sucesso!!!</b></p>
  <?php  
    }    
    else
    {
  ?>
    <br>
    <p><b>Infelizmente seu produto não foi excluido, tente novamente!!!</b></p>
  <?php 
    }
  ?>  
  <br>
  <button type="submit" class="btn btn-primary"><a href="listar.php" class="btn-primary">Voltar ao Listar Produtos</a></button>
</main>
<?php
  include_once ("../rodape.php");
?>