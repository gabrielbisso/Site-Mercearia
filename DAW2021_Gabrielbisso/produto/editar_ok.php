<?php
    include_once("../cabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");

    $obj = new Produto();
    $obj->setNome($_POST['nome']);
    $obj->setPreco($_POST['preco']);
    $obj->setFornecedor($_POST['fornecedor']);
    $obj->setQuantidade($_POST['quantidade']);
    $obj->setDescricao($_POST['descricao']);
    $obj->setId_categoria($_POST['id_categoria']);
    $obj->setId_produto($_POST['id_produto']);

    $objDAO = new ProdutoDAO();
    $retorno = $objDAO->editar($obj);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Produto</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <h2 style='color: #E18B22;'>Editar Produto</h2>
  <?php
    if($retorno)
    {
  ?>
    <br>
    <p><b>Parabéns, seu produto foi editado com sucesso!!!</b></p>
  <?php
    }    
    else
    {
  ?>
    <br>
    <p><b>Parabéns, seu produto foi editado com sucesso!!!</b></p>
  <?php
    }
  ?>  
  <br>
  <button type="submit" class="btn btn-primary"><a href="listar.php" class="btn-primary">Voltar ao Listar Produtos</a></button>
</main>
<?php
    include_once ("../rodape.php");
?>