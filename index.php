<?php get_template_part('templates/page', 'header'); ?>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

  <!---Following block added by DE to allow page content to be added before blog posts 
  =================================================================================--->
  <?php
if ( 'page' == get_option('show_on_front') && get_option('page_for_posts') && is_home() ) : the_post();
	$page_for_posts_id = get_option('page_for_posts');
	setup_postdata(get_page($page_for_posts_id));
?>
	<div id="post-<?php the_ID(); ?>" class="page">
		<div class="entry-content">
			<?php the_content(); ?>
			<!--<?php edit_post_link('Edit', '', '', $page_for_posts_id); ?>-->
		</div>
	</div>
<?php
	rewind_posts();
endif;
?>
  <!------------------------------------------------------------------------------------------->
  
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/content', get_post_format()); ?>
<?php endwhile; ?>
<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
