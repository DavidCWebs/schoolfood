<footer id="footer" class="content-info" role="contentinfo">
  <div class="container-fluid">
    <div class="row">
        <div class="container">
            <div class="col-md-6">
                <?php dynamic_sidebar('sidebar-footer'); ?>
            </div>
            <div class="col-md-6">
                <?php dynamic_sidebar('sidebar-footer-right'); ?>
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
            </div>
        </div>
    </div>
    
  </div>
</footer>

<?php wp_footer(); ?>
