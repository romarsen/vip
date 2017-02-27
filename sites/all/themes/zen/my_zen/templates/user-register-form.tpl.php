<?php
	/*print '<pre>';
	print_r(dsm($form));
	print '</pre>';*/
	dsm($form);
	
	/*print drupal_render($form['account']['name']);
	print drupal_render($form['account']['mail']);
	print drupal_render($form['account']['pass']);
	print drupal_render($form['form_build_id']);
	print drupal_render($form['form_id']);
	print drupal_render($form['captcha']);
	print drupal_render($form['actions']['submit']);*/


	print drupal_render_children($form);