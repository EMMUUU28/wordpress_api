# Wordpress Custom Hooks(Plugin)

This custom hook allows developers to add custom functionality related to retrieving store information. It provides a convenient way to extend the functionality of WordPress stores by executing custom code at specific points in the application flow.

Link to install Wordpress: https://vexxhost.com/resources/tutorials/how-to-install-wordpress-with-ubuntu-20-04-and-a-lamp-stack/

Here's a short description of each API function:

**store_name()**: This function retrieves the name of the WordPress store.

**plugin_info()**: This function retrieves information about the active plugins in the WordPress installation, including their names and versions.

**storeinfo()**: This function provides information about the store, including the store name (URL) and details of products available in the store.

**get_user_login_info()**: This function retrieves login information of the currently logged-in user, including their username, password, email, and URL.

**order_details()**: This function retrieves details of the latest order from WooCommerce, such as order ID, status, total, customer ID, and billing information. It includes a commented-out section that could be used to extract and return these details as JSON.

**product_details()**: This function retrieves details of all products available in the WooCommerce store, including their status, type, SKU, category, tags, etc., and returns them as JSON.

These functions seem to provide various functionalities related to retrieving information about the WordPress store, its users, orders, and products.

**To use this custom hook in a Django project, you can make HTTP requests to the WordPress site where the hook is defined, and handle the responses accordingly in your Django views or API endpoints.**
