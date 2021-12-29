<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php
/*
Template Name: Página portifólio
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
	<div class="article-content">

<?php
/*<ul class="grid-portifolio-filter">
  <li class="active"><a href="">Todos</a></li>
  <li><a href="">Sites</a></li>
  <li><a href="">E-Commerces</a></li>
  <li><a href="">Hotsites</a></li>
</ul>*/
?>

<?php
$portfolio = new WP_Query(array(
	'post_type'      => 'portfolio',
	'orderby'        => 'date',
	'order'          => 'DESC',
	'posts_per_page' => -1,
	'no_found_rows'  => true,
	'meta_key'       => 'thumbnail',
	'meta_value'     => ' ',
	'meta_compare'   => '!='
));
?>

<?php if ( $portfolio->have_posts() ) : ?>

<div class="grid-portfolio">
	<?php while ( $portfolio->have_posts() ) : $portfolio->the_post(); ?>

	<?php
	$thumbnail        = get_field('thumbnail');
	$new_url          = wp_get_attachment_image_src($thumbnail['id'], 'full');
	$thumbnail['url'] = $new_url[0];
	?>

	<figure>
		<img src="<?php echo $thumbnail['url']; ?>" alt="<?php the_title(); ?>">
		<figcaption>
			<div class="caption-content">
				<a href="#" class="single_image">
					<p><?php the_title(); ?></p>
				</a>
			</div>
		</figcaption>
	</figure>

	<?php endwhile;?>
</div>

<?php endif;?>

	</div>
</main>

<?php endwhile; else : endif;?>

<?php get_footer(); ?>
