<?php
  session_start();
  
  if(!isset($_SESSION['logado']))
  {
    header("location:../login/index.html");
  }

  include_once("../class/Usuario.php");
  include_once("../class/UsuarioDAO.php");
  
  $objUsuarioDAO = new UsuarioDAO();
  $retorno = $objUsuarioDAO->listar();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>MERCEFRUT</title>
    <link rel="shortcut icon" 
			href="../dadostemplate/MF.icon" >
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../dadostemplate/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    <!-- Custom styles for this template -->
    <link href="../dadostemplate/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"><img src='../logo_retangular.png' style="width:200px"></a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Pesquisar" aria-label="Search">
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" href="../login/sair.php" style='color: #E18B22;' >Sair</a>
      </div>
    </div>
  </header>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <br>
            <br>
            <br>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="../inicio/index.php">
              <span data-feather="home" style="color: #E18B22"></span>
                Início
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../administrador/home_administrador.php">
              <span data-feather="bar-chart-2" style="color: #E18B22"></span>
                Administrador
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../usuario/home_usuario.php">
              <span data-feather="users" style="color: #E18B22"></span>
                Usuário
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../categoria/home_categoria.php">
              <span data-feather="layers" style="color: #E18B22"></span>
                Categoria
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../produto/home_produto.php">
              <span data-feather="package" style="color: #E18B22"></span>
                Produto
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../compra/listar.php">
              <span data-feather="shopping-bag" style="color: #E18B22"></span>
                Compra
            </a>
          </li>
        </ul>
      </div>
    </nav>