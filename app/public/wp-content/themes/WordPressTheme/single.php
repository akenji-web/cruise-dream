<?php
  // カスタムクエリの前に、メインクエリを調整
  global $wp_query;
  $wp_query->query_vars['posts_per_page'] = 10;
  get_header();
?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page_blog-pc.webp")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page_blog-sp.webp")); ?>" alt="">
    </picture>
    <h1 class="mv__text">blog</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <div class="blog-layout sub-top-main sub-top-main--wide">
    <div class="blog-layout__inner inner">
      <div class="blog-layout__container">
        <div class="blog-layout__main-contents">
          <!-- 投稿詳細 -->
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <div class="blog-layout__detail blog-detail">
                <div class="blog-detail__head">
                  <time class="blog-detail__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
                  <h1 class="blog-detail__title"><?php the_title(); ?></h1>
                  <figure class="blog-detail__image">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像" loading="lazy" decoding="async">
                    <?php endif ; ?>
                  </figure>
                </div>
                <div class="blog-detail__content">
                  <?php the_content(); ?>
                </div>
              </div>
            <?php endwhile; ?>
          <?php endif; ?>
          <!-- ページネーション -->
          <div class="pagination top-pagination pagination--no-number">
          <?php
            // 前の記事へのリンク
            $prev_link = get_previous_post_link('<div class="pagination__text">%link</div>', '前のページ');
            if (!empty($prev_link)) {
                echo $prev_link;
            }
          ?>
          <div>
            <a href="<?php echo esc_url(home_url("/blog")) ?>" class="pagination__text">ブログ一覧へ<span class="button__arrow"></span></a>
          </div>
          <?php
            // 次の記事へのリンク
            $next_link = get_next_post_link('<div class="pagination__text">%link</div>', '次のページ');
            if (!empty($next_link)) {
                echo $next_link;
            }
          ?>
          </div>
        </div>

        <!-- サイドバー -->
        <div class="blog-layout__side">
          <?php get_template_part('parts/sidebar'); ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>