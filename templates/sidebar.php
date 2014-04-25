<?php  
if ( is_home() ) :    
  dynamic_sidebar('sidebar-secondary'); 
else:
  carawebs_featured_image('thumbnail', 'img-circle'); 
  dynamic_sidebar('sidebar-primary');
endif;  
?>