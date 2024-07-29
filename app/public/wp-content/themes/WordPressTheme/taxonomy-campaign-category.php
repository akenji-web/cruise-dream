<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page_campaign-sp.webp")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page_campaign-pc.webp")); ?>" alt="キャンペーンのメイン画像">
    </picture>
    <h1 class="mv__text">campaign</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- キャンペーンコンテンツ -->
  <div class="archive-campaign sub-top-main">
    <div class="archive-campaign__inner inner ">
      <!-- カテゴリーボタン -->
      <ul class="archive-campaign__category-button category-button">
        <?php
          // 現在いるページのタームのIDを取得
          $current_term_id = get_queried_object()->term_id;
          $terms = get_terms([
            // 表示するタクソノミースラッグを記述
            'taxonomy' => 'campaign-category',
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
            esc_url(home_url('/campaign')),
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
      <!-- カード一覧 -->
      <div class="archive-campaign__cards archive-campaign-cards">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="archive-campaign-cards__item campaign-card">
              <figure class="campaign-card__image">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                <?php else : ?>
                  <img src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像" />
                <?php endif; ?>
              </figure>
              <div class="campaign-card__body campaign-card__body--large">
                <?php
                  $taxonomy_terms = get_the_terms($post->ID, 'campaign-category');
                  if ( ! empty( $taxonomy_terms ) ) {
                    foreach( $taxonomy_terms as $taxonomy_term ) {
                      echo '<p class="campaign-card__type card-type">' . esc_html( $taxonomy_term->name ) . '</p>';
                    }
                  }
                ?>
                <p class="campaign-card__title campaign-card__title--large"><?php the_title(); ?></p>
                <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price">
                <?php if (get_field("custom-campaign-regular-price")) :?>
                  <p class="campaign-card__before-price"><?php echo '&yen;' . formatted_price(get_field("custom-campaign-regular-price")); ?></p>
                  <?php endif; ?>
                  <?php if (get_field("custom-campaign-discount-price")) :?>
                  <p class="campaign-card__after-price"><?php echo '&yen;' . formatted_price(get_field("custom-campaign-discount-price")); ?></p>
                  <?php endif; ?>
                </div>
                <div class="u-desktop">
                  <div class="campaign-card__main-text text"><?php the_content(); ?></div>
                  <p class="campaign-card__date">
                    <?php if (get_field("custom-campaign-open-date") && get_field("custom-campaign-close-date")) : ?>
                    <span>キャンペーン期間</span>
                    <time datetime="<?php echo formatted_date(get_field("custom-campaign-open-date")) ?>" itemprop="startDate"><?php echo get_field("custom-campaign-open-date"); ?></time>-<time datetime="<?php echo formatted_date(get_field("custom-campaign-close-date")) ?>" itemprop="endDate"><?php echo get_field("custom-campaign-close-date"); ?></time>
                    <?php endif; ?>
                  </p>
                </div>
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
  </div>
</main>
<?php get_footer(); ?>