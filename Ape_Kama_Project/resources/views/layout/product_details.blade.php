@include('layout.app')
        
<style>
    .btn-outline-color:not(:disabled):not(.disabled).active, .btn-outline-color:not(:disabled):not(.disabled):active, .show>.btn-outline-color.dropdown-toggle
    {
        color: #fff;
        background-color: #857327;
        border-color: #857327;
    }
</style>

<div class="header">

    <div class="row">
<div class="mb-5 col-lg-12" style="display: inline-block; float: right;">


  <!-- Product Detail Start -->
  <div class="product-detail">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="product-detail-top">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                        <div class="card" style="border: none">
                            <div class="card-body">

                                    <div class="product-slider-single normal-slider">
                                        @foreach ($all_img as $img)
                                        <img src="http://127.0.0.1:8080/Ape_Kama_Project_admin/public/{{$img}}" alt="Product Image">
                                        @endforeach
                                    </div>
                                    <div class="product-slider-single-nav normal-slider">
                                        @foreach ($all_img as $img)
                                        <div class="slider-nav-img"><img src="http://127.0.0.1:8080/Ape_Kama_Project_admin/public/{{$img}}" alt="Product Image"></div>
                                        @endforeach
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-6">
                            <form action="{{url('buynow')}}" method="post">
                                @csrf
                            <div class="card" style="border: none">
                                <div class="card-body">

                                    <div class="product-content">
                                        <div class="title"><h2>{{$item_details->item_name}}</h2></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Price:</h4>
                                            <p>Rs. {{number_format($item_details->item_price,2)}}</p>
                                        </div>
                                        <div class="quantity">
                                            <h4>Quantity:</h4>
                                            <div class="qty">
                                                <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                                <input type="text" name="quntity" value="1">
                                                <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="p-size">
                                            @if ($item_size == null)
                                            @else
                                            <h4>Size:</h4>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @foreach ($item_size as $size)
                                                <label class="btn btn-outline-color active">
                                                  <input type="radio" name="option_size" id="option{{$size}}" value="{{$size}}" autocomplete="off" required>{{$size}}
                                                </label>
                                                @endforeach  
                                            </div>
                                            
                                            @endif
                                        </div>
                                        <div class="p-color">
                                            @if ($item_color == null)
                                            @else
                                            <h4>Color:</h4>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                @foreach ($item_color as $color)
                                                <label class="btn btn-outline-color active">
                                                  <input type="radio" name="option_color" id="option{{$color}}" value="{{$color}}" autocomplete="off" required>{{$color}}
                                                </label>
                                                @endforeach  
                                            </div>
                   
                                            @endif
                                        </div>
                                    

                                        <div class="action mt-3">
                                            <a class="btn" type="btn" onclick="add_to_card_btn('{{$id}}');"><i class="fa fa-shopping-cart"></i>Add to Cart</a>
                                            <button class="btn" type="submit"><i class="fa fa-shopping-bag"></i>Buy Now</button>
                                        </div>
                                    </div>


                                </div>

                            </div>

                            <input type="hidden" name="item_name" value="{{$item_details->item_name}}">
                            <input type="hidden" name="item_price" value="{{$item_details->item_price}}">
                            <input type="hidden" name="item_code" value="{{$item_details->item_code}}">
                            <input type="hidden" name="id" value="{{$id}}">
                        </form>
                         
                        </div>
                    </div>









                    
                </div>
                
                <div class="row product-detail-bottom">
                    <div class="col-lg-12">
                      
                              <div class="card">
                                <div class="card-body">

                                    <div class="reviews-submit">
                                        <h4>Give your Review:</h4>
                                        <div class="row form">
                                        <form action="{{route('customer_item_comment')}}" method="POST">
                                            @csrf
                                            <div class="col-sm-12">
                                                <input type="hidden" name="item_cus_id" id="item_cus_id" value="{{$id}}">
                                                <textarea class="form-control" rows="5" cols="150" id="comment" name="comment" required placeholder="Type your comment"></textarea>
                                            </div>


                                            @if(session('success'))
                                                <p class="mt-2 ml-5" id="success" style="color: green"><b><i class="fa fa-info-circle"></i> {{session('success')}}</b></p>
                                            @endif

                                            <div class="col-sm-12 mb-3">
                                                <button type="submit" class="btn pull-right">Submit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>

                                    @foreach ($find_cust_comment as $comment)
                                    <div class="card mt-2">
                                        <div class="card-body">
                                            <div class="reviewer"><b>{{$comment->customer_name}} <span>{{$comment->created_at}}</span></b></div>
                                        <p>
                                            {{$comment->customer_comment}}
                                        </p>

                                        </div>
                                    </div>
                                    @endforeach
                                   
    
                                   

                                </div>
                            </div>
                              </div>
                    
                    </div>
                </div>
                
                
            




            </div>
            
          
        </div>
    </div>
</div>
<!-- Product Detail End -->


    
</div>

        </div>
    </div>
</div>





@include('layout.footer')