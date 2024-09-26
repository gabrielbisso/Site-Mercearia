<?php
	@session_start();
	if(isset($_GET["carrinho"]))
	{
		if(!isset($_SESSION["carrinho"]))
		{
			$_SESSION["carrinho"] = array();
		}
		$adicionar=true;

		foreach($_SESSION["carrinho"] as $linha)
		{
			if($linha == $_GET["id_produto"])
			{
				$adicionar = false;
			}
		}
		if($adicionar)
		{
			array_push($_SESSION["carrinho"], $_GET["id_produto"]);
		}
	}

	include_once("../class/Categoria.php");
	include_once("../class/CategoriaDAO.php");

	$objCategoriaDAO = new CategoriaDAO();
	$retornoCategoria = $objCategoriaDAO->listar();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>MERCEFRUT</title>

	<!-- favicon -->
	<link rel="shortcut icon" href="../dadostemplate/MF.icon">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src='../logo_retangular.png' alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="index.php">Inicio</a></li>
								<li><a href="sobrenos.php">Sobre nós</a></li>
								<li><a href="#">Categorias</a>
									<ul class="sub-menu">
                                    <?php
                                         foreach($retornoCategoria as $linha){
                                    ?>
                                        <li><a href="listar.php?idCategoria=<?=$linha->getId_categoria();?>"><?=$linha->getNome();?></a></li>
                                        <?php
                                    }
                                    ?>
									</ul>
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="carrinho.php"><i class="fas fa-shopping-cart"></i></a>
										<a class="shopping-cart" href="listarcompra.php"><i class="fas fa-shopping-bag"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
										<a class="shopping-cart" href="sairusu.php"><i class="fas fa-ban"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<form method="GET" action="pesquisar.php">
								<h3>Procurar Por:</h3>
								<input type="text" name="pesquisar" placeholder="" value="">
								<button type="submit">Pesquisar <i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->