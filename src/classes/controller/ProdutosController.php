<?php


require_once 'classes/service/produtoService.php';
require_once 'classes/service/estoqueService.php';


class ProdutosController{

    function salvar($nome, $preco, $variacao, $quantidade){

        $produtoService = new ProdutoService();
        // Save the product and get the product ID
        $produto_id = $produtoService->salvar($nome, $preco, $variacao, $quantidade);

        return $produto_id;
    }

    function listar(){

        $produtoService = new ProdutoService();
        // List all products
        $produtos = $produtoService->listar();

        return $produtos;
    }

    function buscarPorId($id){

        $produtoService = new ProdutoService();
        // Get product by ID
        $iten = $produtoService->buscarPorId($id);

        return $iten;
    }

    function excluir($id){

        $produtoService = new ProdutoService();
        // Delete product by ID
        $produtoService->excluir($id);

    }

    function atualizar($id, $nome, $preco, $variacao, $quantidade){

        $produtoService = new ProdutoService();
        // Update product by ID
        $produtoService->atulizar($id, $nome, $preco, $variacao, $quantidade);

    }

}