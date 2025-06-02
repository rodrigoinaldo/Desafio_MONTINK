                <!-- <tr>
                    <td><?= htmlspecialchars($produtos['id']) ?></td>
                    <td><?= htmlspecialchars($produtos['nome']) ?></td>
                    <td>R$ <?= htmlspecialchars($produtos['preco']) ?></td>
                    <td><?= htmlspecialchars($produtos['variacao']) ?></td>
                    <td><?= htmlspecialchars($produtos['quantidade']) ?></td>

                    <td>
                        <a href="index.php?id=<?= htmlspecialchars($produtos['id']) ?>">Editar</a>
                        <a href="excluir.php?id=<?= htmlspecialchars($produtos['id']) ?>">Excluir</a>
                    </td>

                </tr> -->





                --------------------------------------------------------------------------------------



                            <form action="" method="POST">
                <div>
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required value="<?php echo isset($iten['nome']) ? htmlspecialchars($iten['nome']) : ''; ?>">
                </div>

                <div>
                    <label for="preco">Preço:</label>
                    <input type="text" id="preco" name="preco" required value="<?php echo isset($iten['preco']) ? htmlspecialchars($iten['preco']) : ''; ?>">
                </div>

                <div>
                    <label for="variacao">variação:</label>
                    <input type="text" id="variacao" name="variacao" required value="<?php echo isset($iten['variacao']) ? htmlspecialchars($iten['variacao']) : ''; ?>">
                </div>

                <div>
                    <label for="quantidade">quantidade:</label>
                    <input type="number" id="quantidade" name="quantidade" min="0" required value="<?php echo isset($iten['quantidade']) ? htmlspecialchars($iten['quantidade']) : ''; ?>">
                </div>


                <button type="submit" name="enviar" value="Enviar">Enviar</button>
            </form>