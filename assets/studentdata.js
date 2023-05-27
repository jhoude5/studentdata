require(['core/first', 'jquery', 'jqueryui', 'core/ajax'], function(core, $, bootstrap, ajax) {


  $(document).ready(function() {
    var container = $('.hidden-student-info');
    $('.show-student-info').on('click', function (e) {
      e.preventDefault();
      $(this).next('.hidden-student-info').toggle();
    });
    $(document).mouseup(function(e) {
      if (!container.is(e.target) && container.has(e.target).length === 0) {
        container.hide();
      }
    });
    $(document).on('keydown', function(e) {
      if (event.key === "Escape") {
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          container.hide();
        }
      }
    });

    // Accordion functionality
    $('.usa-accordion__button').on('keypress', function(e) {
      if(e === 13 || e === 32) {
        if($(this).attr('aria-expanded') === 'false') {
          $(this).removeClass('collapsed');
          $(this).attr('aria-expanded', 'true');
          $(this).parent().next().addClass('show');
        }
        else {
          $(this).attr('aria-expanded', 'false');
          $(this).addClass('collapsed');
          $(this).parent().next().removeClass('show');
        }
      }

    });
    $('.usa-accordion__button').on('click', function() {
      if($(this).attr('aria-expanded') === 'false') {
        $(this).removeClass('collapsed');
        $(this).attr('aria-expanded', 'true');
        $(this).parent().next().addClass('show');
      }
      else {
        $(this).attr('aria-expanded', 'false');
        $(this).addClass('collapsed');
        $(this).parent().next().removeClass('show');
      }
    });
    // Showing errors in Accordions
      $('.is-invalid').each(function() {
        if($(this).css('display') === 'block') {
          $(this).closest('.accordion-item').closest('.accordion-collapse').closest('.accordion-item').find('.usa-accordion__button').click();
        }
      });
  });

});
