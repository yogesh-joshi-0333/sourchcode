<?php
/**
 * Mansi Caterers functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mansi_Caterers
 */
 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

if ( ! function_exists( 'mansi_caterers_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mansi_caterers_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mansi Caterers, use a find and replace
		 * to change 'mansi_caterers' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mansi_caterers', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		add_image_size( 'work-icon', 100, 100, true );
		add_image_size( 'work-flow', 150, 150, true );
		add_image_size( 'menutype-image', 935, 250, true );
		add_image_size( 'slider_image', 1600, 800, true );
		add_image_size( 'testimonial', 1600, 600, true );
		add_image_size( 'custom_gallary', 300, 300, true );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Main Menu', 'mansi_caterers' ),
			'top-menu' => esc_html__( 'Top Menu', 'mansi_caterers' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mansi_caterers_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 464,
			'width'       => 417,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mansi_caterers_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mansi_caterers_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mansi_caterers_content_width', 640 );
}
add_action( 'after_setup_theme', 'mansi_caterers_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mansi_caterers_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mansi_caterers' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mansi_caterers' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer', 'mansi_caterers' ),
		'id'            => 'footer-sidebar',
		'description'   => esc_html__( 'Add widgets here for footer Section.', 'mansi_caterers' ),
		'before_widget' => '<section id="%1$s" class="widget col-md-4 %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'mansi_caterers_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mansi_caterers_scripts() {
	wp_enqueue_style( 'mansi_caterers-style', get_stylesheet_uri() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/lib/bootstrap.css', array( ), '4.2.1' );
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/css/lib/fontawesome.css', array( ), '5.7.0' );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/lib/slick.css', array( ), '1.6.0' );
	wp_enqueue_style( 'magnific', get_template_directory_uri() . '/assets/css/lib/magnific-popup.css', array( ), '3.2.1' );
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', array('woocommerce-general'), filemtime( get_template_directory() . '/assets/css/custom.css' ) );

	wp_enqueue_script( 'mansi_caterers-navigation', get_template_directory_uri() . '/assets/js/lib/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mansi_caterers-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/lib/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/lib/bootstrap.js', array('jquery'), '4.2.1', true );
	wp_enqueue_script( 'Slick', get_template_directory_uri() . '/assets/js/lib/slick.js', array('jquery'), '1.6.0', true );
	wp_enqueue_script( 'magnific', get_template_directory_uri() . '/assets/js/lib/jquery.magnific-popup.min.js', array('jquery'), '3.2.1', true );
	wp_enqueue_script( 'wc-password-strength-meter' );
	wp_enqueue_script( 'jquery-ui-datepicker' );
    
    wp_enqueue_style( 'jquery-ui' );
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), filemtime( get_template_directory() . '/assets/js/main.js' ), true );
    wp_localize_script('main-js', 'theme_path', get_template_directory_uri());
    wp_localize_script('main-js', 'ajaxurl', admin_url( 'admin-ajax.php' ));

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mansi_caterers_scripts', 99 );



/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/footer-widget.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/class-wp-bootstrap-navwalker.php';
/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
require get_template_directory() . '/inc/custom_field.php';
/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Custom Post init
 */
require get_template_directory(). '/custom-post-type/slider.php';
require get_template_directory(). '/custom-post-type/testimonial.php';
require get_template_directory(). '/blocks/slider/slider.php';
require get_template_directory(). '/blocks/different/different.php';


/**
 * Gutenberg Block
 */
add_filter( 'block_categories', 'gutenberg_category_theme', 10, 2 );
function gutenberg_category_theme( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug'  => 'mansi-caterers',
				'title' => __( 'Mansi Caterers', 'mansi_caterers' )
			),
		)
	);
}

// Hook: Editor assets.
add_action( 'enqueue_block_editor_assets', 'gutenberg_enqueue_function' );
function gutenberg_enqueue_function() {
	// Scripts.
	wp_enqueue_script(
		'bundle_gutenberg_block',
		get_template_directory_uri() . '/assets/js/lib/bundle.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ),
		filemtime( get_template_directory() . '/assets/js/lib/bundle.js' )
	);



	// Styles.
	wp_enqueue_style(
		'gutenberg_block-editor', // Handle.
		get_template_directory_uri() . '/assets/css/lib/editor.css',
		array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
		filemtime( get_template_directory() . '/assets/css/lib/editor.css' ) // filemtime — Gets file modification time.
	);
} // End function gutenberg_enqueue_function().

/**
 * Breadcrumbs
 */
