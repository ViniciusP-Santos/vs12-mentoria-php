<?php
global $pdo;
use Repositorio\CardapioRepositorio;
use Model\Cardapio;

require_once "./src/conexao-bd.php";
require_once "./src/Model/Cardapio.php";
require_once "./src/Repositorio/CardapioRepositorio.php";

$cardapioRepositorio = new CardapioRepositorio($pdo);
$id_produto = isset($_GET['id']) ? $_GET['id'] : null;

if(isset($_POST["editar"])) {
    $produto = new Cardapio(
        $_GET["id"],
        $_POST["tipo"],
        $_POST["nome"],
        $_POST["descricao"],
        $_POST["preco"],
        $_POST["imagem"],
    );
    $foiEditado = $cardapioRepositorio->editarProduto($produto);

    if($foiEditado){
        header("Location: admin.php");
    }else{
        echo "Algo deu errado na edição!";
    }
}

if ($id_produto) {
    $produto = $cardapioRepositorio->buscarProdutoPorId($id_produto);
} else {
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
    <style>
        h1 {
            color: #f29456;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #36312b;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        .logo-container {
            text-align: center;
            margin-bottom: 20px;
            border-radius: 60px;
        }

        .logo-container img {
            width: 200px; /* Ajuste a largura conforme necessário */
            height: auto;
            border-radius: 30px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #ea5900;
        }

        input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        .button {
            background-color: #ea5900;
            color: #ffffff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #e83654;
        }

        select {
            width: 100%;
            margin-bottom: 16px;
            padding-block: 10px;
            padding-left: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            appearance: none; /* Remove o estilo padrão do sistema operacional */
            background-color: #fff;
            color: #333;
            cursor: pointer;
        }

        /* Estilizando as opções */
        select option {
            padding: 10px;
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

        .file-input {
            display: block;
        }

        .image-loaded {
            display: none;
            color: #007029;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="top-bar">
        <button type="button" onclick="history.back()" class="back-button">Voltar</button>
        <div class="logo-container">
            <img src="img/logo.png" alt="Logo">
        </div>
        <div style="width: 100px;"> <!-- Espaço reservado para o botão Voltar, ajuste conforme necessário -->
            <!-- Espaço reservado para o botão Voltar -->
        </div>
    </div>

    <h1 class="laranja">Editar Produto</h1>
    <form method="POST">
        <label for="categoria">Categoria:</label>
        <select id="categoria" name="tipo" required>
            <option value="Refeição" <?php echo ($produto->getTipo() == 'Refeição') ? 'selected' : ''; ?>>Refeição</option>
            <option value="Bebida" <?php echo ($produto->getTipo() == 'Bebida') ? 'selected' : ''; ?>>Bebida</option>
            <option value="Sobremesa" <?php echo ($produto->getTipo() == 'Sobremesa') ? 'selected' : ''; ?>>Sobremesa</option>
        </select>

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $produto->getNome() ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" style="width: 100%;" required><?= $produto->getDescricao() ?></textarea>

        <label for="imagem">Imagem:</label>
        <input type="file" id="imagem" name="imagem" accept="image/*" class="file-input" onchange="handleFileChange()">
        <div id="image-loaded-message" class="image-loaded">Imagem carregada</div>

        <label for="preco">Preço:</label>
        <input type="number" id="preco" name="preco" value="<?= $produto->getPreco() ?>" required pattern="\d+" title="Por favor, insira apenas números">

        <button type="submit" name="editar" class="button">Editar Produto</button>
    </form>
</div>
<script>
    function handleFileChange() {
        var fileInput = document.getElementById('imagem');
        var imageLoadedMessage = document.getElementById('image-loaded-message');

        if (fileInput.files.length > 0) {
            // Arquivo selecionado, esconde o input e mostra o nome do arquivo
            fileInput.style.display = 'none';
            var fileName = fileInput.files[0].name;
            imageLoadedMessage.textContent = 'Imagem carregada: ' + fileName;
            imageLoadedMessage.style.display = 'block';
        }
    }
</script>
</body>
</html>
