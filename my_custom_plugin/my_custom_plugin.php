

<?php

require_once('/var/www/html/wordpress/wp-load.php');
$x = wp_get_current_user();
echo $x;
require_once 'api.php';
add_action('init', 'login');
add_action('init', 'storeinfo');
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

function get_user_info(){
    $current_user = wp_get_current_user(); 
  

    return json_encode($current_user->user_login);
  
    // Do the remaining stuff that has to happen once you've gotten your user info
  }

if($_SERVER['REQUEST_METHOD'] === 'GET')
{
    if(isset($_GET['action']) && $_GET['action'] === 'store_data'){
    

        $result = store_name();
        $plugin_data = plugin_info();
        $data=array();
        $data['result'] = $result;
        $data['plugin_data'] = $plugin_data;
        echo json_encode($data);
       
        exit;
    }
    else if(isset($_GET['login']))
    {
        ?> <script>console.log("<?php echo "hii" ?>")</script><?php
        $info=wp_get_current_user();

    }
    else if(isset($_GET['contact']))
    {
        ?> <script>console.log("Workingwell")</script><?php
    }
    
}


add_action( 'init', 'login' );

// Hook the function to a WordPress action.
// add_action('wp_footer', 'my_custom_message');

// AJAX Handler for 'get_store_info' action.
// add_action('wp_ajax_get_store_info', 'storeinfo');
// AJAX Handler for 'authenticate' action.

// add_action('init','plugin_details' );


//create an api where when called from a django project  it provides the data of the installed plugin 