function mansi_breadcrumbs() {
	$home_breadcrumbs = 0;
	$separator = '';
	$home = 'Home';
	$mycurrent = 1;
	global $post;
	$myhome_url = get_bloginfo('url');
	if (is_front_page()) {
	  if ($home_breadcrumbs == 1) echo '<nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . $myhome_url . '">' . $home . '</a></li></ol></nav>';
	} else {
	  echo '<nav aria-label="breadcrumb"><ol class="breadcrumb"><li class="breadcrumb-item"><a href="' . $myhome_url . '">' . $home . '</a></li> ' . $separator . ' ';
	  if ( is_category() ) {
		$thisCat = get_category(get_query_var('cat'), false);
		if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $separator . ' ');
		echo '<li class="breadcrumb-item active" aria-current="page"><span>' . 'Archive :"' . single_cat_title('', false) . '"' . '</span></li>';
	  } elseif ( is_search() ) {
		echo '<li class="breadcrumb-item active" aria-current="page"><span>' . 'Results :"' . get_search_query() . '"' . '</span></li>';
	  } elseif ( is_day() ) {
		echo '<li class="breadcrumb-item " aria-current="page"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>' . $separator . ' ';
		echo '<li class="breadcrumb-item " aria-current="page"><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li>' . $separator . ' ';
		echo '<li class="breadcrumb-item active" aria-current="page"><span>' . get_the_time('d') . '</span></li>';
	  } elseif ( is_month() ) {
		echo '<li class="breadcrumb-item " aria-current="page"><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $separator . ' ';
		echo '<li class="breadcrumb-item active " aria-current="page"><span>' . get_the_time('F') . '</span></li>';
	  } elseif ( is_year() ) {
		echo '<li class="breadcrumb-item active" aria-current="page"><span>' . get_the_time('Y') . '</span></li>';
	  } elseif ( is_single() && !is_attachment() ) {
		if ( get_post_type() != 'post' ) {
		  $post_type = get_post_type_object(get_post_type());
		  $slug = $post_type->rewrite;
		  if($slug['slug'] == 'research_wall'){ $slug['slug'] = 'research-walls'; }
		  echo '<li class="breadcrumb-item " aria-current="page"><a href="' . $myhome_url . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
		  if ($mycurrent == 1) echo ' ' . $separator . ' ' . '<li class="breadcrumb-item active" aria-current="page"><span>' . get_the_title() . '</span></li>';
		} else {
		  $cat = get_the_category(); $cat = $cat[0];
		  $cats = get_category_parents($cat, TRUE, ' ' . $separator . ' ');
		  if ($mycurrent == 0) $cats = preg_replace("#^(.+)\s$separator\s$#", "$1", $cats);
		  echo '<li class="breadcrumb-item">' . $cats . '</li>';
		  if ($mycurrent == 1) echo '<li class="breadcrumb-item active" aria-current="page"><span>' . get_the_title() . '</span></li>';
		}
	  } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() && !is_404() && !is_author() ) {
		$post_type = get_post_type_object(get_post_type());
		if($post_type){
		echo '<li class="breadcrumb-item active" aria-current="page"><span>' . $post_type->labels->singular_name . '</span></li>';
			}
	  } elseif ( is_author() ) {
		  echo '<li class="breadcrumb-item active" aria-current="page"><span>Faculty Profile</span></li>';
	  } elseif ( is_attachment() ) {
		$parent = get_post($post->post_parent);
		$cat = get_the_category($parent->ID); $cat = $cat[0];
		echo get_category_parents($cat, TRUE, ' ' . $separator . ' ');
		echo '<li class="breadcrumb-item " aria-current="page"><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
		if ($mycurrent == 1) echo ' ' . $separator . ' ' . '<li class="breadcrumb-item active" aria-current="page"><span>' . get_the_title() . '</span></li>';
	  } elseif ( is_page() && !$post->post_parent ) {
		if ($mycurrent == 1) echo '<li class="breadcrumb-item active" aria-current="page"><span>' . get_the_title() . '</span></li>';
	  } elseif ( is_page() && $post->post_parent ) {
		$parent_id  = $post->post_parent;
		$breadcrumbs = array();
		while ($parent_id) {
		  $page = get_page($parent_id);
		  $breadcrumbs[] = '<li class="breadcrumb-item " aria-current="page"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
		  $parent_id  = $page->post_parent;
		}
		$breadcrumbs = array_reverse($breadcrumbs);
		for ($i = 0; $i < count($breadcrumbs); $i++) {
		  echo $breadcrumbs[$i];
		  if ($i != count($breadcrumbs)-1) echo ' ' . $separator . ' ';
		}
		if ($mycurrent == 1) echo ' ' . $separator . ' ' . '<li class="breadcrumb-item active" aria-current="page"><span>' . get_the_title() . '</span></li>';
	  } elseif ( is_tag() ) {
		echo '<li class="breadcrumb-item active" aria-current="page"><span>' . 'Posts tagged "' . single_tag_title('', false) . '"' . '</span></li>';
	  } elseif ( is_author() ) {
		 global $author;
		$userdata = get_userdata($author);
		echo '<li class="breadcrumb-item active" aria-current="page"><span>' . 'Articles By ' . $userdata->display_name . '</span></li>';
	  } elseif ( is_404() ) {
		echo '<li class="breadcrumb-item active" aria-current="page"><span>' . '404' . '</span></li>';
	  }
	  if ( get_query_var('paged') ) {
		  if (is_home()) {
			  echo '<li class="breadcrumb-item active" aria-current="page"><a href="' .get_permalink( get_option( 'page_for_posts' ) ) . '"><span>' . get_the_title( get_option('page_for_posts', true) ) . '</span></a></li>';
		  }
		  echo '<li class="breadcrumb-item active" aria-current="page"><span>' ;
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
		echo __('Page') . ' ' . get_query_var('paged');
		if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		echo '</span></li>';
	  }elseif (is_home()) {
		  echo '<li class="breadcrumb-item active" aria-current="page"><span>' . get_the_title( get_option('page_for_posts', true) ) . '</span></li>';
	  }elseif(is_tax()){
		  $thisCat = get_category(get_queried_object(), false);
		  if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $separator . ' ');
			echo '<li class="breadcrumb-item active" aria-current="page"><span>' . single_cat_title('', false). '</span></li>';	}
	  echo '</ol></nav>';
	}
  }

//service_date
add_action('wp_ajax_call_session_setter','call_session_setter');
add_action('wp_ajax_nopriv_call_session_setter','call_session_setter');
function call_session_setter(){
	global $woocommerce;
	$tmp = array();
	$pid = 'p'.$_REQUEST['pid'];
    if(isset($_REQUEST['service_date'])) {
		$tmp[$pid] = $_REQUEST['service_date'];
		$service_date = (WC()->session->get( 'service_date' )) ? WC()->session->get( 'service_date' ) : array();
		$tmp = array_merge($service_date,$tmp);
		WC()->session->set( 'service_date', $tmp );
	}
	if(isset($_REQUEST['pickup'])) {
		$tmp[$pid] = $_REQUEST['pickup'];
		$pickup = (WC()->session->get( 'pickup' )) ? WC()->session->get( 'pickup' ) : array();
		$tmp = array_merge($pickup,$tmp);
		WC()->session->set( 'pickup', $tmp );
	}
	if(isset($_REQUEST['stime'])) {
		$tmp[$pid] = $_REQUEST['stime'];
		$stime = (WC()->session->get( 'stime' )) ? WC()->session->get( 'stime' ) : array();
		$tmp = array_merge($stime,$tmp);
		WC()->session->set( 'stime', $tmp );
	}
	if(isset($_REQUEST['saddress'])) {
		$tmp[$pid] = $_REQUEST['saddress'];
		$saddress = (WC()->session->get( 'saddress' )) ? WC()->session->get( 'saddress' ) : array();
		$tmp = array_merge($saddress,$tmp);
		WC()->session->set( 'saddress', $tmp );
	}
	die();
}

add_action('woocommerce_add_to_cart', 'custome_add_to_cart');
function custome_add_to_cart() {
	global $woocommerce;
		$tmp = array();
    if(sizeof($_POST['quantity']) > 1){
    	foreach ($_POST['quantity'] as $key => $value) {
    		$tmp['p'.$key] = $_POST['service_date'];
    	}
		}
		if(isset($_POST['service_date'])) {
			$tmp['p'.$_POST['add-to-cart']] = $_POST['service_date'];
			$service_date = (WC()->session->get( 'service_date' )) ? WC()->session->get( 'service_date' ) : array();
			$tmp = array_merge($service_date,$tmp);
			WC()->session->set( 'service_date', $tmp );
		}
		if(isset($_POST['pickup'])) {
			$tmp['p'.$_POST['add-to-cart']] = $_POST['pickup'];
			$pickup = (WC()->session->get( 'pickup' )) ? WC()->session->get( 'pickup' ) : array();
			$tmp = array_merge($pickup,$tmp);
			WC()->session->set( 'pickup', $tmp );
		}
		if(isset($_POST['stime'])) {
			$tmp['p'.$_POST['add-to-cart']] = $_POST['stime'];
			$stime = (WC()->session->get( 'stime' )) ? WC()->session->get( 'stime' ) : array();
			$tmp = array_merge($stime,$tmp);
			WC()->session->set( 'stime', $tmp );
		}
		if(isset($_POST['saddress'])) {
			$tmp['p'.$_POST['add-to-cart']] = $_POST['saddress'];
			$saddress = (WC()->session->get( 'saddress' )) ? WC()->session->get( 'saddress' ) : array();
			$tmp = array_merge($saddress,$tmp);
			WC()->session->set( 'saddress', $tmp );
		}
		$add_to_cart_time = date(strtotime("now"));
		WC()->session->set( 'add_to_cart_time', $add_to_cart_time );
}

