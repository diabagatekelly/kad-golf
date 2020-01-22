<?php get_header(); 
pageBanner();
?>

		<div class="col text-left justify-content-left archive-back-link">
    <p><a href="<?php echo site_url('/') ?>">
      <i class="fa fa-home" aria-hidden="true"></i> Back to Home</a></p>
		</div>
	</div>
	<div class="row d-flex align-items-center">
		<div class="col-12 text-left justify-content-left">
        <form role="search" method="get" class="search-form form-inline" action="<?php echo home_url( '/' ); ?>">
    <label for="s">
        <input id="s" type="search" class="search-field form-control-sm mr-sm-2"
            placeholder="<?php echo esc_attr_x( 'What are you looking for?', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <button type="submit" class="btn btn-sm btn-outline-primary my-2 my-sm-0 search-submit"
			value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">Search</button>
</form>
		</div>
		
	</div>
	<?php get_template_part('template-parts/footer'); ?>

	
</div>
