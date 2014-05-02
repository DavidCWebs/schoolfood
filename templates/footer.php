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
                <p>Website by <a href="http://carawebs.com">Carawebs</a></p>
                <a href="#" class="go-top" title="Go to the top of the page"><i class="glyphicon glyphicon-arrow-up"></i></a>
            </div>
        </div>
    </div>
    
  </div>
</footer>

<?php wp_footer(); ?>