add_action('wp_ajax_clearcart','clearcart');
add_action('wp_ajax_nopriv_clearcart','clearcart');
function clearcart(){
    global $woocommerce;
    $woocommerce->cart->empty_cart();
    die();
};

add_action( 'wp_footer', 'add_to_cart_counter' );
function add_to_cart_counter() 
{
    
    echo "<pre style='display:none'>XXXXXXXXX</pre>";
	global $woocommerce;
	$bool = is_product();
	if(is_shop() || is_product() || is_cart() || is_checkout()){
	 if (!empty(WC()->session->get( 'add_to_cart_time' ))) {
     	$add_to_cart_date = WC()->session->get( 'add_to_cart_time' )+(300);
     	$tmpt = date('M d,Y H:i:s', $add_to_cart_date);
     	?>
        <script>
            jQuery(document).on('change','input#billing_postcode',function(){jQuery( 'body' ).trigger( 'update_checkout' );});

			var countDownDate = "<?php echo $add_to_cart_date; ?>000";
			jQuery('#cart_countdown').show();
			var x = setInterval(function() {
				var now = new Date().getTime();
				var date = new Date();
				var distance = countDownDate - now;
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);
				document.getElementById("cart_countdown").innerHTML = "Your Cart will expired in "+minutes + "m " + seconds + "s ";
				if (distance < 0) {
					clearInterval(x);
					document.getElementById("cart_countdown").remove();
					$.ajax({
				        url: ajaxurl,
				        data: { 'action': 'clearcart'},
				        success: function (data) { jQuery('#cart_countdown').hide(); },
				        error: function (error) {
				          console.log('error ' + error);
				        }
				      });
				}
			}, 1000);
		</script>
     <?php }
 	}
}

add_action('woocommerce_checkout_update_order_meta', 'customise_checkout_field_update_order_meta');
function customise_checkout_field_update_order_meta($order_id) {
	if (!empty(WC()->session->get( 'service_date' ))) {
		update_post_meta($order_id, 'service_date', WC()->session->get( 'service_date' ));
		update_post_meta($order_id, 'pickup', WC()->session->get( 'pickup' ));
		update_post_meta($order_id, 'stime', WC()->session->get( 'stime' ));
		update_post_meta($order_id, 'saddress', WC()->session->get( 'saddress' ));
		unset($_SESSION['service_date']);
		unset($_SESSION['pickup']);
		unset($_SESSION['stime']);
		unset($_SESSION['saddress']);
		WC()->session->set('service_date', '');
		WC()->session->set('pickup', '');
		WC()->session->set('stime', '');
		WC()->session->set('saddress', '');
	}
}

add_action('woocommerce_admin_order_item_headers', 'my_woocommerce_admin_order_item_headers');
function my_woocommerce_admin_order_item_headers() {
    $column_name = 'Dates';
    echo '<th>' . $column_name . '</th>';
}

add_action('woocommerce_admin_order_item_values', 'my_woocommerce_admin_order_item_values', 10, 3);
function my_woocommerce_admin_order_item_values($_product, $item, $item_id = null) {
    $value = get_post_meta(get_the_ID(), 'service_date', true);
    $pickup = get_post_meta(get_the_ID(), 'pickup', true);
    $stime = get_post_meta(get_the_ID(), 'stime', true);
    $saddress = get_post_meta(get_the_ID(), 'saddress', true);
    if(isset($value['p'.$item['product_id']])){
    	echo '<td>';
    	echo '<strong>Date : </strong>'.$value['p'.$item['product_id']];
    	if(isset($pickup['p'.$item['product_id']])){
	    	echo '<br>';
	    	echo '<strong>Order Type : </strong>'.$pickup['p'.$item['product_id']];
    	}
    	if(isset($stime['p'.$item['product_id']])){
	    	echo '<br>';
	    	echo '<strong>Time : </strong>'.$stime['p'.$item['product_id']];
    	}
    	if(isset($saddress['p'.$item['product_id']])){
	    	echo '<br>';
	    	echo '<strong>Address : </strong>'.$saddress['p'.$item['product_id']];
    	}

    	echo '</td>';
    }else{
    	echo '<td>No date selected please contact client</td>';
    }

}

/**
* Remove Gutenberg Editor in Template

*/
function ea_disable_editor( $id = false ) {

	$excluded_templates = array(
		'page-templates/testimonial.php',
		'page-templates/howitwork.php'
	);
	if( empty( $id ) )
	return false;

$id = intval( $id );
	$template = get_page_template_slug( $id );
	return in_array( $template, $excluded_templates );
}

function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

/**
 * Woocommerce add extra field in register form
 */
function woocom_extra_register_fields() { ?>
	<p class="form-row form-row-wide">
	<label for="reg_billing_first_name">
		<?php _e( 'First name', 'mansi_caterers' ); ?> <span class="required">*</span>
	</label>
	<input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" required="required" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" /></p>

	<p class="form-row form-row-wide">

	<label for='reg_billing_last_name'>
		<?php _e( 'Last name', 'mansi_caterers' ); ?> <span class="required">*</span>
	</label>
	<input type="text" class='input-text' name='billing_last_name' id="reg_billing_last_name" required="required" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" /></p>

	<p class="form-row form-row-wide">

		<label for='billing_phone'>
			<?php _e( 'Phone', 'mansi_caterers' ); ?> <span class="required">*</span>
		</label>
		<input type="tel" class='input-text' name='billing_phone' id="billing_phone" required="required" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" autocomplete="tel" />
	</p>


<?php }
add_action( 'woocommerce_register_form_start', 'woocom_extra_register_fields' );


function woocom_validate_extra_register_fields( $username, $email, $validation_errors ) {
	if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name']) ) {
		$validation_errors->add('billing_first_name_error', __('First Name is required!', 'mansi_caterers'));
	}

	if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name']) ) {
		$validation_errors->add('billing_last_name_error', __('Last Name is required!', 'mansi_caterers'));
	}

	if (isset($_POST['billing_phone']) && empty($_POST['billing_phone']) ) {
		$validation_errors->add('billing_phone_error', __('Phone is required!', 'mansi_caterers'));
	}

	return $validation_errors;
}

