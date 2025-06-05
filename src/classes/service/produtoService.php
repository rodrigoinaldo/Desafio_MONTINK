<?php

require_once 'classes/model/Produtos.php';
require_once 'classes/model/Estoque.php';
require_once 'classes/config/conexao.php';
require_once 'classes/service/estoqueService.php';

class ProdutoService{

    public function salvar($nome, $preco, $variacao, $quantidade){

        try {
            $conexao = new Conexao();
            $estoqueService = new EstoqueService();

            $pdo=$conexao->conectar();

            $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->execute();
            
            // Get the last inserted product ID
            $produto_id = $pdo->lastInsertId();

            // Save the product variation
            $estoqueService->salvar($produto_id, $variacao, $quantidade);


            return $produto_id;
        } catch (\Throwable $th) {

            return $th->getMessage();

        }

    }

    public function listar(){

        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $stmt = $pdo->prepare("SELECT p.id, p.nome, p.preco , e.quantidade, e.variacao FROM produtos p INNER JOIN estoque e ON p.id = e.produto_id;");
        $stmt->execute();

        $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        


        return $produtos;

    }

    public function buscarPorId($id){

        $conexao = new Conexao();
        $pdo = $conexao->conectar();

        $stmt = $pdo->prepare("SELECT p.*, e.quantidade, e.variacao FROM produtos p INNER JOIN estoque e ON p.id = e.produto_id WHERE p.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $iten = $stmt->fetch(PDO::FETCH_ASSOC);

        return $iten;

    }

    public function excluir($id){

        $conexao = new Conexao();
        $estoqueService = new EstoqueService();

        $pdo = $conexao->conectar();

        // Delete from estoque first
        $estoqueService->excluir($id);

        // Then delete from produtos
        $stmt = $pdo->prepare("DELETE FROM produtos WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return true;

    }

    public function atulizar($id, $nome, $preco, $variacao, $quantidade)
    {
        $conexao = new Conexao();
        $estoqueService = new EstoqueService();

        $pdo = $conexao->conectar();

        // Update product information
        $stmt = $pdo->prepare("UPDATE produtos SET nome = :nome, preco = :preco WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':preco', $preco);
        $stmt->execute();

        // Update stock information
        $estoqueService->atualizar($id, $variacao, $quantidade);

        return true;
    }

}