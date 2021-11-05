<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mdoblog
 */

?>

		<footer class="blog-footer" role="contentinfo">
      <div class="site-info px-2">
        <p>&copy <?php echo date('Y');?> <?php bloginfo('name');?><span class="d-none d-md-inline-block">, Powered by <a href="https://wordpress.org" target="_blank" rel="nofollow">WordPress</a></span><?php if( get_option('csf')['opt_5'] ){?>, <a href="https://beian.miit.gov.cn/" rel="nofollow" target="_blank"><?php echo get_option('csf')['opt_5'];?></a><?php }?>.</p>
        <p><a href="#"><?php _e('Back to top','mdoblog');?></a></p>
      </div>
      <!-- .site-info-->

    </footer>
    <!-- .blog-footer -->

    <?php wp_footer();?>

    <!-- Modal -->
    <div class="modal fade modal-search" id="searchModal" tabindex="-1" aria-labelledby="searchModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form role="search" method="get" class="modal-search-form" action="<?php echo esc_url(home_url('/')); ?>">
            <div class="modal-header">
              <h5 class="modal-title" id="searchModalLabel"><?php _e('Search','mdoblog');?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- .modal-header -->

            <div class="modal-body">

              <p class="mt-3"><input type="search" required name="s" id="s" class="form-control" placeholder="<?php _e('Search','mdoblog');?>"></p>

            </div>
            <!-- .modal-body -->

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php _e('Close','mdoblog');?></button>
              <button type="submit" class="btn btn-primary"><?php _e('Search','mdoblog');?></button>
            </div>
            <!-- .modal-footer -->

          </form>
          <!-- .modal-search-form -->

        </div>
        <!-- .modal-content -->

      </div>
      <!-- .modal-dialog -->

    </div>
    <!-- .modal -->

  </body>
</html>
