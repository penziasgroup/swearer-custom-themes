(function ($) {
  Drupal.behaviors.genScripts = {
    attach: function (context, settings) {   
        
        $('#search-glass').click(function(){
            $('.region-header').slideToggle();
        });
        
        if($('.field-name-field-photo-essay > .field-items').children().length > 1){
          $('.field-name-field-photo-essay').once('slider-pager',function(){
              $('.field-name-field-photo-essay > .field-items').before('<span class="cycle-next cycle-button"></span>');
              $('.field-name-field-photo-essay > .field-items').after('<span class="cycle-prev cycle-button"></span>');          
          });
        }

        $('.field-name-field-photo-essay > .field-items').cycle({
                slides: '> div',
                swipe: 'true',
                timeout: 0,
                prev: '.cycle-prev',
                next: '.cycle-next'
        });
        
        $('.prog-fellows-list .results-group .results').hide();
        $('.prog-fellows-list .results-group > h3').click(function(){
            $(this).toggleClass('open');
            $(this).siblings('.results').slideToggle();
        });
    }
  }
})(jQuery);