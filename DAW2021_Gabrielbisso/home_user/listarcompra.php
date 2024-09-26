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
    include_once("../class/Usuario.php");
    include_once("../class/UsuarioDAO.php");
    
    $objCompraDAO = new CompraDAO();
    $retorno = $objCompraDAO->listar();
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
                                    <th scope="col">Id_compra</th>
                                    <th scope="col">Id_usuário</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Forma de Pagamento</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detalhes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach ($retorno as $linha){
                                ?>
                                    <tr style="text-align: center;">
                                        <td><?=$linha->getId_compra();?></td>
                                        <td>
                                        <?php
                                            $idusu = $linha->getId_usuario();
                                            
                                            $objUsuario= new Usuario();
	                                        $objUsuario->setId_usuario($idusu);

                                            $objUsuarioDAO = new UsuarioDAO();
	                                        $retornoUsuario = $objUsuarioDAO->listarPorId($objUsuario); 

                                            echo $retornoUsuario->getNome();
                                        ?>
                                        </td>
                                        <td>R$ <?=$linha->getTotal();?></td>
                                        <td><?=$linha->getData();?></td>
                                        <td><?=$linha->getForma_pag();?></td>
                                        <td><?=$linha->getStatus();?></td>
                                        <td><a href="detalhe.php?id=<?=$linha->getId_compra();?>"><span data-feather="info" style='color: #009405;'>Detalhes</span></a></td>
                                    </tr>
                                <?php
                                   }
                                ?>  
                            </tbody>
                        </table>
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