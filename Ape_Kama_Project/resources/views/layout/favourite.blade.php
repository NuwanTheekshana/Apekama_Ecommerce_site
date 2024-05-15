@include('layout.app')


<div class="header">

            <div class="row justify-content-center">
             
                <div class="mb-5 col-10" style="display: inline-block; float: right;">
                    <!-- Cart Start -->
                    <div class="cart-page">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-page-inner" id="itm_fav_tbl_div">
                                    
                                        <div class="table-responsive">
                                            @if (count($fav_get_data) == 0)
                                                    <h1>No data found..!</h1>
                                                 @else
                                            <table class="table table-bordered">
                                                
                                                <thead class="thead-dark">
                                                    <tr>
                                                        <th>Item Image</th>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="align-middle">
                                               @foreach ($fav_get_data as $fav_data)
                                                   <tr>
                                                       <td>
                                                        <div class="img" style="margin-left: 35%">
                                                            <a href="#"><img src="http://127.0.0.1:8080/Ape_Kama_Project_admin/public/{{$fav_data->item_image}}" alt="Image"></a>
                                                        </div>
                                                       </td>
                                                       <td>{{$fav_data->item_name}}</td>
                                                       <td>Rs. {{number_format($fav_data->item_price,2)}}</td>
                                                       <td>
                                                        <button onclick="add_to_card_btn_fav('{{$fav_data->fav_id}}');" title="Add to cart"><i class="fa fa-cart-plus subbtn_icon"></i></button>
                                                        <button onclick="fav_remove('{{$fav_data->fav_id}}');" title="Remove Favourite"><i class="fa fa-trash" style="color: white"></i></button>
                                                       </td>
                                                   </tr>
                                               @endforeach
                                                 
                                                </tbody>
                                            </table>

                                            @endif
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






@include('layout.footer')