<?php
defined( 'ABSPATH' ) or die();
/**
 * REST API ENDPOINT
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */


//TODO JOB REST API ENDPOINT
add_action( 'rest_api_init', 'hupa_rest_endpoint_api_handle' );

function hupa_rest_endpoint_api_handle() {
	register_rest_route( 'hupa-endpoint/v1', '/method/(?P<method>[\S]+)', [
		'method'              => WP_REST_Server::EDITABLE,
		'permission_callback' => function () {
			return current_user_can( 'edit_posts' );
		},
		'callback'            => 'hupa_starter_rest_endpoint_get_response',
	] );
}


//TODO JOB RETURN ENDPOINT
function hupa_starter_rest_endpoint_get_response( $request ): WP_REST_Response {
	$method = $request->get_param( 'method' );
	if ( empty( $method ) ) {
		return new WP_REST_Response( [
			'message' => 'Method not found',
		], 400 );
	}
	$response = new stdClass();

	switch ( $method ) {
		case 'get_hupa_post_sidebar':

			//HEADER SELECT
			$headerArgs = array(
				'post_type'      => 'starter_header',
				'post_status'    => 'publish',
				'posts_per_page' => - 1
			);
			$header     = new WP_Query( $headerArgs );
			$headerArr  = [];
			foreach ( $header->posts as $tmp ) {

				$headerItem  = [
					'value' => $tmp->ID,
					'label' => $tmp->post_title
				];
				$headerArr[] = $headerItem;
			}

			$headerItem  = [
				'value' => 0,
				'label' => __( 'select', 'bootscore' ) .' ...'
			];
			$headerArr[] = $headerItem;
			sort( $headerArr );

			//FOOTER SELECT
			$footerArgs = array(
				'post_type'      => 'starter_footer',
				'post_status'    => 'publish',
				'posts_per_page' => - 1
			);
			$footer     = new WP_Query( $footerArgs );
			$footerArr  = [];
			foreach ( $footer->posts as $tmp ) {
				$footerItem  = [
					'value' => $tmp->ID,
					'label' => $tmp->post_title
				];
				$footerArr[] = $footerItem;
			}
			$footerItem  = [
				'value' => 0,
				'label' => __( 'select', 'bootscore' ) .' ...'
			];
			$footerArr[] = $footerItem;
			sort( $footerArr );


			$response->status     = true;
			$response->header     = $headerArr;
			$response->footer     = $footerArr;
			$response->topArea    = apply_filters('get_settings_menu_label','topArea');
			$response->menuSelect = apply_filters('get_settings_menu_label','mainMenu');
			$response->handyMenuSelect = apply_filters('get_settings_menu_label','handyMenu');
			break;
	}

	return new WP_REST_Response( $response, 200 );
}
