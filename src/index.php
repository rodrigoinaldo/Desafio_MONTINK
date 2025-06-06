
<?php
    require_once "classes/view/ProdutoView.php";
    require_once "classes/view/CarrinhoView.php";

    $produtoView = new ProdutoView();
    $carrinhoView = new CarrinhoView();
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        if ($_GET['acao'] == "excluir") {
            echo "<script>alert('Produto excluído com sucesso!');</script>";
            $produtoView->excluirdados($_GET['id']);
        }  

        

        if($_GET['acao'] == "comprar")  {
        
            echo "<script>alert('Produto comprado com sucesso!');</script>";
            $carrinhoView->comprarProduto($_GET['id']);
        }

       
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            // Se o ID estiver presente, trata como edição
            $produtoView->editarInformacoes($_POST);
        } else {
            // Caso contrário, trata como criação
            $produtoView->salvarINformacoes($_POST);
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>

        <div>
            <h1>Sistemas de vendas</h1>
        </div>

    </header>

    <main>

        <div>
            <h2>Cadastro de Produtos</h2>
            <?php

                $produtoView = new ProdutoView();
                $produtoView->exibirFormulario();
            ?>
        </div>    


        <thead>
            <tbody>

                <?php
                    $protudoView = new ProdutoView();
                    $protudoView->listarProdutos();
                    
                    // if (!$protudoView->listarProdutos()) {
                    //     echo "<tr><td colspan='5'>Nenhum produto cadastrado.</td></tr>";
                    // }    
                ?>
            
            </tbody>
        </thead>

        <a href="compra.php">Comprar Produtos</a>

    </main>
</body>
</html>
