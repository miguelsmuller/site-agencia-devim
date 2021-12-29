<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php wp_title( '|', true, 'right' ); ?></title>

<?php wp_head();?>

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49236900-1', 'auto');
  ga('send', 'pageview');
</script>
<!-- End Google Analytics -->

</head>
<body <?php body_class(); ?>>

<?php do_action( 'after_body' ); ?>

<div class="wraper">

    <?php if (is_home()): ?>
    <!-- Hero -->
    <section id="section-hero">
    	<svg id="logo-devim-white" class="animeSlideInDown" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 373.6 237.2" enable-background="new 0 0 373.6 237.2" xml:space="preserve">
		<g>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#F1F1F0" d="M264.5,174.4v62.4h21.4v-64c0-5.7,5.7-9.3,10.9-9.3c5.3,0,10.7,3.6,10.7,9.3v64h11.6h11.6v-64c0-5.7,5.4-9.3,10.7-9.3c5.3,0,10.9,3.5,10.9,9.3v64h21.4v-62.4c0-18.8-11.4-28.8-27.3-28.9c-10.7,0-17.8,0-27.2-0.1c-9.4,0-15.1,0-25.8,0.1C277.4,145.5,264.5,155.5,264.5,174.4L264.5,174.4z M252.8,237v-91.9h-21.6V237H252.8L252.8,237z M64.8,209.6c0,7.6-3.2,14.2-9.5,19.5c-6.3,5.4-14,8.1-23,8.1c-8.9,0-16.5-2.7-22.8-8.1C3.2,223.8,0,217.2,0,209.6v-36.4c0-7.6,3.2-14.2,9.5-19.5c6.3-5.4,13.9-8,22.8-8h10.9v-18.3h21.6V209.6L64.8,209.6z M21.6,209.6c0,2.5,1,4.7,3.1,6.5c2.1,1.8,4.6,2.7,7.6,2.7c3,0,5.6-0.9,7.7-2.7c2.1-1.8,3.2-4,3.2-6.5v-45.7H32.3c-3,0-5.5,0.9-7.6,2.7c-2.1,1.8-3.1,4-3.1,6.5V209.6L21.6,209.6z M138.8,200.5H95.6v9.1c0,2.5,1,4.7,3.1,6.5c2.1,1.8,4.6,2.7,7.6,2.7c3,0,5.6-0.9,7.7-2.7c2.1-1.8,3.2-4,3.2-6.5h21.6c0,7.5-3.2,14-9.5,19.4c-6.3,5.4-14,8.2-23,8.2c-8.9,0-16.5-2.7-22.8-8.2c-6.3-5.4-9.5-11.9-9.5-19.4V173c0-7.5,3.2-14,9.5-19.3c6.3-5.4,13.9-8,22.8-8c9,0,16.7,2.7,23,8c6.3,5.4,9.5,11.8,9.5,19.3V200.5L138.8,200.5z M117,173c0-2.5-1-4.7-3.1-6.4c-2.1-1.7-4.6-2.6-7.6-2.6c-3,0-5.5,0.9-7.6,2.6c-2.1,1.7-3.1,3.9-3.1,6.4v9.3h21.6L117,173L117,173z M182.5,217.1c-2.1,0-4.5-2.2-5.1-5.4l-12.3-66.3h-21.6l13.9,71.5c1.6,8.1,6.9,19.4,16.4,19.4h8.6h8.6c9.5,0,14.8-11.3,16.4-19.4l13.9-71.5h-21.6l-12.3,66.3C186.9,214.9,184.6,217.1,182.5,217.1z"/>
		</g>
		<g>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#F1F1F0" d="M161,15.4h27.6c1.3,0,2.4,1.1,2.4,2.4v19.5c0,8,5.5,15,14,15h21.3c1.3,0,2.4,1.1,2.4,2.4v27c0,1.3-1.1,2.4-2.4,2.4h-21.6c-7.4,0-13.7,6.4-13.7,13.6v20.8c0,1.3-1.1,2.4-2.4,2.4H161c-1.3,0-2.4-1.1-2.4-2.4v-27c0-1.3,1.1-2.4,2.4-2.4h22.3c7.8,0,13-5.9,13-13.2V59.4c0-7.5-5.3-12.2-12.7-12.2H161c-1.3,0-2.4-1.1-2.4-2.4v-27C158.6,16.5,159.7,15.4,161,15.4z"/>
		<path fill-rule="evenodd" clip-rule="evenodd" fill="#F1F1F0" d="M204.7,89.1h24.1v31.7h-32.5V98.4C196.3,93,200,89.1,204.7,89.1L204.7,89.1z M120.9,89.1h32.5v31.7h-32.5V89.1L120.9,89.1z M120.9,52.3h32.5V84h-32.5V52.3L120.9,52.3z M120.9,15.4h32.5v31.7h-32.5V15.4L120.9,15.4z M239,27.7h11.3c1.3,0,2.4,1.1,2.4,2.4v11.1c0,1.3-1.1,2.4-2.4,2.4H239c-1.3,0-2.4-1.1-2.4-2.4V30.1C236.6,28.8,237.7,27.7,239,27.7L239,27.7z M204.8,47.1h24l0-26.4c0-0.1,0-0.2,0-0.2h12.9c1.7,0,3.2-1.4,3.2-3.1V3.1c0-1.7-1.4-3.1-3.2-3.1H227c-1.7,0-3.2,1.4-3.2,3.1v12.3l-27.5,0v23.3C196.3,43.5,200.1,47.1,204.8,47.1z"/>
		</g>
		</svg>
        <h2 class="animeFadeInLeft">Uma agência web de resultados</h2>
        <h3 class="animeFadeInRight">Você cria coisas incríveis quando escolhe uma equipe completa</h3>
        <a id="button-scroll-down" href="#navbar-main" data-offset="180" class="animated bounce">
            <svg version="1.1" id="svg-button-scroll-down" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 92 92" enable-background="new 0 0 92 92" xml:space="preserve">
            <circle fill="#F1F1F1" cx="45.9" cy="45.9" r="40.4"/>
            <path fill="#A6352F" d="M65.1,47.2c0.5-0.6,0.7-1.4,0.7-2.3c0-2.1-1.7-3.8-3.8-3.8h-3.8c-1,0-1.9-0.9-1.9-1.9V27.8c0-2.1-1.7-3.8-3.8-3.8H39.2c-2.1,0-3.8,1.7-3.8,3.8v11.4c0,1-0.9,1.9-1.9,1.9h-3.8c-2.1,0-3.8,1.7-3.8,3.8c0,0.8,0.3,1.6,0.7,2.3l15.9,19.2c1.9,1.9,4.9,1.9,6.8,0L65.1,47.2L65.1,47.2z"/>
            <circle fill="none" stroke="#F1F1F1" stroke-width="3" stroke-miterlimit="10" cx="46" cy="46" r="44.5"/>
            </svg>
        </a>
    </section>
    <?php endif; ?>

    <!-- Nabigations -->
    <nav id="navbar-main">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu" aria-expanded="false" aria-controls="navbar-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="<?php echo esc_url( site_url() ); ?>" class="navbar-brand">
                    <svg version="1.1" id="Camada_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 200 46.8" enable-background="new 0 0 200 46.8" xml:space="preserve">
                    <g id="texto">
                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#2D3D4F" d="M157.7,22.5v24.2h8.3V21.9c0-2.2,2.2-3.6,4.2-3.6c2.1,0,4.1,1.4,4.1,3.6v24.8h4.5h4.5V21.9c0-2.2,2.1-3.6,4.1-3.6c2,0,4.2,1.4,4.2,3.6v24.8h8.3V22.5c0-7.3-4.4-11.2-10.6-11.2c-4.1,0-6.9,0-10.5,0c-3.6,0-5.8,0-10,0C162.7,11.3,157.7,15.2,157.7,22.5L157.7,22.5z M153.2,46.7V11.1h-8.4v35.6H153.2L153.2,46.7z M80.4,36.1c0,3-1.2,5.5-3.7,7.6c-2.5,2.1-5.4,3.1-8.9,3.1c-3.4,0-6.4-1-8.8-3.1c-2.5-2.1-3.7-4.6-3.7-7.6V22c0-3,1.2-5.5,3.7-7.6c2.5-2.1,5.4-3.1,8.8-3.1H72V4.3h8.4V36.1L80.4,36.1z M63.7,36.1c0,1,0.4,1.8,1.2,2.5c0.8,0.7,1.8,1.1,2.9,1.1c1.2,0,2.2-0.4,3-1.1c0.8-0.7,1.2-1.5,1.2-2.5V18.4h-4.2c-1.2,0-2.1,0.4-2.9,1.1c-0.8,0.7-1.2,1.5-1.2,2.5V36.1L63.7,36.1z M109.1,32.6H92.4v3.5c0,1,0.4,1.8,1.2,2.5c0.8,0.7,1.8,1.1,2.9,1.1c1.2,0,2.2-0.4,3-1.1c0.8-0.7,1.2-1.5,1.2-2.5h8.4c0,2.9-1.2,5.4-3.7,7.5c-2.5,2.1-5.4,3.2-8.9,3.2c-3.4,0-6.4-1.1-8.8-3.2C85.2,41.5,84,39,84,36.1V21.9c0-2.9,1.2-5.4,3.7-7.5c2.5-2.1,5.4-3.1,8.8-3.1c3.5,0,6.5,1,8.9,3.1c2.5,2.1,3.7,4.6,3.7,7.5V32.6L109.1,32.6z M100.6,21.9c0-1-0.4-1.8-1.2-2.5c-0.8-0.7-1.8-1-2.9-1c-1.2,0-2.1,0.3-2.9,1c-0.8,0.7-1.2,1.5-1.2,2.5v3.6h8.4L100.6,21.9L100.6,21.9z M126,39c-0.8,0-1.7-0.9-2-2.1l-4.7-25.7h-8.4l5.4,27.7c0.6,3.2,2.7,7.5,6.4,7.5h3.3h3.3c3.7,0,5.7-4.4,6.4-7.5l5.4-27.7h-8.4l-4.7,25.7C127.7,38.2,126.8,39,126,39z"/>
					</g>
					<g id="icon">
					<path fill-rule="evenodd" clip-rule="evenodd" fill="#2D3D4F" d="M15.5,6h10.7c0.5,0,0.9,0.4,0.9,0.9v7.5c0,3.1,2.1,5.8,5.4,5.8h8.2c0.5,0,0.9,0.4,0.9,0.9v10.4c0,0.5-0.4,0.9-0.9,0.9h-8.3c-2.9,0-5.3,2.5-5.3,5.3v8.1c0,0.5-0.4,0.9-0.9,0.9H15.5c-0.5,0-0.9-0.4-0.9-0.9V35.4c0-0.5,0.4-0.9,0.9-0.9h8.6c3,0,5-2.3,5-5.1V23c0-2.9-2-4.7-4.9-4.7h-8.7c-0.5,0-0.9-0.4-0.9-0.9V6.9C14.6,6.4,15,6,15.5,6z"/>
					<path fill-rule="evenodd" clip-rule="evenodd" fill="#436091" d="M32.4,34.5h9.3v12.3H29.2v-8.7C29.2,36,30.6,34.5,32.4,34.5L32.4,34.5z M0,34.5h12.6v12.3H0V34.5L0,34.5z M0,20.2h12.6v12.3H0V20.2L0,20.2z M0,6h12.6v12.3H0V6L0,6z M45.7,10.7h4.4c0.5,0,0.9,0.4,0.9,0.9v4.3c0,0.5-0.4,0.9-0.9,0.9h-4.4c-0.5,0-0.9-0.4-0.9-0.9v-4.3C44.8,11.1,45.2,10.7,45.7,10.7L45.7,10.7z M32.5,18.3h9.3l0-10.2c0,0,0-0.1,0-0.1h5C47.5,8,48,7.4,48,6.8V1.2C48,0.5,47.5,0,46.8,0h-5.7c-0.7,0-1.2,0.5-1.2,1.2v4.8L29.2,6v9C29.2,16.8,30.7,18.3,32.5,18.3z"/>
					</g>
					</svg>
                </a>
            </div>
            <div id="navbar-menu" class="collapse navbar-collapse">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-navigation',
                    'container'      => false,
                    'menu_id'        => 'menu-navigation',
                    'menu_class'     => 'navbar-nav',
                    'fallback_cb'    => 'fallbackNoMenu'
                ));
                ?>
            </div>
        </div>
    </nav>
