<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 */
?>
<div id="page">

  <header class="header" id="header" role="banner">

    <div class="navbar-header">
      <?php if ($logo): ?>
      <a class="logo" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" class="header__logo" id="logo"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="header__logo-image" /></a>
      <?php endif; ?>
      <div class="region-date-time">
        <div class="content"><?php echo $mon.strftime("%d, %Y %H:%M");?></div>
      </div>
      <button type="button" class="navbar-toggle"> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
        <span class="icon-bar"></span> 
      </button>
    </div>

    <div class="navbar-header-navigation">
      <div id="block-system-navigation" class="block block-system block-menu first odd" role="navigation">
        <ul class="nav_menu">
          <li class="menu__item is-leaf first leaf my-uniq-class-495"><a href="/reklama" title="" class="menu__link">Реклама</a></li>
          <li class="menu__item is-leaf leaf my-uniq-class-730"><a href="/kontakti" class="menu__link">Контакти</a></li>
          <li class="menu__item is-leaf leaf my-uniq-class-731"><a href="/povidomiti-novinu" class="menu__link">Повідомити новину</a></li>
          <li class="menu__item is-leaf leaf my-uniq-class-813"><a href="/sitemap" class="menu__link">мапа сайту</a></li>
          <li class="menu__item is-leaf last leaf my-uniq-class-814"><a href="/rss.xml" title="" class="menu__link">RSS</a></li>
        </ul>
      </div>
    </div>
    
    <?php if ($site_name || $site_slogan): ?>
      <div class="header__name-and-slogan" id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 class="header__site-name" id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" class="header__site-link" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <div class="header__site-slogan" id="site-slogan"><?php print $site_slogan; ?></div>
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <?php if ($secondary_menu): ?>
      <nav class="header__secondary-menu" id="secondary-menu" role="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </nav>
    <?php endif; ?>

    <?php print render($page['header']); ?>

  </header>


  <div id="main">
    <div id="navigation">

      <?php if ($main_menu): ?>
        <nav id="main-menu" role="navigation" tabindex="-1">
          <?php
          // This code snippet is hard to modify. We recommend turning off the
          // "Main menu" on your sub-theme's settings form, deleting this PHP
          // code block, and, instead, using the "Menu block" module.
          // @see https://drupal.org/project/menu_block
          print theme('links__system_main_menu', array(
            'links' => $main_menu,
            'attributes' => array(
              'class' => array('links', 'inline', 'clearfix'),
            ),
            'heading' => array(
              'text' => t('Main menu'),
              'level' => 'h2',
              'class' => array('element-invisible'),
            ),
          )); ?>
        </nav>
      <?php endif; ?>

      <?php print render($page['navigation']); ?>

    </div>

    <div class="content-wrapper">
      <?php
        // Render the sidebars to see if there's anything in them.
        $sidebar_first  = render($page['sidebar_first']);
        $sidebar_second = render($page['sidebar_second']);
      ?>
      
       <?php if ($sidebar_first): ?>
          <?php print $sidebar_first; ?>
      <?php endif; ?>


        <div id="content" class="column" role="main">
          <?php print render($page['highlighted']); ?>
          <?php /*print $breadcrumb;*/ ?>
          <a id="main-content"></a>
         
         
          <?php print $messages; ?>
          <?php print render($tabs); ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>
          <?php print render($page['content']); ?>
          <?php print $feed_icons; ?>
        </div>

        <?php if ($sidebar_second): ?>
          <?php print $sidebar_second; ?>
        <?php endif; ?>

    </div>
    
    <div class="after_content">
      <?php
      if ($is_front && $build_banner)
        print drupal_render($build_banner);

      if ($is_front){
        print drupal_render($build_top);
        print drupal_render($build_photo);
      }
      ?>

    </div>
       

  </div>


  <?php print render($page['footer']); ?>


</div>

<?php print render($page['bottom']); ?>
