 jQuery(document).ready(function () {
    'use strict';
    /*** =====================================
    * Mixitup
    * =====================================***/
    $('#mixitup-grid').mixItUp();
    $('.filter-options li:first-child a').addClass("active");

    /*** =====================================
    * 	Mobile Menu
    * =====================================***/
	$('.mobile-background-nav .has-submenu').on('click',function(e) {
	  	e.preventDefault();
	    var $this = $(this);
	    if ($this.next().hasClass('menu-show')) {
	        $this.next().removeClass('menu-show');
	        $this.next().slideUp(350);
	    } else {
	        $this.parent().parent().find('li .dropdown').removeClass('menu-show');
	        $this.parent().parent().find('li .dropdown').slideUp(350);
	        $this.next().toggleClass('menu-show');
	        $this.next().slideToggle(350);
	    }
	});
	$('.mobile-menu-close i').on('click',function(){
	     $('.mobile-background-nav').removeClass('in');
	});

	$('#humbarger-icon').on('click',function(e){
        e.preventDefault();
	     $('.mobile-background-nav').toggleClass('in');
	});
    /*** =====================================
    * Easy Menu
    * =====================================***/
	(function($) {
	    $.fn.menumaker = function(options) {
	        var cssmenu = $(this),
	            settings = $.extend({
	                format: "dropdown",
	                sticky: false
	            }, options);
	        return this.each(function() {
	            $(this).find(".button").on('click', function() {
	                $(this).toggleClass('menu-opened');
	                var mainmenu = $(this).next('ul');
	                if (mainmenu.hasClass('open')) {
	                    mainmenu.slideToggle().removeClass('open');
	                } else {
	                    mainmenu.slideToggle().addClass('open');
	                    if (settings.format === "dropdown") {
	                        mainmenu.find('ul').show();
	                    }
	                }
	            });
	            cssmenu.find('li ul').parent().addClass('has-sub');
	            var multiTg;
	            multiTg = function() {
	                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
	                cssmenu.find('.submenu-button').on('click', function() {
	                    $(this).toggleClass('submenu-opened');
	                    if ($(this).siblings('ul').hasClass('open')) {
	                        $(this).siblings('ul').removeClass('open').slideToggle();
	                    } else {
	                        $(this).siblings('ul').addClass('open').slideToggle();
	                    }
	                });
	            };
	            if (settings.format === 'multitoggle') multiTg();
	            else cssmenu.addClass('dropdown');
	            if (settings.sticky === true) cssmenu.css('position', 'fixed');
	            var resizeFix;
	            resizeFix = function() {
	                var mediasize = 1000;
	                if ($(window).width() > mediasize) {
	                    cssmenu.find('ul').show();
	                }
	                if ($(window).width() <= mediasize) {
	                    cssmenu.find('ul').hide().removeClass('open');
	                }
	            };
	            resizeFix();
	            return $(window).on('resize', resizeFix);
	        });
	    };
	})(jQuery);
	 $("#easy-menu").menumaker({
        format: "multitoggle"
    });
    /*** =====================================
    * Upcomming Event
    * ==================================== ***/
    $(".upcommig-event-carousel").slick({
        dots: false,
        vertical: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        prevArrow: '<div class="slick-arrow-prev base-color"><i class="fa fa-angle-up"></i></div>',
        nextArrow: '<div class="slick-arrow-next base-color"><i class="fa fa-angle-down"></i></div>',
        responsive: [{
         breakpoint: 768,
         settings: {
           slidesToShow: 1,
           slidesToScroll: 1,
           autoplay: true,
           autoplaySpeed: 1500,
           arrows : false,
           vertical: false,
         }
       }]
      });
    /*** =====================================
    * Testimonial
    * ==================================== ***/
    $(".fund-testimonial-carousel").slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows : false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: false
            }
        }]
    });
    /*** =====================================
    * Client Carousel
    * ==================================== ***/
    $(".client-carusel").slick({
        dots: false,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows : false,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                centerMode: false
            }
        }]
    });
    /*** =====================================
    * About us carousel
    * ==================================== ***/
    $(".about-us-carousel").slick({
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows : false,
    });
    /** =====================================
    *   Select 2
    * =====================================**/
    $('.hide-search--dropdown').select2({
        minimumResultsForSearch: -1
    });
    $('.selectpicker').select2({

    });
    $(".pament-select").select2({
      tags: true,
      createTag: function (params) {
        return {
          id: params.term,
          text: params.term,
          newOption: true
        }
      },
      templateResult: function (data) {
        var $result = $("<span></span>");
        $result.text(data.text);
        if (data.newOption) {
          $result.append(" <em>(new)</em>");
        }
        return $result;
      }
    })
    /** =====================================
    *  Gallery  Popup
    * =====================================**/
    $(".gallery-item").colorbox({
        rel:'group4',
        slideshow:false,
        transition:"fade",
        onOpen:function(){
            $('body').addClass('popup-open');
        },
        onClosed:function(){
            $('body').removeClass('popup-open');
        }
    });
    /** =====================================
    * Counter
    * =====================================***/
    if( $('.counter-item__count').length){
        $('.counter-item__count').counterUp({
            delay: 10,
            time: 3000
        });
    }
    /** =====================================
    * Event Countdown
    * =====================================***/
    function musicaEvents() {
        var musicaEvent = $('.musica-counter-active');
        var len = musicaEvent.length;
        for (var i = 0; i < len; i++) {
            var musicaEventId = '#' + musicaEvent[i].id,
            dataValueYear = $(musicaEventId).attr('data-value-year'),
			dataValueMonth = $(musicaEventId).attr('data-value-month'),
			dataValueDay = $(musicaEventId).attr('data-value-day'),
			dataValueZone = $(musicaEventId).attr('data-value-zone');
            $(musicaEventId).countdown({
				labels: ['Years', 'Months', 'Weeks', 'Days', 'Hours', 'Mins', 'Secs'],
		        until: $.countdown.UTCDate(dataValueZone, dataValueYear, dataValueMonth, dataValueDay),
		        format: 'dHMS',
		        padZeroes: true
		    });
        }
    }
    if ($('.musica-counter-active').length) {
        musicaEvents();
    }
    /*** =====================================
    * Upcomming Event Carusel
    * ==================================== ***/
    $("#upcomming-event-carousel").slick({
        dots: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows : true,
    });
    /** =====================================
    *   Search Box
    * =====================================**/
   	$('.search-box a').on('click', function(e) {
        e.preventDefault();
        $('.top-search-input-wrap').addClass('show');
   	});
   	$(".top-search-input-wrap .top-search-overlay, .top-search-input-wrap .close-icon").on('click', function(){
        $('.top-search-input-wrap').removeClass('show');
   	});
    /*** =====================================
    * Preloder
    * ==================================== ***/
	$(window).on('load', function(){
        /** ===== Preloder ========**/
	    $('.preloader').fadeOut();
	});
    /*** =====================================
    * Progress
    * ==================================== ***/
    jQuery(window).on('scroll', function() {
      var windowHeight = $(window).height();
      function kalProgress() {
         var progress = $('.progress-rate');
         var len = progress.length;
         for (var i = 0; i < len; i++) {
             var progressId = '#' + progress[i].id;
             var dataValue = $(progressId).attr('data-value');
             $(progressId).css({'width':dataValue+'%'});
         }
      }
      var progressRateClass = $('.progress-item');
       if ((progressRateClass).length) {
           var progressOffset = $(".progress-item").offset().top - windowHeight;
           if ($(window).scrollTop() > progressOffset) {
               kalProgress();
           }
       }
    });
    /** =====================================
    *  Color Swicher
    * ===================================== **/
	$('.swhicher-button button').on('click', function(){
		var buttonAttr = $(this).attr('data-att');
		$('link[data-style="color-style"]').attr('href','css/'+buttonAttr+'.css');
        $('.logo a img, .footer-logo a img').attr('src','images/'+buttonAttr+'-logo.png');
	});
	$('.setting-button-wrapper .setting-button').on('click', function(){
		$('.color-shicher-wraper').toggleClass('show-color');
	});
    /*** =====================================
    *   Fixed Menu
    * =====================================*/
    $(document).load('click','.tobar-fixed-check label',function(){
        $('.main-menu-area').toggleClass('main-menu-fixed');
        if($('.main-menu-fixed').length){
            var win = $(document);
            var menuTerget = $('.main-menu-fixed');
            var menuOffset = menuTerget.offset().top;
            win.on('scroll', function() {
             if (menuOffset < win.scrollTop()) {
                 menuTerget.addClass('main-menu-fix-active');
             } else {
                 menuTerget.removeClass('main-menu-fix-active');
             }
            });
        }
        if(!$('.main-menu-fixed').length){
            $('.main-menu-area').removeClass('main-menu-fix-active');
        }
    });
    $('.backtop-top-check label').on('click',function(){
        $('#toTop').toggleClass('toTop-hide');
    });
    $('.removetopbar label').on('click',function(){
        $('.top-bar').toggleClass('hide-topbar');
        $('.slider-area').toggleClass('fullscreen-container100')
    });


    /** =====================================
    *  Back to top
    * ===================================== **/
    $(window).scroll(function(){
        if ($(this).scrollTop()>10) {
            $('#toTop').addClass('backtop-top-show');
        } else {
            $('#toTop').removeClass('backtop-top-show');
        }
    })
    $("#toTop").on('click',function (e) {
        e.preventDefault();
       $("html, body").animate({scrollTop: 0}, 1000);
    });
    /** =====================================
    *  Wow JS
    * ===================================== **/
    if($('.wow').length){
        var wow=new WOW( {
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: false, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
            callback: function(box) {}
            , scrollContainer: true // optional scroll container selector, otherwise use window
        }
        );
        wow.init();
    }

    /** =====================================
    *  Lazy load
    * ===================================== **/
    if($('.lazy').length){
        $('.lazy').lazy({
           effect: 'fadeIn',
           beforeLoad: function(element) {
              console.log("start loading ");
          },
           onLoad: function(){
               console.log("Imon");
           },
           onError: function(element) {
               console.log('error loading ' + element.data('src'));
           }
        });
    }


	/**
    * =====================================
    * Contact Form submission
    * =====================================
    */
    $(function () {
        $('form#contact').on('submit', function (e) {
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var firstname = $("input[name='firstname']").val();
            var lastname = $("input[name='lastname']").val();
            var email = $("input[name='email']").val();
            var phone = $("input[name='phone']").val();
            var message = $("textarea[name='message']").val();

            $.post('/send-message',{
                '_token': $('meta[name=csrf-token]').attr('content'),
                'firstname': firstname,
                'lastname': lastname,
                'email': email,
                'phone': phone,
                'message': message,
            })

            .always(function() {
                $('.sub_btn').prop('disabled', true);
            })

        	.done(function(data){
                console.log(data);
        	  $('.contact-form').fadeOut('slow', function(){
        		  $('.contact-form').fadeIn('slow').html(data.success);
                });


        	})
        	.fail(function(data){
                console.log(data.responseJSON.error.toString())
                $('.sub_btn').prop('disabled', false);
        		alert(data.responseJSON.error.toString());
        	});
        });
    });


    /**
    * =====================================
    * vote Form submission
    * =====================================
    */
    $(function () {
        $('form#vote').on('submit', function (e) {
            e.preventDefault();
            var optionId = $("input[name='option']:checked").val();
            console.log(optionId);


            $.post('/vote',{
                '_token': $('meta[name=csrf-token]').attr('content'),
                'option': optionId,
            })

            .always(function() {
                $('.vote-btn').prop('disabled', true);
                $('.vote-spinner').show();
            })

            .done(function(data){
                $('.donation-form').empty();
                $('.poll-question').empty();

               var t = data.percentages.map(({name, percentage}) => {
                    $('.donation-form').fadeIn('slow').append(`<div class='progress' style='height: 30px'><div class='progress-bar' role='progressbar' aria-valuenow='${percentage}' aria-valuemin='0' aria-valuemax='100' style='width: ${percentage}%'><span>${name} ${percentage}%</span></div></div>`)
                })

                $('.donation-form').fadeIn('slow').prepend(`<h3 class='text-center text-info'>${data.message}</h3>`);

            })

            .fail(function(){
                $('.vote-btn').prop('disabled', false);
                alert('submission failed');
                $('.vote-spinner').hide();
            });
        });
    });

    /**
    * =====================================
    * vote Form submission
    * =====================================
    */

   $(function () {
    $('form#subscribe').on('submit', function (e) {
        e.preventDefault();
        var email = $("#subscriber_email").val();
        var token = $('meta[name=csrf-token]').attr('content');

        console.log(email);

        $.post('/subscribe',{
            '_token': $('meta[name=csrf-token]').attr('content'),
            'email': email,
        })

        .done(function(data){
            alert(data.success);
        })

        .fail(function(data){
            alert(data.responseJSON.error.join(''));
        });
    });
});
    // $(function(){
    //     $('form.newsletter-form').on('submit', function(e){
    //         e.preventDefault();
    //         var email = $("input[name='email']").val();
    //         console.log(email);


    //     $.post('/subscribe',{
    //         '_token': $('meta[name=csrf-token]').attr('content'),
    //         'email': email,
    //     });
    // });

});

    /**
    * =====================================
    * Pull select radio button
    * =====================================
    */

   let currentValue = 1;
   const timeout = 0.75;
   const radios = document.querySelectorAll('.swappy-radios input');
   const fakeRadios = document.querySelectorAll('.swappy-radios .radio1');

   //This next bit kinda sucks and could be improved.
   //For simplicity, I'm assuming that the distance between the first and second radios is indicative of the distance between all radios. This will fail if one of the options goes onto two lines.
   //I should really move each radio independantly depending on its own distance to its neighbour. Oh well ¯\_(ツ)_/¯
   //TODO ^^^
   const firstRadioY = document.querySelector('.swappy-radios label:nth-of-type(1) .radio1').getBoundingClientRect().y;
   const secondRadioY = document.querySelector('.swappy-radios label:nth-of-type(2) .radio1').getBoundingClientRect().y;
   const indicitiveDistance = secondRadioY - firstRadioY;
   //End suckyness :D

   //Apply CSS delays in JS, so that if JS doesn't load, it doesn't delay selected radio colour change
   //I'm applying background style delay here so that it doesn't appear slow if JS is disabled/broken
   fakeRadios.forEach(function(radio) {
     radio.style.cssText = `transition: background 0s ${timeout}s;`;
   });
   //Have to do this bit the long way (i.e. with a <style> element) becuase you can't do inline pseudo element syles
   const css = `.radio1::after {transition: opacity 0s ${timeout}s;}`
   const head = document.head;
   const style = document.createElement('style');
   style.type = 'text/css';
   style.appendChild(document.createTextNode(css));
   head.appendChild(style);
   //End no-js animation fallbacks.

   radios.forEach(function(radio, i) {
     //Add an attr to make finding and styling the correct element a lot easier
     radio.parentElement.setAttribute('data-index', i + 1);

     //The meat: set up the change listener!
     radio.addEventListener('change', function() {
       //Stop weirdness of incomplete animation occuring. disable radios until complete.
       temporarilyDisable();

       //remove old style tag
       removeStyles();
       const nextValue = this.parentElement.dataset.index;

       const oldRadio = document.querySelector(`[data-index="${currentValue}"] .radio1`);
       const newRadio = this.nextElementSibling;
       const oldRect = oldRadio.getBoundingClientRect();
       const newRect = newRadio.getBoundingClientRect();

       //Pixel distance between previous and newly-selected radios
       const yDiff = Math.abs(oldRect.y - newRect.y);

       //Direction. Is the new option higher or lower than the old option?
       const dirDown = oldRect.y - newRect.y > 0 ? true : false;

       //Figure out which unselected radios actually need to move
       //(we don't necessarily want to move them all)
       const othersToMove = [];
       const lowEnd = Math.min(currentValue, nextValue);
       const highEnd = Math.max(currentValue, nextValue);

       const inBetweenies = range(lowEnd, highEnd, dirDown);
       let othersCss = '';
       inBetweenies.map(option => {
         //If there's more than one, add a subtle stagger effect
         const staggerDelay = inBetweenies.length > 1 ? 0.1 / inBetweenies.length * option : 0;
         othersCss += `
           [data-index="${option}"] .radio1 {
             animation: moveOthers ${timeout - staggerDelay}s ${staggerDelay}s;
           }
         `;
       });

       const css = `
         ${othersCss}
         [data-index="${currentValue}"] .radio1 {
           animation: moveIt ${timeout}s;
         }
         @keyframes moveIt {
           0% { transform: translateX(0); }
           33% { transform: translateX(-3rem) translateY(0); }
           66% { transform: translateX(-3rem) translateY(${dirDown ? '-' : ''}${yDiff}px); }
           100% { transform: translateX(0) translateY(${dirDown ? '-' : ''}${yDiff}px); }
         }
         @keyframes moveOthers {
           0% { transform: translateY(0); }
           33% { transform: translateY(0); }
           66% { transform: translateY(${dirDown ? '' : '-'}${indicitiveDistance}px); }
           100% { transform: translateY(${dirDown ? '' : '-'}${indicitiveDistance}px); }
         }
     `;
       appendStyles(css);
       currentValue = nextValue;
     });
   });

   function appendStyles(css) {
     const head = document.head;
     const style = document.createElement('style');
     style.type = 'text/css';
     style.id = 'swappy-radio-styles';
     style.appendChild(document.createTextNode(css));
     head.appendChild(style);
   }
   function removeStyles() {
     const node = document.getElementById('swappy-radio-styles');
     if (node && node.parentNode) {
       node.parentNode.removeChild(node);
     }
   }
   function range(start, end, dirDown) {
     let extra = 1;
     if (dirDown) {
         extra = 0;
     }
     return [...Array(end - start).keys()].map(v => start + v + extra);
   }
   function temporarilyDisable() {
       radios.forEach((item) => {
         item.setAttribute('disabled', true);
         setTimeout(() => {
           item.removeAttribute('disabled');
         }, timeout * 1000);
       });
   }
/**
    * =====================================
    * Pull select radio button
    * =====================================
    */
