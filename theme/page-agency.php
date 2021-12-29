<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php
/*
Template Name: Página Agência
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

<main class="main-container" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="article-content">

<!-- Profile -->
<section id="section-profile" class="section-content">
<div class="section-content-inner">
<div class="container">
	<header class="col12">
		<h2 class="title-theme title-theme-left">Agência de Desenvolvimento e Gestão</h2>
	</header>

	<div class="col12">
		<img src="<?php bloginfo('template_directory'); ?>/assets/images/page-about/who-is-devim.png" class="alignright" alt="Um pouco mais sobre a Devim">

		<p>A <strong>DEVIM</strong> é agência full service digital de resultados que atende em todo o território nacional e tem sua sede localizada no interior do Rio de Janeiro, na cidade de Rio Claro.</p>

		<p>Surgimos ainda como uma ideia em 2013, e já no final de 2014 a <strong>DEVIM</strong> se tornou uma agência web atuante no mercado. O ano de 2015 está sendo dedicado a reforçar a nossa imagem e promover uma forte expansão para o mercado.</p>

		<p>Apostamos na marca <strong>DEVIM</strong> como forte e única. Fortalecer a nossa identidade é fortalecer a empresa. Aumentamos o nosso grau de notoriedade e criamos uma conexão maior com os clientes. Agimos de forma consciente e audaciosa, assegurando a qualidade dos nossos produtos e das soluções desenvolvidas.</p>

		<p>Trabalhamos com a análise inicial do negócio, passando pelo planejamento do projeto digital, desenvolvimento de arquitetura, conteúdo e design, além de mídia e controle de dados. Atuamos em projetos web e aplicativos sociais e mobile.</p>

		<h3>Responsabilidade Social</h3>

		<p>A <strong>DEVIM</strong> se preocupa em desenvolver ações de responsabilidade social na web. Na internet uma boa apresentação é fator decisivo para uma instituição se posicionar; mas nem todas elas conseguem arcar com os custos desse tipo de serviço. Por isso, a <strong>DEVIM</strong> se preocupa em oferecer pontualmente o trabalho de melhoria de resultados digitais a ONGs ou instituições que precisem dos nossos serviços.</p>
	</div>
</div>
</div>
</section>

<!-- Mission and Values -->
<section id="section-mission-values" class="section-content">
<div class="section-content-inner">
<div class="container">
	<header class="col12">
		<h2 class="title-theme title-theme-left">O que nos move</h2>
	</header>

	<div class="section-content-row">
		<div class="col12">
			<p>Acreditamos que a cada resultado satisfatório os nossos clientes crescem. Quando isso acontece, crescemos juntos. A disposição e dedicação que temos em cada projeto são refletidas nos resultados alcançados, que só potencializam o sucesso do nosso trabalho.</p>
		</div>
	</div>

	<div class="section-content-row">
		<div class="col4">
			<p><strong>MISSÃO:</strong> Criar e implementar soluções em desenvolvimento, comunicação e gerência digital de forma personalizada, oferecendo aos clientes diferencial competitivo.</p>
		</div>

		<div class="col4">
			<p><strong>VISÃO:</strong> Ser uma agencia digital reconhecida por excelência no desenvolvimento de projetos, criando soluções para as necessidades de nossos clientes.</p>
		</div>

		<div class="col4">
			<p><strong>VALORES:</strong> Foco em resultados, inovação, alto desempenho digital, responsabilidade social e comprometimento.</p>
		</div>
	</div>
</div>
</div>
</section>

<?php
$testimonial = new WP_Query(array(
	'post_type'      => 'testimonial',
	'orderby'        => 'date',
	'order'          => 'DESC',
	'posts_per_page' => '4',
	'no_found_rows'  => true
));
?>

<?php if ( $testimonial->have_posts() ) : ?>
<!-- Testimonial -->
<section id="section-testimonial-" class="section-content">
<div class="section-content-inner">
<div class="container">
	<div class="col12">
		<h2 class="title-theme title-theme-left">Depoimentos</h2>
	</div>

	<div class="col12">
		<div id="testimonial-carrousel">

			<?php while ( $testimonial->have_posts() ) : $testimonial->the_post(); ?>
			<div class="testimonial">
        		<div class="testimonial-inner">
          			<div class="testimonial-info">
            			<h3><?php the_field( "autor" ); ?></h3>
            			<span><?php the_field( "funcao" ); ?></span>
            			<span><?php the_title(); ?></span>
          			</div>
          			<div class="testimonial-text">
            			<?php the_field( "depoimento" );  ?>
          			</div>
        		</div>
      		</div>
      		<?php endwhile;?>

		</div>
	</div>
</div>
</div>
</section>
<?php endif; ?>

<!-- Certifications -->
<section id="section-certifications" class="section-content">
<div class="section-content-inner">
<div class="container">
	<div class="col12">
		<h2 class="title-theme title-theme-left">Certificações</h2>
	</div>

	<div class="col12">
    	<p>Para oferecer um serviço de qualidade, buscamos sempre ser uma agência melhor e mais competente. Investimos em capacitação, certificação e desenvolvimento de parcerias que fazem da DEVIM a escolha certa para o seu negócio.</p>
	</div>
</div>
</div>
</section>

		</div>
	</article>
</main>

<?php endwhile; else : endif;?>

<?php get_footer(); ?>