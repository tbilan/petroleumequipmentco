<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */

$is_front = drupal_is_front_page();
if (empty($page['slideshow']) && empty($page['quote'])) {
  $slideshow_class = 'no-slideshow';
} else {
  $slideshow_class = 'has-slideshow';
}

if (empty($page['quote'])) {
  $quote_class = 'no-quote';
} else {
  $quote_class = 'has-quote';
}
?>
<?php
$menu_tree = menu_tree_output(menu_tree_all_data(variable_get('menu_main_links_source', 'main-menu')));
$pt_menu = render($menu_tree);
?>

<div class="pt-mobile-menu">
<?php print $pt_menu; ?>
</div>
<div id="page">
<a href="<?php print $front_page; ?>"><img src="<?php print base_path() . drupal_get_path('theme', 'petrol'); ?>/images/mobile-logo.png" class="mobile-logo" alt=""></a>

  <div class="pt-header">
<div class="pt-header-img">
<a href="<?php print $front_page; ?>">
<img src="<?php print base_path() . drupal_get_path('theme', 'petrol'); ?>/images/header.jpg" class="large" alt="">
</a>
</div>

<div id="pt-nav">
<?php echo $pt_menu; ?>
</div>
  </div><!-- /pt-header -->

  <div id="main">

<div class="pt-above-content clearfix <?php echo $slideshow_class . ' ' . $quote_class; ?>">
<div class="pt-slideshow">
<?php print render($page['slideshow']); ?>
</div>

<div class="pt-quote">
<div class="pt-quote-inner">
<?php print render($page['quote']); ?>
</div>
</div>
</div><!-- /pt-above-content -->

    <div id="content" class="column" role="main">
      <?php print render($page['highlighted']); ?>
      <a id="main-content"></a>
      <?php print render($title_prefix); ?>
      <?php if ($title && !$is_front): ?>
        <h1 class="page__title title" id="page-title"><?php print $title; ?></h1>
      <?php endif; ?>
      <?php print render($title_suffix); ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print $feed_icons; ?>
    </div>

    <?php
      // Render the sidebars to see if there's anything in them.
      $sidebar_first  = render($page['sidebar_first']);
      $sidebar_second = render($page['sidebar_second']);
    ?>

    <?php if ($sidebar_first || $sidebar_second): ?>
      <aside class="sidebars">
        <?php print $sidebar_first; ?>
        <?php print $sidebar_second; ?>
      </aside>
    <?php endif; ?>

  </div>


</div>

<div class="pt-footer">
  <?php print render($page['footer']); ?>
      <p id="byline"><a href="https://www.usnx.com" target="_blank">Website Design and Web Hosting by U.S.NEXT</a></p>
</div>

<?php print render($page['bottom']); ?>
