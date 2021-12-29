<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>

	<?php
	if (is_date()){
		$page_title = 'Notícias Publicadas no período de '. get_the_time('F \d\e\ Y');
	}elseif (is_category()){
		$categoria = single_cat_title("", false);
		$page_title = 'Notícias publicadas na categoria "'. $categoria.'"';
	}elseif (is_tag()){
		$categoria = single_cat_title("", false);
		$page_title = 'Notícias publicadas com a referência "'. $categoria.'"';
	}else{
		$page_title = 'Notícias Publicadas';
	}
	?>

	<?php if ( have_posts() ) : the_post(); ?>
    <header class="page-header">
		<div class="container">
			<div class="page-header-inner">
				<h1><?php the_field('titulo_interno'); ?></h1>
			</div>
		</div>
	</header>
	<?php else : endif;?>

	<main class="main-container" role="main">
		<div class="article-content">

<?php
	global $wp_query;

	$args['name'] = '';
	$args['pagename'] = '';
	$args = array_merge( $wp_query->query_vars, $args );

	query_posts( $args );

	$total_results = $wp_query->found_posts;
?>

<?php if ( have_posts() ) : ?>
	<div id="article-list">
		<?php get_template_part( 'loop', 'archive' ); ?>
	</div>
<?php else : endif;?>

<button id="load-more" type="button" class="btn btn-red" data-loading-text="Carregando  ..." data-template="loop-archive" data-post-type="post" data-posts-per-page="<?php echo get_option( 'posts_per_page' ) ?>" data-max-page="<?php echo $wp_query->max_num_pages; ?>" autocomplete="off">Carregar mais artigos</button>

		</div>
	</main>

<?php get_footer(); ?>
