
<?php

    require_once "classes/view/ProdutoView.php";
    $produtoView = new ProdutoView();
    

    // if($_SERVER["REQUEST_METHOD"] == "GET")
    // {

    //      if (!isset($_GET['id'])) {
    //          return "ID do produto não fornecido.";
    //      }

    //      $produtoView->exibirEdicao($_GET['id']);
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        var_dump($_POST);
        $produtoView-> salvarINformacoes($_POST);

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
                    
                    if (!$protudoView->listarProdutos()) {
                        echo "<tr><td colspan='5'>Nenhum produto cadastrado.</td></tr>";
                    }

                ?>
            
            </tbody>
        </thead>

    </main>
</body>
</html>
