<?php

/* Register API Function */

add_action('rest_api_init', 'wp_rest_api_reset_get_cart');
add_action('rest_api_init', 'wp_rest_api_add_to_cart');
add_action('rest_api_init', 'wp_rest_api_remove_to_cart');
add_action('rest_api_init', 'wp_rest_api_category_search');
add_action('rest_api_init', 'wp_rest_api_search_product_price_range');
add_action('rest_api_init', 'wp_rest_api_search_product_by_country');
add_action('rest_api_init', 'wp_rest_api_search_product_by_size');
add_action('rest_api_init', 'wp_rest_api_product_search');
add_action('rest_api_init', 'wp_rest_api_get_aucation');
add_action('rest_api_init', 'wp_rest_api_terms_doc_upload');
add_action('rest_api_init', 'wp_rest_api_terms_text');
add_action('rest_api_init', 'wp_rest_api_search_product_by_title');
add_action('rest_api_init', 'wp_rest_api_get_follower');
add_action('rest_api_init', 'wp_rest_api_get_product_artist_vice');
add_action('rest_api_init', 'wp_rest_api_user_login_endpoints');
add_action('rest_api_init', 'wp_rest_api_otp_send_again');
add_action('rest_api_init', 'wp_rest_api_user_endpoints');
add_action('rest_api_init', 'wp_rest_api_home_screen');
add_action('rest_api_init', 'wp_rest_api_otp_verification');
add_action('rest_api_init', 'wp_rest_api_user_id_verify');
add_action('rest_api_init', 'wp_rest_api_create_user');
add_action('rest_api_init', 'wp_rest_api_user_profile');
add_action('rest_api_init', 'wp_rest_api_create_post');
add_action('rest_api_init', 'wp_rest_api_add_favourite');
add_action('rest_api_init', 'wp_rest_api_get_post');
add_action('rest_api_init', 'wp_rest_api_create_product');
add_action('rest_api_init', 'wp_rest_api_update_product');
add_action('rest_api_init', 'wp_rest_api_get_product');
add_action('rest_api_init', 'wp_rest_api_get_product_detail');
add_action('rest_api_init', 'wp_rest_api_product_like');
add_action('rest_api_init', 'wp_rest_api_myfavourite_product');
add_action('rest_api_init', 'wp_rest_api_mycollection_product');
add_action('rest_api_init', 'wp_rest_api_following');
add_action('rest_api_init', 'wp_rest_api_get_following');
add_action('rest_api_init', 'wp_rest_api_get_product_category');
add_action('rest_api_init', 'wp_rest_api_get_is_follow');
add_action('rest_api_init', 'wp_rest_api_get_best_seller');
add_action('rest_api_init', 'wp_rest_api_artist_doc_verify');
add_action('rest_api_init', 'wp_rest_api_artist_biography');
add_action('rest_api_init', 'wp_rest_api_cart_related_product_list');
add_action('rest_api_init', 'wp_rest_api_get_notification');
add_action('rest_api_init', 'wp_rest_api_get_notification_count');
add_action('rest_api_init', 'wp_rest_api_test_nofication');
add_action('add_meta_boxes', 'global_notice_meta_box');
add_action('rest_api_init', 'wp_rest_api_forget_password');


/* Define API Route and Callback Functions */

function wp_rest_api_reset_get_cart()
{
    register_rest_route('wp/v1', 'get_cart', array(
        'methods' => 'POST',
        'callback' => 'get_cart',
    ));
}
function wp_rest_api_add_to_cart()
{
    register_rest_route('wp/v1', 'add_to_cart', array(
        'methods' => 'POST',
        'callback' => 'add_to_cart',
    ));
}
function wp_rest_api_remove_to_cart()
{
    register_rest_route('wp/v1', 'add_remove_cart', array(
        'methods' => 'POST',
        'callback' => 'add_remove_cart',
    ));
}
function wp_rest_api_category_search()
{
    register_rest_route('wp/v1', 'category_search', array(
        'methods' => 'POST',
        'callback' => 'category_search',
    ));
}
function wp_rest_api_search_product_price_range()
{
    register_rest_route('wp/v1', 'price_range_search', array(
        'methods' => 'POST',
        'callback' => 'price_range_search',
    ));
}
function wp_rest_api_search_product_by_country()
{
    register_rest_route('wp/v1', 'product_by_country', array(
        'methods' => 'POST',
        'callback' => 'product_by_country',
    ));
}
function wp_rest_api_search_product_by_size()
{
    register_rest_route('wp/v1', 'product_by_size', array(
        'methods' => 'POST',
        'callback' => 'product_by_size',
    ));
}
function wp_rest_api_search_product_by_title()
{
    register_rest_route('wp/v1', 'product_by_title', array(
        'methods' => 'POST',
        'callback' => 'product_by_title',
    ));
}
function wp_rest_api_product_search()
{
    register_rest_route('wp/v1', 'product_search', array(
        'methods' => 'POST',
        'callback' => 'product_search',
    ));
}
function wp_rest_api_get_aucation()
{
    register_rest_route('wp/v1', 'get_aucation', array(
        'methods' => 'POST',
        'callback' => 'get_aucation',
    ));
}
function wp_rest_api_terms_doc_upload()
{
    register_rest_route('wp/v1', 'terms_doc_upload', array(
        'methods' => 'POST',
        'callback' => 'terms_doc_upload',
    ));
}
function wp_rest_api_terms_text()
{
    register_rest_route('wp/v1', 'term_text', array(
        'methods' => 'POST',
        'callback' => 'term_text',
    ));
}
function wp_rest_api_get_product_artist_vice()
{
    register_rest_route('wp/v1', 'get_product_artist_vice', array(
        'methods' => 'POST',
        'callback' => 'get_product_artist_vice',
    ));
}
function wp_rest_api_get_is_follow()
{
    register_rest_route('wp/v1', 'get_is_follow', array(
        'methods' => 'POST',
        'callback' => 'get_is_follow',
    ));
}
function wp_rest_api_get_product_category()
{
    register_rest_route('wp/v1', 'get_product_category', array(
        'methods' => 'POST',
        'callback' => 'api_get_product_category',
    ));
}
function wp_rest_api_get_follower()
{
    register_rest_route('wp/v1', 'get_follower', array(
        'methods' => 'POST',
        'callback' => 'api_get_follower',
    ));
}
function wp_rest_api_user_login_endpoints()
{
    register_rest_route('wp/v1', 'users/user_login', array(
        'methods' => 'POST',
        'callback' => 'wc_rest_user_login',
    ));
}
function wp_rest_api_otp_send_again()
{
    register_rest_route('wp/v1', 'otp_send_again', array(
        'methods' => 'POST',
        'callback' => 'api_otp_send_again',
    ));
}
function wp_rest_api_user_endpoints()
{
    register_rest_route('wp/v1', 'users/user_register', array(
        'methods' => 'POST',
        'callback' => 'wc_rest_user_register',
    ));
}
function wp_rest_api_home_screen()
{
    register_rest_route('wp/v1', '/home_screen', array(
        'methods' => 'GET',
        'callback' => 'api_home_screen',
    ));
}
function wp_rest_api_otp_verification()
{
    register_rest_route('wp/v1', '/otp_verify', array(
        'methods' => 'POST',
        'callback' => 'api_otp_verify',
    ));
}
function wp_rest_api_user_id_verify()
{
    register_rest_route('wp/v1', '/user_id_verify', array(
        'methods' => 'POST',
        'callback' => 'api_user_id_verify',
    ));
}
function wp_rest_api_create_user()
{
    register_rest_route('wp/v1', '/create_user', array(
        'methods' => 'POST',
        'callback' => 'api_create_user',
    ));
}
function wp_rest_api_user_profile()
{
    register_rest_route('wp/v1', 'users/user_profile', array(
        'methods' => 'POST',
        'callback' => 'api_user_profile',
    ));
}
function wp_rest_api_create_post()
{
    register_rest_route('wp/v1', 'create_post', array(
        'methods' => 'POST',
        'callback' => 'api_create_post',
    ));
}
function wp_rest_api_add_favourite()
{
    register_rest_route('wp/v1', 'add_favourite', array(
        'methods' => 'POST',
        'callback' => 'api_add_favourite',
    ));
}
function wp_rest_api_get_post()
{
    register_rest_route('wp/v1', 'get_post', array(
        'methods' => 'POST',
        'callback' => 'api_get_post',
    ));
}
function wp_rest_api_create_product()
{
    register_rest_route('wp/v1', 'create_product', array(
        'methods' => 'POST',
        'callback' => 'REST_API_create_product',
    ));
}
function wp_rest_api_get_product()
{
    register_rest_route('wp/v1', 'get_product', array(
        'methods' => 'POST',
        'callback' => 'REST_API_get_product',
    ));
}
function wp_rest_api_get_product_detail()
{
    register_rest_route('wp/v1', 'get_product_detail', array(
        'methods' => 'POST',
        'callback' => 'REST_API_get_product_detail',
    ));
}
function wp_rest_api_product_like()
{
    register_rest_route('wp/v1', 'product_like', array(
        'methods' => 'POST',
        'callback' => 'REST_API_product_like',
    ));
}
function wp_rest_api_myfavourite_product()
{
    register_rest_route('wp/v1', 'myfavourite_product', array(
        'methods' => 'POST',
        'callback' => 'REST_API_myfavourite_product',
    ));
}
function wp_rest_api_mycollection_product()
{
    register_rest_route('wp/v1', 'mycollection_product', array(
        'methods' => 'POST',
        'callback' => 'REST_API_mycollection_product',
    ));
}
function wp_rest_api_following()
{
    register_rest_route('wp/v1', 'following', array(
        'methods' => 'POST',
        'callback' => 'REST_API_following',
    ));
}
function wp_rest_api_get_following()
{
    register_rest_route('wp/v1', 'get_following', array(
        'methods' => 'POST',
        'callback' => 'api_get_following',
    ));
}
function wp_rest_api_get_best_seller()
{
    register_rest_route('wp/v1', 'get_best_seller', array(
        'methods' => 'POST',
        'callback' => 'get_best_seller',
    ));
}
function wp_rest_api_update_product()
{
    register_rest_route('wp/v1', 'update_product', array(
        'methods' => 'POST',
        'callback' => 'api_update_product',
    ));
}
function wp_rest_api_artist_doc_verify()
{
    register_rest_route('wp/v1', 'artist_doc_verify', array(
        'methods' => 'POST',
        'callback' => 'api_artist_doc_verify',
    ));
}
function wp_rest_api_artist_biography()
{
    register_rest_route('wp/v1', 'artist_biography', array(
        'methods' => 'POST',
        'callback' => 'REST_API_artist_biography',
    ));
}
function wp_rest_api_cart_related_product_list()
{
    register_rest_route('wp/v1', 'cart_related_product_list', array(
        'methods' => 'POST',
        'callback' => 'REST_API_cart_related_product_list',
    ));
}
function wp_rest_api_get_notification()
{
    register_rest_route('wp/v1', 'get_notification', array(
        'methods' => 'POST',
        'callback' => 'REST_API_get_notification',
    ));
}
function wp_rest_api_get_notification_count()
{
    register_rest_route('wp/v1', 'get_notification_count', array(
        'methods' => 'POST',
        'callback' => 'REST_API_get_notification_count',
    ));
}
function wp_rest_api_test_nofication()
{
    register_rest_route('wp/v1', 'test_nofication', array(
        'methods' => 'POST',
        'callback' => 'REST_API_test_nofication',
    ));
}

function wp_rest_api_forget_password()
{
  register_rest_route('wp/v1', 'forget_password', array(
    'methods' => 'POST',
    'callback' => 'api_forget_password',
  ));
}

