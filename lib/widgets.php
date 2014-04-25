<?php
/**
 * Register sidebars and widgets
 */
function roots_widgets_init() {
  // Sidebars
  register_sidebar(array(
    'name'          => __('Primary', 'roots'),
    'id'            => 'sidebar-primary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
  
  // Sidebars
  register_sidebar(array(
    'name'          => __('Blog Page', 'roots'),
    'id'            => 'sidebar-secondary',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
  
// Register Left Footer Widget Area
  register_sidebar(array(
    'name'          => __('Footer Left', 'roots'),
    'id'            => 'sidebar-footer',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));
  
// Register Right Footer Widget Area 
  register_sidebar(array(
    'name'          => __('Footer Right', 'roots'),
    'id'            => 'sidebar-footer-right',
    'before_widget' => '<section class="widget %1$s %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ));


  // Widgets
  register_widget('Roots_Vcard_Widget');
}
add_action('widgets_init', 'roots_widgets_init');

/**
 * Example vCard widget
 */
class Roots_Vcard_Widget extends WP_Widget {
  private $fields = array(
    'title'          => 'Title (optional)',
    'street_address' => 'Street Address',
    'locality'       => 'City/Locality',
    'region'         => 'State/Region',
    'postal_code'    => 'Zipcode/Postal Code',
    'tel'            => 'Telephone',
    'email'          => 'Email'
  );

  function __construct() {
    $widget_ops = array('classname' => 'widget_roots_vcard', 'description' => __('Use this widget to add a vCard', 'roots'));

    $this->WP_Widget('widget_roots_vcard', __('Roots: vCard', 'roots'), $widget_ops);
    $this->alt_option_name = 'widget_roots_vcard';

    add_action('save_post', array(&$this, 'flush_widget_cache'));
    add_action('deleted_post', array(&$this, 'flush_widget_cache'));
    add_action('switch_theme', array(&$this, 'flush_widget_cache'));
  }

  function widget($args, $instance) {
    $cache = wp_cache_get('widget_roots_vcard', 'widget');

    if (!is_array($cache)) {
      $cache = array();
    }

    if (!isset($args['widget_id'])) {
      $args['widget_id'] = null;
    }

    if (isset($cache[$args['widget_id']])) {
      echo $cache[$args['widget_id']];
      return;
    }

    ob_start();
    extract($args, EXTR_SKIP);

    $title = apply_filters('widget_title', empty($instance['title']) ? __('vCard', 'roots') : $instance['title'], $instance, $this->id_base);

    foreach($this->fields as $name => $label) {
      if (!isset($instance[$name])) { $instance[$name] = ''; }
    }

    echo $before_widget;

    if ($title) {
      echo $before_title, $title, $after_title;
    }
  ?>
    <p class="vcard">
      <a class="fn org url" href="<?php echo home_url('/'); ?>"><?php bloginfo('name'); ?></a><br>
      <span class="adr">
        <span class="street-address"><?php echo $instance['street_address']; ?></span><br>
        <span class="locality"><?php echo $instance['locality']; ?></span>,
        <span class="region"><?php echo $instance['region']; ?></span>
        <span class="postal-code"><?php echo $instance['postal_code']; ?></span><br>
      </span>
      <span class="tel"><span class="value"><?php echo $instance['tel']; ?></span></span><br>
      <a class="email" href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a>
    </p>
  <?php
    echo $after_widget;

    $cache[$args['widget_id']] = ob_get_flush();
    wp_cache_set('widget_roots_vcard', $cache, 'widget');
  }

  function update($new_instance, $old_instance) {
    $instance = array_map('strip_tags', $new_instance);

    $this->flush_widget_cache();

    $alloptions = wp_cache_get('alloptions', 'options');

    if (isset($alloptions['widget_roots_vcard'])) {
      delete_option('widget_roots_vcard');
    }

    return $instance;
  }

  function flush_widget_cache() {
    wp_cache_delete('widget_roots_vcard', 'widget');
  }

  function form($instance) {
    foreach($this->fields as $name => $label) {
      ${$name} = isset($instance[$name]) ? esc_attr($instance[$name]) : '';
    ?>
    <p>
      <label for="<?php echo esc_attr($this->get_field_id($name)); ?>"><?php _e("{$label}:", 'roots'); ?></label>
      <input class="widefat" id="<?php echo esc_attr($this->get_field_id($name)); ?>" name="<?php echo esc_attr($this->get_field_name($name)); ?>" type="text" value="<?php echo ${$name}; ?>">
    </p>
    <?php
    }
  }
}

/*==============================================================
    
    Carawebs Social Widget Class
    
 ==============================================================*/
class carawebs_social_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function carawebs_social_widget() {
        parent::WP_Widget(false, $name = 'Carawebs Social Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $twitter 	= $instance['twitter'];
        $facebook   = $instance['facebook'];
        $email      = $instance['email'];
        ?>
              <?php echo $before_widget; ?>
                  <?php if ($title) {
                          echo $before_title, $title, $after_title;
                        } ?>
                                                            
							<ul class="i-ul">
								<?php if (!empty($twitter)): ?>
								<li><a href="<?php echo $twitter; ?>"><i class="icon-twitter i-li"></i>&nbsp;Follow us on Twitter</a></li>
								<?php endif;
								if (!empty($facebook)): ?>
								<li><a href="<?php echo $facebook; ?>"><i class="icon-facebook i-li"></i>&nbsp;Like us on Facebook</a></li>
								<?php endif;
								if (!empty($email)): ?>
								<li><a href="<?php echo $email; ?>"><i class="icon-mail-1 i-li"></i>&nbsp;Send us an email</a></li>
								<?php endif; ?>
							</ul>
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['twitter'] = strip_tags($new_instance['twitter']);
        $instance['facebook'] = strip_tags($new_instance['facebook']);
        $instance['email'] = strip_tags($new_instance['email']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $twitter	= esc_attr($instance['twitter']);
        $facebook	= esc_attr($instance['facebook']);
        $email	= esc_attr($instance['email']);
        ?>
         <p>Enter your contact details here. If you leave a field blank, it will not display on the page.</p>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Paste the URL of your Twitter'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Enter Facebook URL'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Enter your email address'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>
        <?php 
    }
 
 
} // end class example_widget
add_action('widgets_init', create_function('', 'return register_widget("carawebs_social_widget");'));

/*==============================================================
    
    Carawebs Phone Class
    
 ==============================================================*/
class carawebs_phone_widget extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function carawebs_phone_widget() {
        parent::WP_Widget(false, $name = 'Carawebs Phone Widget');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $introtext 	= $instance['introtext'];
        $telnumber   = $instance['telnumber'];
        
        ?>
              <?php echo $before_widget; ?>
                  <?php if ($title) {
                          echo $before_title, $title, $after_title;
                        } ?>
                    <p><?php echo $introtext; ?><br>   
                    <div class="desktop-phone"><i class="glyphicon glyphicon-phone-alt"></i>&nbsp;&nbsp;<?php echo $telnumber; ?></div>
                    <div class="mobile-phone">
                      <a href="tel:<?php echo $telnumber; ?>" class="btn btn-default btn-primary">
                        <span class="glyphicon glyphicon-phone-alt"></span> Click to Call</a>
                    </div>
                    </p>                                                         
							
              <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['introtext'] = strip_tags($new_instance['introtext']);
        $instance['telnumber'] = strip_tags($new_instance['telnumber']);
        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
 
        $title 		= esc_attr($instance['title']);
        $introtext	= esc_attr($instance['introtext']);
        $telnumber	= esc_attr($instance['telnumber']);
        ?>
         <p>Enter your Phone contact details here. If you leave a field blank, it will not display on the page.</p>
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('introtext'); ?>"><?php _e('Paste the text you\'d like to accompany the phone number'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('introtext'); ?>" name="<?php echo $this->get_field_name('introtext'); ?>" type="text" value="<?php echo $introtext; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('telnumber'); ?>"><?php _e('Enter the phone number'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('telnumber'); ?>" name="<?php echo $this->get_field_name('telnumber'); ?>" type="text" value="<?php echo $telnumber; ?>" />
        </p>
        <?php 
    }
 
 
} // end class example_widget
add_action('widgets_init', create_function('', 'return register_widget("carawebs_phone_widget");'));
