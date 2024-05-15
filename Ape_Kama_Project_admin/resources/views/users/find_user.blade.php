@extends('layouts.app')

@section('content')
<div class="container">

       
    <div class="card">
        <div class="card-header">Find Users</div>
        <div class="card-body ">
           

            <table id="find_claims_tbl" class="table table-responsive-sm table-responsive-md table-responsive-lg table-hover table-outline mt-3">
                <thead>
                    <tr>
                        <th style="text-align: center">User Name</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Contact Number</th>
                        <th style="text-align: center">User Type</th>
                        <th style="text-align: center">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($user_data as $user)
                    <tr>
                        <td style="text-align: center">{{$user->fullname}}</td>
                        <td style="text-align: center">{{$user->email}}</td>
                        <td style="text-align: center">{{$user->mobile_no}}</td>
                        <td style="text-align: center">{{$user->cust_type}}</td>
                        <td>
                            <center>
                             
                                <button class="btn btn-success" style="background-color: green" data-toggle="modal" data-target="#update_user{{$user->id}}"><i class="fa fa-edit"></i>&nbsp; Edit</button>
                                <button class="btn btn-warning" style="background-color: orange" data-toggle="modal" data-target="#change_password{{$user->id}}"><i class="fa fa-key"></i>&nbsp; Change Password</button>
                                <button class="btn btn-danger" style="background-color: red" data-toggle="modal" data-target="#userremove{{$user->id}}"><i class="fa fa-trash"></i>&nbsp; Remove</button>
                            </center>


                            
                                  <!--update Modal -->
          <div id="update_user{{$user->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                    
                        <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{$user->fullname}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                    </div>
                    <div class="modal-body">
                            <form action="{{url('update_user')}}" method="post">
                              @csrf
                    
                              <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">

                              <div class="form-group row">
                                <label for="f_name" class="col-sm-4 col-form-label">First Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control @error('f_name') is-invalid @enderror" value="{{$user->fname}}"  id="f_name" name="f_name">
                                </div>
                            </div>
                      
                            <div class="form-group row">
                                <label for="l_name" class="col-sm-4 col-form-label">Last Name</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control @error('l_name') is-invalid @enderror" value="{{$user->lname}}"  id="l_name" name="l_name">
                                </div>
                            </div>

                            
                            <div class="form-group row">
                                <label for="email" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                      

                            <div class="form-group row">
                                <label for="con_num" class="col-sm-4 col-form-label">Contact Number</label>
                                <div class="col-sm-8">
                                  <input type="number" class="form-control @error('con_num') is-invalid @enderror" id="con_num" name="con_num" value="{{$user->mobile_no}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-sm-4 col-form-label">Date of Birth</label>
                                <div class="col-sm-8">
                                  <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob" value="{{$user->DOB}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address1" class="col-sm-4 col-form-label">Address 1</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control @error('address1') is-invalid @enderror" id="address1" name="address1" value="{{$user->address1}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address2" class="col-sm-4 col-form-label">Address 2</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control @error('address2') is-invalid @enderror" id="address2" name="address2" value="{{$user->address2}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-sm-4 col-form-label">City</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{$user->city}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state" class="col-sm-4 col-form-label">State</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{$user->state}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="zip_code" class="col-sm-4 col-form-label">ZIP Code</label>
                                <div class="col-sm-8">
                                  <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" value="{{$user->zip_code}}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_permission" class="col-sm-4 col-form-label">User Permission</label>
                                <div class="col-sm-8">
                                    <select class="form-control @error('user_permission') is-invalid @enderror" id="user_permission" name="user_permission">
                                        <option value="{{$user->cust_type}}">{{$user->cust_type}}</option>
                                        <option value="Admin">Admin User</option>
                                        <option value="Customer">Customer User</option>
                                    </select>
                                </div>
                            </div>
                      
                            <div class="form-group">
                              <button type="submit" class="btn btn-success float-right" style="background-color: green">Update</button>
                          </div>

                            </form>

                          </div>
                        </div>
                    
                      </div>
                    </div>     



                    
                                  <!--change password Modal -->
          <div id="change_password{{$user->id}}" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                    
                        <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{$user->fullname}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                            
                    </div>
                    <div class="modal-body">
                            <form action="{{url('change_password')}}" method="post">
                              @csrf
                    
                              <input type="hidden" name="pass_user_id" id="pass_user_id" value="{{$user->id}}">

                              <div class="form-group row">
                                <label for="password" class="col-sm-4 col-form-label">Current Password</label>
                                <div class="col-sm-8">
                                  <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                </div>
                            </div>
                      
                            <div class="form-group row">
                                <label for="new_pass" class="col-sm-4 col-form-label">New Password</label>
                                <div class="col-sm-8">
                                  <input type="password" class="form-control @error('new_pass') is-invalid @enderror"  id="new_pass" name="new_pass">
                                </div>
                            </div>

                            <div class="form-group row">
                              <label for="confirm_pass" class="col-sm-4 col-form-label">Confirm Password</label>
                              <div class="col-sm-8">
                                <input type="password" class="form-control @error('confirm_pass') is-invalid @enderror"  id="confirm_pass" name="confirm_pass">
                              </div>
                          </div>

                      
                            <div class="form-group">
                              <button type="submit" class="btn btn-success float-right" style="background-color: green">Change Password</button>
                          </div>

                            </form>

                          </div>
                        </div>
                    
                      </div>
                    </div>     


                          <!--remove Modal -->
                          <div id="userremove{{$user->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                              <!-- Modal content-->
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">{{$user->fullname}}</h4>
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  
                                </div>
                                <div class="modal-body">
                                  <form action="{{url('userremove')}}" method="GET">
                                    @csrf
                                    <p>Are you sure you want to delete this item ?</p>

                                    <input type="text" name="user_id" id="user_id" value="{{$user->id}}">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-success" style="background-color: green">Delete</button>
                                  </div>



                                  </form>   
                              </div>

                            </div>
                          </div>        
                 
                              


                        </td>
                    </tr>

                @endforeach
                    
                </tbody>
            </table>

         

        </div>
    </div>



</div>
@endsection