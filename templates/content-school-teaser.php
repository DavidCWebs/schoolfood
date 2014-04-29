<article <?php post_class(); ?>>
  
             <a href="<?php the_permalink(); ?>"><?php carawebs_home_featured_image('thumbnail'); ?></a>
             
<header>
    <h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
</header>
<div class="entry-summary">
    <?php the_excerpt(); ?>
    <?php get_template_part('templates/entry-meta'); ?>
</div>   
          
</article>
