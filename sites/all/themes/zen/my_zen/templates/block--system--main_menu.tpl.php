<?php
/**
 * @file
 * Returns the HTML for a block.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728246
 */
drupal_add_js('misc/uilang.js');
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <button type="button" class="navbar-toggle1"> 
 	<span class="icon-bar"></span> 
  	<span class="icon-bar"></span> 
  	<span class="icon-bar"></span> 
  </button>

  <div class="collapse_main_menu">
  	<?php print $content; ?>
  </div>

  <code>
    clicking on ".navbar-toggle1" toggles class "hidden_show" on ".main_menu"
    clicking on ".navbar-toggle" toggles class "hidden_show1" on ".nav_menu"
    clicking on ".navbar-toggle" toggles class "active_button" on ".navbar-toggle"
  </code>

</div>
