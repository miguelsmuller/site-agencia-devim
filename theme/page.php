<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

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
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="article-content">

			<?php the_content(); ?>

		</div>
	</article>
</main>

<?php endwhile; else : endif;?>
<?php get_footer(); ?>