add_action('woocommerce_register_post', 'woocom_validate_extra_register_fields', 10, 3);

function woocom_save_extra_register_fields($customer_id) {

	if (isset($_POST['billing_first_name'])) {
		update_user_meta($customer_id, 'billing_first_name', sanitize_text_field($_POST['billing_first_name']));
		update_user_meta( $customer_id, 'first_name', sanitize_text_field($_POST['billing_first_name']));

	}
	if (isset($_POST['billing_last_name'])) {
		update_user_meta($customer_id, 'billing_last_name', sanitize_text_field($_POST['billing_last_name']));
		update_user_meta( $customer_id, 'last_name',  sanitize_text_field($_POST['billing_last_name']));
	}

	if (isset($_POST['billing_phone'])) {
		update_user_meta($customer_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']));
	}
}
add_action('woocommerce_created_customer', 'woocom_save_extra_register_fields');

/*-------------- Delivery checker------------*/
add_filter( 'woocommerce_no_shipping_available_html', 'my_custom_no_shipping_message' );
add_filter( 'woocommerce_cart_no_shipping_available_html', 'my_custom_no_shipping_message' );
function my_custom_no_shipping_message( $message ) {
	return __( 'Service not available in your area please change address' );
}

add_action('woocommerce_before_main_content', 'remove_sidebar' );
function remove_sidebar() {
		if ( is_shop() || is_cart() || is_checkout() || is_product() ) {
		 remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
	 }
}
/**
 * Woocommerce breadcrumb hook
 */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
add_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 5);

add_filter( 'woocommerce_breadcrumb_defaults', 'jk_woocommerce_breadcrumbs' );
function jk_woocommerce_breadcrumbs() {
    return array(
            'delimiter'   => '',
            'wrap_before' => '<nav class="woocommerce-breadcrumb" itemprop="breadcrumb">',
            'wrap_after'  => '</nav>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'woocommerce' ),
        );
}

add_filter( 'woocommerce_loop_add_to_cart_link', 'replacing_add_to_cart_button', 10, 2 );
function replacing_add_to_cart_button( $button, $product  ) {
    $button_text = __("View Details", "woocommerce");
    $button = '<a class="button" href="' . $product->get_permalink() . '">' . $button_text . '</a>';

    return $button;
}

/**
 * Flas Sale Div structure
 */
function custom_product_sale_flash( $output, $post, $product ) {
	global $product;
    if($product->is_on_sale()) {
        if($product->is_type( 'variable' ) ) {
            $regular_price = $product->get_variation_regular_price();
            $sale_price = $product->get_variation_price();
        } else {
            $regular_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
				}
				if(!$product->is_type('grouped')) {
					$percent_off = (($regular_price - $sale_price) / $regular_price) * 100;
					return '<div class="onsale"><span>' .  round( $percent_off ) . '% </span></div>';
				}else {
					return '<div class="onsale"><span> Sale </span></div>';
				}


		}
}
add_filter( 'woocommerce_sale_flash', 'custom_product_sale_flash', 11, 3 );

function move_title_above(){
	remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	add_action('woocommerce_before_single_product', 'woocommerce_template_single_title', 20 );
}
add_action( 'woocommerce_before_single_product', 'move_title_above' );

function filter_woocommerce_page_title( $page_title ) {
	// make filter magic happen here...
	return '<div class="bg_tilte golden"><h1 class="product_title entry-title text-center"><span class="sectionTitle">'.$page_title.'</span></h1></div>';
};

// add the filter
add_filter( 'woocommerce_page_title', 'filter_woocommerce_page_title', 10, 1 );

/*--------- Google autocomplite filed ------*/
add_action( 'woocommerce_after_checkout_form', 'woo_call_map_api');
function woo_call_map_api(){
  echo '<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAMuucZrZ4MXmZGmye6rDHsF6KWBzc-I48&libraries=places">';
}

add_filter( 'woocommerce_add_to_cart_validation', 'bbloomer_only_one_in_cart', 99, 2 );
function bbloomer_only_one_in_cart( $passed, $added_product_id ) {
	wc_empty_cart();
	return $passed;
}

add_action('woocommerce_after_order_notes', 'customise_checkout_field');
function customise_checkout_field($checkout)
{
  	foreach ( WC()->cart->get_cart() as $cart_item ) {
        $product1 = $cart_item['product_id'];
        $terms = get_the_terms ( $product1, 'product_cat' );
		$pro_cat_id = array();
		$datePicker = false;
		if($terms){
			foreach ( $terms as $term ) {
				if($term->slug == 'weekly' || $term->slug == 'daily' ) {
					$pro_cat_id[] = $term->slug;
					$datePicker = true;
				}
			}
		}
        break;
    }
	?>
  <div class="BookingType form-group" data-pid="<?php echo $product1; ?>">
  		<?php
  		$local_pickup_backend = get_field('local_pickup_only',$product1);
  		if(WC()->session->get( 'pickup' ) != NULL){
			if(isset(WC()->session->get('pickup')['p'.$product1]) && WC()->session->get('pickup')['p'.$product1] == 'Pickup') { ?>
				<input type="radio" name="pickup" value="Pickup" checked="checked"> Pickup
				<?php if($local_pickup_backend != 1){ ?>
				<input type="radio" name="pickup" value="Delivery"> Delivery
			<?php } } else if(isset(WC()->session->get('pickup')['p'.$product1]) && WC()->session->get('pickup')['p'.$product1] == 'Delivery') { ?>
				<input type="radio" name="pickup" value="Pickup"> Pickup
				<?php if($local_pickup_backend != 1){ ?>
				<input type="radio" name="pickup" value="Delivery" checked="checked"> Delivery
			<?php } } else { ?>
				<input type="radio" name="pickup" value="Pickup"> Pickup
				<?php if($local_pickup_backend != 1){ ?>
				<input type="radio" name="pickup" value="Delivery" checked="checked"> Delivery
		<?php } } } ?>
	</div>
	<div class="BookingAddress form-group">
		<?php if( have_rows('address', 'option') ): ?>
			<select id="saddress" name="saddress" required>
				<option value="">Select Address</option>
		    <?php while( have_rows('address', 'option') ): the_row();
		    	if(isset(WC()->session->get('saddress')['p'.$product1]) && WC()->session->get('saddress')['p'.$product1] != '' && WC()->session->get('saddress')['p'.$product1] == get_sub_field('address')) { ?>
		        	<option value="<?php the_sub_field('address'); ?>" selected><?php the_sub_field('address'); ?></option>
		        	<?php } else { ?>
		        	<option value="<?php the_sub_field('address'); ?>"><?php the_sub_field('address'); ?></option>
		    <?php } endwhile; ?>
		    </select>
		<?php endif; ?>
		<?php
		$saddress = WC()->session->get('saddress')['p'.$product1];
		if( have_rows('address', 'option') && $saddress): ?>
			<select id="stime" name="stime" required="required">
				<option value="">Select Time</option>
				<?php
				while( have_rows('address', 'option') ): the_row();
					if(get_sub_field('address') == $saddress){
						$pickup_timings = get_sub_field('pickup_timing');
						asort($pickup_timings);
						foreach ($pickup_timings as $pickup_time) {
							if(isset(WC()->session->get('stime')['p'.$product1]) && WC()->session->get('stime')['p'.$product1] != '' && WC()->session->get('stime')['p'.$product1] == $pickup_time){
								echo '<option value="'.$pickup_time.'" selected>'.$pickup_time.'</option>';
							} else {
								echo '<option value="'.$pickup_time.'">'.$pickup_time.'</option>';
							}
						}
					}
				endwhile;
				?>
			</select>
		<?php endif; ?>
	</div>
  <?php
}

