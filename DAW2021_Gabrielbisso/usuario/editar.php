<?php
    include_once ("../cabecalho.php");
    include_once("../class/Usuario.php");
    include_once("../class/UsuarioDAO.php");
    
    $id = $_GET['id'];
    $obj = new Usuario();
    $obj->setId_usuario($id);

    $objDAO = new UsuarioDAO();
    $retornoUsuario = $objDAO->listarPorId($obj);   
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Usuário</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    <h2 style='color: #E18B22;'>Editar Usuário</h2>
    <form method="POST" action="editar_ok.php" enctype="multipart/form-data">
        <input type="hidden" name="id_usuario" value="<?=$retornoUsuario->getId_usuario();?>"/>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?=$retornoUsuario->getNome();?>">
        </div>
        <div class="form-group">
            <label for="endereco">Endereco</label>
            <input type="text" class="form-control" id="endereco" name="endereco" value="<?=$retornoUsuario->getEndereco();?>">
        </div>
        <div class="form-group">
            <label for="cpf">CPF</label>
            <input type="text" class="form-control" id="cpf" name="cpf"value="<?=$retornoUsuario->getCpf();?>">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email" value="<?=$retornoUsuario->getEmail();?>">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" value="<?=$retornoUsuario->getSenha();?>">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</main>
<?php
    include_once ("../rodape.php");
?>