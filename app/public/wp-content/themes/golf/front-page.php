<?php get_header();?>
<div class="container-fluid homepage">
	<div class="row d-flex header-pics">
		 <a href="<?php echo site_url('/golf-irons')?>" class="col-xs-12 col-sm-6 justify-content-center text-center categories irons">
		<?php $image= get_field('image', 162) ?>
      <img src="<?php echo $image['url'] ?>" class="img-fluid" alt="Discount top golf irons">
    <h4 class="white">Golf Irons</h4>
    </a>
    <a href="<?php echo site_url('/golf-drivers')?>" class="col-xs-12 col-sm-6 justify-content-center text-center categories drivers">
		<?php $image2= get_field('image', 171) ?>
      <img src="<?php echo $image2['url'] ?>" class="img-fluid" alt="Discount top golf drivers">
      <h4 class="white">Golf Drivers</h4>
    </a>
   <a href="<?php echo site_url('/golf-wedges')?>" class="col-xs-12 col-sm-6 justify-content-center text-center categories wedges">
		<?php $image3= get_field('image', 182) ?>
      <img src="<?php echo $image3['url'] ?>" class="img-fluid" alt="Discount top golf wedges">
      <h4 class="black">Golf Wedges</h4>
    </a>
    <a href="<?php echo site_url('/golf-balls')?>" class="col-xs-12 col-sm-6 justify-content-center text-center categories balls">
		<?php $image4= get_field('image', 187) ?>
      <img src="<?php echo $image4['url'] ?>" class="img-fluid" alt="Discount top golf balls">
      <h3 class="black">Golf Balls</h3>
    </a>
	</div>
</div>
<div class="container-fluid">
  <div class="row d-flex align-items-center brand-container">
    <div class="col justify-content-center text-center">
    <h2>BRAND SAVINGS</h2>
    </div>
  </div>
  <div class="row d-flex align-items-center brand-row">
    <a href="<?php echo site_url('/taylormade-golf')?>" class="col-xs-12 col-sm justify-content-center text-center brands">
		<?php $image4= get_field('image', 213) ?>
      <img src="<?php echo $image4['url'] ?>" alt="TaylorMade Golf Discounts" class="img-fluid">
    </a>
    <a href="<?php echo site_url('/callaway-golf')?>" class="col-xs-12 col-sm justify-content-center text-center brands">
      <?php $image4= get_field('image', 216) ?>
      <img src="<?php echo $image4['url'] ?>" alt="Callaway Golf Discounts" class="img-fluid">
    </a>
    <a href="<?php echo site_url('/titleist-golf')?>" class="col-xs-12 col-sm justify-content-center text-center brands">
      <?php $image4= get_field('image', 219) ?>
      <img src="<?php echo $image4['url'] ?>" alt="Titleist Golf Discounts" class="img-fluid">
    </a>
</div>
<div class="row d-flex align-items-center brand-row">
    <a href="<?php echo site_url('/ping-golf')?>" class="col-xs-12 col-sm justify-content-center text-center brands">
      <?php $image4= get_field('image', 222) ?>
      <img src="<?php echo $image4['url'] ?>" alt="Ping Golf Discounts" class="img-fluid">
    </a>
    <a href="<?php echo site_url('/cobra-golf')?>" class="col-xs-12 col-sm justify-content-center text-center brands">
      <?php $image4= get_field('image', 225) ?>
      <img src="<?php echo $image4['url'] ?>" alt="Cobra Golf Discounts" class="img-fluid">
    </a>
    <a href="<?php echo site_url('cleveland-golf')?>" class="col-xs-12 col-sm justify-content-center text-center brands">
     <?php $image4= get_field('image', 228) ?>
      <img src="<?php echo $image4['url'] ?>" alt="Cleveland Golf Discounts" class="img-fluid">
    </a>
  </div>
  <div class="row d-flex align-items-center discount-container">
    <div class="col justify-content-center text-center">
    <h2>BEST GOLF DISCOUNTS</h2>
    </div>
  </div>
   <div class="row d-flex">
        <div class="col carousel">
      <?php echo do_shortcode('[slide-anything id="48"]') ?>
        </div>
  </div>

	<div class="row d-flex home-description">
		<div class="col text-center">
			<?php
			$args = array(
			    'category_name' => 'home'
			    );
			    
			    $home = new WP_Query($args);
			
			while($home->have_posts()) {
			$home->the_post(); ?>
			<h1>
				Welcome to <?php bloginfo('title') ?>
			</h1>
			<p>
				<?php the_content() ?>
			</p>
<?php
}
?>
		</div>
	</div>
	<div class="row d-flex align-items-top discount-container">
	    <div class="col-xs-12 col-md-6">
	         <div class="col-12 justify-content-center text-center">
    <h2>RECENT GUIDES</h2>
    </div>
     <div class="col-12 text-center guides">

			<ul>
				<li>
					<?php 
					$args = array(
					    'category_name' => 'shop'
					    );
					    
					    $shopGuides = new WP_Query($args);
					    
					    while($shopGuides->have_posts()) {
					        $shopGuides->the_post();
					        ?>
					        
					       <a href="<?php the_permalink()?>"><?php the_title(); ?></a>
					        
					      <?php
					    }
					 ?>
				</li>
			</ul>
			
        </div>
	    </div>
	    <div class="col-xs-12 col-md-6">
	         <div class="col-12 justify-content-center text-center">
    <h2>JOIN MAILING LIST</h2>
    </div>
    <div class="col-12 text-center guides">
        <div class="row d-flex align-items-top mailing">
            <div class="col-12 text-left justify-content-left">
                <?php echo do_shortcode('[mc4wp_form id="1152"]') ?>
            </div>
        </div>
    </div>
	    </div>
   
  </div>
  <?php get_template_part('template-parts/footer'); ?>

</div>
