<?php
require_once 'classes/controller/ProdutosController.php';
require_once 'classes/controller/CarrinhoController.php';


class CarrinhoView{
    private $carrinhoController;
    private $produtoController;

    public function __construct() {
        $this->carrinhoController = new CarrinhoController();
        $this->produtoController = new ProdutosController();
    }


    function comprarProduto($id)
    {

        $produto = $this->produtoController->buscarPorId($id);

       // var_dump($produto, "to carrinhoVIew");

        if ($produto) {
            
            $this->carrinhoController->addCarrinho($produto); // Adiciona o produto ao carrinho

            var_dump($_SESSION['carrinho'], "to carrinhoView");
            
            echo "<script>alert('Produto comprado com sucesso!');</script>";
        } else {
            echo "<script>alert('Produto não encontrado!');</script>";
        }

      
        //header("Location: index.php"); // Redireciona para a página de listagem após a compra
        exit; // Certifique-se de chamar exit após o redirecionamento
    }

    function exibirCarrinho()
    {

        $subtotal = $this->carrinhoController->valorTotal();
        $frete = $this->carrinhoController->calcularFrete();

        echo "<h2>Carrinho de Compras</h2>";
        echo "<p>Subtotal: R$ {$subtotal}</p>";
        echo "<p>Frete: {$frete}</p>";


        if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
            echo "<ul>";
            foreach ($_SESSION['carrinho'] as $produto) {
                echo "<li>{$produto['nome']} - R$ {$produto['preco']}</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Seu carrinho está vazio.</p>";
        }

    }


}