@include('layout.app')



<!-- Main Slider --> 
@include('layout.mainSlide')
<!-- Main Slider End -->

<div class="mb-5 ml-5 col-lg-8" style="display: inline-block; float: right;">

    <div class="row">
        
        @foreach ($find_women_cat as $women_cat)

            
        <div class="col-lg-3 mb-2 mt-2">
            <div class="product-item">
                <div class="product-image">
                    <a href="product-detail.html">
                        <img src="http://127.0.0.1:8080/Ape_Kama_Project_admin/public/{{$women_cat->cate_image}}" alt="Product Image">
                    </a>
                    <div class="product-action">
                        
                    </div>
                </div>
                <div class="product-title">
                
                    <a href="{{url('women_cat_item')}}/{{$women_cat->id}}">{{$women_cat->cate_name}}</a>
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