<?php get_header(); 
pageBanner();
?>

		<div class="col text-left justify-content-left archive-back-link">
    <p><a href="<?php echo site_url('/') ?>">
      <i class="fa fa-home" aria-hidden="true"></i> Back to Home</a></p>
		</div>
	</div>
	<div class="row d-flex align-items-center">
		<div class="col-12 text-center justify-content-center">
    <h3>All Website Pages</h3>
		</div>
		<div class="col-12 text-left justify-content-left">
   			 <ul>
					<?php 
					wp_list_pages( array(
					'sort_column' => 'menu_order',
				    'title_li'     => '',
					'exclude'      => '16, 18, 1398, 894',

    ) );
					 ?>
			</ul>
		</div>
		
	</div>
	<div class="row d-flex align-items-center">
		<div class="col-12 text-center justify-content-center">
    <h3>All Shopping Guides</h3>
		</div>
		<div class="col-12 text-left justify-content-left">
   			 <ul>
				<?php
$args = array(
   'category' => 69,
);
$sidebar = get_posts($args);
        foreach ( $sidebar as $post ) : 
            setup_postdata( $post ); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php
        endforeach;
        wp_reset_postdata();

?>
			</ul>
		</div>
		
	</div>
	<?php get_template_part('template-parts/footer'); ?>

	
</div>
