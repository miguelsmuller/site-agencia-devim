<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Class_Post_Type_Portifolio
{
    /**
     * Construtor da Classe
     */
    public function __construct(){
        // Actions
        add_action( 'init', array( &$this, 'init_post_type' ));
        add_action( 'admin_head', array( &$this, 'admin_head' ));

        // Filters
        add_filter( 'post_updated_messages', array( &$this, 'post_updated_messages' ));
        add_filter( 'enter_title_here', array( &$this, 'enter_title_here'));

        // Mudança das colunas do WP-ADMIN
        add_filter( 'manage_edit-portfolio_columns', array( &$this, 'create_custom_column' ));
        add_action( 'manage_portfolio_posts_custom_column', array( &$this, 'manage_custom_column' ));
        add_filter( 'manage_edit-portfolio_sortable_columns', array( &$this, 'manage_sortable_columns' ));
    }


    /**
     * Cria o tipo de post portfolio
     */
    function init_post_type() {
        register_post_type( 'portfolio',
            array(
                'labels' => array(
                    'name'               => 'Portifólio',
                    'singular_name'      => 'Portifólio',
                    'add_new'            => 'Novo item',
                    'add_new_item'       => 'Novo item',
                    'edit_item'          => 'Editar item',
                    'new_item'           => 'Novo item',
                    'view_item'          => 'Ver item',
                    'search_items'       => 'Buscar item',
                    'not_found'          => 'Nenhuma item encontrado',
                    'not_found_in_trash' => 'Nenhuma item encontrado na lixeira',
                    'parent'             => 'Portifólio',
                    'menu_name'          => 'Portifólio'
                ),

                'hierarchical'       => false,
                'public'             => false,
                'query_var'          => true,
                'supports'           => array('title','thumbnail'),
                'has_archive'        => false,
                'capability_type'    => 'post',
                'menu_icon'          => 'dashicons-welcome-widgets-menus',
                'show_ui'            => true,
                'show_in_menu'       => true,
            )
        );

        if(function_exists("register_field_group")) {
            register_field_group(array (
                'id' => 'acf_portifolio',
                'title' => 'Portifólio',
                'fields' => array (
                    array (
                        'key' => 'field_54b5cb6a1d6fa',
                        'label' => 'Imagem',
                        'name' => 'thumbnail',
                        'type' => 'image',
                        'required' => 1,
                        'save_format' => 'object',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'portfolio',
                            'order_no' => 0,
                            'group_no' => 0,
                        ),
                    ),
                ),
                'options' => array (
                    'position' => 'normal',
                    'layout' => 'default',
                    'hide_on_screen' => array (
                        0 => 'permalink',
                        1 => 'the_content',
                        2 => 'excerpt',
                        3 => 'custom_fields',
                        4 => 'discussion',
                        5 => 'comments',
                        6 => 'revisions',
                        7 => 'slug',
                        8 => 'author',
                        9 => 'format',
                        10 => 'featured_image',
                        11 => 'categories',
                        12 => 'tags',
                        13 => 'send-trackbacks',
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'left',
                'instruction_placement' => 'field',
                'hide_on_screen' => '',
            ));
        }
    }


    /**
     * Inclui código CSS no painel administrativo
     */
    function admin_head() {
        global $post;
        if ( isset($post->post_type) && $post->post_type == 'portfolio' ){
        ?>
            <style type="text/css" media="screen">
                .column-featured_image{
                    width: 175px;
                }
                .misc-pub-visibility,
		        .misc-pub-curtime,
		        #minor-publishing-actions{
                    display: none;
                }
                .misc-pub-section {
                    padding: 6px 10px 18px;
                }
                .label-red,
                .label-green,
                .label-gray{
                    position: relative;
                    top: 5px;
                    padding: .3em 0.6em .3em;
                    font-weight: bold;
                    border-radius: .25em;
                    line-height: 1;
                    color: #FFF;
                    text-align: center;
                    white-space: nowrap;
                    vertical-align: baseline;
                    display: inline;
                }
                .label-red{
                    background-color: #D9534F;
                }
                .label-green{
                    background-color: #5CB85C;
                }
                .label-gray{
                    background-color: #777;
                }
            </style>
        <?php
        }
        ?>
    <?php
    }


    /**
     * Personaliza as mensagens do processo de salvamento
     */
    function post_updated_messages( $messages ) {
        global $post;
        $postDate = date_i18n(get_option('date_format'), strtotime( $post->post_date ));

        $messages['portfolio'] = array(
            1  => "<strong>Item</strong> atualizado com sucesso",
            6  => "<strong>Item</strong> publicado com sucesso",
            9  => sprintf("<strong>Item</strong> agendando para <strong>%s</strong>", $postDate),
            10 => "Rascunho do <strong>Item</strong> atualizado"
        );
        return $messages;
    }


    /**
    * Altera o placeholder do titulo
    */
    function enter_title_here( $title ){
        $screen = get_current_screen();
        if  ( $screen->post_type == 'portfolio' ) {
            $title = 'Entre com o nome do item do portfolio aqui';
        }
        return $title;
    }


    /**
     * Cria uma coluna na lista de slides do painel administrativo
     */
    function create_custom_column( $columns ) {
        global $post;

        $new = array();
        foreach($columns as $key => $title) {
            if ( $key=='title' )
                $new['featured_image'] = 'Slide';
            if ( $key=='date' ){
                $new['status'] = 'Situação';
                $new['link']    = 'Link';
            }
            $new[$key] = $title;
        }
    return $new;
    }


    /**
     * Inseri valor na coluna especifica da listagem do painel administrativo
     */
    function manage_custom_column( $column ) {
        global $post;

        $status_post = get_post_status( $post->ID );

        switch( $column ) {
            case 'featured_image' :
                $thumbnail = get_field('thumbnail');

                if( $thumbnail ) {
                    if ( in_array( 'portfolio', get_intermediate_image_sizes() )){
                        $new_url = wp_get_attachment_image_src($thumbnail['id'], 'portfolio');
                        $thumbnail['url'] = $new_url[0];
                    }else{
                        $new_url = wp_get_attachment_image_src($thumbnail['id'], 'thumbnail');
                        $thumbnail['url'] = $new_url[0];
                    }

                    $url_edit_post = site_url() .'/wp-admin/post.php?post='.$post->ID.'&action=edit';
                    echo '<a href="'. $url_edit_post .'"><img width="100%" src="'. $thumbnail['url'] .'" /></a>';
                }
                break;

            case 'status' :
                if ($status_post == 'pending' || $status_post == 'draft') {
                    echo '<span class="label-red">Rascunho</span>';
                }else{
                    echo '<span class="label-green">Publicado</span>';
                }
                break;

            case 'link' :
             echo get_field('tipo_destino');
                if (get_field('tipo_destino') == 'interno'){
                    $destino_interno = get_field('destino_interno');
                    echo '<span class="label-gray">Interno</span><br><br><a href="'. get_permalink( $destino_interno->ID ) .'"target="_blank">['. $destino_interno->post_type . '] - ' . $destino_interno->post_title .'</a>';
                }else{
                    echo '<span class="label-gray">Externo</span><br><br><a href="'. get_field('destino_externo') .'" target="_blank">'. get_field('destino_externo') .'</a>';
                }
                break;
        }
    }


    /**
     * Permite que a coluna seja ordenada de acordo com o valor
     */
    function manage_sortable_columns( $columns ){
        $columns['status'] = 'status';
        return $columns;
    }
}
$Class_Post_Type_Portifolio = new Class_Post_Type_Portifolio();
