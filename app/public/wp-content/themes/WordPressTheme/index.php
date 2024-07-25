<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mainview">
    <div class="mainview__inner">
      <div class="swiper mainview__swiper js-mainview-swiper">
        <div class="swiper-wrapper">
          <?php
            $group = SCF::get('first-view');
            foreach ($group as $fields ) :
          ?>
          <div class="swiper-slide">
            <picture class="mainview__pic">
              <source srcset="<?php echo esc_url(wp_get_attachment_url($fields['custom-top-first-view-sp'])); ?>" media="(max-width: 767px)">
              <img class="mainview__image" src="<?php echo esc_url(wp_get_attachment_url($fields['custom-top-first-view'])); ?>" alt="">
            </picture>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="mainview__text">
          <p class="mainview__title">diving</p>
          <p class="mainview__subtitle">into the ocean</p>
        </div>
      </div>
    </div>
  </div>

  <!-- キャンペーン -->
  <section id="campaign" class="campaign top-campaign">
    <div class="campaign__inner inner">
      <div class="campaign__heading heading">
        <h2 class="heading__title">campaign</h2>
        <p class="heading__subtitle">キャンペーン</p>
      </div>
      <div class="campaign__navigation">
        <div class="swiper-button-prev campaign__swiper-button-prev"></div>
        <div class="swiper-button-next campaign__swiper-button-next"></div>
      </div>
      <?php
        $args = [
          "post_type" => "campaign",
          "posts_per_page" => -1,
        ];
        $the_query = new WP_Query($args);
      ?>
      <div class="campaign__slide">
        <div class="swiper campaign__swiper js-campaign-swiper">
          <div class="swiper-wrapper campaign__swiper-wrapper">
            <?php if ($the_query->have_posts()) : ?>
              <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                <div class="swiper-slide campaign__swiper-slide">
                  <div class="campaign__card campaign-card">
                    <?php if (has_post_thumbnail()) : ?>
                      <img class="campaign-card__image" src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                    <?php else : ?>
                      <img class="campaign-card__image" src="<?php echo esc_url(get_theme_file_uri( "/assets/images/noimage.jpg" )); ?>)" alt="NoImage画像"  loading="lazy" decoding="async" />
                    <?php endif ; ?>
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
                        <p class="campaign-card__before-price">&yen;<?php echo formatted_price(get_field("custom-campaign-regular-price")); ?></p>
                        <p class="campaign-card__after-price">&yen;<?php echo formatted_price(get_field("custom-campaign-discount-price")); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            <?php else : ?>
              <p>記事が投稿されていません</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="campaign__button">
        <a href="<?php echo esc_url(home_url("/campaign")) ?>" class="button">view more<span class="button__arrow"></span></a>
      </div>
    </div>
  </section>

  <!-- 私たちについて -->
  <section id="about-us" class="about-us top-about-us">
    <div class="about-us__inner inner">
      <div class="about-us__heading heading">
        <h2 class="heading__title">about us</h2>
        <p class="heading__subtitle">私たちについて</p>
      </div>
      <div class="about-us__container">
        <div class="about-us__left-image">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/about1.jpg")); ?>" alt="シーサーの画像" loading="lazy" decoding="async" >
        </div>
        <div class="about-us__right-image">
          <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/about2.jpg")); ?>" alt="二匹の黄色の魚の画像" loading="lazy" decoding="async" >
        </div>
        <div class="about-us__text-area">
          <p class="about-us__phrase">Dive into<br>the Ocean</p>
          <div class="about-us__text-area--right">
            <p class="about-us__text text text--reverse">
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
              ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
            </p>
            <div class="about-us__button">
              <a href="<?php echo esc_url(home_url("/about")) ?>" class="button">view more<span class="button__arrow"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ダイビング情報 -->
  <section id="information" class="information top-information">
    <div class="information__inner inner">
      <div class="information__heading heading">
        <h2 class="heading__title">information</h2>
        <p class="heading__subtitle">ダイビング情報</p>
      </div>
      <div class="information__container">
        <div class="informatin__image-area js-color-box">
          <img class="information__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/info1.jpg")); ?>" alt="魚が泳いでいる様子" loading="lazy" decoding="async">
        </div>
        <div class="information__contents">
          <p class="information__title content-title content-title--info">ライセンス講習</p>
          <p class="information__text text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>
            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
          </p>
          <div class="information__button">
            <a href="<?php echo esc_url(home_url("/information")) ?>" class="button">view more<span class="button__arrow"></span></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ブログ -->
  <section id="blog" class="blog">
    <div class="blog__inner inner">
      <div class="blog__heading heading">
        <h2 class="heading__title heading__title--reverse">blog</h2>
        <p class="heading__subtitle heading__subtitle--reverse">ブログ</p>
      </div>
      <?php
        $args = [
          "post_type" => "post",
          "posts_per_page" => 3,
        ];
        $the_query = new WP_Query($args);
      ?>
      <div class="blog__cards blog-cards">
        <?php if ($the_query->have_posts()) : ?>
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
          <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php else : ?>
          <p>記事が投稿されていません</p>
        <?php endif; ?>
      </div>
      <div class="blog__button">
        <a href="<?php echo esc_url(home_url("/blog")) ?>" class="button">view more<span class="button__arrow"></span></a>
      </div>
    </div>
  </section>

  <!-- お客様の声 -->
  <section id="voice" class="voice top-voice">
    <div class="voice__inner inner">
      <div class="voice__heading heading">
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
            <a href="<?php echo esc_url(home_url("/voice")) ?>" class="voice-cards__item voice-card">
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
                <div class="voice-card__text text text--green"><?php the_content(); ?></div>
              </div>
            </a>
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

  <!-- 料金一覧 -->
  <section id="price" class="price top-price">
    <div class="price__inner inner">
      <div class="price__heading heading">
        <h2 class="heading__title">price</h2>
        <p class="heading__subtitle">料金一覧</p>
      </div>
      <div class="price__container">
        <div class="price__contents">
          <div class="price__menu-area">
            <!-- ライセンス講習 -->
            <?php
              $target_page_id = get_page_by_path('price')->ID;
              $group = SCF::get('price-license', $target_page_id);
              if (!empty($group)) :
            ?>
            <div class="price__menu price-menu">
              <p class="price-menu__title content-title content-title--price">ライセンス講習</p>
              <ul class="price-menu__items">
              <?php foreach ($group as $fields ) : ?>
                <li class="price-menu__item">
                  <p class="price-menu__name"><?php echo $fields['custom-price-text'] ?></p>
                  <p class="price-menu__price">&yen;<?php echo formatted_price($fields['custom-price-price']) ?></p>
                </li>
              <?php endforeach; ?>
              </ul>
            </div>
            <?php endif ?>
            <!-- 体験ダイビング -->
            <?php
              $group = SCF::get('price-trial-diving', $target_page_id);
              if (!empty($group)) :
            ?>
            <div class="price__menu price-menu">
              <p class="price-menu__title content-title content-title--price">体験ダイビング</p>
              <ul class="price-menu__items">
              <?php foreach ($group as $fields ) : ?>
                <li class="price-menu__item">
                  <p class="price-menu__name"><?php echo $fields['custom-price-text2'] ?></p>
                  <p class="price-menu__price">&yen;<?php echo formatted_price($fields['custom-price-price2']) ?></p>
                </li>
              <?php endforeach; ?>
              </ul>
            </div>
            <?php endif ?>
            <!-- ファンダイビング -->
            <?php
              $group = SCF::get('price-fun-diving', $target_page_id);
              if (!empty($group)) :
            ?>
            <div class="price__menu price-menu">
              <p class="price-menu__title content-title content-title--price">ファンダイビング</p>
              <ul class="price-menu__items">
              <?php foreach ($group as $fields ) : ?>
                <li class="price-menu__item">
                  <p class="price-menu__name"><?php echo $fields['custom-price-text3'] ?></p>
                  <p class="price-menu__price">&yen;<?php echo formatted_price($fields['custom-price-price3']) ?></p>
                </li>
              <?php endforeach; ?>
              </ul>
            </div>
            <?php endif ?>
            <!-- スペシャルダイビング -->
            <?php
              $group = SCF::get('price-special-diving', $target_page_id);
              if (!empty($group)) :
            ?>
            <div class="price__menu price-menu">
              <p class="price-menu__title content-title content-title--price">スペシャルダイビング</p>
              <ul class="price-menu__items">
              <?php foreach ($group as $fields ) : ?>
                <li class="price-menu__item">
                  <p class="price-menu__name"><?php echo $fields['custom-price-text4'] ?></p>
                  <p class="price-menu__price">&yen;<?php echo formatted_price($fields['custom-price-price4']) ?></p>
                </li>
              <?php endforeach; ?>
              </ul>
            </div>
            <?php endif ?>
          </div>
          <div class="price__image-area js-color-box">
            <picture>
              <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/price2-sp.jpg")); ?>" media="(max-width: 767px)">
              <img class="price__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/price1.jpg")); ?>" alt="赤い魚の群れ" loading="lazy" decoding="async">
            </picture>
          </div>
        </div>
        <div class="price__button-area">
          <a href="<?php echo esc_url(home_url("/price")) ?>" class="price-button button">view more<span class="button__arrow"></span></a>
        </div>
      </div>
    </div>
  </section>

  <!-- コンタクト -->
  <section id="contact" class="contact top-contact">
    <div class="contact__inner inner">
      <div class="contact__container">
        <div class="contact__content-left">
          <div class="contact__logo-area">
            <img class="contact__logo" src="<?php echo esc_url(get_theme_file_uri("/assets/images/logo2.png")); ?>" alt="CodeUps" loading="lazy" decoding="async" >
          </div>
          <div class="contact__info">
            <div class="contact__info-text text text--green">
              <p>沖縄県那覇市1-1</p>
              <p>TEL:0120-000-0000</p>
              <p>営業時間:8:30-19:00</p>
              <p>定休日:毎週火曜日</p>
            </div>
            <div class="contact__map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.524065273254!2d127.67657937595395!3d26.212156189844457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34e56bd6e046d289%3A0x345ffb669fadbd4f!2z6YKj6KaH5biC5b255omA!5e0!3m2!1sja!2sjp!4v1710048343203!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="contact__content-right">
          <div class="contact__heading heading">
            <h2 class="heading__title heading__title--large">contact</h2>
            <p class="heading__subtitle heading__subtitle--tight">お問い合わせ</p>
          </div>
          <p class="contact__text">ご予約・お問い合わせはコチラ</p>
          <div class="contact__button">
            <a href="<?php echo esc_url(home_url("/contact")) ?>" class="button">Contact us<span class="button__arrow"></span></a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>