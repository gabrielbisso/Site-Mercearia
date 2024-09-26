<?php
    session_start();
    if(!isset($_SESSION["logado"]))
    {
        header("location:../login/indexusu.html");
    }
    include_once("usercabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");
    include_once("../class/Compra.php");
    include_once("../class/CompraDAO.php");
    include_once("../class/Compra_produto.php");
    include_once("../class/Compra_produtoDAO.php");
    include_once("../class/Usuario.php");
    include_once("../class/UsuarioDAO.php");
    
    $idcompra = $_GET['id'];

    $objcompra = new Compra();
    $objcompra->setId_compra($idcompra);

    $objcompraDAO = new CompraDAO();
    $retornocompra = $objcompraDAO->listarPorId($objcompra);

    $objcompra_produto = new Compra_produto();
    $objcompra_produtoDAO = new Compra_produtoDAO();
?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Acompanhar pedido</p>
						<h1>Pedidos</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
    <div class="cart-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead>
                                <tr style="text-align: center; color: #E18B22;">
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
                                        <td>R$ <?=$retorno->getPreco();?></td>
                                    </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-buttons">
						<a href="listarcompra.php" class="boxed-btn">Voltar ao listar compra</a>
					</div>
                </div>
            </div>
        </div>
    <div>
    <br>
	<!-- end cart -->
<?php
    include_once("userrodape.php");
?>