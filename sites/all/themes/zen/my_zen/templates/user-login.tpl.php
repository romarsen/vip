<?php
	/*print '<pre>';
	print_r(dsm($form));
	print '</pre>';*/
	print drupal_render($form['ulogin']);
	print drupal_render($form['name']);
	print drupal_render($form['pass']);
	print drupal_render($form['form_build_id']);
	print drupal_render($form['form_id']);
	print drupal_render($form['captcha']);
	print drupal_render($form['actions']['submit']);
	/*print drupal_render_children($form);*/

