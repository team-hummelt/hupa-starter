<?php

namespace Hupa\ThemeLicense;

defined('ABSPATH') or die();

/**
 * REGISTER HUPA CUSTOM THEME
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */
final class RegisterHupaStarter
{
    private static $hupa_starter_instance;

    /**
     * @return static
     */
    public static function hupa_starter_instance(): self
    {
        if (is_null(self::$hupa_starter_instance)) {
            self::$hupa_starter_instance = new self();
        }
        return self::$hupa_starter_instance;
    }

    public function init_hupa_starter(): void
    {

        // TODO REGISTER LICENSE MENU
       if(!get_option('hupa_starter_product_install_authorize')) {
            add_action('admin_menu', array($this, 'register_license_hupa_starter_theme'));
       }
        add_action('after_switch_theme',array($this, 'hupa_starter_theme_activation_hook' ) );
        add_action('switch_theme',array($this, 'hupa_starter_theme_deactivated') );
        add_action('wp_ajax_HupaLicenceHandle', array($this, 'prefix_ajax_HupaLicenceHandle'));
        add_action( 'after_setup_theme', array( $this, 'hupa_starter_license_site_trigger_check' ) );
        add_action( 'template_redirect',array($this, 'hupa_starter_theme_license_callback_trigger_check' ));
        add_action('admin_notices', array($this, 'showThemeLizenzInfo'));
    }

    /**
     * =================================================
     * =========== REGISTER THEME ADMIN MENU ===========
     * =================================================
     */

    public function register_license_hupa_starter_theme(): void
    {
        $hook_suffix = add_menu_page(
            __('Theme aktivieren', 'bootscore'),
            __('Theme aktivieren', 'bootscore'),
            'manage_options',
            'hupa-starter-license',
            array($this, 'hupa_admin_starter_license'),
            'dashicons-admin-network', 2
        );
        add_action('load-' . $hook_suffix, array($this, 'hupa_starter_load_ajax_admin_options_script'));
    }

    public function hupa_admin_starter_license(): void
    {
        require 'activate-theme-page.php';
    }

    /**
     * =========================================
     * =========== ADMIN AJAX HANDLE ===========
     * =========================================
     */

