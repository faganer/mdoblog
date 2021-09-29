<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mdoblog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="force-rendering" content="webkit|ie-comp|ie-stand">
    <meta name="applicable-device" content="pc,mobile">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <?php wp_head();?>
  </head>
  <body <?php body_class('text-break');?>>

    <div class="container">
      <header class="blog-header py-3" role="banner">
        <div class="d-flex flex-nowrap justify-content-between align-items-center">
          <div class="site-opt d-none d-md-block">
            <?php
            // 已登录
            if (is_user_logged_in()) {

              // 登录用户
              $current_user = wp_get_current_user();
              // ID
              $user_ID = $current_user->ID;
              // 显示名称
              $display_name = $current_user->display_name;
              // 邮箱
              $email = $current_user->user_email; ?>
              <a href="<?php echo esc_url(home_url('/')); ?>wp-admin" rel="nofollow" title="<?php _e('Hi!','mdoblog');?><?php echo $display_name; ?>，<?php _e('Enter the dashboard','mdoblog');?>"><?php echo $display_name; ?></a>，
              <a class="site-opt-item link-secondary site-opt-login ms-1" href="<?php if (!is_home()) { echo wp_logout_url(get_permalink()); } else { echo wp_logout_url(home_url());} ?>" title="<?php _e('Sign out','mdoblog');?>"><?php _e('Sign out','mdoblog');?></a>
            <?php }?>

            <?php
            // 未登录
            if (!is_user_logged_in()) {?>
            <a class="site-opt-item link-secondary site-opt-login" href="<?php if (!is_home()) {
                echo wp_login_url(get_permalink());
            } else {
                echo wp_login_url(home_url());
            } ?>" title="<?php _e('Sign in','mdoblog');?>"><?php _e('Sign in','mdoblog');?></a>
            <?php }?>
          </div>
          <!-- .site-opt -->

          <div class="col-auto site-title">
            <?php
            if( is_home() ) {?>
              <h1 class="fw-normal m-0"><a class="blog-header-logo d-block link-dark text-decoration-none" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('name');?>" style="<?php if(get_option('csf')['opt_4']){?>background-image:url('<?php echo get_option('csf')['opt_4'];?>') ;<?php }?>"><?php bloginfo('name');?></a></h1>
            <?php } else {?>
              <a class="blog-header-logo d-block text-dark" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" title="<?php bloginfo('name');?>" style="<?php if(get_option('csf')['opt_4']){?>background-image:url('<?php echo get_option('csf')['opt_4'];?>') ;<?php }?>"><?php bloginfo('name');?></a>
            <?php }?>
          </div>
          <!-- .col -->

          <div class="col-auto site-opt">
            <div class="d-none d-md-block">
              <a type="button" href="javascript:;" class="site-opt-item link-secondary site-opt-search ms-1" aria-label="Search" title="<?php _e('Search','mdoblog');?>"  data-bs-toggle="modal" data-bs-target="#searchModal"><?php _e('Search','mdoblog');?></a>
            </div>
            <!-- .d-none.d-md-block -->

            <div class="site-opt-bars d-md-none">
              <button type="button" class="site-opt-item btn btn-sm btn-outline-secondary site-opt-search ms-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="fas fa-bars fa-fw"></span>
              </button>
            </div>
          </div>
          <!-- .col-auto -->

        </div>
        <!-- .row -->

      </header>
      <!-- .blog-header -->

      <div class="offcanvas offcanvas-start site-offcanvas" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasExampleLabel"><?php bloginfo('name');?></h5>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <!-- .offcanvas-header -->

        <div class="offcanvas-body">
          <div class="site-offcanvas-avatar d-flex align-items-center">
            <?php
            /**
             * 未登录.
             */
            if (!is_user_logged_in()) { ?>
              <div class="face-container ps-2">
                <a class="face rounded-circle overflow-hidden d-inline-block" href="<?php if (!is_home()) {
                    echo wp_login_url(get_permalink());
                } else {
                    echo wp_login_url(home_url());
                } ?>"><span class="fas fa-user-circle fa-fw"></span></a>
              </div>
              <!-- .face-container -->

              <a class="ms-2" href="<?php if (!is_home()) {
                  echo wp_login_url(get_permalink());
              } else {
                  echo wp_login_url(home_url());
              } ?>"><span><?php _e('Sign in','mdoblog');?></span>
              </a>
              <!-- .ms-2 -->

            <?php } else {

              // 登录用户
              $current_user = wp_get_current_user();
              // ID
              $user_ID = $current_user->ID;
              // 显示名称
              $display_name = $current_user->display_name;
              // 邮箱
              $email = $current_user->user_email; ?>

              <div class="face-container ps-2">
                <a class="face rounded-circle overflow-hidden d-inline-block" href="<?php echo esc_url(home_url('/')); ?>wp-admin" rel="nofollow"><?php echo get_avatar($email, 46, null, $display_name); ?></a>
              </div>
              <!-- .face-container -->

              <span class="ms-2"><a class="link-primary text-decoration-none" href="<?php echo esc_url(home_url('/')); ?>wp-admin" rel="nofollow"><?php echo $display_name; ?></a></span>
              <!-- .ms-2 -->

              <a class="link-primary ms-2" href="<?php if (!is_home()) { echo wp_logout_url(get_permalink()); } else { echo wp_logout_url(home_url()); } ?>"><?php esc_html_e('Sign out', 'mdoblog'); ?></a>
              <!-- .ms-2 -->

            <?php }?>
          </div>
          <hr>
          <!-- .site-offcanvas-avatar -->

          <?php
          wp_nav_menu(array(
            'theme_location' => 'menu-1',
            'menu_class'     => 'nav flex-column site-offcanvas-nav',
          ));
          ?>
          <hr>
          <form role="search" method="get" class="offcanvas-search-form" action="<?php echo esc_url(home_url('/')); ?>">
              <div class="row">
                <div class="col">
                  <input type="search" required name="s" id="s" class="form-control">
                </div>
                <div class="col-auto"><button type="submit" class="btn btn-outline-secondary"><?php _e('Search','mdoblog');?></button></div>
              </div>
          </form>
          <!-- .offcanvas-search-form -->

        </div>
        <!-- .offcanvas-body -->

      </div>
      <!-- .offcanvas -->

      <nav class="nav-hidden visually-hidden" role="navigation">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'menu-1',
        ));
        ?>
      </nav>
      <!-- navigation -->

      <div class="site-nav nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
        </nav>
        <!-- navigation -->
      </div>
      <!-- .nav-scroller -->

    </div>
