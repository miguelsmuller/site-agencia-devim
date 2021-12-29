<?php
if ( ! defined( 'ABSPATH' ) ) exit;

include_once 'class-post-type-portfolio.php';
include_once 'class-post-type-testimonial.php';
include_once 'class-shortcode.php';
include_once 'class-page-options.php';

/**
 * Criação dos menus, Configuração dos Thumbnails e dos ativação dos formatos de posts
 */
add_action( 'after_setup_theme', 'after_setup_theme' );
function after_setup_theme() {
	register_nav_menus(array(
		'menu-navigation' => 'Menu Navagação',
		'menu-footer'     => 'Menu Rodapé',
		'menu-copyright'  => 'Menu Copyright'
	));

	add_theme_support('post-thumbnails', array( 'post', 'page' ));
}


/**
 * Criação dos menus, Configuração dos Thumbnails e dos ativação dos formatos de posts
 */
add_action( 'init', 'init_wp' );
function init_wp() {
  if ( !isset($_COOKIE['_first_visit']) ) {
    setcookie('_first_visit', 'yes', time() + 3600*24*5);
  }

	update_option( 'thumbnail_size_w', 250 );
	update_option( 'thumbnail_size_h', 250 );
	update_option( 'thumbnail_crop', 1 );
	add_image_size( 'medium', 500, 500, true );
	add_image_size( 'large', 1024, 1024, true );

	if( false == get_option( 'lead_form_id' ) ) {
        add_option( 'lead_form_id' );
        update_option( 'lead_form_id', 0 );
    }
}


/**
 *
 */
add_action( 'admin_init' , 'admin_init_wp' );
function admin_init_wp() {
    register_setting( 'general', 'lead_form_id', 'esc_attr' );
    register_setting( 'general', 'disableChatWidget', 'esc_attr' );

    add_settings_section(
  		'others_themes_setting',
  		'Configurações extras',
  		null,
  		'general'
  	);

    add_settings_field(
        'lead_form_id',
        '<label for="lead_form_id">ID do formulário de lead nas páginas de serviço:</label>',
        function(){
            $value = get_option('lead_form_id');
            echo '<input name="lead_form_id" type="number" step="1" min="0" id="lead_form_id" value="' . $value . '" class="small-text">';
        },
        'general',
        'others_themes_setting'
    );

    add_settings_field(
        'disableChatWidget',
        '<label for="disableChatWidget">Desabilitar Widget de chat</label>',
        function(){
            $value = get_option('disableChatWidget');
            echo '<input type="checkbox" name="disableChatWidget" value="1"' . checked( 1, $value, false ) . '/>';
        },
        'general',
        'others_themes_setting'
    );
}


/**
 * Registra uma área de widgets e desabilita alguns widgets padrões
 */
add_action( 'widgets_init', 'widgets_init' );
function widgets_init() {
	register_sidebar( array(
		'name'          => 'Sidebar Blog',
		'id'            => 'sidebar-blog',
		'description'   => 'Sidebar blog',
		'before_widget' => '<section class="sidebar-panel">',
		'before_title'  => '<h3 class="title-theme title-theme-sidebar">',
		'after_title'   => '</h3>',
		'after_widget'  => '</section>'
	));

	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
}


/**
 * Carrega os arquivos JS's e CSS's do tema
 */
