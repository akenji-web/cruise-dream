<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
    <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page-other-fv-sp.jpg")); ?>" media="(max-width: 767px)">
    <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page-other-fv.jpg")); ?>" alt="その他のページのメイン画像">
    </picture>
    <h1 class="mv__text">Site MAP</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- サイトマップコンテンツ -->
  <div class="site-map sub-top-main">
    <div class="site-map__inner inner back-icon">
      <div class="site-map__container nav nav--wide">
        <ul class="nav__items">
          <li class="nav__item nav__item--bold">
            <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="nav__link nav__link--bk nav__link--bold">キャンペーン</a>
          </li>
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/campaign-category/license/")) ?>" class="nav__link nav__link--bk">ライセンス講習</a>
          </li>
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/campaign-category/trial-diving/")) ?>" class="nav__link nav__link--bk">体験ダイビング</a>
          </li>
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/campaign-category/fun-diving/")) ?>" class="nav__link nav__link--bk">ファンダイビング</a>
          </li>
          <li class="nav__item nav__item--bold">
            <a href="<?php echo esc_url(home_url("/about")) ?>" class="nav__link nav__link--bk nav__link--bold">私たちについて</a>
          </li>
        </ul>
        <ul class="nav__items">
          <li class="nav__item nav__item--bold">
            <a href="<?php echo esc_url(home_url("/information")) ?>" class="nav__link nav__link--bk nav__link--bold">ダイビング情報</a>
          </li>
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/information?tab=1")) ?>" class="nav__link nav__link--bk">ライセンス講習</a>
          </li>
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/information?tab=3")) ?>" class="nav__link nav__link--bk">体験ダイビング</a>
          </li>
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/information?tab=2")) ?>" class="nav__link nav__link--bk">ファンダイビング</a>
          </li>
          <li class="nav__item nav__item--bold">
            <a href="<?php echo esc_url(home_url("/blog")) ?>" class="nav__link nav__link--bk nav__link--bold">ブログ</a>
          </li>
        </ul>
        <ul class="nav__items">
          <li class="nav__item nav__item--bold">
            <a href="<?php echo esc_url(home_url("/voice")) ?>" class="nav__link nav__link--bk nav__link--bold">お客様の声</a>
          </li>
          <li class="nav__item nav__item--bold">
            <a href="<?php echo esc_url(home_url("/price")) ?>" class="nav__link nav__link--bk nav__link--bold">料金一覧</a>
          </li>
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/price#license")) ?>" class="nav__link nav__link--bk">ライセンス講習</a>
          </li>
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/price#trial-diving")) ?>" class="nav__link nav__link--bk">体験ダイビング</a>
          </li>
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/price#fun-diving")) ?>" class="nav__link nav__link--bk">ファンダイビング</a>
          </li>
        </ul>
        <ul class="nav__items">
          <li class="nav__item">
            <a href="<?php echo esc_url(home_url("/faq")) ?>" class="nav__link nav__link--bk nav__link--bold">よくある質問</a>
          </li>
          <li class="nav__item nav__item--others">
            <a href="<?php echo esc_url(home_url("/privacypolicy")) ?>" class="nav__link nav__link--bk nav__link--bold">プライバシー<br class="u-mobile">ポリシー</a>
          </li>
          <li class="nav__item nav__item--others">
            <a href="<?php echo esc_url(home_url("/terms-of-service")) ?>" class="nav__link nav__link--bk nav__link--bold">利用規約</a>
          </li>
          <li class="nav__item nav__item--others">
            <a href="<?php echo esc_url(home_url("/contact")) ?>" class="nav__link nav__link--bk nav__link--bold">お問い合わせ</a>
          </li>
          <li class="nav__item nav__item--others">
            <a href="<?php echo esc_url(home_url("/sitemap")) ?>" class="nav__link nav__link--bk nav__link--bold">サイトマップ</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>