<?php
/**
 * Custom functions
 */

function carawebs_main_image() {

        $image = get_field('main_image');
 
        if( !empty($image) ): 

            // vars
            $url = $image['url'];
            $title = $image['title'];
            $alt = $image['alt'];
            $caption = $image['caption'];

            // thumbnail
            $size = 'full';
            //$thumb = $image['sizes'][ $size ];
            $width = $image['sizes'][ $size . '-width' ];
            $height = $image['sizes'][ $size . '-height' ];
            
            ?>
            <div class="row">
            <div class="image-wrapper">
              <img class="img-responsive" src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
              <div class="container">
                <div class="image-caption">
                  <h1><?php the_field('main_slogan'); ?></php></h1>
                  <!--
                    <?php if( $caption ): ?>
                    <p class="wp-caption-text"><?php echo $caption; ?></p>
                  <?php endif; ?>->
                  <!--<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>-->
                </div>
              </div>
            </div>
            </div>
        

        <?php endif;
}


/*==============================================================================*/

/* About Page Images */

function carawebs_about_section_one_image(){

    $image = get_field('section_one_image');
 
    if( !empty($image) ){
 
	// vars
	$url = $image['url'];
	$title = $image['title'];
	$alt = $image['alt'];
	$caption = $image['caption'];
 
	// thumbnail
	$size = 'thumbnail';
	$thumb = $image['sizes'][ $size ];
	$width = $image['sizes'][ $size . '-width' ];
	$height = $image['sizes'][ $size . '-height' ];
    
            
            ?>
            <img class="img-responsive" src="<?php echo $thumb; ?>" 
            alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" title="<?php echo $title; ?>" />
            
            <?php
    }
    else {
    return;
    }
}

/*------------------------------------------------------------------------------

/* Add post images

------------------------------------------------------------------------------*/

function carawebs_acf_repeater_images() {

if(get_field('post_images')):


	while(has_sub_field('post_images')): 
	
		$attachment_id = get_sub_field('image');
		$size = "full"; // (thumbnail, medium, large, full or custom size)
		$image = wp_get_attachment_image_src( $attachment_id, $size );

		// url = $image[0];
		// width = $image[1];
		// height = $image[2];
               
        ?><img class="post_images" src ="<?php echo $image[0]; ?>"title=""><?php
		
	endwhile;
 
	 
	endif; 
}


add_action('hook_after_post_images', 'carawebs_post_images');


/*===========================================================================

Testimonials Loop for content-frontpage.php

============================================================================*/

