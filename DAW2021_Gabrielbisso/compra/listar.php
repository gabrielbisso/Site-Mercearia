<?php
    include_once ("../cabecalho.php");
    include_once("../class/Compra.php");
    include_once("../class/CompraDAO.php");
    
    
    $objCompraDAO = new CompraDAO();
    $retorno = $objCompraDAO->listar();
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2" style='color: #08FD0C;'>Compra</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
    </div>
    <h2 style='color: #E18B22;'>Relação das Compras</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr style="text-align: center;">
                    <th scope="col">Id_compra</th>
                    <th scope="col">Id_usuário</th>
                    <th scope="col">Total</th>
                    <th scope="col">Data</th>
                    <th scope="col">Forma de Pagamento</th>
                    <th scope="col">Status</th>
                    <th scope="col">Informações</th>
                    <th scope="col">Aprovar</th>
                    <th scope="col">Recusar</th>
                    <th scope="col">Deletar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($retorno as $linha){
                ?>
                    <tr style="text-align: center;">
                        <td><?=$linha->getId_compra();?></td>
                        <td><?=$linha->getId_usuario();?></td>
                        <td>R$ <?=$linha->getTotal();?></td>
                        <td><?=$linha->getData();?></td>
                        <td><?=$linha->getForma_pag();?></td>
                        <td><?=$linha->getStatus();?></td>
                        <td><a href="detalhe.php?id=<?=$linha->getId_compra();?>"><span data-feather="info" style='color: #009405;'>Informações</span></a></td>
                        <td><a href="aprovar.php?id=<?=$linha->getId_compra();?>"><span data-feather="check-square" style='color: #08FD0C;'>Aprovar</span></a></td>
                        <td><a href="recusar.php?id=<?=$linha->getId_compra();?>"><span data-feather="x-circle" style="color:#F5E600">Recusar</span></a></td>
                        <td><a href="deletar.php?id=<?=$linha->getId_compra();?>"><span data-feather="trash-2" style="color:red">Recusar</span></a></td>
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
