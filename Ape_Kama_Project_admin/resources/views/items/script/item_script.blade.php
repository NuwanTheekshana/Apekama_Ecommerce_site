<script>
    $('#item_add_btn').click(function () 
    {
        var item_text = $('#item_text').val();
        $('#cat_code').val(item_text);
        $('#add_modal').modal('show');
    });
</script>
<script>
  $('#more_attachment_btn').click(function () 
  {
      $('#ex_image4_div').show(1000);
      $('#ex_image5_div').show(1000);
      $('#hide_more_attachment_btn').show(1000);
      $('#more_attachment_btn').hide(1000);
  });
  $('#hide_more_attachment_btn').click(function () 
  {
      $('#ex_image4_div').hide(1000);
      $('#ex_image5_div').hide(1000);
      $('#hide_more_attachment_btn').hide(1000);
      $('#more_attachment_btn').show(1000);
  });

</script>

<script>
  $('#item_image').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })
  $('#ex_image1').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })

  $('#ex_image2').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })

  $('#ex_image3').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })

  $('#ex_image4').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })

  $('#ex_image5').on('change',function(){
      //get the file name
      var fileName = $(this).val();
      //replace the "Choose a file" label
      $(this).next('.custom-file-label').html(fileName);
  })
</script>

<script>

    $('#item_option').change(function () 
    {
        var item_option = $("#item_option").val();
        
        if (item_option == "Yes") 
        {
            $('#item_option_div').show(1000);    
        }
        else
        {
            $('#item_option_div').hide(1000);
        }
    });



    $('#item_color').change(function () 
    {
        var item_color = $('#item_color').val();
        
        if (item_color) 
        {
            $('#add_color').show(1000);    
        }
        else
        {
            $('#add_color').hide(1000); 
        }
    });

    $('#color_add_btn').click(function () 
    {
        var add_color_value = $('#add_color_value').val();

        if (add_color_value == "") {
            $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Item colors name required..!',
            {
            type: 'danger',
            width: 500,
            delay: 5000,  
            });
            return false;
        }


        var item_color = $('#item_color').val();
        let currentId = new Date();
        let getid = currentId.getTime();
        $('#select_color_list').append('<div id="'+getid+'" class="form-group row"><input type="text" id="add_color_value" name="color_list_value[]" value="'+add_color_value+'" class="col-sm-6 form-control form-control-sm" readonly><a type="button" class="ml-2 mt-1" id="color_remove_btn" onclick="removebtn('+getid+');"><i class="fa fa-times" style="color:red"></i></a>       <input type="hidden" name="color_option_status" value="'+item_color+'" /></div>');
        $('#select_color_list').show(1000);
        $('#add_color_value').val('');
        count++;
    });


    $('#item_size').change(function () 
    {
        var item_size = $('#item_size').val();
        
        if (item_size) 
        {
            $('#add_size').show(1000);    
        }
        else
        {
            $('#add_size').hide(1000); 
        }
    });


    $('#color_size_btn').click(function () 
    {
        var add_size_value = $('#add_size_value').val();
        var item_size = $('#item_size').val();

        if (add_size_value == "") {
            $.bootstrapGrowl('<span class = "fas fa-info-circle"></span>&nbsp;&nbsp;&nbsp;Warning&nbsp;!&nbsp;Item size required..!',
            {
            type: 'danger',
            width: 500,
            delay: 5000,  
            });
            return false;
        }



        let currentId = new Date();
        let getid = currentId.getTime();
        $('#select_size_list').append('<div id="'+getid+'" class="form-group row"><input type="text" id="add_size_value" name="size_list_value[]" value="'+add_size_value+'" class="col-sm-6 form-control form-control-sm" readonly><a type="button" class="ml-2 mt-1" id="size_remove_btn" onclick="removebtn('+getid+');"><i class="fa fa-times" style="color:red"></i></a>         <input type="hidden" name="size_option_status" value="'+item_size+'" /></div>');
        $('#select_size_list').show(1000);
        $('#add_size_value').val('');
        count++;
    });

    function removebtn(id) 
    {
        var div_id = document.getElementById(id);
        div_id.parentNode.removeChild(div_id);
        count -= 1;
    }

    $(document).ready(function() 
    {
        count = 0;
    });    

</script>