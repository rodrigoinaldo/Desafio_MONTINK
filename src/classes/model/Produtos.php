<?php

class Produtos {

    private $id;
    private $nome;
    private $preco;

    public function __construct($id, $nome, $preco) {
        $this->id = $id;
        $this->nome = $nome;
        $this->preco = $preco;
    }

    // Getters and Setters
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getPreco() {
        return $this->preco;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function __toString() {
        return "Produto [ID: {$this->id}, Nome: {$this->nome}, Preço: {$this->preco}]";
    }

}