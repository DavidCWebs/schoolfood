<?php
/**
 * Custom functions
 */

/* Add post images */

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

/* Front Page Images */

function carawebs_section_one_image(){

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
            <img class="img-responsive img-circle" src="<?php echo $thumb; ?>" 
            alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" title="<?php echo $title; ?>" />
            
            <?php
    }
    else {
    return;
    }
}


/* Front Page Images */

function carawebs_section_two_image(){

    $image = get_field('section_two_image');
 
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
            <img class="img-responsive img-circle" src="<?php echo $thumb; ?>" 
            alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" title="<?php echo $title; ?>" />
            
            <?php
    }
    else {
    return;
    }
}


/* Front Page Images */

function carawebs_section_three_image(){

    $image = get_field('section_three_image');
 
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
            <img class="img-responsive img-circle circle-shadow" src="<?php echo $thumb; ?>" 
            alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" title="<?php echo $title; ?>" />
            
            <?php
    }
    else {
    return;
    }
}


/* Testimonials Slider */


function carawebs_testimonials_slider() {
 	
 $number = 0; 
 $testimonials = get_field('testimonials');
 
 if(!empty($testimonials) ){  
    ?>
    <div class="row">
        <div id="myCarousel" class="carousel slide" data-ride="carousel"><!-- data-ride="carousel" causes auto play -->
          <ol class="carousel-indicators">
            <?php foreach( $testimonials as $testimonial ){ 
            ?><li data-target="#myCarousel" data-slide-to="<?php echo $number++; ?>"></li><?php
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
          <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
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
function carawebs_featured_image( $size = 'full', $class = 'img-responsive img-circle' ) {
 
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
 
    $default_attr = array(
        'class' => $class,
        'alt' => $alt,
        'title' => $title
    );
 
    // echo the featured image
    //the_post_thumbnail( $size, $default_attr );
    
    the_post_thumbnail( $size, $default_attr );
 
    }
}


/*========================================

/* Force medium image crop 

=========================================*/

function add_force_crop() {
   
   add_image_size( 'medium', 250, 225, true ); //Golden ratio y = x * 0..61805
   
   /*
   
    if(false === get_option("medium_crop")) {
			add_option("medium_crop", "1");
		} else {
			update_option("medium_crop", "1");
    }
    */
}
add_action('after_setup_theme','add_force_crop');
	
//add_action ('add_attachment','add_force_crop');