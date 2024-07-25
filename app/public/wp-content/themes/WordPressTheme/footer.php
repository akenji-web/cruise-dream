<?php if (!is_page('contact') && !is_page('thanks') && !is_404()) :?>
<?php
  if (is_front_page()) {
    $layout_top_contact_sub = '';
  } else {
    $layout_top_contact_sub = 'top-contact--sub';
  }
?>
<section id="contact" class="contact top-contact <?php echo $layout_top_contact_sub; ?>">
  <div class="contact__inner inner">
    <div class="contact__container">
      <div class="contact__content-left">
        <div class="contact__logo-area">
          <img class="contact__logo" src="<?php echo esc_url(get_theme_file_uri("/assets/images/logo_bl.webp")); ?>" alt="CodeUps" loading="lazy" decoding="async">
        </div>
        <div class="contact__info">
          <div class="contact__info-text text text--green">
            <p>沖縄県那覇市1-1</p>
            <p>TEL:0120-000-0000</p>
            <p>営業時間:8:30-19:00</p>
            <p>定休日:毎週火曜日</p>
          </div>
          <div class="contact__map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.524065273254!2d127.67657937595395!3d26.212156189844457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e56bd6e046d289%3A0x345ffb669fadbd4f!2z6YKj6KaH5biC5b255omA!5e0!3m2!1sja!2sjp!4v1710048343203!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
      <div class="contact__content-right">
        <div class="contact__heading heading">
          <h2 class="heading__title heading__title--large">contact</h2>
          <p class="heading__subtitle heading__subtitle--tight">お問い合わせ</p>
        </div>
        <p class="contact__text">ご予約・お問い合わせはコチラ</p>
        <div class="contact__button">
          <a href="<?php echo esc_url(home_url("/contact")) ?>" class="button">Contact us<span class="button__arrow"></span></a>
        </div>
      </div>
    </div>
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
    <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/pagetop-button.svg")); ?>" alt="ページトップボタン">
  </a>
  <div class="footer__inner inner">
    <div class="footer__heading">
      <img class="footer__logo" src="<?php echo esc_url(get_theme_file_uri("/assets/images/logo_dbl.webp")); ?>" alt="CodeUps">
      <div class="footer__sns-icon">
        <a href="https://www.facebook.com/" class="footer__facebook" target="_blank">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/facebooklogo.png")); ?>" alt="facebook">
        </a>
        <a href="https://www.instagram.com/" class="footer__instagram" target="_blank">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/instagramlogo.png")); ?>" alt="instagram">
        </a>
      </div>
    </div>
    <div class="footer__container nav">
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
        <li class="nav__item">
          <a href="<?php echo esc_url(home_url("/faq")) ?>" class="nav__link nav__link--bold">よくある質問</a>
        </li>
        <li class="nav__item nav__item--others">
          <a href="<?php echo esc_url(home_url("/privacypolicy")) ?>" class="nav__link nav__link--bold">プライバシー<br class="u-mobile">ポリシー</a>
        </li>
        <li class="nav__item nav__item--others">
          <a href="<?php echo esc_url(home_url("/terms-of-service")) ?>" class="nav__link nav__link--bold">利用規約</a>
        </li>
        <li class="nav__item nav__item--others">
          <a href="<?php echo esc_url(home_url("/contact")) ?>" class="nav__link nav__link--bold">お問い合わせ</a>
        </li>
        <li class="nav__item nav__item--others">
          <a href="<?php echo esc_url(home_url("/sitemap")) ?>" class="nav__link nav__link--bold">サイトマップ</a>
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