/* START Usefull Function For API */
function add_notification($sender_id, $receive_id, $post_id, $send_status, $type = "none", $massage)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'cst_notification';
    $result = $wpdb->get_results('select * from ' . $table_name . ' where send_user_id = ' . $sender_id . ' AND receive_user_id  = ' . $receive_id . ' AND post_id = ' . $post_id, ARRAY_A);
    $token = get_user_meta($receive_id, 'device_token', true);
    if (!empty($token))
    {
        REST_API_test_nofication($token, $massage);
    }
    if (count($result) < 1)
    {
        $wpdb->insert($table_name, array(
            'send_user_id' => $sender_id,
            'receive_user_id' => $receive_id,
            'post_id' => $post_id,
            'status' => $send_status,
            'text' => $massage,
            'create_at' => date('Y-m-d H:i:s') ,
            'update_at' => date('Y-m-d H:i:s')
        ));
    }

}
function get_notification($user_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'cst_notification';
    $result = $wpdb->get_results('select * from ' . $table_name . ' where send_user_id = ' . $sender_id . ' AND receive_user_id  = ' . $receive_id . ' AND post_id = ' . $post_id, ARRAY_A);
}
function get_notification_count($user_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'cst_notification';
    $result = $wpdb->get_results('select * from ' . $table_name . ' where receive_user_id  = ' . $user_id, ARRAY_A);
    return count($result);
}
function get_all_roles()
{
    global $wp_roles;
    if (!isset($wp_roles)) $wp_roles = new WP_Roles();

    return $wp_roles->get_names();
}
function get_is_follow($user_id, $vendor_id)
{

    $user_id = sanitize_text_field($_POST['user_id']);
    $vendor_id = sanitize_text_field($_POST['vendor_id']);
    global $wpdb;
    $results = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `user_id` = '" . $user_id . "' AND `meta_key` LIKE '%" . $vendor_id . "_follow%' AND `meta_value` = '1'");
    return $results;
}
function validate_mobile($mobile)
{
    return preg_match('/^[0-9]{10}+$/', $mobile);
}
function REST_is_logged_in($user_id)
{
    return get_user_meta($user_id, 'session_tokens', true);
}
function generateRandomString($length = 4)
{

    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0;$i < $length;$i++)
    {
        $randomString .= $characters[rand(0, $charactersLength - 1) ];
    }
    return $randomString;
}
function generatePassword($length = 8)
{

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0;$i < $length;$i++)
    {
        $randomString .= $characters[rand(0, $charactersLength - 1) ];
    }
    return $randomString;
}
function cst_image_upload($img)
{

    require_once (ABSPATH . 'wp-admin/includes/image.php');
    if (!function_exists('wp_handle_upload'))
    {
        require_once (ABSPATH . 'wp-admin/includes/file.php');
    }

    $attes_id = '';
    $name = $img['name'];
    $type = $img['type'];
    $tmp_name = $img['tmp_name'];
    $error = $img['error'];
    $size = $img['size'];

    $upload_data = array(
        'name' => $name,
        'type' => $type,
        'tmp_name' => $tmp_name,
        'error' => $error,
        'size' => $size
    );
    $uploaded_file = wp_handle_upload($upload_data, array(
        'test_form' => false
    ));

    if (isset($uploaded_file['file']))
    {
        $file_loc = $uploaded_file['file'];
        $file_name = basename($upload_data['name']);
        $file_type = wp_check_filetype($file_name);

        $attachment = array(
            'post_mime_type' => $file_type['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($file_name)) ,
            'post_content' => '',
            'post_status' => 'inherit'
        );

        $attach_id = wp_insert_attachment($attachment, $file_loc);
        $attach_data = wp_generate_attachment_metadata($attach_id, $file_loc);
        wp_update_attachment_metadata($attach_id, $attach_data);
        return $attach_id;
    }
    else
    {
        return false;
    }
}
function cst_get_cat_name($id)
{
    $categories = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]);
    foreach ($categories as $category)
    {
        if ($category->term_id == $id)
        {
            return $category->name;
        }
    }
}
function get_following_count($user_id)
{
    global $wpdb;
    if (empty($user_id))
    {
        return false;
    }
    $results = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `user_id` = '" . $user_id . "' AND `meta_key` LIKE '%_follow%' AND `meta_value` = '1'");
    return count($results);
}
function get_follower_count($user_id)
{
    global $wpdb;
    if (empty($user_id))
    {
        return false;
    }
    $results = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_key` LIKE '%" . $user_id . "_follow%' AND `meta_value` = '1'");
    return count($results);
}
function cst_image_upload_array($img)
{

    // echo "function";
    // print_r($img);
    require_once (ABSPATH . 'wp-admin/includes/image.php');
    $attes_id = array();
    // print_r($_FILES);
    $cnt = count($img['name']);
    for ($i = 0;$i < $cnt;$i++)
    {
        $name = $img['name'][$i];
        $type = $img['type'][$i];
        $tmp_name = $img['tmp_name'][$i];
        $error = $img['error'][$i];
        $size = $img['size'][$i];

        $upload_data = array(
            'name' => $name,
            'type' => $type,
            'tmp_name' => $tmp_name,
            'error' => $error,
            'size' => $size
        );
        $uploaded_file = wp_handle_upload($upload_data, array(
            'test_form' => false
        ));
        // print_r($uploaded_file);
        if (isset($uploaded_file['file']))
        {
            $file_loc = $uploaded_file['file'];
            $file_name = basename($upload_data['name']);
            $file_type = wp_check_filetype($file_name);

            $attachment = array(
                'post_mime_type' => $file_type['type'],
                'post_title' => preg_replace('/\.[^.]+$/', '', basename($file_name)) ,
                'post_content' => '',
                'post_status' => 'inherit'
            );

            $attach_id = wp_insert_attachment($attachment, $file_loc);
            $attach_data = wp_generate_attachment_metadata($attach_id, $file_loc);
            wp_update_attachment_metadata($attach_id, $attach_data);
            array_push($attes_id, $attach_id);
        }
    }
    return $attes_id;
}
function create_product($args)
{

    if (!function_exists('wc_get_product_object_type') && !function_exists('wc_prepare_product_attributes')) return false;

    // Get an empty instance of the product object (defining it's type)
    $product = wc_get_product_object_type($args['type']);
    if (!$product) return false;

    // Product name (Title) and slug
    $product->set_name($args['name']); // Name (title).
    if (isset($args['slug'])) $product->set_name($args['slug']);

    // Description and short description:
    $product->set_description($args['description']);
    $product->set_short_description($args['short_description']);

    // Status ('publish', 'pending', 'draft' or 'trash')
    $product->set_status(isset($args['status']) ? $args['status'] : 'publish');

    // Visibility ('hidden', 'visible', 'search' or 'catalog')
    $product->set_catalog_visibility(isset($args['visibility']) ? $args['visibility'] : 'visible');

    // Featured (boolean)
    $product->set_featured(isset($args['featured']) ? $args['featured'] : false);

    // Virtual (boolean)
    $product->set_virtual(isset($args['virtual']) ? $args['virtual'] : false);

    // Prices
    $product->set_regular_price($args['regular_price']);
    $product->set_sale_price(isset($args['sale_price']) ? $args['sale_price'] : '');
    $product->set_price(isset($args['sale_price']) ? $args['sale_price'] : $args['regular_price']);
    if (isset($args['sale_price']))
    {
        $product->set_date_on_sale_from(isset($args['sale_from']) ? $args['sale_from'] : '');
        $product->set_date_on_sale_to(isset($args['sale_to']) ? $args['sale_to'] : '');
    }

    // Downloadable (boolean)
    $product->set_downloadable(isset($args['downloadable']) ? $args['downloadable'] : false);
    if (isset($args['downloadable']) && $args['downloadable'])
    {
        $product->set_downloads(isset($args['downloads']) ? $args['downloads'] : array());
        $product->set_download_limit(isset($args['download_limit']) ? $args['download_limit'] : '-1');
        $product->set_download_expiry(isset($args['download_expiry']) ? $args['download_expiry'] : '-1');
    }

    // Taxes
    if (get_option('woocommerce_calc_taxes') === 'yes')
    {
        $product->set_tax_status(isset($args['tax_status']) ? $args['tax_status'] : 'taxable');
        $product->set_tax_class(isset($args['tax_class']) ? $args['tax_class'] : '');
    }

    // SKU and Stock (Not a virtual product)
    if (isset($args['virtual']) && !$args['virtual'])
    {
        $product->set_sku(isset($args['sku']) ? $args['sku'] : '');
        $product->set_manage_stock(isset($args['manage_stock']) ? $args['manage_stock'] : false);
        $product->set_stock_status(isset($args['stock_status']) ? $args['stock_status'] : 'instock');
        if (isset($args['manage_stock']) && $args['manage_stock'])
        {
            $product->set_stock_status($args['stock_qty']);
            $product->set_backorders(isset($args['backorders']) ? $args['backorders'] : 'no'); // 'yes', 'no' or 'notify'
            
        }
    }

    // Sold Individually
    $product->set_sold_individually(isset($args['sold_individually']) ? $args['sold_individually'] : false);

    // Weight, dimensions and shipping class
    $product->set_weight(isset($args['weight']) ? $args['weight'] : '');
    $product->set_length(isset($args['length']) ? $args['length'] : '');
    $product->set_width(isset($args['width']) ? $args['width'] : '');
    $product->set_height(isset($args['height']) ? $args['height'] : '');
    if (isset($args['shipping_class_id'])) $product->set_shipping_class_id($args['shipping_class_id']);

    // Upsell and Cross sell (IDs)
    $product->set_upsell_ids(isset($args['upsells']) ? $args['upsells'] : '');
    $product->set_cross_sell_ids(isset($args['cross_sells']) ? $args['upsells'] : '');

    // Attributes et default attributes
    if (isset($args['attributes'])) $product->set_attributes(wc_prepare_product_attributes($args['attributes']));
    if (isset($args['default_attributes'])) $product->set_default_attributes($args['default_attributes']); // Needs a special formatting
    // Reviews, purchase note and menu order
    $product->set_reviews_allowed(isset($args['reviews']) ? $args['reviews'] : false);
    $product->set_purchase_note(isset($args['note']) ? $args['note'] : '');
    if (isset($args['menu_order'])) $product->set_menu_order($args['menu_order']);

    // Product categories and Tags
    if (isset($args['category_ids'])) $product->set_category_ids($args['category_ids']);
    if (isset($args['tag_ids'])) $product->set_tag_ids($args['tag_ids']);

    // Images and Gallery
    $product->set_image_id(isset($args['image_id']) ? $args['image_id'] : "");
    $product->set_gallery_image_ids(isset($args['gallery_ids']) ? $args['gallery_ids'] : array());

    ## --- SAVE PRODUCT --- ##
    $product_id = $product->save();

    return $product_id;
}
function update_product($args)
{

    $product = wc_get_product($args['product_id']);
    if (!$product) return false;

    // Product name (Title) and slug
    $product->set_name($args['name']); // Name (title).
    if (isset($args['slug'])) $product->set_name($args['slug']);

    // Description and short description:
    $product->set_description($args['description']);
    $product->set_short_description($args['short_description']);

    // Status ('publish', 'pending', 'draft' or 'trash')
    $product->set_status(isset($args['status']) ? $args['status'] : 'publish');

    // Visibility ('hidden', 'visible', 'search' or 'catalog')
    $product->set_catalog_visibility(isset($args['visibility']) ? $args['visibility'] : 'visible');

    // Featured (boolean)
    $product->set_featured(isset($args['featured']) ? $args['featured'] : false);

    // Virtual (boolean)
    $product->set_virtual(isset($args['virtual']) ? $args['virtual'] : false);

    // Prices
    $product->set_regular_price($args['regular_price']);
    $product->set_sale_price(isset($args['sale_price']) ? $args['sale_price'] : '');
    $product->set_price(isset($args['sale_price']) ? $args['sale_price'] : $args['regular_price']);
    if (isset($args['sale_price']))
    {
        $product->set_date_on_sale_from(isset($args['sale_from']) ? $args['sale_from'] : '');
        $product->set_date_on_sale_to(isset($args['sale_to']) ? $args['sale_to'] : '');
    }

    // Downloadable (boolean)
    $product->set_downloadable(isset($args['downloadable']) ? $args['downloadable'] : false);
    if (isset($args['downloadable']) && $args['downloadable'])
    {
        $product->set_downloads(isset($args['downloads']) ? $args['downloads'] : array());
        $product->set_download_limit(isset($args['download_limit']) ? $args['download_limit'] : '-1');
        $product->set_download_expiry(isset($args['download_expiry']) ? $args['download_expiry'] : '-1');
    }

    // Taxes
    if (get_option('woocommerce_calc_taxes') === 'yes')
    {
        $product->set_tax_status(isset($args['tax_status']) ? $args['tax_status'] : 'taxable');
        $product->set_tax_class(isset($args['tax_class']) ? $args['tax_class'] : '');
    }

    // SKU and Stock (Not a virtual product)
    if (isset($args['virtual']) && !$args['virtual'])
    {
        $product->set_sku(isset($args['sku']) ? $args['sku'] : '');
        $product->set_manage_stock(isset($args['manage_stock']) ? $args['manage_stock'] : false);
        $product->set_stock_status(isset($args['stock_status']) ? $args['stock_status'] : 'instock');
        if (isset($args['manage_stock']) && $args['manage_stock'])
        {
            $product->set_stock_status($args['stock_qty']);
            $product->set_backorders(isset($args['backorders']) ? $args['backorders'] : 'no'); // 'yes', 'no' or 'notify'
            
        }
    }

    // Sold Individually
    $product->set_sold_individually(isset($args['sold_individually']) ? $args['sold_individually'] : false);

    // Weight, dimensions and shipping class
    $product->set_weight(isset($args['weight']) ? $args['weight'] : '');
    $product->set_length(isset($args['length']) ? $args['length'] : '');
    $product->set_width(isset($args['width']) ? $args['width'] : '');
    $product->set_height(isset($args['height']) ? $args['height'] : '');
    if (isset($args['shipping_class_id'])) $product->set_shipping_class_id($args['shipping_class_id']);

    // Upsell and Cross sell (IDs)
    $product->set_upsell_ids(isset($args['upsells']) ? $args['upsells'] : '');
    $product->set_cross_sell_ids(isset($args['cross_sells']) ? $args['upsells'] : '');

    // Attributes et default attributes
    if (isset($args['attributes'])) $product->set_attributes(wc_prepare_product_attributes($args['attributes']));
    if (isset($args['default_attributes'])) $product->set_default_attributes($args['default_attributes']); // Needs a special formatting
    // Reviews, purchase note and menu order
    $product->set_reviews_allowed(isset($args['reviews']) ? $args['reviews'] : false);
    $product->set_purchase_note(isset($args['note']) ? $args['note'] : '');
    if (isset($args['menu_order'])) $product->set_menu_order($args['menu_order']);

    // Product categories and Tags
    if (isset($args['category_ids'])) $product->set_category_ids($args['category_ids']);
    if (isset($args['tag_ids'])) $product->set_tag_ids($args['tag_ids']);

    // Images and Gallery
    $product->set_image_id(isset($args['image_id']) ? $args['image_id'] : "");
    $product->set_gallery_image_ids(isset($args['gallery_ids']) ? $args['gallery_ids'] : array());

    ## --- SAVE PRODUCT --- ##
    $product_id = $product->save();

    return $product_id;
}
function wc_get_product_object_type($type)
{
    // Get an instance of the WC_Product object (depending on his type)
    if (isset($args['type']) && $args['type'] === 'simple')
    {
        $product = new WC_Product_Simple(); // "simple" By default
        
    }
    elseif (isset($args['type']) && $args['type'] === 'grouped')
    {
        $product = new WC_Product_Grouped();
    }
    elseif (isset($args['type']) && $args['type'] === 'external')
    {
        $product = new WC_Product_External();
    }
    else
    {
        $product = new WC_Product_Variable();
    }

    if (!is_a($product, 'WC_Product')) return false;
    else return $product;
}
function wc_prepare_product_attributes($attributes)
{
    global $woocommerce;

    $data = array();
    $position = 0;

    foreach ($attributes as $taxonomy => $values)
    {
        if (!taxonomy_exists($taxonomy)) continue;

        // Get an instance of the WC_Product_Attribute Object
        $attribute = new WC_Product_Attribute();

        $term_ids = array();

        // Loop through the term names
        foreach ($values['term_names'] as $term_name)
        {
            if (term_exists($term_name, $taxonomy))
            // Get and set the term ID in the array from the term name
            $term_ids[] = get_term_by('name', $term_name, $taxonomy)->term_id;
            else continue;
        }

        $taxonomy_id = wc_attribute_taxonomy_id_by_name($taxonomy); // Get taxonomy ID
        $attribute->set_id($taxonomy_id);
        $attribute->set_name($taxonomy);
        $attribute->set_options($term_ids);
        $attribute->set_position($position);
        $attribute->set_visible($values['is_visible']);
        $attribute->set_variation($values['for_variation']);

        $data[$taxonomy] = $attribute; // Set in an array
        $position++; // Increase position
        
    }
    return $data;
}
function get_bee_image($user_id)
{
    $follower = get_follower_count($user_id);

    if (get_user_meta($user_id, 'artist_status', true) == true || get_user_meta($user_id, 'artist_status', true) == 'true')
    {
        if ($follower > 50000)
        {
            return home_url() . '/wp-content/uploads/2021/02/WhatsApp-Image-2020-11-22-at-22.27-1.png';
        }
        elseif ($follower > 5000)
        {
            return home_url() . '/wp-content/uploads/2021/02/WhatsApp-Image-2020-11-22-at-22.27-2.png';
        }
        else
        {
            return home_url() . '/wp-content/uploads/2021/02/WhatsApp-Image-2020-11-22-at-22.27-4.png';
        }
    }
    else
    {
        return home_url() . '/wp-content/uploads/2021/02/WhatsApp-Image-2020-11-22-at-22.27-7.png';
    }
}
function artist_doc_verify($user_id)
{

    $args = array(
        'author' => $user_id,
        'post_type' => 'user_docs',
        'order' => 'ASC',
        'posts_per_page' => 1,
    );

    $posts = get_posts($args);

    $status = false;
    foreach ($posts as $post)
    {

        if ($posts[0]->post_status == "publish")
        {
            $status = true;
        }
        else
        {
            $status = false;
        }
        break;
    }
    return $status;
}
function create_global_attribute($name, $slug)
{

    $taxonomy_name = wc_attribute_taxonomy_name($slug);

    if (taxonomy_exists($taxonomy_name))
    {
        return wc_attribute_taxonomy_id_by_name($slug);
    }

    //logg("Creating a new Taxonomy! `".$taxonomy_name."` with name/label `".$name."` and slug `".$slug.'`');
    $attribute_id = wc_create_attribute(array(
        'name' => $name,
        'slug' => $slug,
        'type' => 'select',
        'order_by' => 'menu_order',
        'has_archives' => false,
    ));

    //Register it as a wordpress taxonomy for just this session. Later on this will be loaded from the woocommerce taxonomy table.
    register_taxonomy($taxonomy_name, apply_filters('woocommerce_taxonomy_objects_' . $taxonomy_name, array(
        'product'
    )) , apply_filters('woocommerce_taxonomy_args_' . $taxonomy_name, array(
        'labels' => array(
            'name' => $name,
        ) ,
        'hierarchical' => true,
        'show_ui' => false,
        'query_var' => true,
        'rewrite' => false,
    )));

    //Clear caches
    delete_transient('wc_attribute_taxonomies');

    return $attribute_id;
}
function generate_attributes_list_for_product($rawDataAttributes)
{
    $attributes = array();

    $pos = 0;

    foreach ($rawDataAttributes as $name => $values)
    {
        if (empty($name) || empty($values)) continue;

        if (!is_array($values)) $values = array(
            $values
        );

        $attribute = new WC_Product_Attribute();
        $attribute->set_id(0);
        $attribute->set_position($pos);
        $attribute->set_visible(true);
        $attribute->set_variation(true);

        $pos++;

        //Look for existing attribute:
        $existingTaxes = wc_get_attribute_taxonomies();

        //attribute_labels is in the format: array("slug" => "label / name")
        $attribute_labels = wp_list_pluck($existingTaxes, 'attribute_label', 'attribute_name');
        $slug = array_search($name, $attribute_labels, true);

        if (!$slug)
        {
            //Not found, so create it:
            $slug = wc_sanitize_taxonomy_name($name);
            $attribute_id = create_global_attribute($name, $slug);
        }
        else
        {
            //Otherwise find it's ID
            //Taxonomies are in the format: array("slug" => 12, "slug" => 14)
            $taxonomies = wp_list_pluck($existingTaxes, 'attribute_id', 'attribute_name');

            if (!isset($taxonomies[$slug]))
            {
                //logg("Could not get wc attribute ID for attribute ".$name. " (slug: ".$slug.") which should have existed!");
                continue;
            }

            $attribute_id = (int)$taxonomies[$slug];
        }

        $taxonomy_name = wc_attribute_taxonomy_name($slug);

        $attribute->set_id($attribute_id);
        $attribute->set_name($taxonomy_name);
        $attribute->set_options($values);

        $attributes[] = $attribute;
    }

    return $attributes;
}
function get_attribute_term($value, $taxonomy)
{
    //Look if there is already a term for this attribute?
    $term = get_term_by('name', $value, $taxonomy);

    if (!$term)
    {
        //No, create new term.
        $term = wp_insert_term($value, $taxonomy);
        if (is_wp_error($term))
        {
            //logg("Unable to create new attribute term for ".$value." in tax ".$taxonomy."! ".$term->get_error_message());
            return array(
                'id' => false,
                'slug' => false
            );
        }
        $termId = $term['term_id'];
        $term_slug = get_term($termId, $taxonomy)->slug; // Get the term slug
        
    }
    else
    {
        //Yes, grab it's id and slug
        $termId = $term->term_id;
        $term_slug = $term->slug;
    }

    return array(
        'id' => $termId,
        'slug' => $term_slug
    );
}
function create_product_variation($product_id, $variation_data)
{
    // Get the Variable product object (parent)
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $product = wc_get_product($product_id);

    $variation_post = array(
        'post_title' => $product->get_name() ,
        'post_name' => 'product-' . $product_id . '-variation',
        'post_status' => 'publish',
        'post_parent' => $product_id,
        'post_type' => 'product_variation',
        'guid' => $product->get_permalink()
    );

    // Creating the product variation
    $variation_id = wp_insert_post($variation_post);

    // Get an instance of the WC_Product_Variation object
    $variation = new WC_Product_Variation($variation_id);

    // Iterating through the variations attributes
    foreach ($variation_data['attributes'] as $attribute => $term_name)
    {
        $taxonomy = 'pa_' . $attribute; // The attribute taxonomy
        // If taxonomy doesn't exists we create it (Thanks to Carl F. Corneil)
        if (!taxonomy_exists($taxonomy))
        {
            register_taxonomy($taxonomy, 'product_variation', array(
                'hierarchical' => false,
                'label' => ucfirst($attribute) ,
                'query_var' => true,
                'rewrite' => array(
                    'slug' => sanitize_title($attribute)
                ) , // The base slug
                
            ));
        }

        // Check if the Term name exist and if not we create it.
        if (!term_exists($term_name, $taxonomy)) wp_insert_term($term_name, $taxonomy); // Create the term
        $term_slug = get_term_by('name', $term_name, $taxonomy)->slug; // Get the term slug
        // Get the post Terms names from the parent variable product.
        $post_term_names = wp_get_post_terms($product_id, $taxonomy, array(
            'fields' => 'names'
        ));

        // Check if the post term exist and if not we set it in the parent variable product.
        if (!in_array($term_name, $post_term_names)) wp_set_post_terms($product_id, $term_name, $taxonomy, true);

        // Set/save the attribute data in the product variation
        update_post_meta($variation_id, 'attribute_' . $taxonomy, $term_slug);
    }

    ## Set/save all other data
    // SKU
    if (!empty($variation_data['sku'])) $variation->set_sku($variation_data['sku']);

    // Prices
    if (empty($variation_data['sale_price']))
    {
        $variation->set_price($variation_data['regular_price']);
    }
    else
    {
        $variation->set_price($variation_data['sale_price']);
        $variation->set_sale_price($variation_data['sale_price']);
    }
    $variation->set_regular_price($variation_data['regular_price']);

    // Stock
    if (!empty($variation_data['stock_qty']))
    {
        $variation->set_stock_quantity($variation_data['stock_qty']);
        $variation->set_manage_stock(true);
        $variation->set_stock_status('');
    }
    else
    {
        $variation->set_manage_stock(false);
    }

    $variation->set_weight(''); // weight (reseting)
    $variation->save(); // Save the data
    
}
function get_product_like($product_id)
{
    // $product_id = sanitize_text_field($_POST['product_id']);
    if (empty($product_id))
    {
        return false;
    }
    global $wpdb;
    $result = $wpdb->get_results("SELECT count(*) as count_like FROM `wp_usermeta` WHERE `meta_key` = '" . $product_id . "_like' AND `meta_value` = '1'");
    return $result[0]->count_like;

}
function REST_API_test_nofication($token, $message)
{
    define('API_ACCESS_KEY', 'AAAA_L9efDk:APA91bEsQsGfPfWY5RjhV-6TB_J-i1TdtsAG3-TrLVp2AmFBjdXPuwF6ikU2qY_0vF5t2HISZdCYJ8kcsArPV5yprtIgmHz0AdituFlKD13t7DKahunGasF97I2pODeLOriyb9YCc4Bz');
    $fcmUrl = 'https://fcm.googleapis.com/fcm/send';
    // $token = 'figRqhXwSXGaYQAUVAq4av:APA91bE_3x1NSs7OydKNakR4fXtW3qxKz14HBbh66b3PI3OcWM_BzWwRBqYqRyBRfpeP6inCiKd3u1_tW2DomSoPCIkpHUrwDY2W3S9GTJCkVH0kiceaCpPn5USNc3c-zKsZ3ByeO7WU';
    $notification = ['title' => 'ArtsBee', 'body' => $message, 'sound' => 'default'];
    $extraNotificationData = ["message" => $notification, "moredata" => 'dd'];

    $fcmNotification = [
    //'registration_ids' => $tokenList, //multple token array
    'to' => $token, //single token
    'notification' => $notification, 'data' => $extraNotificationData];

    $headers = ['Authorization: key=' . API_ACCESS_KEY, 'Content-Type: application/json'];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $fcmUrl);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
    $result = curl_exec($ch);
    curl_close($ch);

    // echo $result;
    
}
function total_sold($user_id)
{
    $args = array(
        'post_type' => array(
            'product',
            'product_variation'
        ) ,
        'author' => $user_id,
    );
    $products = new WP_Query($args);
    $total_sold = 0;
    if ($products->have_posts())
    {
        while ($products->have_posts())
        {
            $products->the_post();
            global $product;
            $total_sold += intval(get_post_meta(get_the_ID() , 'total_sales', true));
        }
    }
    else
    {
        return 0;
    }
    return $total_sold;
}
function global_notice_meta_box_callback($post)
{
    $author_id = $post->post_author;
    $doc_url_arr = get_user_meta($author_id, "user_docs_url", true);

    foreach ($doc_url_arr as $doc_url)
    {
        echo '<div id="myModal" class="modal"><a class="doc_view">Document View<object style="height:500px;display:none;width:100%;" id="pdf_view" data="<?=$doc_url?>"></object></a></div>';
    }

    echo "<script>jQuery(document).on('click','.doc_view',function(){jQuery('.doc_view #pdf_view').hide();jQuery(this).find('#pdf_view').show();});</script>";

}

