@extends('layouts.app')

@section('content')
<div class="container">

    <p><a href="{{url('men_category')}}">Men Category</a> / {{$cate_name}}</p>
    
    <div class="card">
          <div class="card-body ">

              <input type="hidden" name="item_text" id="item_text" value="{{$item_code}}">
              <button type="button" class="btn btn-danger" id="item_add_btn" ><i class="fa fa-plus-circle"></i> Add Items</button>
            <div class="row">

                <table id="find_claims_tbl" class="table table-responsive-sm table-responsive-md table-responsive-lg table-hover table-outline mt-3">
                  <thead>
                      <tr>
                          <th style="text-align: center">Item Code</th>
                          <th style="text-align: center">Item Name</th>
                          <th style="text-align: center">Item Price</th>
                          <th style="text-align: center">Item Quntity</th>
                          <th style="text-align: center">Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($main_cate_code as $items)
                      <tr>
                          <td style="text-align: center">{{$items->item_code}}</td>
                          <td style="text-align: center">{{$items->item_name}}</td>
                          <td style="text-align: center">Rs. {{number_format($items->item_price,2)}}</td>
                          <td style="text-align: center">{{$items->item_qty}}</td>
                          <td>
                              <center>
                               
                                  <button class="btn btn-success" style="background-color: green" data-toggle="modal" data-target="#item_edit{{$items->id}}"><i class="fa fa-edit"></i>&nbsp; Edit</button>
                                  <button class="btn btn-danger" style="background-color: red" data-toggle="modal" data-target="#item_remove{{$items->id}}"><i class="fa fa-trash"></i>&nbsp; Remove</button>
                              </center>
                              
                          </td>
                      </tr>

                                                <!--remove Modal -->
                    <div id="item_remove{{$items->id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">{{$items->item_name}}</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                          </div>
                          <div class="modal-body">
                            <form action="{{url('remove_item')}}" method="GET">
                              @csrf
                              <p>Are you sure you want to delete this item ?</p>

                              <input type="hidden" name="rem_itm_id" id="rem_itm_id" value="{{$items->id}}">
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-success" style="background-color: green">Delete</button>
                            </div>



                            </form>   
                        </div>

                      </div>
                    </div>        

                          <!--update Modal -->
          <div id="item_edit{{$items->id}}" class="modal fade" role="dialog">
                  <div class="modal-dialog modal-lg">
                          
                              <!-- Modal content-->
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">{{$items->item_name}}</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
                          </div>
                          <div class="modal-body">
                                  <form action="{{url('update_item')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                          
                                    <input type="hidden" name="item_id" id="item_id" value="{{$items->id}}">
                                    <div class="form-group row">
                                      <label for="update_item_name" class="col-sm-4 col-form-label">Item Name</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control @error('update_item_name') is-invalid @enderror" value="{{$items->item_name}}"  id="update_item_name" name="update_item_name" placeholder="Item Name">
                                      </div>
                                  </div>
                            
                                  <div class="form-group row">
                                      <label for="update_unit_price" class="col-sm-4 col-form-label">Unit Price</label>
                                      <div class="col-sm-8">
                                        <input type="text" class="form-control @error('unit_price') is-invalid @enderror" value="{{$items->item_price}}"  id="update_unit_price" name="update_unit_price" placeholder="Unit Price">
                                      </div>
                                  </div>

                                  <div class="form-group row">
                                    <label for="update_unit_quntity" class="col-sm-4 col-form-label">Unit Quntity</label>
                                    <div class="col-sm-4">
                                      <input type="text" class="form-control @error('update_unit_quntity') is-invalid @enderror" value="{{$items->item_qty}}"  id="update_unit_quntity" name="update_unit_quntity" placeholder="Unit Quntity">
                                    </div>
                                </div>
                            
                                  <div class="form-group row">
                                      <label for="update_item_image" class="col-sm-4 col-form-label">Item Image</label>
                                      <div class="col-sm-8">
                                        <input type="file" class="form-control-file" id="update_item_image" name="update_item_image">
                                      </div>
                                  </div>
                            
                                  <div class="form-group">
                                    <button type="submit" class="btn btn-success float-right" style="background-color: green">update</button>
                                </div>

                                  </form>

                                </div>
                              </div>
                          
                            </div>
                          </div>          
                          

                          @endforeach
                      
                  </tbody>
              </table>

            </div>
          </div>
        </div>

  </div>














        




