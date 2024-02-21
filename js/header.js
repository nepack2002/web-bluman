$(document).ready(function() {
     $('.navbar-toggler').click(function() { //ấn nào button
          setTimeout(function() {
               $('.navbar-nav.ms-auto').toggleClass('d-none');
          }, 500); // Thêm delay 1 giây (1000ms) trước khi toggle class
          $('.nav-item.login-header').toggleClass('d-none');
          $('.menu-top').toggleClass('d-none');
     });
     $('.close-menu').click(function() {
          $('.navbar-collapse').removeClass('show');
          $('.navbar-nav.ms-auto').toggleClass('d-none');
          $('.nav-item.login-header').toggleClass('d-none');
          $('.menu-top').toggleClass('d-none');
     });
     $(window).resize(function () {
          var screenWidth = $(window).width();
          if ($('.navbar-collapse').hasClass('show') && screenWidth > 992) {
              $('.navbar-collapse').removeClass('show');
              $('.navbar-nav.ms-auto').removeClass('d-none');
              $('.nav-item.login-header').removeClass('d-none');
              $('.menu-top').toggleClass('d-none');
          }
      });
});