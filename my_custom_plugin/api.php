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
        header('Content-Type: application/json');
        echo json_encode(array('user_info' => $user_info,'user_name'=>$user_pass,'user_email'=>$user_email,'user_url'=>$user_url));
        exit;
    }
  // Do the remaining stuff that has to happen once you've gotten your user info
    }
    else
    {
        header('Content-Type: application/json');
        echo json_encode("No user is currently logged in. ");
        exit;         // Remove this exit if you want to display the home page with login option

    }
}



