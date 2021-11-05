<?php get_header();?>

    <main class="container">
      <div class="banner p-4 p-md-5 mb-4 text-white rounded <?php if(!get_option('csf')['opt_2_3']){ echo 'bg-dark';}?>" style="<?php if(get_option('csf')['opt_2_3']){?>background-color: <?php echo get_option('csf')['opt_2_3'];?>;<?php }?><?php if(get_option('csf')['opt_2_4']){?>background-image:url('<?php echo get_option('csf')['opt_2_4'];?>') ;<?php }?>">
        <div class="col-md-6 px-0">
          <h1 class="display-4 fst-italic fw-bold"><?php echo get_option('csf')['opt_2_1'];?></h1>
          <p class="lead my-3"><?php echo get_option('csf')['opt_2_2'];?></p>
          <p class="lead mb-0"><a href="<?php echo get_option('csf')['opt_2_5'];?>" rel="nofollow" class="text-white fw-bold"><?php _e('Continue reading…','mdoblog');?></a></p>
        </div>
      </div>
      <!-- .banner -->

      <div class="row mb-2">
        <?php
        // 推荐
        $otdf = explode(',', get_option('csf')['opt-home-1']);
        foreach ($otdf as $post_id) {
          $post = get_post($post_id); ?>

          <div class="col-md-6 otdf-item">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
              <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary otdf-item-cat"><?php the_category( ', ' );?></strong>
                <h3 class="h4 mb-0"><?php echo $post->post_title; ?></h3>
                <div class="mb-1 text-muted"><?php the_time('m-d');?></div>
                <p class="card-text mb-auto">
                  <?php
                  // 子标题
                  $subtitle = get_field('subtitle');
                  if (!empty($subtitle)) {
                      echo $subtitle;
                  }
                  // 截取简介
                  else {
                      // $content = get_the_content();
                      $content = $post->post_content;
                      $content = wp_strip_all_tags(str_replace(array('[', ']'), array('<', '>'), $content));
                      echo mb_strimwidth(strip_tags($content), 0, 60, '...');
                  } ?>
                </p>
                <a href="<?php echo get_permalink($post->ID); ?>" class="stretched-link"><?php _e('Continue reading…','mdoblog');?></a>
              </div>
              <div class="col-auto d-none d-lg-block">
                <?php
                // 特色图像
                $full_image_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');?>
                <img src="<?php echo $full_image_url[0]; ?>?x-oss-process=image/auto-orient,1/resize,m_fill,w_200,h_250/quality,Q_100">
              </div>
            </div>
          </div>
          <!-- .col-md-6 -->

        <?php }?>
      </div>
      <!-- .row -->

      <div class="row g-lg-5">
        <div class="col-md-8" role="main">
          <h3 class="pb-4 mb-4 fst-italic border-bottom fw-bold"><?php _e('Latest content','mdoblog');?></h3>

          <?php
          // The loop
          get_template_part( 'template-parts/content','loop' ); ?>

        </div>
        <!-- .col-md-8 -->

        <?php get_sidebar();?>

      </div>
      <!-- .row -->

    </main>
    <!-- .container -->

<?php get_footer();?>
