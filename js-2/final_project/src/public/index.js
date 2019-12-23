import '@babel/polyfill'
import appMain from './js/app.js'
import './css/main.css'

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
  (function() {

    function addSeparator(nStr) {
      nStr += '';
      var x = nStr.split('.');
      var x1 = x[0];
      var x2 = x.length > 1 ? '.' + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
      }
      return x1 + x2;
    }

    function rangeInputChangeEventHandler(e){
      var rangeGroup = $(this).attr('name'),
        minBtn = $(this).parent().children('.min'),
        maxBtn = $(this).parent().children('.max'),
        range_min = $(this).parent().children('.range_min'),
        range_max = $(this).parent().children('.range_max'),
        minVal = parseInt($(minBtn).val()),
        maxVal = parseInt($(maxBtn).val()),
        origin = $(this).context.className;

      if(origin === 'min' && minVal > maxVal-5){
        $(minBtn).val(maxVal-5);
      }
      var minVal = parseInt($(minBtn).val());
      $(range_min).html(addSeparator(minVal*1000) + ' €');


      if(origin === 'max' && maxVal-5 < minVal){
        $(maxBtn).val(5+ minVal);
      }
      var maxVal = parseInt($(maxBtn).val());
      $(range_max).html(addSeparator(maxVal*1000) + ' €');
    }

    $('input[type="range"]').on( 'input', rangeInputChangeEventHandler);
  })();
});

const app = new Vue(appMain);