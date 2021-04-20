function(e) {
  e.preventDefault();
  removeFill();
  $('.sm-search-container').removeClass('is-active');
  $(".ts__dropdown__trigger").removeClass('dropdown-is-active');
  $(".dropdown-category").removeClass('dropdown-is-active');
  $('.sm-main-menu').removeClass('is-active');
  $('.product-cart-status').toggleClass('is-active');
  if ($('.product-cart-status').hasClass('is-active')) {
    $('.body-overlay').addClass('is-visible');
    $(this).addClass('active-bg');
  } else {
    $('.body-overlay').removeClass('is-visible');
  }

}