@extends('layouts.app')

@section('content')
<div class="container">

       
      <div class="card">
          <div class="card-body">

            <form action="{{url('/sub_cat_add')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group row">
                  <label for="cate_name" class="col-sm-6 col-form-label">Category Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control @error('cate_name') is-invalid @enderror" value="{{ old('cate_name') }}"  id="cate_name" name="cate_name" placeholder="Category Name">
                  </div>
              </div>
  
              <div class="form-group row">
                  <label for="cate_type" class="col-sm-6 col-form-label">Category Type</label>
                  <div class="col-sm-6">
                    <select class="form-control" id="cate_type" placeholder="" name="cate_type" class="form-control @error('cate_type') is-invalid @enderror" value="{{ old('cate_type') }}">
                      <option value="">Select Type</option>
                      <option value="Women">Women Category</option>
                      <option value="Men">Men Category</option>
                      <option value="Kids & Babies Clothes">Kids & Babies Clothes Category</option>
                      <option value="Home & Life Style">Home & Life Style Category</option>
                    </select>
                  </div>
              </div>
  
              <div class="form-group row">
                  <label for="cate_image" class="col-sm-6 col-form-label">Image</label>
                  <div class="col-sm-6">
                    <input type="file" class="form-control-file" id="cate_image" name="cate_image">
                  </div>
              </div>
  
  
              <div class="form-group">
                 <button type="submit" class="btn btn-success float-right" style="background-color: green">Submit</button>
              </div>
          </form>
  
          <div >

          </div>
          </div>
      </div>



</div>
@endsection