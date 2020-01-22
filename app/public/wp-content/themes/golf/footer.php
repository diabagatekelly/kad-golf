<div class="container-fluid footer">
    <div class="row d-flex align-items-center">
      <div class="col-12 text-center justify-content-center">
      <?php wp_nav_menu(array(
        'theme_location' => 'footerMenu'
        )) ?>
      </div>
      <div class="col-12 text-center justify-content-center">
		  Legal stuff
      <?php wp_nav_menu(array(
        'theme_location' => 'legalMenu'
        )) ?>
      </div>
      <div class="col-12 text-center justify-content-center">
		  Social media
      </div>  
    </div>
    <div class="row d-flex align-items-center">
      <div class="col text-center justify-content-center">
        <p>2019 Copyright Reserved KAD Enterprises </p>
      </div>
      </div>
  </div>
 

<?php wp_footer(); ?>
</body>
</html>