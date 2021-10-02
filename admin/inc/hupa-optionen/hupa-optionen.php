<?php
defined( 'ABSPATH' ) or die();

/**
* HUPA OPTIONEN
* @package Hummelt & Partner WordPress Theme
* Copyright 2021, Jens Wiecker
* License: Commercial - goto https://www.hummelt-werbeagentur.de/
* https://www.hummelt-werbeagentur.de/
*/


//TODO HUPA OPTION TRAIT
require 'traits/HupaOptionTrait.php';
//TODO HUPA CAROUSEL TRAIT
require 'traits/HupaCarouselTrait.php';
//TODO INSTALL THEME DATABASE
require 'filter/database/hupa-theme-database.php';
//TODO INSTALL THEME OPTION FILTER
require 'filter/hupa-theme-option-filter.php';
//TODO CAROUSEL CLASS
require 'filter/hupa-carousel-filter.php';

//TODO FONT HANDLE CLASS
require 'font-handle/theme-fonts-handler.php';
//TODO AJAX LANGUAGE HANDLE CLASS
require 'filter/ajax-language/ajax-language-filter.php';
//TODO CSS GENERATOR CLASS
require 'filter/css-generator/css-generator-class.php';
//TODO FRONTEND CLASS
require 'filter/frontend/frontend-filter-class.php';
//TODO THEME HELPER
require 'filter/theme-helper.php';



//TODO FORMULAR CLASS
//require 'filter/hupa-formular-filter.php';
//TODO SMTP TEST
//require THEME_ADMIN_INC .'Mailer/smtp-test.php';
//TODO GET PAGE META DATA
//add_filter('hupa_get_smtp_test', 'hupa_load_smtp_test');



//TODO JOB THEME WIDGETS
require 'widgets/social-media-widget.php';

if(HUPA_SIDEBAR) {
//TODO JOB WARNING GUTENBERG SIDEBAR
//TODO GUTENBERG SIDEBAR
	require THEME_ADMIN_INC . 'hupa-gutenberg-sidebar/register-hupa-gutenberg-sidebar.php';
//TODO SIDEBAR ENDPOINT
	require THEME_ADMIN_INC . 'hupa-gutenberg-sidebar/sidebar-rest-endpoint.php';
//TODO JOB CLASSIC METABOX
	require THEME_ADMIN_INC . 'hupa-gutenberg-sidebar/classic-meta-box/classic-meta-box.php';
}
//TODO JOB SHORTCODES
require  'shortcode/hupa-carousel-shortcode.php';
//require  'shortcode/hupa-formular-shortcode.php';

//TODO WARNING JOB AKTIONEN

//TODO THEME OPTIONEN
require 'action/theme-options.php';
//TODO HTML Compression
require 'action/hupa-html-compression.php';

//Starter Theme GET HUPA THEME FUNCTION
function get_hupa_option($option)
{
	return apply_filters('get_hupa_option', $option);
}

//Starter Theme GET HUPA TOOLS FUNCTION
function get_hupa_tools($option)
{
	return apply_filters('get_hupa_tools', $option);
}

//Starter Theme GET HUPA FRONTEND FUNCTION
function get_hupa_frontend($type, $args = '')
{
	return apply_filters('get_hupa_frontend',$type, $args);
}