add_action('wp_enqueue_scripts', 'enqueue_scripts' );
function enqueue_scripts(){
	$template_dir = get_bloginfo('template_directory');

  if ( isset($_COOKIE['_first_visit']) ) {
    $first_vist = "yes";
  }else{
    $first_vist = "no";
  }

	// UNIVERSAL STYLE AND SCRIPT
	wp_enqueue_script( 'waypoints', $template_dir.'/assets/components/waypoints/lib/jquery.waypoints.min.js', false, null, true);

	// Page Home
	if ( is_home() ) {
		wp_enqueue_script( 'particleground', $template_dir.'/assets/components/particleground/jquery.particleground.min.js', false, null, true);
	}

	// PAGE SINGLE
	if ( is_single() ) {
		wp_enqueue_style( 'highlightjs', $template_dir.'/assets/components/highlightjs/styles/monokai_sublime.css' );
		wp_enqueue_script( 'highlightjs', $template_dir.'/assets/components/highlightjs/highlight.pack.js', false, null, true);

		wp_enqueue_style( 'lightgallery', $template_dir.'/assets/components/lightgallery/dist/css/lightgallery.min.css' );
		wp_enqueue_script( 'lightgallery', $template_dir.'/assets/components/lightgallery/dist/js/lightgallery.min.js', false, null, true);
		wp_enqueue_script( 'lightgallery-tb', $template_dir.'/assets/components/lightgallery/dist/js/lg-thumbnail.min.js', false, null, true);
		wp_enqueue_script( 'lightgallery-fs', $template_dir.'/assets/components/lightgallery/dist/js/lg-fullscreen.min.js', false, null, true);

		wp_enqueue_script( 'clipboard', $template_dir.'/assets/components/clipboard/dist/clipboard.min.js', array('common-js'), null, true);
	}

	// PAGE ARCHIVE
	if ( is_post_type_archive('post') || is_page('blog') || is_page('portifolio') ) {
		wp_enqueue_script('jquery-masonry');
		wp_enqueue_script( 'archive', $template_dir.'/assets/scripts/dist/archive.min.js', false, null, true);
	}

	// PAGE AGENCIA
	if ( is_page('agencia') ) {
		wp_enqueue_style( 'carousel', $template_dir.'/assets/components/owl-carousel/owl-carousel/owl.carousel.css' );
		wp_enqueue_script( 'carousel', $template_dir.'/assets/components/owl-carousel/owl-carousel/owl.carousel.js', false, null, true);
		wp_enqueue_script( 'about-us', $template_dir.'/assets/scripts/dist/about-us.min.js', false, null, true);
	}

	// PAGE FALE CONOSCO
	if ( is_page('fale-conosco') ) {

    $key = get_field('api_key_google', 'option');
		$map_api_url = 'https://maps.googleapis.com/maps/api/js?key='. $key .'&sensor=TRUE';
		wp_register_script( 'maps-api', $map_api_url, array('common-js'), '', true);
		wp_register_script( 'maps-contact', $template_dir.'/assets/scripts/dist/contact.min.js', array('common-js'), '', true);

		wp_enqueue_script( 'maps-api');
		wp_enqueue_script( 'maps-contact');
	}

	// COMMON STYLE AND SCRIPT
	wp_register_script( 'common-js', $template_dir .'/assets/scripts/dist/javascript.min.js', array('jquery'), null, true );
	wp_localize_script(
		'common-js',
		'common_params',
		array(
			'site_url'  => esc_url( site_url() ),
			'first_vist' => $first_vist
		)
	);
	wp_enqueue_script( 'common-js' );
	wp_enqueue_style( 'common-css', $template_dir .'/assets/styles/dist/style.css' );
}


/**
 * Função quer permite a página infinita
 */
add_action('wp_ajax_infinite_scroll', 'wp_infinite_scroll');
add_action('wp_ajax_nopriv_infinite_scroll', 'wp_infinite_scroll');
function wp_infinite_scroll(){
	$template        = $_POST['template'];
	$post_type       = $_POST['post_type'];
	$posts_per_page  = $_POST['posts_per_page'];
	$paged           = $_POST['paged'];

	query_posts(array('post_type' => $post_type, 'posts_per_page' => $posts_per_page, 'paged' => $paged,));
	get_template_part( $template );

	exit;
}


/**
 * Evira o envio de imagem com tamanho pequeno
 */
//add_filter('wp_handle_upload_prefilter','minimin_image_size');
function minimin_image_size($file)
{
	$img  =getimagesize($file['tmp_name']);
	$min_size = array('width' => '350', 'height' => '350');
	$max_size = array('width' => '2048', 'height' => '2048');
	$width = $img[0];
	$height = $img[1];

	if ($width < $min_size['width'] )
		return array("error"=>"Imagem muito pequena. Largura miníma é {$min_size['width']}px. A imagem que você enviou possui $width px de largura");

	elseif ($height <  $min_size['height'])
		return array("error"=>"Imagem muito pequena. Altura miníma é {$min_size['height']}px. A imagem que você enviou possui $height px de altura");

	elseif ($width >  $max_size['width'])
		return array("error"=>"Imagem muito grande. Altura máxima é {$max_size['width']}px. A imagem que você enviou possui $width px de altura");

	elseif ($height >  $max_size['height'])
		return array("error"=>"Imagem muito grande. Altura máxima é {$max_size['height']}px. A imagem que você enviou possui $height px de altura");

	else
		return $file;
}


