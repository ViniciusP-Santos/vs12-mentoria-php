<?php

global $pdo;

use Repositorio\CardapioRepositorio;

require_once "./src/conexao-bd.php";
require_once "./src/Model/Cardapio.php";
require_once "./src/Repositorio/CardapioRepositorio.php";

$produtoRepositorio = new CardapioRepositorio($pdo);
$dadosRefeicoes = $produtoRepositorio->buscaRefeicoes();
$dadosBebidas = $produtoRepositorio->buscaBebidas();
$dadosSobremesas = $produtoRepositorio->buscaSobremesas();
?>

<!DOCTYPE html>
<html lang="pt-br">
 <head>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="Restaurante Serve Bem" content="Melhor restaurante de Luziania e Região!" />
    <meta name="author" content="Vinicius Pereira" />
    <meta http-equiv="content-language" content="pt-br" />
    <meta name="robots" content="index, follow"/>
    
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->       

	<link rel="stylesheet" type="text/css" href="css/boot.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="css/fonts-icones.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/ico" />

	<title>Restaurante Serve Bem</title>

 </head>

<body>

<header class="main_header container">
        
    <div class="content">
    
        <div class="main_header_logo">
            <a href="index.html" title="Restaurante Serve Bem"><img src="img/logo.png" alt="Restaurante Serve Bem" title="Restaurante Serve Bem"/></a>
        </div>

        <div class="icon icon-menu mobile_action"></div>

        <ul class="main_header_nav" id="top">

            <li class="main_header_nav_item"><a href="#inicio" class="scrollSuave menuAtivo" title="Início"> Início</a></li>
            <li class="main_header_nav_item"><a href="#categorias" class="scrollSuave" title="Cardápio"> Categorias</a></li>
            <li class="main_header_nav_item"><a href="#cardapio" class="scrollSuave" title="Galeria de Fotos"> Cardápio</a></li>
            <li class="main_header_nav_item"><a href="#faq" class="scrollSuave" title="Contato"> Perguntas Frequentes</a></li>
            <li class="main_header_nav_item"><a href="#contato" class="scrollSuave" title="Contato"> Contato</a></li>

        </ul>

        <div class="clear"></div>
    
    </div>

</header>

