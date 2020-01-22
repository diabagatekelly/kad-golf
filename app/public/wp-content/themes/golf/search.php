<?php get_header(); ?>
<div class="container-fluid general-page">
    <div class="row d-flex h-100 align-items-top page-title" style="background-image: linear-gradient(rgba(255,255,255,0.7), rgba(255,255,255,0.7)), url(<?php echo site_url('/wp-content/uploads/2019/12/blog.jpg') ?>); background-repeat: no-repeat; background-size: cover;">
       
    </div>
	<div class="row d-flex align-items-top page-content px-5">
		 <div class="col-12 text-center justify-content-center">
            <h2>Search Results</h2>
        </div>
<div class="col-12 text-left justify-content-left mt-5">
<h4 style='font-weight:bold;color:black'>Search Results for: "<?php echo get_search_query() ?>"</h4>
        </div>
        <div class="col-12 text-left justify-content-left mt-3">
        <h5>Shopping Guides</h5>
<?php 
$terms = get_terms( 'category', array(
    'name__like' => $s,
  ) );

  if(count($terms) > 0) {
    foreach ( $terms as $term ) {
        ?>
      <p><a href="<?php echo esc_url( get_term_link( $term ) )?>"><?php echo esc_attr( $term->name ) ?></a></p>
  
      <?php
    }
} else {
    ?>
    <p>No matches.</p>
    <?php
}
?>
        <h5>Pages</h5>

<?php
if(have_posts()) {
while (have_posts()) {
    the_post();
    ?>

    <?php
    get_template_part('template-parts/content', get_post_type());
    
}
} else {
?>
<p>No matches.</p>
<?php
}
?>
        </div>
        <div class="col-12 text-left justify-content-left">
        <form role="search" method="get" class="search-form form-inline my-3" action="<?php echo home_url( '/' ); ?>">
    <label for="s">
        <input id="s" type="search" class="search-field form-control mr-sm-2"
            placeholder="<?php echo esc_attr_x( 'What are you looking for?', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <button type="submit" class="btn btn-outline-primary my-2 my-sm-0 search-submit"
			value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>">Search</button>
</form>
</div>
    </div>
    <?php get_template_part('template-parts/footer'); ?>
</div>