function carawebs_text_testimonials_loop(){
    // WP_Query arguments
    $args = array (
        'post_type'              => 'schools',
        'posts_per_page'         => '4',
        'meta_query'             => array(
            array(
                'key'       => 'testimonial_to_frontpage',
                'value'     => '1',
                'compare'   => '=',
                //'key'       => 'testimonial',
                //'value'     => 'true',
                //'compare'   => '=',
            ),
        ),
    );

    // The Query
    $text_testimonials_query = new WP_Query( $args );

    // The Loop
    if ( $text_testimonials_query->have_posts() ) {
        while ( $text_testimonials_query->have_posts() ) {
            $text_testimonials_query->the_post();
            
            // do something
            $testimonial = get_field('main_testimonial');
            if(!empty($testimonial) ){
            ?>
            <div class="col-xs-12 col-md-3">
                <blockquote><i class="i-2x icon-quote-left"></i>&nbsp;&nbsp;
                <?php echo $testimonial;?> 
                <span class="person">- <?php the_field('testimonial_person');?>, <?php the_field('person_title'); ?>, <?php
                 the_title(); ?>
                <a href="#">More info</a></span></blockquote>
            </div>    
            <?php
            } else {
            return;
            }
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();
}
/*----------------------------------------
|
| Carawebs Mini Schools Loop
|
|-----------------------------------------*/

function carawebs_mini_schools_loop(){
    // WP_Query arguments
    $args = array (
        'post_type'              => 'schools',
        'posts_per_page'         => '3',
        'meta_query'             => array(
            array(
                'key'       => 'testimonial',
                'value'     => 'true',
                'compare'   => '=',
            ),
        ),
    );

    // The Query
    $mini_schools_query = new WP_Query( $args );

    // The Loop
    if ( $mini_schools_query->have_posts() ) {
        while ( $mini_schools_query->have_posts() ) {
            $mini_schools_query->the_post();
            
            // do something
            
            ?>
            <div class="brick">
               <div class="sq-overlay-container">
                <a href="<?php the_permalink(); ?>"><?php carawebs_home_featured_image('thumbnail'); ?></a>
                <div class="sq-overlay-wrapper"><!--allows a darkened background for legibility -->
                    <header>
                        <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    </header>
                        <div class="sq-overlay-excerpt"><!-- allows overlay to be styled & positioned -->
                        <p><?php carawebs_custom_excerpt(); ?></p>
                    </div>
                </div>
                </div>   
            </div>
            
            <?php
        }
    } else {
        // no posts found
    }

    // Restore original Post Data
    wp_reset_postdata();
}

/*------------------------------------------------------------------------------

Testimonials Slider

------------------------------------------------------------------------------*/

function carawebs_testimonials_slider() {
 	
 $number = 0; 
 $testimonials = get_field('testimonials');
 
 if(!empty($testimonials) ){  
    ?>
    <div class="row">
        <!-- data-ride="carousel" causes auto play class="slide" causes slide-->    
        <div id="myCarousel" class="carousel fade" data-ride="carousel">
          <!--<ol class="carousel-indicators">
            <?php foreach( $testimonials as $testimonial ){ 
            ?><li data-target="#myCarousel" data-slide-to="<?php echo $number++; ?>"></li><?php
            } ?>
          </ol>-->
            <!-- Carousel items -->
              <div class="carousel-inner">
                <?php while( has_sub_field('testimonials') ){
                
                $attachment_id = get_sub_field('image');
		        $size = "medium"; // (thumbnail, medium, large, full or custom size)
		        $image = wp_get_attachment_image_src( $attachment_id, $size );

		        // url = $image[0];
		        // width = $image[1];
		        // height = $image[2];
               
                ?>
                <div class="item">
                  <img src="<?php echo $image[0]; ?>" />
                  <div class="carousel-caption">
                    <h4><?php the_sub_field('person'); ?></h4>
                    <p class="lead"><i class="icon-quote-left"></i>&nbsp;
                    <?php the_sub_field('testimonial_text'); ?>&nbsp;<i class="icon-quote-right"></i></p>
                  </div>
                </div>
                <?php } ?>
              </div>
          <!-- Carousel nav -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div><!-- /.row -->
    <?php } else {
    return;
    }

}


/* Small Slider, Get Started Page */

function carawebs_getstarted_slider() {
 	
 $number = 0; 
 $testimonials = get_field('testimonials');
 
 if(!empty($testimonials) ){  
    ?>
    <div class="row">
        <div id="get-started-carousel" class="carousel fade" data-ride="carousel"><!-- data-ride="carousel" causes auto play -->
          <ol class="carousel-indicators">
            <?php foreach( $testimonials as $testimonial ){ 
            ?><li data-target="#get-started-carousel" data-slide-to="<?php echo $number++; ?>"></li><?php
            } ?>
          </ol>

          <!-- Carousel items -->
          <div class="carousel-inner">
            <?php while( has_sub_field('testimonials') ){ ?>
            <div class="item">
              <img src="<?php the_sub_field('image'); ?>" />
              <div class="carousel-caption">
                <h4><?php the_sub_field('person'); ?></h4>
                <p><?php the_sub_field('testimonial_text'); ?></p>
              </div>
            </div>
            <?php } ?>
          </div>

          <!-- Carousel nav -->
          <a class="left carousel-control" href="#get-started-carousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#get-started-carousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
        </div>
    </div><!-- /.row -->
    <?php } else {
    return;
    }

}
/*======================================

/* Section One Image, Get Started page 

========================================*/

function carawebs_getstarted_image1() {
 
    $image = get_field('section_one_image');
    
    $size = 'thumbnail';
	$thumb = $image['sizes'][ $size ];

    if( !empty($image) ){ ?>

        <img class="img-responsive img-circle" src="<?php echo $thumb;/*$image['url'];*/ ?>" alt="<?php echo $image['alt']; ?>" />

    <?php }
}
/*======================================

/* Section Two Image, Get Started page 

========================================*/
function carawebs_getstarted_image2() {
 
    $image = get_field('section_two_image');
    
    $size = 'thumbnail';
	$thumb = $image['sizes'][ $size ];

    if( !empty($image) ){ ?>

        <img class="img-responsive img-circle" src="<?php echo $thumb;/*$image['url'];*/ ?>" alt="<?php echo $image['alt']; ?>" />

    <?php }
}
/*======================================

/* Section Three Image, Get Started page 

========================================*/
function carawebs_getstarted_image3() {
 
    $image = get_field('section_three_image');
    
    $size = 'thumbnail';
	$thumb = $image['sizes'][ $size ];

    if( !empty($image) ){ ?>

        <img class="img-responsive img-circle" src="<?php echo $thumb;/*$image['url'];*/ ?>" alt="<?php echo $image['alt']; ?>" />

    <?php }
}
/*======================================

/* Section Two Image, Get Started page 

========================================*/
function carawebs_getstarted_image4() {
 
    $image = get_field('section_four_image');
    
    $size = 'thumbnail';
	$thumb = $image['sizes'][ $size ];

    if( !empty($image) ){ ?>

        <img class="img-responsive img-circle" src="<?php echo $thumb;/*$image['url'];*/ ?>" alt="<?php echo $image['alt']; ?>" />

    <?php }
}

/*========================================

/* Featured Image on Posts

=========================================*/
/**
* Featured Image function for posts and pages
* 
* @param  string $class The CSS class name to apply to the image default is .img-responsive
* @param  string $size  The image size to use. Default is full size
* @return string        img -> width | height | src | class | alt | title
* 
*/
function carawebs_featured_image( $size = 'full', $firstclass ) {
 
     $class = $firstclass . ' img-responsive'; // Ensure that all images are responsive
 
    global $post;
 
    if ( has_post_thumbnail( $post->ID ) ) {
 
    /* get the title attribute of the post or page 
     * and apply it to the alt tag of the image if the alt tag is empty
     */
    $attachment_id = get_post_thumbnail_id( $post->ID );
 
    if ( get_post_meta($attachment_id, '_wp_attachment_image_alt', true) === '' ) {
        // if no alt attribute is filled out then echo "Featured Image of article: Article Name"
        $alt = the_title_attribute( 
            array( 
                'before' => __( 'Featured image of article: ', 'YOUR-THEME-TEXTDOMAIN' ), 
                'echo' => false
            ) 
        );
    } else {
        // the post thumbnail img alt tag
        $alt = trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
        // the post thumbnail img title tag
    }
    
    // Get the title attribute for the featured image
    $title = get_the_title($attachment_id);
    
    // Get the Image Caption
    $caption = get_post($attachment_id)->post_excerpt;
 
    $default_attr = array(
        'class' => $class,
        'alt' => $alt,
        'title' => $title
    );
 
    // echo the featured image
    //the_post_thumbnail( $size, $default_attr );
    
    the_post_thumbnail( $size, $default_attr );
    echo $caption;
 
    }
}

/*========================================

/* Featured Image on Blog Archive Page

=========================================*/
/**
* Featured Image function for posts and pages
* 
* @param  string $class The CSS class name to apply to the image default is .img-responsive
* @param  string $size  The image size to use. Default is full size
* @return string        img -> width | height | src | class | alt | title
* 
*/
function carawebs_home_featured_image( $size = 'full', $firstclass ) {
 
     $class = $firstclass . ' img-responsive'; // Ensure that all images are responsive
 
    global $post;
 
    if ( has_post_thumbnail( $post->ID ) ) {
 
    /* get the title attribute of the post or page 
     * and apply it to the alt tag of the image if the alt tag is empty
     */
    $attachment_id = get_post_thumbnail_id( $post->ID );
 
    if ( get_post_meta($attachment_id, '_wp_attachment_image_alt', true) === '' ) {
        // if no alt attribute is filled out then echo "Featured Image of article: Article Name"
        $alt = the_title_attribute( 
            array( 
                'before' => __( 'Featured image of article: ', 'YOUR-THEME-TEXTDOMAIN' ), 
                'echo' => false
            ) 
        );
    } else {
        // the post thumbnail img alt tag
        $alt = trim( strip_tags( get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ) );
        // the post thumbnail img title tag
    }
    
    // Get the title attribute for the featured image
    $title = get_the_title($attachment_id);
    
    // Get the Image Caption
    $caption = get_post($attachment_id)->post_excerpt;
 
    $default_attr = array(
        'class' => $class,
        'alt' => $alt,
        'title' => $title
    );
 
    // echo the featured image
    //the_post_thumbnail( $size, $default_attr );
    
    the_post_thumbnail( $size, $default_attr );
    //echo $caption;
 
    }
}

/*========================================

/* Force medium image crop 

=========================================*/

function add_force_crop() {
   
   //add_image_size( 'medium', 250, 225, true ); //Golden ratio y = x * 0..61805
   
   if(false === get_option("medium_crop")) {
			add_option("medium_crop", "1");
		} else {
			update_option("medium_crop", "1");
    }
    
}
add_action('after_setup_theme','add_force_crop');
	
//add_action ('add_attachment','add_force_crop');

/*========================================

/* Carawebs Custom Image for ACF image embed

=========================================*/

function carawebs_custom_image( $field, $class, $size = 'thumbnail' ) {

$image = get_field($field);
    
    $thumb = $image['sizes'][ $size ];

    if( !empty($image) ){ ?>

        <img class="img-responsive <?php echo $class; ?>" src="<?php echo $thumb;/*$image['url'];*/ ?>" alt="<?php echo $image['alt']; ?>" title="<?php echo $image['title']; ?>" />

    <?php }

}

/*==========================================

/* Query Mods

===========================================*/

/*add_filter( 'pre_get_posts', 'modify_schools_query' );

function modify_schools_query( $wp_query ) {
    if( $wp_query->query_vars['post_type'] != 'schools' ) return;
    $wp_query->query_vars['posts_per_page'] = 1;
}*/

function limit_posts_per_archive_page() {
	if ( is_archive('schools') )
		$limit = 12;
	elseif ( is_search() )
		$limit = 10;
	else
		$limit = get_option('posts_per_page');

	set_query_var('posts_per_archive_page', $limit);
}
add_filter('pre_get_posts', 'limit_posts_per_archive_page');

/*==============================================================

Menu adjustment for CPTs - stops "Blog" page being highlighed by means of active class

===============================================================*/

add_filter( 'nav_menu_css_class', 'carawebs_menu_classes', 10, 2 );

function carawebs_menu_classes( $classes , $item ){
	
	if ( is_singular( 'schools') || is_archive( 'schools' )	) 
	
	{
		
		// remove unwanted active class if it's found
		$classes = str_replace( 'active', '', $classes );
		
		// find the url you want and add the class you want
		if ( is_archive( 'schools' ) || get_post_type() == 'schools' ) {
			$classes = str_replace( 'menu-our-schools', 'menu-our-schools active', $classes );
			//remove_filter( 'nav_menu_css_class', 'namespace_menu_classes', 10, 2 );
		}
	}
	return $classes;
}

/*=================================================================

ACF in theme directory

=================================================================*/

//include_once('advanced-custom-fields/acf.php');
//include_once('acf-repeater/acf.php');


/*=================================================================

Carawebs Trim All Excerpts

==================================================================*/

function carawebs_trim_all_excerpt($text ) {
// Creates an excerpt if needed; and shortens the manual excerpt as well
global $post;
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
  }
 
$text = strip_tags($text);
$excerpt_length = apply_filters('excerpt_length', 30);
$excerpt_more = apply_filters('excerpt_more', '');
$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);

}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'carawebs_trim_all_excerpt');


