<?php

require_once('MenuItem.php');

$item1 = MenuItem::adicionarItem('Hamburguer', 10.99);
$item2 = MenuItem::adicionarItem('Pizza', 15.99);
$item3 = MenuItem::adicionarItem('Sopa', 21.99);

$cardapio = [$item1, $item2, $item3];

MenuItem::listarItens($cardapio);

$item1->excluirItem($cardapio);

echo PHP_EOL;
echo '---- DEPOIS DE EXCLUIR -----'  . PHP_EOL;
echo PHP_EOL;

MenuItem::listarItens($cardapio);
?>
