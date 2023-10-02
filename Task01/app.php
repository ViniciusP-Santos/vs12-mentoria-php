<?php
require_once("./bancos.php");
require_once("./funcoes.php");

//Mostrar a lista de bancos
mostrarBancos($bancosComAgencia);

// Apagando banco com agencia 4444 da lista
deletarBanco($bancosComAgencia, "4444");

// Adicionando um novo banco na lista
adicionarBanco($bancosComAgencia, "8888", [
    "nome" => "Banco 4",
    "cidade" => "Gravataí",
    "estado" => "Rio Grande do Sul"
]);

// Editando um banco com agencia 7777, este banco já existe na nossa lista
editarBanco($bancosComAgencia, "7777", [
    "nome" => "Banco 5",
    "cidade" => "Cachoeirinha",
    "estado" => "Rio Grande do Sul"
]);

// Imprimir lista atualizada
mostrarBancos($bancosComAgencia);

echo count($bancosComAgencia);
?>