function carawebs_custom_excerpt() {

    $str = get_the_excerpt();
	
	$trimmed = rtrim ( $str, ".,:;!?" );
 	
	// Echo to the page and add a Read More link
	?><div class="post_content post_excerpt">
		
		<p><?php echo $trimmed; ?>&hellip;<a class="readmore" href="<?php echo get_permalink();?>">&nbsp;Read More&nbsp;&raquo;</a></p>
	
	</div>
	<?php

}

/*=========================================================================

Add an Intro Block for Schools CPT
   
=========================================================================*/

function carawebs_school_intro() {
    
    // Variables
            $date = get_field('date_started');
            $size = get_field('size_of_school');
            $contact = get_field('contact_person');
            $testimonial = get_field('main_testimonial');
            
    // If $date, $ size or $contact have content, build an introblock
        
    // If all are empty, do nothing. If not, do something!
    if (empty ($date) && empty ($size) && empty ($contact)) {
                
        return;
                
    } else {
            
    ?>
    <div class="blueback introblock"> 
    <?php
        // If the date is empty, do nothing
        if(empty ($date)){
            
            } else { // If it's not empty, build the date
            
            ?><p>Date School Food Started:&nbsp;<?php echo $date;
            ?></p><?php
            
            } 

        if(empty ($size)){
            
            } else {
            
            ?><p>Size of School:&nbsp;<?php echo $size;
            ?></p><?php
            
            }

        if(empty ($contact)){
            
            } else {
            
            ?><p>Contact Person:&nbsp;<?php echo $contact;
            ?></p><?php
            
            }
        ?>
    </div><!-- /.introblock -->
            
    <?php
            
    }
}


/*=========================================================================

Testimonial for School CPT

==========================================================================*/

function carawebs_school_testimonial () {

    // If there is a testimonial, build it!
    $testimonial = get_field('main_testimonial');
    if(!empty($testimonial) ){
         
        ?>
        <h3>What Our Clients Say</h3>
        <blockquote><i class="icon-quote-left"></i>&nbsp;&nbsp;
        <?php echo $testimonial; ?>
        <span class="person">- <?php the_field('testimonial_person');?>, <?php the_field('person_title'); ?>
        </span>
        </blockquote>
        <?php
            
        } else {
            
            return;
            
        }
}