$(function($) {

    //Preloader Start
    $(window).load(function() {
        $('.preloader').fadeOut('slow', function() {
            $(this).remove();
        });
    });
    //Preloader End

    //category slider
    // $('.category_slider').slick({
    //     infinite: false,
    //     slidesToShow: 8,
    //     slidesToScroll: 2,
    //     dots: false,
    //     arrows: false,
    //     autoplay: true,
    //     autoplaySpeed: 2000,
    // });



    //wow js start
    new WOW().init();
    //wow js end


    //Menu Fixed start
    $('.top_btn').click(function() {


        $('html,body').animate({

            scrollTop: 0

        }, 1000);


    });


    $(window).scroll(function() {

        $scrolling = $(this).scrollTop();

        if ($scrolling >= 500) {

            $('.job_post_link').fadeIn();


        } else {

            $('.job_post_link').fadeOut();


        }

        //Top Button
        if ($scrolling >= 500) {

            $('.top_btn').fadeIn();

        } else {

            $('.top_btn').fadeOut();

        }

    });
    //Menu Fixed End


});