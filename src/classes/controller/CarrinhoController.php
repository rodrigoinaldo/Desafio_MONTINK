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

    public function valorTotal() {
        $valorTotal = $this->carrinhoService->valorTotal();

        
        return $valorTotal;
    }

    public function calcularFrete() {
        return $this->carrinhoService->calcularFrete();
    }


}