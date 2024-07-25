<div class="breadcrumb top-breadcrumb">
  <div class="breadcrumb__inner inner">
  <?php if (function_exists('bcn_display')) { ?>
    <div class="breadcrumb__list" vocab="http://schema.org/" typeof="BreadcrumbList">
      <?php bcn_display(); ?>
    </div>
  <?php } ?>
  </div>
</div>