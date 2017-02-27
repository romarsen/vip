<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  STARTERKIT_preprocess_html($variables, $hook);
  STARTERKIT_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert variables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

function my_zen_preprocess_html(&$vars) {
// Подлкючаем Google шрифты.
  $fonts = array(
    'PT Sans' => 'https://fonts.googleapis.com/css?family=PT+Sans&subset=cyrillic,latin',
    'Roboto' => 'https://fonts.googleapis.com/css?family=Roboto&subset=cyrillic,latin',
    'Ubuntu Condensed' => 'https://fonts.googleapis.com/css?family=Ubuntu+Condensed&subset=cyrillic,latin',
  );
  
  foreach ($fonts as $fid => $font) {
    $element = array(
    '#tag' => 'link',
    '#attributes' => array(
      'href' => $font,
      'rel' => 'stylesheet',
      'type' => 'text/css',
      ),
    );
    drupal_add_html_head($element, $fid);
  }
}


function my_zen_menu_tree__navigation(&$variables) {
    return '<ul class="nav_menu">' . $variables['tree'] . '</ul>';
}

function my_zen_menu_link__navigation(array $variables) {
    $element = $variables['element'];
    $sub_menu = '';
    // Here we put our uniq class for menu links
    $element['#attributes']['class'][] = 'my-uniq-class-' . $element['#original_link']['mlid'] . '';
    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function my_zen_menu_tree__main_menu(&$variables) {
    return '<ul class="main_menu">' . $variables['tree'] . '</ul>';
}

function my_zen_menu_link__main_menu(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  if ($element['#below']) {
    foreach ($element['#below'] as $key => $val) {
      if (is_numeric($key)) {
        $element['#below'][$key]['#theme'] = 'menu_link__main_menu_inner';
      }
    }
    $sub_menu = drupal_render($element['#below']);
  }
  $element['#localized_options']['html'] = TRUE;
  $output = l($element['#title'].'<span class="caret"></span>', $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function my_zen_menu_link__main_menu_inner($variables) {
  $element = $variables['element'];
  $sub_menu = '';

 
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }


  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}


//подключаем файлы .tpl.php для форм
function my_zen_theme() {
  $items = array();
  //указываем к какой форме обращаемся
  $items['comment_form'] = array(
    'render element' => 'comment_form',
    //указываем путь к шаблону
    'path' => drupal_get_path('theme', 'my_zen') . '/templates',
    //указываем название шаблона
    'template' => 'comment-form',
  );
  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'my_zen') . '/templates',
    'template' => 'user-login',
    'preprocess functions' => array(
     'my_zen_preprocess_user_login'
     ),
  );
  $items['user_register_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'my_zen') . '/templates',
    'template' => 'user-register-form',
    'preprocess functions' => array(
     'my_zen_preprocess_user_register_form'
     ),
  );
 /* $items['user_pass'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'my_zen') . '/templates',
    'template' => 'user-pass',
    'preprocess functions' => array(
      'my_zen_preprocess_user_pass'
    ),
  );*/
  $items['views-exposed-form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'my_zen') . '/templates',
    'template' => 'views-exposed-form',
    'preprocess functions' => array(
     'my_zen_preprocess_views_exposed_form'
     ),
  );

   $items['captcha'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'my_zen') . '/templates',
    'template' => 'captcha',
    'preprocess functions' => array(
      'my_zen_preprocess_captcha'
    ),
  );

   $items['blog_node_form'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'my_zen') . '/templates',
    'template' => 'blog-node-form',
    /*'preprocess functions' => array(
      'my_zen_preprocess_captcha'
    ),*/
  );

  return $items;
}


/*перевизначення форми user login  на сторінці авто$block = $variables['block'];ризації user*/
function my_zen_form_user_login_alter(&$form, &$form_state, $form_id) {
   if ($form_id == "user_login") {
      unset($form['name']['#description']); 
      unset($form['pass']['#description']); 
      $form['name']['#attributes']['onMouseover'] =  "showhint('Введіть Ваше ім’я користувача на сайті \"vip.prostir.dp.ua\"', this, event, '150px')";
      $form['pass']['#attributes']['onMouseover'] =  "showhint('Введіть пароль, що відповідає вашому імені користувача.', this, event, '150px')";
      $form['name']['#title'] = t("Ім'я користувача");
      $form['ulogin']['#suffix'] = '<h2 class="form-title">Введіть свої дані для входу на сайт</h2>';
   }
}


