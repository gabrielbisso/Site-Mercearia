<?php
    session_start();

    include_once("../class/Administrador.php");
    include_once("../class/AdministradorDAO.php");

    $obj = new Administrador();
    $obj->setEmail($_POST['email']);
    $obj->setSenha($_POST['senha']);

    $objDAO = new AdministradorDAO();
    $retorno = $objDAO->login($obj);
    if($retorno==1)
    {
        header("location:admnao.html");
    }
    if($retorno==2)
    {
        header("location:senhano.html");
    }
    if($retorno==3)
    {
        header("location:../inicio/index.php");    
    }
    print_r($_SESSION);
?>
