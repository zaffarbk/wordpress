const wrapper = document.querySelector('.wrapper');
const menu = document.querySelector('.menu');
const body = document.querySelector('body');
const nav = document.querySelector('.header__nav');
const menuClose = document.querySelector('.menu-close');
const modalBtn = document.querySelector('.Modal__btn');

const modal = document.querySelector('.Modal')
const orderBtns = document.querySelectorAll('.modal-btn');

Array.from(orderBtns).forEach(orderBtn => {
    orderBtn.addEventListener('click', () => {
        modal.classList.add('active')
        wrapper.classList.add('active')
        body.style.overflow = 'hidden'
    })
})
menu.addEventListener('click', () => {
    wrapper.classList.add('active')
    body.style.overflow = 'hidden'
    nav.classList.add('active')
})
wrapper.addEventListener('click', () => {
    wrapper.classList.remove('active')
    nav.classList.remove('active')
    body.style.overflow = 'visible'
    modal.classList.remove('active')
});
menuClose.addEventListener('click', () => {
    wrapper.classList.remove('active')
    nav.classList.remove('active')
    body.style.overflow = 'visible'
})
modalBtn.addEventListener('click', () => {
    wrapper.classList.remove('active')
    body.style.overflow = 'visible'
    modal.classList.remove('active')
})
// ///////////////////////////////////////////////////
if (document.querySelector('.intro__swiper-container')) {
    var swiper = new Swiper('.intro__swiper-container', {
        slidesPerView: 1,
        centerMode: true,
        loop: true,
        pagination: {
            el: '.intro__swiper-pagination',
        },
    });
}
//////////////////////////////////////////////////////////////////////
let map;
function initMap() {
    if (document.getElementById("map__content")) {
        map = new google.maps.Map(document.getElementById("map__content"), {
            center: new google.maps.LatLng(41.3531653, 69.2509896),
            zoom: 10,
        });
        const marker = new google.maps.Marker({
            position: new google.maps.LatLng(41.3531653, 69.2509896),
            icon: {
                url: 'http://wellmed.loc/wp-content/themes/wellmed/assets/img/map-img.png',
                scaledSize: new google.maps.Size(362, 160),
            },
            map: map,
        });
    };
}
// /////////////////////////////////////////////////////////////////