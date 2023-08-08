<?php


#To get store name 
function store_name()
{
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
 
#To get the  store information
function storeinfo(){

    $store_name = get_bloginfo('url');
    $user_info_object = wp_get_current_user();
    // wp_send_json($products);
    $useremail = $user_info_object->user_email;
    // 
    $args = array(
        'status' => 'publish',
        'limit' => 10,
        'orderby' => 'date',
        'order' => 'desc',
    );
    $products = wc_get_products($args);

    $response = array(
        'store_name' => $store_name,
        'user_email' => $useremail,
        'products'=> $products,
    );
    
    return json_encode($response);
    
}

#To get plugin ingo 
function plugin_details(){

    $store_name = get_bloginfo('name');
    $plugins = get_plugins();

    $plugin_names = array();
    foreach ($plugins as $plugin_file => $plugin_data) {
        $plugin_names[] = esc_html($plugin_data['Name']) . ' - Version: ' . esc_html($plugin_data['Version']);
    }
    ?>
    <script>

    console.log('<?php echo $store_name; ?>')
    var pluginNames = <?php echo json_encode($plugin_names); ?>;
    console.log('<?php echo json_encode($plugin_names); ?>');

    </script>
    <?php

}

#function to get login credentials 



function login()
{
    $user_info_object = wp_get_current_user();
    $useremail = $user_info_object->user_email;
    $username = $user_info_object->user_name;
    $response = array(
        'user_email' => $useremail,
        'user_name'=> $username,
    );

    return json_encode($response);

}


