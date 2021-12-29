<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php
/*
Template Name: Página contato
*/
?>

<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<header class="page-header">
	<div class="container">
		<div class="page-header-inner">
			<h1><?php the_field('titulo_interno'); ?></h1>
		</div>
	</div>
</header>

<main class="main-container main-container-centered" role="main">
	<artcile class="column-form">
		<div class="resume-page-contact">
			<p>Não deixe de nos dar um olá através do nosso e-mail ou do formulário a baixo. Se preferir, você pode nos ligar e falar com um de nossos consultores.</p>
			<p>Queremos entender o que você precisa e te surpreender com soluções criativas. Podemos conseguir ótimos resultados juntos.</p>
		</div>

		<?php the_content(); ?>
	</artcile>

	<aside class="column-map">
		<div class="item item-red">
			<h2>Telefone</h2>
			<ul>
				<li class="item-tel">(24) 3332-1173</li>
				<li class="item-tel">(24) 98847-4356</li>
			</ul>
		</div>

		<div class="item item-red">
			<h2>E-mail</h2>
			<ul>
				<li><?php echo antispambot('falecom@devim.com.br'); ?></li>
				<li><?php echo antispambot('atendimento@devim.com.br'); ?></li>
			</ul>
		</div>

		<div class="item item-black">
			<h2>Endereço</h2>
			Devim Desenvolvimento e Gestão Web<br/>
			Rua Prefeito Mozart Cesar Vale, 271 - Unidade 07<br/>
			Centro - Rio Claro - Rio de Janeiro<br/>
			CEP: 27.460-000
		</div>

		<div class="item item-blue">
			<div id="map_canvas"></div>
		</div>
	</aside>
</main>

<?php endwhile; else : endif;?>

<?php get_footer(); ?>