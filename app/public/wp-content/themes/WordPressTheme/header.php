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
        <a href="<?php echo esc_url(home_url("/")) ?>"><img src="<?php echo esc_url(get_theme_file_uri("/assets/images/cruise_dream_logo_wh.webp")); ?>" alt="cruise dream"></a>
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
            <a href="<?php echo esc_url(home_url("/news")) ?>" class="header__link">
              <p class="header__title">News</p>
              <p class="header__subtitle">ニュース</p>
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
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="nav__link">キャンペーン</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/about")) ?>" class="nav__link">私たちについて</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/news")) ?>" class="nav__link">ニュース</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/blog")) ?>" class="nav__link">ブログ</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/voice")) ?>" class="nav__link">お客様の声</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/privacypolicy")) ?>" class="nav__link">プライバシーポリシー</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/termsofservice")) ?>" class="nav__link">利用規約</a>
            </li>
            <li class="nav__item">
              <a href="<?php echo esc_url(home_url("/contact")) ?>" class="nav__link">お問い合わせ</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
	</header>