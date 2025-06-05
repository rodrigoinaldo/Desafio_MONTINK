<?php

require_once 'classes/service/carrinhoService.php';

class CarrinhoController{
    private $carrinhoService;

    public function __construct() {
        $this->carrinhoService = new CarrinhoService();
    }

    public function addCarrinho($produto) {
        $this->carrinhoService->addCarrinho($produto);
    }

    public function listarTodos() {
        $this->carrinhoService->listarTodos();
    }


}