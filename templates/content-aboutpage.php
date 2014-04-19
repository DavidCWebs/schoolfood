<?php require_once ( get_template_directory() . '/lib/custom.php'); ?>
<?php while (have_posts()) : the_post(); ?>
 
<div id="gs-section-one" class="container-fluid">
        <div class="container clearfix bottom-l-pad">
            <div class="row">
                <div class="col-md-6 emphasis-text">
                    <?php the_field('section_one_text'); ?>
                    
                </div>
                <div class="col-md-6 emphasis-text">
                <?php
                /* Add repeater field data as UL */
                if(get_field('quick_facts')): ?>

                        <ul class="i-ul">

                            <?php while(has_sub_field('quick_facts')): ?>

                                    <li><i class="icon-star-sharp i-li blue"></i><?php the_sub_field('bullet'); ?></li>

                            <?php endwhile; ?>

                        </ul>

                    <?php endif;
                ?>
                
                </div>
            </div>
        </div>
<!--Section Two ----------------------------------------------------
-->
<div id="gs-section-twoa" class="redback top-xl-pad bottom-xl-pad row">
    <div class="container clearfix">
        <div class="col-md-6">
                <div id="map_canvas"></div>
        </div>
        <div class="col-md-5 col-md-offset-1">
            <h2><?php the_field('section_two_heading'); ?></h2>
                <div class="emphasis-text">
                    <?php the_field('section_two_text'); ?>
                    <?php
                    if(get_field('schools')): ?>

                            <ul class="i-ul">

                                <?php while(has_sub_field('schools')): ?>

                                        <li><i class="icon-star-sharp i-li"></i><?php the_sub_field('school'); ?></li>

                                <?php endwhile; ?>

                            </ul>

                        <?php endif;
                    ?>
                </div>
        </div>
    </div>

</div>

<!--Section Three ----------------------------------------------------
-->
<div id="about-section-three" class="top-xl-pad bottom-xl-pad row">
    <div class="container clearfix">
        <div class="col-sm-6 column">
            <h2><?php the_field('section_three_heading'); ?></h2>
            <div class="emphasis-text">
                <?php the_field('section_three_text'); ?>
            </div>
        </div>  
        <div class="col-sm-6">
            <h2>Latest From Our Blog</h2>
            
            <?php
            // WP_Query arguments
            $args = array (
                'post_type'              => 'post',
                'posts_per_page'         => '3',
            );

            // The Query
            $latestquery = new WP_Query( $args );

            // The Loop
            if ( $latestquery->have_posts() ) {
                while ( $latestquery->have_posts() ) {
                    $latestquery->the_post();
                    // do something
                    ?>
                    <div class="row page-header">
                        <div class="col-xs-4"><?php 
                            if ( has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                            <?php the_post_thumbnail('thumbnail', array('class' => 'img-circle img-responsive')); ?></a>
                            <?php endif; ?>
                        </div>
                        <div class="col-xs-8">
                        <h4><?php echo the_title(); ?></h4>
                        <?php echo the_excerpt(); ?></div>
                    </div>
                    <?php
                    
                }
            } else {
                // no posts found
            }

            // Restore original Post Data
            wp_reset_postdata();
            ?>
            
            <?php carawebs_section_three_image(); ?>
        </div> 
    </div>
</div>


<?php endwhile; ?>

</div>