<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mainview">
    <div class="mainview__inner">
      <div class="swiper mainview__swiper js-mainview-swiper">
        <div class="swiper-wrapper">
          <?php
            $group = SCF::get('first-view');
            if (!empty($group)) :
          ?>
          <?php foreach ($group as $fields ) : ?>
          <div class="swiper-slide">
            <picture class="mainview__pic">
              <source srcset="<?php echo esc_url(wp_get_attachment_url($fields['custom-top-first-view-sp'])); ?>" media="(max-width: 767px)">
              <img class="mainview__image" src="<?php echo esc_url(wp_get_attachment_url($fields['custom-top-first-view'])); ?>" alt="">
            </picture>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>
        </div>
        <div class="mainview__text">
          <p class="mainview__title">cruise</p>
          <p class="mainview__subtitle">for the world ocean</p>
        </div>
      </div>
    </div>
  </div>

  <!-- キャンペーン -->
  <section id="campaign" class="campaign">
    <div class="campaign__inner inner">
      <div class="campaign__heading heading heading--left">
        <h2 class="heading__title">campaign</h2>
        <p class="heading__subtitle">キャンペーン</p>
      </div>
      <?php
        $args = [
          "post_type" => "campaign",
          "posts_per_page" => 6,
        ];
        $the_query = new WP_Query($args);
      ?>
      <div class="campaign__cards campaign-cards delayScroll">
        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <a href="<?php the_permalink(); ?>" class="campaign-cards__item campaign-card js-fade__upTrigger">
              <figure class="campaign-card__image">
                <?php if (has_post_thumbnail()) : ?>
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                <?php else : ?>
                  <img src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像"  loading="lazy" decoding="async" />
                <?php endif ; ?>
              </figure>
              <div class="campaign-card__body">
                <?php
                  $taxonomy_terms = get_the_terms($post->ID, 'campaign-category');
                  if ( ! empty( $taxonomy_terms ) ) {
                    foreach( $taxonomy_terms as $taxonomy_term ) {
                      echo '<p class="campaign-card__type card-type">' . esc_html( $taxonomy_term->name ) . '</p>';
                    }
                  }
                ?>
                <p class="campaign-card__title"><?php the_title(); ?></p>
                <p class="campaign-card__text">全部コミコミ(お一人様)</p>
                <div class="campaign-card__price">
                  <?php if (get_field("custom-campaign-regular-price")) :?>
                  <p class="campaign-card__before-price"><?php echo '&yen;' . formatted_price(get_field("custom-campaign-regular-price")); ?></p>
                  <?php endif; ?>
                  <?php if (get_field("custom-campaign-discount-price")) :?>
                  <p class="campaign-card__after-price"><?php echo '&yen;' . formatted_price(get_field("custom-campaign-discount-price")); ?></p>
                  <?php endif; ?>
                </div>
              </div>
            </a>
          <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>記事が投稿されていません</p>
        <?php endif; ?>
      </div>
      <div class="campaign__button">
        <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="button">view more<span class="button__arrow"></span></a>
      </div>
    </div>
  </section>

  <!-- wave -->
  <div class="wave">
    <canvas id="waveCanvas"></canvas>
  </div>

  <!-- ニュース -->
  <section id="news" class="news">
    <div class="news__inner inner">
      <div class="news__heading heading heading--right">
        <h2 class="heading__title">news</h2>
        <p class="heading__subtitle">ニュース</p>
      </div>
      <div class="news__button">
        <a href="<?php echo esc_url(home_url("/news")) ?>" class="button">View All<span class="button__arrow"></span></a>
      </div>
      <?php
        $args = [
          "post_type" => "news",
          "posts_per_page" => 1,
        ];
        $the_query = new WP_Query($args);
      ?>
      <div class="news__container">
      <?php if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <a href="<?php the_permalink(); ?>" class="news__article">
          <time class="news__datetime" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
          <h3 class="news__title"><?php the_title() ?></h3>
          <?php
            $taxonomy_terms = get_the_terms($post->ID, 'news-category');
            $slug = $taxonomy_terms[0]->slug;
          ?>
          <div class="news__category"><?php echo $slug; ?></div>
        </a>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
      <?php else :   ?>
        <p>記事が投稿されていません</p>
      <?php endif; ?>
      </div>
    </div>
  </section>

  <!-- ブログ -->
  <section id="blog" class="blog">
    <div class="blog__inner">
      <div class="blog__heading heading heading--left">
        <h2 class="heading__title">blog</h2>
        <p class="heading__subtitle">ブログ</p>
      </div>
      <?php
        $args = [
          "posts_per_page" => -1,
        ];
        $the_query = new WP_Query($args);
      ?>
      <div class="blog__slide">
        <div class="swiper blog__swiper js-blog-swiper">
          <div class="swiper-wrapper blog__swiper-wrapper">
            <?php if ($the_query->have_posts()) : ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="swiper-slide blog__swiper-slide">
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
                      <div class="blog-card__text text"><?php the_content(); ?></div>
                    </div>
                  </a>
                </div>
              <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <p>記事が投稿されていません</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="blog__navigation">
        <div class="swiper-button-prev blog__swiper-button-prev"></div>
        <div class="swiper-button-next blog__swiper-button-next"></div>
      </div>
      <div class="blog__button">
        <a href="<?php echo esc_url(home_url("/blog")) ?>" class="button">view more<span class="button__arrow"></span></a>
      </div>
    </div>
  </section>

  <!-- wave -->
  <div class="wave">
    <canvas id="waveCanvas2"></canvas>
  </div>

  <!-- お客様の声 -->
  <section id="voice" class="voice">
    <div class="voice__inner inner">
      <div class="voice__heading heading heading--right">
        <h2 class="heading__title">voice</h2>
        <p class="heading__subtitle">お客様の声</p>
      </div>
      <?php
        $args = [
          "post_type" => "voice",
          "posts_per_page" => 2,
        ];
        $the_query = new WP_Query($args);
      ?>
      <div class="voice__cards voice-cards">
        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <div class="voice-cards__item voice-card">
              <div class="voice-card__heading">
                <p class="voice-card__age"><?php the_field("custom-voice-age"); ?></p>
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
                <div class="voice-card__text text"><?php the_content(); ?></div>
              </div>
            </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>記事が投稿されていません</p>
        <?php endif; ?>
      </div>
      <div class="voice__button">
        <a href="<?php echo esc_url(home_url("/voice")) ?>" class="button">view more<span class="button__arrow"></span></a>
      </div>
    </div>
  </section>

  <!-- よくある質問コンテンツ -->
  <section class="faq">
    <div class="faq__inner inner">
      <div class="faq__heading heading  heading--left">
        <h2 class="heading__title heading__title--upper">faq</h2>
        <p class="heading__subtitle">よくある質問</p>
      </div>
      <div class="faq__container">
        <?php
          $group = SCF::get('faq-accordion');
          if (!empty($group)) :
        ?>
        <ul class="faq__list faq-list">
        <?php foreach ($group as $fields ) : ?>
          <li class="faq-list__item accordion js-accordion">
            <p class="accordion__title js-accordion-title"><?php echo $fields['custom-faq-title'] ?></p>
            <p class="accordion__content"><?php echo $fields['custom-faq-content'] ?></p>
          </li>
        <?php endforeach; ?>
        </ul>
        <?php endif; ?>
      </div>
    </div>
  </section>

</main>
<?php get_footer(); ?>