add_action( 'woocommerce_thankyou', 'reset_servicedate_session' );

function reset_servicedate_session() {
	WC()->session->set( 'service_date', '' );
	WC()->session->set( 'pickup', '' );
	WC()->session->set( 'stime', '' );
	WC()->session->set( 'saddress', '' );
}

if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Mansi Caterer General Settings',
		'menu_title'	=> 'Mansi Caterer Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	acf_add_options_page(array(
		'page_title' 	=> 'Shipping Charge',
		'menu_title'	=> 'Shipping Charge',
		'menu_slug' 	=> 'shipping-charge',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

add_action( 'woocommerce_after_checkout_validation', 'atlas_custom_field_checker', 10, 2);

function atlas_custom_field_checker( $fields, $errors ){
	if(isset($_POST['service_date_checkout']) && $_POST['service_date_checkout'] == ''){
    	$errors->add( 'validation', '<strong>Booking date</strong> is a required field.' );
	}
	if(isset($_POST['pickup']) && $_POST['pickup'] == 'Pickup'){
		if(isset($_POST['stime']) && $_POST['stime'] == ''){
	    	$errors->add( 'validation', '<strong>Booking Time</strong> is a required field.' );
		}
		if(isset($_POST['saddress']) && $_POST['saddress'] == ''){
	    	$errors->add( 'validation', '<strong>Booking Address</strong> is a required field.' );
		}
	}
}

function ace_force_posted_data_ship_to_different_address( $posted_data ) {
    $posted_data['ship_to_different_address'] = true;
    return $posted_data;
}
add_filter( 'woocommerce_checkout_posted_data', 'ace_force_posted_data_ship_to_different_address' );



add_filter( 'woocommerce_package_rates','conditional_custom_shipping_cost',2,2);
function conditional_custom_shipping_cost( $rates, $package ) {

    // print_r($rates);
    // exit;
	$product1 = 0;
	global $woocommerce;
	$zip_code_flag = true;
	$free_shipping_status = false;

    $delivery_type = '';
    
    foreach($woocommerce->session->pickup as $key => $value)
    {
        $delivery_type = $value;
        break;
    }

    if($delivery_type == 'Pickup')
    {
        unset($rates['free_shipping:5']);
        return $rates;
    }
    
    
    // $postcode = $woocommerce->customer->changes['shipping']['postcode'];
    $postcode = $woocommerce->customer->shipping['postcode'];
    $free_shipping_zip_code = get_field('free_shipping_zip_code','option');
    $shipping_price = get_field( 'shipping_price','option');
    $free_shipping_zip_code_array = array();
    $shipping_price_array = array();
    
    foreach($free_shipping_zip_code as $value)
    {
        array_push($free_shipping_zip_code_array,$value['zipcode']);
    }
    
    foreach($shipping_price as $value)
    {
        $shipping_price_array[$value['zip_code']] = $value['shipping_price'];
    }
    
    // print_r($free_shipping_zip_code_array);
    // print_r($shipping_price_array);
    
    $local_shipping = false;
    $charge_shipping = false;
    // print_r($rates);
    foreach ( $rates as $rate_key => $rate_values )
    {
        
        // print_r($rates[$rate_key]->cost);

        
        // $postcode = $woocommerce->customer->changes['shipping']['postcode'];
        // $postcode = $woocommerce->customer->shipping['postcode'];
        

        $rates[$rate_key]->cost = 0;
        // echo "freeShipping COndition";
        // var_dump(in_array($postcode,$free_shipping_zip_code_array));
        WC()->session->set( 'shipping_type', '' );
        if(in_array($postcode,$free_shipping_zip_code_array))
        {
            $local_shipping = true;
            WC()->session->set( 'shipping_type', 'free_shipping' );
            $rates[$rate_key]->label = __( 'Free Shipping', 'woocommerce' ); // New label name
        }
        else
        {
            // print_r($shipping_price_array);
            // echo "postcode =>".$postcode;
            foreach($shipping_price_array as $key => $value)    
            {
                
                
                // print_r($key);
                // echo "==";
                // print_r($postcode);
                // echo "--";
                if($key == $postcode)
                {
                    // print_r("condition true");
                    $rates[$rate_key]->cost = $value;
                    $charge_shipping = true;
                    $rates[$rate_key]->label = __( 'Delivery', 'woocommerce' ); // New label name
                }
            }
        }
    }
    
    // print_r($rates);
    
    if($charge_shipping)
    {
        unset($rates['local_pickup:8']);
    }
    
    if($local_shipping)
    {
        unset($rates['free_shipping:5']);
    }
    // print_r('charge_shipping');
    // var_dump($charge_shipping);
    // var_dump('local_shipping');
    // var_dump($local_shipping);
    // print_r($rates);
    // exit;
    
    if($charge_shipping || $local_shipping)
    {
        return $rates;    
    }
    else
    {
        return false;
    }
    
}

add_filter( 'woocommerce_shipping_package_name', 'custom_shipping_package_name' );
function custom_shipping_package_name( $name ) {
	global $woocommerce;
    $delivery_type = '';
    foreach($woocommerce->session->pickup as $key => $value)
    {
        $delivery_type = $value;
        break;
    }
    if(isset($woocommerce->session->shipping_type) && $woocommerce->session->shipping_type == "free_shipping")
    {
        return "Free Shipping";
    }

    if($delivery_type == 'Pickup')
    {
       return "Free Shipping";
    }
  
}

add_filter( 'woocommerce_cart_no_shipping_available_html', 'change_no_shipping_text' ); // Alters message on Cart page
add_filter( 'woocommerce_no_shipping_available_html', 'change_no_shipping_text' ); // Alters message on Checkout page
function change_no_shipping_text() {
     return get_field('no_shipping_massage','option');
}

