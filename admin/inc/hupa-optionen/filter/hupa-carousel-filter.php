<?php


namespace Hupa\StarterTheme;

use http\Client;
use stdClass;

defined( 'ABSPATH' ) or die();

/**
 * ADMIN CAROUSEL HANDLE
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */

if ( ! class_exists( 'HupaStarterCarouselFilter' ) ) {
	add_action( 'after_setup_theme', array( 'Hupa\\StarterTheme\\HupaStarterCarouselFilter', 'init' ), 0 );

	class HupaStarterCarouselFilter {
		//STATIC INSTANCE
		private static $carousel_filter_instance;
		//OPTION TRAIT
		use HupaOptionTrait;
		use HupaCarouselTrait;

		/**
		 * @return static
		 */
		public static function init(): self {
			if ( is_null( self::$carousel_filter_instance ) ) {
				self::$carousel_filter_instance = new self;
			}

			return self::$carousel_filter_instance;
		}

		public function __construct() {

			//SET Carousel DEFAULTS
			add_filter( 'set_carousel_defaults', array( $this, 'hupa_set_carousel_defaults' ) );
			//SET Slider DEFAULTS
			add_filter( 'set_slider_defaults', array( $this, 'hupa_set_slider_defaults' ), 10, 2 );

			//get Carousel defaults
			add_filter( 'get_carousel_defaults', array( $this, 'hupa_get_carousel_defaults' ) );
			//get Slider defaults
			add_filter( 'get_slider_defaults', array( $this, 'hupa_get_slider_defaults' ) );
			//TODO get Slider data
			add_filter( 'get_carousel_data', array( $this, 'hupa_get_carousel_data' ), 10, 3 );
			//update Carousel
			add_filter( 'update_hupa_carousel', array( $this, 'hupa_update_hupa_carousel' ) );
			//TODO JOB Carousel RENDER DATA
			add_filter( 'get_carousel_komplett_data', array( $this, 'hupa_get_carousel_komplett_data' ) );
			//TODO DELETE Carousel mit Slider
			add_filter( 'delete_theme_carousel', array( $this, 'hupa_delete_theme_carousel' ) );
			//TODO UPDATE Slider
			add_filter( 'update_hupa_slider', array( $this, 'hupa_update_hupa_slider' ) );
			//TODO DELETE Slider
			add_filter( 'delete_hupa_slider', array( $this, 'hupa_delete_hupa_slider' ) );
			//TODO Update Slider Position
			add_filter( 'update_slider_position', array( $this, 'hupa_update_slider_position' ) );
			//Create Array for Slider
			add_filter( 'create_slider_array', array( $this, 'hupa_create_slider_array' ), 10, 3 );
			//GET SELECTOR
			add_filter( 'get_container_selector', array( $this, 'hupa_get_container_selector' ) );
			//GET SELECTOR
			add_filter( 'get_select_bg_carousel', array( $this, 'hupa_get_select_bg_carousel' ) );
		}

		final public function hupa_set_carousel_defaults( $record ): object {
			$return = new stdClass();
			global $wpdb;
			$table = $wpdb->prefix . $this->table_carousel;
			$wpdb->insert(
				$table,
				array(
					'aktiv'         => $record->aktiv,
					'bezeichnung'   => $record->bezeichnung,
					'controls'      => $record->controls,
					'indicator'     => $record->indicator,
					'data_animate'  => $record->data_animate,
					'data_autoplay' => $record->data_autoplay
				),
				array( '%d', '%s', '%d', '%d', '%d', '%d' )
			);
			if ( ! $wpdb->insert_id ) {
				$return->status = false;

				return $return;
			}
			$return->status = true;
			$return->id     = $wpdb->insert_id;

			return $return;
		}

		final public function hupa_update_hupa_carousel( $record ): void {
			global $wpdb;
			$table = $wpdb->prefix . $this->table_carousel;
			$wpdb->update(
				$table,
				array(
					'bezeichnung'      => $record->bezeichnung,
					'controls'         => $record->controls,
					'indicator'        => $record->indicator,
					'data_animate'     => $record->data_animate,
					'data_autoplay'    => $record->data_autoplay,
					'margin_aktiv'     => $record->margin_aktiv,
					'full_width'       => $record->full_width,
					'select_bg'        => $record->select_bg,
					'caption_bg'       => $record->caption_bg,
					'container_height' => $record->container_height,
				),
				array( 'id' => $record->id ),
				array( '%s', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%d', '%s' ),
				array( '%d' )
			);
		}

		final public function hupa_update_hupa_slider( $record ): void {
			global $wpdb;
			$table = $wpdb->prefix . $this->table_slider;
			$wpdb->update(
				$table,
				array(
					'img_id'        => $record->img_id,
					'img_size'      => $record->img_size,
					'font_color'    => $record->font_color,
					'aktiv'         => $record->aktiv,
					'caption_aktiv' => $record->caption_aktiv,
					'data_interval' => $record->data_interval,

					'data_alt'    => $record->data_alt,
					'first_ani'   => $record->first_ani,
					'first_font'  => $record->first_font,
					'first_style' => $record->first_style,
					'first_size'  => $record->first_size,

					'first_height'   => $record->first_height,
					'first_caption'  => $record->first_caption,
					'first_selector' => $record->first_selector,
					'first_css'      => $record->first_css,

					'second_ani'     => $record->second_ani,
					'second_font'    => $record->second_font,
					'second_style'   => $record->second_style,
					'second_size'    => $record->second_size,
					'second_height'  => $record->second_height,
					'second_caption' => $record->second_caption,
					'second_css'     => $record->second_css

				),
				array( 'id' => $record->id ),
				array(
					'%d',
					'%s',
					'%s',
					'%d',
					'%d',
					'%d',
					'%s',
					'%s',
					'%s',
					'%d',
					'%d',
					'%s',
					'%s',
					'%d',
					'%s',
					'%s',
					'%s',
					'%d',
					'%d',
					'%s',
					'%s',
					'%s'
				),
				array( '%d' )
			);
		}

		final public function hupa_update_slider_position( $record ): void {
			global $wpdb;
			$table = $wpdb->prefix . $this->table_slider;
			$wpdb->update(
				$table,
				array(
					'position' => $record->position
				),
				array( 'id' => $record->id ),
				array( '%d' ),
				array( '%d' )
			);
		}

		final public function hupa_get_carousel_data( string $getTable, $args = false, $fetchMethod = '' ): object {
			$return         = new stdClass();
			$return->status = false;
			$return->count  = 0;
			if ( ! $getTable ) {
				return $return;
			}

			global $wpdb;
			$fetchMethod ? $fetch = $fetchMethod : $fetch = 'get_results';
			$table  = $wpdb->prefix . $getTable;
			$result = $wpdb->$fetch( "SELECT * FROM {$table} {$args}" );

			if ( ! $result ) {
				return $return;
			}

			$return->status = true;
			if ( $fetch !== 'get_row' ) {
				$return->count = count( $result );
			}
			$return->record = $result;

			return $return;
		}

		final public function hupa_set_slider_defaults( $record, $position ): object {
			$return = new stdClass();
			global $wpdb;
			$table = $wpdb->prefix . $this->table_slider;
			$wpdb->insert(
				$table,
				array(
					'carousel_id'    => $record->carousel_id,
					'aktiv'          => $record->aktiv,
					'caption_aktiv'  => $record->caption_aktiv,
					'data_interval'  => $record->data_interval,
					'font_color'     => $record->font_color,
					'first_font'     => $record->first_font,
					'first_style'    => $record->first_style,
					'first_size'     => $record->first_size,
					'first_height'   => $record->first_height,
					'second_font'    => $record->second_font,
					'second_style'   => $record->second_style,
					'second_size'    => $record->second_size,
					'second_height'  => $record->second_height,
					'first_selector' => $record->first_selector,
					'position'       => $position

				),
				array( '%d', '%d', '%d', '%d', '%s', '%s', '%d', '%d', '%s', '%s', '%d', '%d', '%s', '%d', '%d' )
			);
			if ( ! $wpdb->insert_id ) {
				$return->status = false;

				return $return;
			}
			$return->status = true;
			$return->id     = $wpdb->insert_id;

			return $return;
		}

		final public function hupa_get_carousel_defaults( $args ): array {
			$data = $this->get_carousel_default_settings();

			return $data['carousel'];
		}

		final public function hupa_get_slider_defaults( $args ): array {
			$data = $this->get_carousel_default_settings();

			return $data['slider'];
		}

		final public function hupa_get_carousel_komplett_data( $args = false ): object {

			$responseJson = new stdClass();
			$carousel     = $this->hupa_get_carousel_data( 'hupa_carousel', '' . $args . ' ORDER BY created_at DESC' );
			if ( ! $carousel->status ) {
				$responseJson->status = false;
				$responseJson->msg    = apply_filters( 'get_theme_language', 'ajax-return-msg' )->language->no_data;

				return $responseJson;
			}

			$retArr = [];
			foreach ( $carousel->record as $tmp ) {
				$retItem  = [
					'id'               => $tmp->id,
					'aktiv'            => (bool) $tmp->aktiv,
					'bezeichnung'      => html_entity_decode( $tmp->bezeichnung ),
					'controls'         => (bool) $tmp->controls,
					'indicator'        => (bool) $tmp->indicator,
					'data_animate'     => $tmp->data_animate,
					'data_autoplay'    => (bool) $tmp->data_autoplay,
					'margin_aktiv'     => (bool) $tmp->margin_aktiv,
					'full_width'       => (bool) $tmp->full_width,
					'select_bg'        => $tmp->select_bg,
					'caption_bg'       => $tmp->caption_bg,
					'container_height' => $tmp->container_height,
					'slider'           => $this->render_slider_data( $tmp->id, $tmp->bezeichnung )
				];
				$retArr[] = $retItem;
			}

			$responseJson->animate      = apply_filters( 'get_animate_option', false );
			$responseJson->selector     = apply_filters( 'get_container_selector', false );
			$responseJson->familySelect = apply_filters( 'get_font_family_select', false );
			$responseJson->language     = apply_filters( 'get_theme_language', 'carousel' )->language;
			$responseJson->select_bg    = apply_filters( 'get_select_bg_carousel', false );
			$responseJson->record       = $retArr;
			$responseJson->status       = true;

			return $responseJson;
		}

		final public function hupa_delete_theme_carousel( $id ): void {
			global $wpdb;
			$table = $wpdb->prefix . $this->table_carousel;
			$wpdb->delete(
				$table,
				array(
					'id' => $id
				),
				array( '%d' )
			);
			$args   = sprintf( 'WHERE carousel_id=%d', $id );
			$slider = $this->hupa_get_carousel_data( 'hupa_slider', '' . $args . '' );
			$table  = $wpdb->prefix . $this->table_slider;
			if ( $slider->status ) {
				$args   = sprintf( 'WHERE carousel_id=%d', $id );
				$slider = $this->hupa_get_carousel_data( 'hupa_slider', '' . $args . '' );
				foreach ( $slider->record as $tmp ) {
					$this->hupa_delete_hupa_slider( $tmp->id );
				}
			}
		}

		final public function hupa_delete_hupa_slider( $id ): void {
			global $wpdb;
			$table = $wpdb->prefix . $this->table_slider;
			$wpdb->delete(
				$table,
				array(
					'id' => $id
				),
				array( '%d' )
			);
		}

		public function render_slider_data( $id, $carousel ): array {

			$args       = sprintf( 'WHERE carousel_id=%d ORDER BY position ASC', $id );
			$sliderData = apply_filters( 'get_carousel_data', 'hupa_slider', $args );
			$sliderArr  = [];
			if ( $sliderData->status ) {
				foreach ( $sliderData->record as $val ) {
					if ( $val->img_id ) {
						$loginLogo = wp_get_attachment_image_src( $val->img_id, 'full' );
						$img       = '<img class="img-fluid carousel-image" src ="' . $loginLogo[0] . '" width="200">';
					} else {
						$img = false;
					}
					$sliderItem  = $this->hupa_create_slider_array( $val, $img, $carousel );
					$sliderArr[] = $sliderItem;
				}
			}

			return $sliderArr;
		}

		final public function hupa_create_slider_array( $val, $img, $carousel ): array {

			return [
				'id'                  => $val->id,
				'img_id'              => html_entity_decode( $val->img_id ),
				'img'                 => $img,
				'img_size'            => html_entity_decode( $val->img_size ),
				'font_color'          => html_entity_decode( $val->font_color ),
				'position'            => $val->position,
				'carousel'            => $carousel,
				'aktiv'               => (bool) $val->aktiv,
				'caption_aktiv'       => (bool) $val->caption_aktiv,
				'data_interval'       => html_entity_decode( $val->data_interval ),
				'data_alt'            => html_entity_decode( $val->data_alt ),
				'first_ani'           => html_entity_decode( $val->first_ani ),
				'first_font'          => html_entity_decode( $val->first_font ),
				'first_style'         => $val->first_style,
				'first_size'          => $val->first_size,
				'first_height'        => $val->first_height,
				'first_caption'       => html_entity_decode( $val->first_caption ),
				'first_selector'      => html_entity_decode( $val->first_selector ),
				'first_css'           => html_entity_decode( $val->first_css ),
				'second_ani'          => html_entity_decode( $val->second_ani ),
				'second_font'         => html_entity_decode( $val->second_font ),
				'second_style'        => $val->second_style,
				'second_size'         => $val->second_size,
				'second_height'       => $val->second_height,
				'second_caption'      => html_entity_decode( $val->second_caption ),
				'second_css'          => html_entity_decode( $val->second_css ),
				'first_style_select'  => apply_filters( 'get_font_style_select', $val->first_font ),
				'second_style_select' => apply_filters( 'get_font_style_select', $val->second_font )
			];
		}

		final public function hupa_get_container_selector(): object {
			$selector = [
				'1' => 'carousel',
				'2' => 'h1',
				'3' => 'h2',
				'4' => 'h3',
				'5' => 'h4',
				'6' => 'h5',
				'7' => 'h6',
			];

			return (object) $selector;
		}

		final public function hupa_get_select_bg_carousel(): object {
			$selector = [
				'0' => __( 'no background', 'bootscore' ),
				'1' => __( 'light theme', 'bootscore' ),
				'2' => __( 'dark theme', 'bootscore' )
			];

			return (object) $selector;
		}
	}
}