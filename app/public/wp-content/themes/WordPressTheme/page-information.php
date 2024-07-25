<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
    <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page-info-fv-sp.jpg")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page-info-fv.jpg")); ?>" alt="インフォメーションのメイン画像">
    </picture>
    <h1 class="mv__text">information</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <div class="sub-information sub-top-main sub-top-main--info">
    <div class="sub-information__inner inner back-icon">
      <div class="sub-information__tab tab">
        <div class="tab__button-area">
          <a href="?tab=1" id="tab1" class="tab__button js-tab-button"><span class="tab__icon"></span>ライセンス講習</a>
          <a href="?tab=2" id="tab2" class="tab__button js-tab-button"><span class="tab__icon tab__icon--shark"></span>ファンダイビング</a>
          <a href="?tab=3" id="tab3" class="tab__button js-tab-button"><span class="tab__icon tab__icon--fish"></span>体験ダイビング</a>
        </div>

        <div class="tab__contents">
          <div id="tab-content1" class="tab__content js-tab-content">
            <div class="tab__card info-card">
              <div class="info-card__body">
                <h3 class="info-card__title">ライセンス講習</h3>
                <p class="info-card__text text">
                  泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                </p>
              </div>
              <div class="info-card__image">
                <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/info-license.jpg")); ?>" alt="ライセンス講習の画像" loading="lazy" decoding="async">
              </div>
            </div>
          </div>
          <div id="tab-content2" class="tab__content js-tab-content">
            <div class="tab__card info-card">
              <div class="info-card__body">
                <h3 class="info-card__title">ファンダイビング</h3>
                <p class="info-card__text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
              <div class="info-card__image">
                <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/info-fundiving.jpg")); ?>" alt="ファンダイビングの画像" loading="lazy" decoding="async">
              </div>
            </div>
          </div>
          <div id="tab-content3" class="tab__content js-tab-content">
            <div class="tab__card info-card">
              <div class="info-card__body">
                <h3 class="info-card__title">体験ダイビング</h3>
                <p class="info-card__text">
                  ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
              </div>
              <div class="info-card__image">
                <img src="<?php echo esc_url(get_theme_file_uri("/assets/images/info-diving.jpg")); ?>" alt="体験ダイビングの画像" loading="lazy" decoding="async">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>