add_action( 'woocommerce_checkout_update_order_review', 'refresh_shipping_methods', 10, 1 );
function refresh_shipping_methods( $post_data ){
	$bool = true;
    foreach ( WC()->cart->get_shipping_packages() as $package_key => $package ){
        WC()->session->set( 'shipping_for_package_' . $package_key, $bool );
    }
    WC()->cart->calculate_shipping();
}

//Remove related products from cart
remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');
// Remove shiping from cart.
function disable_shipping_calc_on_cart( $show_shipping ) {
    if( is_cart() ) { return false; }
    if( is_checkout()) {
    	$pick = WC()->session->get( 'pickup' );
    	$tmp = 0;
    	//var_dump($pick);
    	foreach ($pick as $key => $value) { if($tmp == 2 && $value == 'Pickup'){ return false; } $tmp++; }
    }
    return $show_shipping;
}
add_filter( 'woocommerce_cart_ready_to_calc_shipping', 'disable_shipping_calc_on_cart', 99 );
    
//Diff Menu
add_action('wp_ajax_diff_menu','diff_menu');
add_action('wp_ajax_nopriv_diff_menu','diff_menu');
function diff_menu(){
    
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    
    
    
    $dtz = new DateTimeZone("America/New_York");
    $dt = new DateTime("now", $dtz);
    $currentTime = $dt->format("Y-m-d H:i:s");
    
    // echo $currentTime;
    
	$bdate = $_REQUEST['bdate'];
	$pid = $_REQUEST['pid'];
	$cst_date = $_REQUEST['date'];
	$date_not_available_massage = get_field('date_not_available_massage','option');
	

	echo "<script>jQuery('button.single_add_to_cart_button.button.alt').css('pointer-events','all');jQuery('.cart_error').remove();</script>";
	$tmp = "<div class='tmp_wrap'>";
	    $date_array = get_field('cutoff_date_and_time',$pid);
	    $cst_date_and_time_array = array();
	    $cst_date_array = array();
	    $condition_status = false;
	    foreach($date_array as $value)
	    {
	       // echo "|| value['order_date'] value['time'] => ".
	        
	        $time = strtotime($value['cut_off_order_date']." ".$value['time']);
            $admin_selected_date = strtotime($value['order_date']); // 14-3-2021 /* admin select date *
            $user_select_date = strtotime($cst_date); // 14-3-2021 /* user select date */
            $current_date = strtotime(date("Y-m-d")); // 10-3-2021 /* current date */
            $cut_off_order_date = strtotime($value['cut_off_order_date']); /* 9-03-2021 */
            


            
	        if($admin_selected_date == $user_select_date)
	        {
	           // echo "||".$current_date." <= ".$cut_off_order_date;
	           if($current_date <= $cut_off_order_date) 
	           {
                    $curtime = strtotime($currentTime);
	               //echo "|| curtime >=  time => ".$curtime." >= ".$time." ||";
                    if($curtime <= $time)
                    {
	                    echo "<script>jQuery('button.single_add_to_cart_button.button.alt').css('pointer-events','all'); jQuery('.cart_error').remove();</script>";
	                    break;
                    }
                    else
                    {   
	                    echo "<script>jQuery('.cart_error').remove();jQuery('button.single_add_to_cart_button.button.alt').css('pointer-events','none');jQuery(`<a class='cart_error' style='color: red;'>".$date_not_available_massage."</a>`).insertAfter('form.cart');</script>";
	                    break;
                    }
                    
	           }
	           else
	           {    
	               echo "<script>jQuery('.cart_error').remove();jQuery('button.single_add_to_cart_button.button.alt').css('pointer-events','none');jQuery(`<a class='cart_error' style='color: red;'>".$date_not_available_massage."</a>`).insertAfter('form.cart');</script>";
	               break;
	           }
	        }
	    }
	    
		$tmp .= "<h3>Menu</h3>";
		if($bdate == 'fst'){ $tmp .= get_field('odd_week_detail',$pid);}
		if($bdate == 'sec'){ $tmp .= get_field('even_week_detail',$pid);}
	$tmp .= "</div>";
	echo $tmp;
	die();
}

//Time From address
add_action('wp_ajax_time_finder','time_finder');
add_action('wp_ajax_nopriv_time_finder','time_finder');
function time_finder(){
	$saddress = $_REQUEST['saddress'];
	if( have_rows('address', 'option') ): ?>
		<select id="stime" name="stime" required="required">
			<option value="">Select Time</option>
			<?php
			while( have_rows('address', 'option') ): the_row();
				if(get_sub_field('address') == $saddress){
					$pickup_timings = get_sub_field('pickup_timing');
					asort($pickup_timings);
					foreach ($pickup_timings as $pickup_time) {
						echo '<option value="'.$pickup_time.'">'.$pickup_time.'</option>';
					}
				}
			endwhile;
			?>
		</select>
	<?php endif;
	die();
}

// add_action( 'woocommerce_single_product_summary', 'datepickerpro', 20 );
function datepickerpro(){
	global $product;
	$cats = $tcats = array();
	$terms = get_the_terms ( $product->get_id(), 'product_cat' );
    $datePicker = false;
	foreach ( $terms as $term ) {
		$tcats[] = $term->slug;
		if($term->slug == 'weekly' || $term->slug == 'daily' ) {
			$cats[] = $term->slug;
            $datePicker = true;
		}
	}
	$cats = implode(',', $cats);
	$cartSession = WC()->session->get('service_date');
	$tmpdate = '';
	if($cartSession){
	if(in_array('p'.get_the_ID(),$cartSession)){ $tmpdate = $cartSession['p'.get_the_ID()]; }
	}
	?>
	<?php if(get_field('minimum_order_price')){
		$minimum_order_price = get_field('minimum_order_price') + 365;
	} else {
		$minimum_order_price = 365;
	} ?>
	<div class="BookingDate form-group" data-mppassid="<?php echo $minimum_order_price; ?>">
		<?php
		$remove_date = array();
		if( have_rows('dates_to_hide') ):
			while ( have_rows('dates_to_hide') ) : the_row();
			    $remove_date[] = get_sub_field('date');
		    endwhile;
		endif;
		$cutoff_time = get_field('cutoff_time');
		?>
		<input type="hidden" name="remove_dates" class="remove_dates" value="<?php echo implode(', ', $remove_date); ?>">
		<input type="hidden" name="cutoff_time" class="cutoff_time" value="<?php echo $cutoff_time; ?>">
		<?php if(get_field('section_title', 'option')){
			$section_title = get_field('section_title', 'option');
		} else {
			$section_title = 'Select Booking date';
		} ?>
	<label for="bookdate"><?php echo $section_title; ?><sup>*</sup></label>
		<input class="readonly datepicker form-control" id="bookdate" name="service_date" value="<?php echo $tmpdate; ?>" data-date-format="mm/dd/yyyy" data-cat="<?php echo $cats; ?>" pattern="[0-9]{2}/[0-9]{2}/[0-9]{4}" autocomplete="off" required>
	</div>
	<?php
}
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );



