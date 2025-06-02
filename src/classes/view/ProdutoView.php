<?php

require_once 'classes/controller/ProdutosController.php';

class ProdutoView{

    function editarInformacoes($dados)
    {
        $produtoController = new ProdutosController();
        $produtoController->atualizar($dados['id'], $dados['nome'], $dados['preco'], $dados['variacao'], $dados['quantidade']);

        header("Location: index.php"); // Redireciona para a página de listagem após a atualização
        exit; // Certifique-se de chamar exit após o redirecionamento
    }

    function salvarINformacoes($dados)
    {

            $nome = $dados['nome'];
            $preco = $dados['preco'];
            $variacao = $dados['variacao'];
            $quantidade = $dados['quantidade'];

            // Salvar produto
            $produtoController = new ProdutosController();

            $produto_id = $produtoController->salvar($nome, $preco, $variacao, $quantidade);

            // Salvar estoque
            if ($produto_id != null) {
                echo "Produto e estoque salvos com sucesso!";
            } else {
                echo "Erro ao salvar o produto.";
            }

    }

    function listarProdutos()
    {
        
        $produtoController = new ProdutosController();
        $produtos = $produtoController->listar();

        if ($produtos == null) {
            return false;
        }

        for ($i=0; $i < count($produtos) ; $i++) {

            echo "
                <tr>
                    <td>". $produtos[$i]["id"] ."</td>
                    <td>". $produtos[$i]["nome"] ."</td>
                    <td>". $produtos[$i]["preco"] ."</td>
                    <td>". $produtos[$i]["variacao"] ."</td>
                    <td>". $produtos[$i]["quantidade"] ."</td>
                    <td>

                        <a href='index.php?acao=editar&id=".$produtos[$i]["id"]."'>Editar</a> 
                        <a href='excluirProduto.php?id=".$produtos[$i]["id"]."'>Excluir</a>
                    </td>
                </tr>

                <br/>
            ";
        }
    }

    function exibirFormulario($produto = null)// Se $produto for null, o formulário será para criar um novo produto
    {   

        $produtoController = new ProdutosController();

        if (isset($_GET['id'])) {
            $produto = $produtoController->buscarPorId($_GET['id']);
        }
        

        $id = $produto ? $produto['id'] : '';
        $nome = $produto ? $produto['nome'] : '';
        $preco = $produto ? $produto['preco'] : '';
        $variacao = $produto ? $produto['variacao'] : '';
        $quantidade = $produto ? $produto['quantidade'] : '';
    

        echo '
            <form action="" method="POST">

                <div>
                    <input type="text" id="id" name="id" required value="'.$id.'" readonly >
                </div>


                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required value="'.$nome.'">
                </div>

                <div>
                    <label for="preco">Preço:</label>
                    <input type="text" id="preco" name="preco" required value="'.$preco.'">
                </div>

                <div>
                    <label for="variacao">variação:</label>
                    <input type="text" id="variacao" name="variacao" required value="'.$variacao.'">
                </div>

                <div>
                    <label for="quantidade">quantidade:</label>
                    <input type="number" id="quantidade" name="quantidade" min="0" required value="'.$quantidade.'">
                </div>


                <button type="submit" name="enviar" value="Enviar">Enviar</button>
            </form>
        ';
    }


    // function exibirEdicao($dados){

    //     $produtoController = new ProdutosController();
    //     $produto = $produtoController->buscarPorId($dados);

    //     var_dump($produto);

    //     echo '
    //     <form action="" method="POST">

    //         <div>
    //             <input type="text" id="id" name="id" required value="'.$produto["id"].'" readonly>
    //         </div>


    //         <div>
    //             <label for="nome">Nome:</label>
    //             <input type="text" id="nome" name="nome" required value="'.$produto["nome"].'">
    //         </div>

    //         <div>
    //             <label for="preco">Preço:</label>
    //             <input type="text" id="preco" name="preco" required value="'.$produto["preco"].'">
    //         </div>

    //         <div>
    //             <label for="variacao">variação:</label>
    //             <input type="text" id="variacao" name="variacao" required value="'.$produto["variacao"].'">
    //         </div>

    //         <div>
    //             <label for="quantidade">quantidade:</label>
    //             <input type="number" id="quantidade" name="quantidade" min="0" required value="'.$produto["quantidade"].'">
    //         </div>


    //         <button type="submit" name="enviar" value="Enviar">Enviar</button>
    //     </form>
    // ';

    // }

}