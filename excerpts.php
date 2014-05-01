<?php  /* Carawebs Trim All Excerpts */

function wp_trim_all_excerpt($text) {
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
$excerpt_length = apply_filters('excerpt_length', 18);
$excerpt_more = apply_filters('excerpt_more', '');
$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );

return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
 
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_all_excerpt');



function carawebs_custom_excerpt() {
	
	$str = get_the_excerpt();
	
	$trimmed = rtrim ( $str, ".,:;!?" );
 	
	// Echo to the page and add a Read More link
	?><div class="post_content post_excerpt">
		
		<p><?php echo $trimmed; ?>&hellip;<a class="readmore" href="<?php echo get_permalink();?>">Read More</a></p>
	
	</div>
	<?php
 
}