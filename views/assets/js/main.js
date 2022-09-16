// ------------ PRELOADER - ALL PAGES
window.addEventListener("load", function(){
  document.querySelector(".loader-in").className += " hidden";
});
$(() => {
  // ------------ Login options toggle active
  $(".header-login #listcards_logg").on("click", function(e){
    e.preventDefault();
    $(this).parent().find('.listoptions-login-content').slideToggle('medium');
  })

  // ------------ Cart Currency Search toggle active
  $(".header-cart a").on("click", function(e){
    e.preventDefault();
    $(this).parent().find('.shopping-cart-content').slideToggle('medium');
  })

  // ------------ MENU STICK
  var header = $('.transparent-bar');
  var win = $(window);

  win.on('scroll', function(){
    var scroll = win.scrollTop();
    if(scroll < 200){
      header.removeClass('stick');
    }else{
      header.addClass('stick');
    }
  });

  // ------------ jQuery MeanMenu
  $('#mobile-menu-active').meanmenu({
    meanScreenWidth: "991",
    meanMenuContainer: ".mobile-menu-area .mobile-menu",
  });

  // ------------ COUNTDOWN
  $('[data-countdown]').each(function(){
    var $this = $(this),
    finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function(event) {
      $this.html(event.strftime('<span class="cdown day">%-D <p>Days</p></span> <span class="cdown hour">%-H <p>Hour</p></span> <span class="cdown minutes">%M <p>Min</p></span class="cdown second"> <span>%S <p>Sec</p></span>'));
    });
  });

  // ------------ SCROLLUP
  $.scrollUp({
    scrollText: '<i class="fa fa-angle-double-up"></i>',
    easingType: 'linear',
    scrollSpeed: 900,
    animation: 'fade'
  });

  // ------------ IR HACIA LA PÁGINA - CART LIST
  $(document).on("click","#lk_cart",function(){window.location.href = "./cart-page";});
  // ------------ IR HACIA LA PÁGINA - CHECKOUT
  $(document).on("click","#lk_checkout",function(){window.location.href = "./checkout";});
});