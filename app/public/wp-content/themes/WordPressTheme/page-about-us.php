<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page-aboutus-fv-sp.jpg")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page-aboutus-fv.jpg")); ?>" alt="私たちについてのメイン画像">
    </picture>
    <h1 class="mv__text">about us</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- Dive into the Ocean -->
  <div class="sub-about-us sub-top-main">
    <div class="sub-about-us__inner inner back-icon">
      <div class="sub-about-us__container">
        <div class="sub-about-us__left-image u-desktop">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/about1.jpg")); ?>" alt="シーサーの画像">
        </div>
        <div class="sub-about-us__right-image">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/about2.jpg")); ?>" alt="二匹の黄色の魚の画像">
        </div>
        <p class="sub-about-us__phrase">Dive into<br>the Ocean</p>
        <p class="sub-about-us__text text text--reverse">
          ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
          ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
        </p>
      </div>
    </div>
  </div>

  <!-- ギャラリー -->
  <section class="gallery sub-about-us-gallery">
    <div class="gallery__inner inner">
      <div class="gallery__heading heading">
        <h2 class="heading__title">gallery</h2>
        <p class="heading__subtitle">フォト</p>
      </div>
      <div class="gallery__container">
        <?php
          $group = SCF::get('about-images');
          if (!empty($group)) :
        ?>
          <ul class="gallery__items">
            <?php
              foreach ($group as $fields ) :
            ?>
            <li class="gallery__item js-modal-open">
              <img src="<?php echo esc_url(wp_get_attachment_url($fields['custom-about-image'])); ?>" alt="<?php echo get_post_meta( $fields['custom-about-image'], '_wp_attachment_image_alt', true ); ?>" loading="lazy" decoding="async" >
            </li>
            <?php endforeach; ?>
          </ul>
          <!-- モーダルウィンドウ -->
          <?php
            $count = 1;
            foreach ($group as $fields ) :
          ?>
          <div class="modal js-modal">
            <?php if ($count == 1 || $count % 6 == 0 || $count % 6 == 1) :?>
            <div class="modal__body modal__body--vertical">
              <img src="<?php echo esc_url(wp_get_attachment_url($fields['custom-about-image'])); ?>" alt="<?php echo get_post_meta( $fields['custom-about-image'], '_wp_attachment_image_alt', true ); ?>">
            </div>
            <?php else :?>
              <div class="modal__body">
              <img src="<?php echo esc_url(wp_get_attachment_url($fields['custom-about-image'])); ?>" alt="<?php echo get_post_meta( $fields['custom-about-image'], '_wp_attachment_image_alt', true ); ?>">
            </div>
            <?php endif ?>
          </div>
          <?php $count++; ?>
          <?php endforeach; ?>
        <?php endif ?>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>