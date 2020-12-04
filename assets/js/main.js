/*  ---------------------------------------------------
    Theme Name: Azenta
    Description:
    Author:
    Author URI:
    Version: 1.0
    Created:
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
    Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    $(".table_adminLA").DataTable({
      "lengthChange": true,
      "pageLength":10,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });

    $(".table_adminLA1").DataTable({
      "lengthChange": true,
      "pageLength":10,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });

    $(".table_adminLA2").DataTable({
      "lengthChange": true,
      "pageLength":10,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });
    // this is for subscription email
    $(".table_adminLA3").DataTable({
      "lengthChange": true,
      "pageLength":10,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });

    // this is for subscription email
    $(".table_adminLA4").DataTable({
      "lengthChange": true,
      "pageLength":10,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });
    // this is for message to agent
    $(".table_adminLA5").DataTable({
      "lengthChange": true,
      "pageLength":10,
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]]
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    $(".canvas-open").on('click', function () {
        $(".offcanvas-menu-wrapper").addClass("show-offcanvas-menu-wrapper");
        $(".offcanvas-menu-overlay").addClass("active");
    });


    $(".canvas-close, .offcanvas-menu-overlay").on('click', function () {
        $(".offcanvas-menu-wrapper").removeClass("show-offcanvas-menu-wrapper");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*------------------
		Navigation
	--------------------*/
    // $(".mobile-menu").slicknav({
    //     prependTo: '#mobile-menu-wrap',
    //     allowParentLinks: true
    // });

    /*------------------
		Menu Hover
	--------------------*/
    // $(".header-section .top-nav .main-menu ul li").on('mousehover', function () {
    //     $(this).addClass('active');
    // });
    // $(".header-section .top-nav .main-menu ul li").on('mouseleave', function () {
    //     $('.header-section .top-nav .main-menu ul li').removeClass('active');
    // });


    /*------------------
        Nice Select
    --------------------*/
    // $('select').niceSelect();

    /*-------------------
		Range Slider
    --------------------- */
    //price 1

    // $('#priceRange').jRange({
    //     from: 0,
    //     to: 100000000,
    //     step: 50000,
    //     scale: [0,100000,500000,1000000,5000000,10000000,50000000,100000000],
    //     format: '%s Frw',
    //     width: 500,
    //     showLabels: true,
    //     isRange : true,
    //     theme: "theme-blue",
    //     onstatechange: function(){
    //            $('#priceRange').change();
    //         }
    // });
    
    
    $("#price-range").slider({
        range: true,
        min: 0,
        max: 500000000,
        values: [0,250000000],
        slide: function (event, ui) {
            
            $("#priceRange").val("[" + Number((ui.values[0]).toFixed(1)).toLocaleString() + "-" + Number((ui.values[1])).toLocaleString() + "]" + "Frw");
            $('#priceRange').change();
        }
    });
    $("#priceRange").val("[" + $("#price-range").slider("values", 0) + "-" + Number($("#price-range").slider("values", 1)).toLocaleString() + "]" + "Frw");
  

$('#priceRange').change(function(){
       var price_range = $('#priceRange').val();
       var user_id = $('.price_range-user_id').val();

         $.ajax({
             type: 'POST',
             url: 'core/ajax_db/house_add.php',
             data:'price_range='+price_range+'&user_id='+user_id+'&pages=1',
             beforeSend: function () {
                 $('.property-list').css("opacity", ".5");
             },
             success: function (html) {
                 $('.property-list').html(html);
                 $('.property-list').css("opacity", "");
             }
         });

 });

 $("#price-range_").slider({
  range: true,
  min: 0,
  max: 500000000,
  values: [0,250000000],
  slide: function (event, ui) {
      
      $("#priceRange_").val("[" + Number((ui.values[0]).toFixed(1)).toLocaleString() + "-" + Number((ui.values[1])).toLocaleString() + "]" + "Frw");
      $('#priceRange_').change();
  }
});
$("#priceRange_").val("[" + $("#price-range_").slider("values", 0) + "-" + Number($("#price-range_").slider("values", 1)).toLocaleString() + "]" + "Frw");


 
$('#priceRange_').change(function(){
       var price_range = $('#priceRange_').val();
       var user_id = $('.price_range-user_id').val();

         $.ajax({
             type: 'POST',
             url: 'core/ajax_db/propertyView_range.php',
             data:'price_range='+price_range+'&user_id='+user_id+'&pages=1',
             beforeSend: function () {
                 $('.property-list').css("opacity", ".5");
             },
             success: function (html) {
                 $('.property-list').html(html);
                 $('.property-list').css("opacity", "");
             }
         });

 });
 
