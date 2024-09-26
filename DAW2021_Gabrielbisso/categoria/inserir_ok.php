<?php
    include_once ("../cabecalho.php");
    include_once("../class/Categoria.php");
    include_once("../class/CategoriaDAO.php");

    $obj = new Categoria();
    $obj->setNome($_POST['nome']);

    $objDAO = new CategoriaDAO();
    $retorno = $objDAO->inserir($obj); 
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Categoria</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <h2 style='color: #E18B22;'>Inserir Categoria</h2>
  <?php
    if($retorno)
    {
  ?>
    <br>
    <p><b>Parabéns, sua categoria foi inserida com sucesso!!!</b></p>
  <?php
    }    
    else
    {
  ?>
    <br>
    <p><b>Infelizmente sua categoria não foi inserida, tente novamente!!!</b></p>
  <?php
    }
  ?>   
  <br>
  <button type="submit" class="btn btn-primary"><a href="inserir.php" class="btn-primary">Voltar ao Inserir categoria</a></button> 
  <br>
  <br>
  <br>
  <button type="submit" class="btn btn-primary"><a href="listar.php" class="btn-primary">Voltar ao Listar categoria</a></button>
</main>
<?php
    include_once ("../rodape.php");
?>