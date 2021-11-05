<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mdoblog
 */

?>

<div class="blog-post-list text-break">

	<!-- The loop start. -->

	<?php if( have_posts() ) : ?>
		<ul class="list-group list-group-flush" role="listbox">
			<?php while( have_posts() ) : the_post(); ?>
				<li <?php post_class('list-group-item'); ?> role="listitem">
					<?php
					/**
					 * 搜索高亮
					 * https://www.22vd.com/41930.html
					 */
					$s = trim(get_search_query()) ? trim(get_search_query()) : 0;
					$title = get_the_title();
					$content = get_the_content();
					$content = wp_strip_all_tags(str_replace(array('[', ']'), array('<', '>'), $content));
					$content = mb_strimwidth(strip_tags($content), 0, 240, '...');
					if($s){$keys = explode(" ",$s);
						$title = preg_replace('/('.implode('|', $keys) .')/iu','<span class="text-danger">\0</span>',$title);
						$content = preg_replace('/('.implode('|', $keys) .')/iu','<span class="text-danger">\0</span>',$content);
					}
					?>
					<div class="m-0 py-2">
						<p class="font-weight-bold"><a href="<?php the_permalink(); ?>" rel="bookmark" class="link-dark text-decoration-none"><?php echo $title;?></a></p>
						<p class="text-muted"><small><?php echo $content;?></small></p>
					</div>
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
