$(document).ready(function () {
  $('#browse-menu').css("display", "none");
  $('#form').mouseover(function () {
    $('#browse-menu').css("display", "flex");
  });
  $('#form').mouseout(function () {
    $('#browse-menu').css("display", "none");
  });
  $(window).scroll(function () {
    let body = $('body');
    let nav = $('nav');
    let header = $('header'),
      scroll = $(window).scrollTop();
    if (scroll >= 102) nav.addClass('sticky-nav');
    else nav.removeClass('sticky-nav');
    if (scroll >= 102) body.addClass('sticky-margin');
    else body.removeClass('sticky-margin');
  });
});