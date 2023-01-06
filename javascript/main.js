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

}

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
