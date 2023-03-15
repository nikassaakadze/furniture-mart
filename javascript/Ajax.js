$(document).ready(function(){

    //set filter by category 
      $('.widget_opts_list_item').on("click", function(){

        $('.widget_opts_list_item').removeClass('active_category')
        $(this).addClass('active_category')

        var category_id = $(this).attr('data-id')
        $('.sticky_category').attr('data-id', category_id)

        var category = $('.sticky_category')
        var categoryText = $('.category_text')
        var value = $(this).attr('data-name')

        category.attr('data-id', category_id)
        category.css("display", "flex")
        categoryText.text(value)

        value_max = $('.range-max').val()
        value_min = $('.range-min').val()

        if($('.sticky_color').attr('data-id')){
          var color = $('.sticky_color').attr('data-id') 
        }else{
          color = ''
        }

        $.ajax({
          type: 'POST',
          url: './functions/filter.php',
          data: {'category': category_id, 'color': color, 'min_val':value_min, 'max_val': value_max },
          beforeSend: function(){
            $('.product_cards').html(
              `
              <div class="filter-preloader-wrapper">
              </div>
              `
            )
          },
          success: function(data){
            $('.product_cards').html(data)
          }
        })

      })

  //remove category filter stick
  $('.category_remove').click(function(){

    $('.sticky_category').attr('data-id', '')

    if($('.sticky_color').attr('data-id')){
      var color = $('.sticky_color').attr('data-id') 
    }else{
      color = ''
    }

    $('.widget_opts_list_item').removeClass('active_category')
    $('.sticky_category').hide()
    
    value_max = $('.range-max').val()
    value_min = $('.range-min').val()

    $.ajax({
        url: './functions/filter.php',
        type: 'POST',
        data: {'min_val': value_min, 'max_val': value_max, 'category': '', 'color': color},
        beforeSend: function(){
          $('.product_cards').html(
            `
              <div class="filter-preloader-wrapper">
              </div>
            `
          )
        },
        success: function(data){
          $('.product_cards').html(data)
        }
      })
  })

  //set price range
  $('.price-filter-slider').on("change", () => {
    
    $('.sticky_price').css("display", "flex")
    var value_min = $('.range-min').val();
    var value_max = $('.range-max').val();

    if($('.sticky_color').attr('data-id')){
      var color = $('.sticky_color').attr('data-id') 
    }else{
      color = ''
    }

    if($('.sticky_category').attr('data-id')){
      var category = $('.sticky_category').attr('data-id') 
    }else{
      category = ''
    }

    $('.sticky_price_min').text(value_min)
    $('.sticky_price_max').text(value_max)

    $.ajax({
        url: './functions/filter.php',
        type: 'POST',
        data: {'min_val': value_min, 'max_val': value_max, 'category': category, 'color': color},
        beforeSend: function(){
          $('.product_cards').html(
            `
              <div class="filter-preloader-wrapper">
                
              </div>
            `
          )
        },
        success: function(data){
          $('.product_cards').html(data)
        }
      })
  })
  $('.price_remove').click(function(){
    
    if($('.sticky_color').attr('data-id')){
      var color = $('.sticky_color').attr('data-id') 
    }else{
      color = ''
    }

    if($('.sticky_category').attr('data-id')){
      var category = $('.sticky_category').attr('data-id') 
    }else{
      category = ''
    }

    $('.sticky_price').hide()

    // reset slider indicators
    $('.reset-min').val('1')
    $('.reset-max').val('400')

    $('.progress').css({"left": 0, "right": 0})
    
    value_max = $('.range-max').val()
    value_min = $('.range-min').val()

    $.ajax({
        url: './functions/filter.php',
        type: 'POST',
        data: {'min_val': value_min, 'max_val': value_max, 'category': category, 'color': color},
        beforeSend: function(){
          $('.product_cards').html(
            `
              <div class="filter-preloader-wrapper">
                
              </div>
            `
          )
        },
        success: function(data){
          $('.product_cards').html(data)
        }
      })
  })

  $('.color_option').click(function(){
    $('.sticky_color').css("display", "flex")

    if($('.sticky_category').attr('data-id')){
      var category = $('.sticky_category').attr('data-id') 
    }else{
      category = ''
    }

    $('.color_option').removeClass('color_option_active')
    $(this).addClass('color_option_active')

    var color_id = $(this).attr('data-id')
    var color_name = $(this).attr('data-name')

    $('.sticky_color_text').text(color_name)
    $('.sticky_color').attr('data-id', color_id)

    value_max = $('.range-max').val()
    value_min = $('.range-min').val()
  

    $.ajax({
        url: './functions/filter.php',
        type: 'POST',
        data: {'category': category, 'color': color_id, 'min_val': value_min, 'max_val':value_max },
        beforeSend: function(){
          $('.product_cards').html(
            `
              <div class="filter-preloader-wrapper">
                
              </div>
            `
          )
        },
        success: function(data){
          $('.product_cards').html(data)
        }
      })
  })

  $('.remove_sticky_color').click(function(){
    $('.sticky_color').attr('data-id', '')

    $('.color_option').removeClass('color_option_active')


    if($('.sticky_category').attr('data-id')){
      var category = $('.sticky_category').attr('data-id') 
    }else{
      category = ''
    }

    $('.sticky_color').hide()
    
    value_max = $('.range-max').val()
    value_min = $('.range-min').val()

    $.ajax({
        url: './functions/filter.php',
        type: 'POST',
        data: {'min_val': value_min, 'max_val': value_max, 'category': category, 'color': ''},
        beforeSend: function(){
          $('.product_cards').html(
            `
              <div class="filter-preloader-wrapper">
                
              </div>
            `
          )
        },
        success: function(data){
          $('.product_cards').html(data)
        }
      })
  })

  $(document).on('click', '.ft_tocart', function(){
    var product = $(this).attr('data_id')
    var loader = $(this).parent('.cart_conditls').find( $('.cart_btn_loeader'))
    var cartBtn = $(this)
    if($(this).attr('data-qty')){
      var quantity = $(this).attr('data-qty')
    }else{
      quantity = 1
    }
    $.ajax({
      type: 'POST',
      url: './functions/addToCart.php',
      data: {'quantity': quantity,'add_to_cart': product},
      beforeSend: function(){
        loader.show()
        cartBtn.hide()
      },
      success: function(data){
        loader.hide()
        cartBtn.show()
        $('.alert-popup').show()
          $('.popup-message-body').text(data)
          setTimeout(() => {
            $('.alert-popup').hide()
        }, 2000);
      }
    })
  })

   $('.cart-qty-btn').click(function(){
      var productId = $(this).attr("name")
      var $n = $(this).parent(".button-container").find(".qty");
      $.ajax({
        type: "POST",
        url: './functions/updateCart.php',
        data: {
          'product': productId, 
          'qunatity': $n.val()
        },
        beforeSend: function(){ },
        success: function(data){
          $('.total_amount_value').load(document.URL +  ' .total_amount_value');
          $('.total_amount_value').html(data)
        }
      })
    })
    $('.cart_item-remove').click(function(){
      var productId = $(this).attr('data-remove')
     $.ajax({
      type: 'POST',
      url: './functions/updateCart.php',
      data: {'removeItem': productId},
      success: function(){
        location.reload();
      }
     })
    })
})