

<?php

require_once 'api.php';

/*
Plugin Name: My Custom Plugin
Plugin URI: https://www.example.com/my-custom-plugin
Description: A simple custom plugin to display a message on the front-end.
Version: 1.0
Author: Your Name
Author URI: https://www.example.com
License: GPLv2 or later
*/




// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}


if($_SERVER['REQUEST_METHOD']=== 'GET' && isset($_GET['action']) && $_GET['action'] === 'store_data'){
    

    $result = store_name();
    $plugin_data = plugin_info();
    $data=array();
    $data['result'] = $result;
    $data['plugin_data'] = $plugin_data;
    echo json_encode($data);
   
    exit;
}
else {
    // Invalid API endpoint or request method
    http_response_code(404);
    echo json_encode(['error' => 'Invalid endpoint']);
    exit;
}

// Hook the function to a WordPress action.
// add_action('wp_footer', 'my_custom_message');

// AJAX Handler for 'get_store_info' action.
add_action('wp_ajax_get_store_info', 'storeinfo');
// AJAX Handler for 'authenticate' action.

// add_action('init','plugin_details' );


//create an api where when called from a django project  it provides the data of the installed plugin 