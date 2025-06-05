<?php


require_once 'classes/service/produtoService.php';
require_once 'classes/service/estoqueService.php';


class ProdutosController{

    private $produtoService;
    private $estoqueService;

    public function __construct() {
        $this->produtoService = new ProdutoService();
        $this->estoqueService = new EstoqueService();
    }

    function salvar($nome, $preco, $variacao, $quantidade){
        
        // Save the product and get the product ID
        $produto_id = $this->produtoService->salvar($nome, $preco, $variacao, $quantidade);

        return $produto_id;
    }

    function listar(){

        // List all products
        $produtos = $this->produtoService->listar();

        return $produtos;
    }

    function buscarPorId($id){

        // Get product by ID
        $iten = $this->produtoService->buscarPorId($id);

        return $iten;
    }

    function excluir($id){

        // Delete product by ID
        $this->produtoService->excluir($id);

    }

    function atualizar($id, $nome, $preco, $variacao, $quantidade){
        // Update product by ID
        $this->produtoService->atulizar($id, $nome, $preco, $variacao, $quantidade);

    }

}