<?php
    session_start();

    class CarrinhoService{

        public $valorTotal = 0;

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

        public function listarTodos(){
            if (isset($_SESSION['carrinho']) && !empty($_SESSION['carrinho'])) {
                echo "<h2>Carrinho de Compras</h2>";
                echo "<ul>";
                foreach ($_SESSION['carrinho'] as $produto) {
                    echo "<li>{$produto['nome']} - R$ {$produto['preco']}</li>";
                    $this->valorTotal += $produto['preco'];
                }
                echo "</ul>";
                echo "<h3>Total: R$ {$this->valorTotal}</h3>";
            } else {
                echo "<h2>Carrinho vazio</h2>";
            }

        }

    

    }
    


?>