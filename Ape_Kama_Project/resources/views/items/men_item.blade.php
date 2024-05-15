@include('layout.app')



<!-- Main Slider --> 
@include('layout.mainSlide')
<!-- Main Slider End -->

<div class="mb-5 ml-5 col-lg-8" style="display: inline-block; float: right;">

    <div class="row">

        @foreach ($find_men_cat_item as $men_item)
       

        <div class="col-md-3">
            <div class="product-item">
                <div class="product-title">
                    <a href="#">{{$men_item->item_name}}</a>
                   
                </div>
                <div class="product-image">
                    <a href="product-detail.html">
                        <img src="http://127.0.0.1:8080/Ape_Kama_Project_admin/public/{{$men_item->item_image}}" alt="Product Image">
                    </a>
                    <div class="product-action">
                        <input type="hidden" name="itm_id" id="itm_id" value="{{$men_item->id}}">
                        @if ($men_item->item_store_status == "0")
                        <button class="btn subbtn" id="favourite_btn" onclick="favorite('{{$men_item->id}}');" title="Favourite"><i class="fa fa-heart subbtn_icon"></i></button>
                        @else
                        <button class="btn mr-2 subbtn" id="add_to_card_btn" onclick="add_to_card_btn('{{$men_item->id}}');" title="Add to cart"><i class="fa fa-cart-plus subbtn_icon"></i></button>
                        <button class="btn subbtn" id="favourite_btn" onclick="favorite('{{$men_item->id}}');" title="Favourite"><i class="fa fa-heart subbtn_icon"></i></button>
                        @endif
                       
                    </div>
                </div>
                @if ($men_item->item_store_status == "0")
                    <div class="product-price">
                        <center><h3><span>Rs.</span>{{number_format($men_item->item_price,2)}}</h3></center> 
                        <center><i style="color: red">out of stock</i></center> 
                    </div>

                @else
                <div class="product-price">
                    <center><h3><span>Rs.</span>{{number_format($men_item->item_price,2)}}</h3></center>
                    <center><a class="btn mt-2" id="buynow_btn" href="{{url('product_details')}}/{{$men_item->id}}"><i class="fa fa-shopping-cart"></i>Buy</a></center>
                </div>
                    @endif
            </div>
        </div>
        @endforeach

        <!-- Pagination Start -->
        <div class="col-md-12">
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    {{ $find_men_cat_item->Links() }}
                </ul>
            </nav>
        </div>
        <!-- Pagination Start -->
        
    </div>








</div>



        </div>
    </div>
</div>

@include('items.Script.item_script')
@include('layout.footer')