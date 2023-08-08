

<?php

require_once('/var/www/html/wordpress/wp-load.php');

require_once 'api.php';

/*
Plugin Name: My Custom Plugin Main
Plugin URI: https://www.example.com/my-custom-plugin
Description: A simple custom plugin to display a message on the front-end.
Version: 1.0
Author: Your Name
Author URI: https://www.example.com
License: GPLv2 or later
*/



// if (file_exists(plugin_dir_path(__FILE__) . 'api.php')) {
//     echo 'api.php file exists and is being included successfully.';
// } else {
//     echo 'api.php file does not exist or there is an issue including it.';
// }


// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}



if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'store_data'){
    

    $result = store_name();
    $plugin_data = plugin_info();
    $data=array();
    $data['result'] = $result;
    $data['plugin_data'] = $plugin_data;
    echo json_encode($data);
   
    exit;
}


// Hook the function to a WordPress action.
// add_action('wp_footer', 'my_custom_message');

// AJAX Handler for 'get_store_info' action.
// add_action('wp_ajax_get_store_info', 'storeinfo');
// AJAX Handler for 'authenticate' action.

// add_action('init','plugin_details' );


//create an api where when called from a django project  it provides the data of the installed plugin 
