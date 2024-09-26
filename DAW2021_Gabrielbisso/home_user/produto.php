<?php
	
	include_once ("usercabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");

    $id = $_GET['id_produto'];
    $obj = new Produto();
    $obj->setId_produto($id);
	
	
    $objDAO = new ProdutoDAO();
    $retornoProduto = $objDAO->listarPorId($obj);
?>
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1><?=$retornoProduto->getNome();?></h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="../img/<?=$retornoProduto->getImagem();?>" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3><?=$retornoProduto->getNome();?></h3>
						<p class="single-product-pricing">R$<?=$retornoProduto->getPreco();?></p>
						<p><?=$retornoProduto->getDescricao();?></p>
						<div class="single-product-form">
						    <a href="?id_produto=<?=$obj->getId_produto();?>&carrinho" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao carrinho!</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

<?php

    include_once ("userrodape.php");
?>