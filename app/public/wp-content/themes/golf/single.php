<?php 
get_header();
		pageBanner();

?>

		<div class="col text-left justify-content-left archive-back-link">
		<?php 
		 $cat = get_the_category();
		 
	$arg = new WP_Query(array(
	'post_type' => 'page',
	'category_name' => $cat[0]->slug
)
);

	while($arg -> have_posts()){
		$arg -> the_post();
		?>	
		<a href="<?php the_permalink() ?>"> <<< Back to <?php the_title() ?></a>
	<?php
			}
		 ?>
	
		</div>
	</div>

    <div class="row d-flex align-items-top category-page">
        <div class="col-xs-12 col-lg-9 text-center justify-content-center">
				
            <div class="row d-flex align-items-top desc-add">
<div class="posts_li">

<?php
if(have_posts()) {

while(have_posts(  )) {
    the_post(); ?>



	<div>
<div class="row d-flex align-items-top category-post">

<div class="col-12 category-content">
<?php 
$blocks = parse_blocks( $post->post_content );
  foreach( $blocks as $block ) {
	  $postID = $block['attrs']['ref'];
	  ?>
	  <div class="li_item" data-id="<?php echo $postID ?>">
	  <?php echo render_block( $block );
	  if($block['blockName'] == 'core/block') {
		?>
		<div class="row d-flex align-items-center category-buttons">
        <?php 

                $existStatus = 'no';
        
                        $existsQuery = new WP_Query(array(
                            'author' => get_current_user_id(),
                            'post_type' => 'favorites',
                            'meta_query' => array(
                                array(
                                    'key' => 'liked_post_id',
                                    'compare' => '=',
                                    'value' => $postID
                                )
                            )
                                ));
            
                                if(is_user_logged_in() && $existsQuery->found_posts) {
                                    $existStatus = 'yes';
                                }

                               
                                  
                                ?>
        <div class="col text-left-btn like-box" data-post="<?php echo $postID?>" data-exists="<?php echo $existStatus;?>">
        <h3 class="sd-title">Add to Favorites:</h3>
            
        <div class="faveBox">
        <img width="50" height="45" class="btn btn-sm faves btn-white" src="<?php bloginfo('template_url')?>/images/add_faves.png">
        <div class="spinner-loader"></div>
        </div>
        <button class="btn btn-success btn-sm faves">
        Added to Favorites <i class="fa fa-check"></i>
        </button>
        </div>		
                                
		</div>
		<?php
	  }
	  ?>
	  </div>
	  <?php
}
?>

</div>
</div>
		</div>

<?php
}
?>
</div>
			</div>

<?php

}else {
?>
<div class="row d-flex align-items-center category-post">

    <div class="col">
    <h4>Coming Soon!</h4>
</div>
<?php
}
?>
</div>


<?php get_template_part('template-parts/sidebar'); ?>

        </div>
		<?php get_template_part('template-parts/footer'); ?>

</div>