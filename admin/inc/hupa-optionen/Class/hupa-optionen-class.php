<?php

namespace Hupa\Optionen;

use stdClass;

defined('ABSPATH') or die();

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

/**
 * REGISTER HUPA CUSTOM THEME
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */
final class HupaStarterThemeOptionen
{
    private static $instance;

    /**
     * @return static
     */
    public static function instance(): self
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }


    public function __construct()
    {

    }

    public function add_wp_config_put($slash, $const ,$bool)
    {
        $config = file_get_contents (ABSPATH . "wp-config.php");
        $config = preg_replace ("/^([\r\n\t ]*)(\<\?)(php)?/i", "<?php define('$const', $bool);", $config);

        file_put_contents (ABSPATH . $slash . "wp-config.php", $config);
    }

    public function wp_config_delete( $slash, $const,  $bool)
    {
        $config = file_get_contents (ABSPATH . "wp-config.php");
        //$config = preg_replace ("/( ?)(define)( ?)(\()( ?)(['\"])$const(['\"])( ?)(,)( ?)(0|1|true|false)( ?)(\))( ?);/i", "", $config);
        $config = preg_replace ("@( ?)(define)( ?)(\()( ?)([\'\"])$const([\'\"])( ?)(,)( ?)(0|1|true|false|\d{1,10})( ?)(\))( ?);@i", "", $config);
        $config = $this->clean_lines_wp_config($config);

        file_put_contents (ABSPATH . $slash . "wp-config.php", $config);
    }

    public function add_create_config_put($method, $msg, $bool):object {
        $return = new stdClass();
        $return->status = true;
        $this->delete_config_put($method, $msg, $bool);

        if ( file_exists (ABSPATH . "wp-config.php") && is_writable (ABSPATH . "wp-config.php") ){
            $this->add_wp_config_put('',"$method", $bool);
        }
        else if (file_exists (dirname (ABSPATH) . "/wp-config.php") && is_writable (dirname (ABSPATH) . "/wp-config.php")){
            $this->add_wp_config_put('',"$method" , $bool);
        }
        else {
            $return->msg = "$msg konnte nicht erstellt werden!";
            $return->status = false;
            return $return;
        }
        return $return;
    }

    public function delete_config_put($method, $msg, $bool):object
    {
        $return = new stdClass();
        $return->status = true;

        if (file_exists (ABSPATH . "wp-config.php") && is_writable (ABSPATH . "wp-config.php")) {
            $this->wp_config_delete('',"$method", $bool);
        }
        else if (file_exists (dirname (ABSPATH) . "/wp-config.php") && is_writable (dirname (ABSPATH) . "/wp-config.php")) {
            $this->wp_config_delete('/',"$method", $bool);
        }
        else if (file_exists (ABSPATH . "wp-config.php") && !is_writable (ABSPATH . "wp-config.php")) {
            $return->msg = "$msg konnte nicht gelöscht werden!";
            $return->status = false;
            return $return;
        }
        else if (file_exists (dirname (ABSPATH) . "/wp-config.php") && !is_writable (dirname (ABSPATH) . "/wp-config.php")) {
            $return->msg = "$msg konnte nicht gelöscht werden!";
            $return->status = false;
            return $return;
        }
        else {
            $return->msg = "$msg konnte nicht gelöscht werden!";
            $return->status = false;
            return $return;
        }

        return $return;
    }

    public function clean_lines_wp_config($config):string {
        return preg_replace('/^[\t ]*\n/im', '', $config);
    }

    public function theme_activate_mu_plugin(){


       //000-set-debug-level.php
        $muDir = ABSPATH . 'wp-content' . DIRECTORY_SEPARATOR . 'mu-plugins';
        if(!is_dir($muDir)){
            if(!mkdir($muDir, 0777 ,true)){
                return false;
            }
        }

        $filePath = $muDir . DIRECTORY_SEPARATOR . '000-set-debug-level.php';
        if(!is_file($filePath)) {
            file_put_contents($filePath, $this->create_mu_plugin());
        }
        return true;
    }

    public function theme_deactivate_mu_plugin(){
        $muDir = ABSPATH . 'wp-content' . DIRECTORY_SEPARATOR . 'mu-plugins';
        $filePath = $muDir . DIRECTORY_SEPARATOR . '000-set-debug-level.php';
        if(is_file($filePath)){
            unlink($filePath);
        }
    }

    protected function create_mu_plugin():string {
      $plugin = '
      <?php
        /**
        * Plugin Name: Hupa Control debug level
        */
        error_reporting( E_ERROR | E_PARSE | E_CORE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_RECOVERABLE_ERROR );';
        return preg_replace(array('/<!--(.*)-->/Uis', "/[[:blank:]]+/"), array('', ' '), str_replace(array("\n", "\r", "\t"), '', $plugin));
    }

    public function readLastLine($file):string
    {
        $linecontent = " ";
        $contents = file($file);
        $linenumber = sizeof($file)-1;
        $linecontet = $contents[$linenumber];
        unset($contents,$linenumber);
        return $linecontent;
    }

    public function unix_tail($lines,$file):string
    {
        shell_exec("tail -n $lines $file > /tmp/phptail_$file");
        $output = file_get_contents("/tmp/phptail_$file");
        unlink("/tmp/phptail_$file");
        return $output;
    }
}

global $hupa_optionen_class;
$hupa_optionen_class = HupaStarterThemeOptionen::instance();