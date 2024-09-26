<?php
include_once ("../cabecalho.php");
  include_once("../class/Categoria.php");
  include_once("../class/CategoriaDAO.php");
  include_once("../class/Produto.php");
  include_once("../class/ProdutoDAO.php");
  
  $objCategoriaDAO = new CategoriaDAO();
  $retorno = $objCategoriaDAO->listar();

  $id = $_GET['id'];
  $obj = new Produto();
  $obj->setId_produto($id);

  $objDAO = new ProdutoDAO();
  $retornoProduto = $objDAO->listarPorId($obj);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style='color: #08FD0C;'>Produto</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <h2 style='color: #E18B22;'>Editar Produto</h2>
    <form method="POST" action="editar_ok.php" enctype="multipart/form-data">
        <input type="hidden" name="id_produto"  value="<?=$retornoProduto->getId_produto();?>"/>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?=$retornoProduto->getNome();?>">
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" class="form-control" step="0.01" id="preco" name="preco" value="<?=$retornoProduto->getPreco();?>">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" value="<?=$retornoProduto->getQuantidade();?>">
        </div>
        <div class="form-group">
                <label for="fornecedor">Fornecedor</label>
                <input type="text" class="form-control" id="fornecedor" name="fornecedor"value="<?=$retornoProduto->getFornecedor();?>">
            </div>
        <div class="form-group">  
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?=$retornoProduto->getDescricao();?>">
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" name="id_categoria">
                <option>---</option>
                <?php
                    foreach($retorno as $linha)
                    {
                        if($linha->getId_categoria() == $retornoProduto->getId_categoria())
                        {
                ?>
                    <option value="<?=$linha->getId_categoria();?>" selected="selected"><?=$linha->getNome();?></option>
                <?php
                        }
                        else
                        {
                ?>
                    <option value="<?=$linha->getId_categoria();?>"><?=$linha->getNome();?></option>
                <?php
                        }
                    }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>
<?php
    include_once ("../rodape.php");
?>