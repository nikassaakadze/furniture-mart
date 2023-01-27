window.onload = function(){

  document.querySelector(".preloader").style.display = "none";

  //lazy load images
  const images = document.querySelectorAll("[data-src]");
    function preloadImage(e) {
        const r = e.getAttribute("data-src");
        r && (e.src = r);
    }
    const imgOptions = {},
    imgObserver = new IntersectionObserver((e, r) => {
        e.forEach((e) => {
            e.isIntersecting && (preloadImage(e.target), r.unobserve(e.target));
        });
    }, imgOptions);
    images.forEach((e) => {
        imgObserver.observe(e);
    });


    responsive()
    responsiveFilters()

}

jQuery(document).ready(function($) {
  
  if( getCookie('popupCookie') != 'submited'){ 
    if(getCookie('popupCookie') != 'closed' ){
      $('.popup-overlay').css("display", "flex").hide().fadeIn();
    }
  }
  
  $('a.close').click(function(){
    $('.popup-overlay').fadeOut();
    //sets the coookie to one minute if the popup is closed (whole numbers = days)
    setCookie( 'popupCookie', 'closed', 7);
  });
  
  $('a.submit').click(function(){
    $('.popup-overlay').fadeOut();
    //sets the coookie to five minutes if the popup is submited (whole numbers = days)
    setCookie( 'popupCookie', 'submited', 7 );
  });

  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  
});

$(window).resize(function() {
  responsive()
  responsiveFilters()
});

$(window).scroll(function() 
  {
    if ($(this).scrollTop() > 300)
  {
    $('.main-header').addClass("sticky_header")
  }
  else  if ($(this).scrollTop() == 0)
  {
    $('.main-header').removeClass("sticky_header");
  }
});

function responsive(){
  if (window.matchMedia('(max-width: 779px)').matches) {

    $('.filters-fade-body').append( $('.shop-page-filters'))
    
    $('.search-item-clickable').click(() =>{
      $('.search-responsive-nav').slideToggle({height: 'show'}, 200)
    })

    $(document).on('click',function(e){
      if(!(($(e.target).closest(".search-responsive-nav").length > 0 ) || ($(e.target).closest(".search-item-clickable").length > 0))){
      $(".search-responsive-nav").animate({height: 'hide'}, 200)
     }
    });

    $('.responsive-sidenav-body').append($('.status-bar-navigation-list'))

    $('.menu-icon-hidden').click(() => {
      $('.status-bar-navigation-list').show()
      $('.responsive-sidenav').animate({width: 'show'}, 200)
  
      $(document).on('click',function(e){
        if(!(($(e.target).closest(".responsive-sidenav").length > 0 ) || ($(e.target).closest(".menu-icon-hidden").length > 0))){
        $(".responsive-sidenav").animate({width: 'hide'}, 200)
       }
      });
    })

    $('.close-responsive-sidenav').click(() => {
      $('.status-bar-navigation-list').hide()
      $('.responsive-sidenav').animate({width: 'hide'}, 200)
    })
  }else{
    $('.responsive-sidenav').hide()
    $('.status-bar-navigation').append($('.status-bar-navigation-list'))
    $('.search-responsive-nav').hide()
  }
}

function responsiveFilters(){
  if (window.matchMedia('(max-width: 1000px)').matches) {

    $('.filters-fade-body').append( $('.shop-page-filters'))

    $('.shop-filters-responsive-option').click(() => {
      $('.filters-responsive-fade').animate({width: 'show'}, 200)
    })
    $('.filters-nav-close').click(() => {
      $('.filters-responsive-fade').animate({width: 'hide'}, 200)
    })

  }else{
    $('.shop-page-filters').insertBefore($('.shop-page-cards'))
  }
}