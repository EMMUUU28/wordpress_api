<?php

require_once('/var/www/html/wordpress/wp-load.php');
require_once 'api.php';
require_once 'frontend.php';
/*
Plugin Name: My Custom Plugin Main
Plugin URI: https://www.example.com/my-custom-plugin
Description: A simple custom plugin to display a message on the front-end.
Version: 1.0
Author: Your Name
Author URI: https://www.example.com
License: GPLv2 or later
*/
// To chech weather the file api.php exists 
// if (file_exists(plugin_dir_path(__FILE__) . 'api.php')) {
//     echo 'api.php file exists and is being included successfully.';
// } else {
//     echo 'api.php file does not exist or there is an issue including it.';
// }


// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit;
}


# API Hooks 
if($_SERVER['REQUEST_METHOD'] === 'GET'){
    if(isset($_GET['action']) && $_GET['action'] === 'store_data'){
    
        $result = store_name();
        $plugin_data = plugin_info();
        $data=array();
        $data['result'] = $result;
        $data['plugin_data'] = $plugin_data;
        header('Content-Type: application/json');
        echo json_encode($data);

        exit;
    }
    else if(isset($_GET['action']) && $_GET['action'] === 'login_data'){

        header('Content-Type: application/json');
        add_action( 'plugins_loaded', 'get_user_login_info' );
    }
    else if(isset($_GET['action']) && $_GET['action'] === 'product_data'){

        header('Content-Type: application/json');
        add_action('wp_loaded','product_details'); 

    }
}

#To Display popup
add_action('wp_enqueue_scripts','popup');

#To get order details 
add_action( 'woocommerce_thankyou', 'order_details' );  






