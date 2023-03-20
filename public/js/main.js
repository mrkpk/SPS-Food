
$(function() {
    new VenoBox({
        selector: ".venobox"
    });

});

$('.owl-carousel').owlCarousel({
    center:true,
    loop:false,
    margin:5,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
    }
})