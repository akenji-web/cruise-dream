<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page_about-sp.webp")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page_about-pc.webp")); ?>" alt="">
    </picture>
    <h1 class="mv__text">about us</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- プロフィール -->
  <section class="profile sub-top-main">
    <div class="profile__inner inner">
      <div class="profile__heading heading">
        <h2 class="heading__title">company profile</h2>
        <p class="heading__subtitle">会社概要</p>
      </div>
      <div class="profile__container">
        <picture>
          <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/about_profile-pc.webp")); ?>" media="(min-width: 768px)" />
          <img class="profile__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/about_profile-sp.webp")); ?>" alt="青空の下の会社のビル" loading="lazy" decoding="async">
        </picture>
        <dl class="profile__list">
          <div class="profile__item">
            <dt class="profile__title">運営会社</dt>
            <dd class="profile__content">株式会社CRUISE DREAM</dd>
          </div>
          <div class="profile__item">
            <dt class="profile__title">商号</dt>
            <dd class="profile__content">CRUISE DREAM</dd>
          </div>
          <div class="profile__item">
            <dt class="profile__title">代表者</dt>
            <dd class="profile__content">秋山　けんじ</dd>
          </div>
          <div class="profile__item">
            <dt class="profile__title">所在地</dt>
            <dd class="profile__content">〒000-0000　<br class="u-mobile">東京都港区青山0-00-00</dd>
          </div>
          <div class="profile__item">
            <dt class="profile__title">電話番号</dt>
            <dd class="profile__content">000-0000-0000</dd>
          </div>
          <div class="profile__item">
            <dt class="profile__title">資本金</dt>
            <dd class="profile__content">3000万円</dd>
          </div>
          <div class="profile__item">
            <dt class="profile__title">従業員数</dt>
            <dd class="profile__content">200名</dd>
          </div>
          <div class="profile__item">
            <dt class="profile__title">業務内容</dt>
            <dd class="profile__content">国内・海外クルーズを中心とした旅行業</dd>
          </div>
        </dl>
      </div>
    </div>
  </section>

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