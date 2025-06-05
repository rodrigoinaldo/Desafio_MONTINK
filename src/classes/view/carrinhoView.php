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

        if ($produto) {
            
            $this->carrinhoController = $produto; // Adiciona o produto ao carrinho
            
            echo "<script>alert('Produto comprado com sucesso!');</script>";
        } else {
            echo "<script>alert('Produto não encontrado!');</script>";
        }

      
        header("Location: index.php"); // Redireciona para a página de listagem após a compra
        exit; // Certifique-se de chamar exit após o redirecionamento
    }

    function exibirCarrinho()
    {

        if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {

            $precoTotal = 0;

            echo "<h2>Carrinho de Compras</h2>";
            echo "<ul>";
            foreach ($_SESSION['carrinho'] as $produto) {
                
                echo "<li>{$produto['nome']} - R$ {$produto['preco']}</li>";
                $precoTotal +=$produto['preco'];
            }
            echo "</ul>";
        
            echo "<h3>Total: R$ {$precoTotal}</h3>";
            

        } else {
            echo "<h2>Carrinho vazio</h2>";
        }
    }


}