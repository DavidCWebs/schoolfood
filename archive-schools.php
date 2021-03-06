<?php get_template_part('templates/page', 'header'); ?>
<div class="row">
    <div class="col-sm-12 col-md-10 emphasis-text">
        <?php the_field('schools_introduction', 'option'); ?>
    </div>
</div>

<?php if (!have_posts()) : ?>
  <div class="alert alert-warning">
    <?php _e('Sorry, no results were found.', 'roots'); ?>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>
    <div id="grid" class="top-l-pad">
        <?php while (have_posts() ) : the_post(); ?>
        <div class="brick">
        <?php get_template_part('templates/content', 'school-teaser'); ?>
        </div>
        <?php endwhile; ?>
        <div class="gridbreak"></div>
    </div>
<?php if ($wp_query->max_num_pages > 1) : ?>
  <nav class="post-nav">
    <ul class="pager">
      <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'roots')); ?></li>
      <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'roots')); ?></li>
    </ul>
  </nav>
<?php endif; ?>
