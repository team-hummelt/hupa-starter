<?php

defined('ABSPATH') or die();

use Hupa\MenuOrder\HupaMenuOrder;
use Hupa\MenuOrder\HupaMenuOrderHelper;

/**
 * REGISTER HUPA CUSTOM THEME
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */

//WARNING JOB MENU ORDER
require 'class/class-order-core.php';
require 'class/class-order-helper.php';
require 'class/class-order-options.php';

global $hupa_menu_order;
$hupa_menu_order = HupaMenuOrder::instance();

global $hupa_menu_helper;
$hupa_menu_helper = HupaMenuOrderHelper::instance();

add_action('wp_loaded', 'initHupaMenuOrder');

function initHupaMenuOrder()
{
    global $hupa_menu_order;
    global $hupa_menu_helper;

    $options = $hupa_menu_helper->hupa_get_sort_options();
    if (is_admin()) {
        if (isset($options['capability']) && !empty($options['capability'])) {
            if (current_user_can($options['capability']))
                $hupa_menu_order->init();
        } else if (is_numeric($options['level'])) {
            if ($hupa_menu_helper->get_current_user_level(true) >= $options['level'])
                $hupa_menu_order->init();
        } else {
            $hupa_menu_order->init();
        }
    }
}