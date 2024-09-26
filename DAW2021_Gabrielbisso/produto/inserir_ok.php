<?php
    include_once("../cabecalho.php");

    $nome=$_FILES["imagem"]["name"];
    $nomeTemporario=$_FILES["imagem"]["tmp_name"];
    $diretorio="../img/".$nome;

    if(move_uploaded_file($nomeTemporario, $diretorio))
    {
        echo "imagem enviada";
    }
    else
    {
        echo "falhou :(";
    }

    include_once("../class/Produto.php");
     include_once("../class/ProdutoDAO.php");

     $obj = new Produto();
     $obj->setNome($_POST['nome']);
     $obj->setPreco($_POST['preco']);
     $obj->setQuantidade($_POST['quantidade']);
     $obj->setfornecedor($_POST['fornecedor']);
     $obj->setImagem($nome); 
     $obj->setDescricao($_POST['descricao']);
     $obj->setId_categoria($_POST['id_categoria']);

     $objDAO = new ProdutoDAO();
     $retorno = $objDAO->inserir($obj);
   
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style='color: #08FD0C;'>Produto</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <h2 style='color: #E18B22;'>Inserir Produto</h2>
    <?php
        if($retorno)
        {
    ?>
        <br>
        <p><b>Parabéns, seu produto foi inserido com sucesso!!!</b></p>
    <?php
        }    
        else
        {
    ?>
        <br>
        <p><b>Infelizmente seu produto não foi inserido, tente novamente!!!</b></p>
    <?php
        }
    ?>
    <br>
    <button type="submit" class="btn btn-primary"><a href="inserir.php" class="btn-primary">Voltar ao Inserir Produtos</a></button>
    <br>
    <br>
    <br>
    <button type="submit" class="btn btn-primary"><a href="listar.php" class="btn-primary">Voltar ao Listar Produtos</a></button>
</main>
<?php
    include_once ("../rodape.php");
?>