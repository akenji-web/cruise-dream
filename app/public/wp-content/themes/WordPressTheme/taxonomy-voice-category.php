<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page-voice-fv-sp.jpg")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page-voice-fv.jpg")); ?>" alt="キャンペーンのメイン画像">
    </picture>
    <h1 class="mv__text">voice</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <div class="sub-voice sub-top-main sub-top-main--wide">
    <div class="sub-voice__inner inner back-icon">
      <!-- カテゴリーボタン -->
      <ul class="sub-voice__category-button category-button">
        <?php
          // 現在いるページのタームのIDを取得
          $current_term_id = get_queried_object()->term_id;
          $terms = get_terms([
            // 表示するタクソノミースラッグを記述
            'taxonomy' => 'voice-category',
            'orderby' => 'name',
            'order'   => 'ASC',
          ]);

          // カスタム投稿一覧ページへのURL
          $home_class = (is_post_type_archive()) ? 'is-active' : '';
          $home_link = sprintf(
            //カスタム投稿一覧ページへのaタグに付与するクラスを指定できる
            '<li class="category-button__item"><a class="tab__link %s" href="%s">全て</a></li>',
            $home_class,
            // カスタム投稿一覧ページのスラッグを指定
            esc_url(home_url('/voice')),
          );
          echo sprintf(esc_html__('%s', 'textdomain'), $home_link);

          // タームのリンク
          if ($terms) {
            foreach ($terms as $term) {
              // カレントクラスに付与するクラスを指定できる
              $term_class = ($current_term_id === $term->term_id) ? 'is-active' : '';
              $term_link = sprintf(
                // 各タームに付与するクラスを指定できる
                '<li class="category-button__item"><a class="tab__link %s" href="%s" alt="%s">%s</a></li>',
                $term_class,
                esc_url(get_term_link($term->term_id)),
                esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $term->name)),
                esc_html($term->name)
              );
              echo sprintf(esc_html__('%s', 'textdomain'), $term_link);
            }
          }
        ?>
      </ul>

      <!-- カード一覧 -->
      <div class="sub-voice__cards voice-cards">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="voice-cards__item voice-card">
              <div class="voice-card__heading">
                <?php if (get_field("custom-voice-age")) : ?>
                <p class="voice-card__age"><?php the_field("custom-voice-age"); ?></p>
                <?php endif; ?>
                <?php
                  $taxonomy_terms = get_the_terms($post->ID, 'voice-category');
                  if ( ! empty( $taxonomy_terms ) ) {
                    foreach( $taxonomy_terms as $taxonomy_term ) {
                      echo '<p class="voice-card__type card-type card-type--tight">' . esc_html( $taxonomy_term->name ) . '</p>';
                    }
                  }
                ?>
                <p class="voice-card__title content-title content-title--voice"><?php the_title(); ?></p>
              </div>
              <div class="voice-card__image-area js-color-box">
                <?php if (has_post_thumbnail()) : ?>
                  <img class="voice-card__image" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                <?php else : ?>
                  <img class="voice-card__image" src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像" loading="lazy" decoding="async" />
                <?php endif ; ?>
              </div>
              <div class="voice-card__body">
                <div class="voice-card__text text text--green"><?php the_content(); ?></div>
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