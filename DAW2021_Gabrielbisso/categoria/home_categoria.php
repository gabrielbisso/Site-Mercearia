<?php
    include_once ("../cabecalho.php");
    include_once("../class/Categoria.php");
    include_once("../class/CategoriaDAO.php");
    
    $objCategoriaDAO = new CategoriaDAO();
    $retorno = $objCategoriaDAO->listar();
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Categoria</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    <h2 style='color: #E18B22;'>Listar Categorias</h2>
    <form method="POST" action="">
        <br>
        <button type="submit" class="btn btn-primary" href="listar.php"><a href="listar.php" class="btn-primary">Listar Categorias</a></button>
    </form>
    <br>
    <h2 style='color: #E18B22;'>Inserir Categorias</h2>
    <form method="POST" action="">
        <br>
        <button type="submit" class="btn btn-primary"><a href="inserir.php" class="btn-primary">  Inserir Categorias </a></button>
    </form>
</main>
<?php
    include_once ("../rodape.php");
?>