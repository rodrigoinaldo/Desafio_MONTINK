<?php
    require_once 'classes/controller/ProdutosController.php';
    require_once 'classes/view/carrinhoView.php';

    $carrinhoView = new CarrinhoView();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <main>

        <h1>Compras</h1>

        <div>
            <?php
                // Exibe o carrinho de compras
                $carrinhoView->exibirCarrinho();
            ?>
        </div>


    </main>

</body>
</html>