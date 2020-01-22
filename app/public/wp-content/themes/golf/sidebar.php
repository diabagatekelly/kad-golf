<div class="col text-center">
        <h4>Other Shopping Guides</h4>
<ul class="parent"> <?php
$args = array(
   'category' => 69,
   'exclude' => array( $post->ID )
);
$sidebar = get_posts($args);
        foreach ( $sidebar as $post ) : 
            setup_postdata( $post ); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php
        endforeach;
        wp_reset_postdata();

?> </ul>
<p class="font-weight-bold">
	<a href="<?php echo site_url("/blog") ?>">
	View All Site Pages & Guides
	</a>
	</p>

	<div class="row d-flex align-items-top mailing">
            <div class="col-12 text-center">
                	    <h4>Join Mailing List</h4>
                <?php echo do_shortcode('[mc4wp_form id="1152"]') ?>
            </div>
        </div>
	
</div>