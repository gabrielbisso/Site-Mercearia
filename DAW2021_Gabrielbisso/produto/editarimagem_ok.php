<?php
    include_once("../cabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");

    $nome=$_FILES["imagem"]["name"];
    $nomeTemporario=$_FILES["imagem"]["tmp_name"];
    $diretorio = "../img/".$nome;

    if(move_uploaded_file($nomeTemporario, $diretorio))
    {
        echo "imagem enviada";
    }
    else
    {
        echo "n rolou";
    }

    $obj = new Produto();

    $obj->setImagem($nome);
    $obj->setId_produto($_POST['id_produto']);

    $objDAO = new ProdutoDAO();
    $retorno = $objDAO->editarImagem($obj);
    if($retorno)
    {
        echo "funcionou";
    }
    else
    {
        echo "n funcionou";
    }
    ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style='color: #08FD0C;'>Produto</h1>
    </div>
    <h2 style='color: #E18B22;'>Editar Imagem</h2>
    <?php
        if($retorno)
        {
    ?>
        <br>
        <p><b>Parabéns, sua imagem foi editada com sucesso!!!</b></p>
    <?php
        }
        else
        {
    ?>
        <br>
        <p><b>Parabéns, sua imagem foi editada com sucesso!!!</b></p>
    <?php
        }
    ?>
    <br>
    <button type="submit" class="btn btn-primary"><a href="listar.php" class="btn-primary">Voltar ao Listar Produtos</a></button>
</main>
<?php
    include_once "../rodape.php";
?>