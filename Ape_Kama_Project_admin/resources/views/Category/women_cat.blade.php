@extends('layouts.app')

@section('content')
<div class="container">

       
    <div class="card">
          <div class="card-body ">
            <div class="row">
                
            @foreach ($cate_type as $cate)
            
                <div class="card col-3 ml-5 mr-1 mb-3 text-center">
                    <img class="card-img-top" src="{{$cate->cate_image}}" alt="Card image" style="width:100%">
                    <div class="card-body">
                      <h4 class="card-title">{{$cate->cate_name}}</h4>
                      <a href="{{url('womenitem')}}/{{$cate->id}}" class="btn btn-primary">Go to Items</a>
                    </div>
                </div>
            @endforeach
        </div>
            
          <div >
    </div>

          </div>
      </div>



</div>
@endsection