/* END Usefull Function For API*/

function api_artist_doc_verify()
{

    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = false;
        $response['message'] = __("user id is required ", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $args = array(
        'post_type' => 'user_docs',
        'author' => $user_id,
        'post_status' => array(
            'publish',
            'pending',
            'draft',
            'auto-draft',
            'future',
            'private',
            'inherit',
            'trash'
        ) ,
    );

    $post_data = get_posts($args);
    if (!empty($post_data))
    {
        if ($post_data[0]->post_status == 'publish')
        {
            $response['success'] = true;
            $response['message'] = __("Get User Document status Successfully", "wp-rest-user");
            $response['data'] = true;
            $response['code'] = 400;
        }
        else
        {
            $response['success'] = true;
            $response['message'] = __("Get User Document status Successfully", "wp-rest-user");
            $response['data'] = false;
            $response['code'] = 400;
        }
    }
    else
    {
        $response['success'] = true;
        $response['message'] = __("Get User Document status Successfully", "wp-rest-user");
        $response['data'] = false;
        $response['code'] = 400;
    }

    return new WP_REST_Response($response, 200);
}
function wc_rest_user_login()
{
    $username = sanitize_text_field($_POST['mobile']);
    $password = sanitize_text_field($_POST['password']);

    $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
    $error = new WP_Error();

    if (empty($username))
    {
        $response['success'] = __("false");
        $response['message'] = __("Please Mobile No or User Name or Email ID", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (empty($password))
    {
        $response['success'] = __("false");
        $response['message'] = __("Password field is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (preg_match($pattern, $username) === 1)
    {

        global $wpdb;
        $result = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_key` = 'mobile_number' AND `meta_value` LIKE '%" . $username . "%'");
        $user = get_user_by('id', $result[0]->user_id);
        if (!empty($user))
        {
            $data = wp_authenticate($username, $password);
            if (count($data->errors) > 0 && !empty($data->errors))
            {
                foreach ($data->errors as $key => $value)
                {
                    $response['success'] = __("false");
                    $response['message'] = __("Invalid UserName OR  Password", "wp-rest-user");
                    $response['code'] = 400;
                    return new WP_REST_Response($response, 200);
                }
            }
            else
            {
                // echo "condition false";
                $manager = WP_Session_Tokens::get_instance($data->ID);
                $token = $manager->create(time() + 24 * 60 * 60 * 365);
                $response['success'] = __("true");
                $response['message'] = __("Login Successfully", "wp-rest-user");
                $response['token'] = $token;
                $response['code'] = 200;
                $response['role'] = implode('[]', $data->roles);

                $response['customer'] = $data->data;
                return new WP_REST_Response($response, 200);
            }
        }
        else
        {
            $response['success'] = __("false");
            $response['message'] = __("Email Not Found", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
    }
    else
    {
        if (validate_mobile($username))
        {
            global $wpdb;
            $result = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_value` LIKE '%" . $username . "%'");
            $data = get_user_by('id', $result[0]->user_id);
            if ($data)
            {

                $data = wp_authenticate($data->user_login, $password);

                if (count($data->errors) > 0 && !empty($data->errors))
                {
                    foreach ($data->errors as $key => $value)
                    {
                        $response['success'] = __("false");
                        $response['message'] = __($key, "wp-rest-user");
                        $response['code'] = 400;
                        return new WP_REST_Response($response, 200);
                    }
                }
                else
                {
                    $manager = WP_Session_Tokens::get_instance($data->ID);
                    $token = $manager->create(time() + 24 * 60 * 60 * 365);
                    $response['success'] = __("true");
                    $response['message'] = __("Login Successfully", "wp-rest-user");
                    $response['token'] = $token;
                    $response['code'] = 200;
                    $response['role'] = implode('[]', $data->roles);
                    $response['customer'] = $data->data;
                    return new WP_REST_Response($response, 200);
                }
            }
            else
            {
                $response['success'] = __("false");
                $response['message'] = __("Mobile number Wrong", "wp-rest-user");
                $response['code'] = 400;
                return new WP_REST_Response($response, 200);

            }
        }
        else
        {
            $data = wp_authenticate($username, $password);
            if (count($data->errors) > 0 && !empty($data->errors))
            {
                foreach ($data->errors as $key => $value)
                {
                    $response['success'] = __("false");
                    $response['message'] = __("Invalid UserName OR  Password", "wp-rest-user");
                    $response['code'] = 400;
                    return new WP_REST_Response($response, 200);
                }
            }
            else
            {
                $manager = WP_Session_Tokens::get_instance($data->ID);
                $token = $manager->create(time() + 24 * 60 * 60 * 365);
                $response['success'] = __("true");
                $response['message'] = __("Login Successfully", "wp-rest-user");
                $response['token'] = $token;
                $response['code'] = 200;
                $response['role'] = implode('[]', $data->roles);
                $response['customer'] = $data->data;
                return new WP_REST_Response($response, 200);
            }
        }
    }
}
function api_otp_send_again()
{
    $response = array();
    $user_phone = sanitize_text_field($_POST['user_phone']);
    $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

    if (empty($user_phone))
    {
        $response['success'] = __("false");
        $response['message'] = __("Phone Number is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (preg_match($pattern, $user_phone) === 1)
    {

        $to = $user_phone;
        $subject = 'OTP For Registration';

        /* Prepare HTML */
        $otp_number = generateRandomString();
        $message = "OTP is :" . $otp_number;

        $headers = 'From: webdevelopment8511@gmail.com' . "\r\n" . 'Reply-To: webdevelopment8511@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        /* Send Mail */
        $mail_status = mail($to, $subject, $message, $headers);

        if ($mail_status)
        {
            $key = 'OTP_' . $user_phone;
            update_option($key, $otp_number);

            if (!session_id())
            {
                session_start();
            }

            $_SESSION['user_otp'] = $key;

            $response['success'] = __("true");
            $response['message'] = __("OTP sent to your Mail", "wp-rest-user");
            $response['code'] = 200;
            return new WP_REST_Response($response, 200);
        }
        else
        {
            $response['success'] = __("false");
            $response['message'] = __("Try Again Please", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
    }
    else
    {
        if (validate_mobile($user_phone))
        {
            $response['success'] = __("true");
            $response['message'] = __("Currently Unable to Register via Mobile Number. Please Try With Email", "wp-rest-user");
            $response['code'] = 200;
            return new WP_REST_Response($response, 200);
        }
        else
        {
            $response['success'] = __("false");
            $response['message'] = __("Mobile number Wrong", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
    }

}
function wc_rest_user_register()
{

    $response = array();
    $user_phone = sanitize_text_field($_POST['user_phone']);
    $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

    if (empty($user_phone))
    {
        $response['success'] = __("false");
        $response['message'] = __("Phone Number is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (isset($_SESSION['user_otp']))
    {
        $response['success'] = __("false");
        $response['message'] = __("OTP already Send to your Mail", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (preg_match($pattern, $user_phone) === 1)
    {

        $exists = email_exists($user_phone);
        if ($exists)
        {
            $response['success'] = __("false");
            $response['message'] = __("Email Already exist", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);

        }
        else
        {

            $to = $user_phone;
            $subject = 'OTP For Registration';

            /* Prepare HTML */
            $otp_number = generateRandomString();
            $message = "OTP is :" . $otp_number;

            $headers = 'From: webdevelopment8511@gmail.com' . "\r\n" . 'Reply-To: webdevelopment8511@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

            /* Send Mail */
            $mail_status = mail($to, $subject, $message, $headers);

            if ($mail_status)
            {
                $key = 'OTP_' . $user_phone;
                update_option($key, $otp_number);

                if (!session_id())
                {
                    session_start();
                }

                if (!isset($_SESSION['user_otp']))
                {
                    $_SESSION['user_otp'] = $key;
                }

                $response['success'] = __("true");
                $response['message'] = __("OTP sent to your Mail", "wp-rest-user");
                $response['code'] = 200;
                return new WP_REST_Response($response, 200);
            }
            else
            {
                $response['success'] = __("false");
                $response['message'] = __("Try Again Please", "wp-rest-user");
                $response['code'] = 400;
                return new WP_REST_Response($response, 200);
            }
        }
    }
    else
    {
        if (validate_mobile($user_phone))
        {

            global $wpdb;
            $results = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_value` LIKE '%9876543210%'");
            if (count($results) >= 1)
            {
                $response['success'] = __("false");
                $response['message'] = __("Mobile Number Already Use", "wp-rest-user");
                $response['code'] = 200;
                return new WP_REST_Response($response, 200);

            }
            else
            {
                $response['success'] = __("true");
                $response['message'] = __("Currently Unable to Register via Mobile Number. Please Try With Email", "wp-rest-user");
                $response['code'] = 200;
                return new WP_REST_Response($response, 200);
            }
        }
        else
        {
            $response['success'] = __("false");
            $response['message'] = __("Mobile number Wrong", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
    }
}
function api_home_screen()
{
    $response['home_screen_text'] = get_option('home_screen_text');
    $response['home_screen_logo'] = home_url() . get_option('home_screen_logo');
    $response['home_screen_header_image'] = home_url() . get_option('home_screen_header_image');
    $response['success'] = __("true");
    $response['message'] = __("Home Screen data Fatch Successfully", "wp-rest-user");
    $response['code'] = 200;

    return new WP_REST_Response($response, 200);
}
function api_otp_verify()
{
    $user_phone = sanitize_text_field($_POST['user_phone']);
    $otp = sanitize_text_field($_POST['otp']);

    if (empty($user_phone))
    {
        $response['success'] = __("false");
        $response['message'] = __("Phone Number is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (empty($otp))
    {
        $response['success'] = __("false");
        $response['message'] = __("OTP is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $sent_otp = get_option('OTP_' . $user_phone);
    if ($sent_otp == $otp)
    {
        $response['success'] = __("true");
        $response['message'] = __("OTP Varified successfully", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    else
    {
        $response['success'] = __("false");
        $response['message'] = __("Invalid OTP", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
}
function api_user_id_verify()
{
    $user_name = sanitize_text_field($_POST['user_name']);

    if (empty($user_name))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (!username_exists($user_name))
    {
        $response['success'] = __("true");
        $response['message'] = __("Valid User ID", "wp-rest-user");
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);
    }
    else
    {
        $response['success'] = __("false");
        $response['message'] = __("User Id Already Exist", "wp-rest-user");
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);
    }
}
function api_create_user()
{
    $user_name = sanitize_text_field($_POST['user_name']);
    $role = sanitize_text_field($_POST['role']);
    $user_phone = sanitize_text_field($_POST['user_phone']);
    $country = sanitize_text_field($_POST['country']);
    $shipping_address = sanitize_text_field($_POST['shipping_address']);
    $device_token = sanitize_text_field($_POST['device_token']);
    $profile_image = $_FILES['profile_image'];

    $user_id = 0;

    global $wpdb;
    global $woocommerce;

    if (empty($role))
    {
        $response['success'] = __("false");
        $response['message'] = __("User Role is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (empty($user_phone))
    {
        $response['success'] = __("false");
        $response['message'] = __("Mobile is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (empty($user_name))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (empty($device_token))
    {
        $response['success'] = __("false");
        $response['message'] = __("User Device Token is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    // if (empty($country)){
    // 	$response['success'] = __("false");
    // 	$response['message'] = __("country is required.", "wp-rest-user");
    // 	$response['code'] = 400;
    // 	return new WP_REST_Response($response, 200);
    // }
    $get_all_role = get_all_roles();

    if (!array_key_exists(strtolower($role) , $get_all_role))
    {
        $response['success'] = __("false");
        $response['message'] = __("Role is Not Exist.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (strtolower($role) == 'collector')
    {
        if (empty($shipping_address))
        {
            $response['success'] = __("false");
            $response['message'] = __("shipping address ID is required.", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
    }

    if (empty($user_name))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $attach_id = cst_image_upload($profile_image);

    $password = generatePassword();
    if (!username_exists($user_name))
    {
        $user_id = wp_insert_user(array(
            'user_login' => $user_name,
            'user_pass' => $password,
            'role' => strtolower($role)
        ));
    }
    else
    {
        $response['success'] = __("false");
        $response['message'] = __("User Id Already Exist", "wp-rest-user");
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);
    }

    update_user_meta($user_id, $wpdb->get_blog_prefix() . 'user_avatar', $attach_id);
    update_user_meta($user_id, "_user_img_url", wp_get_attachment_url($attach_id));
    update_user_meta($user_id, "device_token", $device_token);

    // update_user_meta( $user_id,'shipping_address',$shipping_address);
    update_user_meta($user_id, 'mobile_number', $user_phone);
    $u = new WP_User($role);
    $u->set_role($role);

    if (!empty($user_id))
    {
        $to = $user_phone;
        $pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
        if (preg_match($pattern, $user_phone) === 1)
        {
            wp_update_user(array(
                'ID' => $user_id,
                'user_email' => $user_phone
            ));
        }

        $subject = 'Artist Login Detail';

        /* Prepare HTML */

        $message = "
		username : <b>" . $user_name . "</b> </br>
		password : <b>" . $password . "</b>";

        $headers = 'From: webdevelopment8511@gmail.com' . "\r\n" . 'Reply-To: webdevelopment8511@gmail.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();

        /* Send Mail */
        $mail_status = mail($to, $subject, $message, $headers);

        $response['success'] = __("true");
        $response['message'] = __("You are registered Successfully ", "wp-rest-user");
        $response['user_id'] = $user_id;
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);
    }
    else
    {
        $response['success'] = __("false");
        $response['message'] = __("Something Went Wrong", "wp-rest-user");
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);
    }
}
function api_user_profile()
{

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $user_id = sanitize_text_field($_POST['user_id']);

    if (!empty($user_id))
    {

        $user = get_user_by('id', $user_id);
        if ($user)
        {

            $profile_url = get_user_meta($user_id, "_user_img_url", true);
            if (empty($profile_url))
            {
                $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
            }
            if (in_array('artist', $user->roles))
            {
                $data['user_verify'] = artist_doc_verify($user_id);
                $data['bee'] = get_bee_image($user_id);
                $data['total_sold'] = total_sold($user_id);
                $data['satisfaction'] = '100%';
            }
            else if (in_array('collector', $user->roles))
            {

            }
            else if (in_array('amator', $user->roles))
            {

            }
            $data = (array)$user->data;

            unset($data["user_pass"]);
            unset($data["display_name"]);
            unset($data["user_nicename"]);
            unset($data["user_email"]);
            unset($data["user_url"]);
            unset($data["user_registered"]);
            unset($data["user_activation_key"]);
            unset($data["user_status"]);

            // $data['user_verify'] = artist_doc_verify($user_id);
            // $data['bee'] = get_bee_image($user_id);
            // $temp['total_sold'] = total_sold($user_id);
            // $data['user_temp'] = ;
            $data['role'] = $user->roles[0];
            if ($data['role'] == "artist")
            {
                $data['user_verify'] = artist_doc_verify($user_id);
                $data['bee'] = get_bee_image($user_id);
                $data['total_sold'] = total_sold($user_id);
            }
            $data['satisfaction'] = '100%';
            $data['profile_url'] = $profile_url;
            $data['following'] = get_following_count($user_id);
            $data['follower'] = get_follower_count($user_id);

            $response['success'] = __("true");
            $response['data'] = $data;
            $response['message'] = __("User .", "wp-rest-user");
            $response['code'] = 200;
            return new WP_REST_Response($response, 200);
        }
        else
        {
            $response['success'] = __("false");
            $response['message'] = __("User Not Found", "wp-rest-user");
            $response['code'] = 200;
            return new WP_REST_Response($response, 200);
        }
    }
    else
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID  is Required", "wp-rest-user");
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);
    }
}
function api_create_post()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    if (!empty($user_id))
    {
        $user = get_user_by('id', $user_id);
        $post_name = $_POST['post_name'];
        $post_title = $_POST['post_title'];
        $post_content = $_POST['post_content'];
        $media = $_FILES['media'];

        $post_id = wp_insert_post(array(
            'post_author' => $user_id,
            'post_name' => $post_title,
            'post_title' => $post_title,
            'post_status' => 'publish',
            'post_content' => $post_content,
            'post_type' => 'post'
        ));
        // var_dump($post_id);
        if (!empty($post_id))
        {
            foreach ($media as $img)
            {
                set_post_thumbnail($post_id, cst_image_upload($media));
            }
            $response['success'] = __("true");
            $response['data'] = $post_id;
            $response['message'] = __("POST Create Successfully", "wp-rest-user");
            $response['code'] = 200;
            return new WP_REST_Response($response, 200);
        }
    }
    else
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
}
function api_add_favourite()
{
    $activity_id = sanitize_text_field($_POST['activity_id']);
    $user_id = sanitize_text_field($_POST['user_id']);

    if (empty($activity_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("Activity ID is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (bp_activity_add_user_favorite($activity_id, $user_id))
    {
        $response['success'] = __("true");
        $response['message'] = __("Add Favorite Successfully", "wp-rest-user");
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);
    }
    else
    {
        $response['success'] = __("false");
        $response['message'] = __("Not Add In Favorite List", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
}
function api_get_post()
{
    global $wpdb;

    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    $results = get_posts();
    // print_r($results);
    // exit;
    $posts_arr = array();
    foreach ($results as $post)
    {
        $temp = array();
        $temp['ID'] = $post->ID;
        $temp['post_author'] = $post->post_author;
        $temp['post_date'] = $post->post_date;
        $temp['post_content'] = $post->post_content;
        $temp['post_title'] = $post->post_title;
        $temp['post_excerpt'] = $post->post_excerpt;
        $temp['post_name'] = $post->post_name;
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post['ID']) , 'single-post-thumbnail');
        $temp['image_url'] = $image[0];

        array_push($posts_arr, $temp);
    }

    $response['success'] = __("true");
    $response['data'] = $posts_arr;
    $response['message'] = __("Get Post Successfully", "wp-rest-user");
    $response['code'] = 200;
    return new WP_REST_Response($response, 200);

}
function REST_API_create_product()
{

    // print_r($_POST);
    // exit;
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    

    $frame_size = json_decode($_POST['frame_size']);
    $height = array();
    $width = array();
    $dimension = array();
    $dimension_type = array();
    $variation_list = array();

    if (!isset($_POST['name']) || empty($_POST['name']))
    {
        $response['success'] = __("false");
        $response['data'] = '';
        $response['message'] = __("name is required Field", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (!isset($_POST['regular_price']) || empty($_POST['regular_price']))
    {
        $response['success'] = __("false");
        $response['data'] = '';
        $response['message'] = __("regular_price is required Field", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (!isset($_POST['category_ids']) || empty($_POST['category_ids']))
    {
        $response['success'] = __("false");
        $response['data'] = '';
        $response['message'] = __("category id is required Field", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (!isset($_POST['user_id']) || empty($_POST['user_id']))
    {
        $response['success'] = __("false");
        $response['data'] = '';
        $response['message'] = __("user ID is required Field", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (!artist_doc_verify($_POST['user_id']))
    {
        $response['success'] = __("false");
        $response['data'] = '';
        $response['message'] = __("User's Document Not Verified", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (!isset($_POST['frame_size']) || empty($_POST['frame_size']))
    {
        $response['success'] = __("false");
        $response['data'] = '';
        $response['message'] = __("Frame Size is required Field", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $reviews_allowed = 'true';
    $regular_price = '';
    $status = 'publish';
    $slug = '';
    $featured = 'false';
    $visibility = '';
    $sale_price = '';
    $virtual = 'false';
    $sale_to = '';
    $sale_from = '';
    $downloads = '';
    $downloadable = 'false';
    $download_expiry = '';
    $download_limit = '';
    $manage_stock = 'true';
    $sku = '';
    $stock_qty = '10000';
    $stock_status = 'instock';
    $sold_individually = 'false';
    $backorders = 'no';
    $length = '';
    $weight = '';
    $height = '';
    $width = '';
    $note = '';
    $reviews = 'true';
    $tag_ids = '';
    $category_ids = '';
    $gallery_ids = '';
    $image_id = '';
    $size = '';
    $name = '';
    $description = '';
    $short_description = '';
    $user_id = '';
    $country = '';
    $measurment = '';
    $attr_width = '';
    $attr_height = '';
    $attr_dimension = '';
    $attr_measurement_type = '';
    $view_scale = '';
    $price_type = '';
    $image_credits = '';
    $signature = '';
    $edition = '';
    $medium = '';
    $date = '';
    $size = '';

    if (isset($_POST['name']) && !empty($_POST['name']))
    {
        $name = $_POST['name'];
    }
    if (isset($_POST['user_id']) && !empty($_POST['user_id']))
    {
        $user_id = $_POST['user_id'];
    }
    if (isset($_POST['description']) && !empty($_POST['description']))
    {
        $short_description = $_POST['description'];
    }
    if (isset($_POST['short_description']) && !empty($_POST['short_description']))
    {
        $short_description = $_POST['short_description'];
    }
    if (isset($_POST['reviews_allowed']) && !empty($_POST['reviews_allowed']))
    {
        $reviews_allowed = $_POST['reviews_allowed'];
    }
    if (isset($_POST['regular_price']) && !empty($_POST['regular_price']))
    {
        $regular_price = $_POST['regular_price'];
    }
    if (isset($_POST['status']) && !empty($_POST['status']))
    {
        $status = $_POST['status'];
    }
    if (isset($_POST['slug']) && !empty($_POST['slug']))
    {
        $slug = $_POST['slug'];
    }
    if (isset($_POST['featured']) && !empty($_POST['featured']))
    {
        $featured = $_POST['featured'];
    }
    if (isset($_POST['visibility']) && !empty($_POST['visibility']))
    {
        $visibility = $_POST['visibility'];
    }
    if (isset($_POST['sale_price']) && !empty($_POST['sale_price']))
    {
        $sale_price = $_POST['sale_price'];
    }
    if (isset($_POST['virtual']) && !empty($_POST['virtual']))
    {
        $virtual = $_POST['virtual'];
    }
    if (isset($_POST['sale_to']) && !empty($_POST['sale_to']))
    {
        $sale_to = $_POST['sale_to'];
    }
    if (isset($_POST['sale_from']) && !empty($_POST['sale_from']))
    {
        $sale_from = $_POST['sale_from'];
    }
    if (isset($_FILES['downloads[]']) && !empty($_FILES['downloads[]']))
    {
        $downloads = cst_image_upload_array($_FILES['downloads[]']);
    }
    if (isset($_POST['downloadable']) && !empty($_POST['downloadable']))
    {
        $downloadable = $_POST['downloadable'];
    }
    if (isset($_POST['download_expiry']) && !empty($_POST['download_expiry']))
    {
        $download_expiry = $_POST['download_expiry'];
    }
    if (isset($_POST['download_limit']) && !empty($_POST['download_limit']))
    {
        $download_limit = $_POST['download_limit'];
    }
    if (isset($_POST['manage_stock']) && !empty($_POST['manage_stock']))
    {
        $manage_stock = $_POST['manage_stock'];
    }
    if (isset($_POST['sku']) && !empty($_POST['sku']))
    {
        $sku = $_POST['sku'];
    }
    if (isset($_POST['stock_qty']) && !empty($_POST['stock_qty']))
    {
        $stock_qty = $_POST['stock_qty'];
    }
    if (isset($_POST['stock_status']) && !empty($_POST['stock_status']))
    {
        $stock_status = $_POST['stock_status'];
    }
    if (isset($_POST['sold_individually']) && !empty($_POST['sold_individually']))
    {
        $sold_individually = $_POST['sold_individually'];
    }
    if (isset($_POST['backorders']) && !empty($_POST['backorders']))
    {
        $backorders = $_POST['backorders'];
    }
    if (isset($_POST['length']) && !empty($_POST['length']))
    {
        $length = $_POST['length'];
    }
    if (isset($_POST['weight']) && !empty($_POST['weight']))
    {
        $weight = $_POST['weight'];
    }
    if (isset($_POST['height']) && !empty($_POST['height']))
    {
        $height = $_POST['height'];
    }
    if (isset($_POST['width']) && !empty($_POST['width']))
    {
        $width = $_POST['width'];
    }
    if (isset($_POST['note']) && !empty($_POST['note']))
    {
        $note = $_POST['note'];
    }
    if (isset($_POST['reviews']) && !empty($_POST['reviews']))
    {
        $reviews = $_POST['reviews'];
    }
    if (isset($_POST['tag_ids']) && !empty($_POST['tag_ids']))
    {
        $tag_ids = $_POST['tag_ids'];
    }
    if (isset($_POST['category_ids']) && !empty($_POST['category_ids']))
    {
        $category_ids = $_POST['category_ids'];
    }
    if (isset($_FILES['gallery_ids']) && !empty($_FILES['gallery_ids']))
    {
        $gallery_ids = cst_image_upload_array($_FILES['gallery_ids']);
    }
    if (isset($_FILES['image']) && !empty($_FILES['image']))
    {
        $image_id = cst_image_upload($_FILES['image']);
    }
    if (isset($_POST['size']) && !empty($_POST['size']))
    {
        $size = $_POST['size'];
    }
    if (isset($_POST['measurment']) && !empty($_POST['measurment']))
    {
        $measurment = $_POST['measurment'];
    }
    if (isset($_POST['country']) && !empty($_POST['country']))
    {
        $country = $_POST['country'];
    }

    if (isset($_POST['view_scale']) && !empty($_POST['view_scale']))
    {
        $view_scale = $_POST['view_scale'];
    }
    if (isset($_POST['price_type']) && !empty($_POST['price_type']))
    {
        $price_type = $_POST['price_type'];
    }
    if (isset($_POST['image_credits']) && !empty($_POST['image_credits']))
    {
        $image_credits = $_POST['image_credits'];
    }
    if (isset($_POST['signature']) && !empty($_POST['signature']))
    {
        $signature = $_POST['signature'];
    }
    if (isset($_POST['edition']) && !empty($_POST['edition']))
    {
        $edition = $_POST['edition'];
    }
    if (isset($_POST['medium']) && !empty($_POST['medium']))
    {
        $medium = $_POST['medium'];
    }
    if (isset($_POST['date']) && !empty($_POST['date']))
    {
        $date = $_POST['date'];
    }
    if (isset($_POST['size']) && !empty($_POST['size']))
    {
        $size = $_POST['size'];
    }

    $product_id = create_product(

    array(
        'type' => 'variable', // Simple product by default
        'name' => __($name, "woocommerce") ,
        'description' => __($description, "woocommerce") ,
        'short_description' => __($short_description, "woocommerce") ,
        'regular_price' => $regular_price,
        'reviews_allowed' => $reviews_allowed,
        'slug' => $slug,
        'status' => $status,
        'featured' => $featured,
        'virtual' => $virtual,
        'sale_price' => $sale_price,
        'sale_from' => $sale_from,
        'sale_to' => $sale_to,
        'downloadable' => $downloadable,
        'downloads' => $downloads,
        'download_limit' => $download_limit,
        'download_expiry' => $download_expiry,
        'sku' => str_replace('', '_', trim($name)) . generateRandomString() ,
        'manage_stock' => $manage_stock,
        'stock_status' => $stock_status,
        'stock_qty' => $stock_qty,
        'backorders' => $backorders,
        'sold_individually' => $sold_individually,
        'weight' => $weight,
        'length' => $length,
        'width' => $width,
        'height' => $height,
        'reviews' => $reviews,
        'note' => $note,
        'category_ids' => $category_ids,
        'tag_ids' => $tag_ids,
        'image_id' => $image_id,
        'gallery_ids' => $gallery_ids,
    ));

    $arg = array(
        'ID' => $product_id,
        'post_title' => $name,
        'post_author' => $user_id,
    );
    wp_update_post($arg);

    $pid = $product_id;

    if (!empty($country))
    {
        update_post_meta($product_id, 'country', strtolower($country));
    }
    if (!empty($view_scale))
    {
        update_post_meta($product_id, 'view_scale', strtolower($view_scale));
    }
    if (!empty($price_type))
    {
        update_post_meta($product_id, 'price_type', strtolower($price_type));
    }
    if (!empty($image_credits))
    {
        update_post_meta($product_id, 'image_credits', strtolower($image_credits));
    }
    if (!empty($signature))
    {
        update_post_meta($product_id, 'signature', strtolower($signature));
    }
    if (!empty($edition))
    {
        update_post_meta($product_id, 'edition', strtolower($edition));
    }
    if (!empty($medium))
    {
        update_post_meta($product_id, 'medium', strtolower($medium));
    }
    if (!empty($date))
    {
        update_post_meta($product_id, 'date', strtolower($date));
    }
    if (!empty($category_ids))
    {
        $category = get_term($category_ids, 'product_cat');
        wp_set_object_terms($product_id, $category->name, 'product_cat');
    }
    if (!empty($size))
    {
        update_post_meta($product_id, 'size', strtolower($size));
    }

    $size = $_POST['size'];

    /*---------------------------------------------------------------------------------------------------*/

    $frame_size = $_POST['frame_size'];
    $height = array();
    $width = array();
    $dimension = array();
    $dimension_type = array();
    $variation_list = array();

    for ($i = 0;$i < count($frame_size);$i++)
    {
        array_push($height, $frame_size[$i]['height']);
        array_push($width, $frame_size[$i]['width']);
        array_push($dimension, $frame_size[$i]['dimension']);
        array_push($dimension_type, $frame_size[$i]['measurement_type']);
    }

    $yourRawAttributeList = array(
        'height' => $height,
        'width' => $width,
        'dimension' => $dimension,
        'measurement_type' => $dimension_type,
    );
    // height,width,dimention,measurement
    $attribs = generate_attributes_list_for_product($yourRawAttributeList);

    $p = new WC_Product_Variable($product_id);

    $p->set_props(array(
        'attributes' => $attribs
    ));

    $product_id = $p->save();

    if ($product_id <= 0) return "Unable to create / update product!";

    foreach ($attribs as $attrib)
    {
        /** @var WC_Product_Attribute $attrib */
        $tax = $attrib->get_name();
        $vals = $attrib->get_options();

        $termsToAdd = array();

        if (is_array($vals) && count($vals) > 0)
        {
            foreach ($vals as $val)
            {
                //Get or create the term if it doesnt exist:
                $term = get_attribute_term($val, $tax);

                if ($term['id']) $termsToAdd[] = $term['id'];
            }
        }

        if (count($termsToAdd) > 0)
        {
            wp_set_object_terms($product_id, $termsToAdd, $tax, true);
        }
    }

    $parent_id = $pid; // Or get the variable product id dynamically
    for ($i = 0;$i < count($frame_size);$i++)
    {
        $variation_data2 = array(
            'attributes' => array(
                'height' => $frame_size[$i]['height'],
                'width' => $frame_size[$i]['width'],
                'dimension' => $frame_size[$i]['dimension'],
                'measurement_type' => $frame_size[$i]['measurement_type']
            ) ,
            'sku' => '',
            'regular_price' => $regular_price,
            'sale_price' => '',
            'stock_qty' => 100000,
        );
        create_product_variation($parent_id, $variation_data2);
    }
    $response['success'] = __("true");
    $response['data'] = $product_id;
    $response['message'] = __("Product Create Successfully", "wp-rest-user");
    $response['code'] = 200;
    return new WP_REST_Response($response, 200);
}
function REST_API_get_product()
{
    $args = array(
        'post_type' => 'product',
        'numberposts' => 10,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $user_id = 0;
    if (isset($_POST['user_id']) && !empty($_POST['user_id']))
    {
        $user_id = $_POST['user_id'];
    }
    $loop = new WP_Query($args);
    $data = array();
    while ($loop->have_posts()):
        $loop->the_post();
        global $product;
        $post_id = get_the_ID();
        $_temp = array();
        $image_url = array();
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
        array_push($image_url, $image[0]);
        $attachment_ids = $product->get_gallery_image_ids();
        $_temp = $product->get_data();
        foreach ($attachment_ids as $attachment_id)
        {
            array_push($image_url, wp_get_attachment_url($attachment_id));
        }
        $vendor_id = get_post_field('post_author', get_the_ID());

        $like_count = get_product_like(get_the_ID());
        if (empty($like_count))
        {
            $like_count = 0;
        }
        $user = "Admin";
        if (!empty($vendor_id))
        {
            $vendor = get_userdata($vendor_id);
            $user = $vendor->user_login;
        }

        $profile_url = get_user_meta($user
            ->data->ID, "_user_img_url", true);
        if (empty($profile_url))
        {
            $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
        }

        $follower = get_follower_count($user
            ->data
            ->ID);

        if ($follower == false || $follower == null || $follower == '')
        {
            $follower = 0;
        }
        $temp['follower'] = $follower;
        $variation_list = $product->get_available_variations();
        $variation_detail = array();
        foreach ($variation_list as $key => $variation)
        {
            array_push($variation_detail, $variation['attributes']);
        }
        $temp['height'] = $variation_detail[0]['attribute_pa_height'];
        $temp['width'] = $variation_detail[0]['attribute_pa_width'];
        $temp['dimension'] = $variation_detail[0]['attribute_pa_dimension'];
        $temp['measurement_type'] = $variation_detail[0]['attribute_pa_measurement_type'];
        $temp['total_sold'] = total_sold($vendor_id);
        $temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
        $temp['category_id'] = (string)$_temp['category_ids'][0];
        $temp['title'] = (string)$_temp['name'];
        $temp['product_id'] = (string)$_temp['id'];
        $temp['date_created'] = (string)$_temp['date_created']->date("Y");
        $temp['price'] = (string)$_temp['price'];
        $temp['short_description'] = (string)$_temp['short_description'];
        $temp['user_name'] = (string)$user;
        $temp['user_profile_url'] = (string)$profile_url;
        $temp['like_count'] = (string)$like_count;
        $temp['bee'] = get_bee_image($vendor_id);
        if (isset($user_id) && !empty($user_id))
        {
            $temp['current_user_follow'] = get_user_meta($user_id, $vendor_id . "_follow", true);
        }
        $temp['total_sold'] = total_sold($vendor_id);
        $temp['view_scale'] = get_post_meta($post_id, 'view_scale', true);
        $temp['price_type'] = get_post_meta($post_id, 'price_type', true);
        $temp['image_credits'] = get_post_meta($post_id, 'image_credits', true);
        $temp['signature'] = get_post_meta($post_id, 'signature', true);
        $temp['edition'] = get_post_meta($post_id, 'edition', true);
        $temp['medium'] = get_post_meta($post_id, 'medium', true);
        $temp['date'] = get_post_meta($post_id, 'date', true);

        if (empty($image_url) || $image_url == null || $image_url[0] == null || $image_url[0] == '')
        {
            $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
        }
        $temp['image_url'] = $image_url;
        array_push($data, $temp);

    endwhile;
    wp_reset_query();

    $response['success'] = __("true");
    $response['message'] = __("Get Product List  Successfully", "wp-rest-user");
    $response['code'] = 200;
    $response['data'] = $data;
    return new WP_REST_Response($response, 200);

}
function REST_API_get_product_detail()
{

    if (!is_admin())
    {
        require_once (ABSPATH . 'wp-admin/includes/post.php');
    }

    if (!isset($_POST['product_id']) || empty($_POST['product_id']))
    {
        $response['success'] = __("false");
        $response['data'] = '';
        $response['message'] = __("Prodocu ID is required Field", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (post_exists(get_the_title($_POST['product_id'])) <= 0)
    {
        $response['success'] = __("false");
        $response['message'] = __("Product Not Exist", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $user_id = 0;

    if (isset($_POST['user_id']) && !empty($_POST['user_id']))
    {
        $user_id = $_POST['user_id'];
    }

    $args = array(
        'post_type' => 'product',
        'p' => $_POST['product_id'],
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $loop = new WP_Query($args);
    $data = array();
    $response = array();
    while ($loop->have_posts()):
        $loop->the_post();
        global $product;
        $_temp = array();
        $image_url = array();
        $post_id = get_the_ID();
        $variation_array = array();

        $args = array(
            'post_type' => 'product_variation',
            'post_status' => array(
                'private',
                'publish'
            ) ,
            'numberposts' => - 1,
            'orderby' => 'menu_order',
            'order' => 'asc',
            'post_parent' => get_the_ID()
        );
        $variations = get_posts($args);
        $variation_array_temp = array();
        $variation_data = array();
        $variation_id_array = array();

        foreach ($variations as $variation)
        {
            array_push($variation_array_temp, explode(',', $variation->post_excerpt));
            array_push($variation_id_array, $variation->ID);
        }
        // print_r($variation_array_temp);
        foreach ($variation_array_temp as $key => $value)
        {
            foreach ($value as $key2 => $value2)
            {
                $temp_data = explode(':', $value2);
                $variation_data[$key][trim($temp_data[0]) ] = trim($temp_data[1]);
            }
            $variation_data[$key]['variant_id'] = $variation_id_array[$key];
        }

        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
        array_push($image_url, $image[0]);
        $attachment_ids = $product->get_gallery_image_ids();
        $_temp = $product->get_data();
        foreach ($attachment_ids as $attachment_id)
        {
            array_push($image_url, wp_get_attachment_url($attachment_id));
        }
        $vendor_id = get_post_field('post_author', get_the_ID());
        $like_count = get_product_like(get_the_ID());
        if (empty($like_count))
        {
            $like_count = 0;
        }
        $user = "Admin";
        if (!empty($vendor_id))
        {
            $vendor = get_userdata($vendor_id);
            $user = $vendor->user_login;
        }

        $profile_url = get_user_meta($user
            ->data->ID, "_user_img_url", true);

        if (empty($profile_url))
        {
            $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
        }
        $follower = get_follower_count($user
            ->data
            ->ID);

        if ($follower == false || $follower == null || $follower == '')
        {
            $follower = 0;
        }
        $temp['follower'] = $follower;
        $variation_list = $product->get_available_variations();
        // print_r($variation_list);
        $variation_detail = array();
        foreach ($variation_list as $key => $variation)
        {
            array_push($variation_detail, $variation['attributes']);
        }
        $temp['height'] = $variation_detail[0]['attribute_pa_height'];
        $temp['width'] = $variation_detail[0]['attribute_pa_width'];
        $temp['dimension'] = $variation_detail[0]['attribute_pa_dimension'];
        $temp['measurement_type'] = $variation_detail[0]['attribute_pa_measurement_type'];
        $temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
        $temp['category_id'] = (string)$_temp['category_ids'][0];
        $temp['product_id'] = (string)$_temp['id'];
        $temp['variation'] = $variation_data;
        $temp['title'] = (string)$_temp['name'];
        $temp['date_created'] = (string)$_temp['date_created']->date("Y");
        $temp['price'] = (string)$_temp['price'];
        $temp['user_name'] = (string)$user;
        $temp['short_description'] = (string)$_temp['short_description'];
        $temp['user_profile_url'] = (string)$profile_url;
        $temp['like_count'] = (string)$like_count;
        $temp['bee'] = get_bee_image($vendor_id);
        $temp['total_sold'] = total_sold($vendor_id);
        $temp['view_scale'] = get_post_meta($post_id, 'view_scale', true);
        $temp['price_type'] = get_post_meta($post_id, 'price_type', true);
        $temp['image_credits'] = get_post_meta($post_id, 'image_credits', true);
        $temp['signature'] = get_post_meta($post_id, 'signature', true);
        $temp['edition'] = get_post_meta($post_id, 'edition', true);
        $temp['medium'] = get_post_meta($post_id, 'medium', true);
        $temp['date'] = get_post_meta($post_id, 'date', true);
        if (!empty($user_id) && $user_id != 0)
        {
            if (get_user_meta($user_id, $product_id . '_like', true))
            {
                $temp['current_user_like'] = true;
            }
            else
            {
                $temp['current_user_like'] = false;
            }

        }
        if (empty($image_url) || $image_url == null || $image_url[0] == null || $image_url[0] == '')
        {
            $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
        }
        $temp['image_url'] = $image_url;
        array_push($data, $temp);
    endwhile;
    wp_reset_query();

    $response['success'] = __("true");
    $response['message'] = __("Get Product Detail  Successfully", "wp-rest-user");
    $response['code'] = 200;
    $response['data'] = $data;
    return new WP_REST_Response($response, 200);

}
function REST_API_product_like()
{
    // print_r($_POST);
    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    $product_id = sanitize_text_field($_POST['product_id']);
    if (empty($product_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("Product ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (get_user_meta($user_id, $product_id . '_like', true))
    {
        update_user_meta($user_id, $product_id . '_like', 0);
    }
    else
    {
        update_user_meta($user_id, $product_id . '_like', 1);
        $post = get_post($product_id);
        $vendor = get_userdata($post->post_author);
        $user_obj = get_user_by('id', $user_id);
        $massage = $user_obj->user_login . " Like Your Arts";
        add_notification($user_id, $vendor->ID, $product_id, false, 'Like', $massage);
    }
    $response['success'] = __("true");
    $response['message'] = __("Like Update Successfully", "wp-rest-user");
    $response['code'] = 200;
    return new WP_REST_Response($response, 200);
}
function REST_API_myfavourite_product()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    global $wpdb;
    $response_arr = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `user_id` = '" . $user_id . "' AND `meta_key` LIKE '%_like%' AND `meta_value` = '1'");
    $post_id_arr = array();
    foreach ($response_arr as $temp_new)
    {
        array_push($post_id_arr, explode('_', $temp_new->meta_key) [0]);
    }

    $args = array(
        'post_type' => 'product',
        'post__in' => $post_id_arr,
        'numberposts' => - 1,
        'orderby' => 'date',
        'order' => 'DESC'
    );
    $loop = new WP_Query($args);
    // print_r($loop);
    // exit;
    $data = array();

    while ($loop->have_posts()):
        $loop->the_post();

        global $product;
        $_temp = array();
        $image_url = array();
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
        array_push($image_url, $image[0]);
        $attachment_ids = $product->get_gallery_image_ids();
        $_temp = $product->get_data();
        // print_r($_temp);
        foreach ($attachment_ids as $attachment_id)
        {
            array_push($image_url, wp_get_attachment_url($attachment_id));
        }
        $vendor_id = get_post_field('post_author', get_the_ID());

        $like_count = get_product_like(get_the_ID());
        if (empty($like_count))
        {
            $like_count = 0;
        }
        $user = "Admin";
        if (!empty($vendor_id))
        {
            $vendor = get_userdata($vendor_id);
            $user = $vendor->user_login;
        }

        $temp['product_id'] = $_temp['id'];
        $temp['category'] = cst_get_cat_name($_temp['category_ids'][0]);
        $temp['title'] = $_temp['name'];
        $temp['date_created'] = $_temp['date_created']->date("Y");
        $temp['price'] = $_temp['price'];
        $temp['length'] = $_temp['length'];
        $temp['width'] = $_temp['width'];
        $temp['user_name'] = $user;
        $temp['user_id'] = $vendor_id;
        $temp['like_count'] = $like_count;
        $temp['bee'] = get_bee_image($vendor_id);
        if (empty($image_url) || $image_url == null || $image_url[0] == null || $image_url[0] == '')
        {
            $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
        }
        $temp['image_url'] = $image_url;
        array_push($data, $temp);

    endwhile;

    wp_reset_query();

    $response['success'] = __("true");
    $response['message'] = __("Get MyFavourite Product List  Successfully", "wp-rest-user");
    $response['code'] = 200;
    $response['data'] = $data;
    return new WP_REST_Response($response, 200);
}
function REST_API_mycollection_product()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    $args = array(
        'numberposts' => - 1,
        'meta_key' => '_customer_user',
        'meta_value' => $user_id,
        'post_type' => 'shop_order',
        'post_status' => array_keys(wc_get_is_paid_statuses()) ,
        'orderby' => 'date',
        'order' => 'DESC',
    );
    $data = array();
    $order_list = get_posts($args);

    foreach ($order_list as $order)
    {

        $order = new WC_Order($order->ID);
        $items = $order->get_items();
        foreach ($items as $item)
        {
            $product_name = $item['name'];
            $product = wc_get_product($item['product_id']);

            $_temp = array();
            $image_url = ''; //array();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
            if (!empty($image[0]))
            {
                // array_push($image_url,$image[0]);
                $image_url = $image[0];
            }
            $attachment_ids = $product->get_gallery_image_ids();
            $_temp = $product->get_data();

            foreach ($attachment_ids as $attachment_id)
            {
                $_prd_img_url = wp_get_attachment_url($attachment_id);
                if (!empty($_prd_img_url))
                {
                    array_push($image_url, $_prd_img_url);
                }
            }
            $vendor_id = get_post_field('post_author', get_the_ID());

            $like_count = get_product_like(get_the_ID());
            if (empty($like_count))
            {
                $like_count = 0;
            }
            $user = "Admin";
            if (!empty($vendor_id))
            {
                $vendor = get_userdata($vendor_id);
                $user = $vendor->user_login;
            }

            $temp['product_id'] = $_temp['id'];
            $temp['category_id'] = $_temp['category_ids'][0];
            $temp['category'] = cst_get_cat_name($_temp['category_ids'][0]);
            $temp['date_created'] = $_temp['date_created']->date("Y");
            $temp['price'] = $_temp['price'];
            $temp['length'] = $_temp['length'];
            $temp['width'] = $_temp['width'];
            $temp['user'] = $user;
            $temp['user_id'] = $vendor_id;
            $temp['like_count'] = $like_count;
            $temp['bee'] = get_bee_image($vendor_id);
            $temp['image_url'] = $image_url;
            // print_r($temp);
            array_push($data, $temp);
        }
    }

    wp_reset_query();

    $response['success'] = __("true");
    $response['message'] = __("Get MyCollection Product List  Successfully", "wp-rest-user");
    $response['code'] = 200;
    $response['data'] = $data;
    return new WP_REST_Response($response, 200);
}
function REST_API_following()
{
    // print_r($_POST);
    // exit;
    $current_user_id = sanitize_text_field($_POST['current_user_id']);
    $follow_user_id = sanitize_text_field($_POST['follow_user_id']);
    global $wpdb;

    if (empty($current_user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("Current User ID is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (empty($follow_user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("Follow User ID is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (get_user_meta($current_user_id, $follow_user_id . "_follow", true))
    {
        update_user_meta($current_user_id, $follow_user_id . "_follow", 0);
    }
    else
    {
        update_user_meta($current_user_id, $follow_user_id . "_follow", 1);
        $current_user_obj = get_user_by('id', $current_user_id);
        $follow_user_obj = get_user_by('id', $follow_user_id);
        $massage = $current_user_obj->user_login . " start Follwing You";
        add_notification($current_user_id, $follow_user_id, 0, false, 'Follwing', $massage);
    }

    $response['success'] = __("true");
    $response['data'] = '';
    $response['message'] = __("Update Following Successfully", "wp-rest-user");
    $response['code'] = 200;
    return new WP_REST_Response($response, 200);
}
function api_get_following()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    global $wpdb;

    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $results = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `user_id` = '" . $user_id . "' AND `meta_key` LIKE '%_follow%' AND `meta_value` = '1'");
    $user_arr = array();

    foreach ($results as $result)
    {
        $temp = array();
        $user = get_user_by('id', $result->user_id);
        $profile_url = get_user_meta($user
            ->data->ID, "_user_img_url", true);
        if (empty($profile_url))
        {
            $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
        }
        // $temp['user'] = $user;
        $temp['name'] = $user
            ->data->user_login;
        $temp['user_id'] = $user
            ->data->ID;
        $temp['profile_url'] = $profile_url;
        $temp['bee'] = get_bee_image($user
            ->data
            ->ID);
        array_push($user_arr, $temp);
    }
    if (empty($user_arr))
    {
        $response['success'] = __("false");
        $response['data'] = null;
        $response['message'] = __("No Following Found", "wp-rest-user");
        $response['code'] = 200;

    }
    else
    {
        $response['success'] = __("true");
        $response['data'] = $user_arr;
        $response['message'] = __("Get Following Successfully", "wp-rest-user");
        $response['code'] = 200;
    }
    return new WP_REST_Response($response, 200);
}
function api_get_follower()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    global $wpdb;

    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $results = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_key` LIKE '%" . $user_id . "_follow%' AND `meta_value` = '1'");
    // print_r($results);
    // exit;
    $user_arr = array();

    foreach ($results as $result)
    {
        $temp = array();
        $user = get_user_by('id', $result->user_id);
        $profile_url = get_user_meta($user
            ->data->ID, "_user_img_url", true);
        if (empty($profile_url))
        {
            $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
        }
        // $temp['user'] = $user;
        $temp['name'] = $user
            ->data->user_login;
        $temp['user_id'] = $user
            ->data->ID;
        $temp['profile_url'] = $profile_url;
        $temp['bee'] = get_bee_image($user
            ->data
            ->ID);
        array_push($user_arr, $temp);
    }

    if (empty($user_arr))
    {
        $response['success'] = __("false");
        $response['data'] = null;
        $response['message'] = __("No Follower Found", "wp-rest-user");
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);

    }
    else
    {
        $response['success'] = __("true");
        $response['data'] = $user_arr;
        $response['message'] = __("Get follower Successfully", "wp-rest-user");
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);
    }

}
function get_product_category()
{
    $cat = array();
    $categories = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]);
    foreach ($categories as $category)
    {
        $temp['id'] = $category->term_id;
        $temp['name'] = $category->name;
        array_push($cat, $temp);
    }

    return $cat;
}
function api_get_product_category()
{
    $cat = array();
    $categories = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]);
    foreach ($categories as $category)
    {
        $temp['id'] = $category->term_id;
        $temp['name'] = $category->name;
        array_push($cat, $temp);
    }

    $response['success'] = __("true");
    $response['data'] = $cat;
    $response['message'] = __("Get Product Category Successfully", "wp-rest-user");
    $response['code'] = 200;
    return new WP_REST_Response($response, 200);
}
function get_product_artist_vice()
{

    $users = get_users(array(
        'fields' => array(
            'ID'
        )
    ));
    $artist = array();
    foreach ($users as $user_id)
    {
        $user = get_user_by('id', $user_id->ID);
        if (in_array('artist', $user->roles) || in_array('administrator', $user->roles))
        {
            $profile_url = get_user_meta($user_id->ID, "_user_img_url", true);
            if (empty($profile_url))
            {
                $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
            }

            $temp = (array)$user->data;

            unset($temp["user_pass"]);
            unset($temp["display_name"]);
            unset($temp["user_nicename"]);
            unset($temp["user_email"]);
            unset($temp["user_url"]);
            unset($temp["user_registered"]);
            unset($temp["user_activation_key"]);
            unset($temp["user_status"]);
            $temp['bee'] = get_bee_image($user
                ->data
                ->ID);
            $temp['profile_url'] = get_bee_image($user
                ->data
                ->ID);
            $temp['role'] = $user->roles[0];
            $follower = get_follower_count($user
                ->data
                ->ID);

            if ($follower == false || $follower == null || $follower == '')
            {
                $follower = 0;
            }
            $temp['follower'] = $follower;
            $products = wc_get_products(array(
                'status' => 'publish',
                'limit' => - 1,
                'orderby' => 'date_created',
                'order' => 'ASC',
                'author' => $user->ID
            ));
            if (!empty($products))
            {
                $temp['product'] = array();
                foreach ($products as $product)
                {
                    $_temp = array();
                    $image_url = array();
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
                    if (!empty($image[0]))
                    {
                        array_push($image_url, $image[0]);
                    }
                    $attachment_ids = $product->get_gallery_image_ids();
                    $_temp = $product->get_data();

                    foreach ($attachment_ids as $attachment_id)
                    {
                        array_push($image_url, wp_get_attachment_url($attachment_id));
                    }
                    $vendor_id = get_post_field('post_author', $_temp['id']);

                    $like_count = get_product_like($_temp['id']);
                    if (empty($like_count))
                    {
                        $like_count = 0;
                    }

                    $product_temp['product_id'] = (string)$_temp['id'];
                    $product_temp['name'] = (string)$_temp['name'];
                    $product_temp['category_id'] = (string)$_temp['category_ids'][0];
                    $product_temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
                    $product_temp['length'] = (string)$_temp['length'];
                    $product_temp['width'] = (string)$_temp['width'];
                    $product_temp['price'] = (string)$_temp['price'];
                    $product_temp['like_count'] = (string)$like_count;
                    // $product_temp['bee'] = get_bee_image($vendor_id);
                    $product_temp['date_created'] = (string)$_temp['date_created']->date("Y-m-d H:i:s");
                    $temp['last_product'] = $_temp['date_created']->date("Y-m-d H:i:s");
                    if (empty($image_url))
                    {
                        $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
                    }
                    $product_temp['image_url'] = $image_url;
                    array_push($temp['product'], $product_temp);

                }
                array_push($artist, $temp);
            }
        }
    }

    if (!empty($artist))
    {
        foreach ($artist as $key => $part)
        {
            $sort[$key] = $part['follower'];
        }
        array_multisort($sort, SORT_DESC, $artist);

        $response['success'] = __("true");
        $response['data'] = $artist;
        $response['message'] = __("Get New Product Artist vice Successfully", "wp-rest-user");
        $response['code'] = 200;
    }
    else
    {
        $response['success'] = __("false");
        $response['data'] = '';
        $response['message'] = __("Product Not Found In Artist", "wp-rest-user");
        $response['code'] = 400;
    }

    return new WP_REST_Response($response, 200);
}
function get_best_seller()
{
    global $wpdb;
    $limit = 10;

    if (isset($_POST['limit']) && !empty($_POST['limit']))
    {
        $limit = $_POST['limit'];
    }

    $results = $wpdb->get_results("SELECT post.post_author as user_id ,sum(meta.meta_value) as product_sell FROM wp_posts as post,wp_postmeta as meta WHERE post.post_type = 'product' AND post.ID = meta.post_id AND meta.meta_key = 'total_sales' group by post_author ORDER BY post.post_date DESC limit " . $limit);

    $artist = array();
    foreach ($results as $user_id)
    {

        $user = get_user_by('id', $user_id->user_id);
        $profile_url = get_user_meta($user_id->user_id, "_user_img_url", true);
        if (empty($profile_url))
        {
            $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
        }
        $temp = (array)$user->data;

        unset($temp["user_pass"]);
        unset($temp["display_name"]);
        unset($temp["user_nicename"]);
        unset($temp["user_email"]);
        unset($temp["user_url"]);
        unset($temp["user_registered"]);
        unset($temp["user_activation_key"]);
        unset($temp["user_status"]);
        $temp['role'] = $user->roles[0];
        $temp['bee'] = get_bee_image($user_id->user_id);
        $temp['profile_url'] = $profile_url;

        $follower = get_follower_count($user
            ->data
            ->ID);

        if ($follower == false || $follower == null || $follower == '')
        {
            $follower = 0;
        }
        $follower = get_follower_count($user
            ->data
            ->ID);

        if ($follower == false || $follower == null || $follower == '')
        {
            $follower = 0;
        }
        $temp['follower'] = $follower;
        $products = wc_get_products(array(
            'status' => 'publish',
            'limit' => - 1,
            'orderby' => 'date_created',
            'order' => 'ASC',
            'author' => $user->ID
        ));
        if (!empty($products))
        {
            $temp['product'] = array();
            foreach ($products as $product)
            {
                $_temp = array();
                $image_url = array();
                $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
                if (!empty($image[0]))
                {
                    array_push($image_url, $image[0]);
                }
                $attachment_ids = $product->get_gallery_image_ids();
                $_temp = $product->get_data();

                foreach ($attachment_ids as $attachment_id)
                {
                    array_push($image_url, wp_get_attachment_url($attachment_id));
                }
                $vendor_id = get_post_field('post_author', $_temp['id']);

                $like_count = get_product_like($_temp['id']);
                if (empty($like_count))
                {
                    $like_count = 0;
                }

                $product_temp['product_id'] = (string)$_temp['id'];
                $product_temp['name'] = (string)$_temp['name'];
                $product_temp['category_id'] = (string)$_temp['category_ids'][0];
                $product_temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
                $product_temp['length'] = (string)$_temp['length'];
                $product_temp['width'] = (string)$_temp['width'];
                $product_temp['price'] = (string)$_temp['price'];
                $product_temp['like_count'] = (string)$like_count;
                // $product_temp['bee'] = get_bee_image($vendor_id);
                $product_temp['date_created'] = (string)$_temp['date_created']->date("Y-m-d H:i:s");
                $temp['last_product'] = $_temp['date_created']->date("Y-m-d H:i:s");
                if (empty($image_url))
                {
                    $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
                }
                $product_temp['image_url'] = $image_url;
                array_push($temp['product'], $product_temp);

            }
            array_push($artist, $temp);
        }
    }

    foreach ($artist as $key => $part)
    {
        $sort[$key] = strtotime($part['last_product']);
    }
    array_multisort($sort, SORT_DESC, $artist);

    $response['success'] = __("true");
    $response['data'] = $artist;
    $response['message'] = __("Get Best Seller Successfully", "wp-rest-user");
    $response['code'] = 200;
    return new WP_REST_Response($response, 200);
}
function get_cart()
{

    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $session_handler = new WC_Session_Handler();
    $session = $session_handler->get_session($user_id);
    $cart_items = unserialize($session['cart']);
    $finaltoal = '';
    $data = array();
    $itmeaarray = array();

    function getmytotal($quet, $priced)
    {
        $subtoal = $quet * $priced;
        $total = $total + $subtoal;
        return $total;
    }
    if (!empty($cart_items) && $cart_items)
    {
        foreach ($cart_items as $cart_item_key => $cart_item)
        {
            if (!empty($cart_item_key))
            {
                $args = array(
                    'post_type' => 'product',
                    'p' => $cart_item['product_id'],
                    'orderby' => 'date',
                    'order' => 'DESC'
                );
                $loop = new WP_Query($args);
                $response = array();
                while ($loop->have_posts()):
                    $loop->the_post();

                    global $product;
                    $_temp = array();
                    $image_url = array();
                    $post_id = get_the_ID();
                    $variation_array = array();

                    $args = array(
                        'post_type' => 'product_variation',
                        'post_status' => array(
                            'private',
                            'publish'
                        ) ,
                        'numberposts' => - 1,
                        'orderby' => 'menu_order',
                        'order' => 'asc',
                        'post_parent' => get_the_ID()
                    );
                    $variations = get_posts($args);
                    $variation_array_temp = array();
                    $variation_data = array();
                    $variation_id_array = array();

                    foreach ($variations as $variation)
                    {
                        array_push($variation_array_temp, explode(',', $variation->post_excerpt));
                        array_push($variation_id_array, $variation->ID);
                    }

                    foreach ($variation_array_temp as $key => $value)
                    {
                        foreach ($value as $key2 => $value2)
                        {
                            $temp_data = explode(':', $value2);
                            $variation_data[$key][trim($temp_data[0]) ] = trim($temp_data[1]);
                        }
                        $variation_data[$key]['variant_id'] = $variation_id_array[$key];
                    }

                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
                    array_push($image_url, $image[0]);
                    $attachment_ids = $product->get_gallery_image_ids();
                    $_temp = $product->get_data();
                    foreach ($attachment_ids as $attachment_id)
                    {
                        array_push($image_url, wp_get_attachment_url($attachment_id));
                    }
                    $vendor_id = get_post_field('post_author', get_the_ID());
                    $like_count = get_product_like(get_the_ID());
                    if (empty($like_count))
                    {
                        $like_count = 0;
                    }
                    $user = "Admin";
                    if (!empty($vendor_id))
                    {
                        $vendor = get_userdata($vendor_id);
                        $user = $vendor->user_login;
                    }

                    $profile_url = get_user_meta($user
                        ->data->ID, "_user_img_url", true);

                    if (empty($profile_url))
                    {
                        $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
                    }
                    $follower = get_follower_count($user
                        ->data
                        ->ID);

                    if ($follower == false || $follower == null || $follower == '')
                    {
                        $follower = 0;
                    }
                    // $temp['follower'] = $follower;
                    $variation_list = $product->get_available_variations();
                    $variation_detail = array();
                    foreach ($variation_list as $key => $variation)
                    {
                        if ($cart_item['variation_id'] == $variation['variation_id'])
                        {
                            array_push($variation_detail, $variation['attributes']);
                        }
                    }

                    $temp['height'] = $variation_detail[0]['attribute_pa_height'];
                    $temp['width'] = $variation_detail[0]['attribute_pa_width'];
                    $temp['dimension'] = $variation_detail[0]['attribute_pa_dimension'];
                    $temp['measurement_type'] = $variation_detail[0]['attribute_pa_measurement_type'];
                    // $temp['category'] = (string) cst_get_cat_name($_temp['category_ids'][0]);
                    // $temp['category_id'] = (string) $_temp['category_ids'][0];
                    // $temp['product_id'] = (string) $_temp['id'];
                    // $temp['variation'] = $variation_data;
                    $temp['title'] = (string)$_temp['name'];
                    // $temp['date_created'] = (string) $_temp['date_created']->date("Y");
                    $temp['price'] = (string)$_temp['price'];
                    $temp['user_name'] = (string)$user;
                    $temp['short_description'] = (string)$_temp['short_description'];
                    $temp['user_profile_url'] = (string)$profile_url;
                    // $temp['like_count'] = (string) $like_count;
                    $temp['bee'] = get_bee_image($vendor_id);
                    // $temp['total_sold'] = total_sold($vendor_id);
                    // $temp['view_scale'] = get_post_meta($post_id,'view_scale', true);
                    // $temp['price_type'] = get_post_meta($post_id,'price_type', true);
                    // $temp['image_credits'] = get_post_meta($post_id,'image_credits', true);
                    // $temp['signature'] = get_post_meta($post_id,'signature', true);
                    // $temp['edition'] = get_post_meta($post_id,'edition', true);
                    // $temp['medium'] = get_post_meta($post_id,'medium', true);
                    $temp['date'] = get_post_meta($post_id, 'date', true);

                    if (!empty($user_id) && $user_id != 0)
                    {
                        if (get_user_meta($user_id, $product_id . '_like', true))
                        {
                            $temp['current_user_like'] = true;
                        }
                        else
                        {
                            $temp['current_user_like'] = false;
                        }
                    }
                    if (empty($image_url) || $image_url == null || $image_url[0] == null || $image_url[0] == '')
                    {
                        $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
                    }
                    $temp['image_url'] = $image_url;

                    $total = getmytotal($cart_item['quantity'], $cart_item['line_total']);
                    $temp['variation_id'] = $cart_item['variation_id'];
                    $temp['product_id'] = $cart_item['product_id'];
                    $temp['quantity'] = $cart_item['quantity'];
                    $temp['price'] = number_format((float)$cart_item['line_total'], 2, '.', '');
                    $finaltoal = $finaltoal + $total;
                    array_push($data, $temp);
                endwhile;
                wp_reset_query();
            }
        }
        if (!empty($data))
        {
            $response['success'] = true;
            $response['message'] = 'get cart successfully';
            $response['data'] = $data;
            $response['total'] = number_format((float)$finaltoal, 2, '.', '');
        }
        else
        {
            $response['success'] = false;
            $response['message'] = 'No items found in the cart';
        }
    }
    else
    {
        $response['success'] = false;
        $response['message'] = 'No items found in the cart';
    }
    return new WP_REST_Response($response, 200);
}
function add_to_cart()
{

    if (!is_admin())
    {
        require_once (ABSPATH . 'wp-admin/includes/post.php');
    }

    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    $user = get_user_by('id', $user_id);
    if (in_array('amaor', $user->roles))
    {
        $response['success'] = __("false");
        $response['message'] = __("You Can Not Add In Cart", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    wp_set_current_user($user_id);

    $product_id = sanitize_text_field($_POST['product_id']);
    if (empty($product_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("Product ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    $variation_id = sanitize_text_field($_POST['variation_id']);
    if (empty($variation_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("variation ID is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (post_exists(get_the_title($product_id)) <= 0)
    {
        $response['success'] = __("false");
        $response['message'] = __("Product Not Exist", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $quantity = sanitize_text_field($_POST['quantity']);
    $quantity = 1;

    global $woocommerce, $wpdb;

    $array = $wpdb->get_results("select session_value from {$wpdb->prefix}woocommerce_sessions where session_key = '" . $user_id . "'");
    // var_dump($array);
    if (empty($array))
    {
        $daasd = 'a:7:{s:4:"cart";s:6:"a:0:{}";s:11:"cart_totals";s:367:"a:15:{s:8:"subtotal";i:0;s:12:"subtotal_tax";i:0;s:14:"shipping_total";i:0;s:12:"shipping_tax";i:0;s:14:"shipping_taxes";a:0:{}s:14:"discount_total";i:0;s:12:"discount_tax";i:0;s:19:"cart_contents_total";i:0;s:17:"cart_contents_tax";i:0;s:19:"cart_contents_taxes";a:0:{}s:9:"fee_total";i:0;s:7:"fee_tax";i:0;s:9:"fee_taxes";a:0:{}s:5:"total";i:0;s:9:"total_tax";i:0;}";s:15:"applied_coupons";s:6:"a:0:{}";s:22:"coupon_discount_totals";s:6:"a:0:{}";s:26:"coupon_discount_tax_totals";s:6:"a:0:{}";s:21:"removed_cart_contents";s:6:"a:0:{}";s:8:"customer";s:817:"a:26:{s:2:"id";s:1:"1";s:13:"date_modified";s:25:"2021-01-18t04:45:01+00:00";s:8:"postcode";s:6:"395001";s:4:"city";s:4:"test";s:9:"address_1";s:15:"testing-address";s:7:"address";s:15:"testing-address";s:9:"address_2";s:4:"test";s:5:"state";s:2:"gj";s:7:"country";s:2:"in";s:17:"shipping_postcode";s:0:"";s:13:"shipping_city";s:0:"";s:18:"shipping_address_1";s:0:"";s:16:"shipping_address";s:0:"";s:18:"shipping_address_2";s:0:"";s:14:"shipping_state";s:2:"gj";s:16:"shipping_country";s:2:"in";s:13:"is_vat_exempt";s:0:"";s:19:"calculated_shipping";s:0:"";s:10:"first_name";s:4:"test";s:9:"last_name";s:4:"test";s:7:"company";s:4:"test";s:5:"phone";s:10:"7984563120";s:5:"email";s:30:"admin@web.webdevelopment33.com";s:19:"shipping_first_name";s:0:"";s:18:"shipping_last_name";s:0:"";s:16:"shipping_company";s:0:"";}";}';
        $session_aad = '1611316742';
        $wpdb->insert($wpdb->prefix . 'woocommerce_sessions', array(
            'session_key' => $user_id,
            'session_value' => @$daasd,
            'session_expiry' => $session_aad
        ));
    }

    $array = $wpdb->get_results("select session_value from {$wpdb->prefix}woocommerce_sessions where session_key = '" . $user_id . "'");
    // print_r($array);
    $data = $array[0]->session_value;

    function getmytotal($quet, $priced)
    {
        $subtoal = $quet * $priced;
        $total = $total + $subtoal;
        return $total;
    }

    $cart_data = unserialize($data);
    $product = wc_get_product($product_id);
    $cart_data['cart'] = unserialize($cart_data['cart']);
    $old_quantity = 0;
    $new_quantity = 0;
    $old_kiey = '';

    foreach ($cart_data['cart'] as $key => $value)
    {
        if ($value['product_id'] == $product_id)
        {
            $old_quantity = $value['quantity'];
            $old_kiey = $key;
            break;
        }
    }

    $new_quantity = $old_quantity + $quantity;
    if ($old_kiey == '')
    {
        $kiey = 'stirgnga' . $product_id . rand();
    }
    else
    {
        $kiey = $old_kiey;
    }

    $cart_data['cart'][$kiey] = array(
        'key' => $kiey,
        'product_id' => $product_id,
        'variation_id' => $variation_id,
        'variation' => array() ,
        'quantity' => $new_quantity,
        'line_tax_data' => array(
            'subtotal' => array() ,
            'total' => array()
        ) ,
        'line_subtotal' => $product->get_price() ,
        'line_subtotal_tax' => 0,
        'line_total' => $product->get_price() ,
        'line_tax' => 0,
    );

    $cart_data['cart'] = serialize($cart_data['cart']);
    $updateddata = serialize($cart_data);
    $sql = "UPDATE {$wpdb->prefix}woocommerce_sessions SET session_value= '" . $updateddata . "' WHERE  session_key ='" . $user_id . "'";
    $rez = $wpdb->query($sql);
    $session_handler = new WC_Session_Handler();
    $session = $session_handler->get_session($user_id);
    $cart_items = unserialize($session['cart']);

    if (!empty($cart_items))
    {
        $itmeaarray = array();
        $finaltoal = '';
        foreach ($cart_items as $cart_item_key => $cart_item)
        {
            $total = getmytotal($cart_item['quantity'], $cart_item['line_total']);
            $finaltoal = $finaltoal + $total;
            $product_name = get_the_title($cart_item['product_id']);
            $newarray = array(
                'product_id' => $cart_item['product_id'],
                'product_name' => $product_name,
                'quantity' => $cart_item['quantity'],
                'price' => number_format((float)$cart_item['line_total'], 2, '.', '')
            );
            array_push($itmeaarray, $newarray);
        }

        $response['success'] = true;
        $response['message'] = 'item successfully added';
        $response['data'] = $itmeaarray;
        $response['total'] = number_format((float)$finaltoal, 2, '.', '');

    }
    else
    {
        $response['success'] = false;
        $response['message'] = 'Something wrong please try again';
    }
    return new WP_REST_Response($response, 200);
}
function add_remove_cart()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    wp_set_current_user($user_id);

    $product_id = sanitize_text_field($_POST['product_id']);
    if (empty($product_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("Product ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    $variation_id = sanitize_text_field($_POST['variation_id']);
    if (empty($variation_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("variation ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $quantity = sanitize_text_field($_POST['quantity']);
    $quantity = 1;

    global $woocommerce, $wpdb;

    $array = $wpdb->get_results("select session_value from {$wpdb->prefix}woocommerce_sessions where session_key = '" . $user_id . "'");

    if (count($array) < 0)
    {
        $response['success'] = false;
        $response['code'] = 400;
        $response['message'] = 'Item not Found in Cart';
        return new WP_REST_Response($response, 200);
    }

    $data = $array[0]->session_value;

    function getmytotal($quet, $priced)
    {
        $subtoal = $quet * $priced;
        $total = $total + $subtoal;
        return $total;
    }

    $cart_data = unserialize($data);
    $product = wc_get_product($product_id);
    $cart_data['cart'] = unserialize($cart_data['cart']);
    $old_quantity = 0;
    $new_quantity = 0;
    $kiey = '';

    foreach ($cart_data['cart'] as $key => $value)
    {
        if ($value['product_id'] == null)
        {
            unset($cart_data['cart'][$key]);
        }
        if ($value['product_id'] == $product_id)
        {
            $old_quantity = $value['quantity'];
            $kiey = $key;
            break;
        }
    }

    $new_quantity = $old_quantity - $quantity;

    if ($new_quantity >= 1)
    {
        $cart_data['cart'][$kiey] = array(
            'key' => $kiey,
            'product_id' => $product_id,
            'variation_id' => $variation_id,
            'variation' => array() ,
            'quantity' => $new_quantity,
            'line_tax_data' => array(
                'subtotal' => array() ,
                'total' => array()
            ) ,
            'line_subtotal' => $product->get_price() ,
            'line_subtotal_tax' => 0,
            'line_total' => $product->get_price() ,
            'line_tax' => 0,
        );
    }
    else
    {
        unset($cart_data['cart'][$kiey]);
    }

    $cart_data['cart'] = serialize($cart_data['cart']);
    $updateddata = serialize($cart_data);
    $sql = "UPDATE {$wpdb->prefix}woocommerce_sessions SET session_value= '" . $updateddata . "' WHERE  session_key ='" . $user_id . "'";
    $rez = $wpdb->query($sql);
    $session_handler = new WC_Session_Handler();
    $session = $session_handler->get_session($user_id);
    $cart_items = unserialize($session['cart']);

    if (!empty($cart_items))
    {
        $itmeaarray = array();
        $finaltoal = '';
        foreach ($cart_items as $cart_item_key => $cart_item)
        {
            $total = getmytotal($cart_item['quantity'], $cart_item['line_total']);
            $finaltoal = $finaltoal + $total;
            $product_name = get_the_title($cart_item['product_id']);
            $newarray = array(
                'product_id' => $cart_item['product_id'],
                'product_name' => $product_name,
                'quantity' => $cart_item['quantity'],
                'price' => number_format((float)$cart_item['line_total'], 2, '.', '')
            );
            array_push($itmeaarray, $newarray);
        }

        $response['success'] = true;
        $response['message'] = 'item successfully Remove';
        $response['data'] = $itmeaarray;
        $response['data'] = 200;
        $response['total'] = number_format((float)$finaltoal, 2, '.', '');

    }
    else
    {
        $response['success'] = true;
        $response['message'] = 'item successfully Remove';
        $response['data'] = '';
        $response['data'] = 200;
    }
    return new WP_REST_Response($response, 200);
}
function category_search()
{
    $category = sanitize_text_field($_POST['category']);
    if (empty($category))
    {
        $response['success'] = __("false");
        $response['message'] = __("category ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => - 1,
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $category,
            )
        ) ,
    );

    $product_ids = array();
    $temp = array();
    $products = new WP_Query($args);
    $response = array();
    if ($products->have_posts())
    {
        while ($products->have_posts())
        {
            $products->the_post();
            global $product;

            $_temp = array();
            $image_url = array();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
            if (!empty($image[0]))
            {
                array_push($image_url, $image[0]);
            }
            $attachment_ids = $product->get_gallery_image_ids();
            $_temp = $product->get_data();

            foreach ($attachment_ids as $attachment_id)
            {
                array_push($image_url, wp_get_attachment_url($attachment_id));
            }
            $vendor_id = get_post_field('post_author', $_temp['id']);

            $like_count = get_product_like($_temp['id']);
            if (empty($like_count))
            {
                $like_count = 0;
            }

            $product_temp['product_id'] = (string)$_temp['id'];
            $product_temp['name'] = (string)$_temp['name'];
            $product_temp['category_id'] = (string)$_temp['category_ids'][0];
            $product_temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
            $product_temp['length'] = (string)$_temp['length'];
            $product_temp['width'] = (string)$_temp['width'];
            $product_temp['price'] = (string)$_temp['price'];
            $product_temp['like_count'] = (string)$like_count;
            $product_temp['bee'] = get_bee_image($vendor_id);
            $product_temp['date_created'] = (string)$_temp['date_created']->date("Y-m-d H:i:s");
            // $temp['last_product'] = $_temp['date_created']->date("Y-m-d H:i:s");
            if (empty($image_url))
            {
                $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
            }
            $product_temp['image_url'] = $image_url;
            // print_r($product_temp);
            array_push($temp, $product_temp);
            // print_r($temp);
            
        }
    }
    else
    {
        $response['success'] = true;
        $response['message'] = 'Product not Found';
        $response['data'] = '';
        $response['code'] = 200;
    }

    $response['success'] = true;
    $response['message'] = ' Get Product Category wice';
    $response['data'] = $temp;
    $response['code'] = 200;

    return new WP_REST_Response($response, 200);
}
function price_range_search()
{
    $min_price = sanitize_text_field($_POST['min_price']);
    $max_price = sanitize_text_field($_POST['max_price']);
    if (empty($min_price))
    {
        $response['success'] = __("false");
        $response['message'] = __("min price is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (empty($max_price))
    {
        $response['success'] = __("false");
        $response['message'] = __("max price is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    $args = array(
        'posts_per_page' => 100,
        'post_type' => array(
            'product',
            'product_variation'
        ) ,
        'meta_query' => array(
            array(
                'key' => '_regular_price',
                'value' => array(
                    $min_price,
                    $max_price
                ) ,
                'compare' => 'BETWEEN',
                'type' => 'NUMERIC'
            )
        )
    );

    $product_ids = array();
    $temp = array();
    $products = new WP_Query($args);
    $query = $products;
    $response = array();
    if ($products->have_posts())
    {
        while ($products->have_posts())
        {
            $products->the_post();
            global $product;

            $_temp = array();
            $image_url = array();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
            if (!empty($image[0]))
            {
                array_push($image_url, $image[0]);
            }
            $attachment_ids = $product->get_gallery_image_ids();
            $_temp = $product->get_data();

            foreach ($attachment_ids as $attachment_id)
            {
                array_push($image_url, wp_get_attachment_url($attachment_id));
            }
            $vendor_id = get_post_field('post_author', $_temp['id']);

            $like_count = get_product_like($_temp['id']);
            if (empty($like_count))
            {
                $like_count = 0;
            }

            $product_temp['product_id'] = (string)$_temp['id'];
            $product_temp['name'] = (string)$_temp['name'];
            $product_temp['category_id'] = (string)$_temp['category_ids'][0];
            $product_temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
            $product_temp['length'] = (string)$_temp['length'];
            $product_temp['width'] = (string)$_temp['width'];
            $product_temp['price'] = (string)$_temp['price'];
            $product_temp['like_count'] = (string)$like_count;
            $product_temp['bee'] = get_bee_image($vendor_id);
            $product_temp['date_created'] = (string)$_temp['date_created']->date("Y-m-d H:i:s");
            // $temp['last_product'] = $_temp['date_created']->date("Y-m-d H:i:s");
            if (empty($image_url))
            {
                $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
            }
            $product_temp['image_url'] = $image_url;
            // print_r($product_temp);
            array_push($temp, $product_temp);
            // print_r($temp);
            
        }
    }
    else
    {
        $response['success'] = true;
        $response['message'] = 'Product not Found';
        $response['data'] = '';
        $response['code'] = 200;;
    }

    $response['success'] = true;
    $response['message'] = ' Get Product Price Range wice';
    $response['data'] = $temp;
    $response['query'] = $query;
    $response['code'] = 200;

    return new WP_REST_Response($response, 200);
}
function product_by_country()
{
    $country = sanitize_text_field($_POST['country']);

    if (empty($country))
    {
        $response['success'] = __("false");
        $response['message'] = __("Country Name is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $args = array(
        'posts_per_page' => 100,
        'post_type' => array(
            'product',
            'product_variation'
        ) ,
        'meta_query' => array(
            array(
                'key' => 'country',
                'value' => strtolower($country) ,
                'compare' => '='
            )
        )
    );

    $product_ids = array();
    $temp = array();
    $products = new WP_Query($args);
    //   print_r($products);
    $response = array();
    if ($products->have_posts())
    {
        while ($products->have_posts())
        {
            $products->the_post();
            global $product;

            $_temp = array();
            $image_url = array();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
            if (!empty($image[0]))
            {
                array_push($image_url, $image[0]);
            }
            $attachment_ids = $product->get_gallery_image_ids();
            $_temp = $product->get_data();

            foreach ($attachment_ids as $attachment_id)
            {
                array_push($image_url, wp_get_attachment_url($attachment_id));
            }
            $vendor_id = get_post_field('post_author', $_temp['id']);

            $like_count = get_product_like($_temp['id']);
            if (empty($like_count))
            {
                $like_count = 0;
            }

            $product_temp['product_id'] = (string)$_temp['id'];
            $product_temp['name'] = (string)$_temp['name'];
            $product_temp['category_id'] = (string)$_temp['category_ids'][0];
            $product_temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
            $product_temp['length'] = (string)$_temp['length'];
            $product_temp['width'] = (string)$_temp['width'];
            $product_temp['price'] = (string)$_temp['price'];
            $product_temp['like_count'] = (string)$like_count;
            $product_temp['bee'] = get_bee_image($vendor_id);;
            $product_temp['date_created'] = (string)$_temp['date_created']->date("Y-m-d H:i:s");
            if (empty($image_url))
            {
                $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
            }
            $product_temp['image_url'] = $image_url;
            array_push($temp, $product_temp);
        }
    }
    else
    {
        $response['success'] = false;
        $response['message'] = 'Product not Found';
        $response['data'] = '';
        $response['code'] = 400;
    }

    $response['success'] = true;
    $response['message'] = ' Get Product Country wice';
    $response['data'] = $temp;
    $response['code'] = 200;

    return new WP_REST_Response($response, 200);
}
function product_by_size()
{
    $size = sanitize_text_field($_POST['size']);

    if (empty($size))
    {
        $response['success'] = __("false");
        $response['message'] = __("Size is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $args = array(
        'posts_per_page' => 100,
        'post_type' => array(
            'product',
            'product_variation'
        ) ,
        'meta_query' => array(
            array(
                'key' => 'size',
                'value' => $size,
                'compare' => '='
            )
        )
    );

    $product_ids = array();
    $temp = array();
    $products = new WP_Query($args);
    //   print_r($products);
    $response = array();
    if ($products->have_posts())
    {
        while ($products->have_posts())
        {
            $products->the_post();
            global $product;

            $_temp = array();
            $image_url = array();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
            if (!empty($image[0]))
            {
                array_push($image_url, $image[0]);
            }
            $attachment_ids = $product->get_gallery_image_ids();
            $_temp = $product->get_data();

            foreach ($attachment_ids as $attachment_id)
            {
                array_push($image_url, wp_get_attachment_url($attachment_id));
            }
            $vendor_id = get_post_field('post_author', $_temp['id']);

            $like_count = get_product_like($_temp['id']);
            if (empty($like_count))
            {
                $like_count = 0;
            }

            $product_temp['product_id'] = (string)$_temp['id'];
            $product_temp['name'] = (string)$_temp['name'];
            $product_temp['category_id'] = (string)$_temp['category_ids'][0];
            $product_temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
            $product_temp['length'] = (string)$_temp['length'];
            $product_temp['width'] = (string)$_temp['width'];
            $product_temp['price'] = (string)$_temp['price'];
            $product_temp['like_count'] = (string)$like_count;
            $product_temp['bee'] = get_bee_image($vendor_id);;
            $product_temp['date_created'] = (string)$_temp['date_created']->date("Y-m-d H:i:s");
            if (empty($image_url))
            {
                $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
            }
            $product_temp['image_url'] = $image_url;
            array_push($temp, $product_temp);
        }
    }
    else
    {

        $response['success'] = false;
        $response['message'] = 'Product not Found';
        $response['data'] = '';
        $response['code'] = 400;
    }

    $response['success'] = true;
    $response['message'] = ' Get Product Size wice';
    $response['data'] = $temp;
    $response['code'] = 200;

    return new WP_REST_Response($response, 200);
}
function product_by_title()
{
    $title = sanitize_text_field($_POST['title']);

    if (empty($title))
    {
        $response['success'] = __("false");
        $response['message'] = __("Text is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $args = array(
        'posts_per_page' => 100,
        'post_type' => array(
            'product',
            'product_variation'
        ) ,
        "s" => $title
    );

    $product_ids = array();
    $temp = array();
    $products = new WP_Query($args);
    //   print_r($products);
    $response = array();
    if ($products->have_posts())
    {
        while ($products->have_posts())
        {
            $products->the_post();
            global $product;

            $_temp = array();
            $image_url = array();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
            if (!empty($image[0]))
            {
                array_push($image_url, $image[0]);
            }
            $attachment_ids = $product->get_gallery_image_ids();
            $_temp = $product->get_data();

            foreach ($attachment_ids as $attachment_id)
            {
                array_push($image_url, wp_get_attachment_url($attachment_id));
            }
            $vendor_id = get_post_field('post_author', $_temp['id']);

            $like_count = get_product_like($_temp['id']);
            if (empty($like_count))
            {
                $like_count = 0;
            }

            $product_temp['product_id'] = (string)$_temp['id'];
            $product_temp['name'] = (string)$_temp['name'];
            $product_temp['category_id'] = (string)$_temp['category_ids'][0];
            $product_temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
            $product_temp['length'] = (string)$_temp['length'];
            $product_temp['width'] = (string)$_temp['width'];
            $product_temp['price'] = (string)$_temp['price'];
            $product_temp['like_count'] = (string)$like_count;
            $product_temp['bee'] = get_bee_image($vendor_id);
            $product_temp['date_created'] = (string)$_temp['date_created']->date("Y-m-d H:i:s");
            if (empty($image_url))
            {
                $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
            }
            $product_temp['image_url'] = $image_url;
            array_push($temp, $product_temp);
        }
    }
    else
    {

        $response['success'] = false;
        $response['message'] = 'Product not Found';
        $response['data'] = '';
        $response['code'] = 400;
    }

    $response['success'] = true;
    $response['message'] = ' Get Product Size wice';
    $response['data'] = $temp;
    $response['code'] = 200;

    return new WP_REST_Response($response, 200);
}
function terms_doc_upload()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    if (!isset($_FILES['term_doc']) || empty($_FILES['term_doc']))
    {
        $response['success'] = false;
        $response['message'] = 'File Not Found';
        $response['data'] = '';
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    if (in_array(4, $_FILES['term_doc']['error']))
    {
        $response['success'] = false;
        $response['message'] = 'File Not Found';
        $response['data'] = '';
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $user = get_user_by('id', $user_id);

    if (in_array('artist', $user->roles))
    {
        $doc_flag = '';
        $doc_flag = true;

        if ($doc_flag)
        {

            $attach_id_array = cst_image_upload_array($_FILES['term_doc']);

            $docs_url = array();
            for ($i = 0;$i < count($attach_id_array);$i++)
            {
                array_push($docs_url, wp_get_attachment_url($attach_id_array[$i]));
            }

            update_user_meta($user_id, 'user_docs_attach_ids', $attach_id_array);
            update_user_meta($user_id, "user_docs_url", $docs_url);
            $args = array(
                'post_author' => $user
                    ->data->ID,
                'post_content' => '',
                'post_title' => $user
                    ->data->user_login,
                'post_excerpt' => '',
                'post_status' => 'pending',
                'post_type' => 'user_docs',
            );
            wp_insert_post($args);

            $response['success'] = true;
            $response['message'] = 'Document Upload SuccessFully';
            $response['data'] = '';
            $response['code'] = 200;
            return new WP_REST_Response($response, 200);
        }
        else
        {
            $response['success'] = false;
            $response['message'] = 'Please Upload PDF FILE,Only PDF File support';
            $response['data'] = '';
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
    }
    else
    {
        $response['success'] = false;
        $response['message'] = 'Only Artist Can Upload Document';
        $response['data'] = '';
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

}
function global_notice_meta_box()
{

    $screens = array(
        'user_docs'
    );

    foreach ($screens as $screen)
    {
        add_meta_box('global-notice', __('Artist Document', 'sitepoint') , 'global_notice_meta_box_callback', $screen);
    }
}
function product_search()
{

    // print_r($_POST);
    $category = sanitize_text_field($_POST['category']);
    $min_price = sanitize_text_field($_POST['min_price']);
    $max_price = sanitize_text_field($_POST['max_price']);
    $country = sanitize_text_field($_POST['country']);
    $size = sanitize_text_field($_POST['size']);
    $title = sanitize_text_field($_POST['title']);
    $args = array();
    $category_array = array();
    $min_max_array = array();
    $size_array = array();
    $country_array = array();
    $title_array = array();

    if (isset($category) && !empty($category))
    {
        $category_array = array(
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'slug',
                    'terms' => $category,
                )
            )
        );
    }
    if (isset($min_price) && !empty($min_price) && isset($max_price) && !empty($max_price))
    {
        $min_max_array = array(
            'key' => '_price',
            'value' => array(
                $min_price,
                $max_price
            ) ,
            'compare' => 'BETWEEN',
            'type' => 'NUMERIC'
        );
    }

    if (isset($country) && !empty($country))
    {
        $country_array = array(
            'key' => 'country',
            'value' => strtolower($country) ,
            'compare' => '='
        );
    }

    if (isset($size) && !empty($size))
    {
        $size_array = array(
            'key' => 'size',
            'value' => $size,
            'compare' => '='
        );
    }
    if (isset($title) && !empty($title))
    {
        $title_array = array(
            "s" => $title
        );
    }

    $meta_query[] = array(
        'relation' => 'AND'
    );

    if (!empty($min_max_array))
    {
        $meta_query[] = $min_max_array;
    }
    if (!empty($country_array))
    {
        $meta_query[] = $country_array;
    }
    if (!empty($size_array))
    {
        $meta_query[] = $size_array;
    }
    if (!empty($title_array))
    {
        $meta_query[] = $title_array;
    }

    $args = array(
        'post_type' => array(
            'product',
            'product_variation'
        ) ,
        'posts_per_page' => 100,
        'meta_query' => array(
            $meta_query
        ) ,
    );

    $product_ids = array();
    $data = array();
    $products = new WP_Query($args);
    $query = $products;
    $response = array();

    if ($products->have_posts())
    {
        while ($products->have_posts())
        {
            $products->the_post();
            global $product;

            $_temp = array();
            $image_url = array();
            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
            if (!empty($image[0]))
            {
                array_push($image_url, $image[0]);
            }
            $attachment_ids = $product->get_gallery_image_ids();
            $_temp = $product->get_data();

            foreach ($attachment_ids as $attachment_id)
            {
                array_push($image_url, wp_get_attachment_url($attachment_id));
            }
            $vendor_id = get_post_field('post_author', $_temp['id']);

            $like_count = get_product_like($_temp['id']);
            if (empty($like_count))
            {
                $like_count = 0;
            }

            $temp['product_id'] = (string)$_temp['id'];

            $temp['title'] = (string)$_temp['name'];
            $temp['short_description'] = (string)$_temp['short_description'];
            $temp['name'] = (string)$_temp['name'];
            $temp['category_id'] = (string)$_temp['category_ids'][0];
            $temp['category'] = (string)cst_get_cat_name($_temp['category_ids'][0]);
            $temp['length'] = (string)$_temp['length'];
            $temp['width'] = (string)$_temp['width'];
            $temp['price'] = (string)$_temp['price'];
            $temp['like_count'] = (string)$like_count;
            $temp['bee'] = get_bee_image($vendor_id);
            $temp['measurement'] = get_post_meta(get_the_ID() , 'measurment', true);
            $temp['total_sold'] = total_sold($vendor_id);
            $temp['date_created'] = (string)$_temp['date_created']->date("Y-m-d H:i:s");
            // $temp['last_product'] = $_temp['date_created']->date("Y-m-d H:i:s");
            if (empty($image_url))
            {
                $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
            }
            $temp['image_url'] = $image_url;
            array_push($data, $temp);
        }
    }
    else
    {
        $response['success'] = false;
        $response['message'] = "No Product available for your search";
        $response['data'] = '';
        $response['code'] = 404;
    }

    if ($temp == null || $temp == false || empty($temp))
    {
        $response['success'] = false;
        $response['message'] = "No Product available for your search";
        $response['data'] = '';
        $response['code'] = 404;
        return new WP_REST_Response($response, 200);

    }
    else
    {
        $response['success'] = true;
        $response['message'] = 'Get Product Filter Successfully ';
        $response['data'] = $data;
        $response['code'] = 200;
        return new WP_REST_Response($response, 200);
    }

}
function term_text()
{
    $terms_text = get_field('artist_term_text', 'option');
    $response['success'] = true;
    $response['message'] = ' Get Artist Term Text Successfully ';
    $response['data'] = $terms_text;
    $response['code'] = 200;
    return new WP_REST_Response($response, 200);
}

function get_aucation()
{
    // 	ini_set('display_errors', 1);
    // 	ini_set('display_startup_errors', 1);
    // 	error_reporting(E_ALL);
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, 'https://www.sothebys.com/en/results');
    curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
    $query = curl_exec($curl_handle);
    print_r($query);
    curl_close($curl_handle);

}
function api_update_product()
{
    $frame_size = json_decode($_POST['frame_size']);
    $height = array();
    $width = array();
    $dimension = array();
    $dimension_type = array();
    $variation_list = array();

    {
        if (!isset($_POST['product_id']) || empty($_POST['product_id']))
        {
            $response['success'] = __("false");
            $response['data'] = '';
            $response['message'] = __("Post ID is required Field", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
        if (!isset($_POST['name']) || empty($_POST['name']))
        {
            $response['success'] = __("false");
            $response['data'] = '';
            $response['message'] = __("name is required Field", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }

        if (!isset($_POST['regular_price']) || empty($_POST['regular_price']))
        {
            $response['success'] = __("false");
            $response['data'] = '';
            $response['message'] = __("regular_price is required Field", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
        if (!isset($_POST['category_ids']) || empty($_POST['category_ids']))
        {
            $response['success'] = __("false");
            $response['data'] = '';
            $response['message'] = __("category id is required Field", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
        if (!isset($_POST['user_id']) || empty($_POST['user_id']))
        {
            $response['success'] = __("false");
            $response['data'] = '';
            $response['message'] = __("user ID is required Field", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }

        if (!artist_doc_verify($_POST['user_id']))
        {
            $response['success'] = __("false");
            $response['data'] = '';
            $response['message'] = __("User's Document Not Verified", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
        if (!isset($_POST['frame_size']) || empty($_POST['frame_size']))
        {
            $response['success'] = __("false");
            $response['data'] = '';
            $response['message'] = __("Frame Size is required Field", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }

    }
    {
        $product_id = 0;
        $reviews_allowed = 'true';
        $regular_price = '';
        $status = 'publish';
        $slug = '';
        $featured = 'false';
        $visibility = '';
        $sale_price = '';
        $virtual = 'false';
        $sale_to = '';
        $sale_from = '';
        $downloads = '';
        $downloadable = 'false';
        $download_expiry = '';
        $download_limit = '';
        $manage_stock = 'true';
        $sku = '';
        $stock_qty = '10000';
        $stock_status = 'instock';
        $sold_individually = 'false';
        $backorders = 'no';
        $length = '';
        $weight = '';
        $height = '';
        $width = '';
        $note = '';
        $reviews = 'true';
        $tag_ids = '';
        $category_ids = '';
        $gallery_ids = '';
        $image_id = '';
        $size = '';
        $name = '';
        $description = '';
        $short_description = '';
        $user_id = '';
        $country = '';
        $measurment = '';
        $attr_width = '';
        $attr_height = '';
        $attr_dimension = '';
        $attr_measurement_type = '';
        $view_scale = '';
        $price_type = '';
        $image_credits = '';
        $signature = '';
        $edition = '';
        $medium = '';
        $date = '';
    }
    {
        if (isset($_POST['name']) && !empty($_POST['name']))
        {
            $name = $_POST['name'];
        }
        if (isset($_POST['product_id']) && !empty($_POST['product_id']))
        {
            $product_id = $_POST['product_id'];
        }
        if (isset($_POST['user_id']) && !empty($_POST['user_id']))
        {
            $user_id = $_POST['user_id'];
        }
        if (isset($_POST['description']) && !empty($_POST['description']))
        {
            $short_description = $_POST['description'];
        }
        if (isset($_POST['short_description']) && !empty($_POST['short_description']))
        {
            $short_description = $_POST['short_description'];
        }
        if (isset($_POST['reviews_allowed']) && !empty($_POST['reviews_allowed']))
        {
            $reviews_allowed = $_POST['reviews_allowed'];
        }
        if (isset($_POST['regular_price']) && !empty($_POST['regular_price']))
        {
            $regular_price = $_POST['regular_price'];
        }
        if (isset($_POST['status']) && !empty($_POST['status']))
        {
            $status = $_POST['status'];
        }
        if (isset($_POST['slug']) && !empty($_POST['slug']))
        {
            $slug = $_POST['slug'];
        }
        if (isset($_POST['featured']) && !empty($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        if (isset($_POST['visibility']) && !empty($_POST['visibility']))
        {
            $visibility = $_POST['visibility'];
        }
        if (isset($_POST['sale_price']) && !empty($_POST['sale_price']))
        {
            $sale_price = $_POST['sale_price'];
        }
        if (isset($_POST['virtual']) && !empty($_POST['virtual']))
        {
            $virtual = $_POST['virtual'];
        }
        if (isset($_POST['sale_to']) && !empty($_POST['sale_to']))
        {
            $sale_to = $_POST['sale_to'];
        }
        if (isset($_POST['sale_from']) && !empty($_POST['sale_from']))
        {
            $sale_from = $_POST['sale_from'];
        }
        if (isset($_FILES['downloads[]']) && !empty($_FILES['downloads[]']))
        {
            $downloads = cst_image_upload_array($_FILES['downloads[]']);
        }
        if (isset($_POST['downloadable']) && !empty($_POST['downloadable']))
        {
            $downloadable = $_POST['downloadable'];
        }
        if (isset($_POST['download_expiry']) && !empty($_POST['download_expiry']))
        {
            $download_expiry = $_POST['download_expiry'];
        }
        if (isset($_POST['download_limit']) && !empty($_POST['download_limit']))
        {
            $download_limit = $_POST['download_limit'];
        }
        if (isset($_POST['manage_stock']) && !empty($_POST['manage_stock']))
        {
            $manage_stock = $_POST['manage_stock'];
        }
        if (isset($_POST['sku']) && !empty($_POST['sku']))
        {
            $sku = $_POST['sku'];
        }
        if (isset($_POST['stock_qty']) && !empty($_POST['stock_qty']))
        {
            $stock_qty = $_POST['stock_qty'];
        }
        if (isset($_POST['stock_status']) && !empty($_POST['stock_status']))
        {
            $stock_status = $_POST['stock_status'];
        }
        if (isset($_POST['sold_individually']) && !empty($_POST['sold_individually']))
        {
            $sold_individually = $_POST['sold_individually'];
        }
        if (isset($_POST['backorders']) && !empty($_POST['backorders']))
        {
            $backorders = $_POST['backorders'];
        }
        if (isset($_POST['length']) && !empty($_POST['length']))
        {
            $length = $_POST['length'];
        }
        if (isset($_POST['weight']) && !empty($_POST['weight']))
        {
            $weight = $_POST['weight'];
        }
        if (isset($_POST['height']) && !empty($_POST['height']))
        {
            $height = $_POST['height'];
        }
        if (isset($_POST['width']) && !empty($_POST['width']))
        {
            $width = $_POST['width'];
        }
        if (isset($_POST['note']) && !empty($_POST['note']))
        {
            $note = $_POST['note'];
        }
        if (isset($_POST['reviews']) && !empty($_POST['reviews']))
        {
            $reviews = $_POST['reviews'];
        }
        if (isset($_POST['tag_ids']) && !empty($_POST['tag_ids']))
        {
            $tag_ids = $_POST['tag_ids'];
        }
        if (isset($_POST['category_ids']) && !empty($_POST['category_ids']))
        {
            $category_ids = $_POST['category_ids'];
        }
        if (isset($_FILES['gallery_ids']) && !empty($_FILES['gallery_ids']))
        {
            $gallery_ids = cst_image_upload_array($_FILES['gallery_ids']);
        }
        if (isset($_FILES['image']) && !empty($_FILES['image']))
        {
            $image_id = cst_image_upload($_FILES['image']);
        }
        if (isset($_POST['size']) && !empty($_POST['size']))
        {
            $size = $_POST['size'];
        }
        if (isset($_POST['measurment']) && !empty($_POST['measurment']))
        {
            $measurment = $_POST['measurment'];
        }
        if (isset($_POST['country']) && !empty($_POST['country']))
        {
            $country = $_POST['country'];
        }

        if (isset($_POST['view_scale']) && !empty($_POST['view_scale']))
        {
            $view_scale = $_POST['view_scale'];
        }
        if (isset($_POST['price_type']) && !empty($_POST['price_type']))
        {
            $price_type = $_POST['price_type'];
        }
        if (isset($_POST['image_credits']) && !empty($_POST['image_credits']))
        {
            $image_credits = $_POST['image_credits'];
        }
        if (isset($_POST['signature']) && !empty($_POST['signature']))
        {
            $signature = $_POST['signature'];
        }
        if (isset($_POST['edition']) && !empty($_POST['edition']))
        {
            $edition = $_POST['edition'];
        }
        if (isset($_POST['medium']) && !empty($_POST['medium']))
        {
            $medium = $_POST['medium'];
        }
        if (isset($_POST['date']) && !empty($_POST['date']))
        {
            $date = $_POST['date'];
        }
    }
    {
        $arg = array(
            'ID' => $product_id,
            'post_title' => $name,
            'post_author' => $user_id,
        );
        wp_update_post($arg);

        $pid = $product_id;

        if (!empty($country))
        {
            update_post_meta($product_id, 'country', strtolower($country));
        }
        if (!empty($view_scale))
        {
            update_post_meta($product_id, 'view_scale', strtolower($view_scale));
        }
        if (!empty($price_type))
        {
            update_post_meta($product_id, 'price_type', strtolower($price_type));
        }
        if (!empty($image_credits))
        {
            update_post_meta($product_id, 'image_credits', strtolower($image_credits));
        }
        if (!empty($signature))
        {
            update_post_meta($product_id, 'signature', strtolower($signature));
        }
        if (!empty($edition))
        {
            update_post_meta($product_id, 'edition', strtolower($edition));
        }
        if (!empty($medium))
        {
            update_post_meta($product_id, 'medium', strtolower($medium));
        }
        if (!empty($date))
        {
            update_post_meta($product_id, 'date', strtolower($date));
        }
        if (!empty($category_ids))
        {
            $category = get_term($category_ids, 'product_cat');
            wp_set_object_terms($product_id, $category->name, 'product_cat');
        }
    }
}

function REST_API_artist_biography()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = false;
        $response['message'] = __("user id is required ", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $biography = sanitize_text_field($_POST['biography']);
    if (empty($biography))
    {
        $response['success'] = false;
        $response['message'] = __("biography Text is required ", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    update_user_meta($user_id, 'biography', $biography);

    $response['success'] = true;
    $response['message'] = __("biography Update Successfully", "wp-rest-user");
    $response['code'] = 200;
    return new WP_REST_Response($response, 200);
}

function REST_API_cart_related_product_list()
{

    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = __("false");
        $response['message'] = __("User ID  is Required", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $session_handler = new WC_Session_Handler();
    $session = $session_handler->get_session($user_id);
    $cart_items = unserialize($session['cart']);
    $finaltoal = '';
    $data = array();
    $itmeaarray = array();
    $product_cat_array = array();

    function getmytotal($quet, $priced)
    {
        $subtoal = $quet * $priced;
        $total = $total + $subtoal;
        return $total;
    }

    if (!empty($cart_items) && $cart_items)
    {
        foreach ($cart_items as $cart_item_key => $cart_item)
        {
            if (!empty($cart_item_key))
            {
                $getProductCat = get_the_terms($cart_item['product_id'], 'product-cat');
                foreach ($getProductCat as $productInfo)
                {
                    $category_id = get_cat_ID($productInfo->name);
                    array_push($product_cat_array, $category_id);
                }
            }
        }

        $args = array(
            'post_type' => 'product',
            'category' => $product_cat_array,
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $loop = new WP_Query($args);

        $response = array();
        while ($loop->have_posts()):
            $loop->the_post();

            global $product;
            $_temp = array();
            $image_url = array();
            $post_id = get_the_ID();
            $variation_array = array();
            $temp = array();

            $args = array(
                'post_type' => 'product_variation',
                'post_status' => array(
                    'private',
                    'publish'
                ) ,
                'numberposts' => - 1,
                'orderby' => 'menu_order',
                'order' => 'asc',
                'post_parent' => get_the_ID()
            );

            $variations = get_posts($args);
            $variation_array_temp = array();
            $variation_data = array();
            $variation_id_array = array();

            foreach ($variations as $variation)
            {
                array_push($variation_array_temp, explode(',', $variation->post_excerpt));
                array_push($variation_id_array, $variation->ID);
            }

            foreach ($variation_array_temp as $key => $value)
            {
                foreach ($value as $key2 => $value2)
                {
                    $temp_data = explode(':', $value2);
                    $variation_data[$key][trim($temp_data[0]) ] = trim($temp_data[1]);
                }
                $variation_data[$key]['variant_id'] = $variation_id_array[$key];
            }

            $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()) , 'single-post-thumbnail');
            array_push($image_url, $image[0]);
            $attachment_ids = $product->get_gallery_image_ids();
            $_temp = $product->get_data();

            foreach ($attachment_ids as $attachment_id)
            {
                array_push($image_url, wp_get_attachment_url($attachment_id));
            }

            $vendor_id = get_post_field('post_author', get_the_ID());
            $like_count = get_product_like(get_the_ID());

            if (empty($like_count))
            {
                $like_count = 0;
            }

            $user = "Admin";

            if (!empty($vendor_id))
            {
                $vendor = get_userdata($vendor_id);
                $user = $vendor->user_login;
            }

            $profile_url = get_user_meta($user
                ->data->ID, "_user_img_url", true);

            if (empty($profile_url))
            {
                $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
            }

            $follower = get_follower_count($user
                ->data
                ->ID);

            if ($follower == false || $follower == null || $follower == '')
            {
                $follower = 0;
            }

            $variation_list = $product->get_available_variations();
            // print_r($variation_list);
            $variation_detail = array();

            foreach ($variation_list as $key => $variation)
            {

                array_push($variation_detail, $variation['attributes']);
            }

            $temp['get_the_category'] = get_the_category($cart_item['product_id']);

            if (!empty($variation_detail['attribute_pa_height']) && isset($variation_detail['attribute_pa_height']) && $variation_detail['attribute_pa_height'] != null)
            {
                $temp['height'] = $variation_detail['attribute_pa_height'];
                $temp['width'] = $variation_detail['attribute_pa_width'];
                $temp['dimension'] = $variation_detail['attribute_pa_dimension'];
                $temp['measurement_type'] = $variation_detail['attribute_pa_measurement_type'];
            }
            else
            {
                $temp['height'] = $variation_detail[0]['attribute_pa_height'];
                $temp['width'] = $variation_detail[0]['attribute_pa_width'];
                $temp['dimension'] = $variation_detail[0]['attribute_pa_dimension'];
                $temp['measurement_type'] = $variation_detail[0]['attribute_pa_measurement_type'];
            }
            $temp['title'] = (string)$_temp['name'];
            $temp['price'] = (string)$_temp['price'];
            $temp['short_description'] = (string)$_temp['short_description'];

            if (empty($image_url) || $image_url == null || $image_url[0] == null || $image_url[0] == '')
            {
                $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
            }
            $temp['image_url'] = $image_url;

            $total = getmytotal($cart_item['quantity'], $cart_item['line_total']);
            $temp['variation_id'] = $cart_item['variation_id'];
            $temp['product_id'] = $cart_item['product_id'];
            $temp['quantity'] = $cart_item['quantity'];
            $temp['price'] = number_format((float)$cart_item['line_total'], 2, '.', '');
            $finaltoal = $finaltoal + $total;
            array_push($data, $temp);
        endwhile;
        wp_reset_query();
        if (!empty($data))
        {
            $response['success'] = true;
            $response['message'] = 'get cart successfully';
            $response['data'] = $data;
            $response['total'] = number_format((float)$finaltoal, 2, '.', '');
        }
        else
        {
            $response['success'] = false;
            $response['message'] = 'No items found in the cart';
        }
    }
    else
    {
        $response['success'] = false;
        $response['message'] = 'No items found in the cart';
    }
    return new WP_REST_Response($response, 200);
}

function REST_API_get_notification()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = false;
        $response['message'] = __("user id is required ", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'cst_notification';
    $data = array();

    $yesterday = date('Y-m-d H:i:s', strtotime("-1 days"));
    $last_week = date('Y-m-d H:i:s', strtotime("-6 days"));
    $sql_query = "SELECT * FROM " . $table_name . " WHERE post_date BETWEEN  '" . $last_week . "' AND  '" . $yesterday . "' AND receive_user_id  = " . $user_id;
    $weekly_data = $wpdb->get_results($sql_query, ARRAY_A);
    $data['week'] = array();
    $data['today'] = array();

    $results = $wpdb->get_results('select * from ' . $table_name . ' where create_at >= CURDATE() - INTERVAL 1 DAY AND receive_user_id  = ' . $user_id, ARRAY_A);

    // print_r($results);
    // print_r($weekly_data);
    foreach ($results as $key => $value)
    {
        $temp = array();
        $id = $value['id'];
        $send_user_id = $value['send_user_id'];
        $receive_user_id = $value['receive_user_id'];
        $post_id = $value['post_id'];
        $status = $value['status'];
        $text = $value['text'];
        $create_at = $value['create_at'];
        $notification_type = $value['notification_type'];
        if ($notification_type == "Follwing")
        {
            if (get_is_follow($send_user_id, $receive_user_id))
            {
                $temp['follow_status'] = 'true';
            }
            else
            {
                $temp['follow_status'] = 'false';
            }

        }
        else if ($notification_type == "like")
        {

        }

        if (!empty($post_id))
        {
            $product = wc_get_product($post_id);
        }
        $user = get_user_by('id', $send_user_id);
        $image_url = array();
        $noty_time = '';
        $image_url = array();

        $d1 = new DateTime($create_at);
        $d2 = new DateTime(date('Y-m-d H:i:s'));
        $interval = $d1->diff($d2);
        $diffInSeconds = $interval->s; //45
        $diffInMinutes = $interval->i; //23
        $diffInHours = $interval->h; //8
        $diffInDays = $interval->d; //21
        $diffInMonths = $interval->m; //4
        $diffInYears = $interval->y; //1
        

        if (!empty($diffInMonths) && $diffInMonths >= 1)
        {
            $noty_time .= (string)$diffInMonths . "Months ";
        }
        if (!empty($diffInDays) && $diffInDays >= 1)
        {
            $noty_time .= (string)$diffInDays . "d ";
        }
        if (!empty($diffInHours) && $diffInHours >= 1)
        {
            $noty_time .= (string)$diffInHours . "h ";
        }
        if (!empty($diffInMinutes) && $diffInMinutes >= 1)
        {
            $noty_time .= (string)$diffInMinutes . "m ";
        }
        if (!empty($diffInSeconds) && $diffInSeconds >= 1)
        {
            $noty_time .= (string)$diffInSeconds . "s";
        }

        if (!empty($user))
        {

            $profile_url = get_user_meta($send_user_id, "_user_img_url", true);
            if (empty($profile_url))
            {
                $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
            }
            $temp['profile_url'] = $profile_url;

            if (in_array('artist', $user->roles))
            {
                $temp['bee'] = get_bee_image($send_user_id);
            }
            else if (in_array('collector', $user->roles))
            {
            }
            else if (in_array('amator', $user->roles))
            {
            }

            $user_data = (array)$user->data;
            $temp['user_name'] = $user_data["user_nicename"];
            $temp['text'] = $text;

            if (isset($post_id) && !empty($post_id) && isset($product) && !empty($product))
            {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id) , 'single-post-thumbnail');
                array_push($image_url, $image[0]);
                $attachment_ids = $product->get_gallery_image_ids();
                foreach ($attachment_ids as $attachment_id)
                {
                    array_push($image_url, wp_get_attachment_url($attachment_id));
                }
            }
            if (empty($image_url) || $image_url == null || $image_url[0] == null || $image_url[0] == '')
            {
                $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
            }
            $temp['time'] = $noty_time;
            $temp['image_url'] = $image_url;
            // print_r($temp);
            array_push($data['today'], $temp);
        }
    }

    foreach ($weekly_data as $key => $value)
    {
        $temp = array();
        $id = $value['id'];
        $send_user_id = $value['send_user_id'];
        $receive_user_id = $value['receive_user_id'];
        $post_id = $value['post_id'];
        $status = $value['status'];
        $text = $value['text'];
        $create_at = $value['create_at'];

        $product = wc_get_product($post_id);
        $user = get_user_by('id', $send_user_id);
        $image_url = array();
        $noty_time = '';

        $d1 = new DateTime($create_at);
        $d2 = new DateTime(date('Y-m-d H:i:s'));
        $interval = $d1->diff($d2);
        $diffInSeconds = $interval->s; //45
        $diffInMinutes = $interval->i; //23
        $diffInHours = $interval->h; //8
        $diffInDays = $interval->d; //21
        $diffInMonths = $interval->m; //4
        $diffInYears = $interval->y; //1
        

        if (!empty($diffInMonths) && $diffInMonths >= 1)
        {
            $noty_time .= (string)$diffInMonths . "Months ";
        }
        if (!empty($diffInDays) && $diffInDays >= 1)
        {
            $noty_time .= (string)$diffInDays . "D ";
        }
        if (!empty($diffInHours) && $diffInHours >= 1)
        {
            $noty_time .= (string)$diffInHours . "H ";
        }
        if (!empty($diffInMinutes) && $diffInMinutes >= 1)
        {
            $noty_time .= (string)$diffInMinutes . "M ";
        }
        if (!empty($diffInSeconds) && $diffInSeconds >= 1)
        {
            $noty_time .= (string)$diffInSeconds . "S ";
        }

        if ($user)
        {
            $profile_url = get_user_meta($user_id, "_user_img_url", true);
            if (empty($profile_url))
            {
                $profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
            }
            $temp['profile_url'] = $profile_url;

            if (in_array('artist', $user->roles))
            {
                $temp['bee'] = get_bee_image($user_id);
            }
            else if (in_array('collector', $user->roles))
            {
            }
            else if (in_array('amator', $user->roles))
            {
            }

            $user_data = (array)$user->data;
            $temp['user_name'] = $user_data["user_nicename"];
            $temp['text'] = $text;

            if (isset($post_id) && !empty($post_id) && isset($product) && !empty($product))
            {
                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post_id) , 'single-post-thumbnail');
                array_push($image_url, $image[0]);
                $attachment_ids = $product->get_gallery_image_ids();
                foreach ($attachment_ids as $attachment_id)
                {
                    array_push($image_url, wp_get_attachment_url($attachment_id));
                }
            }
            if (empty($image_url) || $image_url == null || $image_url[0] == null || $image_url[0] == '')
            {
                $image_url[0] = home_url() . "wp-content/uploads/woocommerce-placeholder.png";
            }
            $temp['time'] = $noty_time;
            $temp['image_url'] = $image_url;

            array_push($data['week'], $temp);
        }
    }

    if (!empty($data['today']) || !empty($data['week']))
    {
        $response['success'] = true;
        $response['message'] = __("Notification Get Successfully", "wp-rest-user");
        $response['data'] = $data;
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
    else
    {
        $response['success'] = false;
        $response['message'] = __("No Notification Found", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }
}
function REST_API_get_notification_count()
{
    $user_id = sanitize_text_field($_POST['user_id']);
    if (empty($user_id))
    {
        $response['success'] = false;
        $response['message'] = __("user id is required ", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
    }

    $response['success'] = true;
    $response['message'] = __("Notification Count Get Successfully", "wp-rest-user");
    $response['data'] = get_notification_count($user_id);
    $response['code'] = 400;
    return new WP_REST_Response($response, 200);
}

function api_forget_password()
{
    $username = sanitize_text_field($_POST['username']);
	if (empty($username)) {
		$response['success'] = __("false");
		$response['message'] = __("Email is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
    }

    global $wpdb, $wp_hasher;
    
    if(check_email($username))
    {
        $user_data = get_user_by('email',$username);
        if (!$user_data)
        {
            $response['success'] = __("false");
            $response['message'] = __("Email Not Exist", "wp-rest-user");
            $response['code'] = 400;
            return new WP_REST_Response($response, 200);
        }
        else
        {
            do_action('lostpassword_post');
            $user_login = $user_data->user_login;
            $user_email = $user_data->user_email;
            $key = get_password_reset_key($user_data);
            $message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
            $message .= network_home_url('/') . "\r\n\r\n";
            $message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
            $message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
            $message .= __('To reset your password, visit the following address:') . "\r\n\r\n";
            $message .= network_site_url("wp-login.php?action=rp&key=$key&login=" . rawurlencode($user_login), 'login');

            if (is_multisite())
                $blogname = $GLOBALS['current_site']->site_name;
            else
                $blogname = wp_specialchars_decode(get_option('blogname'), ENT_QUOTES);

            $title = sprintf(__('[%s] Password Reset'), $blogname);
            $title = apply_filters('retrieve_password_title', $title);
            $message = apply_filters('retrieve_password_message', $message, $key);


            $to = $user_email;
            $subject = $title;
            $headers = 'From: webdevelopment8511@gmail.com' . "\r\n" .
            'Reply-To: webdevelopment8511@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    
            if ($message && !mail($to, $subject, $message, $headers))
            {
                $response['success'] = __("false");
                $response['message'] = __("The e-mail could not be sent.Try Again Later", "wp-rest-user");
                $response['code'] = 400;
                return new WP_REST_Response($response, 200);
            }
            else
            {
                $response['success'] = __("true");
                $response['message'] = __("The e-mail sent, Check your e-mail", "wp-rest-user");
                $response['code'] = 400;
                return new WP_REST_Response($response, 200);
            }
        }

    }
    else
    {
        $response['success'] = __("false");
		$response['message'] = __("Invalid Email ", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
    }
}
