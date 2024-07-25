<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>

<body>
	<header class="header js-header">
		<div class="header__inner">
      <h1 class="header__logo">
        <a href="<?php echo esc_url(home_url("/")) ?>"><img src="<?php echo esc_url(get_theme_file_uri("/assets/images/logo_wh.webp")); ?>" alt="CodeUps"></a>
      </h1>
      <nav class="header__nav u-desktop">
        <ul class="header__items">
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="header__link">
              <p class="header__title">Campaign</p>
              <p class="header__subtitle">キャンペーン</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/about")) ?>" class="header__link">
              <p class="header__title">About us</p>
              <p class="header__subtitle">私たちについて</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/information")) ?>" class="header__link">
              <p class="header__title">Information</p>
              <p class="header__subtitle">ダイビング情報</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/blog")) ?>" class="header__link">
              <p class="header__title">Blog</p>
              <p class="header__subtitle">ブログ</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/voice")) ?>" class="header__link">
              <p class="header__title">Voice</p>
              <p class="header__subtitle">お客様の声</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/price")) ?>" class="header__link">
              <p class="header__title">Price</p>
              <p class="header__subtitle">料金一覧</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/faq")) ?>" class="header__link">
              <p class="header__title">FAQ</p>
              <p class="header__subtitle">よくある質問</p>
            </a>
          </li>
          <li class="header__item">
            <a href="<?php echo esc_url(home_url("/contact")) ?>" class="header__link">
              <p class="header__title">Contact</p>
              <p class="header__subtitle">お問い合わせ</p>
            </a>
          </li>
        </ul>
      </nav>

      <div class="header__hamburger hamburger js-hamburger u-mobile">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <div class="header__drawer js-drawer">
        <div class="nav">
          <ul class="nav__items">
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="nav__link nav__link--bold">キャンペーン</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/campaign-category/license/")) ?>" class="nav__link">ライセンス講習</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/campaign-category/trial-diving/")) ?>" class="nav__link">体験ダイビング</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/campaign-category/fun-diving/")) ?>" class="nav__link">ファンダイビング</a>
            </li>
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/about")) ?>" class="nav__link nav__link--bold">私たちについて</a>
            </li>
          </ul>
          <ul class="nav__items">
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/information")) ?>" class="nav__link nav__link--bold">ダイビング情報</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/information?tab=1")) ?>" class="nav__link">ライセンス講習</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/information?tab=3")) ?>" class="nav__link">体験ダイビング</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/information?tab=2")) ?>" class="nav__link">ファンダイビング</a>
            </li>
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/blog")) ?>" class="nav__link nav__link--bold">ブログ</a>
            </li>
          </ul>
          <ul class="nav__items">
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/voice")) ?>" class="nav__link nav__link--bold">お客様の声</a>
            </li>
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/price")) ?>" class="nav__link nav__link--bold">料金一覧</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/price#license")) ?>" class="nav__link">ライセンス講習</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/price#trial-diving")) ?>" class="nav__link">体験ダイビング</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/price#fun-diving")) ?>" class="nav__link">ファンダイビング</a>
            </li>
          </ul>
          <ul class="nav__items">
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/faq")) ?>" class="nav__link nav__link--bold">よくある質問</a>
            </li>
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/privacypolicy")) ?>" class="nav__link nav__link--bold">プライバシー<br class="u-mobile">ポリシー</a>
            </li>
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/termsofservice")) ?>" class="nav__link nav__link--bold">利用規約</a>
            </li>
            <li class="nav__item nav__item--bold">
              <a href="<?php echo esc_url(home_url("/contact")) ?>" class="nav__link nav__link--bold">お問い合わせ</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
	</header>