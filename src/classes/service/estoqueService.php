<?php

require_once 'classes/config/conexao.php';

class EstoqueService{

    public function salvar($produto_id,$variacao, $quantidade )
    {

        $conexao = new Conexao();

        $pdo = $conexao->conectar();

        echo "Salvando estoque para o produto ID: $produto_id, variação: $variacao, quantidade: $quantidade\n";

        $stmt = $pdo->prepare("INSERT INTO estoque (produto_id, variacao , quantidade) VALUES (:produto_id, :variacao, :quantidade)");
        $stmt->bindParam(':produto_id', $produto_id);
        $stmt->bindParam(':variacao', $variacao);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->execute();

    }

    public function atualizar($id, $variacao, $quantidade)
    {

        $conexao = new Conexao();

        $pdo = $conexao->conectar();

        $stmt = $pdo->prepare("UPDATE estoque SET variacao = :variacao, quantidade = :quantidade WHERE produto_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':variacao', $variacao);
        $stmt->bindParam(':quantidade', $quantidade);
        $stmt->execute();

    }

    public function excluir($id)
    {

        $conexao = new Conexao();

        $pdo = $conexao->conectar();

        $stmt = $pdo->prepare("DELETE FROM estoque WHERE produto_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

    }

}