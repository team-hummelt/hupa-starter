<?php

namespace Hupa\StarterTheme;
use Exception;
use stdClass;

defined('ABSPATH') or die();
/**
 * ADMIN THEME WordPress OPTIONEN
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */

if (!class_exists('StarterThemeUpdateAction')) {
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

        public function hupaValidateInstallOptionen()
        {
            global $wpdb;
            $table = $wpdb->prefix . $this->table_settings;
            $result = $wpdb->get_row("SELECT google_maps_placeholder FROM {$table} ");

            if (!$result->google_maps_placeholder) {
                apply_filters('update_hupa_options', 'reset_gmaps_settings', 'reset_settings');
                apply_filters('generate_theme_css', '');
            }

            $message = '';
            if(!is_dir(THEME_FONTS_DIR. DIRECTORY_SEPARATOR . 'Roboto')){
                $src = THEME_ADMIN_INC . 'theme-fonts' . DIRECTORY_SEPARATOR . 'Roboto';
                $dest = THEME_FONTS_DIR . 'Roboto';


                try {
                    $this->recursive_copy($src, $dest, true);
                } catch (Exception $e) {
                    do_action('hupa-theme/log','error', $e->getMessage());
                    exit();
                }

                //shell_exec("cp -r $src $dest");
                $css = file_get_contents(THEME_ADMIN_INC . 'theme-fonts' . DIRECTORY_SEPARATOR .'Roboto.css', true);
                file_put_contents(THEME_FONTS_DIR . 'Roboto.css', $css);

                apply_filters('update_hupa_options', 'no-data', 'sync_font_folder');
            }

            $vers = str_replace(['v', '.'], '', THEME_VERSION);
            if ($vers < 106) {
                $slider = apply_filters('get_carousel_data','hupa_slider');
                $update = new stdClass();
                if($slider->status) {
                    foreach ($slider->record as $tmp) {
                        $update->first_font = 'Roboto';
                        $update->first_style = 3;
                        $update->second_font = 'Roboto';
                        $update->second_style = 3;
                        $update->id = $tmp->id;
                        apply_filters('update_slider_family_style', $update);
                    }

                    apply_filters('generate_theme_css', '');
                }

                apply_filters('update_hupa_options', 'no-data', 'sync_font_folder');
            }
        }

        /**
         * @throws Exception
         */
        public function recursive_copy($src, $dst, $delete = false) {

            $dir = opendir($src);

            if(!is_dir($dst)){
                if( !mkdir($dst, 0755, true) ) {
                    throw new Exception('Recursive Copy - Destination Ordner nicht gefunden gefunden.');
                }
            }
            while(( $file = readdir($dir)) ) {
                if (( $file != '.' ) && ( $file != '..' )) {
                    if ( is_dir($src . DIRECTORY_SEPARATOR . $file) ) {
                        $this->recursive_copy($src . DIRECTORY_SEPARATOR . $file, $dst . DIRECTORY_SEPARATOR . $file);
                    } else {
                        copy($src . DIRECTORY_SEPARATOR . $file,$dst . DIRECTORY_SEPARATOR . $file);
                        if($delete){
                            if(is_file($src . DIRECTORY_SEPARATOR . $file)){
                                if(!unlink($src . DIRECTORY_SEPARATOR . $file)){
                                    throw new Exception('Recursive Copy - Source konnte nicht gelöscht werden.');
                                }
                            }
                        }
                    }
                }
            }
            closedir($dir);
        }
    }
}