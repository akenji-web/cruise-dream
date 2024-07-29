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
          <!-- 投稿詳細 -->
          <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <?php
              $taxonomy_terms = get_the_terms($post->ID, 'news-category');
              $slug = $taxonomy_terms[0]->slug;
            ?>
            <div class="news-detail">
              <div class="news-detail__heading">
                <h1 class="news-detail__title"><?php the_title(); ?></h1>
                <span class="news-detail__category"><?php echo $slug; ?></span>
                <time class="news-detail__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.m/d'); ?></time>
                <?php if (has_post_thumbnail()) : ?>
                <figure class="news-detail__image">
                  <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async">
                </figure>
                <?php endif ; ?>
              </div>
              <div class="news-detail__body">
                <div class="news-detail__content"><?php echo nl2br(the_content()); ?></div>
              </div>
              <div class="news-detail__button">
                <a href="<?php echo esc_url(home_url("/news")) ?>" class="button button--news">ニュース一覧へ<span class="button__arrow"></span></a>
              </div>
            </div>
            <?php endwhile; ?>
          <?php endif; ?>
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