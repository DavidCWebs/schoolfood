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
            $date = get_field('date_started');
            $size = get_field('size_of_school');
            $contact = get_field('contact_person');
            $testimonial = get_field('main_testimonial');
            if (empty ($date) && empty ($size) && empty ($contact)) {
                $introblock = '';
            } else {
            
                $introblock = 'introblock';
            
            }
            
        ?>
        <div class="orangeback emphasis-text <?php echo $introblock; ?>">   
        <?php
                     
            if(!empty ($date)){
                ?><p>Date Started:&nbsp;<?php echo $date;
                ?></p><?php
            } else {
            $introblock = '';
            return;
            } 
            
            if(!empty ($size)){
                ?><p>Size of School:&nbsp;<?php echo $size;
                ?></p><?php
            
            } else {
            $introblock = '';
            return;
            }
            
            if(!empty ($contact)){
                ?><p>Contact Person:&nbsp;<?php echo $contact;
                ?></p><?php
            
            } else {
            $introblock = '';
            return;
            }
            
            ?>
            
            
        </div><?php
            if(!empty($testimonial) ){
            ?>
            <blockquote><i class="i-2x icon-quote-left"></i>&nbsp;&nbsp;
                <?php echo $testimonial;?> 
                <span class="person">- <?php the_field('testimonial_person');?>, <?php the_field('person_title'); ?>
                </span></blockquote>
            <?php
            } else {
            return;
            }
            ?>
        <?php the_content(); ?>
        </div>
    </div>
        
    <!--<footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>-->
    <!--<?php //comments_template('/templates/comments.php'); ?>-->
  </article>
<?php endwhile; ?>