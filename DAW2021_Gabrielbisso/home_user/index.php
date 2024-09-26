<?php
	include_once ("usercabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");

    $objProdutoDAO = new ProdutoDAO();
    $retornoProduto = $objProdutoDAO->listar(" ORDER BY produto.id_produto DESC LIMIT 3 ");
?>
	<!-- hero area -->
	<div class="hero-area hero-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 offset-lg-2 text-center">
					<div class="hero-text">
						<div class="hero-text-tablecell">
							<p class="subtitle">Produtos de qualidade e excelência</p>
							<h1>Dos deliciosos alimentos aos melhores produtos para sua casa.</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end hero area -->

	<!-- features list section -->
	<div class="list-section pt-80 pb-80">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-shipping-fast"></i>
						</div>
						<div class="content">
							<h3>Entrega Gratis</h3>
							<p>Em compras acima de R$100,00 para região Metropolitana.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
					<div class="list-box d-flex align-items-center">
						<div class="list-icon">
							<i class="fas fa-phone-volume"></i>
						</div>
						<div class="content">
							<h3>24/7 Suporte</h3>
							<p>Tenha suporte a qualquer hora.</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="list-box d-flex justify-content-start align-items-center">
						<div class="list-icon">
							<i class="fas fa-sync"></i>
						</div>
						<div class="content">
							<h3>Reembolso</h3>
							<p>Ganhe reembolso do valor de algum</p>
							<p>item dentro de 3 dias!</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end features list section -->

	<!-- product section -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-title">	
						<h3><span class="orange-text">Novidades</span>do<span class="orange-text">Mês</span></h3>
						<a href="sobrenos.php" class="boxed-btn">Contate-nos para mais informações das novidades!</a>
					</div>
				</div>
			</div>
			<div class="row">
            <?php
                 foreach($retornoProduto as $linha){
            ?>
            	<div class="col-lg-4 col-md-6 text-center">
			        <div class="single-product-item">
                        <div class="product-image">
					        <a href="produto.php?id_produto=<?=$linha->getId_produto();?>"><img src="../img/<?=$linha->getImagem();?>" alt=""  height="300px"></a>
				        </div>
                            <a href="produto.php?id_produto=<?=$linha->getId_produto();?>"><h5><?=$linha->getNome();?></h5></a>
                            <p><?=$linha->getDescricao();?></p>
						    <p class="product-price">R$<?=$linha->getPreco();?></p>
						    <a href="?id_produto=<?=$linha->getId_produto();?>&carrinho" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao carrinho!</a>
				    </div>
				</div>
            <?php
                }
            ?>
			</div>
		</div>
	</div>
	<!-- end product section -->

	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar1.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Shara Fernandes<span>Cliente local</span></h3>
								<p class="testimonial-body">
									" Adorei o atendimento, nota 10! "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar2.png" alt="">
							</div>
							<div class="client-meta">
								<h3>Sérgio Magalhães <span>Cliente local</span></h3>
								<p class="testimonial-body">
									" Ambiente muito agradavel!"
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar4.jpg" alt="">
							</div>
							<div class="client-meta">
								<h3>Gabriel Bisso <span>Clinte Local</span></h3>
								<p class="testimonial-body">
									" Frutas e Alimentos de alta qualidade, parabéns!"
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
						<div class="single-testimonial-slider">
							<div class="client-avater">
								<img src="assets/img/avaters/avatar3.png" alt="">
							</div>
							<div class="client-meta">
								<h3>João Silva <span>Cliente</span></h3>
								<p class="testimonial-body">
									" Deveria expandir para uma franquia na minha cidade, qualidade ótima! "
								</p>
								<div class="last-icon">
									<i class="fas fa-quote-right"></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
	
	<!-- advertisement section -->
	<div class="abt-section mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div>
						<i class="fas fa-play"><img src="assets/img/eufrutas.jpg" alt=""  height="300px"></i>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="abt-text">
						<p class="top-sub">Desde 07/2021</p>
						<h2>Nós somos <span class="orange-text">Mercefrut</span></h2>
						<p>Criada com o intuito de apostar no novo e no inovador, nossa equipe sempre buscou propor o melhor atimendo e unir o util com o agrádavel, trazendo tudo que você precisa para sua casa sem nem sair dela.</p>
						<a href="sobrenos.php" class="boxed-btn mt-4">Saiba mais e conheça nossa história!</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end advertisement section -->

<?php

	include_once ("userrodape.php");

?>
