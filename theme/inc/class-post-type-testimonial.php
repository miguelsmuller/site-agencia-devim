<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Class_Post_Type_Testimonial
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
    add_filter( 'manage_edit-testimonial_columns', array( &$this, 'create_custom_column' ));
    add_filter( 'manage_edit-testimonial_sortable_columns', array( &$this, 'manage_sortable_columns' ));
    add_action( 'manage_testimonial_posts_custom_column', array( &$this, 'manage_custom_column' ));
  }


  /**
   * Cria o tipo de post testimonial
   */
  function init_post_type() {
    register_post_type( 'testimonial',
      array(
        'labels' => array(
          'name'               => 'Depoimento',
          'singular_name'      => 'Depoimento',
          'add_new'            => 'Novo depoimento',
          'add_new_item'       => 'Novo depoimento',
          'edit_item'          => 'Editar depoimento',
          'new_item'           => 'Novo depoimento',
          'view_item'          => 'Ver depoimento',
          'search_items'       => 'Buscar depoimento',
          'not_found'          => 'Nenhuma depoimento encontrado',
          'not_found_in_trash' => 'Nenhuma depoimento encontrado na lixeira',
          'parent'             => 'Depoimento',
          'menu_name'          => 'Depoimento'
          ),

        'hierarchical'       => false,
        'public'             => false,
        'query_var'          => true,
        'supports'           => array('title'),
        'has_archive'        => false,
        'capability_type'    => 'post',
        'menu_icon'          => 'dashicons-megaphone',
        'show_ui'            => true,
        'show_in_menu'       => true,
      )
    );

    if( function_exists('register_field_group') ):
      register_field_group(array (
        'key' => 'group_552c1dd576744',
        'title' => 'Testimonial',
        'fields' => array (
          array (
            'key' => 'field_552c1ddd671d0',
            'label' => 'Autor',
            'name' => 'autor',
            'prefix' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
              ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'readonly' => 0,
            'disabled' => 0,
            ),
          array (
            'key' => 'field_552c1dea671d1',
            'label' => 'Funcao',
            'name' => 'funcao',
            'prefix' => '',
            'type' => 'text',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
              ),
            'default_value' => '',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
            'readonly' => 0,
            'disabled' => 0,
            ),
          array (
            'key' => 'field_552c1def671d2',
            'label' => 'Depoimento',
            'name' => 'depoimento',
            'prefix' => '',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array (
              'width' => '',
              'class' => '',
              'id' => '',
              ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => '',
            'new_lines' => 'wpautop',
            'readonly' => 0,
            'disabled' => 0,
            ),
          ),
    'location' => array (
      array (
        array (
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'testimonial',
          ),
        ),
      ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'left',
    'instruction_placement' => 'field',
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
      10 => 'page_attributes',
      11 => 'featured_image',
      12 => 'categories',
      13 => 'tags',
      14 => 'send-trackbacks',
      ),
    ));
    endif;
  }


  /**
   * Inclui código CSS no painel administrativo
   */
  function admin_head() {
    global $post;
    if ( isset($post->post_type) && $post->post_type == 'testimonial' ){
      ?>
      <style type="text/css" media="screen">
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

    $messages['testimonial'] = array(
      1  => '<strong>Depoimento</strong> atualizado com sucesso',
      6  => '<strong>Depoimento</strong> publicado com sucesso',
      9  => sprintf('<strong>Depoimento</strong> agendando para <strong>%s</strong>', $postDate),
      10 => 'Rascunho do <strong>Depoimento</strong> atualizado'
    );
    return $messages;
  }


  /**
  * Altera o placeholder do titulo
  */
  function enter_title_here( $title ){
    $screen = get_current_screen();
    if  ( $screen->post_type == 'testimonial' ) {
      $title = 'Entre com o nome da empresa aqui';
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
      if ( $key=='date' ){
        $new['status'] = 'Situação';
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
      case 'status' :
      if ($status_post == 'pending' || $status_post == 'draft') {
        echo '<span class="label-red">Rascunho</span>';
      }else{
        echo '<span class="label-green">Publicado</span>';
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
$Class_Post_Type_Testimonial = new Class_Post_Type_Testimonial();