add_action( 'init', 'disable_wp_emojicons' );
function disable_wp_emojicons() {
	if ( ! is_single() ) {
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
    	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    	remove_action( 'wp_print_styles', 'print_emoji_styles' );
    	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
	}
}


/**
 * Remove o CSS e o JS do CF7 onde não tem necessidade
 */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );
add_action( 'wp_head', 'cf_register_assets' );
function cf_register_assets() {
	if ( is_page( 'fale-conosco' ) || is_page_template( 'page-servicos-landing.php' ) ) {
		wpcf7_enqueue_scripts();
		wpcf7_enqueue_styles();
	}
}

/**
 * Mensagem de atualização de navegador inseguro
 */
add_filter( 'navigator_insecure', 'navigator_insecure' );
function navigator_insecure( $msg ){
	return 'Parece que está a usar uma versão não segura do <a href="%update_url%" class="alert-link">%name%</a>. Para melhor navegar no nosso site, por favor atualize o seu browser.<br/><a href="%update_url%" class="alert-link">Clique aqui para ser direcionado para atualização do %name% agora.</a>';
}


/**
 * Mensagem de atualização de navegador desatualizado
 */
add_filter( 'navigator_upgrade', 'navigator_upgrade' );
function navigator_upgrade( $msg ){
	return 'Parece que está a usar uma versão antiga do <a href="%s" class="alert-link"%name%</a>. Para melhor navegar no nosso site, por favor atualize o seu browser.<br/><a href="%update_url%" class="alert-link">Clique aqui para ser direcionado para atualização do %name% agora.</a>';
}


/**
 * Remove o widget do mandrill da dashboard
 */
add_action( 'wp_dashboard_setup', 'dashboard_setup' );
function dashboard_setup() {
    if ( in_array('wpmandrill/wpmandrill.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ))) ){
        remove_meta_box('mandrill_widget', 'dashboard', 'normal');
    }
}


/**
 * Adiciona alguns CSS na pagina de login
 */
add_action( 'login_enqueue_scripts', 'login_scripts' );
function login_scripts() {
    $login_bg = get_template_directory_uri() . '/assets/images/image-login-background.jpg';
    $login_logo = get_template_directory_uri() . '/assets/images/image-login.png'
    ?>

    <style type="text/css" media="screen">
    .login form {
        border: 1px solid rgba(0, 0, 0, 0.2);
    }
    body.login {
        background-image: url("<?php echo $login_bg; ?>");
    }
    body.login div#login h1 a {
        background-image: url("<?php echo $login_logo; ?>");
    }
    body.login {
        background-color: #F6F6F6 !important;
    }
    body.login div#login{
        padding: 30px 0 0;
    }
    body.login div#login h1{
        width:320px;
        height:250px;
        margin-bottom:30px;
    }
    body.login div#login h1 a {
        background-size: 320px 250px;
        padding-bottom: 30px;
        width:320px;
        height:250px;
    }
    .text-center {
        text-align: center;
    }
    .login form {
        border: 2px solid gainsboro;
    }
    </style>
    <?php
}


/**
 * Remove o menu do comentários da barra lateral
 */
add_action( 'admin_menu', 'remove_menus' );
function remove_menus(){
	remove_menu_page( 'edit-comments.php' );
}


/**
 *
 */
add_filter( 'body_class', 'add_body_class' );
function add_body_class( $classes ) {
	if ( is_page('servicos') ) {
    	$classes[] = 'page-template-page-service';
	}

	return $classes;
}


/**
 * Implementa melhoria de design na galeria do WordPress
 */
add_filter('post_gallery', 'devim_post_gallery', 10, 2);
function devim_post_gallery($output, $attr) {
    global $post;

    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }

    extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }

    if (empty($attachments)) return '';

    $output = '<div id="gallery">';

    foreach ($attachments as $id => $attachment) {
		$img_thumb = wp_get_attachment_image_src($id, 'thumbnail');
        $img_full = wp_get_attachment_image_src($id, 'full');

        $output .= '<a href="'. $img_full[0] .'">';
        $output .= '<img src="'. $img_thumb[0] .'" alt="'. $attachment->post_title .'" />';
        $output .= '</a>';
    }

    $output .= '</div>';

    return $output;
}


add_filter( 'the_content', 'tgm_io_shortcode_empty_paragraph_fix' );
function tgm_io_shortcode_empty_paragraph_fix( $content ) {

    $array = array(
        '<p>['    => '[',
        ']</p>'   => ']',
        ']<br />' => ']'
    );
    return strtr( $content, $array );

}
