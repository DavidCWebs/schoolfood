<?php while (have_posts()) : the_post(); 
  
  //Get Post ID for featured image in sidebar
  //$post_id = get_the_ID(); 
  ?>
  <article <?php post_class(); ?>>
    
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="row top-l-pad">
        <div class="entry-content col-md-10">
        <?php 
        
        carawebs_school_intro(); // Build a school intro-block
        carawebs_school_testimonial(); // Build a school testimonial
        the_content();
                 
        ?>
        </div>
    </div><!-- /.row -->
        
    <!--<footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>-->
    <!--<?php //comments_template('/templates/comments.php'); ?>-->
  </article>
<?php endwhile; ?>