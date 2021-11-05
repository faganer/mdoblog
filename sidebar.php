<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mdoblog
 */
?>

<div class="col-md-4" role="complementary">
	<div class="position-sticky" style="top: 2rem;">
		<div class="p-4 mb-3 bg-light rounded">
			<h4 class="fst-italic fw-bold"><?php _e('About','mdoblog');?></h4>
			<p class="mb-1"><?php echo get_option('csf')['opt_3_1'];?></p>
			<p class="mb-0"><a href="<?php echo get_option('csf')['opt-data-1'];?>" class="link-secondary" rel="nofollow"><?php _e('Understand more…','mdoblog');?></a></p>
		</div>

		<div class="widget-area">
			<?php
			/**
			 * register_sidebar
			 * https://developer.wordpress.org/reference/functions/register_sidebar/
			 */
			// 普通侧边栏
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				dynamic_sidebar('sidebar-1');
			}
			// 分类边栏
			if( is_active_sidebar( 'sidebar-3' ) && is_category() ) {
				dynamic_sidebar('sidebar-3');
			}
			// 文章边栏
			if( is_active_sidebar( 'sidebar-4' ) && is_single() ) {
				dynamic_sidebar('sidebar-4');
			}
			// 链接
			if( is_active_sidebar( 'sidebar-2' ) && is_home() && !is_paged() ) {
				dynamic_sidebar('sidebar-2');
			}?>
		</div>
		<!-- .widget-area -->

	</div>
	<!-- .position-sticky -->

</div>
<!-- .col-md-4 -->
