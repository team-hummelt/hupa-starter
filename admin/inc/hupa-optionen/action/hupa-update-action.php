<?php

namespace Hupa\StarterTheme;
defined( 'ABSPATH' ) or die();
/**
 * ADMIN THEME WordPress OPTIONEN
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */

if ( ! class_exists( 'StarterThemeUpdateAction' ) ) {
    add_action('after_setup_theme', array('Hupa\\StarterTheme\\StarterThemeUpdateAction', 'init'), 0);
    class StarterThemeUpdateAction
    {
        private static $instance;
        //OPTION TRAIT
        use HupaOptionTrait;
        /**
         * @return static
         */
        public static function init(): self
        {
            if (is_null(self::$instance)) {
                self::$instance = new self();
            }

            return self::$instance;
        }
        public function __construct()
        {
            //TODO LOGIN SEITE CUSTOMIZE
            add_action('validate_install_optionen', array($this, 'hupaValidateInstallOptionen'));
        }

        public function hupaValidateInstallOptionen(){
            global $wpdb;
            $table = $wpdb->prefix . $this->table_settings;
            $result = $wpdb->get_row("SELECT google_maps_placeholder FROM {$table} ");

            if(!$result->google_maps_placeholder){
               apply_filters('update_hupa_options', 'reset_gmaps_settings', 'reset_settings');
            }

            apply_filters('generate_theme_css', '');
        }
    }
}