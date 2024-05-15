@include('layout.app')



<!-- Main Slider --> 
@include('layout.mainSlide')
<!-- Main Slider End -->

<form class="col-lg-8 mb-5" id="cust_regi_form">

<div id="cust_reg_modal" style="background-color: #ffff;">  
    <div class="register-form ml-3 mr-3 ">
        <div class="row mb-3">
            <div class="col-md-6 mt-3">
                <label>First Name</label>
                <input class="form-control" type="text" id="fname" name="fname" placeholder="First Name">
            </div>
            <div class="col-md-6 mt-3">
                <label>Last Name</label>
                <input class="form-control" type="text" id="lname" name="lname" placeholder="Last Name">
            </div>
            <div class="col-md-6">
                <label>NIC Nummber</label>
                <input class="form-control" type="text" id="nic" name="nic" placeholder="NIC Number">
            </div>
            <div class="col-md-6">
                <label>E-mail</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="E-mail">
            </div>
            <div class="col-md-6">
                <label>Mobile No</label>
                <input class="form-control" type="text" id="mob_no" name="mob_no" placeholder="Mobile No">
            </div>
            <div class="col-md-6">
                <label>Date of Birth</label>
                <input class="form-control" type="date" id="dob" name="dob" placeholder="Date of Birth">
            </div>
            <div class="col-md-6">
                <label>Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="col-md-6">
                <label>Retype Password</label>
                <input class="form-control" type="password" id="con_password" name="con_password" placeholder="Password">
            </div>
            <div class="col-md-12 mb-3">
                <button class="btn pull-right" type="button" id="reg_next_btn">Next</button>
            </div>
        </div>
    </div>
</div>


<div id="addr_modal" style="background-color: #ffff;display: none;">  
    <div class="register-form ml-3 mr-3">
        <div class="row mb-3">
            <div class="col-md-6 mt-3">
                <label>Street address</label>
                <input class="form-control" type="text" name="addr_line1" id="addr_line1" placeholder="Address Line 1">
            </div>
            <div class="col-md-6 mt-3">
                <label>Street address 2 (optional)</label>
                <input class="form-control" type="text" name="addr_line2" id="addr_line2" placeholder="Address Line 2">
            </div>
            <div class="col-md-6">
                <label>City</label>
                <input class="form-control" type="text" name="city" id="city" placeholder="City">
            </div>
            <div class="col-md-6">
                <label>State/Province/Region</label>
                <input class="form-control" type="text" name="str_province_regi" id="str_province_regi" placeholder="State/Province/Region">
            </div>
            <div class="col-md-6">
                <label>Zip Code</label>
                <input class="form-control" type="text" name="zip_code" id="zip_code" placeholder="Zip Code">
            </div>
          
            <div class="col-md-12 mb-3">
                <button class="btn pull-right" type="button" id="cust_reg_btn">Register</button>
            </div>
        </div>
    </div>
</div>

</form>

        </div>
    </div>
</div>


@include('layout.footer')

<script>
    $('#reg_next_btn').click(function () 
    {
        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var nic = $('#nic').val();
        var email = $('#email').val();
        var dob = $('#dob').val();
        var mobile_no = $('#mob_no').val();
        var password = $('#password').val();
        var con_password = $('#con_password').val();
        
        if (fname == "" || lname == "" || nic == "" || email == "" || mob_no == "" || password == "" || con_password == "" || dob == "") 
        {
            alert("all fields are required..!");
        }

        $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("/cust_data_validate")}}',
        data:{fname:fname, lname:lname, nic:nic, email:email, mobile_no:mobile_no, password:password, con_password:con_password, dob:dob},
        success:function(data)
        {
            $('#cust_reg_modal').hide(1000);
            $('#addr_modal').show(1000);
        },
        error: function (response) 
        {
            var fname = response.responseJSON.errors.fname;
            var lname = response.responseJSON.errors.lname;
            var nic = response.responseJSON.errors.nic;
            var email = response.responseJSON.errors.email;
            var dob = response.responseJSON.errors.dob;
            var mob_no = response.responseJSON.errors.mob_no;
            var password = response.responseJSON.errors.password;
            var con_password = response.responseJSON.errors.con_password;
            
            if (fname) 
            {alert(fname);}
            if (lname) 
            {alert(lname);}
            if (nic) 
            {alert(nic);}
            if (email) 
            {alert(email);}
            if (mob_no) 
            {alert(mob_no);}
            if (password) 
            {alert(password);}
            if (con_password) 
            {alert(con_password);}
            if (dob) 
            {alert(dob);}
            
            return false; 
        },


        });

        

    });
</script>

<script>
    $('#cust_reg_btn').click(function () 
    {
        var addr_line1 = $('#addr_line1').val();
        var addr_line2 = $('#addr_line2').val();
        var city = $('#city').val();
        var str_province_regi = $('#str_province_regi').val();
        var zip_code = $('#zip_code').val();
        var form = $('#cust_regi_form').serialize();

        if (addr_line1 == "" || city == "" || str_province_regi == "" || zip_code == "" ) 
        {
            alert("all fields are required..!");
        }



        $.ajax({
        type:'GET',
        headers: {
            'X-CSRF-Token': '{{ csrf_token() }}',
        },
        url:'{{url("/cust_register")}}',
        data: form,
        success:function(data)
        {
            location.href = "{{url('/login')}}";
        },
        error: function (response) 
        {
           alert("Somethig wrong please try agin..!")
            return false; 
        },


        });

        

    });
</script>