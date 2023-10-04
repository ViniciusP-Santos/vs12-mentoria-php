<?php
require_once("./cardapio.php");
?>
<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio Digital</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }

        h1 {
            margin: 0;
        }

        .menu-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            max-width: 800px;
            margin: 20px auto;
        }

        .menu-item {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            margin: 15px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: left;
        }

        .menu-item h3 {
            color: #333;
            margin-bottom: 10px;
        }

        .menu-item p {
            color: #777;
            margin: 10px 0;
        }

        .img-container {
            overflow: hidden;
            border-radius: 10px;
            height: 250px;
            margin-bottom: 10px;
        }

        .img-container img {
            width: 100%;
            height: auto;
        }

        .order-button {
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .rating {
            display: flex;
            align-items: center;
            margin-block: 20px;
        }

        .rating span {
            color: #ffd700; /* Cor amarela para estrelas preenchidas */
        }
    </style>
</head>
<body>
<header>
    <h1>Cardápio Digital</h1>
</header>

<div class="menu-container">
    <?php
    // Renderizar o cardápio
    foreach ($cardapio as $item) {
        echo "<div class='menu-item'>";
        echo "<h3>{$item['nome']}</h3>";
        echo "<div class='img-container'>";
        echo "<img src='{$item['imagem']}' alt='{$item['nome']}'>";
        echo "</div>";
        echo "<p>Preço: R$ {$item['preco']}</p>";
        echo "<div class='rating'>";
        echo "<span>&#9733;</span>"; // Estrela preenchida
        echo "<span>&#9733;</span>"; // Estrela preenchida
        echo "<span>&#9733;</span>"; // Estrela preenchida
        echo "<span>&#9733;</span>"; // Estrela preenchida
        echo "<span>&#9733;</span>"; // Estrela preenchida
        echo "</div>";
        echo "<button class='order-button'>Pedir</button>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
