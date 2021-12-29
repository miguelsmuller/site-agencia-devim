<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Class_Page_Options
{
    /**
     * Construtor da Classe
     */
    public function __construct(){
        // Actions
        add_action( 'init', array( &$this, 'init' ));
        add_action( 'admin_head', array( &$this, 'admin_head' ));
    }


    /**
     * Cria o tipo de post portfolio
     */
    function init() {
        if( function_exists('acf_add_local_field_group') ):
			acf_add_local_field_group(array (
				'key' => 'before-content-page',
				'title' => 'Definições da página',
				'fields' => array (
					array (
						'key' => 'field_5589900bf29e7',
						'label' => 'Titulo interno',
						'name' => 'titulo_interno',
						'type' => 'text',
						'instructions' => '',
						'required' => 1,
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
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'page',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'acf_after_title',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
			));

			endif;
    }


    /**
     * Inclui código CSS no painel administrativo
     */
    function admin_head() {
        global $post;
        if ( isset($post) && $post->post_type == 'page' ){
        ?>
            <style type="text/css" media="screen">
                #acf-before-content-page{
                    margin-bottom: 0;
					margin-top: 20px;
                }
            </style>
        <?php
        }
        ?>
    <?php
    }
}
$Class_Page_Options = new Class_Page_Options();