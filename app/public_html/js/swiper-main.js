// JavaScript Document
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 300,
      centeredSlides: true,
      autoplay: {
        delay: 2500,
		speed: 6000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: false,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });