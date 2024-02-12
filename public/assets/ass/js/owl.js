$(document).ready(function(){
    $('.owl-carousel').owlCarousel({
        rtl:true,
        loop:true,
        items: 3,
        margin: 10,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        dots: false,
        responsive:{
            0:{
                items:1,
                nav:true
            },
            600:{
                items:2,
                nav:false
            },
            1000:{
                items:3,
                nav:true,
            }
        }
    })
});