jQuery(function($) {

  /**
   * Case banner
   */

  if( $('.case-banner').length ){

    $('html').addClass('fixedPosition');

    $('.case-banner .button').on('click', function (e) {

      e.preventDefault();

      $('html').removeClass('fixedPosition');

      $('.case-banner').fadeOut(400);

    })
  }

  /**
   * Lazy load
   */

  $('.lazy').lazy();


  /**
   * Get Window Width, Height
   */

  let windWid = $(window).width();
  let windHeig = $(window).height();

  $(window).resize(function () {
    windWid = $(window).width();
    windHeig = $(window).height();
  });

  /**
   * Fixed Menu
   */

  $(document).scroll(function() {

    let y = $(this).scrollTop();

    if (y > 1) {
      $('header').addClass('fixed-header');
    } else {
      $('header').removeClass('fixed-header');
    }
  });

  let positionScrollHeader = $(window).scrollTop();

  $(window).scroll(function() {

    let scroll = $(window).scrollTop();

    if(scroll > positionScrollHeader) {

      if ($('.main-nav.open-menu').length ){
        $('header').addClass('fixed-header-visible');
      }else{
        $('header').removeClass('fixed-header-visible');
      }


    } else {
      $('header').addClass('fixed-header-visible');

    }

    positionScrollHeader = scroll;
  });

  /**
   * Mob Menu
   */


  $('#menu-btn').on('click', function (e) {
    e.preventDefault();

    $(this).toggleClass('active');
    $('header').toggleClass('active-menu');
    $('header nav').toggleClass('open-menu');
    $('html').toggleClass("fixedPosition");

  });

  /**
   * Doctor experience
   */

  $('.doctor-experience .nav-tabs .nav-item:first-child .nav-link').addClass('active');
  $('.doctor-experience .tab-content .tab-pane:first-child').addClass('active');


  /**
   * Reviews slider
   */

  $('#reviews-slider').slick({
      autoplay: false,
      autoplaySpeed: 5000,
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            slidesToShow: 2,
          }
        },
        {
          breakpoint: 575,
          settings: {
            slidesToShow: 1,
            fade: true
          }
        }
      ]

  });

  $('#media-slider').slick({
    autoplay: false,
    autoplaySpeed: 5000,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1,
          fade: true
        }
      }
    ]

  });

  /**
   * Fancybox Init
   */

  $('[data-fancybox]').fancybox({
    protect: true,
    loop : true,
    fullScreen : true,
    scrolling : 'yes',
    image : {
      preload : "auto",
      protect : true
    },
    buttons: [
      "zoom",
      "slideShow",
      "fullScreen",
      "close"
    ]

  });

  /**
   * SCROLL MENU
   */

  if ( $('.page-template-template-home').length ){

    $('#primary-menu .menu-item-type-custom a').addClass('scroll-to');

  }else{

    $('#primary-menu .menu-item-type-custom a').each(function () {

      let thisMenuItem = $(this);

      let homeUrl = $('.site-header .logo').attr('href');

      let thisAnchor = thisMenuItem.attr('href');

      thisMenuItem.attr('href', homeUrl + '/' + thisAnchor);
    });

  }



  $(document).on('click', '.scroll-to', function (e) {
    e.preventDefault();

    let href = $(this).attr('href');

    $('html, body').animate({
      scrollTop: $(href).offset().top
    }, 1000);

  });

  /**
   * Video modal
   */

  $('#reviews .play, .media-about-us .play').on('click', function (e) {

    e.preventDefault();

    /*let videoSrc = $(this).attr('data-video');

    let videoModal = $('#videoModal');

    videoModal.find('video').attr('src', videoSrc);

    videoModal.modal("show");*/

  });

  $("#videoModal").on('hide.bs.modal', function () {

    $(this).find('video').attr('src', '');
  });

  /**
   *Basic Fade In Scroll Animation
   */

  let animationTracking = $('.animation-tracking');
  let startAnimationDelay = 200;

  animationTracking.each(function () {

    let thisTrack = $(this);

    thisTrack.viewportChecker({

      offset: startAnimationDelay,

      callbackFunction: function (elem, action) {

        $('.visible .first-up').addClass('animate');

        setTimeout(function () {

          $('.visible .second-up').addClass('animate');
        }, 500);

        setTimeout(function () {

          $('.visible .third-up').addClass('animate');
        }, 1000);

      }
    });
  });

  /**
   * PHONE MASK
   */

  jQuery("input[type=tel]").mask("+38(999) 999-99-99");

  /**
   * Map
   */

  function initMap() {

    let lat = Number($('#map').attr('data-lat'));
    let lng = Number($('#map').attr('data-lng'));
    /*var monument = [-77.0353, 38.8895];
    var zoom = 2.5;*/

    mapboxgl.accessToken = 'pk.eyJ1Ijoic21tc3R1ZGlvIiwiYSI6ImNsdjR4bWtjYjBjMngydHF0YTB5M28xbW0ifQ.qv1YEbKzYQrxtbx7jP3Z4w';

    //var monument = [-77.0353, 38.8895];
    let monument = [lng , lat];

    let center = [24.671321804806897, 48.936744248952174];

    if(windWid <= 575 ){

      center = [24.685359454320594, 48.95226758264631];
    }

    let map = new mapboxgl.Map({
      container: 'map',
      center: center,
      zoom: 13,
      /*scrollZoom: false,*/
      dragPa: false,
      dragRotate: false,
      style: 'mapbox://styles/mapbox/streets-v12',
      language: 'uk'

    });


    var el = document.createElement('div');
    el.className = 'map-marker';

    new mapboxgl.Marker(el)
      .setLngLat(monument)
      .addTo(map);

  }

  if ( $('#map').length) {
    initMap();
  }



  //Смена категории курсов

  /*jQuery('.page-template-template-home .curses-cat-wrapper .cat').on('click', function (e) {
    e.preventDefault();

    jQuery('.page-template-template-home .curses-cat-wrapper .cat').removeClass('active-cat');

    jQuery(this).addClass('active-cat');

    var subCatId = jQuery(this).data('subcatid');

    var allCat = jQuery(this).data('allcat');

    var currentLang = jQuery(this).data('lang');

    var pageCatNavWrapper = jQuery('#mor-curses-dtn-wrap');

    var allCatPosts = Number(jQuery(this).attr('data-allposts'));

    pageCatNavWrapper.attr('data-allposts', allCatPosts);

    var targetAllPosts = Number(pageCatNavWrapper.attr('data-allposts'));

    if ( targetAllPosts <= 6 ){
      pageCatNavWrapper.addClass('d-none');
    }else{
      pageCatNavWrapper.removeClass('d-none');
    }

    let data = {

      action: 'change_curses_category',
      allCat: allCat,
      currentLang: currentLang,
      subCatId: subCatId
    };

    jQuery.post( myajax.url, data, function(response) {

      if(jQuery.trim(response) !== ''){

        jQuery('#curses-list').html(response);
      }
    });

  });*/

  //Вывод больше курсов

  /*if ( jQuery('.page-template-template-home').length ){

    var activeCat = jQuery('.curses-cat-wrapper .cat.active-cat');
    var allPosts = Number(activeCat.attr('data-allposts'));

    jQuery('#mor-curses-dtn-wrap').attr('data-allposts', allPosts);

    var targetAllPosts = Number(jQuery('#mor-curses-dtn-wrap').attr('data-allposts'));

    var btnMore = jQuery('#more-curses');

    btnMore.attr('data-currentcat', activeCat.attr('data-subcatid'));
    btnMore.attr('data-allcat', activeCat.attr('data-allcat'));

    btnMore.on('click', function (e) {
      e.preventDefault();

      var curseLeng = jQuery(this).attr('data-lang');
      var curseCurrentCat = Number(jQuery(this).attr('data-currentcat'));
      var curseAllCat = Number(jQuery(this).attr('data-allcat'));

      var moreCurses = {
        action: 'more_curses',
        currentLang: curseLeng,
        allCat: curseAllCat,
        currentCat: curseCurrentCat
      };

      jQuery.post( myajax.url, moreCurses, function(response) {

        if(jQuery.trim(response) !== ''){

          jQuery('#curses-list').append(response);
        }
      });

      jQuery('#mor-curses-dtn-wrap').addClass('d-none');

    });

  }*/



  //Webinar Countdown Timer

  /*if ( jQuery('.courses-template-template-webinar-page').length ){

    let startData = Number(jQuery('#timer').data('start'));

    const date = new Date(startData*1000);

    startData = new Date(date).getTime();

    // Update the count down every 1 second
    let dataTimer = setInterval(function() {

      // Get today's date and time
      let getDate = new Date().getTime();

      // Find the distance between now and the count down date
      let distance = startData - getDate;

      // Time calculations for days, hours, minutes and seconds
      let days = Math.floor(distance / (1000 * 60 * 60 * 24));
      let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      let seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"

      jQuery('#timer .day .date').text(days);
      jQuery('#timer .hour .date').text(hours);
      jQuery('#timer .minute .date').text(minutes);
      jQuery('#timer .second .date').text(seconds);


      // If the count down is finished, write some text
      if (distance < 0) {
        clearInterval(dataTimer);

      }
    }, 1000);

  }*/
    // MAP INIT

    /*function initMap() {
        var location = {
            lat: 48.268376,
            lng: 25.9301257
        };

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location,
            scrollwheel: false
        });

        var marker = new google.maps.Marker({
            position: location,
            map: map
        });

        var marker = new google.maps.Marker({ // кастомный марекр + подпись
            position: location,
            title:"Город, Улица, \n" +
            "Дом, Квартира",
            map: map,
            icon: {
                url: ('img/marker.svg'),
                scaledSize: new google.maps.Size(141, 128)
            }
        });

        jQuery.getJSON("map-style_dark.json", function(data) { // подключения стиля для гугл карты
            map.setOptions({styles: data});
        });

    }

    initMap();*/

    // MOB-MENU

    /*jQuery('#menu-btn').on('click', function (e) {
       e.preventDefault();

       jQuery('#mob-menu').toggleClass('active-menu');
       jQuery(this).toggleClass('open-menu');
    });

    jQuery('#mob-menu a').on('click', function (e) {
        e.preventDefault();

        jQuery('#mob-menu').removeClass('active-menu');
        jQuery('#menu-btn').removeClass('open-menu');
    });*/


    //SCROLL MENU

    /*jQuery(document).on('click', '.scroll-to', function (e) {
        e.preventDefault();

        var href = jQuery(this).attr('href');

        jQuery('html, body').animate({
            scrollTop: jQuery(href).offset().top
        }, 1000);

    });*/

    // CASTOME SLIDER ARROWS

    /*jQuery('.mein-slider').slick({
        autoplay: false,
        autoplaySpeed: 5000,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true

    });

    jQuery('.main-page .arrow-left').click(function(e){
        e.preventDefault();

        jQuery('.mein-slider').slick('slickPrev');
    });

    jQuery('.main-page .arrow-right').click(function(e){
        e.preventDefault();

        jQuery('.mein-slider').slick('slickNext');
    });*/



    // DTA VALUE REPLACE

    /*jQuery('.open-form').on('click', function (e) {
        e.preventDefault();
        var type = jQuery(this).data('type');
        jQuery('#type-form').find('input[name=type]').val(type);
    });*/

    // FORM LABEL FOCUS UP

    /*jQuery('.form-control').on('focus', function() {
        jQuery(this).closest('.form-control').find('label').addClass('active');
    });

    jQuery('.form-control').on('blur', function() {
        var jQuerythis = jQuery(this);
        if (jQuerythis.val() == '') {
            jQuerythis.closest('.form-control').find('label').removeClass('active');
        }
    });*/

    // SCROLL TOP.

    /*jQuery(document).on('click', '.up-btn', function() {
        jQuery('html, body').animate({
            scrollTop: 0
        }, 300);
    });*/

    // SHOW SCROLL TOP BUTTON.

    /*jQuery(document).scroll(function() {
        var y = jQuery(this).scrollTop();

        if (y > 800) {
            jQuery('.up-btn').fadeIn();
        } else {
            jQuery('.up-btn').fadeOut();
        }
    });*/

    // UTM

    /*function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            if (decodeURIComponent(pair[0]) == variable) {
                return decodeURIComponent(pair[1]);
            }
        }
    }
    utm_source = getQueryVariable('utm_source') ? getQueryVariable('utm_source') : "";
    utm_medium = getQueryVariable('utm_medium') ? getQueryVariable('utm_medium') : "";
    utm_campaign = getQueryVariable('utm_campaign') ? getQueryVariable('utm_campaign') : "";
    utm_term = getQueryVariable('utm_term') ? getQueryVariable('utm_term') : "";
    utm_content = getQueryVariable('utm_content') ? getQueryVariable('utm_content') : "";

    var forms = jQuery('form');
    jQuery.each(forms, function (index, form) {
        jQueryform = jQuery(form);
        jQueryform.append('<input type="hidden" name="utm_source" value="' + utm_source + '">');
        jQueryform.append('<input type="hidden" name="utm_medium" value="' + utm_medium + '">');
        jQueryform.append('<input type="hidden" name="utm_campaign" value="' + utm_campaign + '">');
        jQueryform.append('<input type="hidden" name="utm_term" value="' + utm_term + '">');
        jQueryform.append('<input type="hidden" name="utm_content" value="' + utm_content + '">');
    });*/

});

// PRELOADER

/*jQuery(window).on('load', function () {

    jQuery('#loader').fadeOut(400);
});*/
