<?php
/**
 * @file
 * Returns the HTML for a wrapping container around comments.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728230
 */
// Render the comments and form first to see if we need headings.
$comments = render($content['comments']);
$comment_form = render($content['comment_form']);
?>
<section id="comments" class="comments <?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($comments && $node->type != 'forum'): ?>
    <h2 class="comments__title title"><?php print t('Comments').'   '.$node->comment_count; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  
  <?php if ($comment_form): ?>
    <!--<h2 class="comments__form-title title comment-form"><?php print t('КОМЕНТАРІ  ').$node->comment_count; ?></h2>-->
    
    <?php print $comment_form; ?>

  <?php endif; ?>

  <?php print $comments; ?>

</section>
