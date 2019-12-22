$(document).ready(function () {
  $('#browse-menu').css("display", "none");
  $('#form').mouseover(function () {
    $('#browse-menu').css("display", "flex");
  });
  $('#form').mouseout(function () {
    $('#browse-menu').css("display", "none");
  });
  // $('#header-right').mouseover(function () {
  //   $('#cart-inside').css("display", "block");
  // });
  // $('#cart-inside').mouseout(function () {
  //   $('#cart-inside').css("display", "none");
  // });
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

  // let items = document.querySelectorAll('.box');
  // items.forEach(el => {
  //   console.log(el);
  // });
  // console.log(items);
  
  // let sub = document.getElementById('browse-menu');
  // console.log(sub);
  //
  // sub.addEventListener("click", function(){
  //   let sub = document.getElementById('browse-menu');
  //   console.log('click');
  //   let style = window.getComputedStyle(sub);
  //   let subDisplay = style.getPropertyValue('display');
  //   console.log(subDisplay);
  //   if (subDisplay !== 'none') {
  //     sub.style.color = 'red';
  //   }
  // });


  // if(sub.has())
});