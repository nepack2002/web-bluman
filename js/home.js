document.addEventListener('DOMContentLoaded', function() {
     function handleFeatureVisibility() {
          const images = document.querySelectorAll('.image-container');
          const texts = document.querySelectorAll('.text-left-container, .text-right-container');
          const windowTop = 0;
          const windowBottom = window.innerHeight;

          images.forEach((image, index) => {
               const imagePosition = image.getBoundingClientRect();
               const text = texts[index];
               const textPosition = text.getBoundingClientRect();

               // Kiểm tra nếu cả image và text không còn trong tầm nhìn của người dùng
               if (
                    imagePosition.bottom < windowTop ||
                    imagePosition.top > windowBottom ||
                    textPosition.bottom < windowTop ||
                    textPosition.top > windowBottom
               ) {
                    image.classList.remove('visible');
                    text.classList.remove('visible');
               } else {
                    image.classList.add('visible');
                    text.classList.add('visible');
               }
          });
     }
     window.addEventListener("scroll", handleFeatureVisibility);
     window.addEventListener("resize", handleFeatureVisibility);
     $(document).ready(function(){
    if ($(window).width() < 1200) {
      $('.list-product').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
      });
    }
    
    $(window).resize(function(){
      if ($(window).width() < 1200) {
        if ($('.list-product').hasClass('slick-initialized')) {
          $('.list-product').slick('unslick');
        }
        $('.list-product').slick({
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: true,
          arrows: true, // Bật mũi chuyển
    prevArrow: '<button type="button" class="slick-prev">Previous</button>',
    nextArrow: '<button type="button" class="slick-next">Next</button>',
          // Các tùy chọn khác nếu cần thiết
        });
      } else {
        if ($('.list-product').hasClass('slick-initialized')) {
          $('.list-product').slick('unslick');
        }
      }
    });
  });
});