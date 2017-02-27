<?php
/**
 * @file
 * Returns the HTML for comments.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728216
 */
/*dpm($content['links']);*/
?>
<article class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <header>
    <div class="leftComment">

        <?php print $picture; ?>
        <?php /*print $submitted;*/ ?>
        <?php /*print $permalink; */?>

    </div>
    <div class="rightComment">
    <?php
      hide($content['links']);
      //print $created;
      print '<div class="username">'.$author.", ".format_date($comment->created, 'custom', 'd F, H:i').'</div>';
      // We hide the comments and links now so that we can render them later.
      print render($content);
    ?>
  </div>
  <div class="comment_links"> <?php print render($content['links']); ?> </div>

    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h3<?php print $title_attributes; ?>>
        <?php print $title; ?>
        <?php if ($new): ?>
          <mark class="new"><?php print $new; ?></mark>
        <?php endif; ?>
      </h3>
    <?php elseif ($new): ?>
      <mark class="new"><?php print $new; ?></mark>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($status == 'comment-unpublished'): ?>
      <mark class="unpublished"><?php print t('Unpublished'); ?></mark>
    <?php endif; ?>
  </header>
  

  <?php if ($signature): ?>
    <footer class="user-signature clearfix">
      <?php print $signature; ?>
    </footer>
  <?php endif; ?>

</article>
