/*
 * jQuery Panel Slider plugin v0.0.1
 * https://github.com/eduardomb/jquery-boxslider
*/
(function($) {
  'use strict';

  var $body = $('body'),
      _sliding = false;

  function _slideIn(box, options) {
    var boxWidth = box.outerWidth(true),
        bodyAnimation = {},
        boxAnimation = {};

    if(box.is(':visible') || _sliding) {
      return;
    }

    _sliding = true;
    box.addClass('ps-active-box').css({
      position: 'fixed',
      top: 0,
      height: '100%',
      'z-index': 999999
    });
    box.data(options);

    switch (options.side) {
      case 'left':
        box.css({
          left: '-' + boxWidth + 'px',
          right: 'auto'
        });
        bodyAnimation['margin-left'] = '+=' + boxWidth;
        boxAnimation.left = '+=' + boxWidth;
        break;

      case 'right':
        box.css({
          left: 'auto',
          right: '-' + boxWidth + 'px'
        });
        bodyAnimation['margin-left'] = '-=' + boxWidth;
        boxAnimation.right = '+=' + boxWidth;
        break;
    }

    $body.animate(bodyAnimation, options.duration);
    box.show().animate(boxAnimation, options.duration, function() {
      _sliding = false;
    });
  }

  $.boxslider = function(element, options) {
    var active = $('.ps-active-box');
    var defaults = {
      side: 'left', // box side: left or right
      duration: 200, // Transition duration in miliseconds
      clickClose: true // If true closes box when clicking outside it
    };

    options = $.extend({}, defaults, options);

    // If another box is opened, close it before opening the new one
    if(active.is(':visible') && active[0] != element[0]) {
      $.boxslider.close(function() {
        _slideIn(element, options);
      });
    } else if(!active.length || active.is(':hidden')) {
      _slideIn(element, options);
    }
  };

  $.boxslider.close = function(callback) {
    var active = $('.ps-active-box'),
        duration = active.data('duration'),
        boxWidth = active.outerWidth(true),
        bodyAnimation = {},
        boxAnimation = {};

    if(!active.length || active.is(':hidden') || _sliding) {
      return;
    }

    _sliding = true;

    switch(active.data('side')) {
      case 'left':
        bodyAnimation['margin-left'] = '-=' + boxWidth;
        boxAnimation.left = '-=' + boxWidth;
        break;

      case 'right':
        bodyAnimation['margin-left'] = '+=' + boxWidth;
        boxAnimation.right = '-=' + boxWidth;
        break;
    }

    active.animate(boxAnimation, duration);
    $body.animate(bodyAnimation, duration, function() {
      active.hide();
      active.removeClass('ps-active-box');
      _sliding = false;

      if(callback) {
        callback();
      }
    });
  };

  // Bind click outside box and ESC key to close box if clickClose is true
  $(document).bind('click keyup', function(e) {
    var active = $('.ps-active-box');

    if(e.type == 'keyup' && e.keyCode != 27) {
      return;
    }

    if(active.is(':visible') && active.data('clickClose')) {
      $.boxslider.close();
    }
  });

  // Prevent click on box to close it
  $(document).on('click', '.ps-active-box', function(e) {
    e.stopPropagation();
  });

  $.fn.boxslider = function(options) {
    this.click(function(e) {
      var active = $('.ps-active-box'),
          box = $(this.getAttribute('href'));

      // Close box if it is already opened otherwise open it
      if (active.is(':visible') && box[0] == active[0]) {
        $.boxslider.close();
      } else {
        $.boxslider(box, options);
      }

      e.preventDefault();
      e.stopPropagation();
    });

    return this;
  };
})(jQuery);
// JavaScript Document