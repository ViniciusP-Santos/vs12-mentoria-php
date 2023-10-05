<?php

global $pdo;

use Repositorio\CardapioRepositorio;

require_once "./src/conexao-bd.php";
require_once "./src/Model/Cardapio.php";
require_once "./src/Repositorio/CardapioRepositorio.php";

$produtoRepositorio = new CardapioRepositorio($pdo);
$dados = $produtoRepositorio->buscaTodos();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f29456;
            color: #ffffff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        .button {
            background-color: #ea5900;
            color: #ffffff;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
        }
        .button-exluir {
            background-color: #ea0000;
            color: #ffffff;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
        }
        .button:hover {
            background-color: #e83654;
        }
        .acao-buttons {
            text-align: center; /* Alinhe os botões ao centro na célula */
        }

        .acao-buttons a,
        .acao-buttons form {
            margin-right: 10px; /* Adicione margem à direita para separar os botões */
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .back-button {
            background-color: #ea5900;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #e83654;
        }

        .logo-container {
            text-align: center;
        }

        .logo-container img{
            border-radius: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-bar">
        <a href="index.php" class="back-button">Voltar</a>
        <div class="logo-container">
            <img src="img/logo.png" alt="Logo">
        </div>
        <div style="width: 100px;"> <!-- Espaço reservado para o botão Voltar, ajuste conforme necessário -->
            <!-- Espaço reservado para o botão Voltar -->
        </div>
    </div>
    <h2>Lista de Produtos</h2>
    <a href="cadastrar-produto.php" class="button">Adicionar Novo Produto</a>
    <table>
        <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        <?php
        // Exibir produtos na tabela
        if (!empty($dados)) {
            foreach($dados as $produto): ?>
        <tr>
            <td><?= $produto->getNome() ?></td>
            <td><?= $produto->getTipo() ?></td>
            <td><?= $produto->getDescricao() ?></td>
            <td><?= $produto->getPrecoFormatado() ?></td>
            <td class="acao-buttons">
                <a class="button" href="editar-produto.php?id=<?=$produto->getId()?>">Editar</a>
                <form action="exclui-produto.php" method="POST" style="display: inline-block; margin-left: 10px;">
                    <input type="hidden" name="id" value=<?= $produto->getId() ?>>
                    <input type="submit" class="button-exluir" value="Excluir">
                </form>
            </td>

        </tr>
        <?php
            endforeach;
        } else {
            echo "<tr><td colspan='5'>Nenhum produto encontrado.</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
