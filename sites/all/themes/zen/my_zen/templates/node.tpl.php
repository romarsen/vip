<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */

?>
<article class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php if ($title_prefix || $title_suffix || $display_submitted || $unpublished || !$page && $title): ?>
    <header>
      <?php print render($title_prefix); ?>
      <?php if (!$page && $title): ?>
        <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
      <?php endif; ?>
      <?php print render($title_suffix); ?>

      <?php if ($display_submitted): ?>
        <p class="submitted">
          <?php print $user_picture; ?>
          <?php print $submitted; ?>
        </p>
      <?php endif; ?>

      <?php if ($unpublished): ?>
        <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
      <?php endif; ?>
    </header>
  <?php endif; ?>


  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    /*print render(module_invoke('yamaps', 'block_view', 'yamaps'));*/
    /*print render($block['content']);*/
    /*print render($content['block']);*/
    /*$block = module_invoke('views', 'block_view', 'galery-block')*/
    /*print render($block);*/

    print render($content);

    if ($type == 'article' && $build)
      print drupal_render($build);
    if ($type == 'article')
      print drupal_render($build_similar);

  ?>

  <div class="node-links">
    <?php print render($content['links']); ?>
  </div>

  <?php print render($content['comments']); ?>

</article>
