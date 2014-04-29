<?php require_once ( get_template_directory() . '/lib/custom.php'); ?>
<?php while (have_posts()) : the_post(); ?>
        
<!--Main Image
================================================================================-->
<div class="container-fluid">
        <?php  
        carawebs_main_image();        
        ?>
        
<!--Circle Navigation
================================================================================-->    
<div class="top-l-pad bottom-l-pad row">
        <div id="hovercircles" class="container clearfix">
                <div class="col-sm-4"><!-- was col-md-4 column -->
                  <div class="overlay-container col-centered">
                     <?php
                     
                      /*----------------------------------------------------
                      The first circle
                      ---------------------------------------------------*/
                      
                     $circle_1_heading = get_field('circle_1_heading');
                        
                     // If there's an heading, build it
                     if (!empty($circle_1_heading)) {
                            
                        ?><div class= "circle red"><span><?php echo $circle_1_heading; ?></span></div>
                    
                     <?php
                     }  else { // If not just build the default text
                          
                        ?><div class= "circle red"><span>Delicious Food</span></div>
                        
                        <?php
                     } 
                        
                     ?>
                        <div class="overlay-wrapper circle-redback">
                        <div class="overlay-excerpt">
                        <p>We provide delicious food to schools across Ireland. We can revolutionise the food service in your school!
                        <br><a href="">Click here</a> for more info.</p>
                        </div>
                        </div><!-- /.overlay-wrapper -->
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="overlay-container col-centered">
                    
                    <?php
                     
                     /*------------------------------------------------------------
                      The second circle
                      ------------------------------------------------------------*/
                      
                     $circle_2_heading = get_field('circle_2_heading');
                        
                     // If there's an heading, build it
                     if (!empty($circle_2_heading)) {
                            
                        ?><div class= "circle blue"><span><?php echo $circle_2_heading; ?></span></div>
                    
                     <?php
                     }  else { // If not just build the default text
                          
                        ?><div class= "circle blue"><span>Such</span></div>
                        
                        <?php
                     } 
                        
                     ?>
                         <div class="overlay-wrapper circle-blueback">
                            <div class="overlay-excerpt">
                            <p>We offer a zero-hassle solution for schools - we set up and run the canteen...
                            <br><a href="">Click here</a> for more info.</p>
                            </div>
                         </div><!-- /.overlay-wrapper -->   
                    </div><!-- /.overlay-container -->    
                </div>
                <div class="col-sm-4">
                    <div class="overlay-container col-centered">
                    <?php
                     
                     /*----------------------------------------------------------------
                     The Third circle
                     -----------------------------------------------------------------*/
                     
                     $circle_3_heading = get_field('circle_3_heading');
                        
                     // If there's an heading, build it
                     if (!empty($circle_3_heading)) {
                            
                        ?><div class= "circle green"><span><?php echo $circle_3_heading; ?></span></div>
                    
                     <?php
                     }  else { // If not just build the default text
                          
                        ?><div class= "circle green"><span>Health</span></div>
                        
                        <?php
                     } 
                        
                     ?>
                     <div class="overlay-wrapper circle-greenback">
                            <div class="overlay-excerpt">
                            <p>We're strongly committed to ensuring that children in Irish schools have access to healthy, nutritious meals.
                            <br><a href="">Click here</a> for more info.</p>
                            </div>
                     </div><!-- /.overlay-wrapper --> 
                     
                    </div><!-- /.overlay-container -->
                </div>
        </div>
        <!----- Nav Circles at samller sizes ---
        <div id="circlenav">
            <div id="grid">
                <div class="brick">
                    <div class="circlebrick circlered">
                        <div class="circletext"><?php echo $circle_1_heading; ?></div>
                    </div>
                </div>
            
                <div class="brick">
                    <div class="circlebrick circleblue">
                        <div class="circletext"><?php echo $circle_2_heading; ?></div>
                    </div>
                </div>
            
                <div class="brick">
                    <div class="circlebrick circlegreen">
                        <div class="circletext"><?php echo $circle_3_heading; ?></div>
                    </div>
                </div>
            </div>
        </div>
        
</div><!--/ circle nav -->
<div class="container"><hr></div>

<div id="food" class="top-l-pad bottom-l-pad row">
    <div class="container clearfix">
        <div class="col-md-6">
            <h2><?php the_field('section_one_heading'); ?></h2>
            <div class="emphasis-text"><?php the_field('section_one_text'); ?></div>
        </div>
        <div class="col-md-5 col-md-offset-1">
            <?php carawebs_section_one_image(); ?>
        </div>   
    </div>

</div>

<div id="cost" class="redback top-xl-pad bottom-xl-pad row">
    <div class="container clearfix">
        <div class="col-sm-5 column">
            <?php carawebs_section_two_image(); ?>
                   <!-- <div class= "col-centered circle blueback"><span>Zero Cost<br>Zero Hassle</span></div> -->
            
        </div>  
        <div class="col-md-5 col-md-offset-1">
            <h2><?php the_field('section_two_heading'); ?></h2>
            <div class="emphasis-text"><?php the_field('section_two_text'); ?></div>
        </div> 

    </div>
</div>
<div id="healthy-choice" class="top-xl-pad bottom-l-pad row">
    <div class="container clearfix">
        <div class="col-md-6">
            <h2><?php the_field('section_three_heading'); ?></h2>
            <div class="emphasis-text"><?php the_field('section_three_text'); ?></div>
        </div> 
        <div class="col-md-5 col-md-offset-1">
            <?php carawebs_section_three_image(); ?>
        </div>  
    </div>
</div>
<div class="container"><hr></div>
<div id="testimonials" class="top-l-pad bottom-xl-pad row">
    <div class="container clearfix">
        <div class="col-sm-12 column">
            <?php carawebs_testimonials_slider(); ?>
                   <!-- <div class= "col-centered circle blueback"><span>Zero Cost<br>Zero Hassle</span></div> -->
            
        </div>  
        <!--<div class="col-md-4">
            <h3>Testimonials</h3>
            <p class="emphasis-text">Test</p>
        </div> -->

    </div>
</div>

<!--<?php //carawebs_testimonials_slider(); ?>  -->


<?php endwhile; ?>


</div>