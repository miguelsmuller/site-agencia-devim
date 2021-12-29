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

<main class="main-container" role="main">
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="article-content">

<?php
$array_of_pages = array();

$all_pages_query = new WP_Query();
$args = array(
	'post_type' => 'page',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order'=> 'ASC'
);
$all_pages = $all_pages_query->query( $args );
$childrens_page = get_page_children( get_the_ID(), $all_pages );

foreach ($childrens_page as $post) {
	setup_postdata( $post );

	$array_of_pages[$post->ID]['permalink'] = get_permalink();
	$array_of_pages[$post->ID]['slug'] = basename(get_permalink());
	$array_of_pages[$post->ID]['title'] = $post->post_title;
	$array_of_pages[$post->ID]['content'] = get_the_excerpt();

	$image = get_post_thumbnail_id();
	$image = wp_get_attachment_url( $image,'full');
	$array_of_pages[$post->ID]['image'] = $image;
}
wp_reset_postdata();
?>

<!-- Botão de acesso rápido -->
<div class="button-go-to">
	<button type="button" data-toggle="dropdown" aria-expanded="false">
		<span class="icon-cog"></span> Navegação rápida
	</button>
	<ul class="dropdown-menu" role="menu">
	<?php foreach ($array_of_pages as $page): ?>
		<li><a href="#section-<?php echo $page['slug']; ?>" data-padding="180"><?php echo $page['title']; ?></a></li>
	<?php endforeach ?>
	</ul>
</div>

<?php
$variant = '';
foreach ($array_of_pages as $page) {
?>
	<section id="section-<?php echo $page['slug']; ?>" class="section-content section-service <?php echo $variant; ?>">
	<div class="section-content-inner">
	<div class="container">

		<?php if ($variant != 'section-service-invert'): ?>
			<div class="col-image">
				<?php if ( $page['image'] ) : ?>
					<img src="<?php echo $page['image']; ?>" alt="<?php echo $page['title']; ?>">
				<?php endif; ?>
			</div>
		<?php endif ?>


		<div class="col-resume">
			<h2 class="title-theme title-theme-left"><?php echo $page['title']; ?></h2>
			<div class="service-content">
				<?php echo $page['content']; ?>
			</div>
			<a href="<?php echo $page['permalink']; ?>" class="btn btn-red">Ver mais sobre <?php echo $page['title']; ?></a>
		</div>

		<?php if ($variant == 'section-service-invert'): ?>
			<div class="col-image">
				<?php if ( $page['image'] ) : ?>
					<img src="<?php echo $page['image']; ?>" alt="<?php echo $page['title']; ?>">
				<?php endif; ?>
			</div>
		<?php endif ?>
	</div>
	</div>
	</section>
<?php
$variant = ($variant == 'section-service-invert') ? '' : 'section-service-invert' ;
}
?>

		</div>
	</article>
</main>

<?php endwhile; else : endif;?>

<?php get_footer(); ?>
