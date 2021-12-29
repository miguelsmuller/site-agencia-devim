<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>

<main class="main-container" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="article-content">

<!-- Gestão e consultoria -->
<section id="section-404" class="section-content">
<div class="section-content-inner">
<div class="container">

	<h1>Oops, A página não foi encontrada!</h1>
	<h2>A página que você está procurando pode ter sido removida, teve seu nome alterado ou está temporariamente indisponível.</h2>
	<img src="<?php bloginfo('template_directory'); ?>/assets/images/404.png" class="">

	<?php get_search_form(); ?>

</div>
</div>
</section>

	</div>
	</article>
</main>

<?php get_footer(); ?>
