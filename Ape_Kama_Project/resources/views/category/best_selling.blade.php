@include('layout.app')



<!-- Main Slider --> 
@include('layout.mainSlide')
<!-- Main Slider End -->

<div class="mb-5 ml-5 col-lg-8" style="display: inline-block; float: right;">

    <div class="row">

            @foreach ($find_best_selling as $best)
            <div class="col-lg-3 mb-2 mt-2">
                <div class="product-item">
                    <div class="product-image">
                        <a href="product-detail.html">
                            <img src="http://127.0.0.1:8080/Ape_Kama_Project_admin/public/{{$best->cate_image}}" alt="Product Image">
                        </a>
                        <div class="product-action">
                            
                        </div>
                    </div>
                    <div class="product-title">
                        @if ($best->cate_type == "Women")
                        <a href="{{url('women_cat_item')}}/{{$best->id}}">{{$best->cate_name}}</a>
                        @elseif ($best->cate_type == "Men")
                        <a href="{{url('men_cat_item')}}/{{$best->id}}">{{$best->cate_name}}</a>
                        @elseif ($best->cate_type == "Kids & Babies Clothes")
                        <a href="{{url('kide_cat_item')}}/{{$best->id}}">{{$best->cate_name}}</a>
                        @elseif ($best->cate_type == "Home & Life Style")
                        <a href="{{url('home_cat_item')}}/{{$best->id}}">{{$best->cate_name}}</a>
                        @endif
                        
                    </div>
                    
                </div>
            </div>
            @endforeach

    </div>

</div>

        </div>
    </div>
</div>


@include('layout.footer')