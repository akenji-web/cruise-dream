<?php get_header(); ?>
  <main>
    <div class="error">

      <!-- パンくず -->
      <div class="breadcrumb top-breadcrumb">
        <div class="breadcrumb__inner inner">
        <?php if (function_exists('bcn_display')) { ?>
          <div class="breadcrumb__list breadcrumb__list--white" vocab="http://schema.org/" typeof="BreadcrumbList">
            <?php bcn_display(); ?>
          </div>
        <?php } ?>
        </div>
      </div>

      <!-- エラーコンテンツ -->
      <div class="error__contents">
        <div class="error__inner inner">
          <div class="error__container">
            <h2 class="error__title">404</h2>
            <p class="error__text">申し訳ありません。<br>お探しのページが見つかりません。</p>
            <div class="error__button">
              <a href="<?php echo esc_url(home_url("/")); ?>" class="button button--reverse">page TOP<span class="button__arrow"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- フッター -->
  <?php get_footer(); ?>

</body>
</html>