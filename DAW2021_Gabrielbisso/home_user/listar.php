<?php
	include_once ("usercabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");
	include_once("../class/Categoria.php");
    include_once("../class/CategoriaDAO.php");


    $id = $_GET ['idCategoria'];
    
    $objProdutoDAO = new ProdutoDAO();
    $retornoProduto = $objProdutoDAO->listar(" WHERE produto.id_categoria = $id ORDER BY produto.id_produto DESC ");

	$objCategoria = new Categoria();
	$objCategoria->setId_categoria($id);

	$objCategoriaDAO = new CategoriaDAO();
	$retornoCategoria = $objCategoriaDAO->listarPorId($objCategoria);

?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
                        <p>Categoria:</p>
						<h1><?=$retornoCategoria->getNome();?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row product-lists">
            <?php
                foreach($retornoProduto as $linha){
            ?>
				<div class="col-lg-4 col-md-6 text-center strawberry">
					<div class="single-product-item">
						<div class="product-image">
							<a href="produto.php?id_produto=<?=$linha->getId_produto();?>"><img src="../img/<?=$linha->getImagem();?>" alt=""></a>
						</div>
						<a href="produto.php?id_produto=<?=$linha->getId_produto();?>"><h5><?=$linha->getNome();?></h5></a>
                        <p><?=$linha->getDescricao();?></p>
						<p class="product-price"><?=$linha->getPreco();?></p>
						<a href="produto.php?id_produto=<?=$linha->getId_produto();?>" class="cart-btn"><i class="fas fa-shopping-cart"></i>Mais Informações!</a>

					</div>
				</div>
                <?php
                 }
                ?>
			</div>
	</div>
	<!-- end products -->

<?php

    include_once ("userrodape.php");

?>