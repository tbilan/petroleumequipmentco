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
// - https://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
Drupal.behaviors.my_custom_behavior = {
  attach: function(context, settings) {

var themePath = $.parseJSON($('#theme-path').text());
  function _preload(arrayOfImages) {
    $(arrayOfImages).each(function(){
      var x = $('<img/>')[0].src = this;
    });
  }
  _preload([
    themePath + '/images/menugrad.png',
    themePath + '/images/menugrad-hover.jpg',
    themePath + '/images/menusep.png',
    themePath + '/images/menusep-left.jpg',
    themePath + '/images/menusep-right.jpg'
    ]);
  }
};


})(jQuery, Drupal, this, this.document);
