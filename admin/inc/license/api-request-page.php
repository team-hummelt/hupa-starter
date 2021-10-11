<?php
defined('ABSPATH') or die();

/**
 * REGISTER HUPA CUSTOM THEME
 * @package Hummelt & Partner WordPress Theme
 * Copyright 2021, Jens Wiecker
 * License: Commercial - goto https://www.hummelt-werbeagentur.de/
 * https://www.hummelt-werbeagentur.de/
 */


$data = json_decode(file_get_contents("php://input"));

if($data->client_id !== get_option('hupa_product_client_id')){
    $backMsg =  [
        'client_id' => get_option('hupa_product_client_id'),
        'reply' => 'falsche Client ID',
        'status' => false,
    ];
    echo json_encode($backMsg);
    exit();
}

switch ($data->make_id) {
    case '1':
        $message = json_decode($data->message);
        $backMsg =  [
            'client_id' => get_option('hupa_product_client_id'),
            'reply' => 'Theme deaktiviert',
            'status' => true,
        ];

        update_option('hupa_starter_message',$message->msg);
        delete_option('hupa_starter_product_install_authorize');
        delete_option('hupa_product_client_id');
        delete_option('hupa_product_client_secret');
        break;
    case'2':
        $message = json_decode($data->message);
        $backMsg = [
            'client_id' => get_option('hupa_product_client_id'),
            'reply' => 'Theme Datei gelöscht',
            'status' => true,
        ];
        update_option('hupa_starter_message',$message->msg);
        $file = HUPA_THEME_DIR . $data->aktivierung_path;
        unlink($file);
        delete_option('hupa_starter_product_install_authorize');
        delete_option('hupa_product_client_id');
        delete_option('hupa_product_client_secret');
        break;
    default:
        $backMsg = [
          'status' => false
        ];
}

$response = new stdClass();
if($data) {
    echo json_encode($backMsg);
}
