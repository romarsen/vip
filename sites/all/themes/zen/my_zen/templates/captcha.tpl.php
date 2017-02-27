<?php
	$form['captcha_widgets']['captcha_response']['#title_display'] = 'invisible';
	$form['captcha_widgets']['captcha_response']['#description'] = '';
	$form['captcha_widgets']['captcha_response']['#attributes']['placeholder'] =  'Введіть символи';
	print drupal_render_children($form);