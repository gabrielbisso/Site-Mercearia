<?php
    include_once("usercabecalho.php");
    include_once("../class/Produto.php");
    include_once("../class/ProdutoDAO.php");
    include_once("../class/Compra.php");
    include_once("../class/CompraDAO.php");
    include_once("../class/Compra_produto.php");
    include_once("../class/Compra_produtoDAO.php");

    $objProduto = new Produto();
    $objProdutoDAO = new ProdutoDAO();

    $obj = new Compra();
    $obj->setData(date("Y-m-d"));
    $obj->setId_usuario($_SESSION['id']);
    $obj->setForma_pag($_POST["forma_pag"]);
    $obj->setStatus("Aguardando");

    $total=0;
    foreach($_SESSION['carrinho'] as $linha)
    {
        $objProduto->setId_produto($linha);
        $retorno1=$objProdutoDAO->listarPorId($objProduto);
        $preco=$retorno1->getPreco();
        $total=$total+($_POST["quantidade_prod$linha"]*$preco);
    }
    $obj->setTotal($total);

    $objDAO = new CompraDAO();
    $retorno = $objDAO->inserir($obj);

    if($retorno != false)
    {
        $objProduto = new Produto();
        $objProdutoDAO = new ProdutoDAO();

        $objVP = new Compra_produto();
        $objVP->setId_compra($retorno);

        $objVPDAO = new Compra_produtoDAO();
        //print_r($_FILES);
        foreach($_SESSION['carrinho'] as $linha)
        {
            $totalfinal=0;
            $objVP->setId_produto($linha);
            $objVP->setQuantidade_prod($_POST["quantidade_prod$linha"]);
            
            $objProduto->setId_produto($linha);
            $retorno = $objProdutoDAO->listarPorId($objProduto);
            $objVP->setPreco($retorno->getPreco());

            if($objVPDAO->inserir($objVP))
            {
                //echo "tudo ok";
            }
            else
            {
                //echo "erro vp";
            }
        }    
    }
?>
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Pedido Finalizado</p>
                        <h1>Suas compras foram enviadas!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->
    <!-- error section -->
    <div class="full-height-section error-section">
        <div class="full-height-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="error-text">
                            <h1>Parabéns, seus pedidos foram solictados.</h1>
                            <p>Acompanhe o status do pedido na nossa sacola ao lado do carrinho, ou clicando no botão abaixo.</p>
                            <a href="index.php" class="boxed-btn">Voltar a página inicial.</a>
                            <a href="listarcompra.php" class="boxed-btn">Acompanhar pedido.</a>
                            <a href="sairusu.php" class="boxed-btn">Finzalizar sessão.</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once("userrodape.php");
?> 