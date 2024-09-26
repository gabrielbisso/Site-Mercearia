<?php
    include_once("../class/Categoria.php");
    include_once("../class/CategoriaDAO.php");
    include_once("../cabecalho.php");

    $objCategoriaDAO = new CategoriaDAO();
    $retorno = $objCategoriaDAO->listar();
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style='color: #08FD0C;'>Produto</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <h2 style='color: #E18B22;'>Inserir produto</h2>
    <form method="POST" action="inserir_ok.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="number" class="form-control" step="0.01" id="preco" name="preco" placeholder="Preço">
        </div>
        <div class="form-group">
            <label for="quantidade">Quantidade</label>
            <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Quantidade">
        </div>
        <div class="form-group">
            <label for="fornecedor">Fornecedor</label>
            <input type="text" class="form-control" id="fornecedor" name="fornecedor" placeholder="Fornecedor">
        </div>
        <div class="form-group">
            <label for="imagem">Imagem</label>
            <input type="file" class="form-control" id="imagem" name="imagem">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Descrição">
        </div>
        <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" name="id_categoria">
                <option>---</option>
                <?php
                    foreach($retorno as $linha)
                    {
                        ?>
                        <option value="<?=$linha->getId_categoria();?>"><?=$linha->getNome();?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>
<?php
    include_once ("../rodape.php");
?>