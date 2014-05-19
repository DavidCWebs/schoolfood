<article <?php post_class(); ?>>
  <div class="row page-header">
          <div class="col-md-4">
             <a href="<?php the_permalink(); ?>"><?php carawebs_home_featured_image('thumbnail', 'img-circle'); ?></a>
             
          </div>
          <div class="col-md-8">
            <header>
                <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            </header>
            <div class="entry-summary">
                <?php carawebs_custom_excerpt(); ?>
                <!--<?php get_template_part('templates/entry-meta'); ?>-->
            </div>   
          </div>
      <hr>
  </div>
    
</article>
