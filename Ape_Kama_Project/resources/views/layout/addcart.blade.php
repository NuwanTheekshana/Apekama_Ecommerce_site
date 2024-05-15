@include('layout.app')
        

<div class="header">

    <div class="row">
<div class="mb-5 col-lg-12" style="display: inline-block; float: right;">


<!-- Cart Start -->
<div class="cart-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8">
                <div class="cart-page-inner" id="itm_tbl_div">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            @if (count($addtocart) == 0)
                                <h1>No data found..!</h1>
                            @else
                            <thead class="thead-dark">
                                <tr>
                                    <th>Item Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            @endif
                            <tbody class="align-middle">
                                <?php
                                    $total_price = 0;
                                ?>
                                @foreach ($addtocart as $item)
                                <tr>
                                    <td>
                                        <div class="img" style="margin-left: 25%">
                                        <a href="#"><img src="http://127.0.0.1:8080/Ape_Kama_Project_admin/public/{{$item->item_image}}" alt="Image"></a>
                                    </td>
                    </div>


                                    <td><p>{{$item->item_name}} <input type="hidden" id="qty_val_id" name="qty_val_id[]" value="{{$item->id}}"></p></td>
                                    <td>Rs. {{number_format($item->item_price,2)}} <input type="hidden" value="{{$item->item_price}}" id="unit_price"></td>
                                    <td>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus" style="color: white"></i></button>
                                            <input type="text" id="qty_val" name="qty_val[]" value="{{$item->item_qty}}" readonly>
                                            <button class="btn-plus" id="btn-plus"><i class="fa fa-plus" style="color: white"></i></button>
                                            <p style="display: none" id="itm_id" name="itm_id[]">{{$item->id}}</p>
                                            {{-- <p style="color: red;margin-top:5px;" id="limit_error">fsf</p> --}}
                                        </div>
                                        
                                    </td>
                                    <td><button><i class="fa fa-trash" onclick="itmremove('{{$item->id}}');" style="color: white"></i></button></td>
                                </tr>
                                <?php 
                                    $total = $item->item_price * $item->item_qty;
                                    $total_price += $total;
                                ?>
                                @endforeach
                                <?php 
                                    
                                ?>
                             
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart-page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="coupon">
                                <input type="text" placeholder="Coupon Code">
                                <button>Apply Code</button>
                            </div>
                        </div>
                        <div class="col-md-12" id="summery_main_div">
                            <div class="cart-summary">
                                <div class="cart-content">
                                    <h1>Cart Summary</h1>
                                    <p>Sub Total<span id="val_sub_total_price">Rs. {{number_format($total_price,2)}}</span></p>
                                    <p>Shipping Cost<span>0</span></p>
                                    <h2>Grand Total<span id="val_total_price">Rs. {{number_format($total_price,2)}}</span></h2>
                                </div>
                                <div class="cart-btn">
                                    <button type="button" onclick="update_cart();" id="update_cart_btn">Update Cart</button>
                                    <button type="button" id="checkout_btn" onclick="checkout_btn();">Checkout</button>
                                    <p class="mt-2" id="error" style="color: red"></p>
                                </div>
                            </div>
                        </div>
                        
                        <input type="hidden" name="update-btn-status" id="update-btn-status" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart End -->


</div>




        </div>
    </div>
</div>

<script>
    function update_cart() 
    {

        var qty_val_id = $("input[name='qty_val_id[]']").map(function(){return $(this).val();}).get();
        var qty_val = $("input[name='qty_val[]']").map(function(){return $(this).val();}).get();
     
        $.ajax({
            type:'POST',
            headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
            },
            url:'{{url("/update_cart")}}',
            data:{id:qty_val_id, qty:qty_val},
            success:function(data){
                $("#summery_main_div").load(" #summery_main_div > *");
                $('#error').hide();
                $('#update-btn-status').val('1');
            }

        });

    }

    function checkout_btn() 
    {
        var update_status = $('#update-btn-status').val();

        if (update_status == 0) {
            $('#error').append("<b><i class='fa fa-info-circle' style='color:red'></i>&nbsp; Just click the update cart button..!</b>");
            return false;
        }
        else
        {
            window.location.href = '{{url("/checkout")}}';
        }


    }
    
</script>



<script>
    function itmremove(id) 
    {
        $.ajax({
                type:'get',
                headers: {
                    'X-CSRF-Token': '{{ csrf_token() }}',
                },
                url:'{{url("/addtocart_itm_remove")}}',
                data:{id:id},
                success:function(data)
                {
                    console.log(data.success);
                    $('#update-btn-status').val('0');
                    $("#itm_tbl_div").load(" #itm_tbl_div > *");
                }
                });
    }
</script>

@include('layout.footer')