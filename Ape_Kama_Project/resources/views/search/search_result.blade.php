@include('layout.app')



<!-- Main Slider --> 
@include('layout.mainSlide')
<!-- Main Slider End -->

            <div class="mb-5 ml-5 col-lg-8" style="display: inline-block; float: right;">

                <div class="row">
                {{-- @foreach ($find_data as $item)
                    <p>{{$item->item_name}}</p>
                @endforeach --}}
                </div>
                @foreach ($find_data as $item)
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-3 mr-2">
                                <img src="http://127.0.0.1:8080/Ape_Kama_Project_admin/public/{{$item->item_image}}" alt="">

                            </div>
                            <div class="col-6">
                                <a href="{{url('product_details')}}/{{$item->id}}">
                                    <div class="title ml-5"><h2>{{$item->item_name}}</h2></div>
                                    <h4 class="ml-5">{{$item->main_cate_name}}</h4>
                                </a>
                                <div class="price ml-5">
                                    <h4>Price</h4>
                                    <h4>Rs. {{number_format($item->item_price,2)}}</h4>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-success" onclick="add_to_card_btn('{{$item->id}}');">Add to cart</button>
                                <button class="btn btn-success mt-2" onclick="favorite('{{$item->id}}');">Add to Favourite</button>
                            </div>


                        </div>
                        
                    </div>
                </div>
                @endforeach


            </div>



        </div>
    </div>
</div>


@include('layout.footer')