function my_zen_form_user_register_form_alter(&$form, &$form_state, $form_id) {
   if ($form_id == "user_register_form") {
      $form['actions']['submit']['#value'] = t("Створення нового користувача");
      $form['account']['name']['#attributes']['onMouseover'] =  "showhint('Дозволено пробіли; заборонено знаки пунктуації за винятком крапок, дефісів, апострофів і символів підкреслення.', this, event, '150px')";
      $form['account']['mail']['#attributes']['onMouseover'] =  "showhint('Дійсна адреса електронної пошти. Усі повідомлення з сайту будуть надсилатися на цю адресу. Її не буде оприлюднено та буде використано лише за Вашим бажанням для отримання нового паролю або новин чи сповіщень електронною поштою.', this, event, '150px')";
      unset($form['account']['name']['#description']); 
      unset($form['account']['mail']['#description']); 
      unset($form['account']['pass']['#description']);

   }
}

function my_zen_form_alter(&$form, &$form_state, $form_id) {
 
  if ($form_id == 'search_block_form') {
 
    $deftext = t('Введіть запит');

    $form['search_block_form']['#size'] = 30;  
    $form['search_block_form']['#default_value'] = $deftext; 
    $form['actions']['submit']['#value'] = t('Знайти'); 
 
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = '".$deftext."';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == '".$deftext."') {this.value = '';}";
  }
  if ($form_id == 'search_form') {
 
    $deftext = t('Введіть запит');

    $form['search_block_form']['#size'] = 40;  
    $form['search_block_form']['#default_value'] = $deftext; 
    $form['actions']['submit']['#value'] = t('Знайти'); 
 
    $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = '".$deftext."';}";
    $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == '".$deftext."') {this.value = '';}";
  }
  if ($form_id == 'views_exposed_form') {
     /*dsm($form);*/
     $form['created']['min']['#attributes']['placeholder'] = t('Від');
     $form['created']['max']['#attributes']['placeholder'] = t('До');
  }

  if ($form_id == 'blog_node_form') {
    /*dsm($form);*/
    hide($form['actions']['preview']);
    $form['title']['#title'] = 'Заголовок';
    $form['body']['und'][0]['#title'] = 'Запис у блозі';
  }

  if ($form_id == 'article_node_form') {
    /*dsm($form);*/
    hide($form['actions']['preview']);
    $form['title']['#title'] = 'Заголовок';
    $form['body']['und'][0]['#title'] = 'Новина';
  }

  if ($form_id == 'user_profile_form') {
    hide($form['locale']);
    hide($form['block']);
    hide($form['contact']);
    hide($form['timezone']);
  }

}

function my_zen_preprocess_page(&$variables) {
  /*встановлює поточний час в header сторінок*/
    $variables['ar'] = Array
    (
      '01'=>"Січ.",
      '02'=>"Лют.",
      '03'=>"Бер.",
      '04'=>"Кві.",
      '05'=>"Тра.",
      '06'=>"Чер.",
      '07'=>"Лип.",
      '08'=>"Сер.",
      '09'=>"Вер.",
      '10'=>"Жов.",
      '11'=>"Лис.",
      '12'=>"Гру.",
    );

    $variables['mon']=$variables['ar'] [strftime('%m')];
    global $user;

    if($user->uid == 0 && request_uri() == "/user") {
        $variables['title']='АВТОРИЗАЦІЯ';
        $variables['tabs']['#primary'][0]['#link']['title']='Створення нового користувача';
    }

     if($user->uid == 0 && request_uri() == "/user/register") {
        $variables['title']='РЕЄСТРАЦІЯ';
        $variables['tabs']['#primary'][0]['#link']['title']='Створення нового користувача';
    }

    if(arg(0) == "search") {
      $variables['title']='Результат пошуку';
    } 

    if(arg(0) == "news") {
      $variables['title']='Новини';
    } 

    if(arg(0) == "archive") {
      $variables['title']='Архів';
    } 

    if(arg(0) == "user" && arg(2) == 'news') {
      $variables['title']='Мої новини';
    } 

    $node = menu_get_object();
    $variables['news_time'] = '';
    $variables['share'] = '';
    if (isset($node->nid) && ($node->type == 'article' || $node->type == 'blog')) {
      $variables['share'] = '<script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
      <script src="//yastatic.net/share2/share.js"></script>
      <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter" data-access-token:facebook="fb-token" data-access-token:facebook="fb-token"></div>';
      $variables['news_time'] = '<div class="polosa"><div class="news_time">'.date('d.m.Y H:i', $node->created).'</div><div class="yashare">'.$variables['share'].'</div></div>';
      $variables['share_in_blog'] = '<div class="share_in_blog">'.$variables['share'].'</div>';
    }

    $variables['block'] = block_load('simpleads', 'ad_groups_34');
    $variables['block_content'] = _block_render_blocks(array($variables['block']));
    $variables['build_banner'] = _block_get_renderable_array($variables['block_content']);

    $variables['block'] = block_load('views', 'front_blocks-block_4');
    $variables['block_content'] = _block_render_blocks(array($variables['block']));
    $variables['build_top'] = _block_get_renderable_array($variables['block_content']);

    $variables['block'] = block_load('views', 'photo_report-block');
    $variables['block_content'] = _block_render_blocks(array($variables['block']));
    $variables['build_photo'] = _block_get_renderable_array($variables['block_content']);


}


