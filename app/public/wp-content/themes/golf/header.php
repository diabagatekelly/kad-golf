<! DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php wp_head(  ); ?>
        <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/9ba4c4817b400288caf9dc14f/2fabfd14d125f6599d757866c.js");</script>
    </head>
    <body <?php body_class() ?>>
    <header>
		
    <nav class="navbar navbar-expand-xl fixed-top navbar-light bg-light">
		
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
		<a class="navbar-brand" href="<?php echo site_url()?>"><h1>
			<?php bloginfo('name') ?>
			</h1></a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          General Info
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			 <?php 
	  wp_nav_menu(array(
	  'theme_location' => 'generalMenu'
	  ))
	  ?>
        </div>
      </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Golf Clubs
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			 <?php 
	  wp_nav_menu(array(
	  'theme_location' => 'golfClubsMenu'
	  ))
	  ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Golf Balls
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			 <?php 
	  wp_nav_menu(array(
	  'theme_location' => 'golfBallsMenu'
	  ))
	  ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Apparel & Footwear
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php 
	  wp_nav_menu(array(
	  'theme_location' => 'apparelMenu'
	  ))
	  ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Accessories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php 
	  wp_nav_menu(array(
	  'theme_location' => 'accessoriesMenu'
	  ))
	  ?>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Special Deals
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<?php 
	  wp_nav_menu(array(
	  'theme_location' => 'dealsMenu'
	  ))
	  ?>
        </div>
      </li>
    </ul>
    <form role="search" method="get" class="search-form form-inline my-2 my-md-0" action="<?php echo home_url( '/' ); ?>">
         <?php if(is_user_logged_in()) {

$likeCount = new WP_Query(array(
  'post_type' => 'favorites',
    ));
      ?>
      <a data-toggle="tooltip" data-placement="bottom" title="View Favorites"class="dashicons dashicons-heart" href="<?php echo esc_url(site_url('/favorites'))?>"><sup class="faveSup"><?php echo $likeCount->found_posts; ?></sup></i></a>

      <span class="avatar"><?php echo get_avatar(get_current_user_id(), 33) ?></span><a href="<?php echo wp_logout_url()?>" class="btn btn-primary btn-sm logout">Logout</a>

      <?php
    } else {
      ?>
    <a href="<?php echo wp_login_url()?>" class="btn btn-primary btn-sm">Login</a>
    <a href="<?php echo wp_registration_url() ?>" class="btn btn-primary btn-sm">Sign Up</a>
      <?php
    }
    ?>
    <a class="dashicons dashicons-search" href="<?php echo esc_url(site_url('/search')) ?>"></a>
</form>
  </div>
</nav>
</header>