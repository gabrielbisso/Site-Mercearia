<?php
    session_start();
    if(!isset($_SESSION["logado"]))
    {
        header("location:../login/indexusu.html");
    }
    if(!isset($_SESSION["carrinho"]))
    {
        header("location:../home_user/");
    }
    include_once("usercabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");

?>
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Finzalizando sua Compra</p>
						<h1>Carrinho</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<form action="carrinho_ok.php" method="POST" >
		<div class="cart-section mt-150 mb-150">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-12">
						<div class="cart-table-wrap">
							<table class="cart-table">
								<thead class="cart-table-head">
									<tr class="table-head-row">
										<th class="product-image">Imagem</th>
										<th class="product-name">Nome</th>
										<th class="product-price">Preco</th>
										<th class="product-quantity">Quantidae</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$obj = new Produto();
										$objDAO = new ProdutoDAO();
										$acum=0;
										$acumtotal=0;
										foreach ($_SESSION['carrinho'] as $linha)
										{
											$obj->setId_produto($linha);
											$retorno = $objDAO->listarPorId($obj);
											$acum= $acum + $retorno->getPreco();
									?>
									<tr class="table-body-row">
										<td class="product-image"><img src="../img/<?=$retorno->getImagem();?>" alt=""></td>
										<td class="product-name"><?=$retorno->getNome();?></td>
										<td class="product-price"><?=$retorno->getPreco();?></td>
										<td class="product-quantity"><input type="number" name="quantidade_prod<?=$linha;?>" placeholder="0"></td>
									</tr>
									<?php
										}
									?>
								</tbody>
							</table>
						</div>
					</div>

					<div class="col-lg-4">
						<div class="total-section">
							<div class="coupon-section">
								<h3><strong>Forma de Pagamento</strong></h3>
								<select class="form-control" name="forma_pag">
									<option>---</option>            
									<option value="Dinheiro">Dinheiro</option>
									<option value="Cartão">Cartão</option>
									
								</select>
							</div>
							<div class="cart-buttons">
								<button type="submit" class="boxed-btn" style="color: white; background-color: red; border-radius: 30px; border:0px; padding: 10px;"><b>Finalizar Compra</b></button>
								<a href="sairusu.php" class="boxed-btn">Finzalizar sessão</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- end cart -->

	<?php
    include_once("userrodape.php");

?>