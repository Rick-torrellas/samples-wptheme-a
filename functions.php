<?php
 /* 
 * @package xample
 */

function see() {
    print_r(filemtime( get_template_directory(  ) . '/style.css' ));
    wp_die();
}

/* see(); */
function xample_title() {
    add_theme_support( 'title-tag' );  
}
add_action( 'after_setup_theme', 'xample_title');
function xample_add_assets() {
    wp_register_style( 'style', get_stylesheet_uri(), [] , filemtime( get_template_directory(  ) . '/style.css' ), 'all' );
    wp_register_script( 'escripts', get_template_directory_uri() . '/assets/main.js' , [] ,  filemtime( get_template_directory(  ) . '/assets/main.js' ), true );
    wp_enqueue_style( 'style' );
    wp_enqueue_script( 'escripts' );
    wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'xample_add_assets' );

add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
register_nav_menus(
    [
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location'
    ]
);
add_image_size('blog-large',800,400,true);
add_image_size('blog-small',300,200,true);
function xample_add_sidebars( ) {
        register_sidebar(
            [
                'name' => 'Page Sidebar',
                'id' => 'page-sidebar',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'
            ]
            );
            register_sidebar(
                [
                    'name' => 'Blog Sidebar',
                    'id' => 'blog-sidebar',
                    'before_title' => '<h4 class="widget-title">',
                    'after_title' => '</h4>'
                ]
                );
}
add_action('widgets_init','xample_add_sidebars');
function xample_custom_post() {
    $arg = [
        'labels' => [
            'name' => 'Cars',
            'singular_name' => 'Car'
        ],
        'menu_icon' => 'dashicons-buddicons-replies',
        'hierarchical' => true,
        'public' => true,
        'has_archive' => true,
        'supports' => ['title','editor','thumbnail','custom-fields']
    ];
    register_post_type('cars',$arg);
}
add_action('init', 'xample_custom_post');
function xample_custom_taxonomy() {
    $arg = [
        'labels' => [
            'name' => 'Brands',
            'singular_name' => 'Brand'
        ], 
        'public' => true,
        'hierarchical' => true
    ];
    register_taxonomy('brands',['cars'],$arg);
}
add_action('init','xample_custom_taxonomy' );

add_action('wp_ajax_enquiry','xample_enquiry_form');
add_action('wp_ajax_nopriv_enquiry','xample_enquiry_form');
function xample_enquiry_form() {
// Esta funcion basicamente agarra los valores usados en el formulario 'enquiry' y los mandara al email usado en el formulario. 
    if(  !wp_verify_nonce( $_POST['nonce'], 'ajax-nonce' )  )
	{
		wp_send_json_error('Nonce is incorrect', 401);
		die();
	}
    $formdata = [];
    wp_parse_str($_POST['enquiry'], $formdata);

// Admin email
$admin_email = get_option('admin_email');
	// Email headers
	$headers[] = 'Content-Type: text/html; charset=UTF-8';
	$headers[] = 'From: My Website <' . $admin_email . '>';
	$headers[] = 'Reply-to:' . $formdata['email'];
    	// Who are we sending the email to?
	$send_to = $admin_email;
    	// Subject
	$subject = "Enquiry from " . $formdata['fname'] . ' ' . $formdata['lname']; 
	// Message
	$message = '';
    foreach($formdata as $index => $field)
	{
		$message .= '<strong>' . $index . '</strong>: ' . $field . '<br />';
	}
    try {
		if( wp_mail($send_to, $subject, $message, $headers) )
		{
			wp_send_json_success('Email sent');
		}
		else {
			wp_send_json_error('Email error');
		}
	} catch (Exception $e)
	{
			wp_send_json_error($e->getMessage());
	}

	wp_send_json_success( $formdata['fname'] );

}
function xample_short_code() {
    return "NALGA";
}
add_shortcode( 'el_shortcode', 'xample_short_code' );

function xample_file_shortcode() {
    ob_start();
    get_template_part('includes/latest', 'cars');
    return ob_get_clean();
}
add_shortcode('latest_cars', 'xample_file_shortcode');

function xample_file_shortcode_complex($atts, $content = null, $tag = '')
{

	ob_start();

	print_r($content);

	set_query_var('attributes', $atts);

	get_template_part('includes/latest', 'cars');

	return ob_get_clean();

}
add_shortcode('latest_cars', 'xample_file_shortcode_complex');

function xample_search_query() {
    $paged = (get_query_var('paged') ? get_query_var('paged') : 1);
    $args = [
        'paged' => $paged,
        'post_type' => 'cars',
        'posts_per_page' => 1,
        'tax_query' => [],
        'meta_query' => [
            'relation' => 'AND',
        ] 
        ];
        if (isset($get_keyword)) {
            if (!empty($get_keyword)) {
                $args['s'] = sanitize_text_field($get_keyword);
            }
        }
        if (isset($get_brand)) {
            if(!empty($get_brand)) {
                $args['tax_query'][] = [
                    'taxonomy' => 'brands',
                    'field' => 'slug',
                    'terms' => sanitize_text_field([$get_brand])
                ];
            }
        }
        if (isset($get_price_above)) {
            if(!empty($get_price_above)) {
                $args['meta_query'][] = [
                    'key' => 'price',
                    'value' => sanitize_text_field($get_price_above),
                    'type' => 'numeric',
                    'compare' => '>='
                ];
            }
        }
        if (isset($get_price_below)) {
            if(!empty($get_price_below)) {
                $args['meta_query'][] = [
                    'key' => 'price',
                    'value' => sanitize_text_field($get_price_below),
                    'type' => 'numeric',
                    'compare' => '<='
                ];
            }
        }
        return new WP_Query($args);
}

function xample_test() {
    return 'JAI';
}

?>
