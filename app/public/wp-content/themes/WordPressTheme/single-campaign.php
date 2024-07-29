<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page-campaign-fv-sp.jpg")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page_campaign-pc.jpg")); ?>" alt="">
    </picture>
    <h1 class="mv__text">campaign</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- キャンペーンコンテンツ -->
  <div class="sub-campaign sub-top-main">
    <div class="sub-campaign__inner inner">
      <div class="sub-campaign__container">
        <!-- 投稿詳細 -->
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
          <div class="campaign-detail">
            <div class="campaign-detail__heading">
              <h1 class="campaign-detail__title"><?php the_title(); ?></h1>
              <time class="campaign-detail__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
              <figure class="campaign-detail__image">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                <?php else : ?>
                  <img src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像" loading="lazy" decoding="async">
                <?php endif ; ?>
              </figure>
            </div>
            <div class="campaign-detail__body">
              <div class="campaign-detail__content"><?php echo nl2br(the_content()); ?></div>
            </div>
            <div class="campaign-detail__button">
              <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="button">キャンペーン一覧へ<span class="button__arrow"></span></a>
            </div>
          </div>
          <?php endwhile; ?>
        <?php endif; ?>

      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>