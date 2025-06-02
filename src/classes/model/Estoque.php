<?php

class Estoque{

    private $id;
    private $produtoId;
    private $variacao;
    private $quantidade;


    public function __construct($id, $produtoId, $quantidade, $variacao = null) {
        $this->id = $id;
        $this->produtoId = $produtoId;
        $this->variacao = $variacao;
        $this->quantidade = $quantidade;

    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }

    public function getProdutoId() {
        return $this->produtoId;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getVariacao() {
        return $this->variacao;
    }
    public function setProdutoId($produtoId) {
        $this->produtoId = $produtoId;
    }
}