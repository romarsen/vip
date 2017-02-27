/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {

  	$jq(document).ready(function(){

  		$jq("#block-views-all-news-front-block .view-content").mCustomScrollbar({/*setWidth: 360, */setHeight: 1150, alwaysShowScrollbar: 1, scrollInertia:0, scrollButtons:{enable: true}, mouseWheelPixels:30, advanced:{updateOnBrowserResize:true, updateOnContentResize:true}});
      $jq("#block-views-all-news-front-block-1 .view-content").mCustomScrollbar({/*setWidth: 360, */setHeight: 1150, alwaysShowScrollbar: 1, scrollInertia:0, scrollButtons:{enable: true}, mouseWheelPixels:30, advanced:{updateOnBrowserResize:true, updateOnContentResize:true}});
      $jq("#edit-created-min").datePicker({
        createButton:false,
        clickInput:true,
        startDate: '01-01-2000'
      });
      $jq("#edit-created-max").datePicker({
        createButton:false,
        clickInput:true,
        startDate: '01-01-2000'
      });

      $jq('#scrollup img').mouseover( function(){$jq( this ).animate({opacity: 0.65},100);}).mouseout( function(){$jq( this ).animate({opacity: 1},100);}).click(function(){$('body,html').animate({ scrollTop: 0 }, 800);return false;});

      $jq(window).scroll(function(){if($jq(document).scrollTop() > 0 ) {$jq('#scrollup').fadeIn('fast');} else {$jq('#scrollup').fadeOut('fast');}});
      
  	});
    // Place your code here.

  }
};


})(jQuery, Drupal, this, this.document);
