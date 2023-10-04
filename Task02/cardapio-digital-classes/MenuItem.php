<?php

class MenuItem {
    private static $idCounter = 1;

    private $id;
    private $nome;
    private $preco;
    private $imagem;

    public function __construct($nome, $preco, $imagem = null) {
        $this->id = self::$idCounter++;
        $this->nome = $nome;
        $this->preco = $preco;
        $this->imagem = $imagem;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function getImagem() {
        return $this->imagem;
    }

    // Setters
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    public function exibirDetalhes() {
        echo "ID: {$this->id}" . PHP_EOL;
        echo "Nome: {$this->nome}" . PHP_EOL;
        echo "Preço: R$ {$this->preco}" . PHP_EOL;
        if ($this->imagem === null) {
            echo "Link da imagem: null" . PHP_EOL;
        } else {
            echo "Link da imagem: {$this->imagem}" . PHP_EOL;
        }

        echo "----------------------------"  . PHP_EOL;
    }

    public static function adicionarItem($nome, $preco, $imagem = null) {
        return new MenuItem($nome, $preco, $imagem);
    }

    public function editarItem($nome, $preco, $imagem = null) {
        $this->setNome($nome);
        $this->setPreco($preco);
        $this->setImagem($imagem);
    }

    public function excluirItem(&$itens) {
        foreach ($itens as $key => $item) {
            if ($item->getId() == $this->id) {
                unset($itens[$key]);
                echo "Item {$this->id} excluído com sucesso." . PHP_EOL;
                return;
            }
        }
        echo "Item não encontrado para exclusão." . PHP_EOL;
    }

    public static function listarItens($itens) {
        foreach ($itens as $item) {
            $item->exibirDetalhes();
        }
    }

    public static function buscarPorId($itens, $id) {
        foreach ($itens as $item) {
            if ($item->getId() == $id) {
                return $item;
            }
        }
        return null;
    }
}

?>
