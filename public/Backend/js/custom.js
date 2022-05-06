  /**===== find location */ 
  $('body').on('click', '#main_location', function(){
    
    var location_id = $(this).attr('data-id');
    $.ajax({
      url: 'edit-location'+'/'+location_id,
      method: 'get',
      success: function(result){
        $("#location_name").val(result.location_name);
        $("#location_id").val(result.id);
        console.log(result);
      }
    });
  });
  /**===== find sub location */ 
  $('body').on('click', '#sub_location', function(){
    
    var sub_location_id = $(this).attr('data-id');
    $.ajax({
      url: 'edit-sub-location'+'/'+sub_location_id,
      method: 'get',
      success: function(result){
        $("#sub_location_name").val(result.sub_location_name);
        $("#sub_location_id").val(result.id);
        console.log(result);
      }
    });
  });

    /**===== find category */ 
    $('body').on('click', '#main_category', function(){
    
      var category_id = $(this).attr('data-id');
      $.ajax({
        url: 'edit-category'+'/'+category_id,
        method: 'get',
        success: function(result){
          $("#category_name").val(result.category_name);
          $("#category_id").val(result.id);
          console.log(result);
        }
      });
    });
    /**===== find sub_category */ 
    $('body').on('click', '#sub_category', function(){
      
      var sub_category_id = $(this).attr('data-id');
      $.ajax({
        url: 'edit-sub-category'+'/'+sub_category_id,
        method: 'get',
        success: function(result){
          $("#sub_category_name").val(result.sub_category_name);
          $("#sub_category_id").val(result.id);
          console.log(result);
        }
      });
    });
  
  /**===== find category by menu name end */ 

  $('body').on('change', '#verify_card', function(){
    var type = $(this).val();
    if(type == 1)
    {
      $('#nid').removeClass('d-none');
      $('#passport').addClass('d-none');
      $('#driving_l').addClass('d-none');
      $('#birth_c').addClass('d-none');

    }else if(type == 2)
    {
      $('#nid').addClass('d-none');
      $('#passport').removeClass('d-none');
      $('#driving_l').addClass('d-none');
      $('#birth_c').addClass('d-none');
    }else if(type == 3)
    {
      $('#nid').addClass('d-none');
      $('#passport').addClass('d-none');
      $('#driving_l').removeClass('d-none');
      $('#birth_c').addClass('d-none');
    }else if(type == 4)
    {
      $('#nid').addClass('d-none');
      $('#passport').addClass('d-none');
      $('#driving_l').addClass('d-none');
      $('#birth_c').removeClass('d-none');
    }
  });

  $('body').on('click', '.get_sub_location', function(){
    var val = $(this).attr('data-id');
    $.ajax({
      url: 'get-sub-location'+'/'+val,
      method: 'get',
      success: function(result){
        console.log(result);
      }
    });
  });