<?php
  include_once ("../cabecalho.php");
  
  $id = $_GET['id'];
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Produto</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <h2 style='color: #E18B22;'>Editar Imagem</h2>
  <form method="POST" action="editarimagem_ok.php" enctype="multipart/form-data">
    <input type="hidden" name="id_produto"  value="<?=$id;?>"/>
    <div class="form-group">
      <label for="imagem">Imagem</label>
      <input type="file" class="form-control" id="imagem" name="imagem">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Enviar</button>
  </form>
</main>
<?php
  include_once ("../rodape.php");
?>