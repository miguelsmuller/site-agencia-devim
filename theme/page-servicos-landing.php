<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php
/*
Template Name: Página Serviço
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
	<artcile class="column-service-content article-content">
		<?php
			$image = get_post_thumbnail_id();
			$image = wp_get_attachment_url( $image,'full');
		?>

		<?php if ( $image ) : ?>
			<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" class="service-thumbnails">
		<?php endif; ?>

		<?php the_content(); ?>
	</artcile>

	<aside class="column-form-lead">
		<div class="form-lead-header">
			<h2>O que você está esperando?</h2>
			<p>Preencha o formulário e nosso time de atendimento irá entrar em contato com você.</p>
		</div>
		<div class="form-lead-content">
			<?php
			$lead_form_id = get_option('lead_form_id');
			if ($lead_form_id != 0) {
				echo do_shortcode( '[contact-form-7 id="190" title="Formulário de Lead - Seviço"]' );
			}else{
				echo '<p class="not-defined">Nenhum formulário de Lead definido.</p>';
			}
			?>
		</div>
	</aside>
</main>

<?php endwhile; else : endif;?>

<?php get_footer(); ?>
