@include('layout.app')
        

<div class="header">

    <div class="row">
<div class="mb-5 col-lg-12" style="display: inline-block; float: right;">

    <form action="{{url('/placeorder_buy')}}" method="POST">
        @csrf
  <!-- Checkout Start -->
  <div class="checkout">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-inner">
                    <div class="billing-address">
                        <h2>Billing Address</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="fname" placeholder="First Name" value="{{Auth::user()->fname}}">
                            </div>
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="lname" placeholder="Last Name" value="{{Auth::user()->lname}}">
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="email" placeholder="E-mail" value="{{Auth::user()->email}}">
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="mob_no" placeholder="Mobile No" value="{{Auth::user()->mobile_no}}">
                            </div>
                            <div class="col-md-12">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address" placeholder="Address" value="{{Auth::user()->address1}}, {{Auth::user()->address2}}, {{Auth::user()->city}}, {{Auth::user()->state}}">
                            </div>

                            <div class="col-md-6">
                                <label>City</label>
                                <input class="form-control" type="text" name="city" placeholder="City" value="{{Auth::user()->city}}">
                            </div>
                            <div class="col-md-6">
                                <label>State</label>
                                <input class="form-control" type="text" name="state" placeholder="State" value="{{Auth::user()->state}}">
                            </div>
                            <div class="col-md-6">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" name="zip_code" placeholder="ZIP Code" value="{{Auth::user()->zip_code}}">
                            </div>
                            {{-- <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="newaccount">
                                    <label class="custom-control-label" for="newaccount">Create an account</label>
                                </div>
                            </div> --}}
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="shipto" name="shipto">
                                    <label class="custom-control-label" for="shipto">Ship to different address</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="shipping-address">
                        <h2>Shipping Address</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <label>First Name</label>
                                <input class="form-control" type="text" name="fname_dif" placeholder="First Name" >
                            </div>
                            <div class="col-md-6">
                                <label>Last Name</label>
                                <input class="form-control" type="text" name="lname_dif" placeholder="Last Name">
                            </div>
                            <div class="col-md-6">
                                <label>E-mail</label>
                                <input class="form-control" type="text" name="email_dif" placeholder="E-mail">
                            </div>
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" name="mob_no_dif" placeholder="Mobile No">
                            </div>
                            <div class="col-md-12">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address_dif" placeholder="Address">
                            </div>
                            {{-- <div class="col-md-6">
                                <label>Country</label>
                                <select class="custom-select">
                                    <option selected>United States</option>
                                    <option>Afghanistan</option>
                                    <option>Albania</option>
                                    <option>Algeria</option>
                                </select>
                            </div> --}}
                            <div class="col-md-6">
                                <label>City</label>
                                <input class="form-control" type="text" name="city_dif" placeholder="City">
                            </div>
                            <div class="col-md-6">
                                <label>State</label>
                                <input class="form-control" type="text" name="state_dif" placeholder="State">
                            </div>
                            <div class="col-md-6">
                                <label>ZIP Code</label>
                                <input class="form-control" type="text" name="zip_dif" placeholder="ZIP Code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="checkout-inner">
                    <div class="checkout-summary">
                        <h1>Cart Total</h1>
                        <p>{{{$item_name}}}<span>   
                            Rs. {{number_format($item_price * $item_qty,2)}}
                         </span></p>
                        <p class="sub-total">Sub Total<span>Rs. {{number_format($sub_total_price,2)}}</span></p>
                        <p class="ship-cost">Shipping Cost<span>Rs. 0.00</span></p>
                        <h2>Grand Total<span>Rs. {{number_format($total_price,2)}}</span></h2>
                    </div>

                    <div class="checkout-payment">
                        <div class="payment-methods">
                            <h1>Payment Methods</h1>

                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-1" name="payment" value="Bitcoin" required>
                                    <label class="custom-control-label" for="payment-1">Bitcoin</label>
                                </div>
                                
                            </div>

                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-2" name="payment" value="Litecoin" required>
                                    <label class="custom-control-label" for="payment-2">Litecoin</label>
                                </div>
                         
                            </div>


                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-3" name="payment" value="Online Payment" required>
                                    <label class="custom-control-label" for="payment-3">Online Payment</label>
                                </div>
                             
                            </div>
                            <div class="payment-method">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="payment-4" name="payment" value="Cash on Delivery" required>
                                    <label class="custom-control-label" for="payment-4">Cash on Delivery</label>
                                </div>
                              
                            </div>

                            
                        </div>
                        <div class="checkout-btn">
                            <button type="submit">Place Order</button>
                        </div>

                        <input type="hidden" name="item_name" value="{{$item_name}}">
                        <input type="hidden" name="item_code" value="{{$item_code}}">
                        <input type="hidden" name="item_price" value="{{$item_price}}">
                        <input type="hidden" name="item_qty" value="{{$item_qty}}">
                        <input type="hidden" name="id" value="{{$id}}">


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout End -->


</div>


</form>

        </div>
    </div>
</div>


@include('layout.footer')