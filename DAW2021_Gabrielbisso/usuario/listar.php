<?php
    include_once ("../cabecalho.php");
    include_once("../class/Usuario.php");
    include_once("../class/UsuarioDAO.php");
    
    $objUsuarioDAO = new UsuarioDAO();
    $retorno = $objUsuarioDAO->listar();
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Usuário</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
  </div>
  <h2 style='color: #E18B22;'>Relação dos Usuários</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr style="text-align: center;">
          <th scope="col">Id_usuário</th>
          <th scope="col">Nome</th>
          <th scope="col">Endereço</th>
          <th scope="col">Cpf</th>
          <th scope="col">Email</th>
          <th scope="col">Editar</th>
          <th scope="col">Excluir</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($retorno as $linha)
          {
        ?>
          <tr style="text-align: center;">
            <td><?=$linha->getId_usuario();?></td>
            <td><?=$linha->getNome();?></td>
            <td><?=$linha->getEndereco();?></td>
            <td><?=$linha->getCpf();?></td>
            <td><?=$linha->getEmail();?></td>
            <td><a href="editar.php?id=<?=$linha->getId_usuario();?>"><span data-feather="edit" style='color: #08FD0C;'>Editar</span></a></td>
            <td><a href="excluir.php?id=<?=$linha->getId_usuario();?>"><span data-feather="trash-2" style="color:red">Excluir</span></a></td>
          </tr>
        <?php
          }
        ?>          
      </tbody>
    </table>
  </div>
</main>
<?php
  include_once ("../rodape.php");
?>
