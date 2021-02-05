<?php

function get_all_roles() {
	global $wp_roles;
	if ( ! isset( $wp_roles ) )
		$wp_roles = new WP_Roles();

	return $wp_roles->get_names();
}
function validate_mobile($mobile){
    return preg_match('/^[0-9]{10}+$/', $mobile);
}
function REST_is_logged_in($user_id){
    return get_user_meta( $user_id, 'session_tokens', true ); 
}
function generateRandomString($length = 4) {

    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function generatePassword($length = 8) {

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%&*';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
function cst_image_upload($img){

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
	if ( ! function_exists( 'wp_handle_upload' ) ) {
		require_once( ABSPATH . 'wp-admin/includes/file.php' );
	}

	$attes_id = '';
	$name = $img['name'];
	$type = $img['type'];
	$tmp_name = $img['tmp_name'];
	$error = $img['error'];
	$size = $img['size'];
        
	$upload_data = array(
		'name'      => $name,
		'type'      => $type,
		'tmp_name'  => $tmp_name,
		'error'     => $error,
		'size'      => $size
		);
	$uploaded_file = wp_handle_upload($upload_data, array('test_form' => false));

	if (isset($uploaded_file['file'])) {
		$file_loc   =   $uploaded_file['file'];
		$file_name  =   basename($upload_data['name']);
		$file_type  =   wp_check_filetype($file_name);

		$attachment = array(
			'post_mime_type'    => $file_type['type'],
			'post_title'        => preg_replace('/\.[^.]+$/', '', basename($file_name)),
			'post_content'      => '',
			'post_status'       => 'inherit'
		);

		$attach_id      =   wp_insert_attachment($attachment, $file_loc);
		$attach_data    =   wp_generate_attachment_metadata($attach_id, $file_loc);
		wp_update_attachment_metadata($attach_id, $attach_data);
		return $attach_id;
	}
	else
	{
		return false;
	}
}
function get_following_count($user_id){
	global $wpdb;
	if (empty($user_id)){
		return false;
	}
	$results = $wpdb->get_results( "SELECT * FROM `wp_usermeta` WHERE `user_id` = '".$user_id."' AND `meta_key` LIKE '%_follow%' AND `meta_value` = '1'");
	return count($results);
}
function get_follower_count($user_id){
	global $wpdb;
	if (empty($user_id)){
		return false;
	}
	$results = $wpdb->get_results( "SELECT * FROM `wp_usermeta` WHERE `meta_key` LIKE '%".$user_id."_follow%' AND `meta_value` = '1'");
	return count($results);
}
function cst_image_upload_array($img){

	echo "function";
	print_r($img);

    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    $attes_id = array();
    // print_r($_FILES);
    $cnt = count($img['name']);
    for($i=0;$i<$cnt;$i++)
    {
            $name = $img['name'][$i];
            $type = $img['type'][$i];
            $tmp_name = $img['tmp_name'][$i];
            $error = $img['error'][$i];
            $size = $img['size'][$i] ;
        
        $upload_data = array(
            'name'      => $name,
            'type'      => $type,
            'tmp_name'  => $tmp_name,
            'error'     => $error,
            'size'      => $size
            );
        $uploaded_file = wp_handle_upload($upload_data, array('test_form' => false));
        // print_r($uploaded_file);

        if (isset($uploaded_file['file'])) {
            $file_loc   =   $uploaded_file['file'];
            $file_name  =   basename($upload_data['name']);
            $file_type  =   wp_check_filetype($file_name);

            $attachment = array(
                'post_mime_type'    => $file_type['type'],
                'post_title'        => preg_replace('/\.[^.]+$/', '', basename($file_name)),
                'post_content'      => '',
                'post_status'       => 'inherit'
            );

            $attach_id      =   wp_insert_attachment($attachment, $file_loc);
            $attach_data    =   wp_generate_attachment_metadata($attach_id, $file_loc);
            wp_update_attachment_metadata($attach_id, $attach_data);
            array_push($attes_id,$attach_id);
        }
    }
    return $attes_id;
}
function cst_get_cat_name($id){
	$categories = get_terms( ['taxonomy'=>'product_cat', 'hide_empty' => false] );
	foreach($categories as $category)
	{
		if($category->term_id == $id)
		{
			return $category->name;
		}
	}
}
function create_product( $args ){

    if( ! function_exists('wc_get_product_object_type') && ! function_exists('wc_prepare_product_attributes') )
        return false;

    // Get an empty instance of the product object (defining it's type)
    $product = wc_get_product_object_type( $args['type'] );
    if( ! $product )
        return false;

    // Product name (Title) and slug
    $product->set_name( $args['name'] ); // Name (title).
    if( isset( $args['slug'] ) )
        $product->set_name( $args['slug'] );

    // Description and short description:
    $product->set_description( $args['description'] );
    $product->set_short_description( $args['short_description'] );

    // Status ('publish', 'pending', 'draft' or 'trash')
    $product->set_status( isset($args['status']) ? $args['status'] : 'publish' );

    // Visibility ('hidden', 'visible', 'search' or 'catalog')
    $product->set_catalog_visibility( isset($args['visibility']) ? $args['visibility'] : 'visible' );

    // Featured (boolean)
    $product->set_featured(  isset($args['featured']) ? $args['featured'] : false );

    // Virtual (boolean)
    $product->set_virtual( isset($args['virtual']) ? $args['virtual'] : false );

    // Prices
    $product->set_regular_price( $args['regular_price'] );
    $product->set_sale_price( isset( $args['sale_price'] ) ? $args['sale_price'] : '' );
    $product->set_price( isset( $args['sale_price'] ) ? $args['sale_price'] :  $args['regular_price'] );
    if( isset( $args['sale_price'] ) ){
        $product->set_date_on_sale_from( isset( $args['sale_from'] ) ? $args['sale_from'] : '' );
        $product->set_date_on_sale_to( isset( $args['sale_to'] ) ? $args['sale_to'] : '' );
    }

    // Downloadable (boolean)
    $product->set_downloadable(  isset($args['downloadable']) ? $args['downloadable'] : false );
    if( isset($args['downloadable']) && $args['downloadable'] ) {
        $product->set_downloads(  isset($args['downloads']) ? $args['downloads'] : array() );
        $product->set_download_limit(  isset($args['download_limit']) ? $args['download_limit'] : '-1' );
        $product->set_download_expiry(  isset($args['download_expiry']) ? $args['download_expiry'] : '-1' );
    }

    // Taxes
    if ( get_option( 'woocommerce_calc_taxes' ) === 'yes' ) {
        $product->set_tax_status(  isset($args['tax_status']) ? $args['tax_status'] : 'taxable' );
        $product->set_tax_class(  isset($args['tax_class']) ? $args['tax_class'] : '' );
    }

    // SKU and Stock (Not a virtual product)
    if( isset($args['virtual']) && ! $args['virtual'] ) {
        $product->set_sku( isset( $args['sku'] ) ? $args['sku'] : '' );
        $product->set_manage_stock( isset( $args['manage_stock'] ) ? $args['manage_stock'] : false );
        $product->set_stock_status( isset( $args['stock_status'] ) ? $args['stock_status'] : 'instock' );
        if( isset( $args['manage_stock'] ) && $args['manage_stock'] ) {
            $product->set_stock_status( $args['stock_qty'] );
            $product->set_backorders( isset( $args['backorders'] ) ? $args['backorders'] : 'no' ); // 'yes', 'no' or 'notify'
        }
    }

    // Sold Individually
    $product->set_sold_individually( isset( $args['sold_individually'] ) ? $args['sold_individually'] : false );

    // Weight, dimensions and shipping class
    $product->set_weight( isset( $args['weight'] ) ? $args['weight'] : '' );
    $product->set_length( isset( $args['length'] ) ? $args['length'] : '' );
    $product->set_width( isset(  $args['width'] ) ?  $args['width']  : '' );
    $product->set_height( isset( $args['height'] ) ? $args['height'] : '' );
    if( isset( $args['shipping_class_id'] ) )
        $product->set_shipping_class_id( $args['shipping_class_id'] );

    // Upsell and Cross sell (IDs)
    $product->set_upsell_ids( isset( $args['upsells'] ) ? $args['upsells'] : '' );
    $product->set_cross_sell_ids( isset( $args['cross_sells'] ) ? $args['upsells'] : '' );

    // Attributes et default attributes
    if( isset( $args['attributes'] ) )
        $product->set_attributes( wc_prepare_product_attributes($args['attributes']) );
    if( isset( $args['default_attributes'] ) )
        $product->set_default_attributes( $args['default_attributes'] ); // Needs a special formatting

    // Reviews, purchase note and menu order
    $product->set_reviews_allowed( isset( $args['reviews'] ) ? $args['reviews'] : false );
    $product->set_purchase_note( isset( $args['note'] ) ? $args['note'] : '' );
    if( isset( $args['menu_order'] ) )
        $product->set_menu_order( $args['menu_order'] );

    // Product categories and Tags
    if( isset( $args['category_ids'] ) )
        $product->set_category_ids( $args['category_ids'] );
    if( isset( $args['tag_ids'] ) )
        $product->set_tag_ids( $args['tag_ids'] );


    // Images and Gallery
    $product->set_image_id( isset( $args['image_id'] ) ? $args['image_id'] : "" );
    $product->set_gallery_image_ids( isset( $args['gallery_ids'] ) ? $args['gallery_ids'] : array() );

    ## --- SAVE PRODUCT --- ##
	$product_id = $product->save();

    return $product_id;
}
function wc_get_product_object_type( $type ){
    // Get an instance of the WC_Product object (depending on his type)
    if( isset($args['type']) && $args['type'] === 'variable' ){
        $product = new WC_Product_Variable();
    } elseif( isset($args['type']) && $args['type'] === 'grouped' ){
        $product = new WC_Product_Grouped();
    } elseif( isset($args['type']) && $args['type'] === 'external' ){
        $product = new WC_Product_External();
    } else {
        $product = new WC_Product_Simple(); // "simple" By default
    } 
    
    if( ! is_a( $product, 'WC_Product' ) )
        return false;
    else
        return $product;
}
function wc_prepare_product_attributes( $attributes ){
    global $woocommerce;

    $data = array();
    $position = 0;

    foreach( $attributes as $taxonomy => $values ){
        if( ! taxonomy_exists( $taxonomy ) )
            continue;

        // Get an instance of the WC_Product_Attribute Object
        $attribute = new WC_Product_Attribute();

        $term_ids = array();

        // Loop through the term names
        foreach( $values['term_names'] as $term_name ){
            if( term_exists( $term_name, $taxonomy ) )
                // Get and set the term ID in the array from the term name
                $term_ids[] = get_term_by( 'name', $term_name, $taxonomy )->term_id;
            else
                continue;
        }

        $taxonomy_id = wc_attribute_taxonomy_id_by_name( $taxonomy ); // Get taxonomy ID

        $attribute->set_id( $taxonomy_id );
        $attribute->set_name( $taxonomy );
        $attribute->set_options( $term_ids );
        $attribute->set_position( $position );
        $attribute->set_visible( $values['is_visible'] );
        $attribute->set_variation( $values['for_variation'] );

        $data[$taxonomy] = $attribute; // Set in an array

        $position++; // Increase position
    }
    return $data;
}

add_action('rest_api_init', 'wp_rest_user_login_endpoints');
// api => /wp-json/wp/v1/users/user_login
function wp_rest_user_login_endpoints() {
  register_rest_route('wp/v1', 'users/user_login', array(
    'methods' => 'POST',
    'callback' => 'wc_rest_user_login_endpoint_handler',
  ));
}
function wc_rest_user_login_endpoint_handler(){
	$username = sanitize_text_field($_POST['mobile']);
	$password = sanitize_text_field($_POST['password']);

	$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
	$error = new WP_Error();

	if (empty($username)) {
		$response['success'] = __("false");
		$response['message'] = __("Please Mobile No or User Name or Email ID", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	

	if (empty($password)) {
        $response['success'] = __("false");
        $response['message'] = __("Password field is required.", "wp-rest-user");
        $response['code'] = 400;
        return new WP_REST_Response($response, 200);
	}
	
	if (preg_match($pattern, $username) === 1) {
		
		global $wpdb;
		$result = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_key` = 'mobile_number' AND `meta_value` LIKE '%".$username."%'");
		$user = get_user_by( 'id',$result[0]->user_id); 
		if(!empty($user))
		{
			$data =  wp_authenticate($username,$password);
			if(count($data->errors) > 0 && !empty($data->errors))
			{
				foreach($data->errors as $key => $value)
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
				$manager = WP_Session_Tokens::get_instance( $data->ID);
				$token   = $manager->create(time() + 24*60*60*365);
				$response['success'] = __("true");
				$response['message'] = __("Login Successfully", "wp-rest-user");
				$response['token'] = $token;        
				$response['code'] = 200;
				$response['role'] =  implode('[]',$data->roles);
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
		if(validate_mobile($username))
		{
			global $wpdb;
			$result = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_value` LIKE '%".$username."%'");
			$data = get_user_by( 'id',$result[0]->user_id); 
			if( $data ) {
				
				$data =  wp_authenticate($data->user_login,$password);
		  
				if(count($data->errors) > 0 && !empty($data->errors))
				{
					foreach($data->errors as $key => $value)
					{
						$response['success'] = __("false");
						$response['message'] = __($key, "wp-rest-user");
						$response['code'] = 400;
						return new WP_REST_Response($response, 200);
					}
				}
				else
				{
					$manager = WP_Session_Tokens::get_instance( $data->ID);
					$token   = $manager->create(time() + 24*60*60*365);
					$response['success'] = __("true");
					$response['message'] = __("Login Successfully", "wp-rest-user");
					$response['token'] = $token;        
					$response['code'] = 200;
					$response['role'] =  implode('[]',$data->roles);
					$response['customer'] = $data->data;
					return new WP_REST_Response($response, 200);   
				}
			}
			else
			{
				$response['success'] = __("false");
				$response['message'] = __("Mobile number Wrong","wp-rest-user");
				$response['code'] = 400;
				return new WP_REST_Response($response, 200);

			}
		}
		else
		{
			$data =  wp_authenticate($username,$password);
			if(count($data->errors) > 0 && !empty($data->errors))
			{
				foreach($data->errors as $key => $value)
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
				$manager = WP_Session_Tokens::get_instance( $data->ID);
				$token   = $manager->create(time() + 24*60*60*365);
				$response['success'] = __("true");
				$response['message'] = __("Login Successfully", "wp-rest-user");
				$response['token'] = $token;        
				$response['code'] = 200;
				$response['role'] =  implode('[]',$data->roles);
				$response['customer'] = $data->data;
				return new WP_REST_Response($response, 200);   
			}
		}
	}
}

add_action('rest_api_init', 'wp_rest_otp_send_again');
// api => /wp-json/wp/v1/otp_send_again
function wp_rest_otp_send_again(){
  register_rest_route('wp/v1', 'otp_send_again', array(
    'methods' => 'POST',
    'callback' => 'api_otp_send_again',
  ));
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
		$message = "OTP is :".$otp_number;
		

		$headers = 'From: webdevelopment8511@gmail.com' . "\r\n" .
		'Reply-To: webdevelopment8511@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		/* Send Mail */
		$mail_status = mail($to, $subject, $message, $headers);

		if($mail_status)
		{
			$key = 'OTP_'.$user_phone;
			update_option( $key, $otp_number );

			if (!session_id()) {
				session_start();
			}

			$_SESSION['user_otp']=$key;


			$response['success'] = __("true");
			$response['message'] = __("OTP Send In Your Email Address", "wp-rest-user");   
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
		if(validate_mobile($user_phone))
		{
			$response['success'] = __("true");
			$response['message'] = __("Currently Unable to Register via Mobile Number. Please Try With Email", "wp-rest-user");   
			$response['code'] = 200;
			return new WP_REST_Response($response, 200);  			
		}
		else
		{
			$response['success'] = __("false");
			$response['message'] = __("Mobile number Wrong","wp-rest-user");
			$response['code'] = 400;
			return new WP_REST_Response($response, 200);   
		}
	}

}

add_action('rest_api_init', 'wp_rest_user_endpoints');
// wp-json/wp/v1/users/user_register
function wp_rest_user_endpoints(){
  register_rest_route('wp/v1', 'users/user_register', array(
    'methods' => 'POST',
    'callback' => 'wc_rest_user_endpoint_handler',
  ));
}

function wc_rest_user_endpoint_handler(){
	
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
		$response['message'] = __("OTP already Send in Email Address", "wp-rest-user");   
		$response['code'] = 400;
		return new WP_REST_Response($response, 200); 
	}


	if (preg_match($pattern, $user_phone) === 1) 
	{

		$exists = email_exists( $user_phone );
		if ( $exists ) 
		{
			$response['success'] = __("false");
			$response['message'] = __("Email Already exist", "wp-rest-user");   
			$response['code'] = 400;
			return new WP_REST_Response($response, 200); 
		
		} else {
		
		

			$to = $user_phone;
			$subject = 'OTP For Registration';
			
			/* Prepare HTML */
			$otp_number = generateRandomString();
			$message = "OTP is :".$otp_number;
			

			$headers = 'From: webdevelopment8511@gmail.com' . "\r\n" .
			'Reply-To: webdevelopment8511@gmail.com' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();

			/* Send Mail */
			$mail_status = mail($to, $subject, $message, $headers);

			if($mail_status)
			{
				$key = 'OTP_'.$user_phone;
				update_option( $key, $otp_number );

				if (!session_id()) {
					session_start();
				}
				
				if (!isset($_SESSION['user_otp']))
				{
					$_SESSION['user_otp']=$key;
				}

				$response['success'] = __("true");
				$response['message'] = __("OTP Send In Your Email Address", "wp-rest-user");   
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
		if(validate_mobile($user_phone))
		{
			
			global $wpdb;
			$results = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `meta_value` LIKE '%9876543210%'");
			if(count($results) >= 1)
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
			$response['message'] = __("Mobile number Wrong","wp-rest-user");
			$response['code'] = 400;
			return new WP_REST_Response($response, 200);   
		}
	}
}

add_action('rest_api_init', 'wp_rest_home_screen');
// wp-json/wp/v1/home_screen
function wp_rest_home_screen(){
  register_rest_route('wp/v1', '/home_screen', array(
    'methods' => 'GET',
    'callback' => 'api_home_screen',
  ));
}
function api_home_screen(){
	$response['home_screen_text'] = get_option('home_screen_text');
	$response['home_screen_logo'] = home_url().get_option('home_screen_logo');
	$response['home_screen_header_image'] = home_url().get_option('home_screen_header_image');
	$response['success'] = __("true");
    $response['message'] = __("Home Screen data Fatch Successfully","wp-rest-user");
    $response['code'] = 200;

	return new WP_REST_Response($response, 200);
}


add_action('rest_api_init', 'wp_rest_otp_verification');
// wp-json/wp/v1/otp_verify
function wp_rest_otp_verification(){
  register_rest_route('wp/v1', '/otp_verify', array(
    'methods' => 'POST',
    'callback' => 'api_otp_verify',
  ));
}
function api_otp_verify(){
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
	  
	
	$sent_otp = get_option( 'OTP_'.$user_phone);
	if($sent_otp == $otp)
	{		
		$response['success'] = __("true");
		$response['message'] = __("OTP Varified successfully","wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
		
	}
	else
	{
		$response['success'] = __("false");
		$response['message'] = __("Invalid OTP","wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
		
}

add_action('rest_api_init', 'wp_rest_user_id_verify');
// wp-json/wp/v1/user_id_verify
function wp_rest_user_id_verify(){
  register_rest_route('wp/v1', '/user_id_verify', array(
    'methods' => 'POST',
    'callback' => 'api_user_id_verify',
  ));
}
function api_user_id_verify(){
	$user_name = sanitize_text_field($_POST['user_name']);

	if (empty($user_name)) 
	{
		$response['success'] = __("false");
		$response['message'] = __("User ID is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	if(!username_exists($user_name))
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

add_action('rest_api_init', 'wp_rest_create_user');
// wp-json/wp/v1/create_user
function wp_rest_create_user(){
  register_rest_route('wp/v1', '/create_user', array(
    'methods' => 'POST',
    'callback' => 'api_create_user',
  ));
}
function api_create_user(){
	$user_name = sanitize_text_field($_POST['user_name']);
	$role = sanitize_text_field($_POST['role']);
	$user_phone = sanitize_text_field($_POST['user_phone']);
	$profile_image = $_FILES['profile_image'];
	$user_id = 0;
	global $wpdb;
	global $woocommerce;

	if (empty($role)){
		$response['success'] = __("false");
		$response['message'] = __("User Role is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	if (empty($user_phone)){
		$response['success'] = __("false");
		$response['message'] = __("Mobile is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	if (empty($user_name)){
		$response['success'] = __("false");
		$response['message'] = __("User ID is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	
	$get_all_role = get_all_roles();

	if (!array_key_exists(strtolower($role), $get_all_role)) 
	{
		$response['success'] = __("false");
		$response['message'] = __("Role is Not Exist.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	if (empty($user_name)){
		$response['success'] = __("false");
		$response['message'] = __("User ID is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	
	$attach_id = cst_image_upload($profile_image);
 
	$password = generatePassword();
	if(!username_exists($user_name))
	{
		$user_id = wp_insert_user( array(
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
	
	update_user_meta( $user_id,'mobile_number',$user_phone);
	$u = new WP_User( $role );
	$u->set_role($role);
	
	if(!empty($user_id))
	{
		$to = $user_phone;
		$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
		if (preg_match($pattern, $user_phone) === 1) 
		{
			wp_update_user( array( 'ID' => $user_id, 'user_email' => $user_phone ) );
		}

		$subject = 'Artish Login Detail';
		
		/* Prepare HTML */

		$message = "
		username : <b>".$user_name."</b> </br>
		password : <b>".$password."</b>";

		$headers = 'From: webdevelopment8511@gmail.com' . "\r\n" .
		'Reply-To: webdevelopment8511@gmail.com' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();

		/* Send Mail */
		$mail_status = mail($to, $subject, $message, $headers);

		$response['success'] = __("true");
		$response['message'] = __("User Create Successfully.", "wp-rest-user");
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

add_action('rest_api_init', 'wp_rest_user_profile');
// wp-json/wp/v1/users/user_profile
function wp_rest_user_profile(){
  register_rest_route('wp/v1', 'users/user_profile', array(
    'methods' => 'POST',
    'callback' => 'api_user_profile',
  ));
}
function api_user_profile(){

	// ini_set('display_errors', 1);
	// ini_set('display_startup_errors', 1);
	// error_reporting(E_ALL);
	$user_id = sanitize_text_field($_POST['user_id']);

	if(!empty($user_id))
	{

		$user = get_user_by( 'id',$user_id); 
		$profile_url = get_user_meta($user_id, "_user_img_url",true);
		if(empty($profile_url))
		{
			$profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
		}

		if(in_array('artist',$user->roles))
		{

		}
		else if(in_array('collector',$user->roles))
		{

		} 
		else if(in_array('amator',$user->roles))
		{

		}
		$data = (array) $user->data;

		unset($data["user_pass"]);
		unset($data["display_name"]);
        unset($data["user_nicename"]);
        unset($data["user_email"]);
        unset($data["user_url"]);
        unset($data["user_registered"]);
        unset($data["user_activation_key"]);
		unset($data["user_status"]);
		$data['role'] = $user->roles[0];

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
		$response['message'] = __("User ID  is Required", "wp-rest-user");
		$response['code'] = 200;
		return new WP_REST_Response($response, 200);
	}

}

add_action('rest_api_init', 'wp_rest_create_post');
function wp_rest_create_post(){
  register_rest_route('wp/v1', 'create_post', array(
    'methods' => 'POST',
    'callback' => 'api_create_post',
  ));
}
function api_create_post(){
	$user_id = sanitize_text_field($_POST['user_id']);
	if(!empty($user_id))
	{
		$user = get_user_by('id',$user_id); 
		$post_name = $_POST['post_name'];
		$post_title = $_POST['post_title'];		
		$post_content = $_POST['post_content'];
		$media = $_FILES['media'];

		$post_id = wp_insert_post(
			array(
				'post_author'		=>	$user_id,
				'post_name'		=>	$post_title,
				'post_title'		=>	$post_title,
				'post_status'		=>	'publish',
				'post_content'		=> $post_content,
				'post_type'		=>	'post'
			)
		);
		// var_dump($post_id);

		if(!empty($post_id))
		{
			foreach($media as $img)
			{
				set_post_thumbnail( $post_id,cst_image_upload($media));
			}
			$args = array(
						'id'                => false,                  // Pass an existing activity ID to update an existing entry.
						'action'            => 'POST',                     // The activity action - e.g. "Jon Doe posted an update"
						'content'           => $post_content,                     // Optional: The content of the activity item e.g. "BuddyPress is awesome guys!"
						'component'         => 'POST',                  // The name/ID of the component e.g. groups, profile, mycomponent.
						'type'              => 'activity',                  // The activity type e.g. activity_update, profile_updated.
						'primary_link'      => '',                     // Optional: The primary URL for this item in RSS feeds (defaults to activity permalink).
						'user_id'           => $user_id,  // Optional: The user to record the activity for, can be false if this activity is not for a user.
						'item_id'           => $post_id,                  // Optional: The ID of the specific item being recorded, e.g. a blog_id.
						'secondary_item_id' => false,                  // Optional: A second ID used to further filter e.g. a comment_id.
						'recorded_time'     => bp_core_current_time(), // The GMT time that this activity was recorded.
						'hide_sitewide'     => false,                  // Should this be hidden on the sitewide activity stream?
						'is_spam'           => false,                  // Is this activity item to be marked as spam?
						'error_type'        => 'bool'
					);
			bp_activity_add($args);
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

add_action('rest_api_init', 'wp_rest_add_favourite');
function wp_rest_add_favourite(){
  register_rest_route('wp/v1', 'add_favourite', array(
    'methods' => 'POST',
    'callback' => 'api_add_favourite',
  ));
}
function api_add_favourite(){
	$activity_id = sanitize_text_field($_POST['activity_id']);
	$user_id = sanitize_text_field($_POST['user_id']);

	if (empty($activity_id)){
		$response['success'] = __("false");
		$response['message'] = __("Activity ID is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	if (empty($user_id)){
		$response['success'] = __("false");
		$response['message'] = __("User ID is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	if(bp_activity_add_user_favorite($activity_id, $user_id))
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

add_action('rest_api_init', 'wp_rest_get_post');
function wp_rest_get_post(){
  register_rest_route('wp/v1', 'get_post', array(
    'methods' => 'POST',
    'callback' => 'api_get_post',
  ));
}
function api_get_post(){
	global $wpdb;
	$results = $wpdb->get_results( "SELECT * FROM `{$wpdb->prefix}bp_activity` WHERE `action` = 'POST'");
	$posts_arr = array();
	foreach($results as $post)
	{

		$favorite_list = get_user_meta( the_author_meta('ID',$post->item_id),'bp_favorite_activities',true);
		if(in_array($post->id,$favorite_list))
		{
			$temp['favorite'] = true;
		}
		else
		{
			$temp['favorite'] = false;
		}

		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->item_id ), 'single-post-thumbnail' );
		$temp['activity_id'] = $post->id;
		$temp['image_url'] = $image[0];
		$temp['favorite_count'] = bp_activity_get_meta( $post->id, 'favorite_count' );
		array_push($posts_arr,$temp);
	}

	$response['success'] = __("true");
	$response['data'] = $posts_arr;
	$response['message'] = __("Get Post Successfully", "wp-rest-user");
	$response['code'] = 200;
	return new WP_REST_Response($response, 200);

}

add_action('rest_api_init', 'wp_rest_create_product');
function wp_rest_create_product(){
  register_rest_route('wp/v1', 'create_product', array(
    'methods' => 'POST',
    'callback' => 'REST_API_create_product',
  ));
}
function REST_API_create_product(){

	if(!isset($_POST['name']) || empty($_POST['name']))
	{
		$response['success'] = __("false");
		$response['data'] = '';
		$response['message'] = __("name is required Field", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	if(!isset($_POST['description']) || empty($_POST['description']))
	{
		$response['success'] = __("false");
		$response['data'] = '';
		$response['message'] = __("description is required Field", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	if(!isset($_POST['regular_price']) || empty($_POST['regular_price']))
	{
		$response['success'] = __("false");
		$response['data'] = '';
		$response['message'] = __("regular_price is required Field", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	if(!isset($_POST['height']) || empty($_POST['height']))
	{
		$response['success'] = __("false");
		$response['data'] = '';
		$response['message'] = __("height is required Field", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	if(!isset($_POST['width']) || empty($_POST['width']))
	{
		$response['success'] = __("false");
		$response['data'] = '';
		$response['message'] = __("width is required Field", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	if(!isset($_POST['category_ids']) || empty($_POST['category_ids']))
	{
		$response['success'] = __("false");
		$response['data'] = '';
		$response['message'] = __("category id is required Field", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	if(!isset($_POST['name']) || empty($_POST['name']))
	{
		$response['success'] = __("false");
		$response['data'] = '';
		$response['message'] = __("name is required Field", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	if(!isset($_POST['description']) || empty($_POST['description']))
	{
		$response['success'] = __("false");
		$response['data'] = '';
		$response['message'] = __("description is required Field", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	if(!isset($_POST['user_id']) || empty($_POST['user_id']))
	{
		$response['success'] = __("false");
		$response['data'] = '';
		$response['message'] = __("user ID is required Field", "wp-rest-user");
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
	$stock_qty = '-1';
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

	if(isset($_POST['name']) && !empty($_POST['name']))
	{
		$description = $_POST['name'];
	}
	if(isset($_POST['user_id']) && !empty($_POST['user_id']))
	{
		$user_id = $_POST['user_id'];
	}
	if(isset($_POST['description']) && !empty($_POST['description']))
	{
		$short_description =  $_POST['description'];
	}
	if(isset($_POST['short_description']) && !empty($_POST['short_description']))
	{
		$short_description = $_POST['short_description'];
	}
	if(isset($_POST['reviews_allowed']) && !empty($_POST['reviews_allowed']))
	{ 
		$reviews_allowed = $_POST['reviews_allowed']; 
	}
	if(isset($_POST['regular_price']) && !empty($_POST['regular_price']))
	{ 
		$regular_price = $_POST['regular_price']; 
	}
	if(isset($_POST['status']) && !empty($_POST['status']))
	{ 
		$status = $_POST['status']; 
	}
	if(isset($_POST['slug']) && !empty($_POST['slug']))
	{ 
		$slug = $_POST['slug']; 
	}
	if(isset($_POST['featured']) && !empty($_POST['featured']))
	{ 
		$featured = $_POST['featured']; 
	}
	if(isset($_POST['visibility']) && !empty($_POST['visibility']))
	{ 
		$visibility = $_POST['visibility']; 
	}
	if(isset($_POST['sale_price']) && !empty($_POST['sale_price']))
	{ 
		$sale_price = $_POST['sale_price']; 
	}
	if(isset($_POST['virtual']) && !empty($_POST['virtual']))
	{ 
		$virtual = $_POST['virtual']; 
	}
	if(isset($_POST['sale_to']) && !empty($_POST['sale_to']))
	{ 
		$sale_to = $_POST['sale_to']; 
	}
	if(isset($_POST['sale_from']) && !empty($_POST['sale_from']))
	{ 
		$sale_from = $_POST['sale_from']; 
	}
	if(isset($_FILES['downloads[]']) && !empty($_FILES['downloads[]']))
	{ 
		$downloads = cst_image_upload_array($_FILES['downloads[]']); 
	}
	if(isset($_POST['downloadable']) && !empty($_POST['downloadable']))
	{ 
		$downloadable = $_POST['downloadable']; 
	}
	if(isset($_POST['download_expiry']) && !empty($_POST['download_expiry']))
	{ 
		$download_expiry = $_POST['download_expiry']; 
	}
	if(isset($_POST['download_limit']) && !empty($_POST['download_limit']))
	{ 
		$download_limit = $_POST['download_limit']; 
	}
	if(isset($_POST['manage_stock']) && !empty($_POST['manage_stock']))
	{ 
		$manage_stock = $_POST['manage_stock']; 
	}
	if(isset($_POST['sku']) && !empty($_POST['sku']))
	{ 
		$sku = $_POST['sku']; 
	}
	if(isset($_POST['stock_qty']) && !empty($_POST['stock_qty']))
	{ 
		$stock_qty = $_POST['stock_qty']; 
	}
	if(isset($_POST['stock_status']) && !empty($_POST['stock_status']))
	{ 
		$stock_status = $_POST['stock_status']; 
	}
	if(isset($_POST['sold_individually']) && !empty($_POST['sold_individually']))
	{ 
		$sold_individually = $_POST['sold_individually']; 
	}
	if(isset($_POST['backorders']) && !empty($_POST['backorders']))
	{ 
		$backorders = $_POST['backorders']; 
	}
	if(isset($_POST['length']) && !empty($_POST['length']))
	{ 
		$length = $_POST['length']; 
	}
	if(isset($_POST['weight']) && !empty($_POST['weight']))
	{ 
		$weight = $_POST['weight']; 
	}
	if(isset($_POST['height']) && !empty($_POST['height']))
	{ 
		$height = $_POST['height']; 
	}
	if(isset($_POST['width']) && !empty($_POST['width']))
	{ 
		$width = $_POST['width']; 
	}
	if(isset($_POST['note']) && !empty($_POST['note']))
	{ 
		$note = $_POST['note']; 
	}
	if(isset($_POST['reviews']) && !empty($_POST['reviews']))
	{ 
		$reviews = $_POST['reviews']; 
	}
	if(isset($_POST['tag_ids']) && !empty($_POST['tag_ids']))
	{ 
		$tag_ids = $_POST['tag_ids']; 
	}
	if(isset($_POST['category_ids']) && !empty($_POST['category_ids']))
	{ 
		$category_ids = $_POST['category_ids']; 
	}
	if(isset($_FILES['gallery_ids']) && !empty($_FILES['gallery_ids']))
	{ 
		// $gallery_ids = $_POST['gallery_ids']; 
		$gallery_ids = cst_image_upload_array($_FILES['gallery_ids']); 
	}
	if(isset($_FILES['image']) && !empty($_FILES['image']))
	{ 
		$image_id = cst_image_upload($_FILES['image']); 
		// echo "image";
		// print_r($image_id);
	}
	if(isset($_POST['size']) && !empty($_POST['size']))
	{ 
		$image_id = $_POST['size']; 
	}
	// exit;
	$product_id = create_product( array(
		'type'               => '', // Simple product by default
		'name'               => __($name,"woocommerce"),
		'description'        => __($description,"woocommerce"),
		'short_description'  => __($short_description ,"woocommerce"),
		'regular_price'      => $regular_price,
		'reviews_allowed'    => $reviews_allowed,
		'slug'               => $slug,
		'status'             => $status,
		'featured'           => $featured,
		'virtual'            => $virtual,
		'sale_price'         => $sale_price,
		'sale_from'          => $sale_from,
		'sale_to'            => $sale_to,
		'downloadable'       => $downloadable,
		'downloads'          => $downloads,
		'download_limit'     => $download_limit,
		'download_expiry'    => $download_expiry,
		'sku'                => $sku,
		'manage_stock'       => $manage_stock,
		'stock_status'       => $stock_status,
		'stock_qty'          => $stock_qty,
		'backorders'         => $backorders,
		'sold_individually'  => $sold_individually,
		'weight'             => $weight,
		'length'             => $length,
		'width'              => $width,
		'height'             => $height,
		'reviews'            => $reviews,
		'note'               => $note,
		'category_ids'       => $category_ids,
		'tag_ids'            => $tag_ids,
		'image_id'           => $image_id,
		'gallery_ids'        => $gallery_ids,
		'attributes'         => array(
			'size' =>  array(
				'term_names' => array($size),
				'is_visible' => true,
				'for_variation' => false,
			),
		),
	) );  


	$arg = array(
		'ID' => $product_id,
		'post_author' => $user_id,
	);
	wp_update_post( $arg );


	$response['success'] = __("true");
	$response['data'] = $product_id;
	$response['message'] = __("Product Create Successfully", "wp-rest-user");
	$response['code'] = 200;
	return new WP_REST_Response($response, 200);
}

add_action('rest_api_init', 'wp_rest_get_product');
function wp_rest_get_product(){
  register_rest_route('wp/v1', 'get_product', array(
    'methods' => 'POST',
    'callback' => 'REST_API_get_product',
  ));
}
function REST_API_get_product(){
	$args = array(
		'post_type'   => 'product',
		'numberposts' => 10,
		'orderby'     => 'date',
        'order'       => 'DESC'
	);
	$loop = new WP_Query( $args );
	$data = array();
	while ( $loop->have_posts() ) : $loop->the_post();
		global $product;
		$_temp = array();
		$image_url = array();
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' );
		array_push($image_url,$image[0]);
		$attachment_ids = $product->get_gallery_image_ids();
		$_temp = $product->get_data();
		foreach( $attachment_ids as $attachment_id ) {
			array_push($image_url,wp_get_attachment_url( $attachment_id ));
		}
		$vendor_id = get_post_field( 'post_author', get_the_ID());

		$like_count = get_product_like(get_the_ID());
		if(empty($like_count))
		{
			$like_count = 0;
		}
		$user = "Admin";
		if(!empty($vendor_id))
		{
			$vendor = get_userdata( $vendor_id );
			$user = $vendor->user_login;
		}

		$profile_url = get_user_meta($user->data->ID, "_user_img_url",true);
		if(empty($profile_url))
		{
			$profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
		}
		$temp['category'] = (string) cst_get_cat_name($_temp['category_ids'][0]);
		$temp['category_id'] = (string) $_temp['category_ids'][0];
		$temp['product_id'] = (string) $_temp['id'];
		$temp['title'] = (string) $_temp['name'];
		$temp['date_created'] = (string) $_temp['date_created']->date("Y");
		$temp['price'] = (string) $_temp['price'];
		$temp['height'] = (string) $_temp['length'];
		$temp['width'] = (string) $_temp['width'];
		$temp['user_name'] = (string) $user;
		$temp['short_description'] = (string) $_temp['short_description'];
		$temp['user_profile_url'] = (string) $profile_url;
		$temp['like_count'] = (string) $like_count;
		$temp['bee'] = 'https://webdevelopment33.com/artsbee/wp-content/uploads/2021/02/WhatsApp-Image-2020-11-22-at-22.27-4.png';
		if(empty($image_url) || $image_url == null || $image_url[0] == null || $image_url[0] == '')
		{
			$image_url[0] = home_url()."wp-content/uploads/woocommerce-placeholder.png";
		}
		$temp['image_url'] = $image_url;
		array_push($data,$temp);

	endwhile;
	wp_reset_query();

	$response['success'] = __("true");
	$response['message'] = __("Get Product List  Successfully", "wp-rest-user");
	$response['code'] = 200;
	$response['data'] = $data;
	return new WP_REST_Response($response, 200);

}
add_action('rest_api_init', 'wp_rest_product_like');
function wp_rest_product_like(){
  register_rest_route('wp/v1', 'product_like', array(
    'methods' => 'POST',
    'callback' => 'REST_API_product_like',
  ));
}
function REST_API_product_like()
{
	// print_r($_POST);
	$user_id = sanitize_text_field($_POST['user_id']);
	if(empty($user_id))
	{
		$response['success'] = __("false");
		$response['message'] = __("User ID  is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	$product_id = sanitize_text_field($_POST['product_id']);
	if(empty($product_id))
	{
		$response['success'] = __("false");
		$response['message'] = __("Product ID  is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	if(get_user_meta($user_id,$product_id.'_like',true))
	{
		update_user_meta($user_id,$product_id.'_like',0);
	}
	else
	{
		update_user_meta($user_id,$product_id.'_like',1);
	}
	$response['success'] = __("true");
	$response['message'] = __("Like Update Successfully", "wp-rest-user");
	$response['code'] = 200;
	return new WP_REST_Response($response, 200);
}
function get_product_like($product_id)
{
 	// $product_id = sanitize_text_field($_POST['product_id']);
	if(empty($product_id))
	{
		return false;
	}
	global $wpdb;
	$result = $wpdb->get_results("SELECT count(*) as count_like FROM `wp_usermeta` WHERE `meta_key` = '".$product_id."_like' AND `meta_value` = '1'");
	return $result[0]->count_like;

}
add_action('rest_api_init', 'wp_rest_myfavourite_product');
function wp_rest_myfavourite_product(){
  register_rest_route('wp/v1', 'myfavourite_product', array(
    'methods' => 'POST',
    'callback' => 'REST_API_myfavourite_product',
  ));
}
function REST_API_myfavourite_product()
{
 	$user_id = sanitize_text_field($_POST['user_id']);
	if(empty($user_id))
	{
		$response['success'] = __("false");
		$response['message'] = __("User ID is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	global $wpdb;
	$response_arr = $wpdb->get_results("SELECT * FROM `wp_usermeta` WHERE `user_id` = '".$user_id."' AND `meta_key` LIKE '%_like%' AND `meta_value` = '1'");
	$post_id_arr = array();
	foreach($response_arr as $temp_new)
	{
		array_push($post_id_arr,explode('_',$temp_new->meta_key)[0]);
	}

	$args = array(
		'post_type'   => 'product',
		'post__in'	  => $post_id_arr,
		'numberposts' => -1,
		'orderby'     => 'date',
        'order'       => 'DESC'
	);
	$loop = new WP_Query( $args );
	// print_r($loop);
	// exit;
	$data = array();

	while ( $loop->have_posts() ) : $loop->the_post();
	
		global $product;
		$_temp = array();
		$image_url = array();
		$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' );
		array_push($image_url,$image[0]);
		$attachment_ids = $product->get_gallery_image_ids();
		$_temp = $product->get_data();
		// print_r($_temp);
		foreach( $attachment_ids as $attachment_id ) {
			array_push($image_url,wp_get_attachment_url( $attachment_id ));
		}
		$vendor_id = get_post_field( 'post_author', get_the_ID());

		$like_count = get_product_like(get_the_ID());
		if(empty($like_count))
		{
			$like_count = 0;
		}
		$user = "Admin";
		if(!empty($vendor_id))
		{
			$vendor = get_userdata( $vendor_id );
			$user = $vendor->user_login;
		}

		$temp['product_id'] = $_temp['id'];
		$temp['category'] = cst_get_cat_name($_temp['category_ids'][0]);
		$temp['name'] = $_temp['name'];
		$temp['date_created'] = $_temp['date_created']->date("Y");
		$temp['price'] = $_temp['price'];
		$temp['length'] = $_temp['length'];
		$temp['width'] = $_temp['width'];
		$temp['user'] = $user;
		$temp['user_id'] = $vendor_id;
		$temp['like_count'] = $like_count;
		$temp['bee'] = 'blue';
		$temp['image_url'] = $image_url;
		array_push($data,$temp);

	endwhile;

	wp_reset_query();

	$response['success'] = __("true");
	$response['message'] = __("Get MyFavourite Product List  Successfully", "wp-rest-user");
	$response['code'] = 200;
	$response['data'] = $data;
	return new WP_REST_Response($response, 200);
}

add_action('rest_api_init', 'wp_rest_mycollection_product');
function wp_rest_mycollection_product(){
  register_rest_route('wp/v1', 'mycollection_product', array(
    'methods' => 'POST',
    'callback' => 'REST_API_mycollection_product',
  ));
}
function REST_API_mycollection_product()
{
 	$user_id = sanitize_text_field($_POST['user_id']);
	if(empty($user_id))
	{
		$response['success'] = __("false");
		$response['message'] = __("User ID is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	$args = array(
		'numberposts' => -1,
		 'meta_key' => '_customer_user',
		 'meta_value' => $user_id,
		 'post_type' => 'shop_order',
		 'post_status' => array_keys( wc_get_is_paid_statuses() ),
		 'orderby'     => 'date',
		 'order'       => 'DESC',
	 );
	 $data = array();
	 $order_list = get_posts($args);

	foreach($order_list as $order)
	{

		$order = new WC_Order( $order->ID );
		$items = $order->get_items();
		foreach ( $items as $item ) {
			$product_name = $item['name'];
			$product = wc_get_product($item['product_id']);

			$_temp = array();
			$image_url = ''; //array();
			$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' );
			if(!empty($image[0]))
			{
				// array_push($image_url,$image[0]);
				$image_url = $image[0];
			}
			$attachment_ids = $product->get_gallery_image_ids();
			$_temp = $product->get_data();

			foreach( $attachment_ids as $attachment_id ) {
				$_prd_img_url = wp_get_attachment_url( $attachment_id );
				if(!empty($_prd_img_url))
				{
					array_push($image_url,$_prd_img_url);
				}
			}
			$vendor_id = get_post_field( 'post_author', get_the_ID());

			$like_count = get_product_like(get_the_ID());
			if(empty($like_count))
			{
				$like_count = 0;
			}
			$user = "Admin";
			if(!empty($vendor_id))
			{
				$vendor = get_userdata( $vendor_id );
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
			$temp['bee'] = 'blue';
			$temp['image_url'] = $image_url;
			// print_r($temp);
			array_push($data,$temp);
		}
	}


	wp_reset_query();

	$response['success'] = __("true");
	$response['message'] = __("Get MyCollection Product List  Successfully", "wp-rest-user");
	$response['code'] = 200;
	$response['data'] = $data;
	return new WP_REST_Response($response, 200);
}
add_action('rest_api_init', 'wp_rest_following');
function wp_rest_following(){
  register_rest_route('wp/v1', 'following', array(
    'methods' => 'POST',
    'callback' => 'REST_API_following',
  ));
}
function REST_API_following(){
	// print_r($_POST);
	// exit;

	$current_user_id = sanitize_text_field($_POST['current_user_id']);
	$follow_user_id = sanitize_text_field($_POST['follow_user_id']);
	global $wpdb;

	if (empty($current_user_id)){
		$response['success'] = __("false");
		$response['message'] = __("Current User ID is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	if (empty($follow_user_id)){
		$response['success'] = __("false");
		$response['message'] = __("Follow User ID is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	if(get_user_meta($current_user_id,$follow_user_id."_follow",true))
	{
		update_user_meta($current_user_id,$follow_user_id."_follow",0);
	}
	else
	{
		update_user_meta($current_user_id,$follow_user_id."_follow",1);
	}
	$response['success'] = __("true");
	$response['data'] = '';
	$response['message'] = __("Update Favorite Successfully", "wp-rest-user");
	$response['code'] = 200;
	return new WP_REST_Response($response, 200);
}

add_action('rest_api_init', 'wp_rest_get_following');
function wp_rest_get_following(){
  register_rest_route('wp/v1', 'get_following', array(
    'methods' => 'POST',
    'callback' => 'api_get_following',
  ));
}
function api_get_following(){
	$user_id = sanitize_text_field($_POST['user_id']);
	global $wpdb;

	if (empty($user_id)){
		$response['success'] = __("false");
		$response['message'] = __("User ID is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	$results = $wpdb->get_results( "SELECT * FROM `wp_usermeta` WHERE `user_id` = '".$user_id."' AND `meta_key` LIKE '%_follow%' AND `meta_value` = '1'");
	$user_arr = array();

	foreach($results as $result)
	{	
		$temp = array();
		$user = get_user_by('id',explode('_',$result->meta_key)[0]); 
		$profile_url = get_user_meta($user->data->ID, "_user_img_url",true);
		if(empty($profile_url))
		{
			$profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
		}
		$temp['user_id'] = $user->data->ID;
		array_push($user_arr,$temp);
	}
	$response['success'] = __("true");
	$response['data'] = $user_arr;
	$response['message'] = __("Get Favorite Successfully", "wp-rest-user");
	$response['code'] = 200;
	return new WP_REST_Response($response, 200);
}

add_action('rest_api_init', 'wp_rest_get_follower');
function wp_rest_get_follower(){
  register_rest_route('wp/v1', 'get_follower', array(
    'methods' => 'POST',
    'callback' => 'api_get_follower',
  ));
}
function api_get_follower(){
	$user_id = sanitize_text_field($_POST['user_id']);
	global $wpdb;

	if (empty($user_id)){
		$response['success'] = __("false");
		$response['message'] = __("User ID is required.", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	$results = $wpdb->get_results( "SELECT * FROM `wp_usermeta` WHERE `meta_key` LIKE '%".$user_id."_follow%' AND `meta_value` = '1'");
	$user_arr = array();

	foreach($results as $result)
	{	
		$temp = array();
		$user = get_user_by('id',explode('_',$result->meta_key)[0]); 
		$profile_url = get_user_meta($user->data->ID, "_user_img_url",true);
		if(empty($profile_url))
		{
			$profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
		}
		$temp['user_id'] = $user->data->ID;
		array_push($user_arr,$temp);
	}
	$response['success'] = __("true");
	$response['data'] = $user_arr;
	$response['message'] = __("Get Favorite Successfully", "wp-rest-user");
	$response['code'] = 200;
	return new WP_REST_Response($response, 200);
}

add_action('rest_api_init', 'wp_rest_get_product_category');
function wp_rest_get_product_category(){
  register_rest_route('wp/v1', 'get_product_category', array(
    'methods' => 'POST',
    'callback' => 'get_product_category',
  ));
}
function get_product_category(){
	$cat = array();
	$categories = get_terms( ['taxonomy'=>'product_cat', 'hide_empty' => false] );
	foreach($categories as $category)
	{
		$temp['id'] = $category->term_id;
		$temp['name'] = $category->name;
		array_push($cat,$temp);
	}

	return $cat;
}

add_action('rest_api_init', 'wp_rest_get_product_artist_vice');
function wp_rest_get_product_artist_vice(){
  register_rest_route('wp/v1', 'get_product_artist_vice', array(
    'methods' => 'POST',
    'callback' => 'get_product_artist_vice',
  ));
}
function get_product_artist_vice(){

	$users = get_users( array( 'fields' => array( 'ID' ) ) );

	$artish = array();
	foreach($users as $user_id){
	
		$user = get_user_by( 'id',$user_id->ID); 
		$profile_url = get_user_meta($user_id->ID, "_user_img_url",true);
		if(empty($profile_url))
		{
			$profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
		}
		$temp = (array) $user->data;

		unset($temp["user_pass"]);
		unset($temp["display_name"]);
        unset($temp["user_nicename"]);
        unset($temp["user_email"]);
        unset($temp["user_url"]);
        unset($temp["user_registered"]);
        unset($temp["user_activation_key"]);
		unset($temp["user_status"]);

		$temp['role'] = $user->roles[0];
		$temp['follower'] = get_follower_count($user_id->ID);
		$products = wc_get_products(array('status'=>'publish','limit'=> -1,'orderby' =>  'date_created','order' => 'ASC','author'=> $user->ID));
		if(!empty($products))
		{
			$temp['product'] = array();
			foreach($products as $product)
			{
				$_temp = array();
				$image_url = array();
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' );
				if(!empty($image[0]))
				{
					array_push($image_url,$image[0]);
				}
				$attachment_ids = $product->get_gallery_image_ids();
				$_temp = $product->get_data();

				foreach( $attachment_ids as $attachment_id ) {
					array_push($image_url,wp_get_attachment_url( $attachment_id ));
				}
				$vendor_id = get_post_field( 'post_author', $_temp['id']);
		
				$like_count = get_product_like($_temp['id']);
				if(empty($like_count)){$like_count = 0;}
		
				$product_temp['product_id'] = (string) $_temp['id'];
				$product_temp['name'] = (string) $_temp['name'];
				$product_temp['category_id'] = (string) $_temp['category_ids'][0];
				$product_temp['category'] = (string) cst_get_cat_name($_temp['category_ids'][0]);
				$product_temp['length'] = (string) $_temp['length'];
				$product_temp['width'] = (string) $_temp['width'];
				$product_temp['price'] = (string) $_temp['price'];
				$product_temp['like_count'] = (string) $like_count;
				$product_temp['bee'] = 'blue';
				$product_temp['date_created'] = (string) $_temp['date_created']->date("Y-m-d H:i:s");
				$temp['last_product'] = $_temp['date_created']->date("Y-m-d H:i:s");
				if(empty($image_url))
				{
					$image_url[0] = home_url()."wp-content/uploads/woocommerce-placeholder.png";
				}
				$product_temp['image_url'] = $image_url;
				array_push($temp['product'],$product_temp);

			}
			array_push($artish,$temp);
		}
	}

	foreach ($artish as $key => $part) {
			$sort[$key] = $part['follower'];
	}
		array_multisort($sort, SORT_DESC, $artish);

   $response['success'] = __("true");
	$response['data'] = $artish;
	$response['message'] = __("Get New Product Artist vice Successfully", "wp-rest-user");
	$response['code'] = 200;
	return new WP_REST_Response($response, 200);
}

add_action('rest_api_init', 'wp_rest_get_best_seller');
function wp_rest_get_best_seller(){
  register_rest_route('wp/v1', 'get_best_seller', array(
    'methods' => 'POST',
    'callback' => 'get_best_seller',
  ));
}
function get_best_seller(){
	global $wpdb;
	$limit = 10;

	if(isset($_POST['limit']) && !empty($_POST['limit']))
	{
		$limit = $_POST['limit'];
	}

	$results = $wpdb->get_results( "SELECT post.post_author as user_id ,sum(meta.meta_value) as product_sell FROM wp_posts as post,wp_postmeta as meta WHERE post.post_type = 'product' AND post.ID = meta.post_id AND meta.meta_key = 'total_sales' group by post_author ORDER BY post.post_date DESC limit ".$limit);

	$artish = array();
	foreach($results as $user_id){
	
		$user = get_user_by( 'id',$user_id->user_id); 
		$profile_url = get_user_meta($user_id->user_id, "_user_img_url",true);
		if(empty($profile_url))
		{
			$profile_url = "https://www.gravatar.com/avatar/3563a715b55823547d38b3bc50fdadcf?s=96&r=g&d=mm";
		}
		$temp = (array) $user->data;

		unset($temp["user_pass"]);
		unset($temp["display_name"]);
        unset($temp["user_nicename"]);
        unset($temp["user_email"]);
        unset($temp["user_url"]);
        unset($temp["user_registered"]);
        unset($temp["user_activation_key"]);
		unset($temp["user_status"]);

		$temp['role'] = $user->roles[0];
		$temp['follower'] = get_follower_count($user_id->user_id);
		$products = wc_get_products(array('status'=>'publish','limit'=> -1,'orderby' =>  'date_created','order' => 'ASC','author'=> $user->ID));
		if(!empty($products))
		{
			$temp['product'] = array();
			foreach($products as $product)
			{
				$_temp = array();
				$image_url = array();
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'single-post-thumbnail' );
				if(!empty($image[0]))
				{
					array_push($image_url,$image[0]);
				}
				$attachment_ids = $product->get_gallery_image_ids();
				$_temp = $product->get_data();

				foreach( $attachment_ids as $attachment_id ) {
					array_push($image_url,wp_get_attachment_url( $attachment_id ));
				}
				$vendor_id = get_post_field( 'post_author', $_temp['id']);
		
				$like_count = get_product_like($_temp['id']);
				if(empty($like_count)){$like_count = 0;}
		
				$product_temp['product_id'] = (string) $_temp['id'];
				$product_temp['name'] = (string) $_temp['name'];
				$product_temp['category_id'] = (string) $_temp['category_ids'][0];
				$product_temp['category'] = (string) cst_get_cat_name($_temp['category_ids'][0]);
				$product_temp['length'] = (string) $_temp['length'];
				$product_temp['width'] = (string) $_temp['width'];
				$product_temp['price'] = (string) $_temp['price'];
				$product_temp['like_count'] = (string) $like_count;
				$product_temp['bee'] = 'blue';
				$product_temp['date_created'] = (string) $_temp['date_created']->date("Y-m-d H:i:s");
				$temp['last_product'] = $_temp['date_created']->date("Y-m-d H:i:s");
				if(empty($image_url))
				{
					$image_url[0] = home_url()."wp-content/uploads/woocommerce-placeholder.png";
				}
				$product_temp['image_url'] = $image_url;
				array_push($temp['product'],$product_temp);

			}
			array_push($artish,$temp);
		}
	}

	foreach ($artish as $key => $part) {
			$sort[$key] = strtotime($part['last_product']);
	}
		array_multisort($sort, SORT_DESC, $artish);

   $response['success'] = __("true");
	$response['data'] = $artish;
	$response['message'] = __("Get Best Seller Successfully", "wp-rest-user");
	$response['code'] = 200;
	return new WP_REST_Response($response, 200);
}

add_action('rest_api_init', 'rest_api_reset_get_cart');
function rest_api_reset_get_cart(){
  register_rest_route('wp/v1', 'get_cart', array(
    'methods' => 'POST',
    'callback' => 'get_cart',
  ));
}
function get_cart(){
	$user_id = sanitize_text_field($_POST['user_id']);
	if(empty($user_id))
	{
		$response['success'] = __("false");
		$response['message'] = __("User ID  is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}

	$session_handler = new WC_Session_Handler();
	$session = $session_handler->get_session($user_id);
	$cart_items = unserialize($session['cart']);

    function getmytotal($quet,$priced)
    {
       $subtoal = $quet*$priced;
       $total = $total+$subtoal;
        return $total;
    }
	if(!empty($cart_items) && $cart_items)
	{
		// print_r($cart_items);
		$itmeaarray = array();
		$finaltoal = '';
		foreach($cart_items as $cart_item_key => $cart_item ) {
			if(!empty($cart_item_key))
			{
				$product_name = get_the_title($cart_item['product_id']);
				$total = getmytotal($cart_item['quantity'],$cart_item['line_total']);
				$newarray = array('product_id'=>$cart_item['product_id'],'product_name'=>$product_name,'quantity'=>$cart_item['quantity'],'price'=>number_format((float)$cart_item['line_total'], 2, '.', ''));
				$finaltoal = $finaltoal + $total;
				array_push($itmeaarray,$newarray);
			}
		}
		if(!empty($itmeaarray))
		{
			$response['success'] = true;
			$response['message'] = 'get cart successfully';
			$response['data'] = $itmeaarray;
			$response['total'] = number_format((float)$finaltoal, 2, '.', '');
		}
		else {
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

add_action('rest_api_init', 'rest_api_add_to_cart');
function rest_api_add_to_cart(){
  register_rest_route('wp/v1', 'add_to_cart', array(
    'methods' => 'POST',
    'callback' => 'add_to_cart',
  ));
}
function add_to_cart(){
	$user_id = sanitize_text_field($_POST['user_id']);
	if(empty($user_id))
	{
		$response['success'] = __("false");
		$response['message'] = __("User ID  is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	wp_set_current_user($user_id);

	$product_id = sanitize_text_field($_POST['product_id']);
	if(empty($product_id))
	{
		$response['success'] = __("false");
		$response['message'] = __("Product ID  is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	$quantity = sanitize_text_field($_POST['quantity']);
	$quantity = 1;
	
    global $woocommerce,$wpdb;

	$array = $wpdb->get_results("select session_value from {$wpdb->prefix}woocommerce_sessions where session_key = '".$user_id."'");

    if(empty($array))
    {
        $daasd = 'a:7:{s:4:"cart";s:6:"a:0:{}";s:11:"cart_totals";s:367:"a:15:{s:8:"subtotal";i:0;s:12:"subtotal_tax";i:0;s:14:"shipping_total";i:0;s:12:"shipping_tax";i:0;s:14:"shipping_taxes";a:0:{}s:14:"discount_total";i:0;s:12:"discount_tax";i:0;s:19:"cart_contents_total";i:0;s:17:"cart_contents_tax";i:0;s:19:"cart_contents_taxes";a:0:{}s:9:"fee_total";i:0;s:7:"fee_tax";i:0;s:9:"fee_taxes";a:0:{}s:5:"total";i:0;s:9:"total_tax";i:0;}";s:15:"applied_coupons";s:6:"a:0:{}";s:22:"coupon_discount_totals";s:6:"a:0:{}";s:26:"coupon_discount_tax_totals";s:6:"a:0:{}";s:21:"removed_cart_contents";s:6:"a:0:{}";s:8:"customer";s:817:"a:26:{s:2:"id";s:1:"1";s:13:"date_modified";s:25:"2021-01-18t04:45:01+00:00";s:8:"postcode";s:6:"395001";s:4:"city";s:4:"test";s:9:"address_1";s:15:"testing-address";s:7:"address";s:15:"testing-address";s:9:"address_2";s:4:"test";s:5:"state";s:2:"gj";s:7:"country";s:2:"in";s:17:"shipping_postcode";s:0:"";s:13:"shipping_city";s:0:"";s:18:"shipping_address_1";s:0:"";s:16:"shipping_address";s:0:"";s:18:"shipping_address_2";s:0:"";s:14:"shipping_state";s:2:"gj";s:16:"shipping_country";s:2:"in";s:13:"is_vat_exempt";s:0:"";s:19:"calculated_shipping";s:0:"";s:10:"first_name";s:4:"test";s:9:"last_name";s:4:"test";s:7:"company";s:4:"test";s:5:"phone";s:10:"7984563120";s:5:"email";s:30:"admin@web.webdevelopment33.com";s:19:"shipping_first_name";s:0:"";s:18:"shipping_last_name";s:0:"";s:16:"shipping_company";s:0:"";}";}';
        $session_aad = '1611316742';
		$wpdb->insert('wpe3_woocommerce_sessions', array('session_key' => $user_id, 'session_value' => @$daasd,'session_expiry'=>$session_aad) ); 
    }
    $data =$array[0]->session_value;

    function getmytotal($quet,$priced){
       $subtoal = $quet*$priced;
       $total = $total+$subtoal;
        return $total;
    }
    
	$cart_data=unserialize($data);
	$product = wc_get_product( $product_id );
	$cart_data['cart'] = unserialize($cart_data['cart']);
	$old_quantity = 0;
	$new_quantity = 0;
	$old_kiey = '';
	
	foreach($cart_data['cart'] as $key => $value){
		if($value['product_id'] == $product_id){
			$old_quantity = $value['quantity'];
			$old_kiey = $key;
			break;
		}
	}

	$new_quantity = $old_quantity + $quantity;
	if($old_kiey == '')
	{
		$kiey = 'stirgnga'.$product_id.rand();
	}
	else{
		$kiey = $old_kiey;
	}


	$cart_data['cart'][$kiey]=array(
		'key' => $kiey,
		'product_id' => $product_id,
		'variation_id' => 0,
		'variation' => array(),
		'quantity' => $new_quantity,
		'line_tax_data' => array(
			'subtotal' => array(),
			'total' => array()
		),
	'line_subtotal' => $product->get_price(),
	'line_subtotal_tax' => 0,
	'line_total' => $product->get_price(),
	'line_tax' => 0,
	);
	
	$cart_data['cart'] = serialize($cart_data['cart']);
	$updateddata = serialize($cart_data);
	$sql ="UPDATE {$wpdb->prefix}woocommerce_sessions SET session_value= '".$updateddata."' WHERE  session_key ='".$user_id."'";
	$rez = $wpdb->query($sql);
	$session_handler = new WC_Session_Handler();
	$session = $session_handler->get_session($user_id);
	$cart_items = unserialize($session['cart']);

	if(!empty($cart_items))
	{
		$itmeaarray = array();
		$finaltoal = '';
		foreach($cart_items as $cart_item_key => $cart_item ) 
		{
			$total = getmytotal($cart_item['quantity'],$cart_item['line_total']);
			$finaltoal = $finaltoal + $total;
			$product_name = get_the_title($cart_item['product_id']);
			$newarray = array('product_id'=>$cart_item['product_id'],'product_name'=>$product_name,'quantity'=>$cart_item['quantity'],'price'=>number_format((float)$cart_item['line_total'], 2, '.', ''));
			array_push($itmeaarray,$newarray);
		}

		$response['success'] = true;
		$response['message'] = 'item successfully added';
		$response['data'] = $itmeaarray;
		$response['total'] = number_format((float)$finaltoal, 2, '.', '');

	}
	else
	{
		$response['success'] = false;
		$response['message'] = 'Something wrong please try agin';
	}
	return new WP_REST_Response($response, 200);
}

add_action('rest_api_init', 'rest_api_remove_to_cart');
function rest_api_remove_to_cart(){
  register_rest_route('wp/v1', 'add_remove_cart', array(
    'methods' => 'POST',
    'callback' => 'add_remove_cart',
  ));
}
function add_remove_cart()
{
	$user_id = sanitize_text_field($_POST['user_id']);
	if(empty($user_id))
	{
		$response['success'] = __("false");
		$response['message'] = __("User ID  is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	wp_set_current_user($user_id);

	$product_id = sanitize_text_field($_POST['product_id']);
	if(empty($product_id))
	{
		$response['success'] = __("false");
		$response['message'] = __("Product ID  is Required", "wp-rest-user");
		$response['code'] = 400;
		return new WP_REST_Response($response, 200);
	}
	$quantity = sanitize_text_field($_POST['quantity']);
	$quantity = 1;
	
    global $woocommerce,$wpdb;

	$array = $wpdb->get_results("select session_value from {$wpdb->prefix}woocommerce_sessions where session_key = '".$user_id."'");

	if(count($array) < 0)
	{
		$response['success'] = false;
		$response['code'] = 400;
		$response['message'] = 'Item not Found in Cart';
		return new WP_REST_Response($response, 200);
	}

    $data =$array[0]->session_value;

    function getmytotal($quet,$priced){
       $subtoal = $quet*$priced;
       $total = $total+$subtoal;
        return $total;
    }
    
	$cart_data=unserialize($data);
	$product = wc_get_product( $product_id );
	$cart_data['cart'] = unserialize($cart_data['cart']);
	$old_quantity = 0;
	$new_quantity = 0;
	$kiey = '';
	
	foreach($cart_data['cart'] as $key => $value){
		if($value['product_id'] == null ){
			unset($cart_data['cart'][$key]);
		}
		if($value['product_id'] == $product_id){
			$old_quantity = $value['quantity'];
			$kiey = $key;
			break;
		}
	}

	$new_quantity = $old_quantity - $quantity;

	if($new_quantity >= 1)
	{
		$cart_data['cart'][$kiey]=array(
			'key' => $kiey,
			'product_id' => $product_id,
			'variation_id' => 0,
			'variation' => array(),
			'quantity' => $new_quantity,
			'line_tax_data' => array(
				'subtotal' => array(),
				'total' => array()
			),
		'line_subtotal' => $product->get_price(),
		'line_subtotal_tax' => 0,
		'line_total' => $product->get_price(),
		'line_tax' => 0,
		);
	}
	else{
		unset($cart_data['cart'][$kiey]);
	}

	
	$cart_data['cart'] = serialize($cart_data['cart']);
	$updateddata = serialize($cart_data);
	$sql ="UPDATE {$wpdb->prefix}woocommerce_sessions SET session_value= '".$updateddata."' WHERE  session_key ='".$user_id."'";
	$rez = $wpdb->query($sql);
	$session_handler = new WC_Session_Handler();
	$session = $session_handler->get_session($user_id);
	$cart_items = unserialize($session['cart']);

	if(!empty($cart_items))
	{
		$itmeaarray = array();
		$finaltoal = '';
		foreach($cart_items as $cart_item_key => $cart_item ) 
		{
			$total = getmytotal($cart_item['quantity'],$cart_item['line_total']);
			$finaltoal = $finaltoal + $total;
			$product_name = get_the_title($cart_item['product_id']);
			$newarray = array('product_id'=>$cart_item['product_id'],'product_name'=>$product_name,'quantity'=>$cart_item['quantity'],'price'=>number_format((float)$cart_item['line_total'], 2, '.', ''));
			array_push($itmeaarray,$newarray);
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