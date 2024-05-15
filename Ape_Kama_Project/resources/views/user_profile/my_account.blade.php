@include('layout.app')



<!-- Main Slider --> 
@include('layout.mainSlide')
<!-- Main Slider End -->

<form class="col-lg-8 mb-5" id="cust_regi_form" action="{{route('update_cust_details')}}" method="POST">
@csrf
<div id="cust_reg_modal" style="background-color: #ffff;">  
    <div class="register-form ml-3 mr-3 ">
        <div class="row mb-3">
            <div class="col-md-6 mt-3">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <label>First Name</label>
                <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name" value="{{Auth::user()->fname}}">
            </div>
            <div class="col-md-6 mt-3">
                <label>Last Name</label>
                <input class="form-control" type="text" id="lname" name="lname" placeholder="Last Name" value="{{Auth::user()->lname}}">
            </div>
            <div class="col-md-6">
                <label>NIC Nummber</label>
                <input class="form-control" type="text" id="nic" name="nic" placeholder="NIC Number" value="{{Auth::user()->nic }}">
            </div>
            <div class="col-md-6">
                <label>E-mail</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="E-mail" value="{{Auth::user()->email }}">
            </div>
            <div class="col-md-6">
                <label>Mobile No</label>
                <input class="form-control" type="text" id="mobile_no" name="mobile_no" placeholder="Mobile No" value="{{Auth::user()->mobile_no }}">
            </div>
            <div class="col-md-6">
                <label>Date of Birth</label>
                <input class="form-control" type="date" id="dob" name="dob" placeholder="Date of Birth" value="{{Auth::user()->date_of_birth }}">
            </div>
            

        </div>
    </div>
</div>


<div id="addr_modal" style="background-color: #ffff;">  
    <div class="register-form ml-3 mr-3">
        <div class="row mb-3">
            <div class="col-md-6 mt-3">
                <label>Street address</label>
                <input class="form-control" type="text" name="addr_line1" id="addr_line1" placeholder="Address Line 1" value="{{Auth::user()->address1 }}">
            </div>
            <div class="col-md-6 mt-3">
                <label>Street address 2 (optional)</label>
                <input class="form-control" type="text" name="addr_line2" id="addr_line2" placeholder="Address Line 2" value="{{Auth::user()->address2 }}">
            </div>
            <div class="col-md-6">
                <label>City</label>
                <input class="form-control" type="text" name="city" id="city" placeholder="City" value="{{Auth::user()->city }}">
            </div>
            <div class="col-md-6">
                <label>State/Province/Region</label>
                <input class="form-control" type="text" name="str_province_regi" id="str_province_regi" placeholder="State/Province/Region" value="{{Auth::user()->state }}">
            </div>
            <div class="col-md-6">
                <label>Zip Code</label>
                <input class="form-control" type="text" name="zip_code" id="zip_code" placeholder="Zip Code" value="{{Auth::user()->zip_code }}">
            </div>

            @if(session('success')) 
            <div class="col-md-12 mb-3">                   
            <p class="mt-2" id="success" style="color: green"><b><i class="fa fa-info-circle"></i> {{session('success')}}</b></p>
            </div>
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="col-md-12 mb-3"> 
                        <p class="mt-2" id="success" style="color: red"><b><i class="fa fa-info-circle"></i> {{$error}}</b></p>
                    </div>
                @endforeach
            @endif

            <div class="col-md-12 mb-3">
                <button class="btn pull-right" style="margin-left: 80%" type="submit" id="cust_reg_btn">Update User Details</button>
            </div>

            

        </div>
    </div>
</div>



</form>

        </div>
    </div>
</div>


@include('layout.footer')