    public function hupa_starter_load_ajax_admin_options_script(): void
    {
        add_action('admin_enqueue_scripts', array($this, 'load_hupa_starter_theme_admin_style'));
        $title_nonce = wp_create_nonce('theme_license_handle');
        wp_register_script('hupa-starter-ajax-script', '', [], '', true);
        wp_enqueue_script('hupa-starter-ajax-script');
        wp_localize_script('hupa-starter-ajax-script', 'license_obj', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => $title_nonce
        ));
    }

    /**
     * ==================================================
     * =========== THEME AJAX RESPONSE HANDLE ===========
     * ==================================================
     */

    public function prefix_ajax_HupaLicenceHandle(): void {
        $responseJson = null;
        check_ajax_referer( 'theme_license_handle' );
        require THEME_ADMIN_INC . 'license/starter-license-ajax.php';
        wp_send_json( $responseJson );
    }

    /*===============================================
       TODO GENERATE CUSTOM SITES
    =================================================
    */
    public function hupa_starter_license_site_trigger_check(): void {
        global $wp;
        $wp->add_query_var(  HUPA_THEME_SLUG );
    }

    function hupa_starter_theme_license_callback_trigger_check(): void {
        if ( get_query_var(  HUPA_THEME_SLUG ) ===  HUPA_THEME_SLUG ) {
            require 'api-request-page.php';
            exit;
        }
    }

    public function hupa_starter_theme_activation_hook() {
        if(!get_option('hupa_starter_product_install_authorize')) {
            $file = THEME_ADMIN_INC . 'register-hupa-starter-optionen.php';
            if(is_file($file)) {
               unlink($file);
            }
            delete_option('hupa_starter_product_install_authorize');
            delete_option('hupa_update_error_message');
            delete_option('hupa_product_install_time');
            delete_option('hupa_product_client_id');
            delete_option('hupa_product_client_secret');
            delete_option('hupa_access_token');
            delete_option('hupa_license_url');
            set_transient('show_theme_license_info', true, 5);

            update_option('hupa_wp_cache', 0);
            update_option('hupa_wp_debug', 0);
            update_option('hupa_wp_debug_log', 0);
            update_option('wp_debug_display', 0);
            update_option('hupa_wp_script_debug', 0);


            update_option('hupa_show_fatal_error', 0);
            update_option('hupa_db_repair', 0);

            update_option('rev_wp_aktiv', 1);
            update_option('hupa_revision_anzahl', 10);
            update_option('revision_interval', 60);

            update_option('trash_wp_aktiv', 1);
            update_option('hupa_trash_days', 30);

            update_option('ssl_login_aktiv', 0);
            update_option('admin_ssl_login_aktiv', 0);

            update_option('mu_plugin', 0);

        }
   }

    public function hupa_starter_theme_deactivated() {
       // delete_option('hupa_starter_product_install_authorize');
       // delete_option('hupa_product_client_secret');

        global $hupa_optionen_class;
        $msg = 'Version: ' . THEME_VERSION . ' Theme am '.date('d.m.Y \u\m H:i:s').' Uhr deaktiviert!';
        $hupa_optionen_class->apiSystemLog(HUPA_THEME_SLUG.'_deaktiviert', $msg);
        delete_option('hupa_wp_cache');
        delete_option('hupa_wp_debug');
        delete_option('hupa_wp_debug_log');
        delete_option('wp_debug_display');
        delete_option('hupa_wp_script_debug');
        delete_option('hupa_product_install_time');

        delete_option('hupa_show_fatal_error');
        delete_option('hupa_db_repair');

        delete_option('rev_wp_aktiv');
        delete_option('hupa_revision_anzahl');
        delete_option('revision_interval');

        delete_option('trash_wp_aktiv');
        delete_option('hupa_trash_days');

        delete_option('ssl_login_aktiv');
        delete_option('admin_ssl_login_aktiv');


    }

    public function showThemeLizenzInfo() {
        if(get_transient('show_theme_license_info')) {
            echo '<div class="error"><p>' .
                'HUPA Theme ungültige Lizenz: Zum Aktivieren geben Sie Ihre Zugangsdaten ein.'.
                '</p></div>';
        }
    }

    /**
     * ======================================================
     * =========== THEME CREATE / UPDATE OPTIONEN ===========
     * ======================================================
     */

    public function hupa_starter_theme_update_db(): void
    {
        if (get_option("theme_db_version") !== HUPA_STARTER_THEME_DB_VERSION) {
            apply_filters('theme_database_install', false);
            apply_filters('set_database_defaults', false);
            update_option("theme_db_version", HUPA_STARTER_THEME_DB_VERSION);
        }
    }

    /**
     * ====================================================
     * =========== THEME ADMIN DASHBOARD STYLES ===========
     * ====================================================
     */

    public function load_hupa_starter_theme_admin_style(): void
    {
        wp_enqueue_style('produkt-license-style', THEME_ADMIN_URL . 'inc/license/license-backend.css', array(), '');
        wp_enqueue_script( 'js-hupa-starter-license', THEME_ADMIN_URL . 'inc/license/license-script.js', array(), '', true );
    }
}

//REDIRECT ADMIN LOGIN
$menu_url = menu_page_url('hupa-starter-home', false);
if(!get_option('hupa_starter_product_install_authorize')) {
    add_filter('login_redirect', function ($url, $query, $user) {
        return admin_url('admin.php?page=hupa-starter-license');
    }, 10, 3);
}

$hupa_register_starter = RegisterHupaStarter::hupa_starter_instance();
if (!empty($hupa_register_starter)) {
    $hupa_register_starter->init_hupa_starter();
}
