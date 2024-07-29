<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page_contact-sp.webp")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page_contact-pc.webp")); ?>" alt="">
    </picture>
    <h1 class="mv__text">contact</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- サンクス -->
  <div class="thanks sub-top-main">
    <div class="thanks__inner inner ">
      <div class="thanks__container">
        <p class="thanks__main-message">お問い合わせ内容を送信完了しました。</p>
        <p class="thanks__sub-message">このたびは、お問い合わせ頂き誠にありがとうございます。<br>
          お送り頂きました内容を確認の上、3営業日以内に折り返しご連絡させて頂きます。<br>
          また、ご記入頂いたメールアドレスへ、自動返信の確認メールをお送りしております。</p>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>