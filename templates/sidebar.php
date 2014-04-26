<?php  
if ( is_home() ) :    
  dynamic_sidebar('sidebar-secondary'); 
else:
  ?><div class="bottom-pad"><?php get_search_form(); ?></div><?php
  carawebs_featured_image('thumbnail'); 
  dynamic_sidebar('sidebar-primary');
endif;  
?>