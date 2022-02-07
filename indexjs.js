
// sliders "les petits nouveaux"
    $('.slick-carousel').slick({
    pauseOnFocus: true,
    arrows:false,
    autoplay:true,
    speed : 1000,
    infinite: true,
    slidesToShow: 7,
    slidesToScroll: 1,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 6,
            }
        },
        {
            breakpoint: 990,
            settings: {
                slidesToShow: 5,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
            }
        },
    ]
    });
