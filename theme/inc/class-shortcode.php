<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Class_ShortcodeCode
{
    /**
     * Construtor da Classe
     */
    public function __construct() {
        add_shortcode('button', array( &$this, 'button'));
        add_shortcode('snippet', array( &$this, 'snippet'));
    }

    function snippet( $atts, $content = null ) {
        $attr = shortcode_atts( array(
            'title' => ''
        ), $atts );

        $title = '';
        if ($attr['title'] != ''){
            $title = '<div class="snippet-title">'. $attr['title'] .'</div>';
        }

        $html = sprintf('<div class="snippet">%s%s<a href="#" class="snippet-see-more">VER CÓDIGO COMPLETO</a></div>', $title, $content);

        return $html;
    }

    function button( $atts, $content = null ) {
        $attr = shortcode_atts( array(
            'url' => '#'
        ), $atts );

        return '<p><a href="'. $attr['url'] .'" class="btn btn-red">'. $content .'</a></p>';
    }
}
$Class_ShortcodeCode = new Class_ShortcodeCode();
