<?php get_header();?>

    <main class="container">
      <div class="row g-lg-5">
        <div class="col-md-8" role="main">
					<?php
					/**
					 * How to implement Yoast SEO breadcrumbs
					 * https://yoast.com/help/implement-wordpress-seo-breadcrumbs/
					 */
					if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p id="breadcrumbs" class="mt-2 text-muted">','</p>' );
					}
					?>

					<?php
          // Content single
          get_template_part( 'template-parts/content','single' ); ?>

					<?php
					/**
					 * 上一篇、下一篇.
					 */
					if (get_previous_post() || get_previous_post()) {
							echo '<ul class="post-prevNext mb-4 list-group list-group-flush">';
							if (get_previous_post()) {
									echo '<li class="post-prev list-group-item px-0">';
									previous_post_link('<span>上一篇:</span>%link', '%title', true);
									echo '</li>';
							}
							if (get_next_post()) {
									echo '<li class="post-next list-group-item px-0">';
									next_post_link('<span>下一篇:</span>%link', '%title', true);
									echo '</li>';
							}
							echo '</ul>';
					} ?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if (comments_open() || get_comments_number()) :
						comments_template();
					endif; ?>

        </div>
        <!-- .col-md-8 -->

        <?php get_sidebar();?>

      </div>
      <!-- .row -->

    </main>
    <!-- .container -->

<?php get_footer();?>
