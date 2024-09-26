<?php
    include_once ("../cabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");
    include_once("../class/Compra.php");
    include_once("../class/CompraDAO.php");
    include_once("../class/Compra_produto.php");
    include_once("../class/Compra_produtoDAO.php");

    $idcompra = $_GET['id'];

    $objcompra = new Compra();
    $objcompra->setId_compra($idcompra);

    $objcompraDAO = new CompraDAO();
    $retornocompra = $objcompraDAO->listarPorId($objcompra);

    $objcompra_produto = new Compra_produto();
    $objcompra_produtoDAO = new Compra_produtoDAO();
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style='color: #08FD0C;'>Compra</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
    </div>
    <h2 style='color: #E18B22;'>Detalhe da Compra</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr style="text-align: center;">
                    <td><b><i>TOTAL:  R$ <?=$retornocompra->getTotal();?></i></b></td>
                </tr>
                <tr style="text-align: center;">
                    <th scope="col">Id_produto</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $obj = new Produto();
                $objDAO = new ProdutoDAO();
                foreach ($objcompra_produtoDAO->listar() as $linha)
                {
                    if($linha->getId_compra()==$idcompra)
                    {
                        $obj->setId_produto($linha->getId_produto());
                        $retorno = $objDAO->listarPorId($obj);
                ?>
                    <tr style="text-align: center;">
                        <td><?=$retorno->getId_produto();?></td>
                        <td><img  src="../img/<?=$retorno->getImagem();?>" height="70px" width="70px"/></td>
                        <td><?=$retorno->getNome();?></td>
                        <td><?=$retorno->getPreco();?></td>
                    </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</main>
<?php
    include_once ("../rodape.php");
?>
