$(document).ready(function(){

    //set filter by category 
    $('.category-widget_category-listItem').click(function(){

      $('.sticky-category').show()

      var color = ''
      if($('.sticky-color').attr('data-id')){
        color = $('.sticky-color').attr('data-id') 
      }

      $('.category-widget_category-listItem').removeClass('active-category')
      $(this).addClass('active-category')
  
      var category_id = $(this).attr('data-id')
      var category_name = $(this).attr('data-name')

      $('.sticky-category-name').text(category_name)
      $('.sticky-category').attr('data-id', category_id)
      
      value_max = $('.range-max').val()
      value_min = $('.range-min').val()
      $.ajax({
          type: 'POST',
          url: 'functions/filter.php',
          data: {'category': category_id, 'color': color, 'min_val':value_min, 'max_val': value_max },
          beforeSend: function(){
            $('.shop-page-cards').html(
              `
                <div class="filter-preloader-wrapper">
                  <img src="https://powerusers.microsoft.com/t5/image/serverpage/image-id/118082i204C32E01666789C/image-size/large/is-moderation-mode/true?v=v2&px=999" alt="loading...">
                </div>
              `
            )
          },
          success: function(data){
            $('.shop-page-cards').html(data)
          }
        })
    })

  //remove category filter stick
  $('.remove-sticky-category').click(function(){

    var color = ''
    if($('.sticky-color').attr('data-id')){
      color = $('.sticky-color').attr('data-id') 
    }

    $('.category-widget_category-listItem').removeClass('active-category')
    $('.sticky-category').hide()
    
    value_max = $('.range-max').val()
    value_min = $('.range-min').val()
    $.ajax({
        url: 'functions/filter.php',
        type: 'POST',
        data: {'min_val': value_min, 'max_val': value_max, 'category': '', 'color': color},
        beforeSend: function(){
          $('.shop-page-cards').html(
            `
              <div class="filter-preloader-wrapper">
                <img src="https://powerusers.microsoft.com/t5/image/serverpage/image-id/118082i204C32E01666789C/image-size/large/is-moderation-mode/true?v=v2&px=999" alt="loading...">
              </div>
            `
          )
        },
        success: function(data){
          $('.shop-page-cards').html(data)
        }
      })
  })

  //set price range
  $('.price-filter-slider').on("change", () => {
    
    $('.sticky-price').show()
    var value_min = $('.range-min').val();
    var value_max = $('.range-max').val();

    var color = ''
    if($('.sticky-color').attr('data-id')){
      color = $('.sticky-color').attr('data-id') 
    }

    var category = ''
    if($('.sticky-category').attr('data-id')){
      category = $('.sticky-category').attr('data-id') 
    }

    $('.price-sticky__priceMinVal').text("GEL " + value_min)
    $('.price-sticky__priceMaxVal').text("GEL " + value_max)

    $.ajax({
        url: 'functions/filter.php',
        type: 'POST',
        data: {'min_val': value_min, 'max_val': value_max, 'category': category, 'color': color},
        beforeSend: function(){
          $('.shop-page-cards').html(
            `
              <div class="filter-preloader-wrapper">
                <img src="https://powerusers.microsoft.com/t5/image/serverpage/image-id/118082i204C32E01666789C/image-size/large/is-moderation-mode/true?v=v2&px=999" alt="loading...">
              </div>
            `
          )
        },
        success: function(data){
          $('.shop-page-cards').html(data)
        }
      })
  })
  $('.remove-sticky-price').click(function(){

    var color = ''
    if($('.sticky-color').attr('data-id')){
      color = $('.sticky-color').attr('data-id') 
    }

    var category = ''
    if($('.sticky-category').attr('data-id')){
      category = $('.sticky-category').attr('data-id') 
    }

    $('.sticky-price').hide()

    // reset slider indicators
    $('.reset-min').val('1')
    $('.reset-max').val('400')

    $('.progress').css({"left": 0, "right": 0})
    
    value_max = $('.range-max').val()
    value_min = $('.range-min').val()

    $.ajax({
        url: 'functions/filter.php',
        type: 'POST',
        data: {'min_val': value_min, 'max_val': value_max, 'category': category, 'color': color},
        beforeSend: function(){
          $('.shop-page-cards').html(
            `
              <div class="filter-preloader-wrapper">
                <img src="./assets/svg/loader.svg" alt="loading...">
              </div>
            `
          )
        },
        success: function(data){
          $('.shop-page-cards').html(data)
        }
      })
  })

  $('.color-option-circle').click(function(){
    $('.sticky-color').show()

    var category = ''
    if($('.sticky-category').attr('data-id')){
      category = $('.sticky-category').attr('data-id') 
    }

    $('.color-option-circle').removeClass('active-color')
    $(this).addClass('active-color')

    var color_id = $(this).attr('data-id')
    var color_name = $(this).attr('data-name')

    $('.sticky-color-name').text(color_name)
    $('.sticky-color').attr('data-id', color_id)

    value_max = $('.range-max').val()
    value_min = $('.range-min').val()
  

    $.ajax({
        url: 'functions/filter.php',
        type: 'POST',
        data: {'category': category, 'color': color_id, 'min_val': value_min, 'max_val':value_max },
        beforeSend: function(){
          $('.shop-page-cards').html(
            `
              <div class="filter-preloader-wrapper">
                <img src="https://powerusers.microsoft.com/t5/image/serverpage/image-id/118082i204C32E01666789C/image-size/large/is-moderation-mode/true?v=v2&px=999" alt="loading...">
              </div>
            `
          )
        },
        success: function(data){
          $('.shop-page-cards').html(data)
        }
      })
  })

  $('.remove-sticky-color').click(function(){

    var category = ''
    if($('.sticky-category').attr('data-id')){
      category = $('.sticky-category').attr('data-id') 
    }

    $('.sticky-color').hide()
    
    value_max = $('.range-max').val()
    value_min = $('.range-min').val()

    $.ajax({
        url: 'functions/filter.php',
        type: 'POST',
        data: {'min_val': value_min, 'max_val': value_max, 'category': category, 'color': ''},
        beforeSend: function(){
          $('.shop-page-cards').html(
            `
              <div class="filter-preloader-wrapper">
                <img src="./assets/svg/loader.svg" alt="loading...">
              </div>
            `
          )
        },
        success: function(data){
          $('.shop-page-cards').html(data)
        }
      })
  })
})