<!-- The Modal -->
<div class="modal fade" id="add_modal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">{{$cate_name}} Items</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          
            <div class="card">
                <div class="card-body">
      
                  <form action="{{url('/item_add')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="item_name" class="col-sm-4 col-form-label">Item Name <i style="color:red;">*</i></label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control @error('item_name') is-invalid @enderror" value="{{ old('item_name') }}"  id="item_name" name="item_name" placeholder="Item Name">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="unit_price" class="col-sm-4 col-form-label">Unit Price <i style="color:red;">*</i></label>
                        <div class="col-sm-4">
                          <input type="number" class="form-control @error('unit_price') is-invalid @enderror" value="{{ old('unit_price') }}"  id="unit_price" name="unit_price" placeholder="Unit Price">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="item_qty" class="col-sm-4 col-form-label">Item Quntity <i style="color:red;">*</i></label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control @error('item_qty') is-invalid @enderror" value="{{ old('item_qty') }}"  id="item_qty" name="item_qty" placeholder="Qty">
                      </div>
                  </div>

                  <div class="form-group row">
                    <label for="item_option" class="col-sm-4 col-form-label">Item Option <i style="color:red;">*</i></label>
                    <div class="col-sm-4">
                      <select class="form-control @error('item_option') is-invalid @enderror" value="{{ old('item_option') }}"  id="item_option" name="item_option">
                        <option>Select item option</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                      </select>
                    </div>
                </div>

                <div class="form-group row" id="item_option_div" style="display: none">
                  <label for="item_option" class="col-sm-4 col-form-label"></label>
                  <div class="col-sm-6">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="item_color">
                      <label class="form-check-label" for="item_color">
                        Item Color
                      </label>

                      <div class="form-group row" id="add_color" style="display: none">
                        <input type="text" id="add_color_value" class="col-sm-6 form-control form-control-sm">
                      <button type="button" class="btn btn-warning btn-sm ml-2" id="color_add_btn"><i class="fa fa-plus-circle"></i></button>

                       
                      </div>
                      
                      <div id="select_color_list" style="display: none">

                      </div>


                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="item_size">
                      <label class="form-check-label" for="item_size">
                        Item Size
                      </label>

                      <div class="form-group row" id="add_size" style="display: none">
                        {{-- <input type="text" id="add_size_value" class="col-sm-6 form-control form-control-sm"> --}}
                        <select id="add_size_value" class="col-sm-6 form-control form-control-sm">
                          <option value="">Select Size</option>
                          <option value="Small">Small</option>
                          <option value="Medium">Medium</option>
                          <option value="Large">Large</option>
                          <option value="XS">XS</option>
                          <option value="S">S</option>
                          <option value="M">M</option>
                          <option value="L">L</option>
                          <option value="XL">XL</option>
                          <option value="XXL">XXL</option>
                          <option value="XXXL">XXXL</option>
                        </select>
                      <button type="button" class="btn btn-warning btn-sm ml-2" id="color_size_btn"><i class="fa fa-plus-circle"></i></button>

                       
                      </div>
                      
                      <div id="select_size_list" style="display: none">

                      </div>

                    </div>
                  </div>
              </div>

                  <div class="form-group row">
                    <label for="item_image" class="col-sm-4 col-form-label">Item Image<i style="color:red;">*</i></label>
                    <div class="col-sm-8">
                      <div class="custom-file mt-2">
                        <input type="file" class="custom-file-input @error('item_image') is-invalid @enderror" id="item_image" name="item_image" accept="image/*">
                        <label class="custom-file-label" for="item_image">Choose file</label>
                    </div>
                    </div>
                </div>
        
                    <div class="form-group row">
                      <label for="ex_image" class="col-sm-4 col-form-label">Extra Images<i style="color:red;">*</i></label>
                      <div class="col-sm-8">
                          
                          <div class="custom-file mt-2">
                            <input type="file" class="custom-file-input @error('ex_image1') is-invalid @enderror" id="ex_image1" name="ex_image1" accept="image/*">
                            <label class="custom-file-label" for="ex_image1">Choose file</label>
                        </div>

                        <div class="custom-file mt-2">
                          <input type="file" class="custom-file-input @error('ex_image2') is-invalid @enderror" id="ex_image2" name="ex_image2" accept="image/*">
                          <label class="custom-file-label" for="ex_image2">Choose file</label>
                      </div>

                      <div class="custom-file mt-2">
                        <input type="file" class="custom-file-input @error('ex_image3') is-invalid @enderror" id="ex_image3" name="ex_image3" accept="image/*">
                        <label class="custom-file-label" for="ex_image3">Choose file</label>
                    </div>

                      {{-- additional images --}}
                      <div class="custom-file mt-2" id="ex_image4_div" style="display: none">
                        <input type="file" class="custom-file-input @error('ex_image4') is-invalid @enderror" id="ex_image4" name="ex_image4" accept="image/*">
                        <label class="custom-file-label" for="ex_image4">Choose file</label>
                    </div>
                    <div class="custom-file mt-2" style="display: none" id="ex_image5_div">
                        <input type="file" class="custom-file-input @error('ex_image5') is-invalid @enderror" id="ex_image5" name="ex_image5" accept="image/*">
                        <label class="custom-file-label" for="ex_image5">Choose file</label>
                    </div>

                      <center>
                        <button type="button" class="btn btn-link" id="more_attachment_btn">
                            <i class="fa fa-plus-circle mt-2"></i> &nbsp;More Attachment
                        </button>
                        <button type="button" class="btn btn-link" id="hide_more_attachment_btn" style="display: none">
                            <i class="fa fa-plus-circle mt-2"></i> &nbsp;Hide More Attachment
                        </button>
                    </center>

                    </div>
                  </div>

                    
                    <input type="hidden" id="cat_code" name="cat_code">
        
                    <div class="form-group">
                       <button type="submit" class="btn btn-success float-right" style="background-color: green">Submit</button>
                    </div>
                </form>
        
                <div >
      
                </div>
                </div>
            </div>



        </div>
  
      </div>
    </div>
  </div>

  @include('items.script.item_script')
@endsection