/* BoxWidget()
 * ======
 * Adds box widget functions to boxes.
 *
 * @Usage: $('.my-box').boxWidget(options)
 *         This plugin auto activates on any element using the `.box` class
 *         Pass any option as data-option="value"
 */


  
    /*-------------------
		Agent Slider
    --------------------- */
    $(".agent-carousel").owlCarousel({
      items: 4,
      dots: false,
      // autoplay: true,
      margin: 0,
      loop: true,
      smartSpeed: 1200,
      nav: true,
      navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
      responsive: {
          320: {
              items: 1,
          },
          768: {
              items: 2,
          },
          992: {
              items: 3,
          },
          1200: {
              items: 4,
          }
      }
  });

   /*-------------------
		Properties Slider
    --------------------- */
    $(".top-properties-carousel").owlCarousel({
      items: 1,
      dots: false,
      autoplay: true,
      margin: 0,
      loop: true,
      smartSpeed: 2000,
      nav: true,
      navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
  });

   /*------------------
        Magnific Popup
    --------------------*/
    $('.video-popup').magnificPopup({
      type: 'iframe'
  });



})(jQuery);

+function ($) {
    'use strict';
  
    var DataKey = 'lte.cardwidget';
  
    var Default = {
      animationSpeed : 500,
      collapseTrigger: '[data-widget="collapse"]',
      removeTrigger  : '[data-widget="remove"]',
      collapseIcon   : 'fa-minus',
      expandIcon     : 'fa-plus',
      removeIcon     : 'fa-times'
    };
  
    var Selector = {
      data     : '.card',
      collapsed: '.collapsed-box',
      header   : '.card-header',
      body     : '.card-body',
      footer   : '.card-footer',
      tools    : '.card-tools'
    };
  
    var ClassName = {
      collapsed: 'collapsed-box'
    };
  
    var Event = {
          collapsing: 'collapsing.cardwidget',
          collapsed: 'collapsed.cardwidget',
          expanding: 'expanding.cardwidget',
          expanded: 'expanded.cardwidget',
          removing: 'removing.cardwidget',
          removed: 'removed.cardwidget'        
      };
  
    // BoxWidget Class Definition
    // =====================
    var BoxWidget = function (element, options) {
      this.element = element;
      this.options = options;
  
      this._setUpListeners();
    };
  
    BoxWidget.prototype.toggle = function () {
      var isOpen = !$(this.element).is(Selector.collapsed);
  
      if (isOpen) {
        this.collapse();
      } else {
        this.expand();
      }
    };
  
    BoxWidget.prototype.expand = function () {
      var expandedEvent = $.Event(Event.expanded);
      var expandingEvent = $.Event(Event.expanding);
      var collapseIcon  = this.options.collapseIcon;
      var expandIcon    = this.options.expandIcon;
  
      $(this.element).removeClass(ClassName.collapsed);
  
      $(this.element)
        .children(Selector.header + ', ' + Selector.body + ', ' + Selector.footer)
        .children(Selector.tools)
        .find('.' + expandIcon)
        .removeClass(expandIcon)
        .addClass(collapseIcon);
  
      $(this.element).children(Selector.body + ', ' + Selector.footer)
        .slideDown(this.options.animationSpeed, function () {
          $(this.element).trigger(expandedEvent);
        }.bind(this))
        .trigger(expandingEvent);
    };
  
    BoxWidget.prototype.collapse = function () {
      var collapsedEvent = $.Event(Event.collapsed);
      var collapsingEvent = $.Event(Event.collapsing);
      var collapseIcon   = this.options.collapseIcon;
      var expandIcon     = this.options.expandIcon;
  
      $(this.element)
        .children(Selector.header + ', ' + Selector.body + ', ' + Selector.footer)
        .children(Selector.tools)
        .find('.' + collapseIcon)
        .removeClass(collapseIcon)
        .addClass(expandIcon);
  
      $(this.element).children(Selector.body + ', ' + Selector.footer)
        .slideUp(this.options.animationSpeed, function () {
          $(this.element).addClass(ClassName.collapsed);
          $(this.element).trigger(collapsedEvent);
        }.bind(this))
        .trigger(collapsingEvent);
    };
  
    BoxWidget.prototype.remove = function () {
      var removedEvent = $.Event(Event.removed);
      var removingEvent = $.Event(Event.removing);
  
      $(this.element).slideUp(this.options.animationSpeed, function () {
        $(this.element).trigger(removedEvent);
        $(this.element).remove();
      }.bind(this))
      .trigger(removingEvent);
    };
  
    // Private
  
    BoxWidget.prototype._setUpListeners = function () {
      var that = this;
  
      $(this.element).on('click', this.options.collapseTrigger, function (event) {
        if (event) event.preventDefault();
        that.toggle($(this));
        return false;
      });
  
      $(this.element).on('click', this.options.removeTrigger, function (event) {
        if (event) event.preventDefault();
        that.remove($(this));
        return false;
      });
    };
  
    // Plugin Definition
    // =================
    function Plugin(option) {
      return this.each(function () {
        var $this = $(this);
        var data  = $this.data(DataKey);
  
        if (!data) {
          var options = $.extend({}, Default, $this.data(), typeof option == 'object' && option);
          $this.data(DataKey, (data = new BoxWidget($this, options)));
        }
  
        if (typeof option == 'string') {
          if (typeof data[option] == 'undefined') {
            throw new Error('No method named ' + option);
          }
          data[option]();
        }
      });
    }
  
    var old = $.fn.boxWidget;
  
    $.fn.boxWidget             = Plugin;
    $.fn.boxWidget.Constructor = BoxWidget;
  
    // No Conflict Mode
    // ================
    $.fn.boxWidget.noConflict = function () {
      $.fn.boxWidget = old;
      return this;
    };
  
    // BoxWidget Data API
    // ==================
    $(window).on('load', function () {
      $(Selector.data).each(function () {
        Plugin.call($(this));
      });
    });

  

  }(jQuery);
  
  

