<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>

	<?php
        global $wp_query;
        $total_results = $wp_query->found_posts;
    ?>

    <header class="page-header">
		<div class="container">
			<div class="page-header-inner">
				<h1><?php echo $total_results; ?> itens encontrados para o termo "<?php the_search_query(); ?>"</h1>
			</div>
		</div>
	</header>

	<main class="main-container" role="main">
		<div class="article-content">

<?php if ( have_posts() ) : ?>
	<div id="article-list">
		<?php get_template_part( 'loop', 'archive' ); ?>
	</div>
<?php else : endif;?>

		</div>
	</main>

<?php get_footer(); ?>
