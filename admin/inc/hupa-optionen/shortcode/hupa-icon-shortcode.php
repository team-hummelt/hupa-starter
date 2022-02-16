<?php


namespace Hupa\StarterTheme;

use stdClass;

defined( 'ABSPATH' ) or die();
/**
 * ADMIN CSS GENERATOR
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */

if ( ! class_exists( 'HupaIconsShortCode' ) ) {
    add_action('after_setup_theme', array('Hupa\\StarterTheme\\HupaIconsShortCode', 'init'), 0);
    class HupaIconsShortCode
    {
        //INSTANCE
        private static $instance;

        /**
         * @return static
         */
        public static function init(): self
        {
            if (is_null(self::$instance)) {
                self::$instance = new self;
            }

            return self::$instance;
        }

        public function __construct() {
            add_shortcode( 'icon', array( $this, 'hupa_icons_shortcode' ) );
        }

        public function hupa_icons_shortcode($atts, $content, $tag )
        {
            $a = shortcode_atts(array(
                'i' => '',
                'code' => 'true'
            ), $atts);
            $icon = [];
            $keys = array_keys($atts);
            $types = ['fa','bi','i'];
            isset($atts['code']) ? $code = $atts['code'] : $code = false;
            if(in_array($keys[0], $types)){
                $icon = [
                    'classes' => trim($atts[$keys[0]]),
                    'code' => $code,
                    'type' => $keys[0]

                ];
            }
            if(!$icon){
                return '';
            }
            ob_start();
               $this->get_hupa_icon($icon);
            return ob_get_clean();
        }

        private function get_hupa_icon($search){
            $dir = THEME_AJAX_DIR . 'tools' . DIRECTORY_SEPARATOR;
            $file = '';
            $iconSet = '';
            $icon = '';
            $types = explode(' ', $search['classes']);
            switch ($search['type']){
                case 'bi':
                       $file = $dir . 'bs-icons.json';
                       $iconSet = 'bi';
                    break;
                case 'i':
                case 'fa':
                $file = $dir . 'fa-icons.json';
                $iconSet = 'fa';
                    break;
            }
            if(!is_file($file)){
                echo '';
            }
            $cheatSet = json_decode(file_get_contents($file, true));
            foreach ($cheatSet as $tmp) {
              if($tmp->title == $types[0]) {
                  if(isset($search['icon'])) {
                      $icon = $tmp->code;
                  } else {
                      unset($types[0]);
                      $classes = implode(' ', $types);
                      $types ? $sep = ' ' : $sep = '';
                      $icon = '<i class="'. $iconSet . ' ' . $iconSet . '-' . $tmp->title . $sep . $classes.'"></i>';
                  }
                   break;
               }
            }
            echo trim($icon);
        }
    }

}