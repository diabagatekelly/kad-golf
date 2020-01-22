<?php 
require get_theme_file_path('/inc/fave-route.php');

function important_files() {
    wp_enqueue_script('javaScript', get_theme_file_uri('/js/scripts-bundled.js'), 'NULL', microtime(), true);
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.3.1.slim.min.js');
    wp_enqueue_script('popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js');
    wp_enqueue_script('bootstrap-js', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js');
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Graduate|Ubuntu&display=swap');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('bootstrap', '//stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
    
    wp_enqueue_style('main_styles', get_stylesheet_uri(), NULL, microtime()); //get style sheet style.css

    wp_localize_script('javaScript', 'siteData', array(
        'root_url' => get_site_url(),
        'nonce' => wp_create_nonce('wp_rest'),
        'favorites' => count_user_posts(get_current_user_id(), 'favorites')
    ));
}
add_action('wp_enqueue_scripts', 'important_files');

function features() {
    register_nav_menu('generalMenu', 'General Menu');
    register_nav_menu('golfClubsMenu', 'Golf Clubs Menu');
	register_nav_menu('golfBallsMenu', 'Golf Balls Menu');
	register_nav_menu('apparelMenu', 'Apparel Menu');
	register_nav_menu('accessoriesMenu', 'Accessories Menu');
    register_nav_menu('dealsMenu', 'Deals Menu');
	register_nav_menu('footerMenu', 'Footer Menu');
    register_nav_menu('legalMenu', 'Legal Menu');


    add_theme_support('title-tag');
	add_filter( 'get_the_archive_title', function ($title) {    
    if ( is_category() ) {    
            $title = single_cat_title( '', false );    
        } elseif ( is_tag() ) {    
            $title = single_tag_title( '', false );    
        } elseif ( is_author() ) {    
            $title = '<span class="vcard">' . get_the_author() . '</span>' ;    
        } elseif ( is_tax() ) { //for custom post types
            $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
        }    
    return $title;    
});
}
add_action('after_setup_theme', 'features');

add_action( 'wp_enqueue_scripts', 'load_dashicons_front_end' );
function load_dashicons_front_end() {
  wp_enqueue_style( 'dashicons' );
}

function custom_rest() {
    register_rest_field('page', 'image', array(
        'get_callback' => function() {
            $pageBannerImage = get_field('image'); 
            return $pageBannerImage['url'];
        }
    ));
    register_rest_field('favorites', 'faveCount', array(
        'get_callback' => function() {
            return count_user_posts(get_current_user_id(), 'favorites');
        }));
    register_rest_field('favorites', 'authorid', array(
        'get_callback' => function() {
            return get_the_author_ID();
        }));
}
add_action('rest_api_init', 'custom_rest');

function jp_search_filter( $query ) {
    if ( $query->is_search && $query->is_main_query() ) {
    $query->set( 'post__not_in', array( 16, 18 ) );
    }
    }
    
    add_action( 'pre_get_posts', 'jp_search_filter' );
    

function pageBanner($args = NULL) {
	if(is_archive()) {
		?>
		<div class="container-fluid general-page">
    <div class="row d-flex h-100 align-items-top page-title" style="background-image: linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.7)), url(<?php echo site_url('/wp-content/uploads/2019/12/blog.jpg') ?>); background-repeat: no-repeat; background-size: cover;">
       
    </div>
	<div class="row d-flex align-items-top page-content">
		 <div class="col-12 text-center justify-content-center">
            <h2><?php the_archive_title()?></h2>
        </div>
	<?php	
	} else if(is_home()) {
		?>
		<div class="container-fluid general-page">
    <div class="row d-flex h-100 align-items-top page-title" style="background-image: linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.7)), url(<?php echo site_url('/wp-content/uploads/2019/12/index.jpg') ?>); background-repeat: no-repeat; background-size: cover;">
       
    </div>
	<div class="row d-flex align-items-center page-content">
		 <div class="col-12 text-center justify-content-center">
            <h2>Blog</h2>
        </div>
		
		<?php
	} else {
		?>
		<div class="container-fluid general-page">
    <div class="row d-flex h-100 align-items-top page-title" style="background-image: linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.7)), url(<?php $pageBannerImage = get_field('image'); echo $pageBannerImage['url'] ?>); background-repeat: no-repeat; background-size: cover;">
       
    </div>
	<div class="row d-flex align-items-top page-content">
		 <div class="col-12 text-center justify-content-center">
            <h2><?php the_title()?></h2>
        </div>
		<?php
	}
}

add_action('wp_loaded', 'noAdminBar');
function noAdminBar() {
    $currentUser = wp_get_current_user();
    if (count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
        show_admin_bar(false);
    }
}

add_action('admin_init', 'redirectSubsHomepage');
function redirectSubsHomepage() {
    $currentUser = wp_get_current_user();
    if (count($currentUser->roles) == 1 AND $currentUser->roles[0] == 'subscriber') {
        wp_redirect(site_url('/'));
        exit;
    }
}

add_filter('login_headerurl', 'headerUrl');
function headerUrl() {
    return esc_url(site_url('/'));
}

add_filter('login_headertext', 'headerText');
function headerText() {
    return 'Designed by KAD Enterprises';
}

add_action('login_enqueue_scripts', 'loginCSS' );
function loginCSS() {
    wp_enqueue_style('main_styles', get_stylesheet_uri(), NULL, microtime()); //get style sheet style.css
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Graduate|Ubuntu&display=swap');
}

add_filter('wp_insert_post_data', 'favePrivacy', 10, 2);
function favePrivacy($data, $postarr) {
    if($data['post_type'] == 'favorites') {
        if(count_user_posts(get_current_user_id(), 'favorites') > 50 AND !$postarr['ID']) {
            die("You have reached the max number of favorites.");
        }
    }

    // if($data['post_type'] == 'favorites' AND $data['post_status'] != 'trash') {
    //     $data['post_status'] = "private";
    // }
    return $data;
}

function remove_private_prefix($title) {
	$title = str_replace('Private: ', '', $title);
	return $title;
}
add_filter('the_title', 'remove_private_prefix');
?>