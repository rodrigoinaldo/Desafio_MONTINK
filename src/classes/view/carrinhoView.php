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
        $this->carrinhoController->listarTodos();       
    }


}