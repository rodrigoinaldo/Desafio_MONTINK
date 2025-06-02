<?php
    require_once 'classes/view/ProdutoView.php';
    $produtoView = new ProdutoView();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $produtoView->exibirEdicao($_GET['id']);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $produtoView->editarInformacoes($_POST);
        }
    ?>
</body>
</html>