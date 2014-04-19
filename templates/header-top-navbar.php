<header class="banner navbar navbar-default navbar-fixed-top" role="banner"><!-- toggle fixed/static -->
  <!--<div class="container">-->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!--<a class="navbar-brand" href="<?php echo home_url(); ?>/"><span class="glyphicon glyphicon-star"></span>&nbsp;<?php bloginfo('name'); ?></a>-->
      <a class="navbar-brand" href="<?php echo home_url(); ?>/"><img src="<?php the_field('main_company_logo', 84); ?>" class="img-responsive"></a>
    </div>
    <nav class="collapse navbar-collapse" role="navigation"><!-- Added .navbar-right DE -->
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
    <div id="desktop-phone">
          <!--<span class ="call-intro">Call Us:</span><br>--><i class="glyphicon glyphicon-phone-alt"></i>&nbsp;&nbsp;087 900 5196
    </div>
    <div id="mobile-phone">
          <a href="href="tel:0871115196"" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-phone-alt"></span>Call Us</a>
          <!--<span class ="call-intro">Click to Call</span>&nbsp;<i class="glyphicon glyphicon-phone-alt"></i>--?
    </div>
  <!--</div>-->
</header>
