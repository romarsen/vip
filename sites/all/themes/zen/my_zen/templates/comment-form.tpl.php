<?php
//dpm($comment_form);
hide($comment_form['actions']['preview']);
$comment_form['actions']['submit']['#value'] = 'Зберегти';
hide($comment_form['comment_body'][LANGUAGE_NONE][0]['format']);
//$comment_form['comment_body'][LANGUAGE_NONE][0]['value']['#title_display'] = 'none';
$comment_form['comment_body'][LANGUAGE_NONE][0]['value']['#title'] = 'Коментар';
$comment_form['author']['_author']['#title'] = 'Ваше ім\'я';
//$comment_form['field_yior_name'][LANGUAGE_NONE][0]['value']['#title'] = 'Ваше ім\'я';

print drupal_render_children($comment_form);