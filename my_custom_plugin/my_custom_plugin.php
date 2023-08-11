

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
}

#To Display popup
add_action('init','popup');
add_action('init','order_details');


function orderid()
{
    if (isset($_GET['order-received'])) {
        // Get the order ID from the $_GET variable (for non-permalink structures)
        $order_id = absint($_GET['order-received']);
        return json_encode($order_id);
    }
    else{
        return json_encode("Not Found");
    }
}
$x=46;
function order_details($x)
{
    $arr=array();
    ?> 
    <script> console.log('<?php echo "h "?>')</script>

    <?php 
    
    $orders = wc_get_order($x);

    // ?> <script> console.log('hi')</script> <?php 
    echo json_encode($orders);
    // $billing_first_name= $order->billing_first_name;
   
    // $data =["billing_first_name"=>$billing_first_name];
   
}