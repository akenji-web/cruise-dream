<?php get_header(); ?>
<main>
  <?php
  if (is_page('privacypolicy')) {
      $title = 'Privacy Policy';
  } elseif (is_page('terms-of-service')) {
      $title = 'Terms of Service';
  } else {
      $title = 'Non title';
  }
  ?>
  <!-- メインビュー -->
  <div class="mv">
  <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page_other-sp.webp")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page_other-pc.webp")); ?>" alt="">
    </picture>
    <h1 class="mv__text"><?php echo $title; ?></h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- その他のページコンテンツ -->
  <div class="page-other sub-top-main">
    <div class="page-other__inner ">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post(); ?>
        <div class="page-other__container">
          <h2 class="page-other__title"><?php the_title(); ?></h2>
          <div class="page-other__contents">
          <?php the_content(); ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>