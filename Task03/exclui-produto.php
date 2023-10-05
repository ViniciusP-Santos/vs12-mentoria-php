<?php
global $pdo;

use Repositorio\CardapioRepositorio;

require_once "./src/conexao-bd.php";
require_once "./src/Model/Cardapio.php";
require_once "./src/Repositorio/CardapioRepositorio.php";

$cardapioRepositorio = new CardapioRepositorio($pdo);
$produtoId = $_POST["id"];

if(isset($produtoId)) {
    $cardapioRepositorio->deletaProduto($produtoId);
    header("Location: admin.php");
}

?>
