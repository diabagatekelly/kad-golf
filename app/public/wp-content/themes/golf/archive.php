<?php
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
        <div class="row d-flex align-items-center regular-archive-posts">

<?php

    
if(have_posts()) {

while(have_posts(  )) {
the_post(); ?>
<div class="col-12 text-left indiv-posts">
            <h4><a href="<?php the_permalink();?>"><?php the_title()?></a></h4>
            <a href="<?php the_permalink();?>"><img class="img-fluid" src="<?php $pageBannerImage = get_field('image'); echo $pageBannerImage['url'] ?>"></a>
            <?php echo wp_trim_words(get_the_content(), 100)?>
            <a href="<?php the_permalink(); ?>">View Full Post</a>
            </div>

<?php
}
} else {
    ?>
    <div class="col">
    <h4>Coming Soon!</h4>
</div>
<?php
}
?>
    


<div class="col-12 text-left">
<?php 
        echo paginate_links();
    ?>
</div>
</div>
        
        </div>
    <?php get_template_part('template-parts/sidebar'); ?>
	</div>
	<?php get_template_part('template-parts/footer'); ?>

	
</div>