jQuery(document).ready(function($){
    // Get current path and find target link
    // window.location.href returns the href (URL) of the current page
    // window.location.hostname returns the domain name of the web host
    // window.location.pathname returns the path and filename of the current page
    // var path = window.location.pathname.split("/").pop();
    var path = window.location.href;
    
    // Account for home page with empty path
    if (path == '' ) {
      path = path;
    }
    var target = $('nav a[href="'+path+'"]');
    // Add active class to target link
    target.addClass('active');

  });

/* //  togglePopup ( ); // Hide them to start. */
function togglePopup ( ) {
    // let disabler = document.getElementById('disabler');
    // disabler.style.display = disabler.style.display ? '' : 'none';

    // let popup = document.getElementById('popupEnd');
    // popup.style.display = popup.style.display ? '' : 'none';

    var disabler = document.getElementById('disabler');
        if (disabler.style.display) {
        disabler.style.display = '';
        } else {
        disabler.style.display = 'none';
        }

    var popup = document.getElementById('popupEnd');
        if (popup.style.display) {
        popup.style.display = '';
        } else {
        popup.style.display = 'none';
        }

        $('#province').attr('id', 'provincecode');
        $('#district').attr('id', 'districtcode');
        $('#sector').attr('id', 'sectorcode');
        $('#cell').attr('id', 'codecell');
}