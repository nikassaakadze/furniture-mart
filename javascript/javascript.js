window.onload = function(){


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
     amountSetter()

}

document.querySelector(".preloader").style.display = "none";

function searchAppend(){
var resForm = document.querySelector('.responsive_sidenav_search')
var mnForm = document.querySelector('.header_search_widget')
resForm.appendChild(mnForm)
}

function amountSetter() {
  $('.cart_total').text(localStorage.getItem('total-amount') + '.00$')
}

function responsive(){

  if (window.matchMedia('(max-width: 779px)').matches) {
    $('.filters-fade-body').append( $('.option_widgets'))
    $('.responsive-sidenav-body').append($('.header_navigation_widget'))

    $('.menu-icon-hidden').click(() => {
      $('.header_navigation_widget').show()
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

$(window).resize(function() {
  responsive()
  responsiveFilters()
});

function responsiveFilters(){
  if (window.matchMedia('(max-width: 779px)').matches) {

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