<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\customer_item_comment_tbl;
use App\Models\favourite_tbl;
use App\Models\subscribe_tbl;
use App\Models\cust_user;
use App\Models\User;
use Auth;
use Mail;
use DB;

class custcontroller extends Controller
{
    public function addtocart_count()
    {
        $user_id = Auth::user()->id;
        $addtocart_count = DB::table('add_to_carts')->where('add_to_cart_status', '1')->where('item_add_user_id', Auth::user()->id)->count();
        
        return $addtocart_count;
    }

    public function fav_count()
    {
        $user_id = Auth::user()->id;
        $fav_count = favourite_tbl::where('user_id', $user_id)->where('remove_status', '0')->distinct()->count('item_id');

        return $fav_count;
    }

    public function my_account()
    {
        $addtocart_count = $this->addtocart_count();
        $fav_count = $this->fav_count();


        return view('user_profile.my_account')
        ->with('fav_count', $fav_count)
        ->with('addtocart_count', $addtocart_count);
    }

    public function update_cust_details(Request $request)
    {
        $id = $request->user_id;
        $fname = $request->fname;
        $lname = $request->lname;
        $nic = $request->nic;
        $date_of_birth = $request->dob;
        $email = $request->email;
        $mobile_no = $request->mobile_no;
        $addr_line1 = $request->addr_line1;
        $addr_line2 = $request->addr_line2;
        $city = $request->city;
        $str_province_regi = $request->str_province_regi;
        $zip_code = $request->zip_code;
        $fullname = $fname." ".$lname;

        $errors = [
            'fname.required' => 'First name is Required.',
            'lname.required' => 'Last name is Required.',
            'nic.required' => 'NIC number is Required.',
            'email.required' => 'Email is Required.',
            'dob.required' => 'Date of birth is Required.',
            'mob_no.required' => 'Mobile number is Required.',
            'email.unique' => 'This email address is already being used.',
            'mob_no.unique' => 'This mobile number is already being used.',
            'mob_no.numeric' => 'The mobile number must be a number.',
            'mob_no.max' => 'The mob no may not be greater than 10.',
            'email.email' => 'The email must be a valid email address.',

          ];
        $this->validate($request, [
            'fname' => 'required|string|max:30',
            'lname' => 'required|string|max:30',
            'nic' => 'required|max:12',
            'email' => 'required|email',
            'dob' => 'required',
            'mobile_no' => 'required|numeric|min:10',
        ],$errors);

        $find_user = User::find($id);
        $find_email = $find_user->email;
        $find_mobile = $find_user->mobile_no ;
        $find_nic = $find_user->nic;

        if ($find_email != $email) {
            $this->validate($request, [
                'email' => 'required|email|unique:users',
            ],$errors);
        }

        if ($find_mobile != $mobile_no) {
            $this->validate($request, [
                'mobile_no' => 'required|numeric|min:10|unique:users',
            ],$errors);
        }

        if ($find_nic != $nic) {
            $this->validate($request, [
                'nic' => 'required|max:12|unique:users',
            ],$errors);
        }

        $update_user = User::find($id);
        $update_user->fname = $fname;
        $update_user->lname = $lname;
        $update_user->fullname = $fullname;
        $update_user->date_of_birth = $date_of_birth;
        $update_user->nic = $nic;
        $update_user->email = $email;
        $update_user->mobile_no = $mobile_no;
        $update_user->address1 = $addr_line1;
        $update_user->address2 = $addr_line2;
        $update_user->city = $city;
        $update_user->state = $str_province_regi;
        $update_user->zip_code = $zip_code;
        $update_user->update();

        return redirect()->back()->with('success', 'User details update successfully..!');

    }

