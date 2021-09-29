<div class="blog-post-list text-break">

	<!-- The loop start. -->

	<?php if( have_posts() ) : ?>
    <div class="row list-card">
			<?php while( have_posts() ) : the_post(); ?>
        <div class="col-sm-6 list-card-item">
          <div class="card bg-secondary mb-4">
            <?php
            // 特色图像
            $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');?>
            <img src="<?php echo $full_image_url[0]; ?>" class="card-img" alt="<?php the_title(); ?>">
            <div class="card-img-overlay d-flex justify-content-center align-items-center">
              <a href="<?php the_permalink(); ?>" rel="bookmark" class="stretched-link"><button type="button" class="btn btn-secondary"><?php the_title(); ?></button></a>
            </div>
          </div>
        </div>
			<?php endwhile; ?>
		</div>
		<!-- .list-card  -->

	<?php else : ?>
		<ul class="list-card" role="listbox">
			<li class="list-card-item" role="listitem">
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
