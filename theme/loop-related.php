<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php
//global $post;
$tags = wp_get_post_tags($post->ID);
if ($tags) :
	$tag_ids = array();

	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;

	$related = new WP_Query( array(
		'tag__in'      => $tag_ids,
		'post__not_in' => array($post->ID),
		'showposts'    => 3,
		'orderby'      => 'rand'
	));
?>
	<?php if ( $related->have_posts() ) : ?>
		<div class="news-card-container">

			<?php while ( $related->have_posts() ) : $related-> the_post(); ?>
			<article class="news-card-item news-card-item-retracted">
	      		<div class="card-date">
					<?php echo date_i18n( get_option('date_format'), get_the_time('U') ); ?>
				</div>
				<div class="card-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</div>
			</article>
			<?php endwhile; ?>

		</div>
	<?php endif; ?>
<?php endif; ?>