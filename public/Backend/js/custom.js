
  /**===== find location */ 
  $('body').on('click', '#main_location', function(){
    
    var location_id = $(this).attr('data-id');
    $.ajax({
      url: 'edit-location'+'/'+location_id,
      method: 'get',
      success: function(result){
        $("#location_name").val(result.location_name);
        $("#location_id").val(result.id);
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
    $('#sub-area-list').html('');
    $.ajax({
      url: 'get-sub-location'+'/'+val,
      method: 'get',
      success: function(result){
        $.each(result, function (key, value) {
          var data =  "<div class='sub-area-item-div'>"+
                      "<input type='checkbox' name='sub_location[]' id='sub_location"+value.id+"' class='d-none'  value="+value.id+" >"+
                      "<label for='sub_location"+value.id+"' class='sub-area-item'>"+value.sub_location_name+"</label>"
                    "</div>";
          $('#sub-area-list').append(data);
        });
      }
    });
  });
  
  $('body').on('click', '.get_sub_category', function(){
    var val = $(this).attr('data-id');
    $('#sub-category-list').html('');
    $.ajax({
      url: 'get-sub-category'+'/'+val,
      method: 'get',
      success: function(result){
        $.each(result, function (key, value) {
          var data = "<div class='sub-category-item-div'>"+
                      "<input type='radio' name='sub_category' id='sub_category"+value.id+"' class='d-none'  value="+value.id+" >"+
                      "<label for='sub_category"+value.id+"' class='sub-category-item'>"+value.sub_category_name+"</label>"
                    "</div>"
          $('#sub-category-list').append(data);
        });
      }
    });
  });
  
  $('body').on('click', '.add-new-works-step', function(){

    var step_id = $(".stepid:last").html();
    var step_id = parseInt(step_id);
    var step = step_id+1;
    var data = "<div class='text-label-join mb-3 bg-softer pwjs'>"+
                    "<label for=''>Step <span class='stepid'>"+step+"</span></label>"+
                    "<i class='stpsCloseBtn fa fa-times-circle' aria-hidden='true' ></i>"+
                    "<textarea name='workSteps[]' class='form-control' rows='2'></textarea>"+
                "</div>";
          $('.post-job-work-step').append(data);
  });
  
  $('body').on('click', '.stpsCloseBtn', function(){
    $(this).closest(".pwjs").remove();
  });

  $('body').on('change', '#worker_need', function(){
    var worker_need = $(this).val();
    var each_worker_earn = $('#each_worker_earn').val();

    var total = worker_need*each_worker_earn;
    var total = total.toFixed(3);
    $('#total_spend').val(total);

    if(total >= 0.80){
      $('#spend1').addClass('d-none');
    }else{
      $('#spend1').removeClass('d-none');
    }
  });

  $('body').on('change', '#each_worker_earn', function(){
    var each_worker_earn = $(this).val();
    var worker_need = $('#worker_need').val();

    var total = worker_need*each_worker_earn;
    var total = total.toFixed(3);
    $('#total_spend').val(total);

    if(total >= 0.80){
      $('#spend1').addClass('d-none');
    }else{
      $('#spend1').removeClass('d-none');
    }
  });

  $('body').on('click', '.withdraw_payment_method', function(){
    $('#withdraw_amount').val(3.5294);
    var percent = (3.5294*10)/100;
    var total = (3.5294+percent);
    var total =  total.toFixed(3);
    var check_total = parseInt(total);

    $.ajax({
      url: 'get-user-amount',
      method: 'get',
      success: function(result){
        if(result){
          var result = parseInt(result);
          if(result > check_total){
            $('#ddTotal').html('Total');
            $('#ddTotal').removeClass('bg-danger');
            $('#withdraw_submit').prop('disabled', false);
          }else{
            $('#ddTotal').html('INSUFFICIENT');
            $('#ddTotal').addClass('bg-danger');
            $('#withdraw_submit').prop('disabled', true);
          }
        }else{
          $('#ddTotal').html('INSUFFICIENT');
          $('#ddTotal').addClass('bg-danger');
          $('#withdraw_submit').prop('disabled', true);
        }
      }
    });

    $('#total_withdraw').val('$'+total);
    $('#withdraw_message').removeClass('d-none');
  });
  
  $('body').on('change', '#withdraw_amount', function(){
    var amount = $(this).val();
    var percent = (amount*10)/100;
    var total = parseFloat(amount) + parseFloat(percent);
    var total =  total.toFixed(3);
    var check_total = parseInt(total);

    $.ajax({
      url: 'get-user-amount',
      method: 'get',
      success: function(result){
        if(result){
          var result = parseInt(result);
          if(result > check_total){
            $('#ddTotal').html('Total');
            $('#ddTotal').removeClass('bg-danger');
            $('#withdraw_submit').prop('disabled', false);
          }else{
            $('#ddTotal').html('INSUFFICIENT');
            $('#ddTotal').addClass('bg-danger');
            $('#withdraw_submit').prop('disabled', true);
          }
        }else{
          $('#ddTotal').html('INSUFFICIENT');
          $('#ddTotal').addClass('bg-danger');
          $('#withdraw_submit').prop('disabled', true);
        }
      }
    });

    $('#total_withdraw').val('$'+total);
    $('#withdraw_message').removeClass('d-none');
  });

  