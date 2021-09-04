<?php

namespace Hupa\StarterTheme;

use JetBrains\PhpStorm\ArrayShape;

defined( 'ABSPATH' ) or die();
/**
 * ADMIN THEME HELPER CLASS
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */

if ( ! class_exists( 'HupaStarterHelper' ) ) {
	add_action( 'after_setup_theme', array( 'Hupa\\StarterTheme\\HupaStarterHelper', 'init' ), 0 );

	class HupaStarterHelper {
		//INSTANCE
		private static $theme_helper_instance;

		/**
		 * @return static
		 */
		public static function init(): self {
			if ( is_null( self::$theme_helper_instance ) ) {
				self::$theme_helper_instance = new self;
			}

			return self::$theme_helper_instance;
		}

		/**
		 * HupaStarterHelper constructor.
		 */
		public function __construct() {

			//FILTER
			//TODO HELPER ARRAY TO OBJECT
			add_filter( 'arrayToObject', array( $this, 'hupaArrayToObject' ));
			add_filter( 'px_to_rem', array( $this, 'hupa_px_to_rem' ));
			add_filter( 'hupa_integer_to_hex', array( $this, 'hupa_integer_to_hex' ));
			add_filter( 'wp_get_attachment', array( $this, 'hupa_wp_get_attachment' ));

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
		final public function hupa_px_to_rem( $px ): string {
			$record = 0.625 * $px / 10;
			return $record . 'rem';
		}

		/**
		 * @param $number
		 *
		 * @return string
		 */
		final public function hupa_integer_to_hex($number):string
		{
			$value =  $number * 255 / 100;
			$opacity = dechex((int) $value);
			return str_pad($opacity, 2, 0, STR_PAD_RIGHT);
		}

		#[ArrayShape( [ 'alt'         => "mixed",
		                'caption'     => "string",
		                'description' => "string",
		                'href'        => "false|string|\WP_Error",
		                'src'         => "string",
		                'title'       => "string"
		] )] final public function hupa_wp_get_attachment($attachment_id ): object {

			$attachment = get_post( $attachment_id );
			$attach = array(
				'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
				'caption' => $attachment->post_excerpt,
				'description' => $attachment->post_content,
				'href' => get_permalink( $attachment->ID ),
				'src' => $attachment->guid,
				'title' => $attachment->post_title
			);

			return (object) $attach;
		}
	}
}