    public function cust_data_validate(Request $request)
    {
        $errors = [
            'fname.required' => 'First name is Required.',
            'lname.required' => 'Last name is Required.',
            'nic.required' => 'NIC number is Required.',
            'email.required' => 'Email is Required.',
            'dob.required' => 'Date of birth is Required.',
            'mob_no.required' => 'Mobile number is Required.',
            'password.required' => 'Password is Required.',
            'con_password.required' => 'Confirm Password is Required.',
            
            'email.unique' => 'This email address is already being used.',
            'mob_no.unique' => 'This mobile number is already being used.',

            'password.min' => 'The password must be at least 8 characters.',

            'mob_no.numeric' => 'The mobile number must be a number.',
            'mob_no.max' => 'The mob no may not be greater than 10.',
            'email.email' => 'The email must be a valid email address.',

          ];

        $this->validate($request, [
            'fname' => 'required|string|max:30',
            'lname' => 'required|string|max:30',
            'nic' => 'required|max:12|unique:users',
            'email' => 'required|email|unique:users',
            'dob' => 'required',
            'mobile_no' => 'required|numeric|min:10|unique:users',
            'password' => 'required|min:8|same:con_password',
            'con_password' => 'required',
        ],$errors);

        return response()->json(['success'=>'Validation Success..!']);
    }

    public function cust_register(request $request)
    {
        $fname = $request->fname;
        $lname = $request->lname;
        $nic = $request->nic;
        $date_of_birth = $request->dob;
        $email = $request->email;
        $mobile_no = $request->mob_no;
        $password = $request->password;
        $addr_line1 = $request->addr_line1;
        $addr_line2 = $request->addr_line2;
        $city = $request->city;
        $str_province_regi = $request->str_province_regi;
        $zip_code = $request->zip_code;
        $password = Hash::make($password);
        $fullname = $fname." ".$lname;

        if ($addr_line2 == null) 
        {
            $addr_line2 = "";
        }

        $new_cust = new User();
        $new_cust->fname = $fname;
        $new_cust->lname = $lname;
        $new_cust->fullname = $fullname;
        $new_cust->nic = $nic;
        $new_cust->date_of_birth = $date_of_birth;
        $new_cust->email = $email;
        $new_cust->mobile_no = $mobile_no;
        $new_cust->password = $password;
        $new_cust->address1 = $addr_line1;
        $new_cust->address2 = $addr_line2;
        $new_cust->city = $city;
        $new_cust->state = $str_province_regi;
        $new_cust->zip_code = $zip_code;
        $new_cust->cust_type = "Customer";
        $new_cust->save();


        return response()->json(['success'=>$fname]);
    }

    public function login_page(Request $request)
    {
       
        $data = $request->only('email', 'password');
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {
            dd("success");
        }
        else
        {
            dd("error");
        }
    }

    public function subscribe_mail(Request $request)
    {
        $email = $request->customer_email;
        $ip_address = $_SERVER['REMOTE_ADDR'];

        $sub_data[] = array(
            'cust_email' => $email,
            'cust_ipaddress' => $ip_address
        );

        subscribe_tbl::insert($sub_data);

        $data = array(
            'email' => $email,
        );
        
        Mail::send('Mail.subscribe_mail', $data,
        function($message)use($data, $email) {
        $message->to($email, 'ApeKama Online Store')
        ->from('apekama.online@gmail.com' , 'ApeKama Online Store')
        ->subject('ApeKama Online Store');
        });

        return redirect()->back()->with('success', 'Subscription email added successfully..!');
    }

    public function customer_item_comment(Request $request)
    {
        $id = $request->item_cus_id;
        $comment = $request->comment;
        $user_id = Auth::user()->id;
        $fullname = Auth::user()->fullname;

        $add_comment[] = array(
            'item_id' => $id,
            'customer_id' => $user_id,
            'customer_name' => $fullname,
            'customer_comment' => $comment,
        );

        customer_item_comment_tbl::insert($add_comment);

        return redirect()->back()->with('success', 'Your reviews will display on Apekama website as soon as posible...!');
    }
}
