<?php 
    include_once ("../cabecalho.php");
    include_once("../class/Administrador.php");
    include_once("../class/AdministradorDAO.php");
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Administrador</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    <h2 style='color: #E18B22;'>Inserir Administrador</h2>
    <form method="POST" action="inserir_ok.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>
<?php
    include_once ("../rodape.php");
?>