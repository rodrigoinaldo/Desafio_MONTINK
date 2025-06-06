<?php
    session_start();

    class CarrinhoService{

        public $subtotal = 0;
        public $frete = null;

        public function addCarrinho($produto)
        {
            if (!isset($_SESSION['carrinho'])) {
                $_SESSION['carrinho'] = [];
            }

            // Verifica se o produto já está no carrinho
            foreach ($_SESSION['carrinho'] as $item) {
                if ($item['id'] === $produto['id']) {
                    echo "<script>alert('Produto já está no carrinho!');</script>";
                    return;
                }
            }

            // Adiciona o produto ao carrinho
            $_SESSION['carrinho'][] = $produto;
            echo "<script>alert('Produto adicionado ao carrinho com sucesso!');</script>";
        }

        public function valorTotal(){

            if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                
                foreach ($_SESSION['carrinho'] as $produto) {
                    $this->subtotal += $produto['preco'];
                }
                
            } 

            return $this->subtotal;
            

        }


        public function calcularFrete()
        {
            $this->frete = ($this->subtotal > 52 && $this->subtotal < 169) ? 15 : "Frete de graça";

            return $this->frete;
        }

    

    }
    


?>