function reigel_woocommerce_checkout_fields( $checkout_fields = array() ) {

    $checkout_fields['order']['spice_level'] = array(
    'type'          => 'select',
    'class'         => array('spice_level-drop'),
    'label'         => __('Select Your Food Spice Level'),
    'placeholder'   => __('Select Spice Level'),
    'required'      => true,
    'options'       => array('mild' => __('Mild', 'woocommerce' ),'medium' => __('Medium', 'woocommerce' ),'spicy' => __('Spicy', 'woocommerce' )));

    return $checkout_fields;
}
add_filter( 'woocommerce_checkout_fields', 'reigel_woocommerce_checkout_fields' );

add_action( 'woocommerce_checkout_update_order_meta', 'action_function_name_3717', 10, 2 );
function action_function_name_3717( $order_id, $data ){
	update_post_meta($order_id,'spice_level',$data['spice_level']);
}





// add_action('woocommerce_before_order_notes', 'my_custom_checkout_field');

//  function my_custom_checkout_field( $checkout ) {

// echo '<div id="spice_level"><h3>'.__('Spice Level').'</h3>';

// woocommerce_form_field( 'spice_level', array(
//     'type'          => 'select',
//     'class'         => array('spice_level-drop'),
//     'label'         => __('Select Your Food Spice Level'),
//     'placeholder'   => __('Select Spice Level'),
//     'required'      => true,
//     'options'       => array(
//                     'mild' => __('Mild', 'woocommerce' ),
//                     'medium' => __('Medium', 'woocommerce' ),
//                     'spicy' => __('Spicy', 'woocommerce' )
//                 )    ), 

//     $checkout->get_value( 'spice_level' ));

// echo '</div>';

// }

add_action( 'woocommerce_before_order_notes', 'checkout_shipping_tip_addition', 20 );
function checkout_shipping_tip_addition( ) {
    $domain = 'woocommerce';
    $tip_type = get_field('tip_type','option');
    $fix_amount_list = get_field('amount','option');
    $fix_amount_arr = array();
    $fix_amount_arr[''] = sprintf( __('-- Please Select Tip --'), $domain, '' );
    $fix_amount_arr[0] = sprintf( __('None'), $domain, strip_tags(0) );
    foreach($fix_amount_list as $fix_amount)
    {
            $fix_amount_arr[$fix_amount['tip_amount']] = sprintf( __($fix_amount['tip_amount']), $domain, strip_tags($fix_amount['tip_amount']) );
    }
    

    echo '<tr class="tip-select"><pre style="display:none;">';
        // print_r();
    echo '</pre><td>';


    $chosen   = WC()->session->get('chosen_tip');
    
    

    // Add a custom checkbox field
    if(true)
    {
            
            global $woocommerce;  
            $delivery_type = '';
            
            foreach($woocommerce->session->pickup as $key => $value)
            {
                $delivery_type = $value;
            }
            
            $hide = '';
            if($delivery_type == 'Pickup')
            {
                $hide = 'hide';
            }
            
            woocommerce_form_field( 'chosen_tip', array(
                'type'      => 'select',
                'class'     => array( 'form-row-wide tip'.$hide ),
                'label'     => __('Do you want to leave a tip for your driver.'),  
                'options'   => $fix_amount_arr,
                'required'  => true,
            ), $chosen );
            
        
    }
    else
    {
        woocommerce_form_field( 'chosen_tip', array(
            'type'      => 'select',
            'class'     => array( 'form-row-wide tip' ),
            'label'         => __('Do you want to leave a tip for your driver.'),  
            'options'   => array(
                '10' => sprintf( __("Suggested 10%%", $domain), strip_tags( wc_price(10) ) ),
                '0' => sprintf( __("None", $domain), strip_tags( wc_price(0) ) ),
                '5' => sprintf( __("Small 5%%", $domain), strip_tags( wc_price(5) ) ),
                '15' => sprintf( __("Bigger 15%%", $domain), strip_tags( wc_price(15) ) ),
                '20' => sprintf( __("Even Bigger 20%%", $domain), strip_tags( wc_price(20) ) ),
                '25' => sprintf( __("Best 25%%", $domain), strip_tags( wc_price(25) ) ),
            ),
            'required'  => true,
        ), $chosen );
    }

    echo '</td></tr>';
}

// jQuery - Ajax script
add_action( 'wp_footer', 'checkout_shipping_tip_script' );
function checkout_shipping_tip_script() {
    // Only checkout page
    if ( is_checkout() && ! is_wc_endpoint_url() ) :
        
        // echo '<pre style="display:none">';
        // print_r(get_field('no_shipping_massage','option'));
        // echo '</pre>';

    WC()->session->__unset('chosen_tip');
    ?>
    <script type="text/javascript">
    
    
    jQuery(document).on('change','input[type="radio"][name="pickup"]',function()
    {
        if(jQuery('input[type="radio"][name="pickup"]:checked').val() == 'Pickup')
        {
            jQuery('p#chosen_tip_field').hide();
            jQuery('select#chosen_tip option:nth-child(2)').prop('selected',true);
        }
        else
        {
            jQuery('p#chosen_tip_field').show();
        }
        if(jQuery('input[type="radio"][name="pickup"]:checked').val() == 'Pickup')
        {
            jQuery('table.shop_table tr.woocommerce-shipping-totals.shipping').hide();
        }
        else
        {
            jQuery('table.shop_table tr.woocommerce-shipping-totals.shipping').show();
        }
    });
    setInterval(function(){
        
        if(jQuery('input[type="radio"][name="pickup"]:checked').val() == 'Pickup')
        {
            jQuery('table.shop_table tr.woocommerce-shipping-totals.shipping').hide();
        }
        else
        {
            if(jQuery('tr.woocommerce-shipping-totals.shipping ul#shipping_method li label').text() == "Local pickup")
            {
                
            }
            else
            {
                jQuery('table.shop_table tr.woocommerce-shipping-totals.shipping').show();
            }
        }
    });
    
    setInterval(function()
    {

        
    
        if(jQuery('tr.woocommerce-shipping-totals.shipping ul#shipping_method li label').text().split(':').length >= 2)
        {
            jQuery('tr.woocommerce-shipping-totals.shipping th').first().attr('colspan',"2");
            jQuery('tr.woocommerce-shipping-totals.shipping th').first().text(jQuery('tr.woocommerce-shipping-totals.shipping ul#shipping_method li label').text().split(':')[0]);    
        }
        
        var price_text = jQuery('tr.woocommerce-shipping-totals.shipping ul#shipping_method li label').text().split(':')[1];
        jQuery('tr.woocommerce-shipping-totals.shipping ul#shipping_method li label').text(price_text);
        
        if(jQuery('tr.woocommerce-shipping-totals.shipping ul#shipping_method li label').text() == "Local pickup")
        {   jQuery('tr.woocommerce-shipping-totals.shipping th').first().remove();
            jQuery('tr.woocommerce-shipping-totals.shipping td').first().attr('colspan',"2");
            jQuery('tr.woocommerce-shipping-totals.shipping ul#shipping_method li label').text("Free Shipping")
        }

    });



    jQuery( function($){
        $(document).ready(function(){
            jQuery('select#chosen_tip').val(jQuery('select#chosen_tip option').first().val());
            if(jQuery('select#chosen_tip').val() != '')
            {
                console.log("tip chosen event Fired");
                jQuery('select#chosen_tip').trigger('change');
            }
            
            jQuery(document).on('click','button#place_order',function()
            {
                if(jQuery('select#chosen_tip').val() == '')
                {
                    jQuery('#chosen_tip').css('border-color','#a00');
                    jQuery('label[for="chosen_tip"]').css('color','#a00');
                    jQuery('select#chosen_tip').focus();
                    return false;
                }
            });
            
            
            if(jQuery('input[type="radio"][name="pickup"]:checked').val() == 'Pickup')
            {
                jQuery('p#chosen_tip_field').hide();
                jQuery('select#chosen_tip option:nth-child(2)').prop('selected',true);
            }
            // if(jQuery('select#chosen_tip').val() != '')
            // {
                
            // }
            // jQuery('select#chosen_tip').val(jQuery('select#chosen_tip option').first().val());
            jQuery('select#chosen_tip option').first().attr('selected',false);
            // jQuery('select#chosen_tip').val('0');
            // jQuery('select#chosen_tip').change(); 
            
        });
        $('form.checkout').on('change', 'select#chosen_tip', function(){
            var p = $(this).val();
            // $('body').trigger('update_checkout');
            console.log(p);
            $.ajax({
                type: 'POST',
                url: wc_checkout_params.ajax_url,
                data: {
                    'action': 'woo_get_ajax_data',
                    'chosen_tip': p,
                },
                success: function (result) {
                    $('body').trigger('update_checkout');
                    console.log('response: '+result); // just for testing | TO BE REMOVED
                },
                error: function(error){
                    console.log(error); // just for testing | TO BE REMOVED
                }
            });
        });
    });
    </script>
    <?php
    endif;
}