<main class="main_content container">

    <section id="inicio" class="section-chamada container">

        <div class="content">

            <article class="topoPag">
              <div class="mascara">

                  <div class="centraliza">
                      <h1 class="branco"> SERVE BEM</h1>
                      <p class="branco">O sabor que você mereçe.</b></p>
                  </div>

                <img src="uploads/capa/banner-home.jpg" alt="Você Fitness" title="Você Fitness"/>

              </div>
            </article>

        <div class="clear"></div>
        </div>

    </section><!--Fecha Section Chamada-->

    <section id="categorias" class="section-categorias container">

        <div class="content">

            <h1 class="title center laranja">Categorias</h1>


            <article class="card">

                <div class="fundo-card"> <img src="uploads/cardapio/camarao.jpg" alt="Camarão"> </div>

                <div class="title-content">

                    <h3><a href="#galeria">Refeição</a></h3>
                    <div class="intro"> <a href="#">Refeição principal</a> </div>
                </div>

                <div class="info">

                    Digite aqui a descrição do produto acima.
                    <a href="#galeria">Veja mais</a>
                </div>

            </article><!--card 1-->

            <article class="card">

                <div class="fundo-card"> <img src="uploads/cardapio/sobremesas.jpg" alt="Sobremesa"> </div>

                <div class="title-content">

                    <h3><a href="#galeria">Sobremesas</a></h3>
                    <div class="intro"> <a href="#">Sorvetes e Frutas</a> </div>
                </div>

                <div class="info">

                    Digite aqui a descrição do produto acima.
                    <a href="#galeria">Veja mais</a>
                </div>

            </article><!--card 2-->

            <article class="card">

                <div class="fundo-card"> <img src="uploads/cardapio/bebidas.jpg" alt="Bebidas"> </div>

                <div class="title-content">

                    <h3><a href="#galeria">Bebidas</a></h3>
                    <div class="intro"> <a href="#">Vinhos e Cervejas</a> </div>
                </div>

                <div class="info">

                    Digite aqui a descrição do produto acima.
                    <a href="#galeria">Veja mais</a>
                </div>

            </article><!--card 3-->



        <div class="clear"></div>
        </div>

    </section><!--Fecha Section Cardapio-->

    <section id="cardapio" class="section-galeria container">
        <div class="content">
         <h3 class="title center laranja">Cardápio</h3>

            <div id="refeicao" class="section-galeria container">
                <h4 class="title center laranja-forte">Refeições</h4>
                    <?php foreach($dadosRefeicoes as $refeicoes): ?>
                        <div class="item-produto">
                            <div class="img-container-produto">
                                <img src=<?= $refeicoes->getImagemFormatado()?>>
                            </div>
                            <p class="item-produto-nome"><?= $refeicoes->getNome() ?></p>
                            <p><?= $refeicoes->getDescricao() ?></p>
                            <p><?= $refeicoes->getPrecoFormatado() ?></p>
                        </div>
                    <?php endforeach; ?>
            </div>

            <div id="sobremesa" class="section-galeria container">
                <h4 class="title center laranja-forte">Sobremesas</h4>
                <?php foreach($dadosSobremesas as $sobremesas): ?>
                    <div class="item-produto">
                        <div class="img-container-produto">
                            <img src=<?= $sobremesas->getImagemFormatado()?>>
                        </div>
                        <p class="item-produto-nome"><?= $sobremesas->getNome() ?></p>
                        <p><?= $sobremesas->getDescricao() ?></p>
                        <p><?= $sobremesas->getPrecoFormatado() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div id="bebidas" class="section-galeria container">
                <h4 class="title center laranja-forte">Bebidas</h4>
                <?php foreach($dadosBebidas as $bebidas): ?>
                    <div class="item-produto">
                        <div class="img-container-produto">
                            <img src=<?= $bebidas->getImagemFormatado()?>>
                        </div>
                        <p class="item-produto-nome"><?= $bebidas->getNome() ?></p>
                        <p><?= $bebidas->getDescricao() ?></p>
                        <p><?= $bebidas->getPrecoFormatado() ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        <div class="clear"></div>
        </div>

    </section><!--Fecha Section Cardapio-->

    <section id="faq" class="section-faq container">

        <div class="content">

            <h2 class="title center laranja">Perguntas Frequentes</h2>

            <div class="coluna-left">

                <div class="faq-img">
                    <img src="uploads/capa/faq.jpg" alt="Perguntas Frequentes" title="Perguntas Frequentes">
                </div>

            </div><!---Div coluna Left-->

            <div class="coluna-right">

                <ul id="toggle-item">

                    <li>
                        <h4>Quais as formas de pagamento ? </h4>
                        <span><i class="icon icon-plus-square"></i></span>
                        <p>Escreva o seu texto aqui para cada pergunta.</p>
                    </li>

                    <li>

                        <h4>Como faço uma reserva? </h4>
                        <span><i class="icon icon-plus-square"></i></span>
                        <p>Escreva o seu texto aqui para cada pergunta.</p>

                    </li>

                    <li>

                        <h4>Posso reservar uma mesa para um número de pessoas e ir em mais integrantes? </h4>
                        <span><i class="icon icon-plus-square"></i></span>
                        <p>Escreva o seu texto aqui para cada pergunta.</p>
                    </li>

                    <li>
                        <h4>Posso chegar antes do horário da reserva? </h4>
                        <span><i class="icon icon-plus-square"></i></span>
                        <p>Escreva o seu texto aqui para cada pergunta.</p>
                    </li>

                    <li>

                        <h4>Quando eu cancelo uma reserva, eu sou reembolsado? </h4>
                        <span><i class="icon icon-plus-square"></i></span>
                        <p>Escreva o seu texto aqui para cada pergunta.</p>

                    </li>

                    <li>

                        <h4>Posso fazer reservas para quantos integrantes por vez? </h4>
                        <span><i class="icon icon-plus-square"></i></span>
                        <p>Escreva o seu texto aqui para cada pergunta.</p>
                    </li>

                </ul>

            </div><!---Div coluna Right-->

        <div class="clear"></div>
        </div>

    </section><!--Fecha Section Faq-->


</main>

<footer class="footer" id="contato">

    <div class="left">

        <h4 class="title-footer">Serve <span>Bem</span></h4>
        <p class="links">

            <a href="#inicio" title="Inicio">Início</a>
            <a href="#cardapio" title="Cardápio">Cardápio</a>
            <a href="#galeria" title="Galeria de Fotos">Galeria de Fotos</a>
            <a href="#faq" title="Perguntas Frequentes">Perguntas Frequentes</a>
            <a href="login.php" title="Login Administrativo">Login Administrativo</a>
        </p>
        <div class="footer-icons">
            <a href="#"><i class="icon icon-facebook"></i></a>
            <a href="#"><i class="icon icon-instagram"></i></a>
            <a href="#"><i class="icon icon-pinterest"></i></a>
            <a href="#"><i class="icon icon-twitter"></i></a>
        </div>
        <p class="Copyright">Copyright &copy; 2023 Serve Bem - Todos os Direitos Reservados.</p>

    </div><!--Left-->

    <div class="right">

        <h4 class="title-footer">Contato</h4>
        <form class="formulario" action="#" method="post">

            <input type="text" class="campo" name="nome" placeholder="Nome" required=""/>
            <input type="email" class="campo" name="email" placeholder="E-mail" required=""/>
            <input type="text" class="campo" name="assunto" placeholder="assunto" required=""/>
            <textarea name="menssagem" class="campo-textarea" placeholder="Menssagem" rows="5" required=""></textarea>
            <button class="btn">Enviar</button>

        </form>

    </div><!--Right-->

</footer>

<script src="js/jquery.js"></script>
<script src="js/scripts.js"></script>	
<script src="js/jquery.magnific-popup.min.js"></script>

</body>
</html>
