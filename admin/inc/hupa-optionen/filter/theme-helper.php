<?php

namespace Hupa\StarterTheme;

use Exception;
use JetBrains\PhpStorm\ArrayShape;

defined('ABSPATH') or die();
/**
 * ADMIN THEME HELPER CLASS
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */

if (!class_exists('HupaStarterHelper')) {
    add_action('after_setup_theme', array('Hupa\\StarterTheme\\HupaStarterHelper', 'init'), 0);

    class HupaStarterHelper
    {
        //INSTANCE
        private static $theme_helper_instance;

        /**
         * @return static
         */
        public static function init(): self
        {
            if (is_null(self::$theme_helper_instance)) {
                self::$theme_helper_instance = new self;
            }

            return self::$theme_helper_instance;
        }

        /**
         * HupaStarterHelper constructor.
         */
        public function __construct()
        {

            //FILTER
            //TODO HELPER ARRAY TO OBJECT
            add_filter('arrayToObject', array($this, 'hupaArrayToObject'));
            add_filter('px_to_rem', array($this, 'hupa_px_to_rem'));
            add_filter('hupa_integer_to_hex', array($this, 'hupa_integer_to_hex'));
            add_filter('wp_get_attachment', array($this, 'hupa_wp_get_attachment'));
            add_filter('hupa_get_random_string', array($this, 'load_random_string'));
            add_filter('get_hupa_random_id', array($this, 'getHupaGenerateRandomId'), 10, 4);
            add_action('destroy_dir_recursive', array($this, 'destroyDirRecursive'));
            add_filter('user_roles_select', array($this, 'hupa_theme_user_roles_select'));
            add_filter('hupaObject2array', array($this, 'object2array_recursive'));

            add_filter('make_bootstrap_icon_json', array($this, 'create_bootstrap_icon_json'));

        }

        /**
         * @param $array
         *
         * @return object
         */
        final public function hupaArrayToObject($array): object
        {
            foreach ($array as $key => $value)
                if (is_array($value)) $array[$key] = self::hupaArrayToObject($value);
            return (object)$array;
        }

        /**
         * @param $px
         *
         * @return string
         */
        final public function hupa_px_to_rem($px): string
        {
            $record = 0.625 * $px / 10;
            return $record . 'rem';
        }

        /**
         * @param $number
         *
         * @return string
         */
        final public function hupa_integer_to_hex($number): string
        {
            $value = $number * 255 / 100;
            $opacity = dechex((int)$value);
            return str_pad($opacity, 2, 0, STR_PAD_RIGHT);
        }

        final public function hupa_wp_get_attachment($attachment_id): object
        {

            $attachment = get_post($attachment_id);
            $attach = array(
                'alt' => get_post_meta($attachment->ID, '_wp_attachment_image_alt', true),
                'caption' => $attachment->post_excerpt,
                'description' => $attachment->post_content,
                'href' => get_permalink($attachment->ID),
                'src' => $attachment->guid,
                'title' => $attachment->post_title
            );

            return (object)$attach;
        }

        /**
         * @throws Exception
         */
        function load_random_string($args = null): string
        {
            if (function_exists('random_bytes')) {
                $bytes = random_bytes(16);
                $str = bin2hex($bytes);
            } elseif (function_exists('openssl_random_pseudo_bytes')) {
                $bytes = openssl_random_pseudo_bytes(16);
                $str = bin2hex($bytes);
            } else {
                $str = md5(uniqid('hupa_wp_starter_theme', true));
            }
            return $str;
        }

        public function getHupaGenerateRandomId($passwordlength = 12, $numNonAlpha = 1, $numNumberChars = 4, $useCapitalLetter = true): string
        {
            $numberChars = '123456789';
            //$specialChars = '!$&?*-:.,+@_';
            $specialChars = '!$%&=?*-;.,+~@_';
            $secureChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz';
            $stack = $secureChars;
            if ($useCapitalLetter) {
                $stack .= strtoupper($secureChars);
            }
            $count = $passwordlength - $numNonAlpha - $numNumberChars;
            $temp = str_shuffle($stack);
            $stack = substr($temp, 0, $count);
            if ($numNonAlpha > 0) {
                $temp = str_shuffle($specialChars);
                $stack .= substr($temp, 0, $numNonAlpha);
            }
            if ($numNumberChars > 0) {
                $temp = str_shuffle($numberChars);
                $stack .= substr($temp, 0, $numNumberChars);
            }

            return str_shuffle($stack);
        }

        public function destroyDirRecursive($dir): bool
        {
            if (!is_dir($dir) || is_link($dir))
                return unlink($dir);

            foreach (scandir($dir) as $file) {
                if ($file == "." || $file == "..")
                    continue;
                if (!$this->destroyDirRecursive($dir . "/" . $file)) {
                    chmod($dir . "/" . $file, 0777);
                    if (!$this->destroyDirRecursive($dir . "/" . $file)) return false;
                }
            }
            return rmdir($dir);
        }

        public function hupa_theme_user_roles_select(): array
        {

            return [
                '1#read' => esc_html__('Subscriber', 'bootscore'),
                '2#edit_posts' => esc_html__('Contributor', 'bootscore'),
                '3#publish_posts' => esc_html__('Author', 'bootscore'),
                '4#publish_pages' => esc_html__('Editor', 'bootscore'),
                '5#manage_options' => esc_html__('Administrator', 'bootscore')
            ];
        }

        public function create_bootstrap_icon_json()
        {
            $reg_bs_json = THEME_AJAX_DIR . 'tools' . DIRECTORY_SEPARATOR . 'bsIcons.json';
            $bs_json = THEME_AJAX_DIR . 'tools' . DIRECTORY_SEPARATOR . 'bs-icons.json';
            $json_file = file_get_contents($reg_bs_json);
            $json_file = json_decode($json_file);
            $jsonArr = [];
            if ($json_file) {
                foreach ($json_file as $j) {
                    $json_item = [
                        'title' => $j[0]->content,
                        'code' => $j[1]->content,
                        'icon' => "bi bi-{$j[0]->content}"
                    ];
                    $jsonArr[] = $json_item;
                }
            }
            $jsonArr = json_encode($jsonArr, JSON_UNESCAPED_SLASHES);
            file_put_contents($bs_json, $jsonArr);

            $cheatSet = $reg_bs_json = THEME_AJAX_DIR . 'tools' . DIRECTORY_SEPARATOR . 'FontAwesomeCheats.txt';
            $fa_json = THEME_AJAX_DIR . 'tools' . DIRECTORY_SEPARATOR . 'fa-icons.json';
            $cheatSet = file_get_contents($cheatSet);

            $regEx = '/fa.*?\s/m';
            preg_match_all($regEx, $cheatSet, $matches, PREG_SET_ORDER, 0);

            $ico_arr = [];
            foreach ($matches as $tmp) {
                $icon = trim($tmp[0]);
                $regExp = sprintf('/%s.+?\[?x(.*?);\]/m', $icon);
                preg_match_all($regExp, $cheatSet, $matches1, PREG_SET_ORDER, 0);
                $ico_item = array(
                    'icon' => 'fa ' . $icon,
                    'title' => substr($icon, strpos($icon, '-') + 1),
                    'code' => $matches1[0][1]
                );
                $ico_arr[] = $ico_item;
            }

            $ico_arr = json_encode($ico_arr, JSON_UNESCAPED_SLASHES);
            file_put_contents($fa_json, $ico_arr);
        }

        public function object2array_recursive($object)
        {
            return json_decode(json_encode($object), true);
        }
    }
}