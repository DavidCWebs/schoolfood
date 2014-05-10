<?php require_once ( get_template_directory() . '/lib/custom.php'); ?>
<?php while (have_posts()) : the_post(); ?>
        
<!--Main Image
================================================================================-->
        <?php  
        carawebs_main_image();        
        ?>
        
<!--Circle Navigation
================================================================================-->    
    <div id="hovercircles" class="container clearfix top-l-pad bottom-l-pad">
                <div class="">
                    <div class="col-sm-4"><!-- was col-md-4 column -->
                          <div class="overlay-container col-centered">
                             <?php

                              /*----------------------------------------------------
                              The first circle
                              ---------------------------------------------------*/

                             $circle_1_heading = get_field('circle_1_heading');
                             $hover_1 = get_field('circle_1_hover_text');

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
                                    
                                    <?php 
                                    if (!empty($hover_1)){
                                    ?><p><?php echo $hover_1; ?></p>
                                    <?php
                                    
                                    } else {
                                    
                                    ?>
                                <p>We provide delicious food to schools across Ireland. 
                                We can revolutionise the food service in your school!
                                <br><a href="">Click here</a> for more info.</p>
                                <?php
                                 
                                 }
                                 
                                 ?>
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
                         $hover_2 = get_field('circle_2_hover_text');

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
                                
                                <?php 
                                    if (!empty($hover_2)){
                                    ?><p><?php echo $hover_2; ?></p>
                                    <?php
                                    
                                    } else {
                                    
                                    ?>
                                <p>We offer a zero-hassle solution for schools - we set up and run the canteen...
                                <br><a href="">Click here</a> for more info.</p>
                                <?php
                                
                                }
                                 
                                 ?>
                                
                                
                                
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
                         $hover_3 = get_field('circle_3_hover_text');

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
                                
                                <?php 
                                    if (!empty($hover_3)){
                                    ?><p><?php echo $hover_3; ?></p>
                                    <?php
                                    
                                    } else {
                                    
                                    ?>
                                    
                                <p>We're strongly committed to ensuring that children in 
                                Irish schools have access to healthy, nutritious meals.
                                <br><a href="">Click here</a> for more info.</p>
                                <?php
                                
                                    }
                                    
                                    ?>
                            
                                </div>
                         </div><!-- /.overlay-wrapper --> 

                        </div><!-- /.overlay-container -->
                    </div>
                </div><!-- /.row -->
        </div><!-- /#hovercircles .container -->
        
        
        
        <!----- Nav Circles at smaller sizes --
        -------------------------------------------
        
        
        -->
        
        
        <div id="navdiv" class="top-l-pad">
            <div id="grid">
                <div class="brick">
                    <a href="#nav-food" class="btn redback custom-button">Delicious Food</a>
                </div>
                <div class="brick">
                    <a href="#nav-cost" class="btn blueback custom-button">Zero Hassle</a>
                </div>
                <div class="brick">
                    <a href="#nav-healthy-choice" class="btn greenback custom-button">Healthy Options</a>
                </div>
            </div>           
        </div>
        
<div class="container"><hr></div>
<!------------ SECTION ONE --------------->
<section>
   <div id="nav-food" class="top-l-pad bottom-l-pad row">
    <div class="container clearfix">
        <div class="col-md-6">
            <h2><?php the_field('section_one_heading'); ?></h2>
            <div class="emphasis-text"><?php the_field('section_one_text'); ?></div>
        </div>
        <div class="col-md-5 col-md-offset-1">
            <?php carawebs_custom_image ('section_one_image', 'img-circle'); ?>
        </div>   
    </div>

</div> 
</section>
<!------------ SECTION TWO ----------------------->
<section>
    <div id="nav-cost" class="redback top-xl-pad bottom-xl-pad row">
    <div class="clearfix">
        <div class="container">
            <div class="col-sm-5 column">
                <?php carawebs_custom_image ('section_two_image', 'img-circle'); ?>
            </div>  
            <div class="col-md-5 col-md-offset-1">
                <h2><?php the_field('section_two_heading'); ?></h2>
                <div class="emphasis-text"><?php the_field('section_two_text'); ?></div>
            </div> 
        </div>
    </div>
</div>
</section>

<!------------- SECTION THREE ---------------------->
<div id="nav-healthy-choice" class="top-xl-pad bottom-xl-pad row">
    <div class="container clearfix">
        <div class="row">
            <div class="col-md-6">
            <h2><?php the_field('section_three_heading'); ?></h2>
            <div class="emphasis-text"><?php the_field('section_three_text'); ?></div></div> 
            <div class="col-md-5 col-md-offset-1">
            <?php carawebs_custom_image ('section_three_image','','large'); ?>
            </div>
        </div>
    </div>
</div>
<!--------------- TESTIMONIALS ------------------------->
<div id="nav-testimonials" class="blueback top-xl-pad bottom-xl-pad row">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h2><?php the_field ('testimonials_heading'); ?></h2>
                <div class="emphasis-text"><?php the_field('testimonials_intro_text'); ?></div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <?php carawebs_text_testimonials_loop(); ?>
            </div>
        </div>
    </div>
</div>
<!---------------- END TESTIMONIALS ------------------->
<!---------------- SCHOOLS ---------------------------->
<div id="nav-schools" class="top-l-pad bottom-xl-pad row">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 column top-l-pad">
                <h2>Our Schools</h2>
                <div class="emphasis-text bottom-l-pad">
                    <p>We work closely with all our schools Donec 
                    id elit non mi porta gravida at eget metus. 
                    Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa </p>
                </div>
                <div id="grid">
                    <?php carawebs_mini_schools_loop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!---------------- END SCHOOLS ------------------------>
<?php endwhile; ?>
</div>