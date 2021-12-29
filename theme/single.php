<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Main content -->
<main class="main-container main-container-centered" role="main">
	<div class="page-content-left">

		<article id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="title-theme"><?php the_title(); ?></h1>
			</header>

			<section class="article-info">
				<?php
					$permalink_encoded = urlencode(get_permalink());
					$shortened_url = get_shortened_url( get_the_ID() );
				?>
				<ul>
					<li>
						<span class="icon-calendar"></span> <?php echo human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' atrás'; ?>
					</li>
					<li>
						<span class="icon-uniE60B"></span> <?php the_category(', '); ?>
					</li>
					<li>
						<span class="icon-comment"></span> <a href="<?php the_permalink(); ?>#disqus_thread">Nenhum comentário</a>
					</li>
					<li>
						<?php
							$fb_shared_url = sprintf("https://www.facebook.com/sharer/sharer.php?u=%s",
								$permalink_encoded
							);

							$fb_count_shared = get_facebook_share( get_the_ID() );

						?>
						<a href="<?php echo $fb_shared_url; ?>" target="_blank" class="btn btn-facebook btn-social">Facebook | <?php echo $fb_count_shared; ?></a>
					</li>
					<li>
						<?php
							$posttags = get_the_tags();
							$tags = array();
							if ($posttags) {
								foreach($posttags as $tag) {
									$tags[] = $tag->name;
								}
							}

							$twitter_shared_url = sprintf("https://twitter.com/intent/tweet/?text=%s&url=%s&via=%s&hashtags=%s",
								urlencode('Estou lendo esse artigo:'),
								$shortened_url,
								'devimweb',
								implode(',', $tags)
							);

							$twitter_count_shared = get_twitter_share( get_the_ID() );
						?>

						<a href="<?php echo $twitter_shared_url; ?>" target="_blank" class="btn btn-twitter btn-social">Twetar | <?php echo $twitter_count_shared; ?></a>
					</li>
					<li>
						<button class="btn btn-blue-dark btn-copy" data-clipboard-text="<?php echo $shortened_url ?>"><?php echo $shortened_url ?></button>
					</li>
				</ul>
			</section>

			<div class="article-content">
				<?php
					$image = get_post_thumbnail_id();
					$image = wp_get_attachment_url( $image,'full');
				?>

				<?php if ( $image ) : ?>
					<img src="<?php echo $image ?>" alt="<?php the_title(); ?>" class="article-thumbnails">
				<?php endif; ?>

				<?php the_content(); ?>
			</div>

			<footer class="article-footer">
				<?php the_tags('Artigo referenciado como: ', ', '); ?>
			</footer>

			<section class="article-section">
				<h1 class="title-theme title-theme-left">Artigos relacionados</h1>
				<?php get_template_part( 'loop-related' ); ?>
			</section>

			<?php if ( comments_open() ) : ?>
			<section id="comments" class="article-section">
				<h1 class="title-theme title-theme-left">Comentários</h1>
				<?php comments_template(); ?>
			</section>
			<?php endif; ?>
		</article>
	</div>

	<aside class="page-content-right">
		<div id="affix-sidebar">
			<?php dynamic_sidebar('sidebar-blog'); ?>
		</div>
	</aside>
</main>

<?php endwhile; else : endif;?>
<?php get_footer(); ?>
