// Logo Carousel
var LogoCarousel = function ($scope, $) {
    var $logoCarouselWrapper = $scope.find('.exad-logo-carousel-element').eq(0),
        $slidesToShow = $logoCarouselWrapper.data('slidestoshow'),
        $slidesToScroll = $logoCarouselWrapper.data('slidestoscroll'),
        $carousel_nav = $logoCarouselWrapper.data('carousel-nav'),
        $loop = ($logoCarouselWrapper.data("loop") !== undefined) ? $logoCarouselWrapper.data("loop") : false,
        $autoPlay = ($logoCarouselWrapper.data("autoplay") !== undefined) ? $logoCarouselWrapper.data("autoplay") : false,
        $autoplaySpeed = ($logoCarouselWrapper.data("autoplayspeed") !== undefined) ? $logoCarouselWrapper.data("autoplayspeed") : false;
        // $transitionSpeed = $logoCarouselWrapper.data("speed");
    // $pauseOnHover = ($logoCarouselWrapper.data("pauseOnHover") !== undefined) ? $logoCarouselWrapper.data("pauseOnHover") : false;

    if ($carousel_nav == "arrows" ) {
        var arrows = true;
        var dots = false;
    } else {
        var arrows = false;
        var dots = true;
    }

    $logoCarouselWrapper.slick({
        infinite: $loop,
        slidesToShow: $slidesToShow,
        slidesToScroll: $slidesToScroll,
        autoplay: $autoPlay,
        autoplaySpeed: $autoplaySpeed,
        dots: dots,
          arrows: arrows,
          prevArrow: "<div class='exad-logo-carousel-prev'><i class='fa fa-angle-left'></i></div>",
          nextArrow: "<div class='exad-logo-carousel-next'><i class='fa fa-angle-right'></i></div>",
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
              }
            },
            {
              breakpoint: 768,
              settings: {
                slidesToShow: 2,
              }
            },
            {
              breakpoint: 450,
              settings: {
                slidesToShow: 1,
              }
            }
        ],
    });	
};
