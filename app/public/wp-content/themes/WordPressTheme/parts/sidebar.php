<aside class="blog-side">
  <!-- 人気記事 -->
  <h2 class="blog-side__heading"><span class="blog-side__heading-icon"></span>人気記事</h2>
  <div class="blog-side__contents popular-cards">
    <ul class="popular-cards__list">
    <?php
      $args = [
        "post_type" => "post",
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num',
        'order' => 'DESC',
        "posts_per_page" => 3,
      ];
      $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()) : ?>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <li class="popular-cards__item">
        <a href="<?php the_permalink(); ?>" class="popular-card">
          <figure class="popular-card__image">
            <?php if (has_post_thumbnail()) : ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
            <?php else : ?>
              <img src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像" loading="lazy" decoding="async">
            <?php endif ; ?>
          </figure>
          <div class="popular-card__body">
            <time class="popular-card__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
            <p class="popular-card__title"><?php the_title(); ?></p>
          </div>
        </a>
      </li>
      <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p>記事が投稿されていません</p>
    <?php endif; ?>
    </ul>
  </div>

  <!-- 口コミ -->
  <h2 class="blog-side__heading"><span class="blog-side__heading-icon"></span>口コミ</h2>
  <div class="blog-side__contents">
    <?php
      $args = [
        "post_type" => "voice",
        "orderby" => "date",
        "order" => "DESC",
        "posts_per_page" => 1,
      ];
      $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()) : ?>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <div class="review-card">
          <figure class="review-card__image">
            <?php if (has_post_thumbnail()) : ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
            <?php else : ?>
              <img src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像" loading="lazy" decoding="async">
            <?php endif ; ?>
          </figure>
          <p class="review__age"><?php the_field("custom-voice-age"); ?></p>
          <p class="review__title"><?php the_title(); ?></p>
        </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p>記事が投稿されていません</p>
    <?php endif; ?>
    <div class="blog-side__button">
      <a href="<?php echo esc_url(home_url("/voice")) ?>" class="button">view more<span class="button__arrow"></span></a>
    </div>
  </div>

  <!-- キャンペーン -->
  <h2 class="blog-side__heading"><span class="blog-side__heading-icon"></span>キャンペーン</h2>
  <div class="blog-side__contents">
  <?php
      $args = [
        "post_type" => "campaign",
        "orderby" => "date",
        "order" => "DESC",
        "posts_per_page" => 2,
      ];
      $the_query = new WP_Query($args);
    ?>
    <?php if ($the_query->have_posts()) : ?>
      <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
      <div class="blog-side__campaign campaign-card">
        <?php if (has_post_thumbnail()) : ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" class="campaign-card__image campaign-card__image--small" loading="lazy" decoding="async">
        <?php else : ?>
          <img src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像" class="campaign-card__image campaign-card__image--small" loading="lazy" decoding="async">
        <?php endif ; ?>
        <div class="campaign-card__body campaign-card__body--small">
          <p class="campaign-card__title campaign-card__title--center"><?php the_title(); ?></p>
          <p class="campaign-card__text campaign-card__text--small">全部コミコミ(お一人様)</p>
          <div class="campaign-card__price">
            <p class="campaign-card__before-price campaign-card__before-price--small">&yen;<?php echo formatted_price(get_field("custom-campaign-regular-price")); ?></p>
            <p class="campaign-card__after-price campaign-card__after-price--small">&yen;<?php echo formatted_price(get_field("custom-campaign-discount-price")); ?></p>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
    <?php else : ?>
      <p>記事が投稿されていません</p>
    <?php endif; ?>
    <div class="blog-side__button">
      <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="button">view more<span class="button__arrow"></span></a>
    </div>
  </div>

  <!-- アーカイブ -->
  <h2 class="blog-side__heading"><span class="blog-side__heading-icon"></span>アーカイブ</h2>
  <div class="blog-side__contents">
    <ul class="blog-side__archive side-archive">
      <?php
      // 投稿年ごとにグループ化
      $blog_by_year = array();
      $args = array(
        'post_type' => 'post',
        'post_status' => 'publish', //公開状態
        'posts_per_page' => -1, //全ての投稿
      );
      $the_query = new WP_Query($args);
      while ($the_query->have_posts()) : $the_query->the_post();
        $year = get_the_date('Y');
        $month = get_the_date('n');
        $blog_by_year[$year][$month][] = $post;
      endwhile;
      wp_reset_postdata();

      // 投稿年でループ
      foreach ($blog_by_year as $year => $years) :
      ?>
        <li class="side-archive__item js-side-archive__item">
          <p class="side-archive__year js-side-archive__year"><?php echo esc_html($year); ?></p>
          <ul class="side-archive__month-list js-side-archive__month-list">
            <?php
            // 投稿をループ
            foreach ($years as $month => $blog) :
              setup_postdata($post);
            ?>
              <li class="side-archive__month">
                <a href="<?php echo esc_url(home_url($year.'/'.$month.'/')); ?>"><?php echo esc_html($month); ?>月</a>
              </li>
            <?php endforeach; ?>
          </ul><!-- side-archive__month-list -->
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</aside>
