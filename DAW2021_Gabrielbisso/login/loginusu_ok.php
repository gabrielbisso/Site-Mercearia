<?php
    session_start();

    include_once("../class/Usuario.php");
    include_once("../class/UsuarioDAO.php");

    $obj = new Usuario();
    $obj->setEmail($_POST['email']);
    $obj->setSenha($_POST['senha']);

    $objDAO = new UsuarioDAO();
    $retorno = $objDAO->login($obj);
    if($retorno==1)
    {
        header("location:admnaousu.html");
    }
    if($retorno==2)
    {
        header("location:senhanousu.html");
    }
    if($retorno==3)
    {
        header("location:../home_user/carrinho.php");    
        //echo "logado";
    }

    print_r($_SESSION);
?>