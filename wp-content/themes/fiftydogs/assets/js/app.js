!(function ($) {

  /**
   * Modules
   */
  var app = {}

  /**
   * Mini Helper Objects
   */
  var _w = {}, // Window
      _s = {}; // Screen

  /**
   * Module Properties
   *
   * config
   * data
   * $el
   * 
   */
  app = {

    // Config
    config : {
      environment : window.location.href.match(/(localhost)/g) ? 'development' : 'production',
      debug : window.location.href.match(/(localhost)/g) ? true : false
    },

    // Data
    data : {
      temp : null,
      binds : {}
    },

    // URLs
    urls : {
      social : {
        facebook : '',
        twitter : '',
        youtube : '',
        instagram : '',
        pinterest : '/'
      },

    },

    // Public Keys
    keys : {
      addthis : 'ra-536cbe5438ea26f8'
    },

    // Console (Client)
    console : {
      color : {
        'error'     : '#da1a1a',
        'event'     : '#3d8627',
        'function'  : '#3db330',
        'callback'  : '#6c6c6c',
        'object'    : '#ac07db',
        'animation' : '#c3028f',
        'control'   : '#d2a946',
        'plugin'    : '#e734d0',
        'waypoint'  : '#4e77c1',
        'hash'      : '#ad74ed',
        'number'    : '#1c1c1c',
      }
    },

    // Supports
    supports : {

    },

    // Body Classes
    classes : {
      modal_overlay : 'app--modal-overlay',
    },

    // Elements
    $el : {
      body : $('body'),
      container : $('#app'),

      header : $('#header'),

      menu : {
        header : $('.header__menu'),
      },

      nav : {
        dropdown  : $('#nav-dropdown')
      },

      modals : {
        control : $('*[data-control-modal]'),
        modal : $('.modal'),
        bay : $('#modals'),
        close : $('.modal--close')
      },

      loader : $('#loader'),

      slider : {
        basic    : $('.slider--basic'),
        gallery  : $('.slider--gallery'),
        carousel : $('.slider--carousel'),
        framed   : $('.slider--framed'),
      }
    },

    // Flags
    flag : {
      animating : false
    },

    // Debug 
    debug : {
      events : {
        'window' : {
          scroll : false,
          resize : false,
          orientationchange : false
        },
        'DOM' : {
          ready : true
        }
      }
    }

  };



  /**
   * Init
   */
  app.init = function () {
    
    // Basics 
    this.events()
    this.modals.init()

    // Plugins 
    this.plugins.init()

    // Animations
    this.animations.init()
    this.scroller.init()
    this.waypoints.init()

    // Compatibility
    this.compatibility.init()

    // App specific
    this.navDropdown.init()
    this.tabs.init()
    this.slideTabs()

  }


  /**
   * Tabs
   * @depency animate.css
   */
  app.tabs = {


    $el : {
      container : $('.stat-tabs')
    },

    init: function() {
      this.events()
    },

    events: function() {
    
      /**
       * Simple tabs
       */    
      // $(document).delegate('.tab__trigger', 'click', function (event) {
      //   event.preventDefault();

      //   var $this         = $(this),
      //       tab_active    = $this.data('tab-trigger'),
      //       container     = $this.parent().siblings('.tabs-container');
      //       // tab_container = $('.section-tabs .tabs-container');

      //   if (!$(this).hasClass('active')) {

      //     container.find('.tab--open').removeClass('tab--open fadeInRight')
      //     $(tab_active).addClass('tab--open animated animated-duration-500 fadeInRight');
             
      //     $('.tabs-menu').find('.active').removeClass('active');
      //     $(this).addClass('active');


      //     // Mobile
      //     $('.tabs-menu .next').removeClass('next');
      //     $('.tabs-menu .prev').removeClass('prev');
      //     $(this).next().addClass('next');
      //     $(this).prev().addClass('prev');

      //   } else {

      //     // $('.tabs-container .tab__content--open').removeClass('tab__content--open fadeInRight');
      //     // $(this).removeClass('active');
      //   }
      // });      



      /**
       * Program Detail tabs
       */
      // $(document).delegate('.tab-nav__item', 'click', function (event) {
      $('.tab-nav__item').click(function (event) {
        event.preventDefault();

        var $this         = $(this),
            tab_nav       = $this.parent('.tab-nav'),
            tab_active    = $this.data('tab-trigger'),
            container     = $this.parent().siblings('.tabs-container');
            // tab_container = $('.section-tabs .tabs-container');

        if (!$(this).hasClass('active')) {

          // if ( app.config.debug ) console.log('%cEVENT', 'color:'+app.console.color.event, '- Clicked tab-nav__item')
            
          container.find('.tab--open').removeClass('tab--open fadeIn')
          $(tab_active).addClass('tab--open animated animated-duration-500 fadeIn');
             
          $('.tab-nav').find('.active').removeClass('active');
          $(this).addClass('active');


          // Mobile
          // $('.tab-nav .next').removeClass('next');
          // $('.tab-nav .prev').removeClass('prev');
          // $(this).next().addClass('next');
          // $(this).prev().addClass('prev');
          // 
          if ( isMobile() ) {
            if( tab_nav.hasClass('tab-nav--open') ) {
              tab_nav.removeClass('tab-nav--open')
            }
          }

        } else {

          // $('.tabs-container .tab__content--open').removeClass('tab__content--open fadeInRight');
          // $(this).removeClass('active');
        }
      })
      

      // if ( isMobile() ) {
        $(document).delegate('.tab-nav__header', 'click', function (event) {
          event.preventDefault();

          $this   = $(this),
          tab_nav = $this.parents('.tab-nav');

          tab_nav.toggleClass('tab-nav--open');

        })


        $('.tab-nav__header').click(function() {

        });
      // }


      /**
       * Mobile 
       */
      // Close tab-nav by clicking outside of it
      $(document).delegate('.section-tabs--fade', 'click', function (event) {

        event.preventDefault()

        var $this   = $(this)
        var tabNav  = $this.children('.tab-nav')

        if ( !$(event.target).closest('.tab-nav').length && tabNav.hasClass('tab-nav--open') ) {
        // if ( !$(event.target).closest('.tab-nav__item').length && !$(event.target).closest('.tab-nav__toggle').length ) {
          console.log('CLOSE: clicked outside of tab-nav')
          tabNav.removeClass('tab-nav--open')
        }
      })

      // Toggle tab-nav open by clicking on it (mobile)
      $(document).delegate('.tab-nav', 'click', function (event) {
        
        event.preventDefault()

        var $this   = $(this)

        if ( !$(event.target).closest('.tab-nav__item').length && !$(event.target).closest('.tab-nav__toggle').length ) {
          // Clicked outside of tab-nav__item
          $this.toggleClass('tab-nav--open')
        }
      })

    }


  }
  
  /**
   * Slides (Sliding Tabs)
   */
  app.slideTabs = function() {

    // Default Action
    $('.slide').hide();

    // Refactoring for multiple tabs on same page
    $('.slides-nav').each( function(index) {
      $(this).children('li:first').addClass('active').show();
      $(this).siblings('.slides').find('.slide:first').show();
    })

    $('.slides-nav li').click(function (event, i) {
      event.preventDefault();

      if ( app.config.debug ) console.log('%cEVENT', 'color:'+app.console.color.event, '- Clicked .slides-nav li')

      var index           = $(this).index(),
          normalizedIndex = index + 1,
          slideContainer   = $(this).parent().parent('.slides-container'),
          slideMenu        = $(this).parent().find('li'),
          slideContent     = slideContainer.find('.slide'),
          slideFirst       = slideContainer.data('tab-first');


      /**
       * If two slide are on page (mobile)
       */
      // if( slideFirst ) {
        slideContainer.attr('data-active-tab', ''+ normalizedIndex +'')
      // }
      // else {
      //   slideContainer.attr('data-active-tab', ''+ normalizedIndex +'')
      // }
      
      /**
       * Mobile tab 'prev','next' classes
       */
      slideMenu.removeClass('active');
      slideMenu.removeClass('prev');
      slideMenu.removeClass('next');
      $(this).removeClass('next');
      $(this).next().addClass('next');
      $(this).prev().addClass('prev');
      $(this).addClass('active');

      slideContent.hide();
      var activeTab = $(this).find('a').attr('href'),
          slide      = slideContainer.find('.tab')

      slide.addClass('animated fadeOutLeft')
      $(activeTab).fadeIn().removeClass('fadeOutLeft').addClass('fadeInRight');

      // if ( $(window).width() < 768 || App.helpers.isUserAgent().mobile ) {
      //   $('.slide__menu').each( function(index) {
      //     $(this).children('li').removeClass('next')
      //     $(this).children('li').removeClass('prev')
      //   })
      //   $(this).next().addClass('next');
      //   $(this).prev().addClass('prev');
      // }

      return false;
    });
  }

  /**
   * Nav Dropdown
   */
  app.navDropdown = {

    $el : {
      toggle : $('#header__toggle'),
      // close : $('.nav-dropdown__close'),
      container : app.$el.menu.header
    },

    init: function() {

      this.events()
    },

    events: function() {

      var _this = app.navDropdown;

      $(document).delegate('#header__toggle', 'click', function (event) {
        event.preventDefault()

        $(this).toggleClass('header__toggle--x')
        $(this).siblings('.header__menu').toggleClass('header__menu--show')
        $('#header').toggleClass('header--open')
        // _this.$el.container.addClass('show')



        // Close if click outside container
        // $(document).on('click', function (event) {
        //   if (!_this.$el.container.is(event.target) && _this.$el.container.has(event.target).length === 0) {
        //     _this.$el.container.removeClass('show')
        //   }
        // })

        event.stopPropagation()
      })

      // $(document).delegate('.nav-dropdown__close', 'click', function (event) {
      //   event.preventDefault()

      //   app.$el.nav.dropdown.removeClass('show')
      // })
    }


  }





  /**
   * Plugins
   */
  app.plugins = {

    /**
     * Plugin object name 
     * @example (window.<NAME>)
     */
    plugin : [
      { name : 'flexslider', jquery : true },
      { name : 'WOW' },
    ],


    /**
     * Init
     */
    init: function() {

      this.flexslider()
      // this.polyfills()

    },


    /**
     * Flexslider
     */
    flexslider: function() {

      var _this = app.plugins;

      // if ( !$.flexslider ) return false;

      /**
       * Slider Options
       * @type {Object}
       */
      var options = {
        // Basic (Default)
        basic : {
          animation: 'slide',
          animationLoop: false,
          slideshow: false,
          prevText: '',
          nextText: '',
          init: function(slide) {
            app.$el.slider.basic.addClass('show')
            if ( slide.count < 2 ) this.directionNav = false;

            if ( isMobile() ) {
              this.touch = false;  
            }
          }
        },

        // Gallery (used with carousel as controlNav )
        gallery : {
          animation: 'slide',
          animationLoop: false,
          slideshow: false,
          direction: 'horizontal', // vertical not working in init
          directionNav: false,
          animationSpeed: 500,
          prevText: '',
          nextText: '',
          sync: $('.slider--gallery-nav'),
          init: function(slide) {
            app.$el.slider.gallery.addClass('show')
            if ( slide.count < 2 ) {
              this.directionNav = false;
              $('.slider--carousel').hide()
            }
            // Turn on direction nav for mobile
            if ( isMobile() ) {
              // this.direction    = 'horizontal'; // doesnt work
              this.directionNav = true;
            }
          }
        },

        // Carousel (controlNav for gallery)
        carousel : {
          animation: 'slide',
          controlNav: false,
          direction: 'vertical',
          directionNav: false,
          animationLoop: false,
          slideshow: false,
          prevText: '',
          nextText: '',
          asNavFor: '#slider-gallery',
          init: function(slide) {
            app.$el.slider.carousel.addClass('show')
          }
        },

        // Framed
        framed : {
          animation: 'slide',
          animationLoop: false,
          slideshow: false,
          controlNav: false,
          prevText: '',
          nextText: '',
          init: function(slide) {
            app.$el.slider.framed.addClass('show')
            if ( slide.count < 2 ) this.directionNav = false;
          }
        }

      }


      /**
       * Event Listener: window onload
       */
      window.addEventListener('load', function (event) {
        
        // app.$el.slider.basic.flexslider( options['basic'] )

        // app.$el.slider.gallery.flexslider( options['gallery'] )
        
        // app.$el.slider.carousel.flexslider( options['carousel'] )
        
        // app.$el.slider.framed.flexslider( options['framed'] )

      })

    },

    /**
     * Polyfills
     */
    polyfills: function() {

      // Object-fit
      objectFit.polyfill({
        selector: '.slide__bg img', // this can be any CSS selector
        fittype: 'cover',           // either contain, cover, fill or none
        // disableCrossDomain: 'true'  // either 'true' or 'false' to not parse external CSS files.
      })
    },


  }





  /**
   * Events
   */
  app.events = function () {


    /**
     * FAQs
     */
    $(document).delegate('.faq__question', 'click', function (event) {
      event.preventDefault()
      
      var $this = $(this),
          item  = $this.parents('.faq')

      item.toggleClass('faq--open')

      // Do stuff
      if ( app.config.debug ) console.log('%cEVENT', 'color:'+app.console.color.event, '- Clicked FAQ')

    })

  }









  /**
   * Modals
   */
  app.modals = {

    init: function() {

      var modal = app.$el.modals.modal;

      // Move all modals on page into modal bay
      modal.appendTo(app.$el.modals.bay)

      // Bind events
      this.events()
    },

    events: function() {

      var _this = app.modals;

      // Click event
      $(document).delegate(app.$el.modals.control.selector, 'click', function (event) {
        event.preventDefault()

        var modalID   = $(this).data('control-modal'),
            videoURL  = $(this).data('video-url')

        // If video
        if ( videoURL ) {

          // Detect video player
          var url_vimeo   = /(?:http?s?:\/\/)?(?:www\.)?(?:vimeo\.com)\/?(.+)/g
          var url_youtube = /(?:http?s?:\/\/)?(?:www\.)?(?:youtube\.com|youtu\.be)\/(?:watch\?v=)?(.+)/g
          var url_image   = /([-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?(?:jpg|jpeg|gif|png))/gi

          if( url_vimeo.test(videoURL) ) {
            var detected_embed  = '<iframe width="1400" height="788" src="//player.vimeo.com/video/$1?autoplay=1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'
            var embed           = videoURL.replace(url_vimeo, detected_embed);
          }

          if( url_youtube.test(videoURL) ) {
            var detected_embed  = '<iframe width="1400" height="788" src="https://www.youtube.com/embed/$1?autoplay=1" frameborder="0" allowfullscreen></iframe>'
            var embed           = videoURL.replace(url_youtube, detected_embed)
          } 

          if( url_image.test(videoURL) ) {
            var detected_embed  = '<a href="$1" target="_blank"><img class="sml" src="$1" /></a><br />'
            var embed           = videoURL.replace(url_image, detected_embed)
          }          
          
          // $(modalID).append(embed)
          $(modalID).children('.iframe-container').append(embed)
        }

        _this.modalShow(modalID);
      })

      // Add close event listener - ESC
      $(document).on('keyup', function (event) {
        
        event.preventDefault()
        
        var activeModal = $('.modal.show').attr('id'),
            activeModalID = '#'+activeModal;

        if ( activeModal !== undefined ) {
          // Check if ESC key
          if ( event.keyCode == 27 ) {
            _this.modalClose(activeModalID)
          }

          if ( app.config.debug ) console.log('%cEVENT', 'color:'+app.console.color.event, '- toggle '+activeModalID+' by keyup ESC')
        }
      })

      // Add close event listener - .modal--close
      $(document).delegate(app.$el.modals.close.selector, 'click', function (event) {
        
        event.preventDefault()

        var activeModal = $('.modal.show').attr('id'),
            activeModalID = '#'+activeModal;

        if ( activeModal !== undefined ) {
          _this.modalClose(activeModalID)
        }

        if ( app.config.debug ) console.log('%cEVENT', 'color:'+app.console.color.event, '- toggle '+activeModalID+' by click on '+app.$el.modals.close.selector)
      })

      // Close modal by clicking on overlay
      $(document).delegate('#app.app--modal-overlay', 'click', function (event) {
        var activeModal = $('.modal.show').attr('id'),
            activeModalID = '#'+activeModal

        if ( !$(event.target).closest('.modal').length) {
          // Clicked outside of modal
          _this.modalClose(activeModalID)
        }
      })

    },



    modalShow: function(targetID) {

      var targetID = targetID || null;

      // console.log('targetID',targetID)

      // Toggle body class
      app.$el.container.toggleClass(app.classes.modal_overlay)

      // Load any videos

    

      // Toggle modal class
      $(targetID).toggleClass('show')

      // Wrap event binding
      app.$el.container.bind('click', function (event) {

        var activeModal = $('.modal.show').attr('id'),
            activeModalID = '#'+activeModal;

        if ( activeModal !== undefined ) { _this.modalClose(activeModalID) }
          
      })

      
      if ( app.config.debug ) console.log('%cDATA-CONTROL', 'color:'+app.console.color.control, '- modalShow with ID '+targetID)

    },


    /**
     * modalClose
     * 
     * @param  {String} targetID 
     */
    modalClose: function(targetID) {

      var targetID = targetID || null;

      // Toggle body class
      app.$el.container.toggleClass(app.classes.modal_overlay)

      // Toggle modal class
      $(targetID).toggleClass('show')

      // Remove any videos
      $(targetID).find('iframe').remove()

      // Unbind wrap event
      app.$el.container.unbind('click')

      if ( app.config.debug ) console.log('%cDATA-CONTROL', 'color:'+app.console.color.control, '- modalClose ID '+targetID)
    }



  }





  /**
   * Forms
   */
  app.forms = {

    init: function() {

      
    }


  }







  /**
   * Compatibility
   */
  app.compatibility = {
    
    init: function() {

      this.setBrowserBodyClass()

    },
    
    setBrowserBodyClass: function() {

      var browser = getBrowserName()

      // console.log('browser: ', browser)
      // app.$el.body.addClass(browser)

      $('body').addClass(browser)
    }
    
  }










  /**
   * Waypoint
   * 
   * @param  {Object}   element  jQuery selector
   * @param  {Function} callback 
   */
  app.waypoint = function(element, offset, callback) {

    if ( !element || element.length <= 0 ) return false; 
    var waypoint_passed = false;

    window.addEventListener('scroll', function (event) {

      var element_offset_top = element.offset().top,
          window_offset_top  = document.documentElement.scrollTop || document.body.scrollTop;

      // If unflagged and below waypoint
      if ( waypoint_passed == false && (window_offset_top > (element_offset_top - offset)) ) {

        callback({
          element        : element,
          position       : 'below',
          element_offset : element_offset_top,
          window_offset  : window_offset_top
        })

        waypoint_passed = true;

        // Reset waypoint firing flag
        // setTimeout(function() { waypoint_passed = false; }, 5000)
      }

      // If unflagged and above waypoint
      if ( waypoint_passed == true && (window_offset_top < (element_offset_top - offset)) ) {

        callback({
          element        : element,
          position       : 'above',
          element_offset : element_offset_top,
          window_offset  : window_offset_top
        })

        waypoint_passed = false;
      }

    })

  }

  /**
   * Waypoints
   */
  app.waypoints = {

    init: function() {
      this.example()
    },

    example: function() {

      var $waypoint = $('.example-waypoint');

      if ( !$waypoint || $waypoint.length == 0 ) return;

      app.waypoint( $waypoint, 200, function (data) {

        if ( data.position == 'below' ) {
          // Do stuff here
        }
        if ( data.position == 'above' ) {
          // Do stuff here
        }

        if ( app.config.debug ) console.log('%cWAYPOINT', 'color:'+app.console.color.waypoint, $waypoint.selector, data )
        
      })

    }
  }




  /**
   * Scroller
   *
   * init
   * onScroll
   * requestTick
   * update
   */
  app.scroller = {

    debug : false,
    last_known_y : 0,
    previous_y   : 0,
    stage_height : 0,
    ticking : false,

    /**
     * Init
     */
    init: function() {
      var _this = app.scroller;

      window.addEventListener('scroll', _this.onScroll.bind(this), false)
      window.addEventListener('resize', function() {
        _this.stage_height = $(window).height()
      }, false)
    },
    
    /**
     * On Scroll
     */
    onScroll: function() {
      var _this = app.scroller;

      _this.last_known_y = window.pageYOffset;
      _this.requestTick()
    },
    
    /**
     * Request Tick
     */
    requestTick: function() {

      var _this = app.scroller;

      if( !_this.ticking ) {
        window.requestAnimationFrame( _this.update.bind(this) )
      }
      _this.ticking = true;
    },
    
    /**
     * Update
     */
    update: function() {

      var _this     = app.scroller,
          direction = {},
          y         = _this.last_known_y;
          
      _this.ticking = false;

      direction.down = ( _this.previous_y > y ) ? false : true;
      direction.up   = ( _this.previous_y < y ) ? false : true;
        

      /**
       * Animation Functions
       * Call animation frame functions here
       */
      


      // Log {direction} and posY
      if ( _this.debug ) console.log('%cEVENT', 'color:'+app.console.color.event, ' requestAnimationFrame', {
        'up'     : direction.up,
        'down'   : direction.down,
        'pageY'  : y
      } )

      // Increment Y Pos
      _this.previous_y = y;
    }

  }


  /**
   * Animations
   */
  app.animations = {
    
    $el : {
      
    },

    /**
     * Initialize
     */
    init: function() {
     },

    /**
     * Animations to fire on window.load
     * Calls in the window.onload event
     */
    onWindowLoad: function() {

      
    },

    
  }




  /**
   * Nav scroll
   */
  app.stickyHeader = {


  }



  /**
   * Loader
   */
  app.loader = {

    show : function() {
      app.$el.body.addClass('body--loading')
    },

    hide: function() {
      app.$el.body.removeClass('body--loading')
    }
  }






  














  /**
   *
   * 
   * ---------------
   * Private Methods
   * ---------------
   *
   * 
   */
  

  /**
   * Inject Script
   * 
   * @param  {String} url 
   */
  function injectScript(url) {

    var script        = document.createElement('script');
        script.async  = true;
        script.src    = url;

    document.body.appendChild(script);
  }


  /**
   * Scroll To Element
   * 
   * @param  {Object} options 
   */
  function scrollToElement(options){

    var duration  = options.duration || 250,
        easing    = options.easing || 'swing',
        offset    = options.offset || 0;

    var target    = options.target || false;

    if(target){
      if(/(iPhone|iPod)\sOS\s6/.test(navigator.userAgent)){
        $('html, body').animate({
          scrollTop: $(target).offset().top
        }, duration, easing);
      } else {
        $('html, body').animate({
          scrollTop: $(target).offset().top - (offset)
        }, duration, easing);
      }
    }
  }
  
  /**
   * Get Browser Name
   * 
   * @return {String} 
   */
  function getBrowserName() {
    var ua= navigator.userAgent, tem, 
    M= ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if(/trident/i.test(M[1])){
        tem=  /\brv[ :]+(\d+)/g.exec(ua) || [];
        return 'IE '+(tem[1] || '');
    }
    if(M[1]=== 'Chrome'){
        tem= ua.match(/\bOPR\/(\d+)/)
        if(tem!= null) return 'Opera '+tem[1];
    }
    M= M[2]? [M[1], M[2]]: [navigator.appName, navigator.appVersion, '-?'];
    if((tem= ua.match(/version\/(\d+)/i))!= null) M.splice(1, 1, tem[1]);

    if ( M[0].length > 0 ) {
      return M[0].toLowerCase(); 
    } else {
      return false;
    }
    
  }

  /**
   * Detect if IE
   * 
   * @return {Boolean}
   */
  function isIE() {

    var undef,rv = -1; // Return value assumes failure.
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf('MSIE ');
    var trident = ua.indexOf('Trident/');

    if (msie > 0) {
      // IE 10 or older => return version number
      rv = parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
      console.log( rv )
    } else if (trident > 0) {
      // IE 11 (or newer) => return version number
      var rvNum = ua.indexOf('rv:');
      rv = parseInt(ua.substring(rvNum + 3, ua.indexOf('.', rvNum)), 10);
      console.log( rv )
    } else {
      return false;
    }

    return ((rv > -1) ? rv : undef);
  }

  /**
   * Prevent Default Shim
   * 
   * @param  {Object} e event
   */
  function preventDefault(e) {
    e = e || window.event;
    if (e.preventDefault)
    e.preventDefault();
    e.returnValue = false;  
  }

  /**
   * Add Event Listeners
   * Add multiple event listeenrs
   * 
   * @param {Object}   el - element (window, document)
   * @param {String}   s  - selector
   * @param {Function} fn - function to call
   */
  function addEventListeners(el, s, fn) {
    var evts = s.split(' ');
    for (var i=0, iLen=evts.length; i<iLen; i++) {
      el.addEventListener(evts[i], fn, false);
    }
  }


  /**
   * Remove Class Prefix
   * 
   * @param  {String} prefix 
   */
  $.fn.removeClassPrefix = function(prefix) {
    this.each(function(i, el) {
      var classes = el.className.split(" ").filter(function(c) {
          return c.lastIndexOf(prefix, 0) !== 0;
      });
      el.className = $.trim(classes.join(" "));
    });
    return this;
  };

  function isMobile() {
    if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
      return true;

      console.log('is mobile')
    }
  }






  /**
   * Sticky header - hide on scroll down
   */
  var didScroll;
  var lastScrollTop = 0;
  var delta         = 50;
  var navbarHeight  = $('.hero').outerHeight();

  $(window).scroll(function(event){
    didScroll = true;
  });

  setInterval(function() {
    if (didScroll) {
      hasScrolled();
      didScroll = false;
    }
  }, 250);

  function hasScrolled() {
    var st = $(this).scrollTop()
    var navbarHeight  = $('#header').outerHeight();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
      return;

    // console.log('st', st)
    // console.log('navbarHeight', navbarHeight)
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
      // Scroll Down
      $('header').removeClass('header--show').addClass('header--hide');
    } else {
      // Scroll Up
      if(st + $(window).height() < $(document).height()) {
          $('header').removeClass('header--hide').addClass('header--show');
      }
    }
    
    lastScrollTop = st;


    if( st == 0 ) {
      $('header').removeClass('header--show')
    }
  }


  /**
   *
   * 
   * ---------------
   * Event Listeners
   * ---------------
   *
   * 
   */
  $(document).delegate('.tab__trigger', 'click', function (event) {
    event.preventDefault();

    var $this         = $(this),
        tab_active    = $this.data('tab-trigger'),
        container     = $this.parent().siblings('.tabs-container');
        // tab_container = $('.section-tabs .tabs-container');

    if (!$(this).hasClass('active')) {

      container.find('.tab--open').removeClass('tab--open fadeInRight')
      $(tab_active).addClass('tab--open animated animated-duration-500 fadeInRight');
         
      $('.tabs-menu').find('.active').removeClass('active');
      $(this).addClass('active');


      // Mobile
      $('.tabs-menu .next').removeClass('next');
      $('.tabs-menu .prev').removeClass('prev');
      $(this).next().addClass('next');
      $(this).prev().addClass('prev');

    } else {

      // $('.tabs-container .tab__content--open').removeClass('tab__content--open fadeInRight');
      // $(this).removeClass('active');
    }
  });      



  /**
   * Refactoring tabs
   */
  // On Click Event







  /**
   * EVENT: Document Ready
   * @jquery - $(document).ready(function(){  })
   */
  document.addEventListener('DOMContentLoaded', function (event) {
    
    app.init()




  })

  /**
   * EVENT: Window Load
   * @jquery - $(window).load(function(){  })
   */
  window.addEventListener('load', function (event) {
      
    app.animations.onWindowLoad()
    
  })


  /**
   * EVENT(S): Window Scroll, Window Resize, Window OrientationChange
   * Set _w vars in a multi-listener
   */
  addEventListeners(window, 'scroll resize orientationchange', function (event) {

    _w.w = window.outerWidth, 
    _w.h = window.outerHeight,
    _w.t = document.documentElement.scrollTop || document.body.scrollTop,
    _w.l = document.documentElement.scrollLeft || document.body.scrollLeft;

  })

  /**
   * EVENT(S): Window Scroll, Window Resize
   * @jquery - $(window).scroll(function(){  })
   */

  window.addEventListener('scroll', function (event) {

    if ( app.debug.events['window'].scroll && app.config.debug ) {
      console.log('%cEVENT', 'color:'+app.console.color.event, ' window.scroll ', _w)
    }

  })


  /**
   * EVENT: Document Ready
   * $(window).resize(function(){   }).trigger('resize')
   */
  window.addEventListener('resize', function (event) {

    if ( app.debug.events['window'].resize && app.config.debug ) {
      console.log('%cEVENT', 'color:'+app.console.color.event, ' window.resize ', _w)
    }

  })




  /**
   * EVENT: Window Orientation Change
   * $(window).on('orientationchange', function(){   })
   */
  if ( screen ) {
    window.addEventListener('orientationchange', function (event) {
        
      _s.w = screen.availWidth, 
      _s.h = screen.availHeight,
      _s.o = screen.orientation.type;

    })
  }



  
  
  
  return app;
})(jQuery);