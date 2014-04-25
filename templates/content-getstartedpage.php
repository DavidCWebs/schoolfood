<?php require_once ( get_template_directory() . '/lib/custom.php'); ?>
<?php while (have_posts()) : the_post(); ?>
 
<div id="gs-section-one" class="container-fluid">
        <div class="container top-l-pad bottom-xl-pad">
            <div class="row">
                <div class="col-md-6">
                    <h4><?php the_field('section_one_heading'); ?></h4>
                    <div class="emphasis-text">
                        <?php the_field('section_one'); ?>
                    </div>
                    <a id="modal-1" href="#modal-container-1" data-toggle="modal" class="btn btn-default btn-primary btn-lg"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp;Get in Touch</a>
                    <!--Modal -->
							<div class="modal fade" id="modal-container-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
											<h3 class="modal-title" id="myModalLabel">
												Get in Touch
											</h3>
										</div>
										<div class="modal-body">
											<div class="emphasis-text">
												<p>Why not give us a call? We'd be happy to carry out a free survey in your school. This is static text text.</p>
													<ul>
														<li>Phone us on 087 900 5196</li>
														<li>Email Us</li>
														<li>Like us on Facebook</li>
														<li>Follow us on Twitter</li>
													</ul>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal -->                    
                    
                    
                    <div class="mobile-phone">
                    <a href="href="tel:0871115196" class="btn btn-default btn-primary">
                    <span class="glyphicon glyphicon-phone-alt"></span> Click to Call</a>
                    </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                    <?php carawebs_getstarted_image1(); ?>
                </div>
            </div>
        </div>
<!--Section Two ----------------------------------------------------
-->
<div id="gs-section-two" class="redback top-xl-pad bottom-xl-pad row">
    <div class="container clearfix">
        <div class="col-md-6">
            <?php carawebs_getstarted_image2(); ?>
        </div>
        <div class="col-md-5 col-md-offset-1">
            <h2></a><?php the_field('section_two_heading'); ?></h2>
            <div class="emphasis-text">
                <?php the_field('section_two_text'); ?>
            </div>
        </div>   
    </div>

</div>
<!--Section Three ----------------------------------------------------
-->
<div id="gs-section-three" class="top-xl-pad bottom-xl-pad row">
    <div class="container clearfix">
        <div class="col-sm-6 column">
            <h2></a><?php the_field('section_three_heading'); ?></h2>
            <div class="emphasis-text">
                <?php the_field('section_three_text'); ?>
            </div>
        </div>  
        <div class="col-md-6">
            <?php carawebs_getstarted_slider(); ?>
        </div> 
    </div>
</div>
<!--Section Four ----------------------------------------------------
-->
<div id="gs-section-four" class="blueback top-xl-pad bottom-xl-pad row">
    <div class="container clearfix">
        <div class="col-md-6">
            <?php carawebs_getstarted_image4(); ?>
            <?php carawebs_custom_image('section_three_image', 'img-circle', 'large'); ?>
        </div>
        <div class="col-md-5 col-md-offset-1">
            <h2></a><?php the_field('section_four_heading'); ?></h2>
            <div class="emphasis-text">
                <?php the_field('section_four_text'); ?>
            </div>
        </div>   
    </div>
</div>
<!--Circle Navigation 
================================================================================-->    
<div class="top-l-pad bottom-l-pad row">
        <div id="hovercircles" class="container clearfix">
                <div class="col-sm-4"><!-- was col-md-4 column -->
                  <div class="overlay-container col-centered">
                     <?php
                     // The first circle
                     $circle_1_heading = get_field('circle_1_heading');
                        
                     // If there's an heading, build it
                     if (!empty($circle_1_heading)) {
                            
                        ?><div class= "circle red"><span><?php echo $circle_1_heading; ?></span></div>
                    
                     <?php
                     }  else { // If not just build the default text
                          
                        ?><div class= "circle red"><span>Wow</span></div>
                        
                        <?php
                     } 
                        
                     ?>
                        <div class="overlay-wrapper circle-redback">
                        <div class="overlay-excerpt">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Vestibulum consequat, orci ac laoreet cursus, dolor sem luctus lorem, 
                        eget consequat magna felis a magna. Even more information - difficult in a circular block.
                        <br><a href="">Click here</a> for more info.</p>
                        </div>
                        </div><!-- /.overlay-wrapper -->
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="overlay-container col-centered">
                    
                    <?php
                     // The first circle
                     $circle_2_heading = get_field('circle_2_heading');
                        
                     // If there's a heading, build it
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
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Vestibulum consequat, orci ac laoreet cursus, dolor sem luctus lorem, 
                            eget consequat magna felis a magna. Even more information - difficult in a circular block.
                            <br><a href="">Click here</a> for more info.</p>
                            </div>
                         </div><!-- /.overlay-wrapper -->   
                    </div><!-- /.overlay-container -->    
                </div>
                <div class="col-sm-4">
                    <div class="overlay-container col-centered">
                    <?php
                     // The first circle
                     $circle_3_heading = get_field('circle_3_heading');
                        
                     // If there's an heading, build it
                     if (!empty($circle_3_heading)) {
                            
                        ?><div class= "circle green"><span><?php echo $circle_3_heading; ?></span></div>
                    
                     <?php
                     }  else { // If not just build the default text
                          
                        ?><div class= "circle green"><span>Roundness</span></div>
                        
                        <?php
                     } 
                        
                     ?>
                     <div class="overlay-wrapper circle-greenback">
                            <div class="overlay-excerpt">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Vestibulum consequat, orci ac laoreet cursus, dolor sem luctus lorem, 
                            eget consequat magna felis a magna. Even more information - difficult in a circular block.
                            <br><a href="">Click here</a> for more info.</p>
                            </div>
                     </div><!-- /.overlay-wrapper --> 
                     
                    </div><!-- /.overlay-container -->
                </div>
        </div>
        <!----- Nav Circles at samller sizes ----->
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

<?php endwhile; ?>

</div>