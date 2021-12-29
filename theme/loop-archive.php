<?php while ( have_posts() ) : the_post(); ?>

<a href="<?php the_permalink(); ?>" class="article-item">
	<div id="post-<?php the_ID(); ?>">

		<?php
			$image = get_post_thumbnail_id();
			$image = wp_get_attachment_url( $image,'full');
		?>

		<?php if ( $image ) : ?>
			<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" class="article-thumbnails">
		<?php endif; ?>

		<div class="item-content">
			<?php the_title(); ?>
		</div>

	</div>
</a>

<?php endwhile; ?>