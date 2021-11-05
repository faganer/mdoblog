<div class="blog-post-list text-break">

	<!-- The loop start. -->

	<?php if( have_posts() ) : ?>
		<ul class="list-group list-group-flush" role="listbox">
			<?php while( have_posts() ) : the_post(); ?>
				<li <?php post_class('list-group-item'); ?> role="listitem">
					<p class="d-flex m-0 py-2 flex-wrap justify-content-lg-between align-items-center">
						<a href="<?php the_permalink(); ?>" rel="bookmark" class="link-dark text-decoration-none">
              <?php if( in_category('themes') ) {
                esc_html_e('WordPress theme:', 'mdoblog');
              }
              the_title();?>
            </a>
						<span class="text-muted fs-6 d-none d-md-inline-block"><?php the_time('Y-m-d');?></span>
					</p>
				</li>
			<?php endwhile; ?>
		</ul>
		<!-- .list-group  -->

	<?php else : ?>
		<ul class="list-group list-group-flush" role="listbox">
			<li class="list-group-item" role="listitem">
				<p><?php esc_html_e('Sorry, no posts matched your criteria.', 'mdoblog'); ?></p>
			</li>
		</ul>

	<?php endif; ?>

	<!-- The loop end. -->

</div>
<!-- .blog-post-list -->

<?php
// Display navigation to next/previous pages when applicable.
if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-below" class="blog-pagination pt-4 d-flex" aria-label="Pagination">
		<div class="blog-pagination-item"><?php next_posts_link( __( '<span class="">&larr;</span> Older posts', 'mdoblog' ) ); ?></div>
		<div class="blog-pagination-item ms-2"><?php previous_posts_link( __( 'Newer posts <span class="">&rarr;</span>', 'mdoblog' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>
