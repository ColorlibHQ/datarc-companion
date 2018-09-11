(function ($) {
    'use strict';

    // owlCarousel
    var $testimonialcs = $('.active-testimonial-carousel');

    if( $testimonialcs.length ){
        $testimonialcs.owlCarousel({
            loop:true,
            dot: true,
            items: 3,
            margin: 30,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:true,
            animateOut: 'fadeOutLeft',
            animateIn: 'fadeInRight',
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:3,
                 }
            }
        });

    }

    
    // MC Scripts
    var $subscribe = $( '.datarc-subscribe-newsletter-area' );
    if( $subscribe.length ){
        window.fnames = new Array();
        window.ftypes = new Array();
        fnames[0]='EMAIL';
        ftypes[0]='email';
        fnames[1]='FNAME';
        ftypes[1]='text';
        fnames[2]='LNAME';
        ftypes[2]='text';
        fnames[3]='ADDRESS';
        ftypes[3]='address';
        fnames[4]='PHONE';
        ftypes[4]='phone';
        fnames[5]='BIRTHDAY';
        ftypes[5]='birthday';
    }



})(jQuery);