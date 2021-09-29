<?php if( have_posts() ) : ?>
	<?php while( have_posts() ) : the_post(); ?>

		<?php
		/**
		 * post_meta_key.
		 */
		// 原创
		$original = get_field('original');
		// 来源
		$source = get_field('source');
		// 网址
		$source_uri = get_field('url');
		// 子标题
		$subtitle = get_field('subtitle');
		// 授权类型
		$theme_authorization = get_field('theme_authorization');
		// 主题价格
		$theme_price = get_field('theme_price');
		// 演示地址
		$theme_demo = get_field('theme_demo');
		// 下载地址
		$theme_donwload = get_field('theme_donwload');
		// 主题截图
		$theme_prtsc = get_field('theme_prtsc');
		?>

		<article class="blog-post">
			<h2 class="blog-post-title fw-bold"><?php the_title(); ?></h2>
			<!-- .blog-post-title -->

			<p class="blog-post-meta">
				<span class="post-meta-time me-2"><?php the_time('Y-m-d H:i');?></span>
				<?php if( !is_page() ) { echo '<span class="post-meta-cat me-2">'; the_category( ', ' ); echo '</span>'; }?>
				<?php if (function_exists('the_views')) { echo '<span class="post-meta-views me-2">阅读:'; the_views(); echo '</span>'; }?>
				<?php
				// 来源、网址都存在
				if (!empty($source) && !empty($source_uri)) {
						?><span class="post-meta-source">来源: <a href="<?php echo $source_uri; ?>" rel="nofollow external noopener" tatget="_blank"><?php echo $source; ?></a></span><?php
				}
				// 来源存在
				elseif (!empty($source) && empty($source_uri)) {
						?><span class="post-meta-source">来源: <?php echo $source; ?></span><?php
				}
				// 网址存在
				elseif (empty($source) && !empty($source_uri)) {
						?><span class="post-meta-source"><a href="<?php echo $source_uri; ?>" rel="nofollow noopener external" tatget="_blank">查看原文</a></span><?php
				} ?>
			</p>
			<!-- .blog-post-meta -->

			<div class="blog-post-content">
				<?php
				if( $theme_authorization || $theme_price || $theme_demo || $theme_donwload || $theme_prtsc ){?>
				<div class="blog-post-theme">
					<div class="alert alert-light theme-info" role="alert">
						<p class="mb-0 d-flex align-items-center">
							<?php
							if ( $theme_authorization === "0" ){?><span class="theme-info-item me-3 badge bg-primary">开源</span><?php }
							else if ( $theme_authorization === "1" ){?><span class="theme-info-item me-3 badge bg-danger">免费</span><?php }
							else if ( $theme_authorization === "2" ){?><span class="theme-info-item me-3">主题价格：<span class="price fw-bold fs-4 text-danger"><?php echo $theme_price;?></span></span><?php }
							if ( $theme_demo ){?><span class="theme-info-item me-3"><a href="<?php echo $theme_demo;?>" rel="nofollow" target="_blank">演示</a></span><?php }
							if ( $theme_prtsc ){?><span class="theme-info-item me-3"><a href="<?php echo $theme_prtsc;?>" rel="nofollow" target="_blank">截图</a></span><?php }
							if ( $theme_donwload ){?><span class="theme-info-item ms-auto me-3"><a href="<?php echo $theme_donwload;?>" rel="nofollow" target="_blank"><button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-download fa-fw me-1"></i>下载</button></a></span><?php }?>
						</p>
					</div>
					<!-- .theme-info -->

				</div>
				<!-- .blog-post-theme -->
				<?php }?>

				<?php the_content();?>
				<?php
				/**
				 * 原创.
				 */
				if ($original) {
						?>
					<p class="blog-post-original">文章版权归 <?php bloginfo('name'); ?> 所有，未经许可不得转载，责任编辑：<?php echo the_author_meta('display_name'); ?>。</p>
				<?php
				}?>

				<p class="blog-post-share d-flex align-items-center">
					<span class="me-1">分享到：</span>
					<span class="share-weibo fa-fw fab fa-weibo ms-1 text-danger"></span>
					<span class="share-wechat fa-fw fab fa-weixin ms-1 text-success"></span>
					<span class="share-qq fa-fw fab fa-qq ms-1 text-primary"></span>
				</p>
				<!-- .blog-post-share -->

				<?php
				/**
				 * 广告：文章结束
				 */
				if( get_option('csf')['opt_1'] ) {?>
				<div class="blog-post-rec"><?php echo get_option('csf')['opt_1'];?></div>
				<!-- .blog-post-rec -->
				<?php }?>

			</div>
			<!-- .blog-post-content -->

		</article>
	<?php endwhile; ?>
<?php endif; ?>
