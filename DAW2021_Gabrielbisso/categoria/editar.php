<?php
  include_once ("../cabecalho.php");
    include_once("../class/Categoria.php");
    include_once("../class/CategoriaDAO.php");
  
    $id = $_GET['id'];
    $obj = new Categoria();
    $obj->setId_categoria($id);

    $objDAO = new CategoriaDAO();
    $retornoCategoria = $objDAO->listarPorId($obj);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Categoria</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <h2 style='color: #E18B22;'>Editar Categoria</h2>
    <form method="POST" action="editar_ok.php" enctype="multipart/form-data">
    <input type="hidden" name="id_categoria" value="<?=$retornoCategoria->getId_categoria();?>"/>
      <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" value="<?=$retornoCategoria->getNome();?>">
      </div>
      <br>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>
<?php
  include_once ("../rodape.php");
?>
