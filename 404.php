<?php get_header();?>

    <main class="container">
      <div class="row g-lg-5">
        <div class="col-md-8" role="main">
          <?php
          // Content page
          get_template_part( 'template-parts/content','404' ); ?>

        </div>
        <!-- .col-md-8 -->

        <?php get_sidebar();?>

      </div>
      <!-- .row -->

    </main>
    <!-- .container -->

<?php get_footer();?>
