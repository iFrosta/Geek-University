$(document).ready(function(){
    $('#browse-menu').css("display","none");
    $('#form').mouseover(function () {
        $('#browse-menu').css("display","flex");
    });
    $('#form').mouseout(function () {
        $('#browse-menu').css("display","none");
    });

    $('#header-right').mouseover(function () {
        $('#cart-inside').css("display","block");
    });
    $('#cart-inside').mouseout(function () {
        $('#cart-inside').css("display","none");
    });
});