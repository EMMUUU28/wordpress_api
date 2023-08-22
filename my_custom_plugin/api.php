<?php

#To get store name 
function store_name(){
    $name = get_bloginfo('name');
    return $name;
}

# To get plugin name and version
function plugin_info(){
    if ( ! function_exists( 'get_plugins' ) ) {
        require_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    
    $all_plugins = get_plugins();
    $plugins = get_plugins();

    $plugin_names = array();
    foreach ($plugins as $plugin_file => $plugin_data) {
        $plugin_names[] = esc_html($plugin_data['Name']) . ' - Version: ' . esc_html($plugin_data['Version']);
    }
    return $plugin_names;
}
 
#To get the  store information, should be called as:  add_action('init','storeinfo')
function storeinfo(){

    $store_name = get_bloginfo('url');
    // wp_send_json($products);
    // 
    $args = array(
        'status' => 'publish',
        'limit' => 10,
        'orderby' => 'date',
        'order' => 'desc',
    );
    $products = wc_get_products($args); //wp_get_products not working, need to configure 

    $response = array(
        'store_name' => $store_name,
        'products'=> $products,
    );
    
    return  json_encode($response);
    
}

#To get login credentials, should be called as:  add_action('init','storeinfo')
function get_user_login_info(){
  
    if (is_user_logged_in())
    {
        $current_user = wp_get_current_user();
    if ($current_user instanceof WP_User) {
        $user_info = $current_user->user_login;
        $user_pass = $current_user->user_pass;
        $user_email = $current_user->user_email;
        $user_url = $current_user->user_url;
       
        echo json_encode(array('user_info' => $user_info,'user_name'=>$user_pass,'user_email'=>$user_email,'user_url'=>$user_url));
        exit;
    }
  // Do the remaining stuff that has to happen once you've gotten your user info
    }
    else
    {
        echo json_encode("No user is currently logged in. ");
        exit;         // Remove this exit if you want to display the home page with login option

    }
}

# To get order details 
function order_details() {

    $args = array(
        'limit' => 1,      // Get latest 1 orders.
    );
    $orders = wc_get_orders( $args );
    $data = $orders[0];

    ?> <script> console.log('Orders are fetched succefully ')</script> <?php  

//    $order_id = $data->get_id(); // Assuming the class has a method to get the data ID
//    $order_status = $data->get_status();
//    $order_total = $data->get_total();
//    $customer_id = $data->get_customer_id();
//    $billing_first_name = $data->get_billing_first_name();
//    $billing_last_name = $data->get_billing_last_name();


//    $extracted_data = array(
//        "order_id" => $order_id,
//        "order_status" => $order_status,
//        "order_total" => $order_total,
//        "customer_id" => $customer_id,
//        "billing_first_name" => $billing_first_name,
//        "billing_last_name" => $billing_last_name,
//        // ... (similarly, add other properties)
//    );

//    $json_response = json_encode($extracted_data);
//    return $json_response;
 ?>  
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    var orderDetails = <?php echo $data?>;
    $.ajax({
        url: 'http://127.0.0.1:8000/orders/',
        type: 'POST',
        data: JSON.stringify(orderDetails),
        contentType: 'application/json',
        dataType: 'json',
        success: function (response) {
            console.log('orderDetails:', orderDetails);
            console.log('Data sent successfully to Django:',response);
        },
        error: function (xhr, status, error) {
            console.error('Error sending data to Django:', error);
        }
    });
    </script>
    <?php


}

function product_details(){
    $args = array(
        'status'            => array( 'draft', 'pending', 'private', 'publish' ),
        'type'              => array_merge( array_keys( wc_get_product_types() ) ),
        'parent'            => null,
        'sku'               => '',
        'category'          => array(),
        'tag'               => array(),
        'limit'             => -1,  // -1 for unlimited
        'offset'            => null,
        'page'              => 1,
        'include'           => array(),
        'exclude'           => array(),
        'orderby'           => 'date',
        'order'             => 'DESC',
        'return'            => 'objects',
        'paginate'          => false,  
        'shipping_class'    => array(),
    );


    $products=wc_get_products($args);
    $all_products=array();
    foreach( $products as $product ) {
        $all_products[] = $product->get_data();
        
    }
    echo json_encode($all_products);
    exit;


}

