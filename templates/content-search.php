<article <?php post_class(); ?>>
  <div class="row page-header">
          <div class="col-md-8">
            <header>
                <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            </header>
            <div class="entry-summary">
                <?php the_excerpt(); ?>
                <?php get_template_part('templates/entry-meta'); ?>
            </div>   
          </div>
</div>
    
</article>