function my_zen_preprocess_node(&$vars) {
  switch($vars['type']) {

      case 'article':
        // if the type of the node is a article, include this:
        $vars['block'] = block_load('views', 'galery-block');
        $vars['block_content'] = _block_render_blocks(array($vars['block']));
        $vars['build'] = _block_get_renderable_array($vars['block_content']);

        $vars['block'] = block_load('views', 'similar_content-block');
        $vars['block_content'] = _block_render_blocks(array($vars['block']));
        $vars['build_similar'] = _block_get_renderable_array($vars['block_content']);

        $vars['content']['links']['comment']['#links']['comment-add'] = array(
        'title' => 'Додати новий коментар',
        'attributes' => array(
          'title' => 'Поділіться своїми думками та поглядами з приводу цього допису'),
        'href' => $vars['node_url'],
        'fragment' => 'comment-form',
        );
        break;
  }

}


function my_zen_preprocess_captcha(&$vars) {
  /*if ($vars['element']['#captcha_type'] == 'image_captcha/Image' && isset($vars['element']['captcha_widgets'])) {*/
  /* $q=$vars['element']['captcha_widgets']['captcha_response']['#title'];*/
  /*$vars['element']['captcha_widgets']['captcha_response']['#attributes']['placeholder'] =  $vars['element']['captcha_widgets']['captcha_response']['#title'];*/
    /*$vars['element']['captcha_widgets']['captcha_response']['#field_prefix'] = drupal_render($vars['element']['captcha_widgets']['captcha_image']);
    $vars['element']['captcha_widgets']['captcha_image']['#access'] = FALSE;*/
  //}

}

function my_zen_pager_link($variables) {
  $text = $variables['text'];
  $page_new = $variables['page_new'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $attributes = $variables['attributes'];

  

  $page = isset($_GET['page']) ? $_GET['page'] : '';
  if ($new_page = implode(',', pager_load_array($page_new[$element], $element, explode(',', $page)))) {
    $parameters['page'] = $new_page;
  }

  $query = array();
  if (count($parameters)) {
    $query = drupal_get_query_parameters($parameters, array());
  }
  if ($query_pager = pager_get_query_parameters()) {
    $query = array_merge($query, $query_pager);
  }

  // Set each pager link title
  if (!isset($attributes['title'])) {
    static $titles = NULL;
    if (!isset($titles)) {
      $titles = array(
        t('« first') => t('Go to first page'),
        t('‹ previous') => t('Go to previous page'),
        t('next ›') => t('Go to next page'),
        t('last »') => t('Go to last page'),
      );
    }
    if (isset($titles[$text])) {
      $attributes['title'] = $titles[$text];
    }
    elseif (is_numeric($text)) {
      $attributes['title'] = t('Go to page @number', array('@number' => $text));
    }
  }

  // @todo l() cannot be used here, since it adds an 'active' class based on the
  //   path only (which is always the current path for pager links). Apparently,
  //   none of the pager links is active at any time - but it should still be
  //   possible to use l() here.
  // @see http://drupal.org/node/1410574
  if ($page_new == '#') {
    $attributes['href'] = '#';
    unset($attributes['title']);
  }
  else {
    $attributes['href'] = url($_GET['q'], array('query' => $query));
  }
  return '<a' . drupal_attributes($attributes) . '>' . check_plain($text) . '</a>';
}

function my_zen_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('pager-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('pager-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => theme('pager_link', array('text' => $i, 'page_new' => '#', 'element' => $element, 'parameters' => $parameters)),
            /*'data' => $i,*/
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('pager-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('pager-last'),
        'data' => $li_last,
      );
    }
    return theme('item_list', array(
  'items' => $items,
  'attributes' => array('class' => array('pagination')),
));
  }
}