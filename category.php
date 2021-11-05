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

					<div class="loop-head pb-2 mb-4 border-bottom">
						<h3 class="fst-italic fw-bold"><?php single_cat_title();?></h3>
						<?php
						the_archive_description( '<div class="text-muted"><small>', '</small></div>' );
						?>
					</div>
					<!-- .loop-head -->

          <?php
          // 分类目录封面展示
					if( get_option('csf')['opt_7'] ) {
						if( is_category( explode(",",get_option('csf')['opt_7']) ) ){
							get_template_part( 'template-parts/content','card' );
						} else {
							// The loop
							get_template_part( 'template-parts/content','loop' );
						}
					} else {
						// The loop
						get_template_part( 'template-parts/content','loop' );
					}?>

        </div>
        <!-- .col-md-8 -->

        <?php get_sidebar();?>

      </div>
      <!-- .row -->

    </main>
    <!-- .container -->

<?php get_footer();?>
