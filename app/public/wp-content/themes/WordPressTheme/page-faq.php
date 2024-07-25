<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
  <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page-faq-fv-sp.jpg")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page-faq-fv.jpg")); ?>" alt="よくある質問のメイン画像">
    </picture>
    <h1 class="mv__text mv__text--uppercase">faq</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- よくある質問コンテンツ -->
  <div class="faq sub-top-main">
    <div class="faq__inner back-icon">
      <div class="faq__container">
        <?php
          $group = SCF::get('faq-accordion');
          if (!empty($group)) :
        ?>
        <ul class="faq__list faq-list">
        <?php foreach ($group as $fields ) : ?>
          <li class="faq-list__item accordion">
            <p class="accordion__title js-accordion-title"><?php echo $fields['custom-faq-title'] ?></p>
            <p class="accordion__content"><?php echo $fields['custom-faq-content'] ?></p>
          </li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>