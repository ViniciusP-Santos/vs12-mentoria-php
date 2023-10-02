<?php

function mostrarBancos($bancos) {
    if (empty($bancos)) {
        echo "Desculpe, não foi possível encontrar nenhum banco cadastrado." . PHP_EOL;
    } else {
        foreach ($bancos as $chave => $banco) {
            echo "$chave - {$banco["nome"]}, {$banco["cidade"]}, {$banco["estado"]}" . PHP_EOL;
        }
    }
}

function deletarBanco(&$bancos, $agencia) {
    if (isset($bancos[$agencia])) {
        unset($bancos[$agencia]);
        echo "Banco com agência $agencia removido com sucesso." . PHP_EOL;
    } else {
        echo "Banco com agência $agencia não encontrado." . PHP_EOL;
    }
}

function adicionarBanco(&$bancos, $agencia, $dados) {
    $bancos[$agencia] = $dados;
}

function editarBanco(&$bancos, $agencia, $novosDados) {
    if (isset($bancos[$agencia])) {
        $bancos[$agencia] = $novosDados;
    } else {
        echo "Banco com agência $agencia não encontrado." . PHP_EOL;
    }
}

?>
