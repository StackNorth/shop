var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    effect: 'cube',
    grabCursor: true,
    autoplay: 3000,
    speed: 1500,
    cube: {
        shadow: true,
        slideShadows: true,
        shadowOffset: 30,
        shadowScale: 0.8
    }
});