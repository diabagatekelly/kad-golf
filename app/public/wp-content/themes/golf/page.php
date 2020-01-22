<?php get_header();
pageBanner();
?>


		<div class="col-xs-12 col-lg-9 text-center justify-content-center">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link" id="learn-tab" data-toggle="tab" href="#learn" role="tab" aria-controls="learn" aria-selected="false">Learn</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="true">Shop</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="learn" role="tabpanel" aria-labelledby="learn-tab">
  <?php
	while(have_posts()) {
		the_post();

		$categoryID = get_field('category');

		$category = get_category($categoryID[0]);

		$slug = $category->slug;

		$pageCategory = $slug . "-learn";		
	}

	$args = array(
		'post_type' => 'post',
		'category_name' => $pageCategory,
		'posts_per_page' => -1
	);

	$learn = new WP_Query($args);

	if($learn->have_posts()) {
while($learn->have_posts(  )) {
$learn->the_post(  ); 
	?>

   
<div class="row d-flex align-items-center page-container">
    <div class="col text-left justify-content-center">
    <ul>
		<li>
			<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
		</li>
	</ul>
    </div>
</div>
	
	<?php
	}
} else {
	?>
	<div class="row d-flex align-items-center page-container">
    <div class="col text-left justify-content-center">
    <h4 class="text-center">Coming Soon!</h4>
    </div>
</div>
	
	
	<?php 
	}
?>
	
	</div>
  <div class="tab-pane fade show active text-left" id="shop" role="tabpanel" aria-labelledby="shop-tab">
	  <div class="row d-flex align-items-center page-desc">
		  <div class="col text-center justify-content-center">
			   <h6>
		  Check out these shopping guides to help pick the best golf equipment for you, from the most popular golf brands, and at deeply discounted prices.
	  </h6>
		  </div>
	  </div>
	  <div class="row d-flex align-items-center shopping-lists">
		  <div class="col text-left justify-content-center">
			  
		 
	 
	<?php
	while(have_posts()) {
		the_post();

		$categoryID = get_field('category');

		$category = get_category($categoryID[0]);

		$slug = $category->slug;

		$pageCategory = $slug . "-shop";		
	}

	$args = array(
		'post_type' => 'post',
		'category_name' => $pageCategory,
		'posts_per_page' => -1
	);

	$shop = new WP_Query($args);

	if($shop->have_posts()) {
while($shop->have_posts(  )) {
$shop->the_post(  ); 
	?>
	  
	<ul>
		<li>
			<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
		</li>
	</ul>
	
	
	<?php 
}
} else {
?>
<h4 class="text-center">Coming Soon!</h4>

<?php 
}
	
?>

			   </div>	  
	  </div>
	
	</div>
</div>
		</div>
		<?php get_template_part('template-parts/sidebar'); ?>

	</div>
	
	<?php get_template_part('template-parts/footer'); ?>

</div>
