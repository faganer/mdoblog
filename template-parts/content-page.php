<?php if( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>
		<article class="blog-post">
			<h2 class="blog-post-title fw-bold"><?php the_title(); ?></h2>
			<p class="blog-post-meta"><?php the_time('Y-m-d H:i');?><?php if( !is_page() ) { the_category( ', ' ); }?></p>
			<div class="blog-post-content"><?php the_content();?></div>
		</article>
	<?php endwhile; ?>
<?php endif; ?>
