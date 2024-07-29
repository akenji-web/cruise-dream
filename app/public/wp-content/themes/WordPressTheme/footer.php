<?php if (!is_page('contact') && !is_page('thanks') && !is_404()) :?>
<?php
  if (is_front_page()) {
    $layout_top_contact_sub = '';
    $contact_sub_width = '';
  } else {
    $layout_top_contact_sub = 'top-contact--sub';
    $contact_sub_width = 'contact__container--sub';
  }
?>
<section id="contact" class="contact top-contact <?php echo $layout_top_contact_sub; ?>">
  <div class="contact__inner inner">
    <a href="<?php echo esc_url(home_url("/contact")) ?>" class="contact__container <?php echo $contact_sub_width; ?>">
      <div class="contact__heading heading">
        <h2 class="heading__title heading__title--large heading__title--reverse">contact</h2>
        <p class="heading__subtitle heading__subtitle--tight heading__subtitle--reverse">お問い合わせ</p>
      </div>
      <p class="contact__text">ご予約・お問い合わせはコチラ</p>
      <div class="contact__button">
        <div class="button">Contact us<span class="button__arrow"></span></div>
      </div>
    </a>
  </div>
</section>
<?php endif ?>

<?php
  if (is_404()) {
    $layout_top_footer = '';
  } else {
    $layout_top_footer = 'top-footer';
  }
?>
<footer class="footer <?php echo $layout_top_footer; ?>">
  <a href="<?php echo esc_url( home_url( '/' )); ?>" class="contact__return-top return-top js-return-top">
    <div class="return-top__arrow"></div>
  </a>
  <div class="footer__inner inner">
    <div class="footer__heading">
      <img class="footer__logo" src="<?php echo esc_url(get_theme_file_uri("/assets/images/logo_white.webp")); ?>" alt="会社のロゴ">
      <div class="footer__sns-icon">
        <a href="https://www.facebook.com/" class="footer__facebook" target="_blank">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/facebooklogo.png")); ?>" alt="facebookのロゴ">
        </a>
        <a href="https://www.instagram.com/" class="footer__instagram" target="_blank">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/instagramlogo.png")); ?>" alt="instagramのロゴ">
        </a>
      </div>
    </div>
    <div class="footer__container footer-nav">
      <ul class="footer-nav__items">
        <li class="footer-nav__item">
          <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="footer-nav__link">キャンペーン</a>
        </li>
        <li class="footer-nav__item">
          <a href="<?php echo esc_url(home_url("/about")) ?>" class="footer-nav__link">私たちについて</a>
        </li>
        <li class="footer-nav__item">
          <a href="<?php echo esc_url(home_url("/news")) ?>" class="footer-nav__link">ニュース</a>
        </li>
        <li class="footer-nav__item">
          <a href="<?php echo esc_url(home_url("/blog")) ?>" class="footer-nav__link">ブログ</a>
        </li>
      </ul>
      <ul class="footer-nav__items">
        <li class="footer-nav__item">
          <a href="<?php echo esc_url(home_url("/voice")) ?>" class="footer-nav__link">お客様の声</a>
        </li>
        <li class="footer-nav__item">
          <a href="<?php echo esc_url(home_url("/privacypolicy")) ?>" class="footer-nav__link">プライバシーポリシー</a>
        </li>
        <li class="footer-nav__item">
          <a href="<?php echo esc_url(home_url("/terms-of-service")) ?>" class="footer-nav__link">利用規約</a>
        </li>
        <li class="footer-nav__item">
          <a href="<?php echo esc_url(home_url("/contact")) ?>" class="footer-nav__link">お問い合わせ</a>
        </li>
      </ul>
    </div>
    <div class="footer__copy">
      <p><small>Copyright &copy;<?php echo wp_date("Y");?>&nbsp;CodeUps LLC. All Rights Reserved.</small></p>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>