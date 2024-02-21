document.addEventListener('DOMContentLoaded', function() {
     function handleFeatureVisibility() {
          const image = document.getElementById('image');
          const text = document.getElementById('text');
          const imagePosition = image.getBoundingClientRect();
          const textPosition = text.getBoundingClientRect();
          const windowTop = 0;
          const windowBottom = window.innerHeight;

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
     }
     window.addEventListener("scroll", handleFeatureVisibility);
     window.addEventListener("resize", handleFeatureVisibility);

     function handleBannerVisibility() {
          const banner = document.getElementById('banner');
          const bannerPosition = banner.getBoundingClientRect().top;
          const windowHeight = window.innerHeight;

          if (bannerPosition < windowHeight / 1.1) {
               banner.classList.add('visible'); // Thêm lớp visible khi banner ở nửa trang trên
          } else {
               banner.classList.remove('visible'); // Loại bỏ lớp visible khi banner ở nửa dưới trang
          }
     }
     window.addEventListener("scroll", handleBannerVisibility);
});