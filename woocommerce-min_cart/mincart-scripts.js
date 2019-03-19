// DOC READY
$(document).ready(function() {

/* Open Minicart on click */

$('.header-cart-count a.cart_counter').click(function( event ){
  event.preventDefault();
  $(this).parent().toggleClass('minicart_active');
})


$("body").mouseup(function(){ 
  if($('.header-cart-count').hasClass('minicart_active')){
    $('.header-cart-count').removeClass('minicart_active');
  }

  $(".min_cart_wrp").mouseup(function(event){ 
    event.stopPropagation();
  });

  $('.header-cart-count a.cart_counter').click(function( event ){
    event.preventDefault();
    $(this).parent().toggleClass('minicart_active');
  })

});

});