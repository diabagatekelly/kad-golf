<?php /*Template Name: CustomPageT1 */ ?>
<?php

if (!is_user_logged_in()) {
     wp_redirect(esc_url(site_url('/')));
     exit;
 }

get_header(); 
pageBanner();
?>

		<div class="col text-left justify-content-left archive-back-link">
    <p><a href="<?php echo site_url('/') ?>">
      <i class="fa fa-home" aria-hidden="true"></i> Back to Home</a></p>
		</div>
	</div>
	<div class="row d-flex align-items-top fave-page">
        <div class="col-xs-12 col-lg-9">
        <h4 class="faveTxt ml-4 font-bold">You have <span class="faveCount"></span>/50 favorites saved.</h4>
	<ol>
            <?php 
            $userFaves = new WP_Query(array(
                'post_type' => 'favorites',
                'post_per_page' => -1,
                'author' => get_current_user_id()
            ));
            while($userFaves->have_posts()) {
                $userFaves->the_post()
                ?>
                    <li data-id="<?php the_ID() ?>">
                    <div data-id="<?php the_ID() ?>" class="row d-flex align-items-top category-post">
<div class="col-xs-12 col-sm-8 category-content">
<?php the_content()?>
</div>
<div class="col-xs-12 col-sm-2 text-left-btn faveBox">
<button class="btn btn-danger btn-sm delete"><span class="fa fa-trash-o" aria-hidden="true"></span> Delete Fave</button>
<div class="spinner-loader"></div>
</div>
</div>
                    </li>
                <?php
            }
            ?>
    </ol>
        </div>
    <?php get_template_part('template-parts/sidebar'); ?>
	</div>
	<?php get_template_part('template-parts/footer'); ?>

	
</div>