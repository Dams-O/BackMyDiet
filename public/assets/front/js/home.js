$(document).ready(function(){


    $("#btn-prestation").click(function (e) {
        if($( window ).width() > 767){
            openSearchList();
        }else{
            e.preventDefault;
            slideLeft.open();
            $('#input-search-mobile').focus();
        }
    });

    $('.home-slideshow').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.track-slideshow',
        autoplay: true,
        autoplaySpeed: 10000,
        pauseOnHover:false
    });
    $('.track-slideshow').slick({
        arrows: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 2000,
        infinite: false,
    });

    $('.home-slideshow').on('afterChange', function(event, slick, currentSlide) {
        $('.home-slideshow').slick('slickGoTo', currentSlide);
        var currrentNavSlideElem = '.home-slideshow .slick-slide[data-slick-index="' + currentSlide + '"]';
        $('.home-slideshow .slick-slide.is-active').removeClass('is-active');
        $(currrentNavSlideElem).addClass('is-active');
    });

    $('.home-slideshow').on('click', '.slick-slide', function(event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');

        $('.home-slideshow').slick('slickGoTo', goToSingleSlide);
    });
    $(".slide-bouton").on('click', function () {
      var goToSingleSlide = $(this).data('slick-index');

      $('.home-slideshow').slick('slickGoTo', goToSingleSlide);
    });
});
