
   <a href="<?php the_permalink() ?>">
   <p><?php the_title() ?></p>
   <img width="200" src="<?php $pageBannerImage = get_field('image'); echo $pageBannerImage['url']?>">
</a>

  