add_action( 'wp_ajax_woo_get_ajax_data', 'woo_get_ajax_data' );
add_action( 'wp_ajax_nopriv_woo_get_ajax_data', 'woo_get_ajax_data' );
function woo_get_ajax_data() {
    if ( isset($_POST['chosen_tip']) ){
        $chosen_tip = sanitize_key( $_POST['chosen_tip'] );
        WC()->session->set('chosen_tip', $chosen_tip );
        echo json_encode( $chosen_tip );
    }
    die(); // Alway at the end (to avoid server error 500)
}

// Add a custom dynamic packaging fee
add_action( 'woocommerce_cart_calculate_fees', 'add_tip_fee', 20, 1 );
function add_tip_fee( $cart ) {
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    
    if (! defined( 'DOING_AJAX' ) )
        return;
    $slug = basename(get_permalink());
    $domain      = "woocommerce";
    $tip_fee = WC()->session->get( 'chosen_tip' ); // Dynamic tip fee
    $tip_percent = 10;
    $label ='';
    

    if(!empty($tip_fee) && $tip_fee != '0')
    {
        $label = __('tip amount', $domain);
        $tip_type = get_field('tip_type','option');
        $cost  = $tip_fee;
    }


    global $woocommerce;  
    $delivery_type = '';
    foreach($woocommerce->session->pickup as $key => $value)
    {
        $delivery_type = $value;
    }
    
    // $postcode = $woocommerce->customer->changes['shipping']['postcode'];
    
    $postcode = $woocommerce->customer->shipping['postcode'];
    $free_shipping_zip_code = get_field('free_shipping_zip_code','option');
    $shipping_price = get_field( 'shipping_price','option');
    $free_shipping_zip_code_array = array();
    $shipping_price_array = array();
    
    foreach($free_shipping_zip_code as $value)
    {
        array_push($free_shipping_zip_code_array,$value['zipcode']);
    }
    
    foreach($shipping_price as $value)
    {
        $shipping_price_array[$value['zip_code']] = $value['shipping_price'];
    }
    
    $local_shipping = false;
    $charge_shipping = false;
    // $postcode = $woocommerce->customer->changes['shipping']['postcode'];
    $postcode = $woocommerce->customer->shipping['postcode'];
    
    if(in_array($postcode,$free_shipping_zip_code_array))
    {
        $local_shipping = true;
    }
    else
    {
        foreach($shipping_price_array as $key => $value)    
        {
            if($key == $postcode)
            {
                $charge_shipping = true;
            }
        }
    }
    
    
    if(true)
    {
        if ( isset($cost) )
        {
            if($slug != 'cart')
            {
                if($delivery_type =! '' && $delivery_type != 'Pickup')
                $cart->add_fee( $label, $cost );
            }
        }
    }
}
function hook_css() {
    ?>
    <style>
        body.product-template-default.single.single-product table.ui-datepicker-calendar td {
            border: 1px solid;
            margin: 10px !important;
            padding: 5px !important;
            justify-content: center;
            text-align: center;
        }
        
        body.product-template-default.single.single-product table.ui-datepicker-calendar {
            background: white;
            border: 1px solid;
        }
    </style>
    <?php
}
add_action('wp_head', 'hook_css');

add_action( 'woocommerce_before_order_itemmeta', 'add_admin_order_item_custom_fields', 10, 2 );
function add_admin_order_item_custom_fields( $item_id, $item ) {

    echo '<table cellspacing="0" class="display_meta">';
        echo '<tr><th>' . __("spice_level", "woocommerce") . ':</th><td>'.get_post_meta($item->get_order_id(),'spice_level',true).'</td></tr>';
    echo '</table>';
}
add_action( 'woocommerce_thankyou', 'misha_view_order_and_thankyou_page', 20 );
add_action( 'woocommerce_view_order', 'misha_view_order_and_thankyou_page', 20 );

function misha_view_order_and_thankyou_page( $order_id ){  ?>
    <!-- <h2>Spice Level</h2> -->
    <table class="woocommerce-table shop_table spice_level">
        <tbody>
            <tr>
                <th>Spice Level</th>
                <th></th>
                <td><?=get_post_meta( $order_id, 'spice_level', true )?></td>
            </tr>
        </tbody>
    </table>
    <script>
        jQuery('table.woocommerce-table.shop_table.spice_level tr').insertBefore(jQuery('table.woocommerce-table.shop_table.order_details tfoot tr:nth-child(2)'))
        jQuery('table.woocommerce-table.shop_table.spice_level').remove();
		
    </script>
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );

<?php }
