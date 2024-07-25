<?php get_header(); ?>
<main>
  <!-- メインビュー -->
  <div class="mv">
  <picture>
      <source srcset="<?php echo esc_url(get_theme_file_uri("/assets/images/page-price-fv-sp.jpg")); ?>" media="(max-width: 767px)">
      <img class="mv__image" src="<?php echo esc_url(get_theme_file_uri("/assets/images/page-price-fv.jpg")); ?>" alt="料金一覧のメイン画像">
    </picture>
    <h1 class="mv__text">price</h1>
  </div>

  <!-- パンくず -->
  <?php get_template_part('parts/breadcrumb'); ?>

  <!-- 料金一覧コンテンツ -->
  <div class="sub-price sub-top-main">
    <div class="sub-price__inner back-icon">
      <div class="sub-price__container">
        <!-- ライセンス講習 -->
        <?php
          $group = SCF::get('price-license');
          if (!empty($group)) :
        ?>
          <div id="license" class="sub-price__table price-table">
            <h2 class="price-table__head">ライセンス講習</h2>
            <table class="price-table__table">
            <?php foreach ($group as $fields ) : ?>
              <tr class="price-table__row">
                <td class="price-table__name"><?php echo $fields['custom-price-text'] ?></td>
                <td class="price-table__price">&yen;<?php echo formatted_price($fields['custom-price-price']) ?></td>
              </tr>
            <?php endforeach; ?>
            </table>
          </div>
        <?php endif ?>
        <!-- 体験ダイビング -->
        <?php
          $group = SCF::get('price-trial-diving');
          if (!empty($group)) :
        ?>
          <div id="trial-diving" class="sub-price__table price-table">
            <h2 class="price-table__head">体験ダイビング</h2>
            <table class="price-table__table">
            <?php foreach ($group as $fields ) : ?>
              <tr class="price-table__row">
                <td class="price-table__name"><?php echo $fields['custom-price-text2'] ?></td>
                <td class="price-table__price">&yen;<?php echo formatted_price($fields['custom-price-price2']) ?></td>
              </tr>
            <?php endforeach; ?>
            </table>
          </div>
        <?php endif ?>
        <!-- ファンダイビング -->
        <?php
          $group = SCF::get('price-fun-diving');
          if (!empty($group)) :
        ?>
          <div id="fun-diving" class="sub-price__table price-table">
            <h2 class="price-table__head">ファンダイビング</h2>
            <table class="price-table__table">
            <?php foreach ($group as $fields ) : ?>
              <tr class="price-table__row">
                <td class="price-table__name"><?php echo $fields['custom-price-text3'] ?></td>
                <td class="price-table__price">&yen;<?php echo formatted_price($fields['custom-price-price3']) ?></td>
              </tr>
            <?php endforeach; ?>
            </table>
          </div>
        <?php endif ?>
        <!-- スペシャルダイビング -->
        <?php
          $group = SCF::get('price-special-diving');
          if (!empty($group)) :
        ?>
          <div class="sub-price__table price-table">
            <h2 class="price-table__head">スペシャルダイビング</h2>
            <table class="price-table__table">
            <?php foreach ($group as $fields ) : ?>
              <tr class="price-table__row">
                <td class="price-table__name"><?php echo $fields['custom-price-text4'] ?></td>
                <td class="price-table__price">&yen;<?php echo formatted_price($fields['custom-price-price4']) ?></td>
              </tr>
            <?php endforeach; ?>
            </table>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</main>
<?php get_footer(); ?>