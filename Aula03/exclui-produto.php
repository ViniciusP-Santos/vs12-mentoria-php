<?php
global $pdo;

use Repositorio\CardapioRepositorio;

require_once "./src/conexao-bd.php";
require_once "./src/Model/Produto.php";
require_once "./src/Repositorio/ProdutoRepositorio.php";

echo "Será excluido - " . $_POST["id"];

$produtoRepositorio = new CardapioRepositorio($pdo);
$produtoId = $_POST["id"];

if(isset($produtoId)) {
    $produtoRepositorio->deletaProduto($produtoId);
    header("Location: admin.php");
}

?>
