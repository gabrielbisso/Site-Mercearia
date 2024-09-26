<?php
    include_once ("../cabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");
    
    $objProdutoDAO = new ProdutoDAO();
    $retorno = $objProdutoDAO->listar();
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2" style='color: #08FD0C;'>Produtos</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
  </div>
  </div>
    <h2 style='color: #E18B22;'>Relação dos Produtos</h2>
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr style="text-align: center;">
          <th scope="col">Id_produto</th>
          <th scope="col">Id_categoria</th>
          <th scope="col">Nome</th>
          <th scope="col">Preço</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Fornecedor</th>
          <th scope="col">Imagem</th>
          <th scope="col" style="text-align: left;">Descrição</th>
          <th scope="col">Editar</th>
          <th scope="col">Editar Imagem</th>
          <th scope="col">Excluir</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($retorno as $linha)
          {
        ?>
          <tr style="text-align: center;">
            <td><?=$linha->getId_produto();?></td>
            <td><?=$linha->getId_categoria();?></td>
            <td><?=$linha->getNome();?></td>
            <td>R$ <?=$linha->getPreco();?></td>
            <td><?=$linha->getQuantidade();?></td> 
            <td><?=$linha->getFornecedor();?></td>
            <td><img  src="../img/<?=$linha->getImagem();?>" height="70px" width="70px"/></td>
            <td style="text-align: left;"><?=$linha->getDescricao();?></td>
            <td><a href="editar.php?id=<?=$linha->getId_produto();?>"><span data-feather="edit" style='color: #08FD0C;'>Editar</span></a></td>
            <td><a href="editarimagem.php?id=<?=$linha->getId_produto();?>"><span data-feather="edit" style='color: #08710C;'>Editar Imagem</span></a></td>
            <td><a href="excluir.php?id=<?=$linha->getId_produto();?>"><span data-feather="trash-2" style="color:red">Excluir</span></a></td>
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