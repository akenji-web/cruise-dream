<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
  <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page-contact-fv-sp.jpg")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page-contact-fv.jpg")); ?>" alt="お問い合わせのメイン画像">
    </picture>
    <h1 class="mv__text">contact</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- お問い合わせフォーム -->
  <?php echo do_shortcode('[contact-form-7 id="b8c4d07" title="お問い合わせフォーム"]'); ?>

</main>
<?php get_footer(); ?>