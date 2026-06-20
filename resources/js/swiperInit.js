document.addEventListener('DOMContentLoaded', () => {
  new Swiper('.mySwiper', {
  slidesPerView: 1,
  spaceBetween: 30,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1536: {
      slidesPerView: 3,
      spaceBetween: 15,
    },
  },
  freeMode: true,
  loop: true,
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  });
});