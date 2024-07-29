<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page_news-sp.webp")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page_news-pc.webp")); ?>" alt="">
    </picture>
    <h1 class="mv__text">news</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- ニュースコンテンツ -->
  <div class="blog-layout sub-top-main">
    <div class="blog-layout__inner inner">
      <div class="blog-layout__container">
        <div class="blog-layout__main-contents">
          <!-- カテゴリーボタン -->
          <ul class="blog-layout__category-button category-button">
            <?php
              // 現在いるページのタームのIDを取得
              $current_term_id = get_queried_object()->term_id;
              $terms = get_terms([
                // 表示するタクソノミースラッグを記述
                'taxonomy' => 'news-category',
                'orderby' => 'name',
                'order'   => 'ASC',
              ]);

              // カスタム投稿一覧ページへのURL
              $home_class = (is_post_type_archive()) ? 'is-active' : '';
              $home_link = sprintf(
                //カスタム投稿一覧ページへのaタグに付与するクラスを指定できる
                '<li class="category-button__item"><a class="tab__link %s" href="%s">ALL</a></li>',
                $home_class,
                // カスタム投稿一覧ページのスラッグを指定
                esc_url(home_url('/news')),
              );
              echo sprintf(esc_html__('%s', 'textdomain'), $home_link);

              // タームのリンク
              if ($terms) {
                foreach ($terms as $term) {
                  // カレントクラスに付与するクラスを指定できる
                  $term_class = ($current_term_id === $term->term_id) ? 'is-active' : '';
                  $term_link = sprintf(
                    // 各タームに付与するクラスを指定できる
                    '<li class="category-button__item"><a class="tab__link %s" href="%s">%s</a></li>',
                    $term_class,
                    esc_url(get_term_link($term->term_id)),
                    esc_html($term->name)
                  );
                  echo sprintf(esc_html__('%s', 'textdomain'), $term_link);
                }
              }
            ?>
          </ul>
          <div class="blog-layout__sub-news sub-news">
            <dl class="sub-news__list">
            <?php if (have_posts()) : ?>
              <?php while (have_posts()) : the_post(); ?>
              <?php
                $taxonomy_terms = get_the_terms($post->ID, 'news-category');
                $slug = $taxonomy_terms[0]->slug;
              ?>
              <a href="<?php the_permalink(); ?>" class="sub-news__item">
                <dt class="sub-news__date"><time datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time></dt>
                <dd class="sub-news__description">
                  <h2 class="sub-news__title"><?php the_title(); ?></h2>
                </dd>
                <span class="sub-news__category"><?php echo $slug; ?></span>
              </a>
              <?php endwhile; ?>
            <?php else : ?>
              <p>記事が投稿されていません</p>
            <?php endif; ?>
            </dl>
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