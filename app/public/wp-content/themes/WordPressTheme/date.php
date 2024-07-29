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
    <h1 class="mv__text"><?php the_archive_title(); ?></h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <div class="blog-layout sub-top-main sub-top-main--wide">
    <div class="blog-layout__inner inner ">
      <div class="blog-layout__container">
        <div class="blog-layout__main-contents">
          <!-- ブログカード一覧 -->
          <div class="blog-layout__cards blog-cards blog-cards--2columns">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
                <a href="<?php the_permalink(); ?>" class="blog-cards__item blog-card">
                  <figure class="blog-card__image">
                    <?php if (has_post_thumbnail()) : ?>
                      <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                    <?php else : ?>
                      <img src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像" loading="lazy" decoding="async">
                    <?php endif ; ?>
                  </figure>
                  <div class="blog-card__body">
                    <time class="blog-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
                    <p class="blog-card__title content-title content-title--blog"><?php the_title(); ?></p>
                    <p class="blog-card__text text"><?php the_content(); ?></p>
                  </div>
                </a>
              <?php endwhile; ?>
            <?php else : ?>
              <p>記事が投稿されていません</p>
            <?php endif; ?>
          </div>

          <!-- ページネーション -->
          <div class="top-pagination">
            <?php
              if (function_exists('wp_pagenavi')) {
                wp_pagenavi();
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