window.onload = function(){

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

}

$(window).resize(function() {
  responsive()
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
    $('.search-responsive-nav-inner').append($('.main-search-form'))
    $('.search-item-clickable').click(() =>{
      $('.search-responsive-nav').animate({height: 'show'}, 200)
    })

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
    $('.header-middle-drawer').append($('.main-search-form'))
    $('.search-responsive-nav').hide()
  }
}